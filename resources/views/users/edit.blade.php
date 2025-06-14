@extends('layouts.app1')

@section('content')
<div class="container">
    <h2>Modifier un utilisateur</h2>

    {{-- Affichage des erreurs de validation --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire de modification --}}
    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('users.partials.form', ['user' => $user])

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
