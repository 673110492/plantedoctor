@extends('layouts.app1')

@section('content')
    <style>
        .dashboard-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 20px;
            padding: 2.5rem 2rem;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            backdrop-filter: blur(10px);
            min-height: 240px;
            box-shadow:
                0 8px 32px rgba(31, 38, 135, 0.37),
                0 2px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #20c997, #28a745, #17a2b8);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .dashboard-card:hover::before {
            opacity: 1;
        }

        .dashboard-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow:
                0 20px 60px rgba(31, 38, 135, 0.5),
                0 8px 24px rgba(0, 0, 0, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .dashboard-icon {
            font-size: 3.2rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
        }

        .dashboard-card:hover .dashboard-icon {
            transform: scale(1.1);
            filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.2));
        }

        .dashboard-title {
            font-weight: 800;
            font-size: 1.4rem;
            color: #2c3e50;
            margin-bottom: 0.8rem;
            letter-spacing: -0.02em;
            line-height: 1.2;
        }

        .dashboard-text {
            font-size: 1rem;
            color: #6c757d;
            font-weight: 500;
            line-height: 1.4;
        }

        .text-teal {
            color: #20c997 !important;
        }

        /* Couleurs personnalisées pour chaque carte */
        .card-success { --card-color: #28a745; }
        .card-danger { --card-color: #dc3545; }
        .card-info { --card-color: #17a2b8; }
        .card-warning { --card-color: #ffc107; }
        .card-primary { --card-color: #007bff; }
        .card-secondary { --card-color: #6c757d; }
        .card-dark { --card-color: #343a40; }
        .card-teal { --card-color: #20c997; }

        .dashboard-card.card-success:hover,
        .dashboard-card.card-danger:hover,
        .dashboard-card.card-info:hover,
        .dashboard-card.card-warning:hover,
        .dashboard-card.card-primary:hover,
        .dashboard-card.card-secondary:hover,
        .dashboard-card.card-dark:hover,
        .dashboard-card.card-teal:hover {
            background: linear-gradient(135deg, #ffffff 0%, color-mix(in srgb, var(--card-color) 5%, #f8f9fa) 100%);
        }

        /* Message d'accueil amélioré */
        .welcome-alert {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            border: none;
            border-radius: 16px;
            padding: 1.8rem 2rem;
            font-size: 1.15rem;
            font-weight: 600;
            color: #155724;
            box-shadow: 0 4px 20px rgba(40, 167, 69, 0.15);
            border-left: 5px solid #28a745;
        }

        .welcome-alert i {
            color: #28a745;
            margin-right: 1rem;
            font-size: 1.8rem;
        }

        /* Style du graphique */
        .chart-container {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 2rem;
            box-shadow:
                0 8px 32px rgba(31, 38, 135, 0.37),
                0 2px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(10px);
            margin-top: 2rem;
            position: relative;
            overflow: hidden;
        }

        .chart-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #ffc107, #fd7e14, #dc3545);
        }

        .chart-title {
            font-weight: 800;
            font-size: 1.5rem;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            text-align: center;
            letter-spacing: -0.02em;
        }

        /* Animation pour les cartes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dashboard-card, .chart-container {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* Délai d'animation échelonné */
        .col-12:nth-child(1) .dashboard-card { animation-delay: 0.1s; }
        .col-12:nth-child(2) .dashboard-card { animation-delay: 0.2s; }
        .col-12:nth-child(3) .dashboard-card { animation-delay: 0.3s; }
        .col-12:nth-child(4) .dashboard-card { animation-delay: 0.4s; }
        .col-12:nth-child(5) .dashboard-card { animation-delay: 0.5s; }
        .col-12:nth-child(6) .dashboard-card { animation-delay: 0.6s; }
        .col-12:nth-child(7) .dashboard-card { animation-delay: 0.7s; }
        .chart-container { animation-delay: 0.8s; }

        /* Responsive amélioré */
        @media (max-width: 768px) {
            .dashboard-card {
                padding: 2rem 1.5rem;
                min-height: 200px;
            }
            .dashboard-icon { font-size: 2.8rem; }
            .dashboard-title { font-size: 1.25rem; }
            .welcome-alert {
                padding: 1.5rem;
                font-size: 1.05rem;
            }
            .chart-container { padding: 1.5rem; }
            .chart-title { font-size: 1.3rem; }
        }

        /* Effet de brillance sur hover */
        .dashboard-card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: rotate(45deg);
            transition: all 0.5s;
            opacity: 0;
        }

        .dashboard-card:hover::after {
            animation: shine 0.5s ease-in-out;
        }

        @keyframes shine {
            0% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
                opacity: 0;
            }
            50% { opacity: 1; }
            100% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
                opacity: 0;
            }
        }
    </style>

    <div class="container mt-5">
        <div class="alert welcome-alert d-flex align-items-center">
            <i class="fas fa-leaf"></i> Bienvenue sur votre tableau de bord !
        </div>

        <div class="mt-4 row g-4">
            <div class="col-md-6 col-lg-3 col-12">
                <div class="text-center dashboard-card card-success">
                    <div class="dashboard-icon text-success"><i class="fas fa-disease"></i></div>
                    <div class="dashboard-title">Maladies</div>
                    <div class="dashboard-text">{{ $countMaladies }} enregistrements</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-12">
                <div class="text-center dashboard-card card-info">
                    <div class="dashboard-icon text-info"><i class="fas fa-lightbulb"></i></div>
                    <div class="dashboard-title">Recommandations</div>
                    <div class="dashboard-text">{{ $countRecommendations }} enregistrements</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-12">
                <div class="text-center dashboard-card card-warning">
                    <div class="dashboard-icon text-warning"><i class="fas fa-stethoscope"></i></div>
                    <div class="dashboard-title">Diagnostics</div>
                    <div class="dashboard-text">{{ $countDiagnostics }} enregistrements</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-12">
                <div class="text-center dashboard-card card-primary">
                    <div class="dashboard-icon text-primary"><i class="fas fa-comments"></i></div>
                    <div class="dashboard-title">Forums</div>
                    <div class="dashboard-text">{{ $countForums }} discussions</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-12">
                <div class="text-center dashboard-card card-teal">
                    <div class="dashboard-icon text-teal"><i class="fas fa-envelope"></i></div>
                    <div class="dashboard-title">Conseils</div>
                    <div class="dashboard-text">{{ $countConseil ?? 0 }} conseils</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-12">
                <div class="text-center dashboard-card card-dark">
                    <div class="dashboard-icon text-dark"><i class="fas fa-users"></i></div>
                    <div class="dashboard-title">Utilisateurs</div>
                    <div class="dashboard-text">{{ $countUsers }} comptes</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-12">
                <div class="text-center dashboard-card card-secondary">
                    <div class="dashboard-icon text-secondary"><i class="fas fa-user-tag"></i></div>
                    <div class="dashboard-title">Rôles</div>
                    <div class="dashboard-text">{{ $countrole }} rôles</div>
                </div>
            </div>
        </div>

        <!-- Graphiques -->
        <div class="mt-4 row g-4">
            <!-- Graphique en barres des données principales -->
            <div class="col-lg-8 col-12">
                <div class="chart-container">
                    <h3 class="chart-title">
                        <i class="fas fa-chart-bar text-primary me-2"></i>
                        Vue d'ensemble des données
                    </h3>
                    <div style="position: relative; height: 400px;">
                        <canvas id="overviewChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Graphique en secteurs de répartition -->
            <div class="col-lg-4 col-12">
                <div class="chart-container">
                    <h3 class="chart-title">
                        <i class="fas fa-chart-pie text-success me-2"></i>
                        Répartition des contenus
                    </h3>
                    <div style="position: relative; height: 400px;">
                        <canvas id="distributionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deuxième ligne de graphiques -->
        <div class="mt-4 row g-4">
            <!-- Graphique de comparaison -->
            <div class="col-lg-6 col-12">
                <div class="chart-container">
                    <h3 class="chart-title">
                        <i class="fas fa-chart-line text-warning me-2"></i>
                        Données médicales vs Communauté
                    </h3>
                    <div style="position: relative; height: 350px;">
                        <canvas id="comparisonChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Graphique en aires -->
            <div class="col-lg-6 col-12">
                <div class="chart-container">
                    <h3 class="chart-title">
                        <i class="fas fa-chart-area text-info me-2"></i>
                        Activité par catégorie
                    </h3>
                    <div style="position: relative; height: 350px;">
                        <canvas id="activityChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Récupération des données depuis PHP
            const data = {
                maladies: {{ $countMaladies }},
                recommendations: {{ $countRecommendations }},
                diagnostics: {{ $countDiagnostics }},
                forums: {{ $countForums }},
                conseils: {{ $countConseil ?? 0 }},
                users: {{ $countUsers }},
                roles: {{ $countrole }}
            };

            // 1. Graphique en barres - Vue d'ensemble
            const ctx1 = document.getElementById('overviewChart').getContext('2d');
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Maladies', 'Recommandations', 'Diagnostics', 'Forums', 'Conseils', 'Utilisateurs'],
                    datasets: [{
                        label: 'Nombre d\'enregistrements',
                        data: [data.maladies, data.recommendations, data.diagnostics, data.forums, data.conseils, data.users],
                        backgroundColor: [
                            'rgba(40, 167, 69, 0.8)',   // Maladies - Vert
                            'rgba(23, 162, 184, 0.8)',  // Recommandations - Bleu
                            'rgba(255, 193, 7, 0.8)',   // Diagnostics - Jaune
                            'rgba(0, 123, 255, 0.8)',   // Forums - Bleu primaire
                            'rgba(32, 201, 151, 0.8)',  // Conseils - Teal
                            'rgba(52, 58, 64, 0.8)'     // Utilisateurs - Gris foncé
                        ],
                        borderColor: [
                            '#28a745', '#17a2b8', '#ffc107', '#007bff', '#20c997', '#343a40'
                        ],
                        borderWidth: 2,
                        borderRadius: 8,
                        borderSkipped: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: '#007bff',
                            borderWidth: 1,
                            cornerRadius: 8
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            },
                            ticks: {
                                color: '#6c757d',
                                font: { weight: 'bold' }
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: {
                                color: '#6c757d',
                                font: { weight: 'bold' }
                            }
                        }
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeInOutQuart'
                    }
                }
            });

            // 2. Graphique en secteurs - Répartition des contenus
            const ctx2 = document.getElementById('distributionChart').getContext('2d');
            const totalContent = data.maladies + data.recommendations + data.diagnostics + data.forums + data.conseils;

            new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['Maladies', 'Recommandations', 'Diagnostics', 'Forums', 'Conseils'],
                    datasets: [{
                        data: [data.maladies, data.recommendations, data.diagnostics, data.forums, data.conseils],
                        backgroundColor: [
                            '#28a745', '#17a2b8', '#ffc107', '#007bff', '#20c997'
                        ],
                        borderColor: '#fff',
                        borderWidth: 3,
                        hoverBorderWidth: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '60%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                font: { size: 11, weight: 'bold' },
                                color: '#2c3e50',
                                padding: 15,
                                generateLabels: function(chart) {
                                    const dataset = chart.data.datasets[0];
                                    return chart.data.labels.map((label, index) => {
                                        const value = dataset.data[index];
                                        const percentage = totalContent > 0 ? ((value / totalContent) * 100).toFixed(1) : 0;
                                        return {
                                            text: `${label} (${percentage}%)`,
                                            fillStyle: dataset.backgroundColor[index],
                                            strokeStyle: dataset.borderColor,
                                            lineWidth: dataset.borderWidth,
                                            hidden: false,
                                            index: index
                                        };
                                    });
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            callbacks: {
                                label: function(context) {
                                    const value = context.parsed;
                                    const percentage = totalContent > 0 ? ((value / totalContent) * 100).toFixed(1) : 0;
                                    return `${context.label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    },
                    animation: {
                        animateRotate: true,
                        duration: 2000
                    }
                }
            });

            // 3. Graphique de comparaison - Données médicales vs Communauté
            const ctx3 = document.getElementById('comparisonChart').getContext('2d');
            new Chart(ctx3, {
                type: 'polarArea',
                data: {
                    labels: ['Données Médicales', 'Communauté & Support'],
                    datasets: [{
                        data: [
                            data.maladies + data.diagnostics + data.recommendations,
                            data.forums + data.conseils
                        ],
                        backgroundColor: [
                            'rgba(220, 53, 69, 0.7)',   // Médical - Rouge
                            'rgba(40, 167, 69, 0.7)'    // Communauté - Vert
                        ],
                        borderColor: ['#dc3545', '#28a745'],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                font: { size: 12, weight: 'bold' },
                                color: '#2c3e50'
                            }
                        }
                    },
                    scales: {
                        r: {
                            beginAtZero: true,
                            grid: { color: 'rgba(0, 0, 0, 0.1)' },
                            pointLabels: {
                                font: { size: 11, weight: 'bold' },
                                color: '#6c757d'
                            }
                        }
                    }
                }
            });

            // 4. Graphique en aires - Activité par catégorie
            const ctx4 = document.getElementById('activityChart').getContext('2d');
            new Chart(ctx4, {
                type: 'radar',
                data: {
                    labels: ['Maladies', 'Diagnostics', 'Recommandations', 'Forums', 'Conseils', 'Utilisateurs'],
                    datasets: [{
                        label: 'Niveau d\'activité',
                        data: [data.maladies, data.diagnostics, data.recommendations, data.forums, data.conseils, data.users],
                        backgroundColor: 'rgba(23, 162, 184, 0.2)',
                        borderColor: '#17a2b8',
                        borderWidth: 3,
                        pointBackgroundColor: '#17a2b8',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        r: {
                            beginAtZero: true,
                            grid: { color: 'rgba(0, 0, 0, 0.1)' },
                            pointLabels: {
                                font: { size: 10, weight: 'bold' },
                                color: '#6c757d'
                            },
                            ticks: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>

@endsection
