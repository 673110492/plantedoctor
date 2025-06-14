@extends('layouts.app1')
@section('content')
<div class="container">
    <h2>Modifier le rôle</h2>
    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="name" value="{{ $role->name }}" class="form-control">
        </div>
        <button class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
