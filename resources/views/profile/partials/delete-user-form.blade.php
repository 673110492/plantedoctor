<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Supprimer le compte</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen p-6 bg-white dark:bg-gray-900">

<section class="w-full max-w-lg p-8 space-y-6 bg-white rounded-lg shadow-lg dark:bg-gray-800" x-data="{ openModal: false }">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Supprimer le compte
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.
        </p>
    </header>

    <button
        @click.prevent="openModal = true"
        class="px-5 py-2 font-semibold text-white transition bg-red-600 rounded-md hover:bg-red-700"
    >
        Supprimer le compte
    </button>

    <!-- Modal -->
    <div
        x-show="openModal"
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        style="display: none;"
        @keydown.escape.window="openModal = false"
    >
        <div
            class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800"
            @click.away="openModal = false"
            role="dialog" aria-modal="true" aria-labelledby="modal-title"
        >
            <form method="POST" action="/profile/destroy">
                <!-- Token CSRF et méthode DELETE Laravel -->
                <input type="hidden" name="_method" value="delete" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <h2 id="modal-title" class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Êtes-vous sûr de vouloir supprimer votre compte ?
                </h2>

                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Veuillez entrer votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.
                </p>

                <div class="mt-4">
                    <label for="password" class="sr-only">Mot de passe</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Mot de passe"
                        class="block w-3/4 mt-1 border-gray-300 rounded-md dark:border-gray-700 focus:border-red-600 focus:ring-red-600 dark:bg-gray-900 dark:text-gray-100"
                        required
                    />
                    <p class="mt-2 text-sm text-red-600" id="password-error" style="display:none;">Mot de passe incorrect</p>
                </div>

                <div class="flex justify-end mt-6 space-x-3">
                    <button
                        type="button"
                        @click="openModal = false"
                        class="px-4 py-2 text-gray-700 transition border border-gray-300 rounded-md dark:border-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                    >
                        Annuler
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 text-white transition bg-red-600 rounded-md hover:bg-red-700"
                    >
                        Supprimer le compte
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

</body>
</html>
