<?php

namespace App\Http\Controllers;

use Discord\Discord;
use Discord\Parts\Guild\Guild;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;  // ← AJOUT OBLIGATOIRE

class DiscordController extends Controller
{
    /**
     * Version avec la bibliothèque Discord PHP (asynchrone)
     * ⚠️ DÉCONSEILLÉE en production - gardée pour compatibilité
     */
    public function serverInfo()
    {
        // ✅ CORRIGÉ
        $discord = new Discord([
            'token' => Config::get('discord.bot_token')
        ]);

        // Variable pour stocker les données
        $data = [
            'membersCount' => null,
            'onlineCount' => null,
            'serverName' => null,
            'serverIcon' => null,
            'roles' => []
        ];

        // Quand le bot est prêt
        $discord->on('ready', function (Discord $discord) use (&$data) {
            echo "Bot is ready!", PHP_EOL;

            // ✅ CORRIGÉ
            $guildId = Config::get('discord.guild_id');
            $guild = $discord->guilds->get('id', $guildId);

            if ($guild) {
                $data['membersCount'] = $guild->member_count;
                $data['serverName'] = $guild->name;
                $data['serverIcon'] = $guild->icon;

                // Approximation des membres en ligne
                $data['onlineCount'] = round($guild->member_count / 3.5);

                // Récupère les rôles
                foreach ($guild->roles as $role) {
                    if (!$role->managed && $role->name !== '@everyone') {
                        $data['roles'][] = [
                            'name' => $role->name,
                            'color' => $role->color,
                            'position' => $role->position
                        ];
                    }
                }

                // Trie les rôles par position
                usort(
                    $data['roles'],
                    function ($a, $b) {
                        return $b['position'] <=> $a['position'];
                    }
                );
            }

            $discord->close();
        });

        $discord->run();
        sleep(2);

        return view('index', $data);
    }

    /**
     * Version RECOMMANDÉE avec API REST (synchrone)
     * Utilisée pour la page d'accueil
     */
    public function simpleServerInfo()
    {
        // ✅ CORRIGÉ - avec valeurs par défaut
        $token = Config::get('discord.bot_token');
        $guildId = Config::get('discord.guild_id');

        // Sécurité : si les variables ne sont pas chargées
        if (!$token || !$guildId) {
            Log::error('Discord: Token ou Guild ID manquant');
            return view('index', [
                'membersCount' => 15402,
                'onlineCount' => 4203,
                'serverName' => 'Inabikari',
                'serverIcon' => null,
                'roles' => []
            ]);
        }

        $client = new \GuzzleHttp\Client([
            'headers' => [
                'Authorization' => 'Bot ' . $token,
                'Content-Type' => 'application/json',
            ]
        ]);

        try {
            // Récupère les infos du serveur AVEC les comptages
            $response = $client->get("https://discord.com/api/v10/guilds/{$guildId}?with_counts=true");
            $guild = json_decode($response->getBody(), true);

            // Récupère les rôles
            $rolesResponse = $client->get("https://discord.com/api/v10/guilds/{$guildId}/roles");
            $roles = json_decode($rolesResponse->getBody(), true);

            // Filtre @everyone
            $filteredRoles = array_filter($roles, function ($role) {
                return $role['name'] !== '@everyone';
            });

            // Les vraies données Discord
            $data = [
                'membersCount' => $guild['approximate_member_count'] ?? $guild['member_count'] ?? 0,
                'onlineCount' => $guild['approximate_presence_count'] ?? 0,
                'serverName' => $guild['name'],
                'serverIcon' => $guild['icon'] ? "https://cdn.discordapp.com/icons/{$guildId}/{$guild['icon']}.png" : null,
                'roles' => array_slice(array_values($filteredRoles), 0, 10)
            ];

        } catch (\Exception $e) {
            // Valeurs par défaut en cas d'erreur
            $data = [
                'membersCount' => 15402,
                'onlineCount' => 4203,
                'serverName' => 'Inabikari',
                'serverIcon' => null,
                'roles' => []
            ];

            Log::error('Erreur Discord API: ' . $e->getMessage());
        }

        return view('index', $data);
    }

