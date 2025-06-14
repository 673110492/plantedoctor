@extends('layouts.app1')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Modifier les permissions du rôle : <strong>{{ $role->name }}</strong></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('roles.permissions.update', $role) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="row">
                    @foreach($permissions as $permission)
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    name="permissions[]"
                                    value="{{ $permission->id }}"
                                    id="permission_{{ $permission->id }}"
                                    class="form-check-input"
                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                <label for="permission_{{ $permission->id }}" class="form-check-label">
                                    {{ ucfirst($permission->name) }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary me-3">Retour</a>
                    <button type="submit" class="btn btn-success">Mettre à jour les permissions</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
