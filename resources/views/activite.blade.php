<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
                        "secondary": "#9f5eff",
                    },
                    fontFamily: {
                        "display": ["Spline Sans", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'fade-in-slow': 'fadeIn 1s ease-out',
                        'pulse-subtle': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite',
                        'glow-slow': 'glow 3s ease-in-out infinite',
                        'glow-fast': 'glow 1.5s ease-in-out infinite',
                        'rainbow-glow': 'rainbowGlow 4s linear infinite',
                        'color-shift': 'colorShift 3s ease-in-out infinite',
                        'border-rainbow': 'borderRainbow 3s linear infinite',
                        'gradient-shift': 'gradientShift 5s ease infinite',
                        'bounce-soft': 'bounceSoft 2s ease-in-out infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                        'heartbeat': 'heartbeat 1.2s ease-in-out infinite',
                        'blink': 'blink 1.5s step-end infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        glow: {
                            '0%, 100%': { boxShadow: '0 0 5px rgba(108, 43, 238, 0.3)' },
                            '50%': { boxShadow: '0 0 20px rgba(108, 43, 238, 0.8), 0 0 30px rgba(108, 43, 238, 0.3)' },
                        },
                        rainbowGlow: {
                            '0%': { boxShadow: '0 0 10px rgba(255, 0, 0, 0.5)' },
                            '20%': { boxShadow: '0 0 10px rgba(255, 165, 0, 0.5)' },
                            '40%': { boxShadow: '0 0 10px rgba(255, 255, 0, 0.5)' },
                            '60%': { boxShadow: '0 0 10px rgba(0, 128, 0, 0.5)' },
                            '80%': { boxShadow: '0 0 10px rgba(0, 0, 255, 0.5)' },
                            '100%': { boxShadow: '0 0 10px rgba(238, 130, 238, 0.5)' },
                        },
                        colorShift: {
                            '0%, 100%': { color: '#6c2bee', borderColor: '#6c2bee' },
                            '33%': { color: '#9f5eff', borderColor: '#9f5eff' },
                            '66%': { color: '#b77eff', borderColor: '#b77eff' },
                        },
                        borderRainbow: {
                            '0%': { borderColor: '#ff0000' },
                            '17%': { borderColor: '#ff8800' },
                            '33%': { borderColor: '#ffff00' },
                            '50%': { borderColor: '#00ff00' },
                            '67%': { borderColor: '#0000ff' },
                            '83%': { borderColor: '#4b0082' },
                            '100%': { borderColor: '#ff00ff' },
                        },
                        gradientShift: {
                            '0%, 100%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' },
                        },
                        bounceSoft: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-3px)' },
                        },
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(0deg)' },
                            '25%': { transform: 'rotate(5deg)' },
                            '75%': { transform: 'rotate(-5deg)' },
                        },
                        heartbeat: {
                            '0%': { transform: 'scale(1)' },
                            '14%': { transform: 'scale(1.1)' },
                            '28%': { transform: 'scale(1)' },
                            '42%': { transform: 'scale(1.05)' },
                            '70%': { transform: 'scale(1)' },
                        },
                        blink: {
                            '0%, 100%': { opacity: '1' },
                            '50%': { opacity: '0.3' },
                        },
                    },
                },
            },
        }
    </script>
