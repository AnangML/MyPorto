<x-layouts.app>
    <!-- Hero Section -->
    <x-hero :profile="$profile" />

    <!-- About & Engineering Matrix + Background Wrapper -->
    <div id="about" class="scroll-mt-24">
        <!-- Skills & Technology Matrix -->
        <section class="px-2 sm:px-6 lg:px-8 py-14 border-t border-slate-100 dark:border-slate-800/80 reveal-on-scroll">
            <div class="max-w-2xl mb-8">
                <span class="text-xs font-mono uppercase tracking-wider text-blue-600 dark:text-sky-400 font-semibold">Technical Matrix</span>
                <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC] mt-1">
                    Skills &amp; Engineering Stack
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-2">
                    Teknologi dan spesialisasi yang digunakan untuk membangun sistem yang aman, skalabel, dan efisien.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach(['backend' => 'Backend & Architecture', 'database' => 'Databases & Storage', 'frontend' => 'Frontend & Styling', 'tools' => 'DevOps & Tools'] as $key => $title)
                    <div class="p-5 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-700/80 shadow-xs">
                        <h3 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] pb-3 border-b border-slate-100 dark:border-slate-700 flex items-center justify-between">
                            <span>{{ $title }}</span>
                            <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                        </h3>
                        <ul class="mt-4 space-y-2.5">
                            @forelse($skills[$key] ?? [] as $skill)
                                <li class="flex items-start justify-between gap-2 text-xs">
                                    <span class="font-medium text-slate-700 dark:text-slate-200">{{ $skill->name }}</span>
                                    @if($skill->description)
                                        <span class="text-[10px] text-slate-400 dark:text-slate-500 font-mono text-right truncate max-w-[120px]" title="{{ $skill->description }}">
                                            {{ $skill->description }}
                                        </span>
                                    @endif
                                </li>
                            @empty
                                <li class="text-xs text-slate-400">Stack info coming soon</li>
                            @endforelse
                        </ul>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Experiences & Education Timeline -->
        <section class="px-2 sm:px-6 lg:px-8 py-14 border-t border-slate-100 dark:border-slate-800/80 reveal-on-scroll">
            <div class="max-w-2xl mb-8">
                <span class="text-xs font-mono uppercase tracking-wider text-blue-600 dark:text-sky-400 font-semibold">Background</span>
                <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC] mt-1">
                    Experience &amp; Education
                </h2>
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

                        <div class="text-xs font-semibold text-slate-500 dark:text-slate-400 mb-2">
                            {{ $exp->organization }} &bull; {{ $exp->location ?? 'Indonesia' }}
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
    <section id="work" class="scroll-mt-24 px-2 sm:px-6 lg:px-8 py-14 border-t border-slate-100 dark:border-slate-800/80 reveal-on-scroll" x-data="{ activeCategory: 'all' }">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
            <div>
                <span class="text-xs font-mono uppercase tracking-wider text-blue-600 dark:text-sky-400 font-semibold">Featured Work</span>
                <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC] mt-1">
                    Projects &amp; Case Studies
                </h2>
            </div>

            <!-- Category Filter Pills -->
            <div class="flex flex-wrap items-center gap-2">
                <button 
                    type="button"
                    @click="activeCategory = 'all'"
                    :class="activeCategory === 'all' ? 'bg-[#0F172A] text-white dark:bg-white dark:text-[#0F172A]' : 'bg-slate-100 dark:bg-[#1E293B] text-slate-600 dark:text-slate-400 hover:text-[#0F172A] dark:hover:text-white'"
                    class="px-3.5 py-1.5 rounded-full text-xs font-medium transition-all duration-200">
                    {{ __('portfolio.projects.all') }}
                </button>

                @foreach($categories as $category)
                    <button 
                        type="button"
                        @click="activeCategory = '{{ $category->slug }}'"
                        :class="activeCategory === '{{ $category->slug }}' ? 'bg-blue-600 text-white shadow-xs' : 'bg-slate-100 dark:bg-[#1E293B] text-slate-600 dark:text-slate-400 hover:text-[#0F172A] dark:hover:text-white'"
                        class="px-3.5 py-1.5 rounded-full text-xs font-medium transition-all duration-200">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Project Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($projects as $project)
                @php
                    $catSlugs = $project->categories->pluck('slug')->toArray();
                @endphp
                <div 
                    x-show="activeCategory === 'all' || {{ json_encode($catSlugs) }}.includes(activeCategory)"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="group rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-700/80 p-5 shadow-xs hover:shadow-xl hover:shadow-blue-500/5 hover:border-blue-300 dark:hover:border-blue-500/60 transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
                    <div>
                        <!-- Project Header / Visual Anchor -->
                        <a href="{{ route('projects.show', $project->slug) }}" class="block aspect-video rounded-xl bg-gradient-to-br from-slate-50 via-blue-50/30 to-sky-50/40 dark:from-[#0F172A] dark:via-[#131F33] dark:to-[#0F172A] border border-slate-100 dark:border-slate-800 mb-4 overflow-hidden relative flex items-center justify-center p-4 group-hover:border-blue-200 dark:group-hover:border-blue-900 transition-colors">
                            <div class="text-center">
                                <span class="font-mono text-xs font-semibold text-blue-600 dark:text-sky-400 uppercase tracking-widest block">
                                    {{ $project->categories->first()?->name ?? 'System' }}
                                </span>
                                <span class="text-[11px] text-slate-400 dark:text-slate-500 mt-1 block">
                                    {{ $project->role ?? 'Backend Architecture' }}
                                </span>
                            </div>
                        </a>

                        <!-- Category & Tech Stack Tags -->
                        <div class="flex flex-wrap items-center gap-1.5 mb-3">
                            @foreach($project->categories as $category)
                                <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 font-medium">
                                    {{ $category->name }}
                                </span>
                            @endforeach

                            @foreach($project->technologies->take(2) as $tech)
                                <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-slate-100 dark:bg-[#0F172A] text-slate-600 dark:text-slate-400">
                                    {{ $tech->name }}
                                </span>
                            @endforeach
                        </div>

                        <!-- Title & Summary -->
                        <h3 class="text-base font-semibold text-[#0F172A] dark:text-[#F8FAFC] group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                            <a href="{{ route('projects.show', $project->slug) }}">
                                {{ $project->title }}
                            </a>
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1.5 line-clamp-3 leading-relaxed">
                            {{ $project->summary }}
                        </p>
                    </div>

                    <!-- Links / Actions Bar -->
                    <div class="pt-5 mt-4 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between text-xs font-medium">
                        <a href="{{ route('projects.show', $project->slug) }}" class="text-blue-600 dark:text-sky-400 hover:text-blue-700 font-semibold flex items-center gap-1 transition-colors">
                            <span>{{ __('portfolio.projects.view_case_study') }}</span>
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>

                        <div class="flex items-center gap-3">
                            @if($project->repository_url)
                                <a href="{{ $project->repository_url }}" target="_blank" rel="noopener noreferrer" class="text-slate-500 hover:text-blue-600 dark:text-slate-400 dark:hover:text-sky-400 transition-colors" title="Source Code">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                                </a>
                            @endif

                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer" class="text-slate-500 hover:text-blue-600 dark:text-slate-400 dark:hover:text-sky-400 transition-colors" title="Live Demo">
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
            <div class="p-6 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-700/80 shadow-xs hover:border-blue-300 dark:hover:border-blue-500/60 transition-all">
                <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 font-medium">PostgreSQL &bull; Performance</span>
                <h3 class="text-base font-bold text-[#0F172A] dark:text-[#F8FAFC] mt-3 hover:text-blue-600 dark:hover:text-sky-400 transition-colors">
                    Indexing Strategies for High-Volume Relational Queries in Laravel 12
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 leading-relaxed">
                    A deep dive into partial indexes, composite B-Trees, and JSONB query optimization techniques on PostgreSQL.
                </p>
                <div class="mt-4 pt-3 border-t border-slate-100 dark:border-slate-800/80 text-[11px] text-slate-400 font-mono">
                    Coming Soon &bull; 5 min read
                </div>
            </div>

            <div class="p-6 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-700/80 shadow-xs hover:border-blue-300 dark:hover:border-blue-500/60 transition-all">
                <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 font-medium">Backend &bull; Architecture</span>
                <h3 class="text-base font-bold text-[#0F172A] dark:text-[#F8FAFC] mt-3 hover:text-blue-600 dark:hover:text-sky-400 transition-colors">
                    Designing Idempotent Webhook Handlers with Zero Data Loss
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 leading-relaxed">
                    Implementing robust concurrency locks, deduplication keys, and transactional event dispatchers in mission-critical services.
                </p>
                <div class="mt-4 pt-3 border-t border-slate-100 dark:border-slate-800/80 text-[11px] text-slate-400 font-mono">
                    Coming Soon &bull; 7 min read
                </div>
            </div>
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

                    <div class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-950/80 text-blue-600 dark:text-sky-400 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                        </div>
                        <div>
                            <span class="text-slate-400 dark:text-slate-500 block text-[10px] font-mono uppercase">GitHub</span>
                            <a href="https://github.com/AnangML" target="_blank" rel="noopener noreferrer" class="font-semibold hover:text-blue-600 transition-colors">
                                github.com/AnangML
                            </a>
                        </div>
                    </div>

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