@props(['profile' => null])

<section id="home" class="scroll-mt-24 w-full pt-20 sm:pt-24 pb-6 sm:pb-8 lg:min-h-screen flex items-center relative">
    <div class="w-full grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
        
        <!-- Left Column: Copy & CTAs -->
        <div class="lg:col-span-7 flex flex-col items-start gap-4 sm:gap-5 z-10 reveal-on-scroll">
            
            <!-- Availability Pill Badge (Soft Blue Tech Accent) -->
            @if(!isset($profile) || $profile?->availability_status)
                <div class="inline-flex items-center gap-2 px-3 py-1 sm:px-3.5 sm:py-1.5 rounded-full bg-blue-50 dark:bg-blue-950/60 border border-blue-200/80 dark:border-blue-800/80 text-[11px] sm:text-xs font-medium text-blue-700 dark:text-blue-300 tracking-wide shadow-xs">
                    <svg class="w-3.5 h-3.5 text-blue-600 dark:text-sky-400 fill-current animate-pulse" viewBox="0 0 24 24">
                        <path d="M12 2l2.4 7.2h7.6l-6.1 4.5 2.3 7.3-6.2-4.6-6.2 4.6 2.3-7.3-6.1-4.5h7.6z"/>
                    </svg>
                    <span>{{ __('portfolio.hero.availability') }}</span>
                </div>
            @endif

            <!-- Main Editorial Headline with Vibrant Blue Serif Accent -->
            <h1 class="text-3xl sm:text-5xl lg:text-5xl xl:text-6xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC] leading-[1.1] max-w-xl">
                {{ __('portfolio.hero.headline_prefix') }}
                <span class="block">
                    {{ __('portfolio.hero.headline_middle') }}
                    <span class="font-serif-accent italic font-normal text-blue-600 dark:text-sky-400 text-4xl sm:text-6xl lg:text-6xl xl:text-7xl tracking-normal inline-block ml-1">
                        {{ __('portfolio.hero.headline_accent') }}
                    </span>
                </span>
            </h1>

            <!-- Bio Subtitle (Dynamic from DB with fallback) -->
            <p class="text-xs sm:text-sm lg:text-[13px] xl:text-sm text-slate-600 dark:text-slate-400 max-w-lg leading-relaxed">
                {{ $profile?->bio ?: __('portfolio.hero.bio') }}
            </p>

            <!-- Action Buttons Group -->
            <div class="flex flex-wrap items-center gap-3 sm:gap-4 pt-1">
                <!-- Primary CTA (Black/Deep Slate with smooth hover) -->
                <a href="#work" class="inline-flex items-center gap-2.5 px-5 sm:px-6 py-3 rounded-2xl bg-[#0F172A] hover:bg-blue-600 dark:bg-white dark:hover:bg-blue-500 text-white dark:text-[#0F172A] dark:hover:text-white font-medium text-xs sm:text-sm shadow-[0_10px_20px_rgba(15,23,42,0.15)] dark:shadow-none hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 group">
                    <span>{{ __('portfolio.hero.cta_work') }}</span>
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M7 17L17 7M17 7H7M17 7V17" />
                    </svg>
                </a>

                <!-- Secondary CTA (Clean Outline Button) -->
                <a href="#contact" class="inline-flex items-center gap-2 px-5 sm:px-6 py-3 rounded-2xl bg-white dark:bg-[#1E293B]/80 border border-slate-200 dark:border-slate-700 text-[#0F172A] dark:text-[#F8FAFC] font-medium text-xs sm:text-sm hover:border-blue-400 dark:hover:border-blue-500 hover:bg-slate-50 dark:hover:bg-[#283548] hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 shadow-xs">
                    <span>{{ __('portfolio.hero.cta_talk') }}</span>
                    <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </a>
            </div>

            <!-- Tech Badges / Stack Info -->
            <div class="flex items-center gap-3 pt-2 text-[11px] sm:text-xs text-slate-500 dark:text-slate-400 font-mono">
                <span class="flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                    Laravel 12 / PHP 8.3
                </span>
                <span class="text-slate-300 dark:text-slate-700">•</span>
                <span class="flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                    PostgreSQL
                </span>
                <span class="text-slate-300 dark:text-slate-700">•</span>
                <span class="flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-sky-400"></span>
                    Tailwind CSS
                </span>
            </div>
        </div>

        <!-- Right Column: Frameless Portrait (Transparent PNG friendly with zero box/border) -->
        <div class="lg:col-span-5 relative flex justify-center lg:justify-end reveal-on-scroll">
            
            <div class="relative flex items-center justify-center">
                <!-- Soft Ambient Blue Glow Behind Subject (No box, no borders) -->
                <div class="pointer-events-none absolute inset-0 -m-6 sm:-m-10 bg-blue-500/20 dark:bg-blue-500/25 rounded-full blur-2xl sm:blur-3xl -z-10"></div>
                <div class="pointer-events-none absolute inset-0 -m-2 sm:-m-4 bg-sky-400/15 dark:bg-sky-400/20 rounded-full blur-xl -z-10"></div>

                <!-- Frameless Image (Transparent PNG displays floating naturally without background box or border) -->
                <img 
                    src="{{ $profile?->profile_photo_url ?? asset('images/portrait.jpg') }}" 
                    alt="{{ $profile?->display_name ?? 'Anang Muhamad Lutfi' }} - Portrait" 
                    class="relative z-10 max-h-[48vh] sm:max-h-[56vh] lg:max-h-[490px] w-auto max-w-[280px] sm:max-w-sm lg:max-w-[380px] object-contain drop-shadow-[0_15px_30px_rgba(37,99,235,0.18)] dark:drop-shadow-[0_15px_35px_rgba(56,189,248,0.22)] transition-transform duration-500 hover:scale-[1.02]"
                    loading="eager"
                />
            </div>
        </div>
    </div>
</section>
