<?php

namespace App\Providers;

use App\Models\Forum;          // <-- N'oublie pas d'importer Forum
use App\Policies\ForumPolicy;  // <-- Import de la policy
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Forum::class => ForumPolicy::class,  // <-- déclaration ici, PAS après boot()
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