<style>
        /* Particules flottantes */
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(108, 43, 238, 0.3);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }

        @keyframes particleFloat {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0;
            }
            20% {
                opacity: 0.5;
            }
            80% {
                opacity: 0.5;
            }
            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .glow-subtle {
            box-shadow: 0 0 20px rgba(108, 43, 238, 0.15);
        }
        
        /* Animations de survol */
        .hover-glow {
            transition: box-shadow 0.3s ease;
        }
        .hover-glow:hover {
            box-shadow: 0 0 25px rgba(108, 43, 238, 0.6);
        }
        
        .hover-border-glow {
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-border-glow:hover {
            border-color: #6c2bee;
            box-shadow: 0 0 15px rgba(108, 43, 238, 0.5);
        }
        
        .hover-scale-x {
            transition: transform 0.3s ease;
        }
        .hover-scale-x:hover {
            transform: scaleX(1.02);
        }
        
        .hover-skew {
            transition: transform 0.3s ease;
        }
        .hover-skew:hover {
            transform: skewX(1deg);
        }
        
        .hover-brightness {
            transition: filter 0.3s ease;
        }
        .hover-brightness:hover {
            filter: brightness(1.2);
        }
        
        .hover-contrast {
            transition: filter 0.3s ease;
        }
        .hover-contrast:hover {
            filter: contrast(1.1);
        }
        
        .hover-saturate {
            transition: filter 0.3s ease;
        }
        .hover-saturate:hover {
            filter: saturate(1.3);
        }
        
        .hover-blur {
            transition: filter 0.3s ease;
        }
        .hover-blur:hover {
            filter: blur(0.5px);
        }
        
        /* Animations de fond */
        .bg-pulse {
            animation: bgPulse 3s ease-in-out infinite;
        }
        @keyframes bgPulse {
            0%, 100% { background-color: rgba(108, 43, 238, 0.1); }
            50% { background-color: rgba(108, 43, 238, 0.2); }
        }
        
        .bg-gradient-flow {
            background: linear-gradient(45deg, #6c2bee, #9f5eff, #b77eff, #6c2bee);
            background-size: 300% 300%;
            animation: gradientShift 5s ease infinite;
        }
        
        /* Animation de soulignement */
        .underline-animation {
            position: relative;
            display: inline-block;
        }
        .underline-animation::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background: #6c2bee;
            transition: width 0.3s ease;
        }
        .underline-animation:hover::after {
            width: 100%;
        }
        
        /* Animation de grain */
        .grain {
            position: relative;
            overflow: hidden;
        }
        .grain::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.02);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
            z-index: 1;
        }
        .grain:hover::before {
            opacity: 1;
            animation: grain 0.5s steps(2) infinite;
        }
        @keyframes grain {
            0%, 100% { transform: translate(0, 0); }
            10% { transform: translate(-2%, -2%); }
            20% { transform: translate(2%, 2%); }
            30% { transform: translate(-2%, 2%); }
            40% { transform: translate(2%, -2%); }
            50% { transform: translate(-2%, -2%); }
            60% { transform: translate(2%, 2%); }
            70% { transform: translate(-2%, 2%); }
            80% { transform: translate(2%, -2%); }
            90% { transform: translate(-2%, -2%); }
        }
    </style>
    <script async src="https://www.tiktok.com/embed.js"></script>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 antialiased relative">
    
<!-- PARTICULES EN FOND -->
<div id="particles-container" class="fixed inset-0 pointer-events-none z-0"></div>

<div class="relative flex min-h-screen w-full flex-col overflow-x-hidden z-10">

<!-- Navigation Bar -->
<nav class="sticky top-0 z-50 border-b border-border-dark bg-background-dark/80 backdrop-blur-md animate-fade-in">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo - sans rotation sur l'icône -->
            <div class="flex items-center gap-3 group">
                <div class="bg-primary p-1.5 rounded-lg transition-all duration-300 group-hover:bg-secondary animate-pulse-subtle">
                    <span class="material-symbols-outlined text-white text-2xl">rocket_launch</span>
                </div>
                <span class="text-xl font-bold tracking-tight text-white group-hover:text-primary transition-colors animate-color-shift">{{ $serverName ?? 'Inabikari' }} Hub</span>
            </div>

            <!-- Desktop Nav Links -->
            <div class="hidden md:flex items-center gap-8">
                <a class="text-sm font-medium text-white hover:text-primary transition-colors underline-animation" href="{{ route('home') }}">Accueil</a>
                <a class="text-sm font-medium text-slate-400 hover:text-white transition-colors underline-animation" href="{{ route('membre') }}">À propos de nous</a>
                <a class="text-sm font-medium text-primary animate-pulse-slow underline-animation" href="">Activités</a>
            </div>

            <!-- Boutons à droite -->
            <div class="flex items-center gap-4">
                <!-- Bouton Discord - sans rotation sur l'icône -->
                <a href="https://discord.gg/SjTRDRaAc6" target="_blank" class="hidden md:block">
                    <button class="bg-primary hover:bg-secondary text-white px-5 py-2 rounded-lg text-sm font-bold transition-all duration-300 hover:scale-110 flex items-center gap-2 animate-glow-slow hover:animate-heartbeat">
                        <span class="material-symbols-outlined text-lg">chat</span>
                        Rejoins-nous
                    </button>
                </a>
                
                <!-- Bouton Hamburger (mobile) - sans rotation -->
                <button id="menu-btn" class="md:hidden text-white p-2 hover:bg-primary/20 rounded-lg transition-colors">
                    <span class="material-symbols-outlined text-3xl">menu</span>
                </button>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div id="mobile-menu" class="hidden md:hidden py-4 border-t border-border-dark mt-2">
            <div class="flex flex-col space-y-3">
                <a class="text-base font-medium text-white hover:text-primary transition-colors py-2 px-3 rounded-lg hover:bg-primary/10" href="{{ route('home') }}">Accueil</a>
                <a class="text-base font-medium text-slate-400 hover:text-white transition-colors py-2 px-3 rounded-lg hover:bg-primary/10" href="{{ route('membre') }}">À propos de nous</a>
                <a class="text-base font-medium text-white hover:text-primary transition-colors py-2 px-3 rounded-lg hover:bg-primary/10" href="">Activités</a>
                <!-- Lien Discord mobile - sans rotation -->
                <a href="https://discord.gg/SjTRDRaAc6" target="_blank" class="mt-2">
                    <button class="w-full bg-primary hover:bg-secondary text-white px-5 py-3 rounded-lg text-base font-bold transition-all duration-300 hover:scale-105 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">chat</span>
                        Rejoins-nous
                    </button>
                </a>
            </div>
        </div>
    </div>
