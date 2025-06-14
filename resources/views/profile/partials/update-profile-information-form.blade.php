<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Modifier les informations du profil</title>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center p-6">

<section class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 max-w-md w-full">
  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      Informations du profil
    </h2>
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
      Mettez à jour les informations de votre compte et votre adresse email.
    </p>
  </header>

  <!-- Formulaire pour renvoyer le mail de vérification -->
  <form id="send-verification" method="POST" action="/verification/send" class="hidden">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  </form>

  <!-- Formulaire de mise à jour du profil -->
  <form method="POST" action="/profile/update" class="mt-6 space-y-6">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="_method" value="patch" />

    <div>
      <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
      <input
        id="name"
        name="name"
        type="text"
        class="mt-1 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
        value="{{ old('name', $user->name) }}"
        required
        autofocus
        autocomplete="name"
      />
      <!-- Affiche les erreurs sur le champ name -->
      <p class="mt-2 text-sm text-red-600" id="error-name" style="display:none;">Erreur sur le nom</p>
    </div>

    <div>
      <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
      <input
        id="email"
        name="email"
        type="email"
        class="mt-1 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500"
        value="{{ old('email', $user->email) }}"
        required
        autocomplete="username"
      />
      <!-- Affiche les erreurs sur le champ email -->
      <p class="mt-2 text-sm text-red-600" id="error-email" style="display:none;">Erreur sur l'email</p>

      <!-- Partie vérification email -->
      <div id="email-unverified" class="mt-2 text-sm text-gray-800 dark:text-gray-200" style="display:none;">
        Votre adresse email n'est pas vérifiée.
        <button
          form="send-verification"
          class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
          type="submit"
        >
          Cliquez ici pour renvoyer l'email de vérification.
        </button>
        <p id="verification-link-sent" class="mt-2 font-medium text-sm text-green-600 dark:text-green-400" style="display:none;">
          Un nouveau lien de vérification a été envoyé à votre adresse email.
        </p>
      </div>
    </div>

    <div class="flex items-center gap-4">
      <button
        type="submit"
        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
      >
        Enregistrer
      </button>

      <!-- Message succès -->
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
  // Simulation d'affichage des éléments en fonction des données côté serveur (à adapter)

  // Par exemple : email non vérifié
  const emailUnverified = false; // true pour tester
  if(emailUnverified){
    document.getElementById('email-unverified').style.display = 'block';
  }

  // Afficher message succès si profile mis à jour
  const profileUpdated = false; // true pour tester
  if(profileUpdated){
    document.getElementById('success-message').style.display = 'block';
  }
</script>

</body>
</html>
