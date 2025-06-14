@extends('layouts.app1')

@section('content')
<div class="container">
    <h1>Liste des recommandations</h1>
    <a href="{{ route('recommendations.create') }}" class="btn btn-primary mb-3">+ Nouvelle recommandation</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Maladie</th>
                <th>Contenu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recommendations as $r)
                <tr>
                    <td>{{ $r->maladie->nom }}</td>
                    <td>{{ $r->contenu }}</td>
                    <td>
                        <a href="{{ route('recommendations.edit', $r) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('recommendations.destroy', $r) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
