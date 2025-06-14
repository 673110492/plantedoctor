@extends('layouts.app1')

@section('content')
<div class="container mt-4">
    <h2>Détails de l'utilisateur</h2>

    <div class="card mb-3" style="max-width: 600px;">
        <div class="row g-0">
            <div class="col-md-4">
                @if($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo de {{ $user->name }}" class="img-fluid rounded-start">
                @else
                    <img src="{{ asset('images/default-user.png') }}" alt="Photo par défaut" class="img-fluid rounded-start">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }} {{ $user->prenom }}</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="card-text"><strong>Téléphone:</strong> {{ $user->phone ?? 'Non renseigné' }}</p>
                    <p class="card-text"><strong>Adresse:</strong> {{ $user->adresse ?? 'Non renseignée' }}</p>
                    <p class="card-text"><strong>Date de naissance:</strong> {{ $user->date_naissance ? $user->date_naissance->format('d/m/Y') : 'Non renseignée' }}</p>
                    <p class="card-text"><strong>Statut:</strong> {{ $user->statut ? 'Actif' : 'Inactif' }}</p>
                    <p class="card-text"><small class="text-muted">Créé le {{ $user->created_at->format('d/m/Y à H:i') }}</small></p>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Modifier</a>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
