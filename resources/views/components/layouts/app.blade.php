<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Anang Muhamad Lutfi — Backend & Web Developer' }}</title>
    <meta name="description" content="{{ $description ?? 'Personal portfolio of Anang Muhamad Lutfi, a Backend and Web Developer crafting reliable web systems, robust APIs, and scalable architectures.' }}">
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Open Graph & Social Metadata -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'Anang Muhamad Lutfi — Backend & Web Developer' }}">
    <meta property="og:description" content="{{ $description ?? 'Personal portfolio of Anang Muhamad Lutfi, a Backend and Web Developer crafting reliable web systems, robust APIs, and scalable architectures.' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Anang Muhamad Lutfi Portfolio">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Anang Muhamad Lutfi — Backend & Web Developer' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Personal portfolio of Anang Muhamad Lutfi, a Backend and Web Developer crafting reliable web systems, robust APIs, and scalable architectures.' }}">

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Person',
        'name' => 'Anang Muhamad Lutfi',
        'jobTitle' => 'Backend & Web Developer',
        'alumniOf' => 'Universitas Pamulang',
        'url' => url('/'),
        'sameAs' => [
            'https://github.com/AnangML',
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

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

        /* Staggered card wave reveal (Point 2) */
        .reveal-stagger-group .stagger-item {
            opacity: 0;
            transform: translateY(22px) scale(0.98);
            transition: opacity 0.65s cubic-bezier(0.16, 1, 0.3, 1), transform 0.65s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .reveal-stagger-group.is-revealed .stagger-item {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .reveal-stagger-group.is-revealed .stagger-item:nth-child(1) { transition-delay: 50ms; }
        .reveal-stagger-group.is-revealed .stagger-item:nth-child(2) { transition-delay: 120ms; }
        .reveal-stagger-group.is-revealed .stagger-item:nth-child(3) { transition-delay: 190ms; }
        .reveal-stagger-group.is-revealed .stagger-item:nth-child(4) { transition-delay: 260ms; }
        .reveal-stagger-group.is-revealed .stagger-item:nth-child(5) { transition-delay: 330ms; }
        .reveal-stagger-group.is-revealed .stagger-item:nth-child(6) { transition-delay: 400ms; }
        .reveal-stagger-group.is-revealed .stagger-item:nth-child(7) { transition-delay: 470ms; }
        .reveal-stagger-group.is-revealed .stagger-item:nth-child(8) { transition-delay: 540ms; }
        .reveal-stagger-group.is-revealed .stagger-item:nth-child(n+9) { transition-delay: 600ms; }

        @media (prefers-reduced-motion: reduce) {
            .reveal-on-scroll,
            .reveal-stagger-group .stagger-item {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body class="bg-white dark:bg-[#0A0F1D] min-h-screen text-[#0F172A] dark:text-[#F8FAFC] font-sans antialiased overflow-x-hidden max-w-full relative selection:bg-blue-500/20 selection:text-blue-700 dark:selection:text-blue-300 transition-colors duration-300">
    
    <!-- Top Reading Scroll Progress Bar (Point 1) -->
    <div 
        id="scroll-progress-bar" 
        class="fixed top-0 left-0 h-[2.5px] w-0 bg-gradient-to-r from-blue-600 via-sky-400 to-indigo-500 z-[100] transition-[width] duration-75 ease-out pointer-events-none shadow-[0_0_10px_rgba(37,99,235,0.7)] dark:shadow-[0_0_12px_rgba(56,189,248,0.8)]"
        role="progressbar"
        aria-label="Reading progress"
        aria-valuenow="0"
        aria-valuemin="0"
        aria-valuemax="100"
    ></div>
    
    <!-- Full Width Seamless Container -->
    <div class="max-w-7xl mx-auto min-h-screen flex flex-col justify-between relative px-4 sm:px-6 lg:px-8 bg-white dark:bg-[#0A0F1D]">

        <div>
            <!-- Top Centered Navigation Bar -->
            <x-navbar />

            <!-- Page Content -->
            <main class="w-full">
                {{ $slot }}
            </main>
        </div>

        <!-- Footer -->
        @php
            $layoutProfile = \App\Models\ProfileSetting::current();
        @endphp
        <footer class="mt-24 border-t border-slate-100 dark:border-slate-800/80 py-8 text-xs text-slate-500 dark:text-slate-400 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                <span>{{ $layoutProfile?->display_name ?? 'Anang Muhamad Lutfi' }} &copy; {{ date('Y') }}. {{ __('portfolio.common.all_rights_reserved') }}</span>
            </div>
            
            <div class="flex items-center gap-6">
                <a href="{{ route('cv.download') }}" target="_blank" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium flex items-center gap-1 text-slate-700 dark:text-slate-200">
                    <svg class="w-3.5 h-3.5 text-blue-600 dark:text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>CV (PDF)</span>
                </a>
                <a href="{{ $layoutProfile?->github_url ?? 'https://github.com/AnangML' }}" target="_blank" rel="noopener noreferrer" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    GitHub
                </a>
                @if($layoutProfile?->linkedin_url)
                    <a href="{{ $layoutProfile->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        LinkedIn
                    </a>
                @endif
                <a href="{{ route('home') }}#about" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    {{ __('portfolio.nav.about') }}
                </a>
                <a href="{{ route('home') }}#work" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    {{ __('portfolio.nav.work') }}
                </a>
                <a href="{{ route('home') }}#contact" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    {{ __('portfolio.nav.contact') }}
                </a>
            </div>
        </footer>
    </div>

    <!-- Scroll Reveal & Utility Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Point 1: Top Reading Scroll Progress Bar
            const progressBar = document.getElementById('scroll-progress-bar');
            if (progressBar) {
                let ticking = false;
                const updateProgressBar = () => {
                    const scrollTop = window.scrollY || document.documentElement.scrollTop;
                    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                    const progress = scrollHeight > 0 ? (scrollTop / scrollHeight) * 100 : 0;
                    progressBar.style.width = `${Math.min(100, Math.max(0, progress))}%`;
                    progressBar.setAttribute('aria-valuenow', Math.round(progress));
                    ticking = false;
                };

                window.addEventListener('scroll', () => {
                    if (!ticking) {
                        window.requestAnimationFrame(updateProgressBar);
                        ticking = true;
                    }
                }, { passive: true });
                updateProgressBar();
            }

            // Point 2: Staggered Wave & Scroll Reveal Observer
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.08,
                rootMargin: '0px 0px -40px 0px'
            });

            document.querySelectorAll('.reveal-on-scroll, .reveal-stagger-group').forEach(el => observer.observe(el));
        });

        function toggleTheme() {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('user_theme', isDark ? 'dark' : 'light');
        }
    </script>
</body>
</html>
