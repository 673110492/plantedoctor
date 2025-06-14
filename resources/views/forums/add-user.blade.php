@extends('layouts.app1')

@section('content')
<div class="container my-5">
    <h1>Ajouter un membre au forum : {{ $forum->title }}</h1>

    <form action="{{ route('forums.add-user', $forum->id) }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">Choisir un utilisateur</label>
            <select name="user_id" id="user_id" class="form-select" required>
                <option value="" disabled selected>-- Sélectionnez un utilisateur --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="{{ route('forums.show', $forum) }}" class="btn btn-secondary ms-2">Annuler</a>
    </form>
</div>
@endsection
