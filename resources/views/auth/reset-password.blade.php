{{-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le mot de passe</title>
    @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen px-4 bg-gradient-to-r from-purple-100 to-indigo-200">

    <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-2xl">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="w-auto h-12">
        </div>

        <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Réinitialiser le mot de passe</h2>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- New Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                <input id="password" name="password" type="password" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <div>
                <button type="submit"
                    class="w-full px-4 py-2 text-white transition duration-300 bg-indigo-600 rounded-lg hover:bg-indigo-700">
                    Réinitialiser le mot de passe
                </button>
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
    <title>Réinitialiser le mot de passe - PlantDiag Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .agricultural-bg {
            background-image:
                linear-gradient(135deg, rgba(34, 197, 94, 0.1) 0%, rgba(22, 163, 74, 0.1) 100%),
                url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%2316a34a' fill-opacity='0.05'%3E%3Cpath d='M20 20c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10zm10 0c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10z'/%3E%3C/g%3E%3C/svg%3E");
        }

        .leaf-border {
            border-image: linear-gradient(45deg, #22c55e, #16a34a, #15803d) 1;
        }

        .microscope-shadow {
            box-shadow:
                0 10px 25px -5px rgba(34, 197, 94, 0.1),
                0 10px 10px -5px rgba(34, 197, 94, 0.04);
        }

        .diagnostic-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(34, 197, 94, 0.15);
        }

        .plant-pulse {
            animation: plantPulse 2s ease-in-out infinite;
        }

        @keyframes plantPulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.05);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4 agricultural-bg">

    <div class="w-full max-w-lg">
        <!-- Main Container -->
        <div class="p-8 transition-all duration-300 bg-white rounded-2xl microscope-shadow diagnostic-hover">

            <!-- Header Section -->
            <div class="mb-8 text-center fade-in-up">
                <!-- Scientific Icon -->
                <div class="relative inline-block mb-4">
                    <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl plant-pulse">
                        <i class="text-xl text-white fas fa-microscope"></i>
                    </div>
                    <!-- Disease indicator dot -->
                    <div class="absolute flex items-center justify-center w-4 h-4 bg-orange-400 border-2 border-white rounded-full -top-1 -right-1">
                        <i class="text-xs text-white fas fa-exclamation"></i>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="mb-2 text-2xl font-bold text-gray-800">PlantDiag Pro</h1>
                <h2 class="mb-2 text-lg font-semibold text-green-700">Réinitialisation du mot de passe</h2>
                <p class="text-sm text-gray-600">Système expert de diagnostic phytosanitaire</p>

                <!-- Status Indicators -->
                <div class="flex items-center justify-center mt-4 space-x-4 text-xs">
                    <div class="flex items-center text-green-600">
                        <div class="w-2 h-2 mr-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span>IA Active</span>
                    </div>
                    <div class="flex items-center text-blue-600">
                        <div class="w-2 h-2 mr-2 bg-blue-500 rounded-full animate-pulse"></div>
                        <span>Base de données: 1,247 maladies</span>
                    </div>
                </div>
            </div>

            <!-- Security Notice -->
            <div class="p-3 mb-6 border-l-4 rounded bg-amber-50 border-amber-400 fade-in-up stagger-1">
                <div class="flex items-center">
                    <i class="mr-2 fas fa-shield-alt text-amber-600"></i>
                    <p class="text-sm text-amber-800">
                        <strong>Sécurité:</strong> Votre nouveau mot de passe doit être robuste pour protéger vos données de diagnostic.
                    </p>
                </div>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                @csrf

                <!-- Hidden Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Field -->
                <div class="fade-in-up stagger-2">
                    <label for="email" class="flex items-center mb-2 text-sm font-medium text-gray-700">
                        <i class="mr-2 text-green-600 fas fa-user-md"></i>
                        Identifiant du diagnosticien
                    </label>
                    <div class="relative">
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email', $request->email) }}"
                            required
                            class="w-full px-4 py-3 transition-colors border border-gray-300 rounded-lg pl-11 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                            placeholder="votre.email@plantdiag.com"
                            readonly
                        >
                        <i class="absolute text-gray-400 transform -translate-y-1/2 fas fa-envelope left-3 top-1/2"></i>
                    </div>
                    @error('email')
                        <p class="flex items-center mt-1 text-sm text-red-600">
                            <i class="mr-1 fas fa-exclamation-circle"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- New Password Field -->
                <div class="fade-in-up stagger-3">
                    <label for="password" class="flex items-center mb-2 text-sm font-medium text-gray-700">
                        <i class="mr-2 text-green-600 fas fa-key"></i>
                        Nouveau mot de passe sécurisé
                    </label>
                    <div class="relative">
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            class="w-full px-4 py-3 transition-colors border border-gray-300 rounded-lg pl-11 pr-11 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                            placeholder="Minimum 8 caractères"
                        >
                        <i class="absolute text-gray-400 transform -translate-y-1/2 fas fa-lock left-3 top-1/2"></i>
                        <button type="button" class="absolute text-gray-400 transform -translate-y-1/2 right-3 top-1/2 hover:text-gray-600" onclick="togglePassword('password')">
                            <i class="fas fa-eye" id="password-toggle"></i>
                        </button>
                    </div>
                    <!-- Password Strength Indicator -->
                    <div class="mt-2">
                        <div class="flex space-x-1">
                            <div class="w-1/4 h-1 bg-gray-200 rounded" id="strength-1"></div>
                            <div class="w-1/4 h-1 bg-gray-200 rounded" id="strength-2"></div>
                            <div class="w-1/4 h-1 bg-gray-200 rounded" id="strength-3"></div>
                            <div class="w-1/4 h-1 bg-gray-200 rounded" id="strength-4"></div>
                        </div>
                        <p class="mt-1 text-xs text-gray-500" id="strength-text">Force du mot de passe</p>
                    </div>
                    @error('password')
                        <p class="flex items-center mt-1 text-sm text-red-600">
                            <i class="mr-1 fas fa-exclamation-circle"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="fade-in-up stagger-4">
                    <label for="password_confirmation" class="flex items-center mb-2 text-sm font-medium text-gray-700">
                        <i class="mr-2 text-green-600 fas fa-check-double"></i>
                        Confirmation du mot de passe
                    </label>
                    <div class="relative">
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            required
                            class="w-full px-4 py-3 transition-colors border border-gray-300 rounded-lg pl-11 pr-11 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                            placeholder="Répétez le mot de passe"
                        >
                        <i class="absolute text-gray-400 transform -translate-y-1/2 fas fa-shield-check left-3 top-1/2"></i>
                        <button type="button" class="absolute text-gray-400 transform -translate-y-1/2 right-3 top-1/2 hover:text-gray-600" onclick="togglePassword('password_confirmation')">
                            <i class="fas fa-eye" id="password_confirmation-toggle"></i>
                        </button>
                    </div>
                    <div class="mt-1" id="password-match">
                        <!-- Password match indicator will appear here -->
                    </div>
                    @error('password_confirmation')
                        <p class="flex items-center mt-1 text-sm text-red-600">
                            <i class="mr-1 fas fa-exclamation-circle"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-4 fade-in-up stagger-4">
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold py-3 px-4 rounded-lg hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transform hover:scale-[1.02] transition-all duration-200 shadow-lg"
                    >
                        <i class="mr-2 fas fa-sync-alt"></i>
                        Réinitialiser et sécuriser l'accès
                    </button>
                </div>
            </form>

            <!-- Footer Info -->
            <div class="pt-4 mt-6 text-center border-t border-gray-100 fade-in-up stagger-4">
                <div class="flex items-center justify-center space-x-4 text-xs text-gray-500">
                    <div class="flex items-center">
                        <i class="mr-1 text-green-500 fas fa-database"></i>
                        <span>Données sécurisées SSL</span>
                    </div>
                    <div class="flex items-center">
                        <i class="mr-1 text-green-500 fas fa-leaf"></i>
                        <span>Certifié agriculture 4.0</span>
                    </div>
                </div>
                <p class="mt-2 text-xs text-gray-400">
                    © PlantDiag Pro - Diagnostic phytopathologique assisté par IA
                </p>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const toggle = document.getElementById(fieldId + '-toggle');

            if (field.type === 'password') {
                field.type = 'text';
                toggle.classList.remove('fa-eye');
                toggle.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                toggle.classList.remove('fa-eye-slash');
                toggle.classList.add('fa-eye');
            }
        }

        // Password strength checker
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strength = calculatePasswordStrength(password);
            updateStrengthIndicator(strength);
        });

        function calculatePasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            return Math.min(strength, 4);
        }

        function updateStrengthIndicator(strength) {
            const indicators = ['strength-1', 'strength-2', 'strength-3', 'strength-4'];
            const colors = ['bg-red-400', 'bg-orange-400', 'bg-yellow-400', 'bg-green-400'];
            const texts = ['Très faible', 'Faible', 'Moyen', 'Fort', 'Très fort'];

            indicators.forEach((id, index) => {
                const element = document.getElementById(id);
                element.className = 'h-1 w-1/4 rounded ' + (index < strength ? colors[Math.min(strength-1, 3)] : 'bg-gray-200');
            });

            document.getElementById('strength-text').textContent = 'Force: ' + (texts[strength] || 'Aucune');
        }

        // Password match checker
        document.getElementById('password_confirmation').addEventListener('input', function(e) {
            const password = document.getElementById('password').value;
            const confirmation = e.target.value;
            const matchDiv = document.getElementById('password-match');

            if (confirmation.length > 0) {
                if (password === confirmation) {
                    matchDiv.innerHTML = '<p class="flex items-center text-xs text-green-600"><i class="mr-1 fas fa-check"></i>Les mots de passe correspondent</p>';
                } else {
                    matchDiv.innerHTML = '<p class="flex items-center text-xs text-red-600"><i class="mr-1 fas fa-times"></i>Les mots de passe ne correspondent pas</p>';
                }
            } else {
                matchDiv.innerHTML = '';
            }
        });
    </script>
</body>
</html>
