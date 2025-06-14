<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Vérification de l'adresse email</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-300 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-lg bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 space-y-6">

        <p class="text-gray-700 dark:text-gray-300 text-sm">
            Merci pour votre inscription ! Avant de commencer, pourriez-vous vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer ? Si vous n'avez pas reçu l'email, nous serons ravis de vous en envoyer un autre.
        </p>

        <!-- Message de succès -->
        @if (session('status') == 'verification-link-sent')
            <div class="p-4 rounded-md bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 font-semibold text-sm">
                Un nouveau lien de vérification a été envoyé à l'adresse email que vous avez fournie lors de votre inscription.
            </div>
        @endif

        <div class="flex justify-between items-center space-x-4">
            <!-- Formulaire de renvoi du mail de vérification -->
            <form method="POST" action="{{ route('verification.send') }}" class="flex-grow">
                @csrf
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg transition duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Renvoyer l'email de vérification
                </button>
            </form>

            <!-- Formulaire de déconnexion -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 px-4 py-2">
                    Se déconnecter
                </button>
            </form>
        </div>

    </div>

</body>
</html>
