@extends('layouts.app1')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-primary">Historique des diagnostics</h2>

    @if($diagnostics->count() > 0)
        <div class="row">
            @foreach($diagnostics as $diag)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/' . $diag->image_path) }}"
                             class="card-img-top"
                             alt="Image diagnostiquée"
                             style="max-height: 250px; object-fit: cover;">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-success">{{ $diag->predicted_class }}</h5>
                            <p class="card-text mb-2">
                                <small class="text-muted">Le {{ $diag->created_at->format('d/m/Y H:i') }}</small>
                            </p>

                            @if($diag->maladie)
                                <hr>
                                <p><strong>Maladie détectée :</strong> {{ $diag->maladie->nom }}</p>
                                <p class="text-muted">{{ $diag->maladie->description }}</p>

                                @if($diag->maladie->recommendations->count())
                                    <div class="mt-2">
                                        <strong class="text-primary">Recommandations :</strong>
                                        <ul class="small ps-3 mt-1">
                                            @foreach($diag->maladie->recommendations as $reco)
                                                <li>{{ $reco->contenu }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            @else
                                <p class="text-muted">Aucune maladie détectée.</p>
                            @endif

                            <div class="mt-auto">
                                <button type="button"
                                        class="btn btn-sm btn-outline-danger mt-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $diag->id }}">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de confirmation -->
                <div class="modal fade" id="deleteModal{{ $diag->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $diag->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="deleteModalLabel{{ $diag->id }}">Confirmation de suppression</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                            </div>
                            <div class="modal-body">
                                Êtes-vous sûr de vouloir supprimer ce diagnostic ?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('diagnostics.destroy', $diag->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Bootstrap centrée -->
        <div class="d-flex justify-content-center">
            {{ $diagnostics->links() }}
        </div>
    @else
        <div class="alert alert-info">
            Aucun diagnostic enregistré pour le moment.
        </div>
    @endif
</div>
@endsection
