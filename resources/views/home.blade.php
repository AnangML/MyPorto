<x-layouts.app>
    <!-- Hero Section -->
    <x-hero />

    <!-- Placeholder Sections for Subsequent Phases (Projects, Skills, Experience, Contact) -->
    <section id="work" class="px-6 sm:px-12 lg:px-16 py-12 border-t border-[#E7E2DF]/60 dark:border-[#2D2A27] reveal-on-scroll">
        <div class="flex items-center justify-between mb-8">
            <div>
                <span class="text-xs font-mono uppercase tracking-wider text-[#E69A86] dark:text-[#F0A896]">Showcase</span>
                <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-[#171717] dark:text-[#FAF9F7] mt-1">
                    Featured Projects
                </h2>
            </div>
            <a href="#work" class="text-xs font-medium text-[#737373] dark:text-[#B9B1AC] hover:text-[#171717] dark:hover:text-[#FAF9F7] flex items-center gap-1">
                Explore All ↗
            </a>
        </div>

        <!-- Project Cards Grid Preview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="group rounded-2xl bg-white dark:bg-[#252321] border border-[#E7E2DF] dark:border-[#35322F] p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                <div class="aspect-video rounded-xl bg-[#FFF1ED] dark:bg-[#1C1B1A] border border-[#E7E2DF]/60 dark:border-[#35322F] mb-4 overflow-hidden relative flex items-center justify-center">
                    <span class="font-mono text-xs text-[#737373] dark:text-[#B9B1AC]">Project Preview #1</span>
                </div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-[#FFF1ED] dark:bg-[#33221E] text-[#B96F5D] dark:text-[#F0A896]">Web App</span>
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-[#FAF9F7] dark:bg-[#1C1B1A] text-[#737373] dark:text-[#B9B1AC]">Laravel &bull; PostgreSQL</span>
                </div>
                <h3 class="text-base font-semibold text-[#171717] dark:text-[#FAF9F7] group-hover:text-[#B96F5D] dark:group-hover:text-[#E69A86] transition-colors">
                    Enterprise Asset Management System
                </h3>
                <p class="text-xs text-[#737373] dark:text-[#B9B1AC] mt-1.5 line-clamp-2">
                    High-performance backend architecture with automated reporting and role-based access control.
                </p>
            </div>

            <div class="group rounded-2xl bg-white dark:bg-[#252321] border border-[#E7E2DF] dark:border-[#35322F] p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                <div class="aspect-video rounded-xl bg-[#FFF1ED] dark:bg-[#1C1B1A] border border-[#E7E2DF]/60 dark:border-[#35322F] mb-4 overflow-hidden relative flex items-center justify-center">
                    <span class="font-mono text-xs text-[#737373] dark:text-[#B9B1AC]">Project Preview #2</span>
                </div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-[#FFF1ED] dark:bg-[#33221E] text-[#B96F5D] dark:text-[#F0A896]">API Platform</span>
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-[#FAF9F7] dark:bg-[#1C1B1A] text-[#737373] dark:text-[#B9B1AC]">PHP 8.3 &bull; REST API</span>
                </div>
                <h3 class="text-base font-semibold text-[#171717] dark:text-[#FAF9F7] group-hover:text-[#B96F5D] dark:group-hover:text-[#E69A86] transition-colors">
                    Real-time Payment Gateway Service
                </h3>
                <p class="text-xs text-[#737373] dark:text-[#B9B1AC] mt-1.5 line-clamp-2">
                    Scalable transaction processing engine with asynchronous webhook dispatching and audit logging.
                </p>
            </div>

            <div class="group rounded-2xl bg-white dark:bg-[#252321] border border-[#E7E2DF] dark:border-[#35322F] p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                <div class="aspect-video rounded-xl bg-[#FFF1ED] dark:bg-[#1C1B1A] border border-[#E7E2DF]/60 dark:border-[#35322F] mb-4 overflow-hidden relative flex items-center justify-center">
                    <span class="font-mono text-xs text-[#737373] dark:text-[#B9B1AC]">Project Preview #3</span>
                </div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-[#FFF1ED] dark:bg-[#33221E] text-[#B96F5D] dark:text-[#F0A896]">Fullstack</span>
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-[#FAF9F7] dark:bg-[#1C1B1A] text-[#737373] dark:text-[#B9B1AC]">Tailwind &bull; Alpine.js</span>
                </div>
                <h3 class="text-base font-semibold text-[#171717] dark:text-[#FAF9F7] group-hover:text-[#B96F5D] dark:group-hover:text-[#E69A86] transition-colors">
                    Interactive Data Analytics Dashboard
                </h3>
                <p class="text-xs text-[#737373] dark:text-[#B9B1AC] mt-1.5 line-clamp-2">
                    Lightweight, responsive analytics visualization designed with privacy-first metrics aggregation.
                </p>
            </div>
        </div>
    </section>
</x-layouts.app>

