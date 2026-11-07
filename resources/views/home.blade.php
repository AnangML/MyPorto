<x-layouts.app>
    <!-- Hero Section -->
    <x-hero :profile="$profile" />

    <!-- Featured Projects Showcase (Dynamic from PostgreSQL) -->
    <section id="work" class="px-2 sm:px-6 lg:px-8 py-14 border-t border-slate-100 dark:border-slate-800/80 reveal-on-scroll">
        <div class="flex items-center justify-between mb-8">
            <div>
                <span class="text-xs font-mono uppercase tracking-wider text-blue-600 dark:text-sky-400 font-semibold">Featured Work</span>
                <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC] mt-1">
                    Projects Showcase
                </h2>
            </div>
            <a href="https://github.com/AnangML" target="_blank" rel="noopener noreferrer" class="text-xs font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 flex items-center gap-1 transition-colors">
                Explore All on GitHub ↗
            </a>
        </div>

        <!-- Project Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($projects as $project)
                <div class="group rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-700/80 p-5 shadow-xs hover:shadow-xl hover:shadow-blue-500/5 hover:border-blue-300 dark:hover:border-blue-500/60 transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
                    <div>
                        <!-- Project Header / Visual Anchor -->
                        <div class="aspect-video rounded-xl bg-gradient-to-br from-slate-50 via-blue-50/30 to-sky-50/40 dark:from-[#0F172A] dark:via-[#131F33] dark:to-[#0F172A] border border-slate-100 dark:border-slate-800 mb-4 overflow-hidden relative flex items-center justify-center p-4">
                            <div class="text-center">
                                <span class="font-mono text-xs font-semibold text-blue-600 dark:text-sky-400 uppercase tracking-widest block">
                                    {{ $project->categories->first()?->name ?? 'System' }}
                                </span>
                                <span class="text-[11px] text-slate-400 dark:text-slate-500 mt-1 block">
                                    {{ $project->role ?? 'Backend Architecture' }}
                                </span>
                            </div>
                        </div>

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
                            {{ $project->title }}
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1.5 line-clamp-3 leading-relaxed">
                            {{ $project->summary }}
                        </p>
                    </div>

                    <!-- Links / Actions -->
                    <div class="pt-5 mt-4 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between text-xs font-medium">
                        @if($project->repository_url)
                            <a href="{{ $project->repository_url }}" target="_blank" rel="noopener noreferrer" class="text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-sky-400 flex items-center gap-1 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                                <span>Code</span>
                            </a>
                        @endif

                        @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer" class="text-blue-600 dark:text-sky-400 hover:text-blue-700 font-semibold flex items-center gap-1 transition-colors">
                                <span>Demo</span>
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-slate-400 text-sm">
                    No projects found.
                </div>
            @endforelse
        </div>
    </section>

    <!-- Skills & Technology Matrix -->
    <section id="about" class="px-2 sm:px-6 lg:px-8 py-14 border-t border-slate-100 dark:border-slate-800/80 reveal-on-scroll">
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
</x-layouts.app>
