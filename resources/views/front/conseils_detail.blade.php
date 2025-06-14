@extends('front.layouts.app')

@section('content')

<!-- Inner Header -->
<section class="wf100 p100 inner-header">
    <div class="container">
        <h1 class="text-center">{{ $conseil->nom }}</h1>
    </div>
</section>

<!-- Blog Detail -->
<section class="wf100 p80 blog">
    <div class="blog-details">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Contenu principal -->
                <div class="col-lg-10">
                    <div class="p-4 mb-5 border-0 shadow-sm card rounded-4">
                        <div class="row align-items-start g-4">
                            {{-- Image --}}
                            @if($conseil->image_principale_url)
                                <div class="text-center col-md-4">
                                    <img src="{{ asset('storage/' . $conseil->image_principale_url) }}" alt="{{ $conseil->nom }}"
                                        class="img-fluid rounded-3" style="object-fit: cover; width: 100%;">
                                </div>
                            @endif

                            {{-- Texte à droite --}}
                            <div class="col-md-8">
                                {{-- Titre --}}
                                <h3 class="mb-2">{{ $conseil->nom }}</h3>

                                {{-- Nom scientifique --}}
                                @if($conseil->nom_scientifique)
                                    <p><strong>Nom scientifique :</strong> <em>{{ $conseil->nom_scientifique }}</em></p>
                                @endif

                                {{-- Symptômes --}}
                                @if($conseil->symptomes)
                                    <h5 class="mt-3">Symptômes</h5>
                                    <p>{!! nl2br(e($conseil->symptomes)) !!}</p>
                                @endif

                                {{-- Causes --}}
                                @if($conseil->causes)
                                    <h5 class="mt-3">Causes</h5>
                                    <p>{!! nl2br(e($conseil->causes)) !!}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Autres sections --}}
                    <div class="p-4 mb-4 border-0 shadow-sm card rounded-4">
                        {{-- Description courte --}}
                        @if($conseil->description_courte)
                            <h5>Description</h5>
                            <p>{{ $conseil->description_courte }}</p>
                        @endif

                        {{-- Mesures préventives --}}
                        @if($conseil->mesures_preventives)
                            <h5 class="mt-4">Mesures préventives</h5>
                            <p>{!! nl2br(e($conseil->mesures_preventives)) !!}</p>
                        @endif

                        {{-- Contrôle biologique --}}
                        @if($conseil->controle_biologique)
                            <h5 class="mt-4">Contrôle biologique</h5>
                            <p>{!! nl2br(e($conseil->controle_biologique)) !!}</p>
                        @endif

                        {{-- Contrôle chimique --}}
                        @if($conseil->controle_chimique)
                            <h5 class="mt-4">Contrôle chimique</h5>
                            <p>{!! nl2br(e($conseil->controle_chimique)) !!}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
