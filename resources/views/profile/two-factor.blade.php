@extends('layouts.app')

@section('content')
<div class="container p-6 mx-auto">
    <h2 class="mb-4 text-2xl font-bold">Configuration de l’authentification à deux facteurs (2FA)</h2>

    @if(session('success'))
        <div class="p-3 mb-4 text-green-800 bg-green-200 rounded">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="p-3 mb-4 text-red-800 bg-red-200 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(!$user->two_factor_enabled)
        <p>Scannez ce QR code avec votre application Google Authenticator :</p>
        <div class="my-4">
            <img src="data:image/svg+xml;base64,{{ $qrImage }}" alt="QR Code 2FA" />
        </div>
        <p>Ou entrez ce code secret manuellement : <strong>{{ $secret }}</strong></p>

        <form method="POST" action="{{ route('two-factor.enable') }}">
            @csrf
            <label for="code" class="block mt-4 font-semibold">Entrez le code généré par l’application :</label>
            <input type="text" name="code" id="code" class="w-48 p-2 border rounded" required autofocus>
            <button type="submit" class="px-4 py-2 ml-4 text-white bg-blue-600 rounded">Activer 2FA</button>
        </form>
    @else
        <p class="mb-4 font-semibold text-green-700">L’authentification à deux facteurs est activée.</p>

        <form method="POST" action="{{ route('two-factor.disable') }}">
            @csrf
            <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded">Désactiver 2FA</button>
        </form>
    @endif
</div>
@endsection
