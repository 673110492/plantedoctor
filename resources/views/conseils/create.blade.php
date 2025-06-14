@extends('layouts.app1')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Ajouter un nouveau conseil</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oups !</strong> Veuillez corriger les erreurs ci-dessous :
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('conseils.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom *</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
        </div>

        <div class="mb-3">
            <label for="nom_scientifique" class="form-label">Nom scientifique</label>
            <input type="text" name="nom_scientifique" class="form-control" value="{{ old('nom_scientifique') }}">
        </div>

        <div class="mb-3">
            <label for="description_courte" class="form-label">Description courte</label>
            <textarea name="description_courte" class="form-control" rows="3">{{ old('description_courte') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="symptomes" class="form-label">Symptômes</label>
            <textarea name="symptomes" class="form-control" rows="2">{{ old('symptomes') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="causes" class="form-label">Causes</label>
            <textarea name="causes" class="form-control" rows="2">{{ old('causes') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="mesures_preventives" class="form-label">Mesures préventives</label>
            <textarea name="mesures_preventives" class="form-control" rows="2">{{ old('mesures_preventives') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="controle_biologique" class="form-label">Contrôle biologique</label>
            <textarea name="controle_biologique" class="form-control" rows="2">{{ old('controle_biologique') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="controle_chimique" class="form-label">Contrôle chimique</label>
            <textarea name="controle_chimique" class="form-control" rows="2">{{ old('controle_chimique') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image_principale_url" class="form-label">Image principale</label>
            <input type="file" name="image_principale_url" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('conseils.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
