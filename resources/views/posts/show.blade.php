<x-layouts.app :title="$post->title . ' — Anang Muhamad Lutfi'">
    <article class="px-2 sm:px-6 lg:px-8 pt-20 sm:pt-24 pb-16 max-w-3xl mx-auto">
        
        <!-- Navigation Back Link -->
        <div class="mb-8">
            <a href="{{ route('home') }}#blog" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-400 transition-colors group">
                <svg class="w-4 h-4 transition-transform duration-200 group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali ke Engineering Notes</span>
            </a>
        </div>

        <!-- Article Header -->
        <header class="mb-10 reveal-on-scroll">
            <div class="flex flex-wrap items-center gap-2 mb-4 text-xs font-mono">
                @foreach($post->categories as $category)
                    <span class="px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 border border-blue-200/60 dark:border-blue-800/60 font-medium">
                        {{ $category->name }}
                    </span>
                @endforeach
                
                @if($post->published_at)
                    <span class="text-slate-400 dark:text-slate-500">
                        &bull; {{ $post->published_at->format('d M Y') }}
                    </span>
                @endif

                <span class="text-slate-400 dark:text-slate-500">
                    &bull; {{ $post->reading_time }}
                </span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC] leading-tight">
                {{ $post->title }}
            </h1>

            @if($post->excerpt)
                <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 mt-4 leading-relaxed font-normal border-l-2 border-blue-500 pl-4 py-1 italic bg-blue-50/30 dark:bg-blue-950/20 rounded-r-xl">
                    {{ $post->excerpt }}
                </p>
            @endif
        </header>

        <!-- Cover Image (If Uploaded) -->
        @if($post->cover_image_url)
            <div class="mb-10 rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-800 aspect-video bg-slate-100 dark:bg-slate-900 shadow-sm">
                <img src="{{ $post->cover_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        <!-- Article Body Content -->
        <div class="prose prose-slate dark:prose-invert max-w-none text-slate-700 dark:text-slate-300 leading-relaxed text-sm sm:text-base space-y-6 pt-2 pb-12 border-b border-slate-100 dark:border-slate-800 whitespace-pre-line">
            {{ $post->content }}
        </div>

        <!-- Related Notes / Bottom Explore -->
        @if($relatedPosts->isNotEmpty())
            <div class="mt-12 pt-6">
                <h3 class="text-base font-bold text-[#0F172A] dark:text-[#F8FAFC] mb-5">
                    Catatan Arsitektur Terkait
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($relatedPosts as $rel)
                        <a href="{{ route('posts.show', $rel->slug) }}" class="p-5 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 hover:border-blue-400 dark:hover:border-blue-500 transition-all hover:-translate-y-1 block shadow-xs group">
                            <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 font-medium">
                                {{ $rel->categories->first()?->name ?? 'Note' }}
                            </span>
                            <h4 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors mt-2 leading-snug">
                                {{ $rel->title }}
                            </h4>
                            <span class="text-[11px] font-mono text-slate-400 mt-2 block">
                                {{ $rel->reading_time }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </article>
</x-layouts.app>

