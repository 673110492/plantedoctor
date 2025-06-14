{{-- <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | PlantDoctor</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen px-4 bg-gradient-to-br from-green-100 to-white">

    <div class="w-full max-w-md p-8 bg-white border border-green-200 shadow-2xl rounded-2xl">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="w-auto h-20 rounded">
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="p-2 mb-4 text-sm text-green-700 bg-green-100 border border-green-300 rounded">
                {{ session('status') }}
            </div>
        @endif

        <h2 class="mb-6 text-2xl font-bold text-center text-green-800">Connexion à <span
                class="text-green-600">PlantDoctor</span></h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-green-800">Adresse e-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-2 mt-1 border border-green-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-green-800">Mot de passe</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 mt-1 border border-green-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me + Forgot Password -->
            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-700">
                    <input type="checkbox" name="remember" class="mr-2 text-green-600 border-green-300 rounded">
                    Se souvenir de moi
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-green-600 hover:underline">
                        Mot de passe oublié ?
                    </a>
                @endif
            </div>

            <div>
                <button type="submit"
                    class="w-full px-4 py-2 text-white transition duration-300 rounded-lg shadow bg-emerald-700 hover:bg-emerald-800">
                    Se connecter
                </button>
            </div>

            <!-- Register Link -->
            <div class="mt-4 text-sm text-center text-gray-600">
                Pas encore de compte ?
                <a href="{{ route('register') }}" class="font-semibold text-green-600 hover:underline">S'inscrire</a>
            </div>
        </form>
    </div>

</body>

</html> --}}




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlanteDoctor - Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            --accent-gradient: linear-gradient(135deg, #84cc16 0%, #65a30d 100%);
            --success-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --dark-gradient: linear-gradient(135deg, #166534 0%, #365314 100%);
            --forest-gradient: linear-gradient(135deg, #15803d 0%, #166534 50%, #14532d 100%);
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 30%, #15803d 60%, #166534 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {

            .floating-shapes .shape:nth-child(3),
            .floating-shapes .shape:nth-child(4) {
                display: none;
            }
        }

        @media (max-width: 768px) {
            body {
                background: linear-gradient(180deg, #22c55e 0%, #16a34a 30%, #15803d 70%, #166534 100%);
            }

            .floating-shapes .shape {
                display: none;
            }

            .card-mockup {
                transform: none;
                max-width: 280px;
                padding: 16px;
            }

            .card-mockup:hover {
                transform: none;
            }
        }

        @media (max-width: 640px) {
            .glass-card {
                margin: 16px;
                padding: 24px 20px;
            }
        }

        /* Touch-friendly sizing for mobile */
        @media (max-width: 768px) {
            .premium-input {
                padding: 16px 12px 16px 48px;
                font-size: 16px;
                /* Prevents zoom on iOS */
            }

            .premium-button {
                padding: 16px;
                font-size: 18px;
            }

            input[type="checkbox"] {
                width: 18px;
                height: 18px;
            }
        }

        /* High DPI displays */
        @media (-webkit-min-device-pixel-ratio: 2),
        (min-resolution: 192dpi) {
            .glass-card {
                backdrop-filter: blur(25px);
            }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(34, 197, 94, 0.2);
            box-shadow: 0 25px 50px rgba(21, 128, 61, 0.2);
        }

        .premium-input {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(34, 197, 94, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .premium-input:focus {
            background: rgba(255, 255, 255, 1);
            border-color: #22c55e;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1);
            transform: translateY(-2px);
        }

        .premium-button {
            background: var(--primary-gradient);
            border: none;
            box-shadow: 0 8px 32px rgba(34, 197, 94, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .premium-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(34, 197, 94, 0.5);
        }

        .premium-button:active {
            transform: translateY(-1px);
        }

        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
            background: rgba(132, 204, 22, 0.2);
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 20%;
            right: 10%;
            animation-delay: 1s;
            background: rgba(16, 185, 129, 0.15);
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 2s;
            background: rgba(34, 197, 94, 0.2);
        }

        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            bottom: 10%;
            right: 20%;
            animation-delay: 3s;
            background: rgba(101, 163, 13, 0.15);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.7;
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 1;
            }
        }

        .slide-up {
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-mockup {
            background: linear-gradient(135deg, #166534 0%, #15803d 50%, #14532d 100%);
            border-radius: 16px;
            padding: 20px;
            color: white;
            box-shadow: 0 20px 40px rgba(21, 128, 61, 0.3);
            transform: perspective(1000px) rotateX(10deg) rotateY(-5deg);
            transition: transform 0.3s ease;
        }

        .card-mockup:hover {
            transform: perspective(1000px) rotateX(5deg) rotateY(-2deg) translateY(-5px);
        }

        .pulse-ring {
            animation: pulse-ring 2s ease-in-out infinite;
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(0.8);
                opacity: 1;
            }

            100% {
                transform: scale(2.4);
                opacity: 0;
            }
        }

        .security-badge {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            animation: security-pulse 3s ease-in-out infinite;
        }

        @keyframes security-pulse {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(34, 197, 94, 0.4);
            }

            50% {
                box-shadow: 0 0 30px rgba(34, 197, 94, 0.7);
            }
        }

        .gradient-text {
            background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .loading-dots {
            display: inline-block;
        }

        .loading-dots::after {
            content: '';
            animation: dots 1.5s steps(5, end) infinite;
        }

        @keyframes dots {

            0%,
            20% {
                content: '';
            }

            40% {
                content: '.';
            }

            60% {
                content: '..';
            }

            80%,
            100% {
                content: '...';
            }
        }

        .leaf-icon {
            color: #22c55e;
        }

        .plant-feature-icon {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1) 0%, rgba(16, 185, 129, 0.1) 100%);
        }
    </style>
</head>

<body>
    <!-- Formes flottantes animées -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="relative z-10 flex items-center justify-center min-h-screen p-2 sm:p-4">
        <div class="grid items-center w-full gap-6 max-w-7xl lg:grid-cols-2 lg:gap-12">

            <!-- Section gauche - Présentation -->
            <div class="hidden px-4 space-y-6 text-white lg:block xl:space-y-8">
                <div class="slide-up">
                    <h1 class="mb-4 text-3xl font-bold leading-tight xl:text-5xl">
                        Votre assistant<br>
                        <span class="gradient-text">
                            diagnostic intelligent
                        </span>
                    </h1>
                    <p class="text-lg leading-relaxed xl:text-xl text-white/80">
                        Détectez et diagnostiquez les maladies de vos plantes grâce à l'intelligence artificielle
                        avancée.
                    </p>
                </div>

                <!-- Mockup de carte -->
                <div class="flex justify-center slide-up lg:justify-start" style="animation-delay: 0.2s;">
                    <div class="w-full max-w-xs card-mockup lg:max-w-sm">
                        <div class="flex items-start justify-between mb-6 lg:mb-8">
                            <div>
                                <div class="mb-1 text-xs text-gray-400">SYSTÈME DE DIAGNOSTIC</div>
                                <div class="text-sm font-semibold">PlanteDoctor PRO</div>
                            </div>
                            <div class="flex space-x-2">
                                <div
                                    class="flex items-center justify-center w-6 h-4 rounded lg:w-8 lg:h-6 bg-gradient-to-r from-green-400 to-emerald-500">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 2L3 9h4v9h6v-9h4l-7-7z" />
                                    </svg>
                                </div>
                                <div
                                    class="flex items-center justify-center w-6 h-4 rounded lg:w-8 lg:h-6 bg-gradient-to-r from-lime-400 to-green-500">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 lg:mb-6">
                            <div class="text-xl font-bold tracking-wider lg:text-2xl">ID: •••• •••• 1234</div>
                        </div>

                        <div class="flex items-end justify-between">
                            <div>
                                <div class="mb-1 text-xs text-gray-400">UTILISATEUR</div>
                                <div class="text-sm font-semibold">DR. BOTANISTE</div>
                            </div>
                            <div>
                                <div class="mb-1 text-xs text-gray-400">ACTIVÉ</div>
                                <div class="text-sm font-semibold">12/2024</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features -->
                <div class="space-y-4 slide-up" style="animation-delay: 0.4s;">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full plant-feature-icon">
                            <svg class="w-6 h-6 leaf-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold">Diagnostic précis</div>
                            <div class="text-sm text-white/70">IA entraînée sur 50k+ images</div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full plant-feature-icon">
                            <svg class="w-6 h-6 leaf-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                <path fill-rule="evenodd"
                                    d="M4 5a2 2 0 012-2h8a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 1a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold">Recommandations</div>
                            <div class="text-sm text-white/70">Traitements personnalisés</div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full plant-feature-icon">
                            <svg class="w-6 h-6 leaf-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold">Suivi historique</div>
                            <div class="text-sm text-white/70">Évolution des plantes</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section droite - Formulaire -->
            <div class="w-full slide-up">
                <!-- Mobile header (visible only on mobile) -->
                <div class="px-4 mb-6 text-center text-white lg:hidden">
                    <h1 class="mb-2 text-2xl font-bold sm:text-3xl">
                        Votre assistant
                        <span class="block gradient-text">
                            diagnostic intelligent
                        </span>
                    </h1>
                    <p class="text-sm text-white/80 sm:text-base">
                        Accédez à votre compte PlanteDoctor
                    </p>
                </div>

                <div class="p-6 mx-2 glass-card rounded-2xl lg:rounded-3xl sm:p-8 lg:p-10 sm:mx-0">
                    <!-- Header -->
                    <div class="mb-6 text-center lg:mb-8">
                        <div class="relative inline-block mb-4 lg:mb-6">
                            <div class="absolute inset-0 bg-green-500 rounded-full pulse-ring opacity-20"></div>
                            <div
                                class="relative flex items-center justify-center w-12 h-12 shadow-lg lg:w-16 lg:h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl lg:rounded-2xl">
                                <svg class="w-6 h-6 text-white lg:w-8 lg:h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,13.5C2,15.5 3.75,17.25 3.75,17.25C7,8 17,8 17,8Z" />
                                </svg>
                            </div>
                        </div>

                        <h2 class="mb-2 text-2xl font-bold text-gray-800 lg:text-3xl">Bon retour !</h2>
                        <p class="hidden text-sm text-gray-600 lg:text-base lg:block">Accédez à votre compte PlanteDoctor
                        </p>
                    </div>

                    <!-- Badge de sécurité -->
                    <div class="flex justify-center mb-6 lg:mb-8">
                        <div
                            class="flex items-center px-3 py-2 space-x-2 text-xs font-medium text-white rounded-full security-badge lg:px-4 lg:py-2 lg:text-sm">
                            <svg class="w-3 h-3 lg:w-4 lg:h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" />
                            </svg>
                            <span>Données sécurisées SSL</span>
                        </div>
                    </div>

                    <!-- Formulaire -->
                    <form id="loginForm" class="space-y-6" method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email -->
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-semibold text-gray-700">
                                Adresse e-mail
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input type="email" id="email" name="email" required
                                    class="w-full py-4 pl-12 pr-4 font-medium border-0 premium-input rounded-xl focus:outline-none"
                                    placeholder="votre@email.com" autocomplete="email">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-gray-700">
                                Mot de passe
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input type="password" id="password" name="password" required
                                    class="w-full py-4 pl-12 pr-12 font-medium border-0 premium-input rounded-xl focus:outline-none"
                                    placeholder="••••••••••" autocomplete="current-password">
                                <button type="button" onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0 flex items-center pr-4">
                                    <svg id="eye-icon"
                                        class="w-5 h-5 text-gray-400 transition-colors hover:text-gray-600"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Options -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="checkbox"
                                    class="w-4 h-4 text-green-600 border-2 border-gray-300 rounded focus:ring-green-500">
                                <span class="text-sm font-medium text-gray-700">Se souvenir de moi</span>
                            </label>
                            <a href="{{ route('password.request') }}"
                                class="text-sm font-semibold text-green-600 transition-colors hover:text-emerald-600">
                                Mot de passe oublié ?
                            </a>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full py-4 text-lg font-bold text-white transition-all duration-300 premium-button rounded-xl">
                            <span id="button-text" class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Se connecter
                            </span>
                        </button>
                    </form>

                    <!-- Footer -->
                    <div class="pt-6 mt-8 text-center border-t border-gray-100">
                        <p class="text-sm text-gray-600">
                            Nouveau sur PlanteDoctor ?
                            <a href="{{ route('register') }}"
                                class="ml-1 font-semibold text-green-600 transition-colors hover:text-emerald-600">
                                Créer un compte
                            </a>
                        </p>

                        <div class="flex items-center justify-center mt-4 space-x-4 text-xs text-gray-500">
                            <a href="#" class="transition-colors hover:text-gray-700">Conditions
                                d'utilisation</a>
                            <span>•</span>
                            <a href="#" class="transition-colors hover:text-gray-700">Politique de
                                confidentialité</a>
                            <span>•</span>
                            <a href="#" class="transition-colors hover:text-gray-700">Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L12 12m0 0l3.122 3.122M12 12l6.878-6.878"/>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                `;
            }
        }

        // Form submission with loading state
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const button = this.querySelector('button[type="submit"]');
            const buttonText = document.getElementById('button-text');
            const originalText = buttonText.innerHTML;

            // Loading state
            button.disabled = true;
            button.classList.add('opacity-90');
            buttonText.innerHTML = `
                <svg class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="loading-dots">Connexion en cours</span>
            `;

            // Simulate authentication
            setTimeout(() => {
                button.disabled = false;
                button.classList.remove('opacity-90');
                buttonText.innerHTML = originalText;

                // Show success message or redirect
                console.log('Connexion réussie !');
            }, 2500);
        });

        // Input animations
