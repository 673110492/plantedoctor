@extends('layouts.app1')

@section('content')
<div class="container my-5 d-flex flex-column" style="height: 80vh;">
    <h1 class="mb-4">{{ $forum->title }}</h1>

    <a href="{{ route('forums.add-user.form', $forum->id) }}" class="btn btn-outline-primary btn-sm mb-3">
        + Ajouter un membre
    </a>

    {{-- Zone des messages (scrollable) --}}
    <div id="chat-box" class="flex-grow-1 mb-4 p-3 border rounded bg-white overflow-auto" style="background:#e5ddd5;">
        @foreach ($forum->messages as $message)
            @php
                $isMe = $message->user_id === auth()->id();
            @endphp
            <div class="d-flex mb-3 {{ $isMe ? 'justify-content-end' : 'justify-content-start' }}">
                @if(!$isMe)
                <img src="{{ $message->user->photo ? asset('storage/' . $message->user->photo) : asset('default-avatar.png') }}"
                     alt="avatar" class="rounded-circle me-2" style="width:40px; height:40px; object-fit: cover;">
                @endif

                <div class="p-2 rounded {{ $isMe ? 'bg-primary text-white' : 'bg-light text-dark' }}" style="max-width: 70%; word-wrap: break-word;">
                    @if($isMe)
                    <div class="d-flex justify-content-end mb-1">
                        <small class="fw-bold me-2">{{ $message->user->name }}</small>
                        <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset('default-avatar.png') }}"
                             alt="avatar" class="rounded-circle" style="width:30px; height:30px; object-fit: cover;">
                    </div>
                    @else
                    <small class="d-block fw-bold mb-1">{{ $message->user->name }}</small>
                    @endif

                    <p class="mb-1">{{ $message->content }}</p>
                    <small class="d-block text-end" style="font-size: 0.75rem; opacity: 0.7;">{{ $message->created_at->format('H:i') }}</small>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Formulaire d'envoi fixé en bas --}}
    <form id="message-form" action="{{ route('forums.message.store', $forum->id) }}" method="POST" class="d-flex" style="gap: 0.5rem;">
        @csrf
        <textarea name="content" id="content" rows="1" class="form-control" placeholder="Écrivez un message" style="resize:none;" required></textarea>
        <button type="submit" class="btn btn-success d-flex align-items-center px-4">
            <i class="bi bi-send-fill"></i>
        </button>
    </form>

</div>

<script>
document.getElementById('message-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = this;
    const content = form.querySelector('textarea[name="content"]').value.trim();
    if (content === '') return;

    const url = form.action;
    const token = form.querySelector('input[name="_token"]').value;

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json',
        },
        body: JSON.stringify({ content: content })
    })
    .then(response => {
        if (!response.ok) throw new Error('Erreur HTTP ' + response.status);
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const chatBox = document.getElementById('chat-box');

            const messageDiv = document.createElement('div');
            messageDiv.classList.add('d-flex', 'mb-3', 'justify-content-end');

            messageDiv.innerHTML = `
                <div class="p-2 rounded bg-primary text-white" style="max-width: 70%; word-wrap: break-word;">
                    <div class="d-flex justify-content-end mb-1">
                        <small class="fw-bold me-2">${data.message.user_name}</small>
                        <img src="${data.message.user_photo}" alt="avatar" class="rounded-circle" style="width:30px; height:30px; object-fit: cover;">
                    </div>
                    <p class="mb-1">${data.message.content}</p>
                    <small class="d-block text-end" style="font-size: 0.75rem; opacity: 0.7;">${data.message.time}</small>
                </div>
            `;

            chatBox.appendChild(messageDiv);
            chatBox.scrollTop = chatBox.scrollHeight;

            form.reset();
        } else {
            alert('Erreur lors de l\'envoi du message');
        }
    })
    .catch(error => {
        console.error(error);
        alert('Erreur réseau ou serveur');
    });
});
</script>
@endsection
