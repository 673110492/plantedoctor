@extends('layouts.app1')

@section('content')
<div class="container">
    <h2>Liste des permissions</h2>
    <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Créer une permission</a>

    <table class="table table-bordered">
        <thead><tr><th>Nom</th><th>Actions</th></tr></thead>
        <tbody>
            @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
                <td>
                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <h2>Permissions par rôle</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rôle</th>
                <th>Permissions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>
                    @if($role->permissions->isEmpty())
                        <em>Aucune permission assignée</em>
                    @else
                        <ul>
                            @foreach($role->permissions as $permission)
                                <li>{{ $permission->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
