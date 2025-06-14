<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>PLANTEDOCTOR</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets1/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- jQuery and Popper.js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- CDN Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets1/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets1/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets1/css/kaiadmin.min.css') }}" />



    <!-- CSS Just for demo purpose, don't include it in your project -->
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
        </style>

        <div class="sidebar" data-background-color="white">
            <!-- Logo Section -->
            <div class="sidebar-logo">
                <div class="logo-header">
                    <a href="{{ url('dashboard') }}" class="logo d-flex align-items-center">
                        <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo KaiAdmin" class="navbar-brand" />
                    </a>
                    <div class="nav-toggle ms-auto d-flex">
                        <button class="btn btn-sm btn-toggle toggle-sidebar">
                            <i class="fas fa-bars"></i>
                        </button>
                        <button class="btn btn-sm btn-toggle sidenav-toggler ms-1">
                            <i class="fas fa-angle-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more d-md-none">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
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
                                <input type="text" class="form-control border-start-0" placeholder="Rechercher..." />
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
                        © 2024 PlantDoctor. Développé avec ❤️ par l’équipe PlantDoctor.
                    </div>
                </div>
            </footer>


        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="selected changeTopBarColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeSideBarColor" data-color="white"></button>
                            <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="icon-settings"></i>
            </div>
        </div>
        <!-- End Custom template -->
    </div>

    <!-- jQuery obligatoire pour DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @yield('scripts')

    <script src="{{ asset('assets1/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets1/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets1/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/chart-circle/circles.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/jsvectormap/world.js') }}"></script>
    <script src="{{ asset('assets1/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets1/js/kaiadmin.min.js') }}"></script>
    <script src="{{ asset('assets1/js/setting-demo.js') }}"></script>
    <script src="{{ asset('assets1/js/demo.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets1/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Datatables -->
    <script src="{{ asset('assets1/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('assets1/js/kaiadmin.min.js') }}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets1/js/setting-demo2.js') }}"></script>




    <script>
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#177dff",
            fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
        });
    </script>

</body>

</html>