</nav>

<main class="flex-1 w-full max-w-7xl mx-auto px-6 py-8">

<!-- Hero Section -->
<section class="relative rounded-xl overflow-hidden mb-12 animate-rainbow-glow grain">
    <div class="absolute inset-0 bg-gradient-to-r from-background-dark via-background-dark/80 to-transparent z-10"></div>
    <div class="relative h-[400px] flex flex-col justify-center px-8 md:px-16 z-20">
        <h1 class="text-5xl md:text-7xl font-black mb-4 leading-tight">Les activités <br/><span class="text-primary animate-color-shift">d'Inabikari</span></h1>
        <p class="text-slate-400 max-w-xl mb-8 text-lg hover-saturate hover-scale-x transition-all">Retrouve tous les vidéos et contenus exclusifs de la communauté.</p>
    </div>
    <div class="absolute inset-0 bg-cover bg-center animate-pulse-slow" 
         style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBK3UmpYhGn3cdDNwGgkdnZG4bSubKnGr7rb5yP5u7ar9N2Y-SUJNGMVIPL0polj0GfMvI58eyjQAgtzI8eNMIAXu8XNNcQBVRo3nMhj25Sm3PLWDxpgc4_y5mPJyL46Hb7TxZenqn7jf-jjLDoQVKjyp1nhVxzi0Gqv2GBbeyjhFNTNIpZTCvz4HWbUikbPy00go3fVeWWBx2YHSxBvRI48i6ZXbfxNlIwbP303kqTNea22CEy6mvjUKm8wNwAXJl-t7VtTZDNiRgk");'>
</section>

