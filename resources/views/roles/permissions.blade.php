@extends('layouts.app1')

@section('content')
<div class="container">
    <h2>Permissions du rôle : {{ $role->name }}</h2>
    <a href="{{ route('permissions.index') }}" class="btn btn-secondary mb-3">Retour à la liste des permissions</a>

    @if($permissions->isEmpty())
        <p>Aucune permission assignée à ce rôle.</p>
    @else
    <table class="table table-bordered">
        <thead>
            <tr><th>Nom de la permission</th></tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
