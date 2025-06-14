@extends('layouts.app1')

@section('content')
<div class="container py-5">
    <div class="row g-5 align-items-start justify-content-center">
        <!-- Formulaire -->
        <div class="col-lg-6 col-md-10">
            <div class="border-0 shadow card rounded-4">
                <div class="p-4 card-body">
                    <h3 class="mb-3 text-primary"><i class="bi bi-search-heart-fill"></i> Analyse de plante</h3>
                    <p class="mb-4 text-muted">
                        Téléverse une photo de ta plante 🌿. L’IA détecte la maladie et te propose un traitement personnalisé.
                    </p>

                    @if(session('result'))
                        <div class="alert alert-success">
                            <strong>✅ Classe prédite :</strong> {{ session('result')['predicted_class'] }}<br>
                            <strong>Confiance :</strong> {{ number_format(session('result')['confidence'] * 100, 2) }}%
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form id="predict-form" action="{{ route('predict') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="image" class="form-label fw-semibold">Image de la plante :</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <span id="btn-text">Analyser</span>
                                <span id="loader" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>

                    @if(session('maladie'))
                        <div class="mt-4">
                            <div class="shadow-sm card border-start border-5 border-info">
                                <div class="card-body">
                                    <h5 class="card-title text-info"><i class="bi bi-bug-fill"></i> Maladie détectée</h5>
                                    <p><strong>Nom :</strong> {{ session('maladie')->nom }}</p>
                                    <p><strong>Description :</strong> {{ session('maladie')->description }}</p>
                                </div>
                            </div>
                        </div>
                    @elseif(session('message'))
                        <div class="mt-4 alert alert-warning">{{ session('message') }}</div>
                    @endif

                    <div class="mt-3 text-center">
                        <a href="{{ route('diagnostics.index') }}" class="btn btn-outline-dark btn-sm">
                            <i class="bi bi-clock-history"></i> Historique des diagnostics
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Colonne aperçu -->
        <div class="text-center col-lg-5 col-md-10">
            <div class="p-3 border-0 shadow-sm card rounded-4">
                <img id="preview" src="https://via.placeholder.com/450x300?text=Aperçu+image"
                     alt="Aperçu"
                     class="mb-3 rounded img-fluid d-none"
                     style="max-height: 350px;">
                <p id="preview-label" class="text-muted d-none">Image sélectionnée 📸</p>

                @if(session('maladie'))
                    <div class="mt-3 shadow-sm card border-start border-5 border-success text-start">
                        <div class="card-body">
                            <h5 class="card-title text-success"><i class="bi bi-heart-pulse-fill"></i> Recommandations</h5>
                            <ul class="mb-0">
                                @foreach(session('maladie')->recommendations as $reco)
                                    <li>{{ $reco->contenu }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endpush

@push('scripts')
<!-- Script d'aperçu image -->
<script>
    window.onload = () => {
        const input = document.getElementById("image");
        const preview = document.getElementById("preview");
        const label = document.getElementById("preview-label");

        input.addEventListener("change", () => {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                    label.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('d-none');
                label.classList.add('d-none');
            }
        });

        const form = document.getElementById("predict-form");
        form.addEventListener("submit", () => {
            document.getElementById("btn-text").classList.add("d-none");
            document.getElementById("loader").classList.remove("d-none");
        });
    };
</script>
@endpush
