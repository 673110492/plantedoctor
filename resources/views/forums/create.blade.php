@extends('layouts.app1')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Créer un nouveau forum</h4>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('forums.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Titre du forum</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                  <div class="mb-3">
        <label for="photo" class="form-label">Photo de profil du forum</label>
        <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
    </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="user_ids" class="form-label">Ajouter des membres</label>
                    <select name="user_ids[]" id="user_ids" class="form-select" multiple required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                    <div class="form-text">Maintenez Ctrl (ou Cmd sur Mac) pour sélectionner plusieurs utilisateurs.</div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('forums.index') }}" class="btn btn-outline-secondary me-2">Annuler</a>
                    <button type="submit" class="btn btn-primary">Créer le forum</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
