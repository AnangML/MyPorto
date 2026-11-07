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

    <!-- Theme Initialization (Prevent FOUC) -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
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
            mask-image: linear-gradient(to bottom, rgba(0,0,0,1) 65%, rgba(0,0,0,0) 100%);
            -webkit-mask-image: linear-gradient(to bottom, rgba(0,0,0,1) 65%, rgba(0,0,0,0) 100%);
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
<body class="bg-[#FFF1ED] dark:bg-[#141312] min-h-screen text-[#171717] dark:text-[#F5F1EE] p-3 sm:p-5 lg:p-8 font-sans antialiased selection:bg-[#E69A86]/30 selection:text-[#B96F5D] transition-colors duration-300">
    
    <!-- Floating Main Editorial Canvas -->
    <div class="max-w-[1340px] mx-auto bg-[#FAF9F7] dark:bg-[#1C1B1A] rounded-[28px] sm:rounded-[36px] border border-[#E7E2DF] dark:border-[#2D2A27] shadow-[0_4px_30px_rgba(0,0,0,0.03)] dark:shadow-none min-h-[94vh] flex flex-col justify-between overflow-hidden relative">
        
        <!-- Ambient Peach/Coral Glow -->
        <div class="pointer-events-none absolute -top-40 -right-40 w-96 h-96 bg-[#FBD5CB]/40 dark:bg-[#3D2520]/25 rounded-full blur-3xl"></div>
        <div class="pointer-events-none absolute top-1/2 -left-40 w-80 h-80 bg-[#FFF1ED]/60 dark:bg-[#251F1D]/40 rounded-full blur-3xl"></div>

        <div>
            <!-- Top Navigation Bar -->
            <x-navbar />

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Footer -->
        <footer class="mt-20 border-t border-[#E7E2DF]/60 dark:border-[#2D2A27] px-6 sm:px-12 py-8 text-xs text-[#737373] dark:text-[#B9B1AC] flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#10b981]"></span>
                <span>Anang Muhamad Lutfi &copy; {{ date('Y') }}. {{ __('portfolio.common.all_rights_reserved') }}</span>
            </div>
            
            <div class="flex items-center gap-6">
                <a href="https://github.com/AnangML" target="_blank" rel="noopener noreferrer" class="hover:text-[#171717] dark:hover:text-[#FAF9F7] transition-colors">
                    GitHub
                </a>
                <a href="#about" class="hover:text-[#171717] dark:hover:text-[#FAF9F7] transition-colors">
                    {{ __('portfolio.nav.about') }}
                </a>
                <a href="#work" class="hover:text-[#171717] dark:hover:text-[#FAF9F7] transition-colors">
                    {{ __('portfolio.nav.work') }}
                </a>
                <a href="#contact" class="hover:text-[#171717] dark:hover:text-[#FAF9F7] transition-colors">
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
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        }
    </script>
</body>
</html>