<!-- YouTube Section -->
<section class="mb-20">
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-red-600 rounded-lg">
                <span class="material-symbols-outlined text-white">play_arrow</span>
            </div>
            <h2 class="text-3xl font-bold animate-color-shift hover-skew">Les vidéos de Mau</h2>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- YouTube Video Cards -->
        <div class="group cursor-pointer hover-glow hover-border-glow grain" onclick="window.open('https://youtu.be/KcfDfThOzSE', '_blank')">
            <div class="relative aspect-video rounded-xl overflow-hidden mb-4 border border-primary/10 transition-all duration-300 hover:border-secondary hover:brightness-110">
                <img class="w-full h-full object-cover hover-saturate hover-contrast transition-all duration-300" src="https://img.youtube.com/vi/KcfDfThOzSE/hqdefault.jpg" alt="Miniature AN INABIKARI 2025 RECAP" />
                <div class="absolute inset-0 bg-primary/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-sm">
                    <span class="material-symbols-outlined text-6xl text-white animate-heartbeat">play_circle</span>
                </div>
            </div>
            <h3 class="text-lg font-bold group-hover:text-primary transition-colors line-clamp-2">AN INABIKARI 2025 RECAP</h3>
            <div class="flex items-center gap-2 mt-2 text-slate-400 text-sm font-medium">
                <span class="hover-brightness">57 vues</span><span class="animate-blink">•</span><span class="hover-brightness">1 mois</span>
            </div>
        </div>
        
        <div class="group cursor-pointer hover-glow hover-border-glow grain" onclick="window.open('https://youtu.be/mhk9dHN7iFY', '_blank')">
            <div class="relative aspect-video rounded-xl overflow-hidden mb-4 border border-primary/10 transition-all duration-300 hover:border-secondary hover:brightness-110">
                <img class="w-full h-full object-cover hover-saturate hover-contrast transition-all duration-300" src="https://img.youtube.com/vi/mhk9dHN7iFY/hqdefault.jpg" alt="Miniature INABIKARI:THE THIRD SLANDER" />
                <div class="absolute inset-0 bg-primary/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-sm">
                    <span class="material-symbols-outlined text-6xl text-white animate-heartbeat">play_circle</span>
                </div>
            </div>
            <h3 class="text-lg font-bold group-hover:text-primary transition-colors line-clamp-2">INABIKARI:THE THIRD SLANDER</h3>
            <div class="flex items-center gap-2 mt-2 text-slate-400 text-sm font-medium">
                <span class="hover-brightness">77 vues</span><span class="animate-blink">•</span><span class="hover-brightness">7 mois</span>
            </div>
        </div> 
        
        <div class="group cursor-pointer hover-glow hover-border-glow grain" onclick="window.open('https://www.youtube.com/watch?v=NBBkqsSINMI', '_blank')">
            <div class="relative aspect-video rounded-xl overflow-hidden mb-4 border border-primary/10 transition-all duration-300 hover:border-secondary hover:brightness-110">
                <img class="w-full h-full object-cover hover-saturate hover-contrast transition-all duration-300" src="https://img.youtube.com/vi/NBBkqsSINMI/hqdefault.jpg" alt="Miniature vidéo Inabikari" />
                <div class="absolute inset-0 bg-primary/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-sm">
                    <span class="material-symbols-outlined text-6xl text-white animate-heartbeat">play_circle</span>
                </div>
            </div>
            <h3 class="text-lg font-bold group-hover:text-primary transition-colors line-clamp-2">The inabikari slander: PART2</h3>
            <div class="flex items-center gap-2 mt-2 text-slate-400 text-sm font-medium">
                <span class="hover-brightness">72 vues</span><span class="animate-blink">•</span><span class="hover-brightness">1 année</span>
            </div>
        </div>
    </div>
</section>

<!-- TikTok Section -->
<section class="mb-20">
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-slate-900 border border-primary/50 rounded-lg">
                <span class="material-symbols-outlined text-white animate-wiggle">bolt</span>
            </div>
            <h2 class="text-3xl font-bold animate-color-shift hover-skew">Nos vidéos sur TikTok</h2>
        </div>
        <a href="https://www.tiktok.com/@inabikari4" target="_blank" 
           class="bg-primary hover:bg-secondary text-white px-6 py-2 rounded-full font-bold transition-all duration-300 hover:scale-110 hover:shadow-glow text-sm animate-glow-fast">
            follow @inabikari4
        </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
        @php
            $tiktokVideos = [
                ['id' => '7530602750313319702', 'desc' => 'Peak once again ! 🔥'],
                ['id' => '7522178001065250070', 'desc' => 'Y’en a pas un pour rattraper l’autre😂'],
                ['id' => '7522105416621231382', 'desc' => 'Peak c’est incroyable'],
                ['id' => '7521335953567337750', 'desc' => 'WAIT,THEY DONT LOVE YOU LIKE I LOVE YOU'],
                ['id' => '7521020920954096918', 'desc' => 'VIRTUAL INSANITY'],
            ];
        @endphp

        @foreach($tiktokVideos as $index => $video)
        <a href="https://www.tiktok.com/@inabikari4/video/{{ $video['id'] }}" 
           target="_blank"
           class="relative aspect-[9/16] rounded-xl overflow-hidden group border border-primary/10 {{ $index == 4 ? 'hidden lg:block' : '' }} transition-all duration-300 hover:border-rainbow hover:shadow-glow hover:scale-105 grain"
           style="animation-delay: {{ $index * 0.1 }}s">
            
            <div class="w-full h-full bg-gradient-to-br from-primary/20 to-purple-600/20 flex flex-col items-center justify-center p-4 text-center transition-all duration-300 group-hover:from-primary/30 group-hover:to-purple-700/30 group-hover:backdrop-blur-sm">
                <span class="material-symbols-outlined text-5xl text-primary mb-2 animate-bounce-soft group-hover:animate-heartbeat">bolt</span>
                <span class="text-white font-bold text-sm line-clamp-2 group-hover:text-primary transition-colors">{{ $video['desc'] }}</span>
                <div class="mt-3 px-3 py-1 bg-primary/80 rounded-full text-xs text-white flex items-center gap-1 transition-all duration-300 group-hover:bg-secondary group-hover:scale-110 group-hover:shadow-glow">
                    <span class="material-symbols-outlined text-sm group-hover:animate-wiggle">play_arrow</span>
                    Voir
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>

