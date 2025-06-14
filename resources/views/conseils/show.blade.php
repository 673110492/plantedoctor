@extends('layouts.app1')

@section('content')
<div class="container mt-4">
    <div class="shadow-sm card">
        <div class="card-body">
            <h2 class="card-title">{{ $conseil->nom }}</h2>
            <p class="text-muted"><em><strong>Nom scientifique :</strong> {{ $conseil->nom_scientifique ?? 'N/A' }}</em></p>

            @if ($conseil->image_principale_url)
                <div class="mb-4 text-center">
                    <img src="{{ asset('storage/' . $conseil->image_principale_url) }}"
                         alt="{{ $conseil->nom }}"
                         class="rounded img-fluid"
                         style="max-height: 300px; width: auto;">
                </div>
            @endif

            <div class="mb-3">
                <h5>Description courte :</h5>
                <p>{{ $conseil->description_courte ?? 'Aucune description.' }}</p>
            </div>

            <div class="mb-3">
                <h5>Symptômes :</h5>
                <p>{{ $conseil->symptomes ?? 'Non renseigné.' }}</p>
            </div>

            <div class="mb-3">
                <h5>Causes :</h5>
                <p>{{ $conseil->causes ?? 'Non renseigné.' }}</p>
            </div>

            <div class="mb-3">
                <h5>Mesures préventives :</h5>
                <p>{{ $conseil->mesures_preventives ?? 'Non renseigné.' }}</p>
            </div>

            <div class="mb-3">
                <h5>Contrôle biologique :</h5>
                <p>{{ $conseil->controle_biologique ?? 'Non renseigné.' }}</p>
            </div>

            <div class="mb-3">
                <h5>Contrôle chimique :</h5>
                <p>{{ $conseil->controle_chimique ?? 'Non renseigné.' }}</p>
            </div>

            <a href="{{ route('conseils.index') }}" class="mt-3 btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
