<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Confirmer le mot de passe</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-tr from-gray-100 to-gray-300 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
        <!-- Message d'information -->
        <p class="mb-6 text-gray-700 dark:text-gray-400 text-center text-sm">
            Ceci est une zone sécurisée de l'application.<br />
            Veuillez confirmer votre mot de passe avant de continuer.
        </p>

        <!-- Formulaire -->
        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
            @csrf

            <!-- Champ mot de passe -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Mot de passe
                </label>
                <input id="password" name="password" type="password" required autocomplete="current-password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" />
                @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bouton de confirmation -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                    Confirmer
                </button>
            </div>
        </form>
    </div>

</body>
</html>
