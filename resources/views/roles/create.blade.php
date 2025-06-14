@extends('layouts.app1')

@section('content')
<div class="container">
    <h2>Créer un rôle</h2>
    <form method="POST" action="{{ route('roles.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nom du rôle</label>
            <input type="text" name="name" class="form-control">
        </div>
        <button class="btn btn-success">Créer</button>
    </form>
</div>
@endsection
