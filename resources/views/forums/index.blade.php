@extends('layouts.app1')

@section('content')
<div class="container mt-4">
    @foreach ($forums as $forum)
        <div class="mb-3 shadow-sm card">
            <div class="card-body d-flex align-items-center">
                <!-- Avatar -->
                <img src="{{ asset('storage/' . $forum->photo) }}"
                     alt="Avatar"
                     class="rounded-circle me-3"
                     style="width: 50px; height: 50px; object-fit: cover;">

                <!-- Title and link -->
                <div>
                    <a href="{{ route('forums.show', $forum->id) }}" class="h5 text-decoration-none text-dark">
                        {{ $forum->title }}
                    </a>
                    <p class="mb-0 text-muted">{{ Str::limit($forum->description, 60) }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
