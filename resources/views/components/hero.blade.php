<section class="px-2 sm:px-6 lg:px-8 pt-8 sm:pt-14 pb-12 lg:pb-20 relative overflow-hidden">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-8 items-center">
        
        <!-- Left Column: Copy & CTAs -->
        <div class="lg:col-span-7 flex flex-col items-start gap-6 sm:gap-7 z-10 reveal-on-scroll">
            
            <!-- Availability Pill Badge (Soft Blue Tech Accent) -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 dark:bg-blue-950/60 border border-blue-200/80 dark:border-blue-800/80 text-xs font-medium text-blue-700 dark:text-blue-300 tracking-wide shadow-xs">
                <svg class="w-3.5 h-3.5 text-blue-600 dark:text-sky-400 fill-current animate-pulse" viewBox="0 0 24 24">
                    <path d="M12 2l2.4 7.2h7.6l-6.1 4.5 2.3 7.3-6.2-4.6-6.2 4.6 2.3-7.3-6.1-4.5h7.6z"/>
                </svg>
                <span>{{ __('portfolio.hero.availability') }}</span>
            </div>

            <!-- Main Editorial Headline with Vibrant Blue Serif Accent -->
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC] leading-[1.08] max-w-xl">
                {{ __('portfolio.hero.headline_prefix') }}
                <span class="block">
                    {{ __('portfolio.hero.headline_middle') }}
                    <span class="font-serif-accent italic font-normal text-blue-600 dark:text-sky-400 text-5xl sm:text-7xl lg:text-8xl tracking-normal inline-block ml-1">
                        {{ __('portfolio.hero.headline_accent') }}
                    </span>
                </span>
            </h1>

            <!-- Bio Subtitle -->
            <p class="text-sm sm:text-base text-slate-600 dark:text-slate-400 max-w-lg leading-relaxed">
                {{ __('portfolio.hero.bio') }}
            </p>

            <!-- Action Buttons Group (Matches Reference: Solid Primary + Outline Secondary) -->
            <div class="flex flex-wrap items-center gap-4 pt-2">
                <!-- Primary CTA (Black/Deep Slate with smooth hover) -->
                <a href="#work" class="inline-flex items-center gap-2.5 px-6 sm:px-7 py-3.5 rounded-2xl bg-[#0F172A] hover:bg-blue-600 dark:bg-white dark:hover:bg-blue-500 text-white dark:text-[#0F172A] dark:hover:text-white font-medium text-sm shadow-[0_12px_24px_rgba(15,23,42,0.18)] dark:shadow-none hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 group">
                    <span>{{ __('portfolio.hero.cta_work') }}</span>
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M7 17L17 7M17 7H7M17 7V17" />
                    </svg>
                </a>

                <!-- Secondary CTA (Clean Outline Button) -->
                <a href="#contact" class="inline-flex items-center gap-2 px-6 sm:px-7 py-3.5 rounded-2xl bg-white dark:bg-[#1E293B]/80 border border-slate-200 dark:border-slate-700 text-[#0F172A] dark:text-[#F8FAFC] font-medium text-sm hover:border-blue-400 dark:hover:border-blue-500 hover:bg-slate-50 dark:hover:bg-[#283548] hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 shadow-xs">
                    <span>{{ __('portfolio.hero.cta_talk') }}</span>
                    <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </a>
            </div>

            <!-- Tech Badges / Stack Info -->
            <div class="flex items-center gap-4 pt-4 text-xs text-slate-500 dark:text-slate-400 font-mono">
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

        <!-- Right Column: Clean Monochrome Portrait with Soft Blue Edge Aura -->
        <div class="lg:col-span-5 relative flex justify-center lg:justify-end reveal-on-scroll">
            
            <!-- Radiant Soft Blue & Sky Aura on the Right Edge of the Photo -->
            <div class="pointer-events-none absolute -right-8 -top-4 w-[420px] h-[480px] bg-gradient-to-bl from-blue-400/35 via-sky-300/30 to-blue-200/10 dark:from-blue-600/30 dark:via-sky-500/20 dark:to-transparent rounded-full blur-3xl -z-10"></div>
            <div class="pointer-events-none absolute right-0 top-12 w-80 h-96 bg-blue-300/30 dark:bg-sky-400/20 rounded-full blur-2xl -z-10"></div>

            <div class="relative w-full max-w-sm sm:max-w-md lg:max-w-none aspect-[4/5] sm:aspect-[3/4] rounded-2xl overflow-hidden flex items-end justify-center">
                
                <!-- Portrait Image with Blue Edge Aura -->
                <img 
                    src="{{ asset('images/portrait.jpg') }}" 
                    alt="Anang Muhamad Lutfi - Portrait" 
                    class="w-full h-full object-cover object-top contrast-[1.04] transition-all duration-700 fade-bottom-mask"
                    loading="eager"
                />

                <!-- Bottom Gradient Fade Layer (Blends smoothly into pure white background) -->
                <div class="pointer-events-none absolute inset-x-0 bottom-0 h-44 bg-gradient-to-t from-white via-white/80 to-transparent dark:from-[#0A0F1D] dark:via-[#0A0F1D]/80 dark:to-transparent"></div>
                
                <!-- Subtle Side Vignette (Left edge blend) -->
                <div class="pointer-events-none absolute inset-y-0 left-0 w-16 bg-gradient-to-r from-white/90 dark:from-[#0A0F1D]/90 to-transparent"></div>
            </div>
        </div>
    </div>
</section>