    /**
     * Récupère les membres pour la page membres
     */
    public function getMembres(Request $request)
    {
        $token = Config::get('discord.bot_token');
        $guildId = Config::get('discord.guild_id');
        $search = $request->get('search', '');
        $page = (int) $request->get('page', 1);
        $perPage = 12;

        // Sécurité
        if (!$token || !$guildId) {
            Log::error('Discord: Token ou Guild ID manquant pour getMembres');
            if ($request->ajax()) {
                return response()->json(['success' => false, 'error' => 'Configuration Discord manquante'], 500);
            }
            return view('membre', ['membres' => [], 'total' => 0, 'error' => 'Configuration Discord manquante']);
        }

        $client = new \GuzzleHttp\Client([
            'headers' => [
                'Authorization' => 'Bot ' . $token,
                'Content-Type' => 'application/json',
            ]
        ]);

        try {
            // Récupère tous les rôles
            $rolesResponse = $client->get("https://discord.com/api/v10/guilds/{$guildId}/roles");
            $roles = json_decode($rolesResponse->getBody(), true);

            $rolesById = [];
            foreach ($roles as $role) {
                $rolesById[$role['id']] = $role;
            }

            // Récupère les membres (1000 max)
            $membresResponse = $client->get("https://discord.com/api/v10/guilds/{$guildId}/members?limit=1000");
            $membres = json_decode($membresResponse->getBody(), true);

            $membresData = [];

            foreach ($membres as $membre) {
                // Ignorer les bots (optionnel - décommente si voulu)
                // if (($membre['user']['bot'] ?? false)) continue;

                // Trouver le rôle le plus haut
                $highestRole = null;
                $highestPosition = -1;

                foreach ($membre['roles'] as $roleId) {
                    if (isset($rolesById[$roleId])) {
                        $role = $rolesById[$roleId];
                        if ($role['position'] > $highestPosition) {
                            $highestPosition = $role['position'];
                            $highestRole = $role;
                        }
                    }
                }

                $displayName = $membre['nick'] ?? $membre['user']['global_name'] ?? $membre['user']['username'];
                $avatar = $membre['user']['avatar']
                    ? "https://cdn.discordapp.com/avatars/{$membre['user']['id']}/{$membre['user']['avatar']}.png"
                    : "https://cdn.discordapp.com/embed/avatars/" . (abs($membre['user']['id']) % 5) . ".png";

                $roleColor = null;
                if ($highestRole && isset($highestRole['color'])) {
                    $roleColor = '#' . str_pad(dechex($highestRole['color']), 6, '0', STR_PAD_LEFT);
                }

                $membresData[] = [
                    'id' => $membre['user']['id'],
                    'username' => $membre['user']['username'],
                    'display_name' => $displayName,
                    'display_name_lower' => strtolower($displayName),
                    'avatar' => $avatar,
                    'highest_role' => $highestRole ? [
                        'id' => $highestRole['id'],
                        'name' => $highestRole['name'],
                        'name_lower' => strtolower($highestRole['name']),
                        'color' => $highestRole['color'],
                        'color_hex' => $roleColor,
                        'position' => $highestRole['position'],
                    ] : null,
                    'roles_count' => count($membre['roles']),
                    'joined_at' => $membre['joined_at'],
                ];
            }

            // Trier par position du rôle (ordre décroissant)
            usort($membresData, function ($a, $b) {
                $posA = $a['highest_role']['position'] ?? -1;
                $posB = $b['highest_role']['position'] ?? -1;
                return $posB <=> $posA;
            });

            // ✅ CORRECTION : Appliquer le filtre APRÈS le tri
            $filteredData = $membresData;
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $filteredData = array_filter($membresData, function ($membre) use ($searchLower) {
                    $nameMatch = str_contains($membre['display_name_lower'], $searchLower);
                    $roleMatch = $membre['highest_role'] && str_contains($membre['highest_role']['name_lower'], $searchLower);
                    $usernameMatch = str_contains(strtolower($membre['username']), $searchLower);
                    return $nameMatch || $roleMatch || $usernameMatch;
                });
                // ✅ Réindexer le tableau après filtrage
                $filteredData = array_values($filteredData);
            }

            // Pagination
            $total = count($filteredData);
            $paginatedMembres = array_slice($filteredData, ($page - 1) * $perPage, $perPage);

            // ✅ Pour AJAX : retourner aussi la page courante et la recherche
            if ($request->ajax()) {
                $html = view('partials.membres-grid', ['membres' => $paginatedMembres])->render();

                return response()->json([
                    'success' => true,
                    'html' => $html,
                    'total' => $total,
                    'displayed' => count($paginatedMembres),
                    'page' => $page,
                    'perPage' => $perPage,
                    'hasMore' => ($page * $perPage) < $total,
                    'search' => $search  // ✅ Retourner la recherche pour debug
                ]);
            }

            // Vue normale
            return view('membre', [
                'membres' => $paginatedMembres,
                'total' => $total,
                'page' => $page,
                'perPage' => $perPage,
                'search' => $search
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur récupération membres: ' . $e->getMessage());

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'error' => $e->getMessage()
                ], 500);
            }

