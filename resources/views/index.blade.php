<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Inabikari Community | Home</title>
    <link rel="icon" href="{{ asset('images/raidencute.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#6c2bee",
                        "background-light": "#f6f6f8",
                        "background-dark": "#161022",
                        "surface-dark": "#1f1c27",
                        "border-dark": "#2e2839",
                    },
                    fontFamily: {
                        "display": ["Spline Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                   animation: {
    'float': 'float 6s ease-in-out infinite',
    'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
    'glow': 'glow 2s ease-in-out infinite',
    'slide-up': 'slideUp 0.5s ease-out',
    'slide-in-right': 'slideInRight 0.5s ease-out',
    'bounce-slow': 'bounce 3s infinite',
    'spin-slow': 'spin 8s linear infinite',
    'fade-in': 'fadeIn 1s ease-in',
    'scale-in': 'scaleIn 0.5s ease-out',
    'slide-down': 'slideDown 0.5s ease-out',
    'rotate-in': 'rotateIn 0.6s ease-out',
    'flip-in': 'flipIn 0.8s ease-out',
    'shake': 'shake 0.5s ease-in-out',
    'typing': 'typing 3s steps(40, end)',
    'blink-caret': 'blinkCaret 0.75s step-end infinite',
},
keyframes: {
    float: {
        '0%, 100%': { transform: 'translateY(0)' },
        '50%': { transform: 'translateY(-20px)' },
    },
    glow: {
        '0%, 100%': { boxShadow: '0 0 20px rgba(108, 43, 238, 0.4)' },
        '50%': { boxShadow: '0 0 40px rgba(108, 43, 238, 0.8)' },
    },
    slideUp: {
        '0%': { transform: 'translateY(20px)', opacity: '0' },
        '100%': { transform: 'translateY(0)', opacity: '1' },
    },
    slideInRight: {
        '0%': { transform: 'translateX(20px)', opacity: '0' },
        '100%': { transform: 'translateX(0)', opacity: '1' },
    },
    fadeIn: {
        '0%': { opacity: '0' },
        '100%': { opacity: '1' },
    },
    scaleIn: {
        '0%': { transform: 'scale(0.9)', opacity: '0' },
        '100%': { transform: 'scale(1)', opacity: '1' },
    },
    slideDown: {
        '0%': { transform: 'translateY(-20px)', opacity: '0' },
        '100%': { transform: 'translateY(0)', opacity: '1' },
    },
    rotateIn: {
        '0%': { transform: 'rotate(-10deg) scale(0.9)', opacity: '0' },
        '100%': { transform: 'rotate(0) scale(1)', opacity: '1' },
    },
    flipIn: {
        '0%': { transform: 'perspective(400px) rotateX(90deg)', opacity: '0' },
        '40%': { transform: 'perspective(400px) rotateX(-10deg)' },
        '70%': { transform: 'perspective(400px) rotateX(10deg)' },
        '100%': { transform: 'perspective(400px) rotateX(0)', opacity: '1' },
    },
    shake: {
        '0%, 100%': { transform: 'translateX(0)' },
        '10%, 30%, 50%, 70%, 90%': { transform: 'translateX(-5px)' },
        '20%, 40%, 60%, 80%': { transform: 'translateX(5px)' },
    },
    typing: {
        'from': { width: '0' },
        'to': { width: '100%' },
    },
    blinkCaret: {
        'from, to': { borderColor: 'transparent' },
        '50%': { borderColor: '#6c2bee' },
    },
},
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Spline Sans', sans-serif;
            scroll-behavior: smooth;
        }

        .glass-effect {
            background: rgba(31, 28, 39, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(108, 43, 238, 0.2);
        }

        .hero-gradient {
            background: linear-gradient(180deg, rgba(22, 16, 34, 0.4) 0%, rgba(22, 16, 34, 0.95) 100%);
        }

        .neon-glow {
            box-shadow: 0 0 15px rgba(108, 43, 238, 0.4);
        }

        /* Particules flottantes */
        .floating-particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(108, 43, 238, 0.3);
            border-radius: 50%;
            pointer-events: none;
        }

        @keyframes particleFloat {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 0.5;
            }

            90% {
                opacity: 0.5;
            }

            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }

        /* Animation de gradient */
        .animated-gradient {
            background: linear-gradient(-45deg, #6c2bee, #9f5eff, #6c2bee, #4a1ea8);
            background-size: 300% 300%;
            animation: gradient 8s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Effet de scintillement */
        .twinkle {
            animation: twinkle 2s ease-in-out infinite;
        }

        @keyframes twinkle {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.3;
            }
        }

        /* Animation de vague */
        .wave {
            animation: wave 2.5s ease-in-out infinite;
        }

        @keyframes wave {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(10deg);
            }

            75% {
                transform: rotate(-10deg);
            }
        }

        /* Hover animations */
        .hover-lift {
            transition: transform 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
        }

        .hover-glow {
            transition: box-shadow 0.3s ease;
        }

        .hover-glow:hover {
            box-shadow: 0 0 30px rgba(108, 43, 238, 0.6);
        }

        /* Loading spinner */
        .loading-spinner {
            animation: spin 1s linear infinite;
        }

        /* Améliorations responsive supplémentaires */
        @media (max-width: 768px) {
            .hero-gradient {
                background: linear-gradient(180deg, rgba(22, 16, 34, 0.6) 0%, rgba(22, 16, 34, 0.98) 100%);
            }

            header {
                min-height: 500px;
            }

            h1 {
                font-size: 2.5rem;
                line-height: 1.2;
            }
        }

        @media (max-width: 480px) {
            header {
                min-height: 450px;
            }

            h1 {
                font-size: 2rem;
            }
        }

        /* Ajustement spécifique pour tablettes */
        @media (min-width: 768px) and (max-width: 1024px) {
            header {
                height: 550px;
            }

            h1 {
                font-size: 3.5rem;
            }
        }
        @keyframes gradientBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.animated-bg {
    background: linear-gradient(-45deg, #6c2bee, #9f5eff, #6c2bee, #4a1ea8);
    background-size: 300% 300%;
    animation: gradientBG 8s ease infinite;
}

@keyframes borderPulse {
    0%, 100% { border-color: rgba(108, 43, 238, 0.3); }
    50% { border-color: rgba(108, 43, 238, 0.8); }
}

.border-pulse {
    animation: borderPulse 2s ease-in-out infinite;
}

@keyframes textGlow {
    0%, 100% { text-shadow: 0 0 10px rgba(108, 43, 238, 0.5); }
    50% { text-shadow: 0 0 20px rgba(108, 43, 238, 0.8); }
}

.text-glow {
    animation: textGlow 3s ease-in-out infinite;
}

/* Animation de chargement */
.loading-dots::after {
    content: '...';
    animation: dots 1.5s steps(4, end) infinite;
}

@keyframes dots {
    0%, 20% { content: '.'; }
    40% { content: '..'; }
    60%, 100% { content: '...'; }
}

/* Effet de révélation au scroll */
.reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease;
}

