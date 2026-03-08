<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Membres du serveur | Inabikari Community</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
        <link rel="icon" href="{{ asset('raidencute.ico') }}" type="image/x-icon">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#6c2bee",
                        "background-light": "#f6f6f8",
                        "background-dark": "#161022",
                    },
                    fontFamily: {
                        "display": ["Spline Sans", "sans-serif"]
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
                        'fade-in-down': 'fadeInDown 0.6s ease-out',
                        'scale-in': 'scaleIn 0.4s ease-out',
                        'slide-in-right': 'slideInRight 0.5s ease-out',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 2s infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeInDown: {
                            '0%': { opacity: '0', transform: 'translateY(-20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        scaleIn: {
                            '0%': { opacity: '0', transform: 'scale(0.95)' },
                            '100%': { opacity: '1', transform: 'scale(1)' },
                        },
                        slideInRight: {
                            '0%': { opacity: '0', transform: 'translateX(20px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-5px)' },
                        },
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Spline Sans', sans-serif;
        }

        .membre-card {
            opacity: 0;
            animation: cardAppear 0.5s ease-out forwards;
        }
        
        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .membre-card:hover {
            transform: translateY(-4px);
            transition: transform 0.3s ease;
        }

        .role-glow {
            box-shadow: 0 0 15px rgba(108, 43, 238, 0.3);
        }

        /* Animation de chargement */
        .loading-spinner {
            border: 3px solid rgba(108, 43, 238, 0.1);
            border-top-color: #6c2bee;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Styles du modal */
        #membre-modal {
            display: none;
        }
        
        #membre-modal.show {
            display: block;
        }
        
        .modal-content {
            animation: modalSlideIn 0.3s ease-out;
        }
        
        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .modal-overlay {
            animation: fadeIn 0.2s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        /* Scrollbar stylisée pour la liste des rôles */
        .roles-scroll::-webkit-scrollbar {
            width: 4px;
        }
        
        .roles-scroll::-webkit-scrollbar-track {
            background: rgba(108, 43, 238, 0.1);
            border-radius: 10px;
        }
        
        .roles-scroll::-webkit-scrollbar-thumb {
            background: rgba(108, 43, 238, 0.5);
            border-radius: 10px;
        }
        
        .roles-scroll::-webkit-scrollbar-thumb:hover {
            background: rgba(108, 43, 238, 0.8);
        }

        /* Animation pour les stats */
        .stat-card {
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: scale(1.05);
            background-color: rgba(108, 43, 238, 0.15);
        }

        /* Animation pour les rôles dans le modal */
        .role-badge {
            transition: all 0.2s ease;
        }
        
        .role-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen">
    <div class="relative flex flex-col min-h-screen w-full overflow-x-hidden">
        <!-- Navigation Bar -->
        <nav class="sticky top-0 z-50 border-b border-border-dark bg-background-dark/80 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex items-center gap-3 group">
                <div class="bg-primary p-1.5 rounded-lg transition-all duration-500 group-hover:rotate-12 group-hover:scale-110">
                    <span class="material-symbols-outlined text-white text-2xl">rocket_launch</span>
                </div>
                <span class="text-xl font-bold tracking-tight text-white group-hover:text-primary transition-colors">Inabikari Hub</span>
            </div>

            <!-- Desktop Nav Links (caché sur mobile) -->
            <div class="hidden md:flex items-center gap-8">
                <a class="text-sm font-medium text-white hover:text-primary transition-all hover:scale-110" href="{{ route('home') }}">Accueil</a>
                <a class="text-sm font-medium text-slate-400 hover:text-white transition-all hover:scale-110" href="#">À propos de nous</a>
                <a class="text-sm font-medium text-slate-400 hover:text-white transition-all hover:scale-110" href="{{ route('activite') }}">Activités</a>
            </div>

            <!-- Boutons à droite -->
            <div class="flex items-center gap-4">
                <!-- Bouton Discord (caché sur mobile) -->
                <a href="https://discord.gg/SjTRDRaAc6" target="_blank" class="hidden md:block">
                    <button class="bg-primary hover:bg-primary/90 text-white px-5 py-2 rounded-lg text-sm font-bold transition-all duration-300 neon-glow hover:scale-110 flex items-center gap-2">
                        <span class="material-symbols-outlined text-lg">chat</span>
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
                <a class="text-base font-medium text-white hover:text-primary transition-colors py-2 px-3 rounded-lg hover:bg-primary/10" href="{{ route('home') }}">Accueil</a>
                <a class="text-base font-medium text-slate-400 hover:text-white transition-colors py-2 px-3 rounded-lg hover:bg-primary/10" href="#">À propos de nous</a>
          <a class="text-base font-medium text-slate-400 hover:text-white transition-colors py-2 px-3 rounded-lg hover:bg-primary/10" href="{{ route('activite') }}">Activités</a>
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

        <!-- Main Content -->
        <main class="flex-1 w-full max-w-7xl mx-auto px-6 lg:px-20 py-12">
            <!-- Header Section -->
            <div class="mb-10 space-y-2 animate-fade-in-up">
                <h2 class="text-4xl lg:text-5xl font-black tracking-tighter dark:text-white">Les Membres du serveur</h2>
                <p class="text-slate-500 dark:text-slate-400 max-w-2xl text-lg">
                    Parcours notre communauté de <span id="total-membres" class="text-primary font-bold">{{ number_format($total ?? 1248, 0, ',', ' ') }}</span> membres
                </p>
            </div>

            <!-- Search Bar -->
            <div class="sticky top-[88px] z-40 bg-background-light dark:bg-background-dark py-4 flex flex-col gap-6 mb-8 animate-fade-in-up" style="animation-delay: 0.1s">
                <div class="relative group max-w-2xl">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">search</span>
                    <input id="search-input" 
                           type="text"
                           value="{{ $search ?? '' }}"
                           class="w-full bg-slate-200 dark:bg-primary/5 border-none focus:ring-2 focus:ring-primary rounded-xl py-4 pl-12 pr-4 text-slate-900 dark:text-white placeholder:text-slate-500 transition-all focus:scale-[1.02]"
                           placeholder="Rechercher un membre par nom ou rôle..." />
                </div>
            </div>

            <!-- Loading Indicator -->
            <div id="loading" class="hidden flex justify-center py-12">
                <div class="loading-spinner"></div>
            </div>

            <!-- Grid of Members -->
            <div id="membres-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @include('partials.membres-grid', ['membres' => $membres ?? []])
            </div>

            <!-- Load More Button -->
            <div id="load-more-container" class="mt-16 flex flex-col items-center gap-4 animate-fade-in-up" style="animation-delay: 0.2s">
                @if(($total ?? 0) > count($membres ?? []))
                <button id="load-more-btn" 
                        class="px-8 py-3 rounded-xl border border-primary/30 text-primary font-bold hover:bg-primary hover:text-white transition-all duration-300 flex items-center gap-2 hover:scale-110 hover:shadow-lg hover:shadow-primary/20"
                        data-page="1">
                    <span class="material-symbols-outlined group-hover:rotate-12 transition-transform">expand_more</span>
                    Charger plus de membres
                </button>
                @endif
            </div>
        </main>

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
    </div>

    <!-- MODAL PROFIL -->
    <div id="membre-modal" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay -->
            <div class="modal-overlay fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity" aria-hidden="true" id="modal-overlay"></div>

            <!-- Conteneur du modal -->
            <div class="modal-content inline-block align-bottom bg-surface-dark rounded-3xl border border-border-dark text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl w-full">
                
                <!-- Contenu du modal (rempli dynamiquement) -->
                <div id="modal-content" class="relative min-h-[400px]">
                    <div class="flex justify-center items-center p-12">
                        <div class="loading-spinner"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Éléments existants
            const searchInput = document.getElementById('search-input');
            const membresGrid = document.getElementById('membres-grid');
            const loading = document.getElementById('loading');
            const loadMoreBtn = document.getElementById('load-more-btn');
            const displayedCount = document.getElementById('displayed-count');
            const totalCount = document.getElementById('total-count');
            const totalMembresSpan = document.getElementById('total-membres');
            
            // Éléments du modal
            const modal = document.getElementById('membre-modal');
            const modalContent = document.getElementById('modal-content');
            const overlay = document.getElementById('modal-overlay');
            
            let currentPage = 1;
            let currentSearch = searchInput.value;
            let isLoading = false;

            // Fonction pour formater les dates
            function formatDate(dateString) {
                const date = new Date(dateString);
                return date.toLocaleDateString('fr-FR', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                });
            }

            // Fonction pour calculer l'ancienneté
            function getMembershipDuration(joinedAt) {
                const joinDate = new Date(joinedAt);
                const now = new Date();
                const diffTime = Math.abs(now - joinDate);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                
                if (diffDays < 30) return `${diffDays} jours`;
                if (diffDays < 365) return `${Math.floor(diffDays / 30)} mois`;
                return `${Math.floor(diffDays / 365)} an${Math.floor(diffDays / 365) > 1 ? 's' : ''}`;
            }

            // Fonction pour générer le HTML du modal
            function generateModalHtml(data) {
                const joinDate = new Date(data.joined_at);
                const formattedDate = joinDate.toLocaleDateString('fr-FR', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                });
                
                // Calcul de l'ancienneté
                const now = new Date();
                const diffTime = Math.abs(now - joinDate);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                let anciennete = '';
                if (diffDays < 30) anciennete = `${diffDays} jours`;
                else if (diffDays < 365) anciennete = `${Math.floor(diffDays / 30)} mois`;
                else anciennete = `${Math.floor(diffDays / 365)} an${Math.floor(diffDays / 365) > 1 ? 's' : ''}`;

                // Génération des rôles avec couleurs formatées correctement
                let rolesHtml = '';
                if (data.roles && data.roles.length > 0) {
                    data.roles.forEach(role => {
                        // Formater la couleur correctement (toujours 6 chiffres hexadécimaux)
                        let color = '#6c2bee'; // Couleur par défaut
                        
                        if (role.color) {
                            // Convertir en hexadécimal et s'assurer qu'il y a 6 chiffres
                            const hexColor = role.color.toString(16).padStart(6, '0');
                            color = '#' + hexColor;
                        }
                        
                        rolesHtml += `
                            <span class="role-badge px-4 py-2 rounded-xl text-sm font-medium inline-block"
                                  style="background-color: ${color}20; color: ${color}; border: 1px solid ${color}30;">
                                ${role.name}
                            </span>
                        `;
                    });
                }

                // Bannière ou fond par défaut
                const bannerHtml = data.banner 
                    ? `<div class="h-40 w-full bg-cover bg-center animate-scale-in" style="background-image: url('${data.banner}')"></div>`
                    : `<div class="h-32 w-full bg-gradient-to-r from-primary to-purple-600 animate-pulse-slow"></div>`;

                return `
                    <div class="relative bg-surface-dark animate-scale-in">
                        <!-- Bouton fermer -->
                        <button class="close-modal absolute top-4 right-4 text-slate-400 hover:text-white z-10 bg-surface-dark/80 rounded-full p-1 hover:rotate-90 transition-transform duration-300">
                            <span class="material-symbols-outlined text-3xl">close</span>
                        </button>
                        
                        ${bannerHtml}
                        
                        <div class="px-8 pb-8">
                            <!-- Avatar et infos principales -->
                            <div class="flex flex-col md:flex-row items-start gap-6 -mt-16 mb-6 animate-fade-in-up">
                                <div class="relative group">
                                    <img src="${data.avatar}" alt="${data.display_name}" 
                                         class="w-28 h-28 rounded-full border-4 border-surface-dark shadow-xl group-hover:scale-110 transition-transform duration-300">
                                    <div class="absolute inset-0 rounded-full bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>
                                
                                <div class="flex-1 mt-12 md:mt-8">
                                    <div class="flex items-center gap-3 flex-wrap">
                                        <h2 class="text-3xl font-black text-white">${data.display_name}</h2>
                                        ${data.is_bot ? '<span class="px-3 py-1 bg-primary/20 text-primary rounded-full text-sm font-bold animate-pulse-slow">BOT</span>' : ''}
                                    </div>
                                    <p class="text-slate-400 text-lg">@${data.username}</p>
                                </div>
                            </div>
                            
                            <!-- Stats cards avec fond coloré -->
                            <div class="bg-primary/10 p-6 rounded-2xl mb-6 border border-primary/20 animate-fade-in-up" style="animation-delay: 0.1s">
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="stat-card text-center">
                                        <span class="material-symbols-outlined text-primary text-2xl mb-1 animate-float">calendar_month</span>
                                        <p class="text-lg font-bold text-white">${formattedDate}</p>
                                        <p class="text-xs text-slate-400">Arrivée</p>
                                    </div>
                                    <div class="stat-card text-center">
                                        <span class="material-symbols-outlined text-primary text-2xl mb-1 animate-float" style="animation-delay: 0.2s">military_tech</span>
                                        <p class="text-lg font-bold text-white">${data.roles_count}</p>
                                        <p class="text-xs text-slate-400">Rôles</p>
                                    </div>
                                    <div class="stat-card text-center">
                                        <span class="material-symbols-outlined text-primary text-2xl mb-1 animate-float" style="animation-delay: 0.3s">schedule</span>
                                        <p class="text-lg font-bold text-white">${anciennete}</p>
                                        <p class="text-xs text-slate-400">Ancienneté</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Liste des rôles avec fond coloré -->
                            ${data.roles && data.roles.length > 0 ? `
                                <div class="bg-primary/5 p-6 rounded-2xl border border-primary/20 animate-fade-in-up" style="animation-delay: 0.2s">
                                    <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                                        <span class="material-symbols-outlined text-primary animate-spin-slow">badge</span>
                                        RÔLES (${data.roles_count})
                                    </h3>
                                    <div class="flex flex-wrap gap-2 max-h-48 overflow-y-auto roles-scroll">
                                        ${rolesHtml}
                                    </div>
                                </div>
                            ` : ''}
                        </div>
                    </div>
                `;
            }

            // Fonction pour ouvrir le modal
            function openModal(memberId) {
                modal.classList.add('show');
                document.body.style.overflow = 'hidden';
                
                // Charger les données du membre
                fetch(`/membre-data/${memberId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            modalContent.innerHTML = generateModalHtml(data.data);
                        } else {
                            modalContent.innerHTML = `
                                <div class="p-8 text-center">
                                    <span class="material-symbols-outlined text-6xl text-red-500 mb-4 animate-bounce">error</span>
                                    <p class="text-red-400">${data.error || 'Erreur lors du chargement'}</p>
                                    <button class="close-modal mt-4 px-4 py-2 bg-primary rounded-lg hover:scale-110 transition-transform">Fermer</button>
                                </div>
                            `;
                        }
                    })
                    .catch(error => {
                        modalContent.innerHTML = `
                            <div class="p-8 text-center">
                                <span class="material-symbols-outlined text-6xl text-red-500 mb-4 animate-bounce">error</span>
                                <p class="text-red-400">Erreur de connexion</p>
                                <button class="close-modal mt-4 px-4 py-2 bg-primary rounded-lg hover:scale-110 transition-transform">Fermer</button>
                            </div>
                        `;
                    });
            }

            // Fonction pour fermer le modal
            function closeModal() {
                modal.classList.remove('show');
                document.body.style.overflow = '';
                modalContent.innerHTML = `
                    <div class="flex justify-center items-center p-12">
                        <div class="loading-spinner"></div>
                    </div>
                `;
            }

            // Écouter les clics sur les boutons d'ouverture
            document.addEventListener('click', function(e) {
                const openBtn = e.target.closest('.open-modal-btn');
                if (openBtn) {
                    e.preventDefault();
                    const memberId = openBtn.dataset.memberId;
                    openModal(memberId);
                }
            });

            // Fermer avec le bouton (délégation d'événement)
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('close-modal') || e.target.closest('.close-modal')) {
                    closeModal();
                }
            });

            // Fermer avec l'overlay
            if (overlay) {
                overlay.addEventListener('click', closeModal);
            }

            // Fermer avec la touche Echap
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal.classList.contains('show')) {
                    closeModal();
                }
            });

            // Debounce pour la recherche
            let searchTimeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    currentSearch = this.value;
                    currentPage = 1;
                    fetchMembres(true);
                }, 500);
            });

            // Charger plus de membres
            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', function() {
                    currentPage++;
                    fetchMembres(false);
                });
            }

            function fetchMembres(resetGrid = true) {
                if (isLoading) return;
                
                isLoading = true;
                loading.classList.remove('hidden');
                
                if (resetGrid) {
                    membresGrid.innerHTML = '';
                }

                const url = new URL(window.location.href);
                url.searchParams.set('search', currentSearch);
                url.searchParams.set('page', currentPage);
                url.searchParams.set('ajax', '1');

                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (resetGrid) {
                            membresGrid.innerHTML = data.html;
                        } else {
                            membresGrid.insertAdjacentHTML('beforeend', data.html);
                        }

                        // ✅ Mise à jour du compteur affiché
                        displayedCount.textContent = data.displayed;
                        
                        // ✅ Mise à jour du total
                        totalCount.textContent = data.total.toLocaleString();
                        if (totalMembresSpan) {
                            totalMembresSpan.textContent = data.total.toLocaleString();
                        }

                        // Gestion du bouton "Charger plus"
                        const loadMoreContainer = document.getElementById('load-more-container');
                        const existingBtn = document.getElementById('load-more-btn');
                        
                        if (data.hasMore) {
                            if (!existingBtn) {
                                const btn = document.createElement('button');
                                btn.id = 'load-more-btn';
                                btn.className = 'px-8 py-3 rounded-xl border border-primary/30 text-primary font-bold hover:bg-primary hover:text-white transition-all duration-300 flex items-center gap-2 hover:scale-110 hover:shadow-lg hover:shadow-primary/20';
                                btn.innerHTML = '<span class="material-symbols-outlined">expand_more</span> Charger plus de membres';
                                btn.addEventListener('click', function() {
                                    currentPage++;
                                    fetchMembres(false);
                                });
                                loadMoreContainer.insertBefore(btn, loadMoreContainer.firstChild);
                            }
                        } else {
                            if (existingBtn) {
                                existingBtn.remove();
                            }
                        }
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                })
                .finally(() => {
                    isLoading = false;
                    loading.classList.add('hidden');
                });
            }
        });
         document.addEventListener('DOMContentLoaded', function() {
        // Menu Hamburger
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