<!-- Channel Links -->
<section class="bg-primary/10 border border-primary/20 rounded-2xl p-10 flex flex-col items-center text-center glow-subtle grain animate-gradient-shift">
    <h2 class="text-3xl md:text-4xl font-black mb-4 animate-color-shift animate-pulse-slow">Rejoins le mouvement Inabikari</h2>
    <p class="text-slate-400 max-w-2xl mb-10 text-lg hover-saturate hover-scale-x transition-all">Ne rate aucune publication. Abonne-toi et suis nos chaînes officielles pour plus de contenu</p>
    <div class="flex flex-wrap justify-center gap-6">
        <a class="flex items-center gap-3 px-8 py-4 bg-white text-black font-bold rounded-xl hover:bg-slate-200 transition-all duration-300 hover:scale-110 hover:shadow-glow animate-glow-slow" href="https://www.youtube.com/@TheMay195">
            <span class="material-symbols-outlined animate-bounce-soft">subscriptions</span>
            Chaîne YouTube de Maurice
        </a>
        <a class="flex items-center gap-3 px-8 py-4 bg-slate-900 text-white font-bold rounded-xl border border-primary/30 hover:border-primary transition-all duration-300 hover:scale-110 hover:shadow-glow hover:shadow-primary/20 animate-glow-slow" href="https://www.tiktok.com/@inabikari4" style="animation-delay: 0.2s">
            <span class="material-symbols-outlined animate-bounce-soft">video_library</span>
            Chaîne TikTok officielle
        </a>
    </div>
</section>

</main>

<!-- Footer -->
<footer class="bg-background-dark border-t border-border-dark pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-slate-500">
            <p class="hover:text-primary transition-colors hover:scale-105">© 2026 Inabikari. Tous droits réservés.</p>
            <p class="hover:text-primary transition-colors hover:scale-105">{{ $serverName ?? 'Inabikari' }}</p>
            <div class="flex items-center gap-2 hover:text-primary transition-colors group">
                <span class="group-hover:animate-wiggle">Powered by</span>
                <span class="text-slate-300 font-bold hover:text-primary transition-colors group-hover:scale-110 group-hover:animate-pulse">Laravel</span>
            </div>
        </div>
    </div>
</footer>

</div>

<script>
    // Création des particules
    function createParticles() {
        const container = document.getElementById('particles-container');
        if (!container) return;

        for (let i = 0; i < 50; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.animation = `particleFloat ${15 + Math.random() * 20}s linear infinite`;
            particle.style.animationDelay = -Math.random() * 20 + 's';
            particle.style.background = `rgba(108, 43, 238, ${0.1 + Math.random() * 0.3})`;
            particle.style.width = 2 + Math.random() * 4 + 'px';
            particle.style.height = particle.style.width;
            container.appendChild(particle);
        }
    }

    // Menu Hamburger
    document.addEventListener('DOMContentLoaded', function() {
        createParticles();
        
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                const icon = menuBtn.querySelector('.material-symbols-outlined');
                icon.textContent = icon.textContent === 'menu' ? 'close' : 'menu';
            });

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