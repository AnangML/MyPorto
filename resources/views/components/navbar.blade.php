<header class="fixed top-0 inset-x-0 z-50 pt-3 sm:pt-4 px-4 sm:px-8 flex justify-center pointer-events-none">
    <nav class="pointer-events-auto backdrop-blur-md bg-white/85 dark:bg-[#1E293B]/90 border border-slate-200/80 dark:border-slate-700/80 shadow-[0_4px_24px_rgba(0,0,0,0.06)] dark:shadow-none rounded-full px-3 py-2 sm:px-4 sm:py-2 flex items-center justify-between sm:justify-center gap-2 sm:gap-4 transition-all duration-200">
        
        <!-- Monogram / Initial Badge -->
        <a href="{{ route('home') }}#home" data-target="home" class="nav-anchor w-8 h-8 rounded-full bg-[#0F172A] dark:bg-white text-white dark:text-[#0F172A] flex items-center justify-center font-bold text-xs tracking-wider transition-transform hover:scale-105 shadow-sm shrink-0" title="Anang Muhamad Lutfi">
            A
        </a>

        <!-- Desktop Navigation Links (Pill Navigation with Vibrant Blue Active State) -->
        <div id="desktop-nav-links" class="hidden sm:flex items-center gap-1 text-sm">
            <a href="{{ route('home') }}#home" data-target="home" class="nav-spy-link nav-anchor px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-200 bg-blue-600 text-white shadow-[0_2px_12px_rgba(37,99,235,0.35)] dark:bg-blue-600 dark:text-white">
                {{ __('portfolio.nav.home') }}
            </a>
            <a href="{{ route('home') }}#about" data-target="about" class="nav-spy-link nav-anchor px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-medium transition-all duration-200 text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-100/70 dark:hover:bg-slate-800/70">
                {{ __('portfolio.nav.about') }}
            </a>
            <a href="{{ route('home') }}#work" data-target="work" class="nav-spy-link nav-anchor px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-medium transition-all duration-200 text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-100/70 dark:hover:bg-slate-800/70">
                {{ __('portfolio.nav.work') }}
            </a>
            <a href="{{ route('home') }}#blog" data-target="blog" class="nav-spy-link nav-anchor px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-medium transition-all duration-200 text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-100/70 dark:hover:bg-slate-800/70">
                {{ __('portfolio.nav.blog') }}
            </a>
            <a href="{{ route('home') }}#contact" data-target="contact" class="nav-spy-link nav-anchor px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-medium transition-all duration-200 text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-100/70 dark:hover:bg-slate-800/70">
                {{ __('portfolio.nav.contact') }}
            </a>
        </div>

        <div class="h-4 w-px bg-slate-200 dark:bg-slate-700 hidden sm:block"></div>

        <!-- Utilities: Language & Theme -->
        <div class="flex items-center gap-1.5 text-xs font-medium">
            <!-- Language Switcher -->
            <div class="flex items-center rounded-full bg-slate-100/90 dark:bg-[#0F172A] p-0.5 border border-slate-200/70 dark:border-slate-700/70">
                <a href="{{ route('locale.switch', 'id') }}" class="px-2.5 py-1 rounded-full transition-colors {{ app()->getLocale() === 'id' ? 'bg-[#0F172A] text-white dark:bg-white dark:text-[#0F172A] shadow-xs' : 'text-slate-600 hover:text-blue-600 dark:text-slate-400' }}">
                    ID
                </a>
                <a href="{{ route('locale.switch', 'en') }}" class="px-2.5 py-1 rounded-full transition-colors {{ app()->getLocale() === 'en' ? 'bg-[#0F172A] text-white dark:bg-white dark:text-[#0F172A] shadow-xs' : 'text-slate-600 hover:text-blue-600 dark:text-slate-400' }}">
                    EN
                </a>
            </div>

            <!-- Theme Switcher Button -->
            <button onclick="toggleTheme()" type="button" aria-label="{{ __('portfolio.common.switch_theme') }}" class="p-1.5 rounded-full hover:bg-slate-100 dark:hover:bg-[#0F172A] text-slate-500 dark:text-slate-400 hover:text-[#0F172A] dark:hover:text-white transition-colors">
                <!-- Sun Icon (for dark mode) -->
                <svg class="w-4 h-4 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <!-- Moon Icon (for light mode) -->
                <svg class="w-4 h-4 block dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu Toggle Button -->
        <button id="mobile-menu-btn" type="button" aria-label="Toggle Mobile Menu" class="sm:hidden p-1.5 text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-[#0F172A] rounded-full transition-colors">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </nav>
