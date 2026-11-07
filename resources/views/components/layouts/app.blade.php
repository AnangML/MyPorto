<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Anang Muhamad Lutfi — Backend & Web Developer' }}</title>
    <meta name="description" content="Personal portfolio of Anang Muhamad Lutfi, a passionate Backend and Web Developer crafting reliable web systems, robust APIs, and scalable architectures.">

    <!-- Fonts: Plus Jakarta Sans & Instrument Serif -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <!-- Theme Initialization: Default to pure white (Light Mode) -->
    <script>
        // Clean up legacy auto-dark key
        localStorage.removeItem('theme');
        if (localStorage.getItem('user_theme') === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .font-serif-accent {
            font-family: 'Instrument Serif', Georgia, serif;
        }
        
        .fade-bottom-mask {
            mask-image: linear-gradient(to bottom, rgba(0,0,0,1) 68%, rgba(0,0,0,0) 100%);
            -webkit-mask-image: linear-gradient(to bottom, rgba(0,0,0,1) 68%, rgba(0,0,0,0) 100%);
        }

        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(16px);
            transition: opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1), transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal-on-scroll.is-revealed {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .reveal-on-scroll {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body class="bg-white dark:bg-[#0A0F1D] min-h-screen text-[#0F172A] dark:text-[#F8FAFC] font-sans antialiased selection:bg-blue-500/20 selection:text-blue-700 dark:selection:text-blue-300 transition-colors duration-300">
    
    <!-- Full Width Seamless White Container -->
    <div class="max-w-[1300px] mx-auto min-h-screen flex flex-col justify-between relative px-4 sm:px-8 lg:px-12 bg-white dark:bg-[#0A0F1D]">
        
        <!-- Ambient Subtle Sky Glow Behind Hero -->
        <div class="pointer-events-none absolute -top-32 -right-32 w-96 h-96 bg-blue-50/70 dark:bg-blue-900/15 rounded-full blur-3xl -z-10"></div>
        <div class="pointer-events-none absolute top-1/3 -left-32 w-80 h-80 bg-sky-50/50 dark:bg-sky-950/20 rounded-full blur-3xl -z-10"></div>

        <div>
            <!-- Top Centered Navigation Bar -->
            <x-navbar />

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Footer -->
        <footer class="mt-24 border-t border-slate-100 dark:border-slate-800/80 py-8 text-xs text-slate-500 dark:text-slate-400 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                <span>Anang Muhamad Lutfi &copy; {{ date('Y') }}. {{ __('portfolio.common.all_rights_reserved') }}</span>
            </div>
            
            <div class="flex items-center gap-6">
                <a href="https://github.com/AnangML" target="_blank" rel="noopener noreferrer" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    GitHub
                </a>
                <a href="#about" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    {{ __('portfolio.nav.about') }}
                </a>
                <a href="#work" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    {{ __('portfolio.nav.work') }}
                </a>
                <a href="#contact" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    {{ __('portfolio.nav.contact') }}
                </a>
            </div>
        </footer>
    </div>

    <!-- Scroll Reveal & Utility Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -40px 0px'
            });

            document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));
        });

        function toggleTheme() {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('user_theme', isDark ? 'dark' : 'light');
        }
    </script>
</body>
</html>