            return view('membre', [
                'membres' => [],
                'total' => 0,
                'error' => 'Impossible de charger les membres: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Récupère les données d'un membre pour le modal
     */
    public function getMembreData($id)
    {
        // ✅ CORRIGÉ
        $token = Config::get('discord.bot_token');
        $guildId = Config::get('discord.guild_id');

        // Sécurité
        if (!$token || !$guildId) {
            Log::error('Discord: Token ou Guild ID manquant pour getMembreData');
            return response()->json(['success' => false, 'error' => 'Configuration Discord manquante'], 500);
        }

        $client = new \GuzzleHttp\Client([
            'headers' => [
                'Authorization' => 'Bot ' . $token,
                'Content-Type' => 'application/json',
            ]
        ]);

        try {
            // Récupère les infos du membre
            $membreResponse = $client->get("https://discord.com/api/v10/guilds/{$guildId}/members/{$id}");
            $membre = json_decode($membreResponse->getBody(), true);

            // Récupère les rôles
            $rolesResponse = $client->get("https://discord.com/api/v10/guilds/{$guildId}/roles");
            $roles = json_decode($rolesResponse->getBody(), true);

            $rolesById = [];
            foreach ($roles as $role) {
                $rolesById[$role['id']] = $role;
            }

            // Récupère les rôles du membre
            $membreRoles = [];
            $highestRole = null;
            $highestPosition = -1;

            foreach ($membre['roles'] as $roleId) {
                if (isset($rolesById[$roleId])) {
                    $role = $rolesById[$roleId];
                    $membreRoles[] = $role;

                    if ($role['position'] > $highestPosition) {
                        $highestPosition = $role['position'];
                        $highestRole = $role;
                    }
                }
            }

            // Trier les rôles par position
            usort($membreRoles, function ($a, $b) {
                return $b['position'] <=> $a['position'];
            });

            $displayName = $membre['nick'] ?? $membre['user']['global_name'] ?? $membre['user']['username'];
            $avatar = $membre['user']['avatar']
                ? "https://cdn.discordapp.com/avatars/{$id}/{$membre['user']['avatar']}.png?size=1024"
                : "https://cdn.discordapp.com/embed/avatars/" . (abs($id) % 5) . ".png";

            $banner = null;
            if (!empty($membre['user']['banner'])) {
                $banner = "https://cdn.discordapp.com/banners/{$id}/{$membre['user']['banner']}.png?size=1024";
            }

            $data = [
                'id' => $id,
                'username' => $membre['user']['username'],
                'display_name' => $displayName,
                'avatar' => $avatar,
                'banner' => $banner,
                'is_bot' => $membre['user']['bot'] ?? false,
                'joined_at' => $membre['joined_at'],
                'roles' => $membreRoles,
                'roles_count' => count($membreRoles),
                'highest_role' => $highestRole,
            ];

            return response()->json([
                'success' => true,
                'data' => $data
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur récupération membre: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Impossible de charger les informations du membre'
            ], 500);
        }
    }

    /**
     * Version avec mise en cache
     */
    public function getMembresCached(Request $request)
    {
        return Cache::remember('discord_membres_response_' . $request->get('search', '') . '_page_' . $request->get('page', 1), 300, function () use ($request) {
            return $this->getMembres($request);
        });
    }

    /**
     * Récupère uniquement les statistiques globales
     */
    public function getStats()
    {
        // ✅ CORRIGÉ
        $token = Config::get('discord.bot_token');
        $guildId = Config::get('discord.guild_id');

        // Sécurité
        if (!$token || !$guildId) {
            Log::error('Discord: Token ou Guild ID manquant pour getStats');
            return response()->json(['success' => false, 'error' => 'Configuration Discord manquante'], 500);
        }

        $client = new \GuzzleHttp\Client([
            'headers' => [
                'Authorization' => 'Bot ' . $token,
                'Content-Type' => 'application/json',
            ]
        ]);

        try {
            $response = $client->get("https://discord.com/api/v10/guilds/{$guildId}?with_counts=true");
            $guild = json_decode($response->getBody(), true);

            return response()->json([
                'success' => true,
                'members' => $guild['approximate_member_count'] ?? 0,
                'online' => $guild['approximate_presence_count'] ?? 0,
                'name' => $guild['name'],
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}