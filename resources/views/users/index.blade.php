@extends('layouts.app1')

@section('content')
    <div class="container">
        <h2>Liste des utilisateurs</h2>

        <!-- Bouton vers la liste des rôles -->
        <a href="{{ route('roles.index') }}" class="mb-3 btn btn-outline-secondary">
            ← Retour à la liste des rôles
        </a>

        <a href="{{ route('users.create') }}" class="mb-3 btn btn-primary">+ Nouvel utilisateur</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <a href="{{ route('users.show', $user) }}">
                                {{ $user->name }} {{ $user->prenom }}
                            </a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->statut ? 'Actif' : 'Inactif' }}</td>

                        <td>
                            <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-info" title="Voir">👁️</a>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning"
                                title="Modifier">✏️</a>
                            <a href="{{ route('users.roles.edit', $user) }}" class="btn btn-sm btn-primary"
                                title="Gérer rôles & permissions">
                                🔑 Rôles & Permissions
                            </a>

                            <!-- Bouton pour ouvrir la modal -->

                            <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#toggleStatusModal{{ $user->id }}">
                                {{ $user->statut ? 'Désactiver' : 'Activer' }}
                            </button>

                            @if (Auth::User()->hasPermission('users-delete'))
                                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Supprimer cet utilisateur ?')"
                                        title="Supprimer">🗑️</button>


                                </form>
                            @endif


                            <!-- Modal -->
                            <div class="modal fade" id="toggleStatusModal{{ $user->id }}" tabindex="-1"
                                aria-labelledby="toggleStatusModalLabel{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="toggleStatusModalLabel{{ $user->id }}">
                                                Confirmation de changement de statut</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Fermer"></button>
                                        </div>
                                        <div class="modal-body">
                                            Voulez-vous vraiment {{ $user->statut ? 'désactiver' : 'activer' }}
                                            l'utilisateur <strong>{{ $user->name }} {{ $user->prenom }}</strong> ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annuler</button>
                                            <form action="{{ route('users.toggleStatus', $user) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-primary">
                                                    Oui, {{ $user->statut ? 'désactiver' : 'activer' }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
