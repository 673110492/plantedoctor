@extends('layouts.app1')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Modifier la maladie</h2>

    <form action="{{ route('maladies.update', $maladie) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom de la maladie</label>
            <input type="text" id="nom" name="nom" class="form-control" value="{{ $maladie->nom }}" required>
        </div>

        <div class="mb-3">
            <label for="symptome" class="form-label">symptome</label>
            <textarea id="symptome" name="symptome" class="form-control" rows="4" required>{{ $maladie->symptome }}</textarea>
        </div>
        <div class="mb-3">
            <label for="cause" class="form-label">cause</label>
            <textarea id="cause" name="cause" class="form-control" rows="4" required>{{ $maladie->cause }}</textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4" required>{{ $maladie->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Recommandations</label>
            @foreach($maladie->recommendations as $index => $rec)
                <input type="text" name="recommendations[]" class="form-control mb-2" value="{{ $rec->contenu }}" placeholder="Recommandation {{ $index + 1 }}">
            @endforeach
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('maladies.index') }}" class="btn btn-secondary">Annuler</a>
            <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
        </div>
    </form>
</div>
@endsection
