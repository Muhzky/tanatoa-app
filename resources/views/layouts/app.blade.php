<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanatoa Story</title>

    <!-- Google Fonts: Cinzel untuk heading, Playfair Display untuk subheading, Inter untuk body -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Inter:wght@300;400;500;600&family=Jaini:wght@400&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'cinzel': ['Cinzel', 'serif'],
                        'jaini': ['Jaini', 'serif'],
                        'playfair': ['Playfair Display', 'serif'],
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'gold': {
                            400: '#F4D03F',
                            500: '#D4AC0D',
                            600: '#B7950B',
                            700: '#9A7B0A',
                        },
                        'heritage': {
                            900: '#1a1a1a',
                            800: '#2d2d2d',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 1.5s ease-in-out',
                        'slide-up': 'slideUp 1s ease-out',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '80%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '80%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 5px rgba(212, 172, 13, 0.5)' },
                            '80%': { boxShadow: '0 0 20px rgba(212, 172, 13, 0.8), 0 0 40px rgba(212, 172, 13, 0.4)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #1a1a1a;
        }

        ::-webkit-scrollbar-thumb {
            background: #D4AC0D;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #F4D03F;
        }

        /* Text shadow for better readability */
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        }

        /* Glassmorphism effect */
        .glass {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="bg-heritage-900 font-inter text-gray-100">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 h-18 z-50 bg-black/ backdrop-blur-md border-b border-white/10" id="navbar">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-2xl md:text-3xl font-jaini font-bold text-white hover:text-gold-400 transition-colors duration-300 tracking-wider">
                Tanatoa
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="/" class="font-inter text-sm uppercase tracking-widest text-white hover:text-gold-400 transition-all duration-300 relative group">
                    Home
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="/cerita" class="font-inter text-sm uppercase tracking-widest text-white hover:text-gold-400 transition-all duration-300 relative group">
                    Cerita
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="/edukasi" class="font-inter text-sm uppercase tracking-widest text-white hover:text-gold-400 transition-all duration-300 relative group">
                    Edukasi
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-white" onclick="toggleMobileMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-heritage-900/95 backdrop-blur-md border-t border-white/10">
            <div class="px-6 py-4 space-y-3">
                <a href="/" class="block font-inter text-sm uppercase tracking-widest text-white hover:text-gold-400 transition-colors">Home</a>
                <a href="/stories" class="block font-inter text-sm uppercase tracking-widest text-white hover:text-gold-400 transition-colors">Cerita</a>
                <a href="/edukasi" class="block font-inter text-sm uppercase tracking-widest text-white hover:text-gold-400 transition-colors">Edukasi</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-0">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-heritage-800 border-t border-white/10 py-8">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="font-jaini text-gold-500 text-lg mb-2">Tanatoa Digital</p>
            <p class="font-inter text-gray-400 text-sm">Hidupkan Kembali Cerita Rakyat</p>
            <p class="font-inter text-gray-500 text-xs mt-4">&copy; 2026 Tanatoa. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Toggle mobile menu
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        }

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 150) {
                navbar.classList.add('shadow-lg');
                navbar.classList.add('bg-black/90');
            } else {
                navbar.classList.remove('shadow-lg');
                navbar.classList.remove('bg-black/90');
            }
        });
    </script>

    @stack('scripts')

</body>

</html>