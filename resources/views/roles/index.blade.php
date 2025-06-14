@extends('layouts.app1')

@section('content')
<div class="container py-5" style="background: #f8f9fa; min-height: 80vh; border-radius: 8px;">
    <h2 class="mb-4 text-center fw-bold text-primary">Liste des rôles</h2>

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <a href="{{ route('roles.create') }}" class="btn btn-success d-flex align-items-center gap-2">
            <i class="bi bi-plus-circle fs-5"></i> Créer un rôle
        </a>
        <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
            <i class="bi bi-shield-lock fs-5"></i> Permissions
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="fw-semibold">Nom du rôle</th>
                        <th style="width: 260px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td class="ps-4">{{ ucfirst($role->name) }}</td>
                        <td>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm me-2 d-flex align-items-center gap-1">
                                <i class="bi bi-pencil-square"></i> Modifier
                            </a>
                            <a href="{{ route('roles.permissions.edit', $role->id) }}" class="btn btn-info btn-sm d-flex align-items-center gap-1 text-white">
                                <i class="bi bi-key"></i> Modifier permissions
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @if($roles->isEmpty())
                    <tr>
                        <td colspan="2" class="text-center py-3 text-muted fst-italic">
                            Aucun rôle disponible.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
