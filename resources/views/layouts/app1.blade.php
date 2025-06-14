<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>PLANTEDOCTOR</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets1/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets1/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets1/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets1/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets1/css/demo.css') }}" />

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <style>
            /* Couleurs et styles */
            .sidebar {
                background-color: #ffffff !important;
                /* Fond blanc pur */
            }

            .sidebar .logo-header {
                background-color: #ffffff !important;
                border-bottom: 1px solid #e0e0e0;
            }

            .sidebar .logo img {
                height: 65px !important;
                /* Logo agrandi */
            }

            .sidebar .nav a,
            .sidebar .text-section {
                color: #2e7d32 !important;
                /* Texte vert foncé */
            }

            .sidebar .nav a i {
                font-size: 1.3rem !important;
                /* Icônes légèrement plus grandes */
                color: #388e3c !important;
                /* Vert moyen */
            }

            .nav-section h4.text-section {
                font-weight: bold;
                font-size: 14px;
            }

            .nav-section .sidebar-mini-icon i {
                color: #66bb6a;
            }

            .nav-item.active a {
                background-color: #e8f5e9;
                border-radius: 8px;
            }

            .nav-item a:hover {
                background-color: #f1f8e9;
                border-radius: 8px;
            }

            /* Bouton toggle mobile - toujours visible */
            .mobile-toggle-btn {
                position: fixed;
                top: 15px;
                left: 15px;
                z-index: 10000;
                background-color: #2e7d32;
                color: white;
                border: none;
                border-radius: 8px;
                padding: 10px 12px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
                transition: all 0.3s ease;
            }

            .mobile-toggle-btn:hover {
                background-color: #1b5e20;
                transform: scale(1.05);
            }

            /* Affichage sidebar responsive */
            @media (max-width: 767.98px) {
                .sidebar {
                    position: fixed;
                    z-index: 9999;
                    background-color: #fff;
                    height: 100vh;
                    width: 280px;
                    left: -280px; /* Masquée par défaut */
                    top: 0;
                    box-shadow: 2px 0 15px rgba(0, 0, 0, 0.3);
                    overflow-y: auto;
                    transition: left 0.3s ease-in-out;
                }

                .sidebar.mobile-visible {
                    left: 0; /* Visible quand la classe est ajoutée */
                }

                /* Overlay pour fermer la sidebar en cliquant à côté */
                .sidebar-overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.5);
                    z-index: 9998;
                    opacity: 0;
                    visibility: hidden;
                    transition: opacity 0.3s ease, visibility 0.3s ease;
                }

                .sidebar-overlay.active {
                    opacity: 1;
                    visibility: visible;
                }

                /* Décaler le contenu principal quand la sidebar est ouverte */
                .main-panel {
                    transition: margin-left 0.3s ease-in-out;
                }

                .main-panel.sidebar-open {
                    margin-left: 0;
                }
            }

            /* Masquer le bouton sur desktop */
            @media (min-width: 768px) {
                .mobile-toggle-btn {
                    display: none !important;
                }

                .sidebar-overlay {
                    display: none !important;
                }
            }
        </style>

        <!-- Bouton toggle mobile - visible uniquement sur mobile -->
        <button class="mobile-toggle-btn d-md-none" id="toggleMobileSidebar" type="button">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Overlay pour fermer la sidebar en cliquant à côté -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Sidebar -->
        <div class="sidebar" data-background-color="white">
            <!-- Logo Section -->
            <div class="px-3 py-2 sidebar-logo d-flex justify-content-between align-items-center">
                <a href="{{ url('dashboard') }}" class="logo d-flex align-items-center">
                    <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo KaiAdmin" class="navbar-brand" />
                </a>
                <!-- Bouton de fermeture pour mobile -->
                <button class="btn btn-danger btn-sm d-md-none" id="closeSidebar" type="button">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Sidebar Navigation -->
            <div class="sidebar-wrapper scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item active">
                            <a href="{{ url('dashboard') }}">
                                <i class="fas fa-home"></i>
                                <p>Tableau de bord</p>
                            </a>
                        </li>

                        <li class="mt-3 nav-section">
                            <span class="sidebar-mini-icon"><i class="fa fa-cubes"></i></span>
                            <h4 class="text-section">Composants</h4>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('predict.form') }}">
                                <i class="fas fa-microscope"></i>
                                <p>Diagnostic</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('diagnostics.index') }}">
                                <i class="fas fa-microscope"></i>
                                <p>Historiques</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('maladies') }}">
                                <i class="fas fa-bug"></i>
                                <p>Maladies</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('recommendations') }}">
                                <i class="fas fa-notes-medical"></i>
                                <p>Recommandations</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('conseils.index') }}">
                                <i class="fas fa-lightbulb"></i>
                                <p>Conseils</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('admin/rapports') }}">
                                <i class="fas fa-chart-line"></i>
                                <p>Rapports</p>
                            </a>
                        </li>

                        <li class="mt-3 nav-section">
                            <span class="sidebar-mini-icon"><i class="fa fa-comments"></i></span>
                            <h4 class="text-section">Communication</h4>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('messages') }}">
                                <i class="fas fa-envelope"></i>
                                <p>Messages</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('forums') }}">
                                <i class="fas fa-comment-dots"></i>
                                <p>Forum</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('support') }}">
                                <i class="fas fa-headset"></i>
                                <p>Support & Aide</p>
                            </a>
                        </li>

                        <li class="mt-3 nav-section">
                            <span class="sidebar-mini-icon"><i class="fa fa-user-cog"></i></span>
                            <h4 class="text-section">Administration</h4>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('users') }}">
                                <i class="fas fa-users"></i>
                                <p>Utilisateurs</p>
                            </a>
                        </li>

                        @can('users-read')
                            <li class="nav-item">
                                <a href="{{ route('users.assign-roles', auth()->user()->id) }}">
                                    <i class="fas fa-user-shield"></i>
                                    <p>Gérer mes rôles</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </div>

        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <nav class="bg-white shadow-sm navbar navbar-header navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <!-- Barre de recherche (affichée uniquement sur grand écran) -->
                        <form class="p-0 d-none d-lg-flex navbar-form nav-search me-auto">
                            <div class="input-group">
                                <span class="bg-white input-group-text border-end-0">
                                    <i class="fa fa-search text-success"></i>
                                </span>
                                <input type="text" class="form-control border-start-0"
                                    placeholder="Rechercher..." />
                            </div>
                        </form>

                        <!-- Menu utilisateur à droite -->
                        <ul class="navbar-nav ms-auto align-items-center">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar-sm me-2">
                                        <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('assets1/img/profile.jpg') }}"
                                            alt="Image profil" class="rounded-circle" width="35" height="35">
                                    </div>
                                    <span class="d-none d-md-inline text-success">
                                        <span class="text-muted">Salut,</span>
                                        <strong>{{ Auth::user()->name }}</strong>
                                    </span>
                                </a>

                                <!-- Dropdown utilisateur -->
                                <ul class="shadow dropdown-menu dropdown-menu-end animated fadeIn">
                                    <li class="px-3 py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('assets1/img/profile.jpg') }}"
                                                    alt="Image profil" class="rounded-circle" width="50"
                                                    height="50">
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-semibold text-dark">{{ Auth::user()->name }}</h6>
                                                <small class="text-muted">{{ Auth::user()->email }}</small><br>
                                                <a href="{{ url('profile') }}"
                                                    class="mt-2 btn btn-sm btn-outline-success">
                                                    Voir profil
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="pt-2 pb-4 d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h3 class="mb-3 fw-bold">Dashboard</h3>
                            <p class="mb-0 text-muted" style="text-align: center">
                                Notre système de détection des maladies des plantes utilise l'IA pour protéger vos
                                récoltes et maximiser vos rendements.
                            </p>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </div>

            <footer class="pt-4 pb-3 mt-5 text-sm border-t footer">
                <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="mb-2 mb-md-0">
                        <strong>PlantDoctor</strong><br>
                        Système intelligent pour la détection des maladies des plantes.
                    </div>

                    <ul class="mb-2 nav mb-md-0">
                        <li class="nav-item"><a href="#" class="px-2 nav-link text-dark">Accueil</a></li>
                        <li class="nav-item"><a href="#" class="px-2 nav-link text-dark">À propos</a></li>
                        <li class="nav-item"><a href="#" class="px-2 nav-link text-dark">Contact</a></li>
                        <li class="nav-item"><a href="#" class="px-2 nav-link text-dark">Mentions légales</a>
                        </li>
                    </ul>

                    <div class="text-end text-dark small">
                        © 2024 PlantDoctor. Développé avec ❤️ par l'équipe PlantDoctor.
                    </div>
                </div>
            </footer>
        </div>

      
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleSidebarBtn = document.getElementById('toggleMobileSidebar');
            const closeSidebarBtn = document.getElementById('closeSidebar');
            const sidebar = document.querySelector('.sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const mainPanel = document.querySelector('.main-panel');

            function openSidebar() {
                if (sidebar) {
                    sidebar.classList.add('mobile-visible');
                }
                if (sidebarOverlay) {
                    sidebarOverlay.classList.add('active');
                }
                if (mainPanel) {
                    mainPanel.classList.add('sidebar-open');
                }
                // Empêcher le scroll du body
                document.body.style.overflow = 'hidden';
            }

            // Fonction pour fermer la sidebar
            function closeSidebar() {
                if (sidebar) {
                    sidebar.classList.remove('mobile-visible');
                }
                if (sidebarOverlay) {
                    sidebarOverlay.classList.remove('active');
                }
                if (mainPanel) {
                    mainPanel.classList.remove('sidebar-open');
                }
                // Restaurer le scroll du body
                document.body.style.overflow = '';
            }

            // Ouvrir la sidebar
            if (toggleSidebarBtn) {
                toggleSidebarBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    openSidebar();
                });
            }

            // Fermer la sidebar avec le bouton X
            if (closeSidebarBtn) {
                closeSidebarBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    closeSidebar();
                });
            }

            // Fermer la sidebar en cliquant sur l'overlay
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', function (e) {
                    if (e.target === sidebarOverlay) {
                        closeSidebar();
                    }
                });
            }

            // Fermer la sidebar avec la touche Escape
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && sidebar && sidebar.classList.contains('mobile-visible')) {
                    closeSidebar();
                }
            });

            // Fermer la sidebar automatiquement si on redimensionne vers desktop
            window.addEventListener('resize', function () {
                if (window.innerWidth >= 768) {
                    closeSidebar();
                }
            });

            // Fermer la sidebar quand on clique sur un lien (navigation)
            const sidebarLinks = sidebar?.querySelectorAll('a');
            if (sidebarLinks) {
                sidebarLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        // Délai pour permettre la navigation
                        setTimeout(() => {
                            closeSidebar();
                        }, 100);
                    });
                });
            }
        });
    </script>

</body>

</html>
