@extends('layouts.app1')

@section('content')
<div class="container">
    <h1>Ajouter une maladie</h1>
    <form action="{{ route('maladies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>symptome</label>
            <textarea name="symptome" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>CAUSE</label>
            <textarea name="cause" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Recommandations</label>
            <div id="reco-container">
                <input type="text" name="recommendations[]" class="mb-2 form-control" placeholder="Recommandation 1">
            </div>
            <button type="button" class="btn btn-sm btn-secondary" onclick="addReco()">+ Ajouter une recommandation</button>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>

<script>
    function addReco() {
        const container = document.getElementById('reco-container');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'recommendations[]';
        input.className = 'form-control mb-2';
        input.placeholder = 'Nouvelle recommandation';
        container.appendChild(input);
    }
</script>
@endsection
