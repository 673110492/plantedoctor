<?php

namespace App\Policies;

use App\Models\Forum;
use App\Models\User;

class ForumPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Tout utilisateur peut voir la liste des forums (ajuste si besoin)
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Forum $forum): bool
    {
        return true; // Tout utilisateur peut voir un forum (ajuste si besoin)
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Tout utilisateur connecté peut créer un forum
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Forum $forum): bool
    {
        // Seul le créateur peut modifier
        return $user->id === $forum->created_by;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Forum $forum): bool
    {
        // Optionnel : même règle que update pour supprimer
        return $user->id === $forum->created_by;
    }

    public function restore(User $user, Forum $forum): bool
    {
        return false;
    }

    public function forceDelete(User $user, Forum $forum): bool
    {
        return false;
    }
}
