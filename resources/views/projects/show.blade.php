<x-layouts.app :title="$project->title . ' — Anang Muhamad Lutfi'">
    <article class="px-2 sm:px-6 lg:px-8 py-8 sm:py-12 max-w-4xl mx-auto">
        
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
    </article>
</x-layouts.app>

