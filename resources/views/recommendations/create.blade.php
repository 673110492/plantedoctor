@extends('layouts.app1')

@section('content')
<div class="container">
    <h1>Ajouter une recommandation</h1>

    <form action="{{ route('recommendations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="maladie_id">Maladie</label>
            <select name="maladie_id" class="form-control" required>
                @foreach($maladies as $maladie)
                    <option value="{{ $maladie->id }}">{{ $maladie->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Contenu</label>
            <textarea name="contenu" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
