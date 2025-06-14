<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Modifier le mot de passe</title>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center p-6">

<section class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 max-w-md w-full">
  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      Modifier le mot de passe
    </h2>
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
      Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.
    </p>
  </header>

  <form method="POST" action="/password/update" class="mt-6 space-y-6">
    <!-- CSRF token -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="_method" value="put" />

    <div>
      <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
        Mot de passe actuel
      </label>
      <input
        id="current_password"
        name="current_password"
        type="password"
        autocomplete="current-password"
        class="mt-1 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
        required
      />
      <!-- Ici afficher les erreurs de validation pour current_password -->
      <p class="mt-2 text-sm text-red-600" id="error-current_password" style="display:none;">Erreur actuelle</p>
    </div>

    <div>
      <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
        Nouveau mot de passe
      </label>
      <input
        id="password"
        name="password"
        type="password"
        autocomplete="new-password"
        class="mt-1 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
        required
      />
      <!-- Erreurs password -->
      <p class="mt-2 text-sm text-red-600" id="error-password" style="display:none;">Erreur nouveau mot de passe</p>
    </div>

    <div>
      <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
        Confirmer le mot de passe
      </label>
      <input
        id="password_confirmation"
        name="password_confirmation"
        type="password"
        autocomplete="new-password"
        class="mt-1 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
        required
      />
      <!-- Erreurs confirmation -->
      <p class="mt-2 text-sm text-red-600" id="error-password_confirmation" style="display:none;">Erreur confirmation</p>
    </div>

    <div class="flex items-center gap-4">
      <button
        type="submit"
        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
      >
        Enregistrer
      </button>

      <!-- Message succès avec Alpine.js -->
      <p
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 2000)"
        class="text-sm text-gray-600 dark:text-gray-400"
        style="display:none;"
        id="success-message"
      >
        Enregistré.
      </p>
    </div>
  </form>
</section>

<script>
  // Exemple de script JS simple pour afficher le message succès (à adapter selon ton backend)
  // Supposons que si une variable JS indique que la mise à jour a réussi, on affiche le message :
  const passwordUpdated = false; // changer à true pour tester l'affichage
  if (passwordUpdated) {
    document.getElementById('success-message').style.display = 'block';
  }
</script>

</body>
</html>
