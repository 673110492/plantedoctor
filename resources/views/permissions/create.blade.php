
@extends('layouts.app1')
@section('content')
<div class="container">
    <h2>Créer une permission</h2>
    <form method="POST" action="{{ route('permissions.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="name" class="form-control">
        </div>
        <button class="btn btn-success">Créer</button>
    </form>
</div>
@endsection
