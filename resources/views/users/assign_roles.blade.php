@extends('layouts.app1')

@section('content')
<div class="container">
    <h2>Modifier les rôles de : {{ $user->name }} {{ $user->prenom }}</h2>

    <form action="{{ route('users.roles.update', $user) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="roles" class="form-label">Sélectionnez les rôles :</label>
            @foreach($roles as $role)
                <div class="form-check">
                    <input
                        type="checkbox"
                        name="roles[]"
                        value="{{ $role->id }}"
                        id="role_{{ $role->id }}"
                        class="form-check-input"
                        {{ in_array($role->id, $userRoles) ? 'checked' : '' }}>
                    <label for="role_{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour les rôles</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
