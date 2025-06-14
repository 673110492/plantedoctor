@extends('front.layouts.app')

@section('content')

<style>
    /* Conteneur principal des conseils */
.wf100.p80.blog {
   background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 50%, #f0f9ff 100%);
   min-height: 100vh;
   position: relative;
}

.wf100.p80.blog::before {
   content: '';
   position: absolute;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-image:
       radial-gradient(circle at 20% 50%, rgba(34, 197, 94, 0.05) 0%, transparent 50%),
       radial-gradient(circle at 80% 20%, rgba(16, 185, 129, 0.05) 0%, transparent 50%);
   pointer-events: none;
}

/* Grille des cartes */
.blog-grid .container {
   max-width: 1200px;
   padding: 0 20px;
}

.blog-grid .row {
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
   gap: 30px;
   margin: 0;
}

/* Cartes individuelles */
.blog-post {
   background: rgba(255, 255, 255, 0.95);
   border-radius: 20px;
   overflow: hidden;
   backdrop-filter: blur(10px);
   border: 1px solid rgba(34, 197, 94, 0.1);
   transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
   position: relative;
   box-shadow:
       0 4px 6px -1px rgba(34, 197, 94, 0.1),
       0 2px 4px -1px rgba(34, 197, 94, 0.06);
}

.blog-post:hover {
   transform: translateY(-12px) scale(1.02);
   box-shadow:
       0 25px 50px -12px rgba(34, 197, 94, 0.25),
       0 0 0 1px rgba(34, 197, 94, 0.05);
   border-color: rgba(34, 197, 94, 0.2);
}

/* Section image */
.blog-thumb {
   position: relative;
   height: 240px;
   overflow: hidden;
}

.blog-thumb img {
   width: 100%;
   height: 100%;
   object-fit: cover;
   transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
   filter: brightness(1.1) saturate(1.2);
}

.blog-post:hover .blog-thumb img {
   transform: scale(1.1);
}

/* Overlay sur l'image */
.blog-thumb::after {
   content: '';
   position: absolute;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background: linear-gradient(
       135deg,
       rgba(34, 197, 94, 0.8) 0%,
       rgba(22, 163, 74, 0.6) 50%,
       rgba(5, 150, 105, 0.4) 100%
   );
   opacity: 0;
   transition: opacity 0.3s ease;
}

.blog-post:hover .blog-thumb::after {
   opacity: 1;
}

/* Icône de lien */
.blog-thumb .fas.fa-link {
   background: rgba(34, 197, 94, 0.9) !important;
   backdrop-filter: blur(8px);
   border-radius: 0 12px 12px 0;
   padding: 12px 16px;
   font-size: 14px;
   transition: all 0.3s ease;
   z-index: 10;
   border: 1px solid rgba(255, 255, 255, 0.2);
}

.blog-post:hover .blog-thumb .fas.fa-link {
   background: rgba(22, 163, 74, 1) !important;
   transform: scale(1.05);
   box-shadow: 0 4px 12px rgba(34, 197, 94, 0.4);
}

/* Contenu textuel */
.post-txt {
   padding: 25px;
   position: relative;
}

.post-txt::before {
   content: '';
   position: absolute;
   top: 0;
   left: 25px;
   right: 25px;
   height: 1px;
   background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.2), transparent);
}

/* Titre */
.post-txt h5 {
   margin-bottom: 15px;
   font-size: 18px;
   font-weight: 700;
   line-height: 1.4;
}

.post-txt h5 a {
   color: #1f2937;
   text-decoration: none;
   transition: color 0.3s ease;
   position: relative;
}

