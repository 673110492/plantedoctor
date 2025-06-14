@extends('layouts.app1')

@section('content')
<style>
    :root {
        --vert-clair: #d8f3dc;
        --vert-moyen: #95d5b2;
        --vert-fonce: #40916c;
        --beige: #fefae0;
        --gris-fonce: #2d2d2d;
        --rouge: #d62828;
    }

  

    h1 {
        color: var(--vert-fonce);
        font-weight: bold;
        border-left: 6px solid var(--vert-moyen);
        padding-left: 12px;
    }

    .btn-primary {
        background-color: var(--vert-fonce);
        border: none;
    }

    .btn-primary:hover {
        background-color: #2f6f53;
    }



    .btn-danger {
        background-color: var(--rouge);
        border: none;
    }


    .btn-danger:hover {
        background-color: #a4161a;
    }

    .table thead {
        background-color: var(--vert-moyen);
        color: white;
    }

    .table tbody tr:hover {
        background-color: var(--vert-clair);
    }

    .search-box {
        margin-bottom: 1.5rem;
    }

    @media (max-width: 768px) {
        .table-responsive {
            font-size: 0.9rem;
        }

        h1 {
            font-size: 1.5rem;
        }
    }
</style>

<div class="container my-4 container-custom">
    <div class="gap-3 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center">
        <h1 class="m-0">🌿 Liste des maladies</h1>
        <a href="{{ route('maladies.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Nouvelle maladie
        </a>
    </div>

    <!-- Barre de recherche -->
    <form method="GET" action="{{ route('maladies.index') }}" class="search-box">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Rechercher une maladie...">
            <button class="btn btn-outline-success" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table align-middle table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Symptôme</th>
                    <th>Description</th>
                    <th>Recommandations</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($maladies as $maladie)
                    <tr>
                        <td>{{ $maladie->nom }}</td>
                        <td>{{ $maladie->symptome }}</td>
                        <td>{{ Str::limit($maladie->description, 80) }}</td>
                        <td>
                            <ul class="mb-0 ps-3">
                                @foreach($maladie->recommendations as $rec)
                                    <li>{{ $rec->contenu }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('maladies.edit', $maladie) }}" class="btn btn-sm btn-warning me-1" title="Modifier">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('maladies.destroy', $maladie) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer cette maladie ?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" title="Supprimer">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center fst-italic">🌱 Aucune maladie trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
