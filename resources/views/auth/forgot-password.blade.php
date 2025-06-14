{{-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen px-4 bg-gradient-to-br from-blue-100 to-purple-200">

    <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-2xl">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="w-auto h-12">
        </div>

        <!-- Intro -->
        <p class="mb-4 text-sm text-center text-gray-600">
            Vous avez oublié votre mot de passe ? Aucun souci.
            Entrez votre adresse e-mail et nous vous enverrons un lien pour le réinitialiser.
        </p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 text-white transition duration-300 bg-indigo-600 rounded-lg hover:bg-indigo-700">
                    Envoyer le lien
                </button>
            </div>
        </form>
    </div>

</body>
</html>
 --}}


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récupération - PlanteDoctor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap');

        * {
            font-family: 'Outfit', sans-serif;
        }

        .modern-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 25%, #065f46 75%, #064e3b 100%);
            position: relative;
        }

        .modern-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 80%, rgba(34, 197, 94, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(16, 185, 129, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(6, 182, 212, 0.1) 0%, transparent 50%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow:
                0 25px 50px -12px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.05);
        }

        .neo-morphism {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
            box-shadow:
                20px 20px 60px rgba(0, 0, 0, 0.1),
                -20px -20px 60px rgba(255, 255, 255, 0.8),
                inset 0 0 0 1px rgba(255, 255, 255, 0.3);
        }

        .floating-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(40px);
            opacity: 0.7;
            animation: float-rotate 20s infinite linear;
        }

        .orb-1 {
            width: 200px;
            height: 200px;
            background: linear-gradient(45deg, #10b981, #06d6a0);
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 150px;
            height: 150px;
            background: linear-gradient(45deg, #06b6d4, #0891b2);
            top: 70%;
            right: 10%;
            animation-delay: -10s;
        }

        .orb-3 {
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, #22c55e, #16a34a);
            top: 30%;
            right: 30%;
            animation-delay: -5s;
        }

        @keyframes float-rotate {
            0% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
            100% { transform: translate(0, 0) rotate(360deg); }
        }

        .plant-icon-glow {
            filter: drop-shadow(0 0 20px rgba(16, 185, 129, 0.5));
            animation: pulse-icon 3s ease-in-out infinite;
        }

        @keyframes pulse-icon {
            0%, 100% { transform: scale(1); filter: drop-shadow(0 0 20px rgba(16, 185, 129, 0.5)); }
            50% { transform: scale(1.05); filter: drop-shadow(0 0 30px rgba(16, 185, 129, 0.8)); }
        }

        .input-glow:focus {
            box-shadow:
                0 0 0 3px rgba(16, 185, 129, 0.1),
                0 0 20px rgba(16, 185, 129, 0.2);
        }

        .button-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .button-hover:hover {
            transform: translateY(-2px);
            box-shadow:
                0 20px 25px -5px rgba(0, 0, 0, 0.1),
                0 10px 10px -5px rgba(0, 0, 0, 0.04),
                0 0 30px rgba(16, 185, 129, 0.3);
        }

        .text-gradient {
            background: linear-gradient(135deg, #10b981, #059669, #047857);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .slide-in {
            animation: slideInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(16, 185, 129, 0.6);
            border-radius: 50%;
            animation: particle-float 15s infinite linear;
        }

        @keyframes particle-float {
            0% { transform: translateY(100vh) translateX(0) scale(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-10vh) translateX(100px) scale(1); opacity: 0; }
        }

        .success-animation {
            animation: success-bounce 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        @keyframes success-bounce {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body class="relative flex items-center justify-center min-h-screen px-4 overflow-hidden modern-gradient">

    <!-- Floating orbs -->
    <div class="floating-orb orb-1"></div>
    <div class="floating-orb orb-2"></div>
    <div class="floating-orb orb-3"></div>

    <!-- Animated particles -->
    <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
    <div class="particle" style="left: 20%; animation-delay: 3s;"></div>
    <div class="particle" style="left: 30%; animation-delay: 6s;"></div>
    <div class="particle" style="left: 70%; animation-delay: 9s;"></div>
    <div class="particle" style="left: 80%; animation-delay: 12s;"></div>

    <div class="relative z-10 w-full max-w-md p-8 glass-card rounded-3xl slide-in">

        <!-- Header moderne -->
        <div class="mb-8 text-center">
            <!-- Icône de plante avec effet néon -->
            <div class="relative flex items-center justify-center w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-emerald-400 via-green-500 to-teal-600 rounded-3xl plant-icon-glow">
                <svg class="relative z-10 w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,13.5C2,15.5 3.75,17.25 3.75,17.25C7,8 17,8 17,8Z"/>
                </svg>
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-400/20 via-green-500/20 to-teal-600/20 rounded-3xl blur-xl"></div>
            </div>

            <h1 class="mb-3 text-4xl font-bold text-white">
                Plante<span class="text-gradient">Doctor</span>
            </h1>
            <p class="text-lg font-medium text-emerald-300">Diagnostics Intelligents</p>
            <div class="mt-2 text-sm text-gray-400">Intelligence Artificielle • Détection Avancée</div>
        </div>

        <!-- Message principal -->
        <div class="p-6 mb-8 border bg-gradient-to-r from-emerald-900/30 to-teal-900/30 rounded-2xl border-emerald-500/20 backdrop-blur-sm">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0 p-2 rounded-full bg-emerald-500/20">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="mb-2 font-semibold text-white">Récupération de compte</h3>
                    <p class="text-sm leading-relaxed text-gray-300">
                        Notre IA va générer un lien de récupération sécurisé et l'envoyer instantanément à votre adresse e-mail.
                    </p>
                </div>
            </div>
        </div>

        <!-- Message de succès -->
        <div class="hidden p-4 mb-6 text-sm border text-emerald-300 bg-emerald-900/20 rounded-xl border-emerald-500/30 backdrop-blur-sm success-animation" id="status-message">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="font-medium">Lien envoyé avec succès ! Vérifiez votre boîte mail.</span>
            </div>
        </div>

        <!-- Formulaire moderne -->
        <form class="space-y-6" method="POST" action="{{ route('password.email') }}">
            @csrf


                <label for="email" class="flex items-center block text-sm font-semibold text-gray-200">
                    <div class="w-2 h-2 mr-3 rounded-full bg-emerald-400 animate-pulse"></div>
                    Adresse e-mail
                </label>
                <div class="relative group">
                    <input
                        id="email"
                        name="email"
                        type="email"
                        required
                        placeholder="votre.email@exemple.com"
                        class="w-full px-6 py-4 text-white placeholder-gray-400 transition-all duration-300 border bg-white/5 border-white/10 rounded-2xl focus:outline-none focus:border-emerald-400/50 backdrop-blur-sm input-glow"
                    >
                    <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                        <svg class="w-5 h-5 text-gray-400 transition-colors duration-300 group-focus-within:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                    </div>
                </div>

            <!-- Bouton principal -->
            <div class="pt-4">
                <button
                    type="submit"
                    class="relative flex items-center justify-center w-full px-8 py-4 space-x-3 overflow-hidden font-bold text-white bg-gradient-to-r from-emerald-500 via-green-600 to-teal-600 rounded-2xl focus:outline-none focus:ring-4 focus:ring-emerald-500/20 button-hover"
                >
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-r from-emerald-400 via-green-500 to-teal-500 hover:opacity-20"></div>
                    <svg class="relative z-10 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <span class="relative z-10 text-lg">Générer le lien de récupération</span>
                </button>
            </div>
        </form>

        <!-- Navigation -->
        <div class="mt-8 text-center">
            <a href="{{ route('login') }}" class="inline-flex items-center text-sm font-medium transition-all duration-300 text-emerald-300 hover:text-emerald-200 group">
                <svg class="w-4 h-4 mr-2 transition-transform duration-300 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Retour à la connexion
            </a>
        </div>

        <!-- Footer sécurisé -->
        <div class="pt-6 mt-8 border-t border-white/10">
            <div class="flex items-center justify-center space-x-3 text-xs text-gray-400">
                <div class="flex items-center space-x-2">
                    <div class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></div>
                    <span>Sécurisé par IA</span>
                </div>
                <div class="w-1 h-1 bg-gray-600 rounded-full"></div>
                <span>Chiffrement 256-bit</span>
                <div class="w-1 h-1 bg-gray-600 rounded-full"></div>
                <span>Protection avancée</span>
            </div>
        </div>
    </div>

    <script>
        function showSuccessMessage(event) {
            event.preventDefault();
            const statusMessage = document.getElementById('status-message');
            const button = event.target.querySelector('button');

            // Animation du bouton
            button.innerHTML = `
                <svg class="w-6 h-6 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                <span>Génération en cours...</span>
            `;

            setTimeout(() => {
                statusMessage.classList.remove('hidden');

                // Restaurer le bouton
                button.innerHTML = `
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-lg">Lien envoyé avec succès !</span>
                `;
                button.classList.add('bg-emerald-600');

                // Créer des particules de succès
                createSuccessParticles();
            }, 2000);
        }

        function createSuccessParticles() {
            for (let i = 0; i < 6; i++) {
                setTimeout(() => {
                    const particle = document.createElement('div');
                    particle.className = 'absolute w-2 h-2 bg-emerald-400 rounded-full';
                    particle.style.left = '50%';
                    particle.style.top = '50%';
                    particle.style.animation = `particle-success 1s ease-out forwards`;
                    particle.style.animationDelay = `${i * 0.1}s`;
                    document.body.appendChild(particle);

                    setTimeout(() => particle.remove(), 1000);
                }, i * 100);
            }
        }

        // Ajouter des styles pour les particules de succès
        const style = document.createElement('style');
        style.textContent = `
            @keyframes particle-success {
                0% { transform: translate(-50%, -50%) scale(0); opacity: 1; }
                100% {
                    transform: translate(-50%, -50%) translate(${Math.random() * 200 - 100}px, ${Math.random() * 200 - 100}px) scale(1);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Animation d'entrée améliorée
        document.addEventListener('DOMContentLoaded', function() {
            // Délai progressif pour les éléments de l'interface
            const elements = document.querySelectorAll('.glass-card > *');
            elements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';

                setTimeout(() => {
                    el.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });

        // Effet de frappe pour le titre
        document.addEventListener('DOMContentLoaded', function() {
            const title = document.querySelector('h1');
            const text = title.textContent;
            title.textContent = '';

            for (let i = 0; i < text.length; i++) {
                setTimeout(() => {
                    title.textContent += text[i];
                }, i * 100);
            }
        });
    </script>
</body>
</html>
