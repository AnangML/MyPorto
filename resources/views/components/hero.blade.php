<section class="px-6 sm:px-12 lg:px-16 pt-8 sm:pt-14 pb-12 lg:pb-20 relative overflow-hidden">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-8 items-center">
        
        <!-- Left Column: Copy & CTAs -->
        <div class="lg:col-span-7 flex flex-col items-start gap-6 sm:gap-7 z-10 reveal-on-scroll">
            
            <!-- Availability Pill Badge -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#FFF1ED] dark:bg-[#32201D] border border-[#FBD5CB] dark:border-[#4A2D27] text-xs font-medium text-[#B96F5D] dark:text-[#F0A896] tracking-wide shadow-sm">
                <svg class="w-3.5 h-3.5 text-[#E69A86] fill-current animate-pulse" viewBox="0 0 24 24">
                    <path d="M12 2l2.4 7.2h7.6l-6.1 4.5 2.3 7.3-6.2-4.6-6.2 4.6 2.3-7.3-6.1-4.5h7.6z"/>
                </svg>
                <span>{{ __('portfolio.hero.availability') }}</span>
            </div>

            <!-- Main Editorial Headline -->
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-[#171717] dark:text-[#FAF9F7] leading-[1.08] max-w-xl">
                {{ __('portfolio.hero.headline_prefix') }}
                <span class="block">
                    {{ __('portfolio.hero.headline_middle') }}
                    <span class="font-serif-accent italic font-normal text-[#E69A86] dark:text-[#F0A896] text-5xl sm:text-7xl lg:text-8xl tracking-normal inline-block ml-1">
                        {{ __('portfolio.hero.headline_accent') }}
                    </span>
                </span>
            </h1>

            <!-- Bio Subtitle -->
            <p class="text-sm sm:text-base text-[#737373] dark:text-[#B9B1AC] max-w-lg leading-relaxed">
                {{ __('portfolio.hero.bio') }}
            </p>

            <!-- Action Buttons Group -->
            <div class="flex flex-wrap items-center gap-4 pt-2">
                <!-- Primary CTA -->
                <a href="#work" class="inline-flex items-center gap-2.5 px-6 sm:px-7 py-3.5 rounded-2xl bg-[#171717] dark:bg-[#FAF9F7] text-white dark:text-[#171717] font-medium text-sm shadow-[0_12px_24px_rgba(0,0,0,0.18)] dark:shadow-none hover:bg-[#262626] dark:hover:bg-[#EAE6E2] hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 group">
                    <span>{{ __('portfolio.hero.cta_work') }}</span>
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M7 17L17 7M17 7H7M17 7V17" />
                    </svg>
                </a>

                <!-- Secondary CTA -->
                <a href="#contact" class="inline-flex items-center gap-2 px-6 sm:px-7 py-3.5 rounded-2xl bg-white/80 dark:bg-[#252321]/70 border border-[#E7E2DF] dark:border-[#35322F] text-[#171717] dark:text-[#FAF9F7] font-medium text-sm hover:bg-white dark:hover:bg-[#2D2A27] hover:border-[#D1C9C5] dark:hover:border-[#4A4541] hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 shadow-sm">
                    <span>{{ __('portfolio.hero.cta_talk') }}</span>
                    <svg class="w-4 h-4 text-[#737373] dark:text-[#B9B1AC]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </a>
            </div>

            <!-- Tech Badges / Sub-metrics -->
            <div class="flex items-center gap-4 pt-4 text-xs text-[#737373] dark:text-[#B9B1AC] font-mono">
                <span class="flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#E69A86]"></span>
                    Laravel 12 / PHP 8.3
                </span>
                <span class="text-[#E7E2DF] dark:text-[#35322F]">•</span>
                <span class="flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#60a5fa]"></span>
                    PostgreSQL
                </span>
                <span class="text-[#E7E2DF] dark:text-[#35322F]">•</span>
                <span class="flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#38bdf8]"></span>
                    Tailwind CSS
                </span>
            </div>
        </div>

        <!-- Right Column: Monochrome Portrait with Smooth Bottom Fade -->
        <div class="lg:col-span-5 relative flex justify-center lg:justify-end reveal-on-scroll">
            
            <!-- Soft Warm Radial Glow Behind Portrait -->
            <div class="absolute inset-0 bg-gradient-to-tr from-[#FFF1ED]/80 via-[#FBD5CB]/40 to-transparent dark:from-[#33221E]/30 dark:via-[#261B18]/20 rounded-full blur-2xl -z-10 scale-95"></div>

            <div class="relative w-full max-w-sm sm:max-w-md lg:max-w-none aspect-[4/5] sm:aspect-[3/4] rounded-2xl overflow-hidden flex items-end justify-center">
                
                <!-- Portrait Image -->
                <img 
                    src="{{ asset('images/hero-reference.jpg') }}" 
                    alt="Anang Muhamad Lutfi - Portrait" 
                    class="w-full h-full object-cover object-top grayscale contrast-[1.08] hover:contrast-100 transition-all duration-700 fade-bottom-mask"
                    loading="eager"
                />

                <!-- Bottom Gradient Fade Layer (Seamless integration into canvas) -->
                <div class="pointer-events-none absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-[#FAF9F7] via-[#FAF9F7]/60 to-transparent dark:from-[#1C1B1A] dark:via-[#1C1B1A]/60 dark:to-transparent"></div>
                
                <!-- Subtle Side Vignette (Left edge blend) -->
                <div class="pointer-events-none absolute inset-y-0 left-0 w-16 bg-gradient-to-r from-[#FAF9F7]/80 dark:from-[#1C1B1A]/80 to-transparent"></div>
            </div>
        </div>
    </div>
</section>

