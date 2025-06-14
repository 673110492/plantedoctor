@extends('layouts.app1')

@section('content')
<div class="container">
    <h2>Créer un utilisateur</h2>

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('users.partials.form')
        <button class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
