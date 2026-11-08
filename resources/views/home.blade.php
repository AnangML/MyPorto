<x-layouts.app>
    <!-- Hero Section -->
    <x-hero :profile="$profile" />

    <!-- About & Engineering Matrix + Background Wrapper -->
    <div id="about" class="scroll-mt-24">
        <!-- Skills & Technology Matrix (Bento Grid) -->
        <section class="px-2 sm:px-6 lg:px-8 py-16 border-t border-slate-100 dark:border-slate-800/80 reveal-on-scroll">
            <div class="max-w-2xl mb-10">
                <span class="text-xs font-mono uppercase tracking-wider text-blue-600 dark:text-sky-400 font-semibold">Technical Matrix</span>
                <h2 class="text-2xl sm:text-4xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC] mt-1">
                    Skills &amp; Engineering Stack
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-2">
                    Teknologi dan spesialisasi arsitektur yang digunakan untuk merancang sistem yang aman, skalabel, dan efisien.
                </p>
            </div>

            @php
                $bentoConfigs = [
                    'backend' => [
                        'num' => '01 // ARCHITECTURE',
                        'title' => 'Core Backend & Architecture',
                        'desc' => 'High-concurrency services, transactional integrity & robust modular design.',
                        'span' => 'lg:col-span-7',
                        'icon' => 'terminal',
                    ],
                    'database' => [
                        'num' => '02 // DATA ENGINES',
                        'title' => 'Databases & Storage',
                        'desc' => 'ACID guarantees, query indexing optimization & relational schema modeling.',
                        'span' => 'lg:col-span-5',
                        'icon' => 'database',
                    ],
                    'frontend' => [
                        'num' => '03 // INTERFACES',
                        'title' => 'Frontend & Interaction',
                        'desc' => 'Lightweight reactive components, accessible design systems & responsive styling.',
                        'span' => 'lg:col-span-5',
                        'icon' => 'layout',
                    ],
                    'tools' => [
                        'num' => '04 // DEVOPS & CI/CD',
                        'title' => 'DevOps, CI/CD & Tooling',
                        'desc' => 'Automated deployment pipelines, Linux server setups & modern version workflows.',
                        'span' => 'lg:col-span-7',
                        'icon' => 'cloud',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                @foreach($bentoConfigs as $key => $config)
                    <div class="{{ $config['span'] }} rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 p-6 sm:p-7 shadow-[0_4px_24px_rgba(0,0,0,0.03)] hover:shadow-xl hover:shadow-blue-500/5 hover:border-blue-400/80 dark:hover:border-blue-500/60 hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group flex flex-col justify-between">
                        
                        <!-- Ambient Corner Aura -->
                        <div class="pointer-events-none absolute -right-6 -bottom-6 w-36 h-36 bg-blue-500/5 dark:bg-sky-400/5 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-500 -z-0"></div>

                        <div class="relative z-10">
                            <!-- Card Header: Micro-label, Title & Icon -->
                            <div class="flex items-start justify-between gap-4 pb-4 border-b border-slate-100 dark:border-slate-800/80">
                                <div>
                                    <span class="text-[10px] sm:text-[11px] font-mono tracking-wider text-blue-600 dark:text-sky-400 font-bold block mb-1">
                                        {{ $config['num'] }}
                                    </span>
                                    <h3 class="text-base sm:text-lg font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                                        {{ $config['title'] }}
                                    </h3>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 max-w-md leading-relaxed">
                                        {{ $config['desc'] }}
                                    </p>
                                </div>

                                <div class="w-10 h-10 rounded-2xl bg-blue-50 dark:bg-blue-950/70 text-blue-600 dark:text-sky-400 border border-blue-200/70 dark:border-blue-800/70 flex items-center justify-center shrink-0 shadow-2xs group-hover:scale-110 transition-transform duration-200">
                                    @if($config['icon'] === 'terminal')
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    @elseif($config['icon'] === 'database')
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                                        </svg>
                                    @elseif($config['icon'] === 'layout')
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 00-9.78 2.096A4.001 4.001 0 003 15z" />
                                        </svg>
                                    @endif
                                </div>
                            </div>

                            <!-- Skills Interactive Chips Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 mt-5">
                                @forelse($skills[$key] ?? [] as $skill)
                                    <div class="p-3 rounded-2xl bg-slate-50/70 dark:bg-[#0F172A]/60 border border-slate-100 dark:border-slate-800/80 hover:border-blue-300 dark:hover:border-blue-500/50 hover:bg-white dark:hover:bg-[#0F172A] transition-all group/chip flex flex-col justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-600 dark:bg-sky-400 shrink-0"></span>
                                            <span class="font-bold text-xs text-[#0F172A] dark:text-[#F8FAFC] group-hover/chip:text-blue-600 dark:group-hover/chip:text-sky-400 transition-colors">
                                                {{ $skill->name }}
                                            </span>
                                        </div>
                                        @if($skill->description)
                                            <span class="text-[11px] text-slate-500 dark:text-slate-400 font-mono mt-1.5 line-clamp-2 leading-relaxed" title="{{ $skill->description }}">
                                                {{ $skill->description }}
                                            </span>
                                        @endif
                                    </div>
                                @empty
                                    <div class="col-span-2 text-xs text-slate-400 py-2">
                                        Stack info coming soon
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Experiences & Education Timeline -->
        <section class="px-2 sm:px-6 lg:px-8 py-14 border-t border-slate-100 dark:border-slate-800/80 reveal-on-scroll">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
                <div class="max-w-2xl">
                    <span class="text-xs font-mono uppercase tracking-wider text-blue-600 dark:text-sky-400 font-semibold">Background</span>
                    <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC] mt-1">
                        Experience &amp; Education
                    </h2>
                </div>

                <a href="{{ route('cv.download') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-50 hover:bg-blue-50 dark:bg-slate-800/80 dark:hover:bg-slate-800 border border-slate-200/80 dark:border-slate-700 text-xs font-semibold text-slate-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-sky-400 transition-all self-start sm:self-auto shadow-xs group" title="Download Resume / CV (PDF)">
                    <svg class="w-3.5 h-3.5 text-blue-600 dark:text-sky-400 group-hover:translate-y-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>{{ __('portfolio.hero.download_cv') }} (PDF)</span>
                </a>
            </div>

            <div class="space-y-6 max-w-3xl">
                @forelse($experiences as $exp)
                    <div class="relative pl-6 sm:pl-8 border-l-2 border-blue-200 dark:border-blue-900 group">
                        <!-- Timeline Node -->
                        <div class="absolute -left-[9px] top-1.5 w-4 h-4 rounded-full bg-white dark:bg-[#0A0F1D] border-2 border-blue-600 group-hover:scale-110 transition-transform"></div>
                        
                        <div class="flex flex-wrap items-baseline justify-between gap-2 mb-1">
                            <h3 class="text-base font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                                {{ $exp->position }}
                            </h3>
                            <span class="text-xs font-mono text-blue-600 dark:text-sky-400 font-medium">
                                {{ $exp->started_at->format('Y') }} — {{ $exp->is_current ? 'Present' : $exp->ended_at?->format('Y') }}
                            </span>
                        </div>

                        <div class="text-xs font-semibold text-slate-500 dark:text-slate-400 mb-2 flex items-center gap-1.5 flex-wrap">
                            <span>{{ $exp->organization }}</span>
                            <span>&bull;</span>
                            @if($exp->location_type === 'online')
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            @endif
                            <span>{{ $exp->location_display }}</span>
                        </div>

                        @if($exp->description)
                            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                                {{ $exp->description }}
                            </p>
                        @endif
                    </div>
                @empty
                    <div class="text-xs text-slate-400">No experiences listed yet.</div>
                @endforelse
            </div>
        </section>
    </div>

    <!-- Featured Projects Showcase (With Alpine.js Category Filter) -->
    <section id="work" class="scroll-mt-24 px-2 sm:px-6 lg:px-8 py-16 border-t border-slate-100 dark:border-slate-800/80 reveal-on-scroll" x-data="{ activeCategory: 'all' }">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
            <div>
                <span class="text-xs font-mono uppercase tracking-wider text-blue-600 dark:text-sky-400 font-semibold">Featured Work</span>
                <h2 class="text-2xl sm:text-4xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC] mt-1">
                    Projects &amp; Case Studies
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-2 max-w-xl">
                    Koleksi arsitektur sistem, aplikasi web enterprise, dan layanan terdistribusi yang dibangun dengan standar performa dan reliabilitas tinggi.
                </p>
            </div>

            <!-- Category Filter Pills -->
            <div class="flex flex-wrap items-center gap-2">
                <button 
                    type="button"
                    @click="activeCategory = 'all'"
                    :class="activeCategory === 'all' ? 'bg-[#0F172A] text-white dark:bg-white dark:text-[#0F172A] shadow-sm' : 'bg-slate-100 dark:bg-[#1E293B] text-slate-600 dark:text-slate-400 hover:text-[#0F172A] dark:hover:text-white border border-transparent hover:border-slate-300 dark:hover:border-slate-700'"
                    class="px-4 py-2 rounded-full text-xs font-semibold transition-all duration-200">
                    {{ __('portfolio.projects.all') }}
                </button>

                @foreach($categories as $category)
                    <button 
                        type="button"
                        @click="activeCategory = '{{ $category->slug }}'"
                        :class="activeCategory === '{{ $category->slug }}' ? 'bg-blue-600 text-white shadow-sm shadow-blue-500/25' : 'bg-slate-100 dark:bg-[#1E293B] text-slate-600 dark:text-slate-400 hover:text-[#0F172A] dark:hover:text-white border border-transparent hover:border-slate-300 dark:hover:border-slate-700'"
                        class="px-4 py-2 rounded-full text-xs font-semibold transition-all duration-200">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Project Cards Bento Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @forelse($projects as $project)
                @php
                    $catSlugs = $project->categories->pluck('slug')->toArray();
                @endphp
                <div 
                    x-show="activeCategory === 'all' || {{ json_encode($catSlugs) }}.includes(activeCategory)"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="group rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-[0_4px_24px_rgba(0,0,0,0.03)] hover:shadow-2xl hover:shadow-blue-500/8 hover:border-blue-400/80 dark:hover:border-blue-500/60 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between overflow-hidden">
                    
                    <div>
                        <!-- Faux Browser Header Bar -->
                        <div class="px-4 py-3 bg-slate-50/90 dark:bg-[#0F172A]/80 border-b border-slate-100 dark:border-slate-800/80 flex items-center text-xs">
                            <!-- 3 Colored Window Dots -->
                            <div class="flex items-center gap-1.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-400/90"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-400/90"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400/90"></span>
                            </div>
                        </div>

                        <!-- Visual Window Anchor / Thumbnail -->
                        <a href="{{ route('projects.show', $project->slug) }}" class="block aspect-video bg-gradient-to-br from-slate-50 via-blue-50/40 to-sky-50/50 dark:from-[#0B1120] dark:via-[#131F33] dark:to-[#0B1120] border-b border-slate-100 dark:border-slate-800/80 overflow-hidden relative flex items-center justify-center p-6 group/thumb">
                            <div class="absolute inset-0 bg-[radial-gradient(#2563eb_1px,transparent_1px)] [background-size:16px_16px] opacity-15"></div>
                            
                            @if($project->is_featured)
                                <div class="absolute bottom-3 right-3 z-20" title="Proyek Unggulan">
                                    <svg class="w-5 h-5 text-amber-400 fill-amber-400" viewBox="0 0 24 24">
                                        <path d="M12 2l2.4 7.2h7.6l-6.1 4.5 2.3 7.3-6.2-4.6-6.2 4.6 2.3-7.3-6.1-4.5h7.6z"/>
                                    </svg>
                                </div>
                            @endif

                            @if($project->cover_image_url)
                                <img 
                                    src="{{ $project->cover_image_url }}" 
                                    alt="{{ $project->title }}" 
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    loading="lazy"
                                />
                            @else
                                <div class="text-center relative z-10 transition-transform duration-300 group-hover:scale-105">
                                    <span class="font-mono text-[10px] font-bold text-blue-600 dark:text-sky-400 uppercase tracking-widest px-2.5 py-1 rounded-full bg-blue-50/90 dark:bg-blue-950/80 border border-blue-200/60 dark:border-blue-800/60 inline-block mb-1.5">
                                        {{ $project->role ?? 'Backend Architecture' }}
                                    </span>
                                    <div class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] tracking-tight px-3 line-clamp-1">
                                        {{ $project->title }}
                                    </div>
                                </div>
                            @endif
                        </a>

                        <!-- Content Area -->
                        <div class="p-5 sm:p-6">
                            <!-- Category & Stack Chips -->
                            <div class="flex flex-wrap items-center gap-1.5 mb-3">
                                @foreach($project->categories as $category)
                                    <span class="text-[10px] font-mono px-2.5 py-0.5 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 font-semibold border border-blue-200/60 dark:border-blue-800/60">
                                        {{ $category->name }}
                                    </span>
                                @endforeach

                                @foreach($project->technologies->take(3) as $tech)
                                    <span class="text-[10px] font-mono px-2.5 py-0.5 rounded-full bg-slate-100 dark:bg-[#0F172A] text-slate-600 dark:text-slate-400 border border-slate-200/60 dark:border-slate-800">
                                        {{ $tech->name }}
                                    </span>
                                @endforeach
                            </div>

                            <!-- Title -->
                            <h3 class="text-base sm:text-lg font-bold text-[#0F172A] dark:text-[#F8FAFC] group-hover:text-blue-600 dark:group-hover:text-sky-400 transition-colors leading-snug">
                                <a href="{{ route('projects.show', $project->slug) }}">
                                    {{ $project->title }}
                                </a>
                            </h3>

                            <!-- Summary -->
                            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 mt-2 line-clamp-3 leading-relaxed">
                                {{ $project->summary }}
                            </p>
                        </div>
                    </div>

                    <!-- Direct Action Links Bar -->
                    <div class="px-5 sm:px-6 py-4 bg-slate-50/50 dark:bg-[#0F172A]/40 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between text-xs font-semibold">
                        <a href="{{ route('projects.show', $project->slug) }}" class="inline-flex items-center gap-1.5 text-blue-600 dark:text-sky-400 hover:text-blue-700 dark:hover:text-blue-300 font-semibold transition-colors group/link">
                            <span>{{ __('portfolio.projects.view_case_study') }}</span>
                            <svg class="w-3.5 h-3.5 transition-transform group-hover/link:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>

                        <div class="flex items-center gap-2">
                            @if($project->repository_url)
                                <a href="{{ $project->repository_url }}" target="_blank" rel="noopener noreferrer" class="p-1.5 rounded-lg bg-white dark:bg-[#1E293B] border border-slate-200 dark:border-slate-700 text-slate-600 hover:text-blue-600 dark:text-slate-400 dark:hover:text-sky-400 transition-colors shadow-2xs" title="Source Code">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                                </a>
                            @endif

                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer" class="p-1.5 rounded-lg bg-white dark:bg-[#1E293B] border border-slate-200 dark:border-slate-700 text-slate-600 hover:text-blue-600 dark:text-slate-400 dark:hover:text-sky-400 transition-colors shadow-2xs" title="Live Demo">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-slate-400 text-sm">
                    No projects found.
                </div>
            @endforelse
        </div>
    </section>

    <!-- Verified Credentials, Trainings & Certifications Section (Paket C) -->
    <section id="credentials" class="scroll-mt-24 px-2 sm:px-6 lg:px-8 py-16 border-t border-slate-100 dark:border-slate-800/80 reveal-on-scroll" x-data="{ activeType: 'all' }">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-950/60 border border-blue-200/80 dark:border-blue-800/80 text-[11px] font-semibold text-blue-700 dark:text-blue-300 mb-2">
                    <svg class="w-3.5 h-3.5 text-blue-600 dark:text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span>{{ __('portfolio.credentials.badge') }}</span>
                </div>
                <h2 class="text-2xl sm:text-4xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    {{ __('portfolio.credentials.title') }}
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-2 max-w-xl">
                    {{ __('portfolio.credentials.subtitle') }}
                </p>
            </div>

            <!-- Filter Pills by Activity Type -->
            <div class="flex flex-wrap items-center gap-2">
                <button 
                    type="button"
                    @click="activeType = 'all'"
                    :class="activeType === 'all' ? 'bg-[#0F172A] text-white dark:bg-white dark:text-[#0F172A] shadow-sm' : 'bg-slate-100 dark:bg-[#1E293B] text-slate-600 dark:text-slate-400 hover:text-[#0F172A] dark:hover:text-white border border-transparent hover:border-slate-300 dark:hover:border-slate-700'"
                    class="px-4 py-2 rounded-full text-xs font-semibold transition-all duration-200">
                    {{ __('portfolio.credentials.all') }}
                    <span class="ml-1 opacity-70">({{ $trainings->count() }})</span>
                </button>

                @php
                    $availableTypes = $trainings->pluck('type')->unique();
                @endphp
                @foreach($availableTypes as $type)
                    <button 
                        type="button"
                        @click="activeType = '{{ $type }}'"
                        :class="activeType === '{{ $type }}' ? 'bg-blue-600 text-white shadow-sm shadow-blue-500/25' : 'bg-slate-100 dark:bg-[#1E293B] text-slate-600 dark:text-slate-400 hover:text-[#0F172A] dark:hover:text-white border border-transparent hover:border-slate-300 dark:hover:border-slate-700'"
                        class="px-4 py-2 rounded-full text-xs font-semibold transition-all duration-200">
                        {{ \App\Models\Training::TYPES[$type][app()->getLocale()] ?? \App\Models\Training::TYPES[$type]['id'] ?? ucfirst($type) }}
                        <span class="ml-1 opacity-70">({{ $trainings->where('type', $type)->count() }})</span>
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Credentials Bento Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($trainings as $training)
                <div 
                    x-show="activeType === 'all' || activeType === '{{ $training->type }}'"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="group rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 p-6 shadow-[0_4px_24px_rgba(0,0,0,0.03)] hover:shadow-xl hover:shadow-blue-500/5 hover:border-blue-400/80 dark:hover:border-blue-500/60 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between relative overflow-hidden">
                    
                    <div>
                        <!-- Header: Activity Type & Sub-Vocation Badges -->
                        <div class="flex items-start justify-between gap-2 mb-3">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 border border-blue-200/80 dark:border-blue-800/80 text-[11px] font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-600 dark:bg-sky-400"></span>
                                {{ $training->type_label }}
                            </span>

                            <span class="text-[10px] font-mono text-slate-500 dark:text-slate-400 uppercase tracking-wide px-2 py-0.5 rounded-md bg-slate-100 dark:bg-[#0F172A] border border-slate-200/60 dark:border-slate-800 text-right truncate max-w-[150px]" title="{{ $training->sub_vocation_combined }}">
                                {{ $training->sub_vocation_label }}
                            </span>
                        </div>

                        <!-- Training / Certificate Title -->
                        <h3 class="text-base sm:text-lg font-bold text-[#0F172A] dark:text-[#F8FAFC] group-hover:text-blue-600 dark:group-hover:text-sky-400 transition-colors leading-snug">
                            {{ $training->title }}
                        </h3>

                        <!-- Meta Info: Organizer, Location, Date -->
                        <div class="mt-3.5 space-y-2 text-xs text-slate-600 dark:text-slate-400">
                            <!-- Organizer -->
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                <span class="font-medium text-slate-700 dark:text-slate-200 truncate">{{ $training->organizer }}</span>
                            </div>

                            <!-- Location -->
                            <div class="flex items-center gap-2">
                                @if($training->location_type === 'online')
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse shrink-0"></span>
                                    <span class="text-slate-600 dark:text-slate-300 font-mono text-[11px]">{{ $training->location_display }}</span>
                                @else
                                    <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-slate-600 dark:text-slate-300 text-[11px] truncate">{{ $training->location_display }}</span>
                                @endif
                            </div>

                            <!-- Date Period -->
                            <div class="flex items-center gap-2 font-mono text-[11px] text-slate-500 dark:text-slate-400">
                                <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>
                                    {{ $training->start_date?->translatedFormat('d M Y') ?? '-' }}
                                    @if($training->end_date && $training->end_date->format('Y-m-d') !== $training->start_date?->format('Y-m-d'))
                                        — {{ $training->end_date->translatedFormat('d M Y') }}
                                    @endif
                                </span>
                            </div>
                        </div>

                        <!-- Description / Syllabus (Optional) -->
                        @if($training->description)
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-3 pt-3 border-t border-slate-100 dark:border-slate-800 line-clamp-3 leading-relaxed">
                                {{ $training->description }}
                            </p>
                        @endif
                    </div>

                    <!-- Footer: Direct Certificate Link or Verified Badge -->
                    <div class="mt-5 pt-4 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between">
                        @if($training->certificate_url_resolved)
                            <a 
                                href="{{ $training->certificate_url_resolved }}" 
                                target="_blank" 
                                rel="noopener noreferrer" 
                                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium text-xs shadow-xs shadow-blue-500/20 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 group/btn">
                                <span>{{ __('portfolio.credentials.view_credential') }}</span>
                                <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover/btn:translate-x-0.5 group-hover/btn:-translate-y-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        @else
                            <span class="inline-flex items-center gap-1.5 text-xs font-mono font-medium text-emerald-600 dark:text-emerald-400">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ __('portfolio.credentials.verified') }}</span>
                            </span>
                        @endif

                        <span class="text-[10px] font-mono text-slate-400 dark:text-slate-500 uppercase tracking-widest">
                            #{{ str_pad($training->id, 3, '0', STR_PAD_LEFT) }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 rounded-3xl bg-slate-50/50 dark:bg-[#1E293B]/40 border border-slate-200/80 dark:border-slate-800 text-slate-400 text-sm">
                    {{ __('portfolio.credentials.empty') }}
                </div>
            @endforelse
        </div>
    </section>

    <!-- Engineering Notes & Blog Section -->
    <section id="blog" class="scroll-mt-24 px-2 sm:px-6 lg:px-8 py-14 border-t border-slate-100 dark:border-slate-800/80 reveal-on-scroll">
        <div class="flex items-center justify-between mb-8">
            <div>
                <span class="text-xs font-mono uppercase tracking-wider text-blue-600 dark:text-sky-400 font-semibold">Articles &amp; Writing</span>
                <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC] mt-1">
                    Engineering Notes
                </h2>
            </div>
            <span class="text-xs font-mono text-slate-400 dark:text-slate-500">
                Insights &bull; Architecture
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($posts as $post)
                <article class="p-6 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-700/80 shadow-xs hover:border-blue-300 dark:hover:border-blue-500/60 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-3">
                            <div class="flex flex-wrap gap-1.5">
                                @forelse($post->categories as $category)
                                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 font-medium">
                                        {{ $category->name }}
                                    </span>
                                @empty
                                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 font-medium">
                                        Engineering
                                    </span>
                                @endforelse
                            </div>

                            @if($post->published_at)
                                <span class="text-[10px] font-mono text-slate-400 dark:text-slate-500">
                                    {{ $post->published_at->format('M d, Y') }}
                                </span>
                            @endif
                        </div>

                        <h3 class="text-base font-bold text-[#0F172A] dark:text-[#F8FAFC] group-hover:text-blue-600 dark:group-hover:text-sky-400 transition-colors leading-snug">
                            <a href="{{ route('posts.show', $post->slug) }}" class="focus:outline-hidden">
                                {{ $post->title }}
                            </a>
                        </h3>

                        @if($post->excerpt)
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 leading-relaxed line-clamp-2">
                                {{ $post->excerpt }}
                            </p>
                        @endif
                    </div>

                    <div class="mt-5 pt-3 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between text-[11px] text-slate-400 font-mono">
                        <span>{{ $post->reading_time }}</span>
                        <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center gap-1 text-blue-600 dark:text-sky-400 font-semibold group-hover:translate-x-0.5 transition-transform">
                            <span>Baca Catatan</span>
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-2 text-center py-10 rounded-2xl bg-slate-50 dark:bg-slate-900/40 border border-slate-200/60 dark:border-slate-800 text-slate-400 text-xs">
                    Belum ada artikel yang dipublikasikan.
                </div>
            @endforelse
        </div>
    </section>

    <!-- Interactive Contact Form Section -->
    <section id="contact" class="scroll-mt-24 px-2 sm:px-6 lg:px-8 py-16 border-t border-slate-100 dark:border-slate-800/80 reveal-on-scroll">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-start">
            
            <!-- Left Column: Context & Contact Details -->
            <div class="lg:col-span-5 flex flex-col gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-950/60 border border-blue-200/80 dark:border-blue-800/80 text-xs font-medium text-blue-700 dark:text-blue-300 mb-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                        <span>{{ __('portfolio.contact.badge') }}</span>
                    </div>

                    <h2 class="text-2xl sm:text-4xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC] leading-tight">
                        {{ __('portfolio.contact.heading') }}
                    </h2>

                    <p class="text-sm text-slate-600 dark:text-slate-400 mt-3 leading-relaxed">
                        {{ __('portfolio.contact.description') }}
                    </p>
                </div>

                <!-- Direct Links Card -->
                <div class="p-6 rounded-2xl bg-slate-50/70 dark:bg-[#1E293B]/60 border border-slate-100 dark:border-slate-800 space-y-4 text-xs">
                    <div class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-950/80 text-blue-600 dark:text-sky-400 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-slate-400 dark:text-slate-500 block text-[10px] font-mono uppercase">Email</span>
                            <span class="font-semibold">{{ $profile?->email_public ?? 'anang.developer@example.com' }}</span>
                        </div>
                    </div>

                    @if(!empty($profile?->meta['whatsapp']))
                        @php
                            $rawWa = preg_replace('/[^0-9]/', '', (string)$profile->meta['whatsapp']);
                            $cleanWa = str_starts_with($rawWa, '0') ? '62' . substr($rawWa, 1) : $rawWa;
                        @endphp
                        <div class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                            <div class="w-8 h-8 rounded-full bg-emerald-100 dark:bg-emerald-950/80 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.155.57 4.178 1.564 5.928l-1.664 6.088 6.257-1.642c1.705.932 3.659 1.464 5.843 1.464 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12zm0 21.656c-1.921 0-3.707-.566-5.215-1.541l-.374-.241-3.712.973.99-3.618-.264-.421c-1.077-1.714-1.645-3.707-1.645-5.808 0-5.33 4.338-9.667 9.668-9.667 5.33 0 9.668 4.337 9.668 9.667 0 5.33-4.338 9.667-9.668 9.667z"/></svg>
                            </div>
                            <div>
                                <span class="text-slate-400 dark:text-slate-500 block text-[10px] font-mono uppercase">WhatsApp</span>
                                <a href="https://wa.me/{{ $cleanWa }}" target="_blank" rel="noopener noreferrer" class="font-semibold hover:text-emerald-600 transition-colors">
                                    {{ $profile->meta['whatsapp'] }}
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-950/80 text-blue-600 dark:text-sky-400 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                        </div>
                        <div>
                            <span class="text-slate-400 dark:text-slate-500 block text-[10px] font-mono uppercase">GitHub</span>
                            <a href="{{ $profile?->github_url ?? 'https://github.com/AnangML' }}" target="_blank" rel="noopener noreferrer" class="font-semibold hover:text-blue-600 transition-colors">
                                {{ $profile?->github_url ? str_replace(['https://', 'http://', 'www.'], '', $profile->github_url) : 'github.com/AnangML' }}
                            </a>
                        </div>
                    </div>

                    @if($profile?->linkedin_url)
                        <div class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                            <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-950/80 text-blue-600 dark:text-sky-400 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </div>
                            <div>
                                <span class="text-slate-400 dark:text-slate-500 block text-[10px] font-mono uppercase">LinkedIn</span>
                                <a href="{{ $profile->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="font-semibold hover:text-blue-600 transition-colors">
                                    {{ str_replace(['https://', 'http://', 'www.'], '', $profile->linkedin_url) }}
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-950/80 text-blue-600 dark:text-sky-400 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-slate-400 dark:text-slate-500 block text-[10px] font-mono uppercase">Location</span>
                            <span class="font-semibold">{{ $profile?->location ?? 'Tangerang Selatan, Indonesia' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Interactive Form -->
            <div class="lg:col-span-7 p-6 sm:p-8 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-700 shadow-sm">
                
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200 dark:border-emerald-800 text-emerald-800 dark:text-emerald-200 text-xs flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('info'))
                    <div class="mb-6 p-4 rounded-2xl bg-blue-50 dark:bg-blue-950/40 border border-blue-200 dark:border-blue-800 text-blue-800 dark:text-blue-200 text-xs flex items-center gap-3">
                        <svg class="w-5 h-5 text-blue-600 dark:text-sky-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('info') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
                    @csrf

                    <!-- Honeypot anti-spam (hidden from real users) -->
                    <input type="text" name="website_hp" class="hidden" tabindex="-1" autocomplete="off" />

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                                {{ __('portfolio.contact.name_label') }} <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}" 
                                placeholder="{{ __('portfolio.contact.name_placeholder') }}" 
                                required
                                class="w-full px-3.5 py-2.5 rounded-xl border @error('name') border-red-400 @else border-slate-200 dark:border-slate-700 @enderror bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:outline-hidden focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"
                            />
                            @error('name')
                                <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                                {{ __('portfolio.contact.email_label') }} <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                placeholder="{{ __('portfolio.contact.email_placeholder') }}" 
                                required
                                class="w-full px-3.5 py-2.5 rounded-xl border @error('email') border-red-400 @else border-slate-200 dark:border-slate-700 @enderror bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:outline-hidden focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"
                            />
                            @error('email')
                                <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Subject Field -->
                    <div>
                        <label for="subject" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            {{ __('portfolio.contact.subject_label') }}
                        </label>
                        <input 
                            type="text" 
                            id="subject" 
                            name="subject" 
                            value="{{ old('subject') }}" 
                            placeholder="{{ __('portfolio.contact.subject_placeholder') }}" 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:outline-hidden focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"
                        />
                    </div>

                    <!-- Message Field -->
                    <div>
                        <label for="message" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            {{ __('portfolio.contact.message_label') }} <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="message" 
                            name="message" 
                            rows="4" 
                            placeholder="{{ __('portfolio.contact.message_placeholder') }}" 
                            required
                            class="w-full px-3.5 py-2.5 rounded-xl border @error('message') border-red-400 @else border-slate-200 dark:border-slate-700 @enderror bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:outline-hidden focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors resize-none">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-[11px] text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button 
                            type="submit" 
                            class="w-full sm:w-auto px-7 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs shadow-sm shadow-blue-500/20 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 flex items-center justify-center gap-2">
                            <span>{{ __('portfolio.contact.submit_button') }}</span>
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layouts.app>