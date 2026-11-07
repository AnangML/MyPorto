<x-layouts.app>
    <!-- Hero Section -->
    <x-hero />

    <!-- Featured Projects Showcase Preview -->
    <section id="work" class="px-6 sm:px-12 lg:px-16 py-12 border-t border-slate-200/70 dark:border-slate-800/80 reveal-on-scroll">
        <div class="flex items-center justify-between mb-8">
            <div>
                <span class="text-xs font-mono uppercase tracking-wider text-blue-600 dark:text-sky-400 font-semibold">Featured Work</span>
                <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC] mt-1">
                    Projects Showcase
                </h2>
            </div>
            <a href="#work" class="text-xs font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 flex items-center gap-1 transition-colors">
                Explore All ↗
            </a>
        </div>

        <!-- Project Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="group rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-700/80 p-5 shadow-xs hover:shadow-xl hover:shadow-blue-500/5 hover:border-blue-300 dark:hover:border-blue-500/60 transition-all duration-300 hover:-translate-y-1">
                <div class="aspect-video rounded-xl bg-slate-50 dark:bg-[#0F172A] border border-slate-100 dark:border-slate-800 mb-4 overflow-hidden relative flex items-center justify-center">
                    <span class="font-mono text-xs text-slate-400 dark:text-slate-500">Project Preview #1</span>
                </div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 font-medium">Web App</span>
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-slate-100 dark:bg-[#0F172A] text-slate-600 dark:text-slate-400">Laravel &bull; PostgreSQL</span>
                </div>
                <h3 class="text-base font-semibold text-[#0F172A] dark:text-[#F8FAFC] group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                    Enterprise Asset Management System
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1.5 line-clamp-2">
                    High-performance backend architecture with automated reporting and role-based access control.
                </p>
            </div>

            <div class="group rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-700/80 p-5 shadow-xs hover:shadow-xl hover:shadow-blue-500/5 hover:border-blue-300 dark:hover:border-blue-500/60 transition-all duration-300 hover:-translate-y-1">
                <div class="aspect-video rounded-xl bg-slate-50 dark:bg-[#0F172A] border border-slate-100 dark:border-slate-800 mb-4 overflow-hidden relative flex items-center justify-center">
                    <span class="font-mono text-xs text-slate-400 dark:text-slate-500">Project Preview #2</span>
                </div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 font-medium">API Platform</span>
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-slate-100 dark:bg-[#0F172A] text-slate-600 dark:text-slate-400">PHP 8.3 &bull; REST API</span>
                </div>
                <h3 class="text-base font-semibold text-[#0F172A] dark:text-[#F8FAFC] group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                    Real-time Payment Gateway Service
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1.5 line-clamp-2">
                    Scalable transaction processing engine with asynchronous webhook dispatching and audit logging.
                </p>
            </div>

            <div class="group rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-700/80 p-5 shadow-xs hover:shadow-xl hover:shadow-blue-500/5 hover:border-blue-300 dark:hover:border-blue-500/60 transition-all duration-300 hover:-translate-y-1">
                <div class="aspect-video rounded-xl bg-slate-50 dark:bg-[#0F172A] border border-slate-100 dark:border-slate-800 mb-4 overflow-hidden relative flex items-center justify-center">
                    <span class="font-mono text-xs text-slate-400 dark:text-slate-500">Project Preview #3</span>
                </div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 font-medium">Fullstack</span>
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-slate-100 dark:bg-[#0F172A] text-slate-600 dark:text-slate-400">Tailwind &bull; Alpine.js</span>
                </div>
                <h3 class="text-base font-semibold text-[#0F172A] dark:text-[#F8FAFC] group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                    Interactive Data Analytics Dashboard
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1.5 line-clamp-2">
                    Lightweight, responsive analytics visualization designed with privacy-first metrics aggregation.
                </p>
            </div>
        </div>
    </section>
</x-layouts.app>