.reveal.active {
    opacity: 1;
    transform: translateY(0);
}

/* Animation de survol améliorée */
.hover-rotate {
    transition: transform 0.3s ease;
}

.hover-rotate:hover {
    transform: rotate(5deg) scale(1.05);
}

.hover-scale-down {
    transition: transform 0.3s ease;
}

.hover-scale-down:hover {
    transform: scale(0.95);
}

/* Animation de pulsation de couleur */
@keyframes colorPulse {
    0%, 100% { color: #6c2bee; }
    50% { color: #9f5eff; }
}

.color-pulse {
    animation: colorPulse 3s ease-in-out infinite;
}
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-white min-h-screen selection:bg-primary selection:text-white overflow-x-hidden">

    <!-- Particules animées -->
    <div class="fixed inset-0 pointer-events-none z-0" id="particles"></div>

    <!-- Top Navigation Bar avec animation -->
    <!-- Top Navigation Bar avec animation et menu hamburger -->
<nav class="sticky top-0 z-50 border-b border-border-dark bg-background-dark/80 backdrop-blur-md animate-slide-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo avec animation -->
            <div class="flex items-center gap-3 group">
                <div class="bg-primary p-1.5 rounded-lg transition-all duration-500 group-hover:rotate-12 group-hover:scale-110">
                    <span class="material-symbols-outlined text-white text-2xl animate-pulse-slow">rocket_launch</span>
                </div>
                <span class="text-xl font-bold tracking-tight text-white group-hover:text-primary transition-colors">{{ $serverName ?? 'Inabikari' }} Hub</span>
            </div>

            <!-- Desktop Nav Links (caché sur mobile) -->
            <div class="hidden md:flex items-center gap-8">
                <a class="text-sm font-medium text-white hover:text-primary transition-all hover:scale-110"
                    href="">Accueil</a>
                <a class="text-sm font-medium text-slate-400 hover:text-white transition-all hover:scale-110"
                    href="{{ route('membre') }}">À propos de nous</a>
                <a class="text-sm font-medium text-slate-400 hover:text-white transition-all hover:scale-110"
                    href="{{ route('activite') }}">Activités</a>
            </div>

            <!-- Boutons à droite (toujours visibles) -->
            <div class="flex items-center gap-4">
                <!-- Bouton Discord (caché sur mobile pour économiser de l'espace, optionnel) -->
                <a href="https://discord.gg/SjTRDRaAc6" target="_blank" class="hidden md:block">
                    <button class="bg-primary hover:bg-primary/90 text-white px-5 py-2 rounded-lg text-sm font-bold transition-all duration-300 neon-glow hover:scale-110 flex items-center gap-2 animate-pulse-slow">
                        <span class="material-symbols-outlined text-lg wave">chat</span>
                        Rejoins-nous
                    </button>
                </a>
                
                <!-- Bouton Hamburger (visible uniquement sur mobile) -->
                <button id="menu-btn" class="md:hidden text-white p-2 hover:bg-primary/20 rounded-lg transition-colors">
                    <span class="material-symbols-outlined text-3xl">menu</span>
                </button>
            </div>
        </div>

        <!-- Menu Mobile (caché par défaut) -->
        <div id="mobile-menu" class="hidden md:hidden py-4 border-t border-border-dark mt-2">
            <div class="flex flex-col space-y-3">
                <a class="text-base font-medium text-white hover:text-primary transition-colors py-2 px-3 rounded-lg hover:bg-primary/10"
                    href="">Accueil</a>
                <a class="text-base font-medium text-slate-400 hover:text-white transition-colors py-2 px-3 rounded-lg hover:bg-primary/10"
                    href="{{ route('membre') }}">À propos de nous</a>
                <a class="text-base font-medium text-slate-400 hover:text-white transition-colors py-2 px-3 rounded-lg hover:bg-primary/10"
                    href="{{ route('activite') }}">Activités</a>
                <!-- Lien Discord pour mobile -->
                <a href="https://discord.gg/SjTRDRaAc6" target="_blank" class="mt-2">
                    <button class="w-full bg-primary hover:bg-primary/90 text-white px-5 py-3 rounded-lg text-base font-bold transition-all duration-300 neon-glow flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">chat</span>
                        Rejoins-nous
                    </button>
                </a>
            </div>
        </div>
    </div>
</nav>

    <!-- Hero Section -->
    <header class="relative w-full min-h-[500px] md:h-[600px] flex items-center overflow-hidden" id="home">
        <!-- Arrière-plan GIF -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 hero-gradient z-10"></div>
            <img alt="Community Background" class="w-full h-full object-cover hidden md:block animate-pulse-slow"
                src="{{ asset('images/inabikari.gif') }}" />
            <img alt="Community Background Mobile" class="w-full h-full object-cover md:hidden animate-pulse-slow"
                src="{{ asset('images/inabikari.gif') }}" style="object-position: center; transform: scale(1.2);" />
        </div>

        <!-- Contenu -->
        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center md:text-left py-12 md:py-0">
            <div
                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/20 border border-primary/30 text-primary text-xs font-bold mb-4 md:mb-6">
                <span class="relative flex h-2 w-2">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                </span>
                {{ number_format($onlineCount ?? 4203, 0, ',', ' ') }} EN LIGNE
            </div>
            <h1 class="text-4xl sm:text-5xl md:text-7xl font-extrabold text-white leading-tight tracking-tighter mb-4 md:mb-6 max-w-3xl mx-auto md:mx-0 overflow-hidden border-r-4 border-primary whitespace-nowrap animate-typing"
    style="animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;">
    La communauté Gaming <span class="text-primary"> <br> La plus loufoque.</span>
</h1>
            <p class="text-base sm:text-lg md:text-xl text-slate-300 max-w-2xl mx-auto md:mx-0 mb-6 md:mb-10 leading-relaxed px-4 md:px-0"
                style="animation-delay: 0.2s">
                Rejoins nos <span class="text-primary font-bold">{{ number_format($membersCount ?? 15402, 0, ',', ' ') }}</span> membres, développeurs et créateurs de contenu dans l'écosystème le plus
                dynamique. Farm la victoire !
            </p>
            <div class="flex flex-col sm:flex-row items-center gap-3 sm:gap-4 justify-center md:justify-start px-4 md:px-0"
                style="animation-delay: 0.3s">
                <a href="https://discord.gg/SjTRDRaAc6" target="_blank">
                    <button
                        class="w-full sm:w-auto bg-primary hover:scale-110 transition-all duration-300 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-xl text-base sm:text-lg font-bold flex items-center justify-center gap-2 sm:gap-3 hover-glow group">
                        <span class="material-symbols-outlined group-hover:rotate-12 transition-transform">group_add</span>
                        Commence maintenant
                    </button>
                </a>
            </div>
        </div>
    </header>

    <!-- Quick Stats - MAINTENANT AVEC 3 CARTES ! -->
    <section class="max-w-7xl mx-auto px-4 -mt-16 relative z-30">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Carte 1 - Membres -->
            <div class="bg-surface-dark border border-border-dark p-6 rounded-xl flex items-center gap-5 hover-lift hover-glow transition-all duration-300 animate-slide-up"
                style="animation-delay: 0.4s">
                <div class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary animate-bounce-slow hover-rotate">
    <span class="material-symbols-outlined text-3xl">groups</span>
</div>
                <div>
                    <p class="text-slate-400 text-sm font-medium">Total des membres</p>
                    <p class="text-2xl font-bold text-white animate-pulse">{{ number_format($membersCount ?? 15402, 0, ',', ' ') }}</p>
                </div>
            </div>

            <!-- Carte 2 - Membres en ligne (NOUVEAU) -->
            <div class="bg-surface-dark border border-border-dark p-6 rounded-xl flex items-center gap-5 hover-lift hover-glow transition-all duration-300 animate-slide-up"
                style="animation-delay: 0.5s">
                <div
                    class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary animate-pulse-slow">
                    <span class="material-symbols-outlined text-3xl">online_prediction</span>
                </div>
                <div>
                    <p class="text-slate-400 text-sm font-medium">Membres en ligne</p>
                    <p class="text-2xl font-bold text-white">{{ number_format($onlineCount ?? 4203, 0, ',', ' ') }}</p>
                </div>
            </div>

            <!-- Carte 3 - Rôles disponibles -->
            <div class="bg-surface-dark border border-border-dark p-6 rounded-xl flex items-center gap-5 hover-lift hover-glow transition-all duration-300 animate-slide-up"
                style="animation-delay: 0.6s">
                <div
                    class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary animate-spin-slow">
                    <span class="material-symbols-outlined text-3xl">military_tech</span>
                </div>
                <div>
                    <p class="text-slate-400 text-sm font-medium">Rôles disponibles</p>
                    <p class="text-2xl font-bold text-white">{{ count($roles ?? []) }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="about">
        <div class="flex flex-col lg:flex-row gap-16 items-center">
            <div class="lg:w-1/2 animate-slide-up">
                <div class="flex items-center gap-4 mb-6">
                    @if(isset($serverIcon) && $serverIcon)
                        <img src="{{ $serverIcon }}" alt="Icône du serveur" class="w-16 h-16 rounded-full border-2 border-primary">
                    @endif
                    <h2 class="text-4xl font-black text-white hover:text-primary transition-colors">Bienvenue dans {{ $serverName ?? 'Inabikari' }}</h2>
                </div>
                <p class="text-slate-400 text-lg leading-relaxed mb-8">
                    {{ $serverName ?? 'Inabikari' }} est une communauté gaming rassemblant des passionnés autour de titres compétitifs tels que
                    League of Legends, Valorant, Apex Legends, Fortnite, Brawlhalla, Genshin Impact, Honkai: Star Rail,
                    et plus encore.
                    Notre serveur est un lieu d'échange, de fun et de compétition saine, où chacun peut trouver sa
                    place, du joueur casual au compétiteur.
                </p>
                
                <!-- Statistiques supplémentaires -->
                <div class="grid grid-cols-2 gap-4 mt-8">
                    <div class="bg-surface-dark p-4 rounded-xl border border-border-dark text-center">
                        <span class="material-symbols-outlined text-primary">calendar_month</span>
                        <p class="text-xl font-bold text-white">Mai 2022</p>
                        <p class="text-xs text-slate-400">Création</p>
                    </div>
                    <div class="bg-surface-dark p-4 rounded-xl border border-border-dark text-center">
                        <span class="material-symbols-outlined text-primary">military_tech</span>
                        <p class="text-xl font-bold text-white">{{ count($roles ?? []) }}</p>
                        <p class="text-xs text-slate-400">Rôles</p>
                    </div>
                </div>
            </div>
            
            <div class="lg:w-1/2 grid grid-cols-2 gap-4">
                <div class="space-y-4">
                    <img alt="Gaming Setup"
    class="w-full h-64 object-cover rounded-2xl border border-border-dark hover-lift hover-glow transition-all duration-500"
    src="{{ asset('images/2XKO.jpg') }}" />
                    <img alt="Tech Mix"
                        class="w-full h-48 object-cover rounded-2xl border border-border-dark hover-lift hover-glow transition-all duration-500"
                        src="{{ asset('images/star-rail.png') }}" />
                </div>
                <div class="space-y-4 pt-8">
                    <img alt="Arena"
                        class="w-full h-48 object-cover rounded-2xl border border-border-dark hover-lift hover-glow transition-all duration-500"
                        src="{{ asset('images/rivals.jpg') }}" />
                    <img alt="Competition"
    class="w-full h-64 object-cover object-left rounded-2xl border border-border-dark hover-lift hover-glow transition-all duration-500"
    src="{{ asset('images/peak.png') }}" />
                </div>
            </div>
        </div>
    </section>

    <!-- Section Rôles Discord -->
    <section class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-surface-dark/50 rounded-2xl border border-border-dark p-8">
            <div class="flex items-center gap-3 mb-8">
                <span class="material-symbols-outlined text-4xl text-primary">badge</span>
                <h3 class="text-2xl font-bold text-white">Rôles du serveur ({{ count($roles ?? []) }})</h3>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @forelse($roles ?? [] as $role)
                    <div class="bg-surface-dark p-3 rounded-lg border border-border-dark text-center hover:scale-105 transition-transform">
                        <div class="w-4 h-4 rounded-full mx-auto mb-2" style="background-color: #{{ dechex($role['color'] ?? 0) }}"></div>
                        <span class="text-sm font-medium text-white">{{ $role['name'] }}</span>
                    </div>
                @empty
                    <div class="col-span-full text-center text-slate-400 py-8">
                        <span class="material-symbols-outlined text-4xl mb-2">info</span>
                        <p>Chargement des rôles en cours...</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Rules Section (inchangée) -->
    <section class="py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="rules">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-white mb-4">Règles du serveur</h2>
            <p class="text-slate-400 max-w-2xl mx-auto">Veuillez lire attentivement les règles suivantes avant de vous
                inscrire sur le serveur.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Règle 1 - Respect -->
            <div
                class="flex gap-5 p-6 bg-surface-dark rounded-2xl border border-border-dark transition-all duration-300 hover:scale-[1.02] hover:border-primary/50 group">
                <div
                    class="flex-shrink-0 text-primary transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                    <span class="material-symbols-outlined text-4xl">handshake</span>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-white mb-2 group-hover:text-primary transition-colors">1.
                        Respectez tous les membres</h4>
                    <p class="text-slate-400 text-sm leading-relaxed">Ici, pas de place pour le harcèlement, la haine ou
                        la toxicité. On construit ensemble un espace où chaque joueur, quel que soit son niveau ou son
                        origine, se sent chez lui.</p>
                </div>
            </div>

            <!-- Règle 2 - Pas de spam -->
            <div
                class="flex gap-5 p-6 bg-surface-dark rounded-2xl border border-border-dark transition-all duration-300 hover:scale-[1.02] hover:border-primary/50 group">
                <div
                    class="flex-shrink-0 text-primary transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-3">
                    <span class="material-symbols-outlined text-4xl">block</span>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-white mb-2 group-hover:text-primary transition-colors">2. Pas de
                        spam ou de publicité</h4>
                    <p class="text-slate-400 text-sm leading-relaxed">Pas de spam de mentions ou d'emojis. Envie de
                        promouvoir quelque chose ? Demande au staff avant – on est là pour garder le chat cool pour tout
                        le monde.</p>
                </div>
            </div>

            <!-- Règle 3 - Décisions des modos -->
            <div
                class="flex gap-5 p-6 bg-surface-dark rounded-2xl border border-border-dark transition-all duration-300 hover:scale-[1.02] hover:border-primary/50 group md:col-span-2">
                <div
                    class="flex-shrink-0 text-primary transition-all duration-300 group-hover:scale-110 group-hover:animate-pulse">
                    <span class="material-symbols-outlined text-4xl">hearing</span>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-white mb-2 group-hover:text-primary transition-colors">3. Les
                        décisions des modos sont définitives</h4>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        On écoute le staff, c'est plus simple pour tout le monde. Si tu continues après un
                        avertissement, prépare-toi à un ban temporaire.
                    </p>
                </div>
            </div>
        </div>

        <!-- Citation mantra -->
        <div
            class="mt-12 p-8 bg-primary/5 border border-primary/20 rounded-2xl text-center transition-all duration-300 hover:border-primary/40 hover:shadow-lg hover:shadow-primary/20">
            <div class="flex justify-center mb-4">
                <span class="material-symbols-outlined text-5xl text-primary opacity-50">format_quote</span>
            </div>
            <p class="text-slate-300 italic text-lg mb-2">"Inabikari, c'est les amis qu'on se fait tout au long du
                chemin."</p>
            <p class="text-primary font-bold mt-2 text-xl flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-2xl opacity-70">star</span>
                — Le mantra d'Inabikari
                <span class="material-symbols-outlined text-2xl opacity-70">star</span>
            </p>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 animated-gradient opacity-20 z-0"></div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-black text-white mb-8 animate-slide-up">Prêt à commencer l'aventure?
            </h2>
            <a href="https://discord.gg/SjTRDRaAc6" target="_blank">
                <button
                    class="bg-primary hover:scale-110 transition-all duration-300 text-white px-10 py-5 rounded-2xl text-xl font-black shadow-2xl shadow-primary/40 inline-flex items-center gap-4 hover-glow group animate-bounce-slow">
                    <span class="material-symbols-outlined text-3xl group-hover:rotate-12 transition-transform">chat</span>
                    REJOINS NOS {{ number_format($membersCount ?? 15000, 0, ',', ' ') }} MEMBRES !
                </button>
            </a>
            <p class="mt-6 text-slate-500 text-sm animate-pulse">En rejoignant, tu acceptes nos règles.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-background-dark border-t border-border-dark pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-slate-500">
                <p class="hover:text-white transition-colors">© 2026 Inabikari. Tous droits réservés.</p>
                <p class="hover:text-white transition-colors">{{ $serverName ?? 'Inabikari' }}</p>
                <div class="flex items-center gap-2 hover:text-white transition-colors group">
                    <span>Powered by</span>
                    <span class="text-slate-300 font-bold group-hover:text-primary transition-colors">Laravel</span>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            if (!particlesContainer) return;

            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.className = 'floating-particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animation = `particleFloat ${10 + Math.random() * 20}s linear infinite`;
                particle.style.animationDelay = -Math.random() * 20 + 's';
                particle.style.background = `rgba(108, 43, 238, ${0.1 + Math.random() * 0.3})`;
                particle.style.width = 2 + Math.random() * 4 + 'px';
                particle.style.height = particle.style.width;
                particlesContainer.appendChild(particle);
            }
        }

        function handleScrollAnimation() {
            const elements = document.querySelectorAll('.animate-slide-up, .animate-slide-in-right');
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementBottom = element.getBoundingClientRect().bottom;
                const windowHeight = window.innerHeight;

                if (elementTop < windowHeight * 0.9 && elementBottom > 0) {
                    element.style.animationPlayState = 'running';
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            createParticles();
            handleScrollAnimation();
        });

        window.addEventListener('scroll', handleScrollAnimation);
          // Menu Hamburger
    document.addEventListener('DOMContentLoaded', function() {
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                
                // Change l'icône entre menu et close
                const icon = menuBtn.querySelector('.material-symbols-outlined');
                if (icon.textContent === 'menu') {
                    icon.textContent = 'close';
                } else {
                    icon.textContent = 'menu';
                }
            });

            // Ferme le menu quand on clique sur un lien
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                    const icon = menuBtn.querySelector('.material-symbols-outlined');
                    icon.textContent = 'menu';
                });
            });
        }
    });
    </script>
</body>

</html>