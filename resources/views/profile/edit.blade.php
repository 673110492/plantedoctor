<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center text-3xl font-extrabold leading-tight tracking-wide text-green-800 dark:text-green-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v18m9-9H3" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8l-4 4-4-4" />
            </svg>
            {{ __('Mon Profil') }}
        </h2>
    </x-slot>

    <div class="min-h-screen py-12 bg-gray-50 dark:bg-gray-900">
        <div class="px-6 mx-auto max-w-7xl sm:px-8 lg:px-10">

            <div class="flex flex-wrap justify-center -mx-6 gap-y-10 sm:gap-y-0">

                <!-- Informations personnelles -->
                <section class="flex-1 min-w-[320px] max-w-md p-10 bg-white rounded-xl shadow-lg dark:bg-gray-800 mx-6">
                    <h3 class="pb-3 mb-8 text-2xl font-semibold text-green-800 border-b border-green-300 dark:text-green-200 dark:border-green-700">
                        Informations personnelles
                    </h3>
                    <div class="space-y-6">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </section>

                <!-- Changement de mot de passe -->
                <section class="flex-1 min-w-[320px] max-w-md p-10 bg-white rounded-xl shadow-lg dark:bg-gray-800 mx-6">
                    <h3 class="pb-3 mb-8 text-2xl font-semibold text-green-800 border-b border-green-300 dark:text-green-200 dark:border-green-700">
                        Modifier le mot de passe
                    </h3>
                    <div class="space-y-6">
                        @include('profile.partials.update-password-form')
                    </div>
                </section>

                <!-- Suppression du compte -->
                <section class="flex-1 min-w-[320px] max-w-md p-10 bg-white rounded-xl shadow-lg dark:bg-gray-800 mx-6">
                    <h3 class="pb-3 mb-8 text-2xl font-semibold text-red-600 border-b border-red-400 dark:text-red-400 dark:border-red-700">
                        Supprimer le compte
                    </h3>
                    <div class="space-y-6">
                        @include('profile.partials.delete-user-form')
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>
