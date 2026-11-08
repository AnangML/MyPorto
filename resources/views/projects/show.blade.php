<x-layouts.app :title="$project->title . ' — Anang Muhamad Lutfi'">
    <article 
        class="px-2 sm:px-6 lg:px-8 pt-20 sm:pt-24 pb-12 max-w-4xl mx-auto"
        x-data="{
            lightboxOpen: false,
            activeImage: '',
            activeCaption: '',
            openLightbox(url, caption = '') {
                this.activeImage = url;
                this.activeCaption = caption;
                this.lightboxOpen = true;
                document.body.classList.add('overflow-hidden');
            },
            closeLightbox() {
                this.lightboxOpen = false;
                document.body.classList.remove('overflow-hidden');
            }
        }"
        @keydown.escape.window="closeLightbox()"
    >
        
        <!-- Navigation Back Link -->
        <div class="mb-8">
            <a href="{{ route('home') }}#work" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-400 transition-colors group">
                <svg class="w-4 h-4 transition-transform duration-200 group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>{{ __('portfolio.projects.back_to_work') }}</span>
            </a>
        </div>

        <!-- Header: Category & Title -->
        <header class="mb-10 reveal-on-scroll">
            <div class="flex flex-wrap items-center gap-2 mb-4">
                @foreach($project->categories as $category)
                    <span class="text-xs font-mono font-medium px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 border border-blue-200/60 dark:border-blue-800/60">
                        {{ $category->name }}
                    </span>
                @endforeach
                
                @if($project->started_at)
                    <span class="text-xs font-mono text-slate-400 dark:text-slate-500">
                        &bull; {{ $project->started_at->format('M Y') }} {{ $project->completed_at ? '— ' . $project->completed_at->format('M Y') : '— Present' }}
                    </span>
                @endif
            </div>

            <h1 class="text-3xl sm:text-5xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC] leading-tight">
                {{ $project->title }}
            </h1>

            <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 mt-4 leading-relaxed font-normal">
                {{ $project->summary }}
            </p>

            <!-- Action Buttons Group (Demo & Repository) -->
            <div class="flex flex-wrap items-center gap-4 pt-6">
                @if($project->project_url)
                    <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-medium text-xs shadow-sm shadow-blue-500/20 hover:-translate-y-0.5 transition-all">
                        <span>{{ __('portfolio.projects.live_demo') }}</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                @endif

                @if($project->repository_url)
                    <a href="{{ $project->repository_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200 dark:border-slate-700 hover:border-blue-400 dark:hover:border-blue-500 text-slate-800 dark:text-slate-200 font-medium text-xs shadow-xs hover:-translate-y-0.5 transition-all">
                        <svg class="w-4 h-4 text-slate-700 dark:text-slate-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                        <span>{{ __('portfolio.projects.source_code') }}</span>
                    </a>
                @endif
            </div>
        </header>

        @if($project->cover_image_url)
            <!-- Project Cover Showcase / Browser Mockup -->
            <div class="mb-10 rounded-2xl sm:rounded-3xl overflow-hidden border border-slate-200/90 dark:border-slate-800 bg-white dark:bg-[#1E293B] shadow-sm shadow-slate-200/50 dark:shadow-none">
                <!-- Browser Header Bar -->
                <div class="flex items-center justify-between px-4 py-2.5 bg-slate-100/70 dark:bg-[#0F172A] border-b border-slate-200/80 dark:border-slate-800 text-xs">
                    <div class="flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded-full bg-red-400/80"></span>
                        <span class="w-3 h-3 rounded-full bg-amber-400/80"></span>
                        <span class="w-3 h-3 rounded-full bg-emerald-400/80"></span>
                    </div>
                    
                    <div class="text-[11px] font-mono text-slate-500 dark:text-slate-400 truncate max-w-xs px-3 py-0.5 rounded-full bg-white dark:bg-slate-900 border border-slate-200/60 dark:border-slate-800">
                        {{ $project->project_url ? parse_url($project->project_url, PHP_URL_HOST) ?? $project->slug : $project->slug }}
                    </div>

                    <!-- Eye Review Button in Toolbar -->
                    <button 
                        type="button" 
                        @click="openLightbox('{{ $project->cover_image_url }}', '{{ addslashes($project->title) }}')"
                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-white dark:bg-slate-900 hover:bg-blue-50 dark:hover:bg-blue-950/60 border border-slate-200/80 dark:border-slate-700/80 hover:border-blue-400 text-[11px] font-medium text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition-all shadow-2xs group/btn cursor-pointer"
                        title="Review / Perbesar Gambar Aplikasi">
                        <svg class="w-3.5 h-3.5 text-slate-500 group-hover/btn:text-blue-600 dark:text-slate-400 dark:group-hover/btn:text-blue-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <span class="hidden sm:inline">Review Gambar</span>
                    </button>
                </div>

                <!-- Showcase Image with Interactive Hover Overlay -->
                <div 
                    class="aspect-video w-full bg-slate-50 dark:bg-slate-950 overflow-hidden relative flex items-center justify-center group/cover cursor-zoom-in"
                    @click="openLightbox('{{ $project->cover_image_url }}', '{{ addslashes($project->title) }}')"
                >
                    <img 
                        src="{{ $project->cover_image_url }}" 
                        alt="{{ $project->title }}" 
                        class="w-full h-full object-cover object-top transition-transform duration-500 group-hover/cover:scale-[1.02]"
                    />

                    <!-- Hover Pill with Eye Icon -->
                    <div class="absolute inset-0 bg-slate-950/25 opacity-0 group-hover/cover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-900/85 backdrop-blur-md text-white text-xs font-semibold border border-white/20 shadow-xl transform translate-y-2 group-hover/cover:translate-y-0 transition-transform duration-300">
                            <svg class="w-4 h-4 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span>Klik untuk Review Layar Penuh</span>
                        </span>
                    </div>
                </div>
            </div>
        @endif

        <!-- Project Meta Information Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-5 rounded-2xl bg-slate-50/80 dark:bg-[#1E293B]/70 border border-slate-100 dark:border-slate-800 mb-12 text-xs">
            <div>
                <span class="text-slate-400 dark:text-slate-500 font-mono uppercase block mb-1">
                    {{ __('portfolio.projects.role') }}
                </span>
                <span class="font-semibold text-slate-800 dark:text-slate-200">
                    {{ $project->role ?? 'Lead Backend Developer' }}
                </span>
            </div>

            <div>
                <span class="text-slate-400 dark:text-slate-500 font-mono uppercase block mb-1">Client / Context</span>
                <span class="font-semibold text-slate-800 dark:text-slate-200">
                    {{ $project->client_name ?? 'Professional Project' }}
                </span>
            </div>

            <div>
                <span class="text-slate-400 dark:text-slate-500 font-mono uppercase block mb-1">
                    {{ __('portfolio.projects.technologies') }}
                </span>
                <div class="flex flex-wrap gap-1 mt-0.5">
                    @foreach($project->technologies as $tech)
                        <span class="px-2 py-0.5 rounded-md bg-white dark:bg-[#0A0F1D] text-slate-700 dark:text-slate-300 border border-slate-200/60 dark:border-slate-700 text-[10px] font-mono">
                            {{ $tech->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Main Case Study Content -->
        <div class="prose prose-slate dark:prose-invert max-w-none text-slate-700 dark:text-slate-300 leading-relaxed space-y-6">
            <h2 class="text-xl font-bold text-[#0F172A] dark:text-[#F8FAFC] pb-2 border-b border-slate-100 dark:border-slate-800">
                {{ __('portfolio.projects.overview') }}
            </h2>

            <div class="text-sm sm:text-base leading-relaxed whitespace-pre-line">
                {{ $project->description }}
            </div>
        </div>

        @if(! empty($project->screenshots_urls))
            <!-- Gallery Section with Lightbox Triggers -->
            <div class="mt-12 pt-8 border-t border-slate-100 dark:border-slate-800 space-y-4">
                <h3 class="text-base sm:text-lg font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                    Tangkapan Layar &amp; Antarmuka Proyek
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($project->screenshots_urls as $screenshot)
                        <div 
                            class="rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-800 bg-white dark:bg-[#1E293B] shadow-xs group cursor-zoom-in relative"
                            @click="openLightbox('{{ $screenshot['url'] }}', 'Screenshot {{ addslashes($project->title) }}')"
                        >
                            <div class="aspect-video overflow-hidden relative">
                                <img 
                                    src="{{ $screenshot['url'] }}" 
                                    alt="Screenshot {{ $project->title }}" 
                                    class="w-full h-full object-cover object-top transition-transform duration-300 group-hover:scale-105"
                                    loading="lazy"
                                />

                                <div class="absolute inset-0 bg-slate-950/25 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center">
                                    <span class="p-2.5 rounded-full bg-slate-900/85 backdrop-blur-md text-white border border-white/20 shadow-lg">
                                        <svg class="w-4 h-4 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Recommended Projects Section -->
        @if($relatedProjects->isNotEmpty())
            <div class="mt-20 pt-10 border-t border-slate-100 dark:border-slate-800">
                <h3 class="text-lg font-bold text-[#0F172A] dark:text-[#F8FAFC] mb-6">
                    Explore More Work
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach($relatedProjects as $rel)
                        <a href="{{ route('projects.show', $rel->slug) }}" class="group p-5 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-700 hover:border-blue-300 dark:hover:border-blue-500 transition-all hover:-translate-y-1 block shadow-xs">
                            <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 font-medium">
                                {{ $rel->categories->first()?->name ?? 'Project' }}
                            </span>
                            <h4 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors mt-2">
                                {{ $rel->title }}
                            </h4>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 line-clamp-2">
                                {{ $rel->summary }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Fullscreen Modal Lightbox -->
        <template x-teleport="body">
            <div 
                x-show="lightboxOpen" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-[100] flex flex-col items-center justify-center p-3 sm:p-6 md:p-8 bg-slate-950/90 backdrop-blur-md"
                @click.self="closeLightbox()"
                style="display: none;"
            >
                <!-- Close Button (X) -->
                <button 
                    type="button" 
                    @click="closeLightbox()"
                    class="fixed top-4 right-4 sm:top-6 sm:right-6 z-[110] p-2.5 rounded-full bg-slate-900/90 hover:bg-slate-800 text-slate-300 hover:text-white border border-white/10 shadow-xl transition-all duration-200 hover:scale-105 focus:outline-hidden cursor-pointer"
                    title="Tutup (Esc)"
                    aria-label="Tutup Review Gambar"
                >
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Lightbox Card & Caption -->
                <div 
                    x-show="lightboxOpen"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                    class="relative max-w-6xl max-h-[92vh] flex flex-col items-center justify-center select-none"
                    @click.stop
                >
                    <!-- Main High-Res Image -->
                    <div class="rounded-2xl sm:rounded-3xl overflow-hidden border border-white/15 shadow-2xl bg-slate-900/60 backdrop-blur-xs flex items-center justify-center max-h-[82vh] max-w-full">
                        <img 
                            :src="activeImage" 
                            :alt="activeCaption" 
                            class="max-h-[82vh] max-w-[92vw] w-auto h-auto object-contain rounded-2xl shadow-inner"
                        />
                    </div>

                    <!-- Footer Details -->
                    <div class="mt-3.5 flex items-center justify-between gap-4 w-full px-2 text-xs text-slate-300">
                        <div class="flex items-center gap-2 truncate">
                            <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                            <span class="font-medium truncate" x-text="activeCaption || 'Preview Gambar Aplikasi'"></span>
                        </div>
                        <div class="text-[11px] font-mono text-slate-400 shrink-0 hidden sm:inline-flex items-center gap-1.5">
                            <span>Tekan</span>
                            <kbd class="px-1.5 py-0.5 rounded-md bg-slate-800 text-slate-300 border border-slate-700 text-[10px]">ESC</kbd>
                            <span>atau klik di luar untuk menutup</span>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </article>
</x-layouts.app>

