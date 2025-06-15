<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Banner - Drezoc</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .hero-bg {
            background-image: linear-gradient(135deg, rgba(59, 130, 246, 0.8) 0%, rgba(147, 51, 234, 0.8) 100%),
                url('https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&auto=format&fit=crop&w=2074&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
        }

        .fade-in {
            animation: fadeInUp 0.8s ease-out;
        }

        .fade-in-delay {
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        .fade-in-delay-2 {
            animation: fadeInUp 0.8s ease-out 0.4s both;
        }

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

        .pulse-glow {
            animation: pulseGlow 2s ease-in-out infinite alternate;
        }

        @keyframes pulseGlow {
            0% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.4);
            }

            100% {
                box-shadow: 0 0 30px rgba(59, 130, 246, 0.8);
            }
        }
    </style>
</head>

<body class="bg-gray-900">
    <!-- Navigation -->
    <nav class="absolute top-0 left-0 right-0 z-50 p-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold text-white">
                Drezoc
            </div>

            <div class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-white/80 hover:text-white transition-colors duration-300">Accueil</a>
                <a href="#" class="text-white/80 hover:text-white transition-colors duration-300">Services</a>
                <a href="#" class="text-white/80 hover:text-white transition-colors duration-300">À propos</a>
                <a href="#" class="text-white/80 hover:text-white transition-colors duration-300">Contact</a>
            </div>

            <div class="flex items-center space-x-4">
                <a class="btn-secondary text-white px-6 py-2 rounded-lg font-medium" href="{{ route('login') }}">
                    Connexion
                </a>
                <button class="btn-primary text-white px-6 py-2 rounded-lg font-medium pulse-glow">
                    Inscription
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-bg min-h-screen flex items-center justify-center relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-1/4 left-10 w-72 h-72 bg-blue-500/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-10 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
            <div class="max-w-4xl mx-auto">
                <!-- Badge -->
                <div
                    class="glass-effect inline-flex items-center px-4 py-2 rounded-full text-white/90 text-sm font-medium mb-8 fade-in">
                    <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                    Nouvelle plateforme disponible
                </div>

                <!-- Main Heading -->
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight fade-in-delay">
                    Transformez votre
                    <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                        Vision
                    </span>
                    en Réalité
                </h1>



                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center fade-in-delay-2">
                    <button
                        class="btn-primary px-8 py-4 rounded-xl text-lg font-semibold text-white min-w-[200px] group">
                        <span class="flex items-center justify-center">
                            Commencer Gratuitement
                            <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </button>

                    <a class="btn-secondary px-8 py-4 rounded-xl text-lg font-semibold text-white min-w-[200px] group"
                        href="{{ route('login') }}">
                        <span class="flex items-center justify-center">
                            <svg class="mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            Se Connecter
                        </span>
                    </a>
                </div>

                <!-- Social Proof -->
                <div class="mt-16 glass-effect rounded-2xl p-6 max-w-2xl mx-auto fade-in-delay-2">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">10K+</div>
                            <div class="text-white/70">Utilisateurs actifs</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">99.9%</div>
                            <div class="text-white/70">Temps de disponibilité</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">24/7</div>
                            <div class="text-white/70">Support client</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3">
                </path>
            </svg>
        </div>
    </section>


</body>

</html>
