{{-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inscription</title>
    @vite('resources/css/app.css') <!-- Assure-toi que Tailwind fonctionne -->
</head>
<body class="flex items-center justify-center min-h-screen px-4 bg-gradient-to-br from-indigo-100 to-white">

    <div class="w-full max-w-4xl p-8 bg-white shadow-xl rounded-2xl">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="w-auto h-12" />
        </div>

        <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Créer un compte</h2>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="grid grid-cols-1 gap-6 md:grid-cols-2">
            @csrf

            <!-- Nom -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Prénom -->
            <div>
                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                <input id="prenom" name="prenom" type="text" value="{{ old('prenom') }}"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('prenom')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Téléphone -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                <input id="phone" name="phone" type="text" value="{{ old('phone') }}"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Adresse -->
            <div class="md:col-span-2">
                <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse</label>
                <input id="adresse" name="adresse" type="text" value="{{ old('adresse') }}"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('adresse')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Date de naissance -->
            <div>
                <label for="date_naissance" class="block text-sm font-medium text-gray-700">Date de naissance</label>
                <input id="date_naissance" name="date_naissance" type="date" value="{{ old('date_naissance') }}"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('date_naissance')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Photo -->
            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                <input id="photo" name="photo" type="file" accept="image/*"
                    class="w-full mt-1 text-gray-700" />
                @error('photo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mot de passe -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input id="password" name="password" type="password" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmation mot de passe -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bouton soumission, sur toute la largeur -->
            <div class="md:col-span-2">
                <button type="submit"
                    class="w-full px-4 py-2 text-white transition duration-300 bg-indigo-600 rounded-lg hover:bg-indigo-700">
                    S'inscrire
                </button>
            </div>

            <!-- Redirection connexion -->
            <div class="text-sm text-center text-gray-600 md:col-span-2">
                Déjà inscrit ?
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Se connecter</a>
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
    <title>PlanteDoctor</title>
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
            --nature-gradient: linear-gradient(135deg, #15803d 0%, #166534 100%);
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 30%, #15803d 70%, #166534 100%);
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
                background: linear-gradient(180deg, #22c55e 0%, #16a34a 50%, #15803d 100%);
            }

            .floating-shapes .shape {
                display: none;
            }

            .plant-mockup {
                transform: none;
                max-width: 280px;
                padding: 16px;
            }

            .plant-mockup:hover {
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
            }

            .premium-button {
                padding: 16px;
                font-size: 18px;
            }

            .file-input-wrapper {
                padding: 16px 12px;
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
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
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

        .premium-input.valid {
            border-color: #10b981;
            background: rgba(16, 185, 129, 0.05);
        }

        .premium-input.invalid {
            border-color: #ef4444;
            background: rgba(239, 68, 68, 0.05);
        }

        .premium-button {
            background: var(--primary-gradient);
            border: none;
            box-shadow: 0 8px 32px rgba(34, 197, 94, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .premium-button:hover:not(:disabled) {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(34, 197, 94, 0.5);
        }

        .premium-button:active {
            transform: translateY(-1px);
        }

        .premium-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
            box-shadow: 0 8px 32px rgba(34, 197, 94, 0.2);
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
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 20%;
            right: 10%;
            animation-delay: 1s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 2s;
        }

        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            bottom: 10%;
            right: 20%;
            animation-delay: 3s;
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

        .plant-mockup {
            background: linear-gradient(135deg, #166534 0%, #15803d 50%, #22c55e 100%);
            border-radius: 16px;
            padding: 20px;
            color: white;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transform: perspective(1000px) rotateX(10deg) rotateY(-5deg);
            transition: transform 0.3s ease;
        }

        .plant-mockup:hover {
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
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            animation: security-pulse 3s ease-in-out infinite;
        }

        @keyframes security-pulse {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(22, 163, 74, 0.4);
            }

            50% {
                box-shadow: 0 0 30px rgba(22, 163, 74, 0.7);
            }
        }

        .gradient-text {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .file-input-wrapper {
            position: relative;
            display: inline-block;
            cursor: pointer;
            width: 100%;
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            left: -9999px;
        }

        .file-input-display {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 16px;
            border: 2px dashed rgba(34, 197, 94, 0.3);
            border-radius: 12px;
            background: rgba(34, 197, 94, 0.05);
            transition: all 0.3s ease;
            min-height: 60px;
        }

        .file-input-wrapper:hover .file-input-display {
            border-color: #22c55e;
            background: rgba(34, 197, 94, 0.1);
        }

        .file-preview {
            max-width: 100px;
            max-height: 60px;
            border-radius: 8px;
            object-fit: cover;
        }

        /* Password strength indicator */
        .password-strength {
            margin-top: 12px;
        }

        .strength-bar {
            height: 4px;
            background: rgba(34, 197, 94, 0.1);
            border-radius: 2px;
            overflow: hidden;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            transition: all 0.4s ease;
            border-radius: 2px;
        }

        .strength-text {
            font-size: 12px;
            margin-top: 6px;
            font-weight: 500;
            color: #6b7280;
        }

        .strength-weak .strength-fill {
            width: 33%;
            background: linear-gradient(90deg, #ef4444, #f87171);
        }

        .strength-medium .strength-fill {
            width: 66%;
            background: linear-gradient(90deg, #f59e0b, #fbbf24);
        }

        .strength-strong .strength-fill {
            width: 100%;
            background: linear-gradient(90deg, #10b981, #34d399);
        }

        .strength-weak .strength-text {
            color: #ef4444;
        }

        .strength-medium .strength-text {
            color: #f59e0b;
        }

        .strength-strong .strength-text {
            color: #10b981;
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
                        Détection IA<br>
                        <span
                            class="text-transparent gradient-text bg-gradient-to-r from-white to-green-200 bg-clip-text">
                            Maladies des Plantes
                        </span>
                    </h1>
                    <p class="text-lg leading-relaxed xl:text-xl text-white/80">
                        Rejoignez notre plateforme d'intelligence artificielle pour diagnostiquer et traiter les
                        maladies de vos plantes.
                    </p>
                </div>

                <!-- Interface de diagnostic -->
                <div class="flex justify-center slide-up lg:justify-start" style="animation-delay: 0.2s;">
                    <div class="w-full max-w-xs plant-mockup lg:max-w-sm">
                        <div class="flex items-start justify-between mb-6 lg:mb-8">
                            <div>
                                <div class="mb-1 text-xs text-green-300">DIAGNOSTIC IA</div>
                                <div class="text-sm font-semibold">PlanteDoctor PRO</div>
                            </div>
                            <div class="flex space-x-2">
                                <div
                                    class="flex items-center justify-center w-6 h-4 rounded lg:w-8 lg:h-6 bg-gradient-to-r from-green-400 to-emerald-500">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <div
                                    class="flex items-center justify-center w-6 h-4 rounded lg:w-8 lg:h-6 bg-gradient-to-r from-lime-400 to-green-500">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 lg:mb-6">
                            <div class="text-xl font-bold lg:text-2xl">Analyse Rapide</div>
                            <div class="mt-1 text-sm text-green-200">Diagnostic en temps réel</div>
                        </div>

                        <div class="flex items-end justify-between">
                            <div>
                                <div class="mb-1 text-xs text-green-300">PRÉCISION</div>
                                <div class="text-sm font-semibold">95.8%</div>
                            </div>
                            <div>
                                <div class="mb-1 text-xs text-green-300">ANALYSES</div>
                                <div class="text-sm font-semibold">1000+</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features -->
                <div class="space-y-4 slide-up" style="animation-delay: 0.4s;">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-white/10">
                            <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold">Diagnostic instantané</div>
                            <div class="text-sm text-white/70">Analysez vos plantes en quelques secondes</div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-white/10">
                            <svg class="w-6 h-6 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold">Experts botanistes</div>
                            <div class="text-sm text-white/70">Conseils personnalisés par des spécialistes</div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-white/10">
                            <svg class="w-6 h-6 text-lime-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold">Suivi personnalisé</div>
                            <div class="text-sm text-white/70">Historique et évolution de vos plantes</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section droite - Formulaire -->
            <div class="w-full slide-up">
                <!-- Mobile header -->
                <div class="px-4 mb-6 text-center text-white lg:hidden">
                    <h1 class="mb-2 text-2xl font-bold sm:text-3xl">
                        PlanteDoctor
                        <span
                            class="block text-transparent gradient-text bg-gradient-to-r from-white to-green-200 bg-clip-text">
                            Diagnostic IA
                        </span>
                    </h1>
                    <p class="text-sm text-white/80 sm:text-base">
                        Créez votre compte pour accéder au diagnostic
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
                                        d="M12,2A3,3 0 0,1 15,5V11A3,3 0 0,1 12,14A3,3 0 0,1 9,11V5A3,3 0 0,1 12,2M19,11C19,14.53 16.39,17.44 13,17.93V21H11V17.93C7.61,17.44 5,14.53 5,11H7A5,5 0 0,0 12,16A5,5 0 0,0 17,11H19Z" />
                                </svg>
                            </div>
                        </div>

                        <h2 class="mb-2 text-2xl font-bold text-gray-800 lg:text-3xl">Rejoindre PlanteDoctor</h2>
                        <p class="hidden text-sm text-gray-600 lg:text-base lg:block">Diagnostic intelligent des
                            maladies des plantes</p>
                    </div>

                 

                    <!-- Formulaire -->
                    <form id="signupForm" class="space-y-5" method="POST" action="{{ route('register') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Nom -->
                        <div class="space-y-2">

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" id="name" name="name" required
                                    class="w-full py-4 pl-12 pr-4 font-medium border premium-input rounded-xl focus:outline-none"
                                    placeholder="entrer votre nom" autocomplete="family-name">
                            </div>
                        </div>



                        <!-- Email -->
                        <div class="space-y-2">

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input type="email" id="email" name="email" required
                                    class="w-full py-4 pl-12 pr-4 font-medium border premium-input rounded-xl focus:outline-none"
                                    placeholder="entrer votre email" autocomplete="email">
                            </div>
                        </div>

                        <!-- Téléphone -->
                        <div class="space-y-2">

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <input type="tel" id="phone" name="phone" required
                                    class="w-full py-4 pl-12 pr-4 font-medium border premium-input rounded-xl focus:outline-none"
                                    placeholder="telephone +237 6 XX XX XX XX" autocomplete="tel">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="file" id="photo" name="photo" required
                                    class="w-full py-4 pl-12 pr-4 font-medium border premium-input rounded-xl focus:outline-none"
                                    placeholder="Photo de profile" autocomplete="given-name">
                            </div>
                        </div>




                        <!-- Mot de passe -->
                        <div class="space-y-2">
                            <input type="password" id="password" name="password" required
                                class="w-full py-4 pl-4 pr-4 font-medium border premium-input rounded-xl focus:outline-none"
                                placeholder="Mot de passe sécurisé" autocomplete="new-password">


                            @error('password')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirmation du mot de passe -->
                        <div class="space-y-2">

                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="w-full py-4 pl-4 pr-4 font-medium border premium-input rounded-xl focus:outline-none"
                                placeholder="Retapez votre mot de passe" autocomplete="new-password">
                            <p class="text-sm text-red-500" id="confirmError" style="display: none;">Les mots de
                                passe ne correspondent pas.</p>
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full py-3 font-semibold text-white transition duration-300 bg-blue-600 hover:bg-blue-700 rounded-xl">
                                S’inscrire
                            </button>
                            <p class="mt-4 text-sm text-center">
                                Déjà un compte ?
                                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Se
                                    connecter</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