.post-txt h5 a::after {
   content: '';
   position: absolute;
   bottom: -2px;
   left: 0;
   width: 0;
   height: 2px;
   background: linear-gradient(90deg, #22c55e, #16a34a);
   transition: width 0.3s ease;
}

.blog-post:hover .post-txt h5 a {
   color: #22c55e;
}

.blog-post:hover .post-txt h5 a::after {
   width: 100%;
}

/* Métadonnées */
.post-meta {
   margin-bottom: 15px;
   padding: 8px 12px;
   background: rgba(34, 197, 94, 0.05);
   border-radius: 8px;
   border-left: 3px solid #22c55e;
}

.post-meta li {
   color: #6b7280;
   font-size: 13px;
   font-weight: 500;
   display: flex;
   align-items: center;
   gap: 6px;
}

.post-meta .fas {
   color: #22c55e;
   font-size: 12px;
}

/* Description */
.post-txt p {
   color: #4b5563;
   line-height: 1.6;
   margin-bottom: 20px;
   font-size: 14px;
}

/* Bouton */
.post-txt .btn {
   background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
   border: none;
   color: white;
   padding: 10px 20px;
   border-radius: 25px;
   font-size: 13px;
   font-weight: 600;
   text-decoration: none;
   display: inline-flex;
   align-items: center;
   gap: 8px;
   transition: all 0.3s ease;
   position: relative;
   overflow: hidden;
}

.post-txt .btn::before {
   content: '';
   position: absolute;
   top: 0;
   left: -100%;
   width: 100%;
   height: 100%;
   background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
   transition: left 0.5s ease;
}

.post-txt .btn:hover::before {
   left: 100%;
}

.post-txt .btn:hover {
   transform: translateY(-2px);
   box-shadow: 0 8px 25px rgba(34, 197, 94, 0.4);
   background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
}

.post-txt .btn::after {
   content: '\f0da';
   font-family: 'Font Awesome 6 Free';
   font-weight: 900;
   opacity: 0;
   transform: translateX(-10px);
   transition: all 0.3s ease;
}

.post-txt .btn:hover::after {
   opacity: 1;
   transform: translateX(0);
}

/* Message vide */
.col-12 p.text-center {
   background: rgba(255, 255, 255, 0.8);
   padding: 60px 40px;
   border-radius: 20px;
   border: 2px dashed rgba(34, 197, 94, 0.3);
   color: #6b7280;
   font-size: 16px;
   position: relative;
}

.col-12 p.text-center::before {
   content: '\f06a';
   font-family: 'Font Awesome 6 Free';
   font-weight: 900;
   font-size: 48px;
   color: rgba(34, 197, 94, 0.3);
   display: block;
   margin-bottom: 20px;
}

/* Animations d'entrée */
.blog-post {
   animation: fadeInUp 0.6s ease-out forwards;
   opacity: 0;
   transform: translateY(30px);
}

.blog-post:nth-child(1) { animation-delay: 0.1s; }
.blog-post:nth-child(2) { animation-delay: 0.2s; }
.blog-post:nth-child(3) { animation-delay: 0.3s; }
.blog-post:nth-child(4) { animation-delay: 0.4s; }
.blog-post:nth-child(5) { animation-delay: 0.5s; }
.blog-post:nth-child(6) { animation-delay: 0.6s; }

@keyframes fadeInUp {
   to {
       opacity: 1;
       transform: translateY(0);
   }
}

/* Responsive */
@media (max-width: 768px) {
   .blog-grid .row {
       grid-template-columns: 1fr;
       gap: 20px;
   }

   .blog-thumb {
       height: 200px;
   }

   .post-txt {
       padding: 20px;
   }
}
</style>
<section class="wf100 p80 blog">
    <div class="blog-grid">
        <div class="container">
            <div class="row">
                @forelse ($conseils as $conseil)
                    <div class="mb-4 col-md-4 col-sm-6">
                        <div class="shadow-sm blog-post">
                            <div class="blog-thumb position-relative">
                                <a href="{{ route('front.conse.detail', $conseil->id) }}">
                                    <i class="top-0 p-2 text-white fas fa-link position-absolute start-0 bg-dark rounded-end"></i>
                                </a>
                                @if($conseil->image_principale_url)
                                    <img src="{{ asset('storage/' . $conseil->image_principale_url) }}"
                                         alt="Image de {{ $conseil->nom }}"
                                         style="width: 100%; height: 200px; object-fit: cover; border-radius: 6px;">
                                @else
                                    <img src="{{ asset('assets/images/blog/default.jpg') }}"
                                         alt="Image par défaut"
                                         style="width: 100%; height: 200px; object-fit: cover; border-radius: 6px;">
                                @endif
                            </div>
                            <div class="mt-3 post-txt">
                                <h5>
                                    <a href="{{ route('front.conse.detail', $conseil->id) }}">{{ $conseil->nom }}</a>
                                </h5>
                                <ul class="gap-3 mb-2 post-meta list-unstyled d-flex small text-muted">
                                    <li><i class="fas fa-calendar-alt"></i> {{ $conseil->created_at->format('d M, Y') }}</li>
                                </ul>
                                <p>{{ \Illuminate\Support\Str::limit($conseil->description_courte, 120, '...') }}</p>
                                <a href="{{ route('front.conse.detail', $conseil->id) }}"
                                   class="mt-2 btn btn-sm btn-primary">
                                    Lire le conseil
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Aucun conseil disponible pour le moment.</p>
                    </div>
                @endforelse
            </div>

            {{-- Pagination si besoin --}}
            {{--
            <div class="mt-4 gt-pagination">
                {{ $conse->links() }}
            </div>
            --}}
        </div>
    </div>
</section>
@endsection
