<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="images/favicon.png" />
    <title>ECO HTML</title>
    <!-- CSS FILES START -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/color.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/prettyPhoto.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" />
    <!-- CSS FILES End -->
</head>

<body>
    <div class="wrapper home2">
        <!--Header Start-->
        <header class="header-style-2">
            <nav class="navbar navbar-expand-lg navbar-light bg-success">
                <a class="text-white navbar-brand" href="index.html">
                    <strong>AGROFIT</strong>
                </a>

                <button class="text-white navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="mr-auto navbar-nav">
                        <li class="nav-item">
                            <a class="text-white nav-link" href="index.html">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white nav-link" href="diagnostic.html">Diagnostic</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white nav-link" href="maladies.html">Maladies</a>
                        </li>
                      <li class="nav-item">
    <a class="text-white nav-link" href="{{ url('conseils_conseil') }}">
        Conseil
    </a>
</li>

                        <li class="nav-item">
                            <a class="text-white nav-link" href="blog.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>

                    <ul class="ml-auto navbar-nav">
                        <li class="nav-item">
                            <a class="text-white nav-link" href="{{ 'login' }}"><i class="fas fa-user"></i>
                                Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white nav-link" href="{{ 'register' }}"><i class="fas fa-user"></i>
                                Register</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
