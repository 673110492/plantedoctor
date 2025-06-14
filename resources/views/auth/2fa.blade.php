





<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlanteDoctor - Vérification 2FA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --accent-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-gradient: linear-gradient(135deg, #2d3436 0%, #636e72 100%);
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
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
                background: linear-gradient(180deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            }

            .floating-shapes .shape {
                display: none;
            }

            .security-mockup {
                transform: none;
                max-width: 280px;
                padding: 16px;
            }

            .security-mockup:hover {
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
                padding: 16px 12px;
                font-size: 18px;
                /* Prevents zoom on iOS */
                text-align: center;
            }

            .premium-button {
                padding: 16px;
                font-size: 18px;
            }

            .code-input {
                width: 45px;
                height: 50px;
                font-size: 20px;
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
            border: 2px solid rgba(102, 126, 234, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .premium-input:focus {
            background: rgba(255, 255, 255, 1);
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .code-input {
            width: 55px;
            height: 60px;
            text-align: center;
            font-size: 24px;
            font-weight: 700;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(102, 126, 234, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .code-input:focus {
            background: rgba(255, 255, 255, 1);
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .code-input.filled {
            border-color: #48bb78;
            background: rgba(72, 187, 120, 0.1);
        }

        .premium-button {
            background: var(--primary-gradient);
            border: none;
            box-shadow: 0 8px 32px rgba(102, 126, 234, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .premium-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(102, 126, 234, 0.5);
        }

        .premium-button:active {
            transform: translateY(-1px);
        }

        .premium-button:disabled {
            opacity: 0.7;
            transform: none;
            cursor: not-allowed;
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

        .security-mockup {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            border-radius: 20px;
            padding: 24px;
            color: white;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transform: perspective(1000px) rotateX(10deg) rotateY(-5deg);
            transition: transform 0.3s ease;
        }

        .security-mockup:hover {
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
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            animation: security-pulse 3s ease-in-out infinite;
        }

        @keyframes security-pulse {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(72, 187, 120, 0.4);
            }

            50% {
                box-shadow: 0 0 30px rgba(72, 187, 120, 0.7);
            }
        }

        .gradient-text {
            background: var(--primary-gradient);
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

        .countdown-circle {
            stroke-dasharray: 283;
            stroke-dashoffset: 283;
            animation: countdown 30s linear;
        }

        @keyframes countdown {
            from {
                stroke-dashoffset: 283;
            }

            to {
                stroke-dashoffset: 0;
            }
        }

        .security-indicator {
            animation: security-glow 2s ease-in-out infinite;
        }

        @keyframes security-glow {

            0%,
            100% {
                box-shadow: 0 0 15px rgba(34, 197, 94, 0.4);
            }

            50% {
                box-shadow: 0 0 25px rgba(34, 197, 94, 0.7);
            }
        }

        .shake {
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }
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
                        Sécurité<br>
                        <span
                            class="text-transparent gradient-text bg-gradient-to-r from-white to-blue-200 bg-clip-text">
                            double authentification
                        </span>
                    </h1>
                    <p class="text-lg leading-relaxed xl:text-xl text-white/80">
                        Protégez votre compte avec une couche de sécurité supplémentaire grâce à la vérification en deux
                        étapes.
                    </p>
                </div>

                <!-- Mockup de sécurité -->
                <div class="flex justify-center slide-up lg:justify-start" style="animation-delay: 0.2s;">
                    <div class="w-full max-w-xs security-mockup lg:max-w-sm">
                        <div class="flex items-start justify-between mb-6 lg:mb-8">
                            <div>
                                <div class="mb-1 text-xs text-gray-400">AUTHENTIFICATION</div>
                                <div class="text-sm font-semibold">SÉCURISÉE</div>
                            </div>
                            <div
                                class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full security-indicator">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                                </svg>
                            </div>
                        </div>

                        <div class="mb-6 text-center lg:mb-8">
                            <div class="mb-2 text-4xl font-bold tracking-wider lg:text-5xl">2FA</div>
                            <div class="text-sm text-gray-400">Code de vérification</div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                <div class="text-sm">EMAIL envoyé</div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"
                                    style="animation-delay: 0.5s;"></div>
                                <div class="text-sm">En attente de saisie</div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                                <div class="text-sm text-gray-400">Vérification...</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features -->
                <div class="space-y-4 slide-up" style="animation-delay: 0.4s;">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-white/10">
                            <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold">Protection renforcée</div>
                            <div class="text-sm text-white/70">Code temporaire unique</div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-white/10">
                            <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold">Livraison EMAIL</div>
                            <div class="text-sm text-white/70">Code envoyé a votre adresse email</div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-white/10">
                            <svg class="w-6 h-6 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold">Expiration rapide</div>
                            <div class="text-sm text-white/70">Valide pendant 5 minutes</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section droite - Formulaire 2FA -->
            <div class="w-full slide-up">
                <!-- Mobile header (visible only on mobile) -->
                <div class="px-4 mb-6 text-center text-white lg:hidden">
                    <h1 class="mb-2 text-2xl font-bold sm:text-3xl">
                        Vérification
                        <span
                            class="block text-transparent gradient-text bg-gradient-to-r from-white to-blue-200 bg-clip-text">
                            de sécurité
                        </span>
                    </h1>
                    <p class="text-sm text-white/80 sm:text-base">
                        Saisissez le code de vérification
                    </p>
                </div>

                <div class="p-6 mx-2 glass-card rounded-2xl lg:rounded-3xl sm:p-8 lg:p-10 sm:mx-0">
                    <!-- Header -->
                    <div class="mb-6 text-center lg:mb-8">
                        <div class="relative inline-block mb-4 lg:mb-6">
                            <div class="absolute inset-0 bg-green-500 rounded-full pulse-ring opacity-20"></div>
                            <div
                                class="relative flex items-center justify-center w-12 h-12 shadow-lg lg:w-16 lg:h-16 bg-gradient-to-br from-green-500 to-blue-600 rounded-xl lg:rounded-2xl">
                                <svg class="w-6 h-6 text-white lg:w-8 lg:h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z" />
                                    <path d="M10 17l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"
                                        fill="rgba(255,255,255,0.8)" />
                                </svg>
                            </div>
                        </div>

                        <h2 class="mb-2 text-2xl font-bold text-gray-800 lg:text-3xl">Vérification 2FA</h2>
                        <p class="text-sm text-gray-600 lg:text-base">
                            Nous avons envoyé un code de vérification à votre adresse email
                        </p>
                    </div>

                    <!-- Badge de sécurité avec timer -->
                    <div class="flex justify-center mb-6 lg:mb-8">
                        <div
                            class="relative flex items-center px-3 py-2 space-x-2 text-xs font-medium text-white rounded-full security-badge lg:px-4 lg:py-2 lg:text-sm">
                            <svg class="w-3 h-3 lg:w-4 lg:h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" />
                            </svg>
                            <span>Code valide : <span id="countdown">4:56</span></span>
                            <div class="absolute -right-1 -top-1">
                                <svg class="w-6 h-6 transform -rotate-90">
                                    <circle cx="12" cy="12" r="10" stroke="rgba(255,255,255,0.3)"
                                        stroke-width="2" fill="none" />
                                    <circle cx="12" cy="12" r="10" stroke="white" stroke-width="2"
                                        fill="none" class="countdown-circle" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Affichage des erreurs de validation Laravel -->
                    @if ($errors->any())
                        <div class="p-4 mb-6 border border-red-200 rounded-lg bg-red-50">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="text-red-700">
                                    @foreach ($errors->all() as $error)
                                        <div class="text-sm">{{ $error }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Affichage des messages de session -->
                    @if (session('error'))
                        <div class="p-4 mb-6 border border-red-200 rounded-lg bg-red-50">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-red-700">{{ session('error') }}</span>
                            </div>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="p-4 mb-6 border border-green-200 rounded-lg bg-green-50">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-green-700">{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif

                    <!-- Formulaire de vérification Laravel -->
                    <form method="POST" action="{{ route('2fa.store') }}" class="space-y-6">
                        @csrf

                        <!-- Code de vérification -->
                        <div class="space-y-4">
                            <label class="block text-sm font-semibold text-center text-gray-700">
                                Saisissez le code de vérification à 6 chiffres
                            </label>



                            <!-- Mot de passe -->
                            <div class="space-y-2">
                                <label for="password" class="block text-sm font-semibold text-gray-700">Code de
                                    verifcation
                                </label>
                                <input type="text" id="password" name="two_factor_code" required
                                    class="w-full py-4 pl-4 pr-4 font-medium border premium-input rounded-xl focus:outline-none"
                                    placeholder="......" autocomplete="new-password">


                            </div>

                            <style>
                                input{
                                    text-align: center;
                                }
                                input::placeholder{
                                    text-align: center;
                                    font-size: 70px;

                                }
                            </style>






                            <div id="errorMessage" class="hidden text-sm text-center text-red-500">
                                Code incorrect. Veuillez réessayer.
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full py-4 text-lg font-bold text-white transition-all duration-300 premium-button rounded-xl">
                            <span  class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Vérifier le code
                            </span>
                        </button>
                    </form>

                    <!-- Options de secours -->
                    <div class="mt-6 space-y-4">
                        <div class="text-center">
                            <form  method="POST" action="{{ route('2fa.resend') }}" class="inline">
                                @csrf
                                <button type="submit" id="resendCode"
                                    class="text-sm font-semibold text-blue-600 transition-colors hover:text-purple-600">
                                    Renvoyer le code EMAIL
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