</header>

<!-- Mobile Menu Drawer -->
<div id="mobile-menu" class="hidden sm:hidden fixed inset-x-4 top-16 z-50 bg-white/95 dark:bg-[#1E293B]/95 backdrop-blur-lg border border-slate-200 dark:border-slate-700 rounded-2xl shadow-xl p-4 transition-all duration-300">
    <div class="flex flex-col gap-1.5 text-sm font-medium">
        <a href="{{ route('home') }}#home" data-target="home" class="mobile-spy-link nav-anchor px-3.5 py-2.5 rounded-xl transition-all duration-200 bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-sky-400 font-semibold border-l-4 border-blue-600">
            {{ __('portfolio.nav.home') }}
        </a>
        <a href="{{ route('home') }}#about" data-target="about" class="mobile-spy-link nav-anchor px-3.5 py-2.5 rounded-xl transition-all duration-200 text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-50 dark:hover:bg-slate-800/50">
            {{ __('portfolio.nav.about') }}
        </a>
        <a href="{{ route('home') }}#work" data-target="work" class="mobile-spy-link nav-anchor px-3.5 py-2.5 rounded-xl transition-all duration-200 text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-50 dark:hover:bg-slate-800/50">
            {{ __('portfolio.nav.work') }}
        </a>
        <a href="{{ route('home') }}#blog" data-target="blog" class="mobile-spy-link nav-anchor px-3.5 py-2.5 rounded-xl transition-all duration-200 text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-50 dark:hover:bg-slate-800/50">
            {{ __('portfolio.nav.blog') }}
        </a>
        <a href="{{ route('home') }}#contact" data-target="contact" class="mobile-spy-link nav-anchor px-3.5 py-2.5 rounded-xl transition-all duration-200 text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-50 dark:hover:bg-slate-800/50">
            {{ __('portfolio.nav.contact') }}
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mobile menu toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }

        // Section IDs for scrollspy
        const sectionIds = ['home', 'about', 'work', 'blog', 'contact'];

        // Class definitions for active & inactive states
        const DESKTOP_ACTIVE = ['bg-blue-600', 'text-white', 'shadow-[0_2px_12px_rgba(37,99,235,0.35)]', 'dark:bg-blue-600', 'dark:text-white', 'font-semibold'];
        const DESKTOP_INACTIVE = ['text-slate-600', 'dark:text-slate-400', 'hover:text-blue-600', 'dark:hover:text-blue-400', 'hover:bg-slate-100/70', 'dark:hover:bg-slate-800/70', 'font-medium'];

        const MOBILE_ACTIVE = ['bg-blue-50', 'dark:bg-blue-950/60', 'text-blue-600', 'dark:text-sky-400', 'font-semibold', 'border-l-4', 'border-blue-600'];
        const MOBILE_INACTIVE = ['text-slate-600', 'dark:text-slate-400', 'hover:text-blue-600', 'dark:hover:text-blue-400', 'hover:bg-slate-50', 'dark:hover:bg-slate-800/50', 'font-medium'];

        let activeSection = 'home';
        let isManualScrolling = false;
        let manualScrollTimer = null;

        // Function to update the navbar active state styling
        function setActive(targetId) {
            if (!sectionIds.includes(targetId)) return;
            if (activeSection === targetId && document.querySelector(`.nav-spy-link[data-target="${targetId}"].bg-blue-600`)) return;

            activeSection = targetId;

            // Update Desktop Links
            document.querySelectorAll('.nav-spy-link').forEach(link => {
                const target = link.getAttribute('data-target');
                if (target === targetId) {
                    DESKTOP_INACTIVE.forEach(c => link.classList.remove(c));
                    DESKTOP_ACTIVE.forEach(c => link.classList.add(c));
                } else {
                    DESKTOP_ACTIVE.forEach(c => link.classList.remove(c));
                    DESKTOP_INACTIVE.forEach(c => link.classList.add(c));
                }
            });

            // Update Mobile Links
            document.querySelectorAll('.mobile-spy-link').forEach(link => {
                const target = link.getAttribute('data-target');
                if (target === targetId) {
                    MOBILE_INACTIVE.forEach(c => link.classList.remove(c));
                    MOBILE_ACTIVE.forEach(c => link.classList.add(c));
                } else {
                    MOBILE_ACTIVE.forEach(c => link.classList.remove(c));
                    MOBILE_INACTIVE.forEach(c => link.classList.add(c));
                }
            });
        }

        // Smooth scroll to target element with offset for sticky navbar
        function scrollToTarget(targetId) {
            const targetEl = document.getElementById(targetId);
            if (!targetEl) return false;

            isManualScrolling = true;
            setActive(targetId);

            if (menu && !menu.classList.contains('hidden')) {
                menu.classList.add('hidden');
            }

            const navOffset = 88; // Floating sticky header offset
            const elementPosition = targetEl.getBoundingClientRect().top + window.pageYOffset;
            const offsetPosition = Math.max(0, elementPosition - navOffset);

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });

            if (history.pushState) {
                history.pushState(null, '', '#' + targetId);
            }

            clearTimeout(manualScrollTimer);
            manualScrollTimer = setTimeout(() => {
                isManualScrolling = false;
            }, 850);

            return true;
        }

        // Intercept clicks on nav-anchor and in-page anchor links pointing to sections
        document.addEventListener('click', (e) => {
            const anchor = e.target.closest('a[href*="#"]');
            if (!anchor) return;

            const href = anchor.getAttribute('href');
            const hashIndex = href.indexOf('#');
            if (hashIndex === -1) return;

            const targetId = href.substring(hashIndex + 1);
            if (!sectionIds.includes(targetId)) return;

            const targetEl = document.getElementById(targetId);
            if (targetEl) {
                e.preventDefault();
                scrollToTarget(targetId);
            }
        });

        // Scrollspy calculation using requestAnimationFrame
        let scrollTicking = false;
        function onScroll() {
            if (isManualScrolling) return;

            const scrollY = window.pageYOffset || document.documentElement.scrollTop;
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;

            // If scrolled near the bottom of the page, activate the contact section
            if (scrollY + windowHeight >= documentHeight - 60) {
                setActive('contact');
                return;
            }

            // If at the very top of the page, activate home
            if (scrollY < 120) {
                setActive('home');
                return;
            }

            // Find current section in view
            const navOffset = 130;
            let current = 'home';

            for (const id of sectionIds) {
                const el = document.getElementById(id);
                if (el) {
                    const top = el.offsetTop - navOffset;
                    if (scrollY >= top) {
                        current = id;
                    }
                }
            }

            setActive(current);
        }

        window.addEventListener('scroll', () => {
            if (!scrollTicking) {
                window.requestAnimationFrame(() => {
                    onScroll();
                    scrollTicking = false;
                });
                scrollTicking = true;
            }
        }, { passive: true });

        // Check hash on initial load
        if (window.location.hash) {
            const hashTarget = window.location.hash.substring(1);
            if (sectionIds.includes(hashTarget)) {
                setTimeout(() => {
                    scrollToTarget(hashTarget);
                }, 100);
            }
        }
    });
</script>