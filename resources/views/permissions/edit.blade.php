@extends('layouts.app1')
@section('content')
<div class="container">
    <h2>Modifier la permission</h2>
    <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="name" value="{{ $permission->name }}" class="form-control">
        </div>
        <button class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
