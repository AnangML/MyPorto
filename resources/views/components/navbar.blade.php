<header class="pt-6 sm:pt-8 px-4 sm:px-8 flex justify-center sticky top-0 z-50">
    <nav class="backdrop-blur-md bg-white/80 dark:bg-[#1E293B]/85 border border-slate-200/80 dark:border-slate-700/80 shadow-[0_4px_24px_rgba(0,0,0,0.04)] dark:shadow-none rounded-full px-3 py-2 sm:px-5 sm:py-2.5 flex items-center justify-between sm:justify-center gap-3 sm:gap-6 transition-all duration-200">
        
        <!-- Monogram / Initial Badge -->
        <a href="{{ route('home') }}" class="w-8 h-8 rounded-full bg-[#0F172A] dark:bg-white text-white dark:text-[#0F172A] flex items-center justify-center font-bold text-xs tracking-wider transition-transform hover:scale-105 shadow-sm" title="Anang Muhamad Lutfi">
            A
        </a>

        <!-- Desktop Navigation Links -->
        <div class="hidden sm:flex items-center gap-6 text-sm font-medium">
            <a href="{{ route('home') }}" class="text-[#0F172A] dark:text-[#F8FAFC] hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                {{ __('portfolio.nav.home') }}
            </a>
            <a href="#about" class="text-slate-500 dark:text-slate-400 hover:text-[#0F172A] dark:hover:text-white transition-colors">
                {{ __('portfolio.nav.about') }}
            </a>
            <a href="#work" class="text-slate-500 dark:text-slate-400 hover:text-[#0F172A] dark:hover:text-white transition-colors">
                {{ __('portfolio.nav.work') }}
            </a>
            <a href="#blog" class="text-slate-500 dark:text-slate-400 hover:text-[#0F172A] dark:hover:text-white transition-colors">
                {{ __('portfolio.nav.blog') }}
            </a>
            <a href="#contact" class="text-slate-500 dark:text-slate-400 hover:text-[#0F172A] dark:hover:text-white transition-colors">
                {{ __('portfolio.nav.contact') }}
            </a>
        </div>

        <div class="h-4 w-px bg-slate-200 dark:bg-slate-700 hidden sm:block"></div>

        <!-- Utilities: Language & Theme -->
        <div class="flex items-center gap-2 text-xs font-medium">
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
<div id="mobile-menu" class="hidden sm:hidden fixed inset-x-4 top-20 z-40 bg-white/95 dark:bg-[#1E293B]/95 backdrop-blur-lg border border-slate-200 dark:border-slate-700 rounded-2xl shadow-xl p-6 transition-all duration-300">
    <div class="flex flex-col gap-4 text-base font-medium">
        <a href="{{ route('home') }}" class="text-[#0F172A] dark:text-[#F8FAFC] py-1 border-b border-slate-200/60 dark:border-slate-700/60">
            {{ __('portfolio.nav.home') }}
        </a>
        <a href="#about" class="text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 py-1 border-b border-slate-200/60 dark:border-slate-700/60">
            {{ __('portfolio.nav.about') }}
        </a>
        <a href="#work" class="text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 py-1 border-b border-slate-200/60 dark:border-slate-700/60">
            {{ __('portfolio.nav.work') }}
        </a>
        <a href="#blog" class="text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 py-1 border-b border-slate-200/60 dark:border-slate-700/60">
            {{ __('portfolio.nav.blog') }}
        </a>
        <a href="#contact" class="text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 py-1">
            {{ __('portfolio.nav.contact') }}
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
            menu.querySelectorAll('a').forEach(a => {
                a.addEventListener('click', () => menu.classList.add('hidden'));
            });
        }
    });
</script>
