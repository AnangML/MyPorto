<x-layouts.admin title="Manajemen Artikel & Catatan — Admin CMS">
    <div class="space-y-6">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Manajemen Artikel &amp; Engineering Notes
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Kelola artikel teknis, catatan arsitektur, dan tulisan yang dipublikasikan ke portofolio.
                </p>
            </div>

            <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs shadow-sm shadow-blue-500/20 hover:-translate-y-0.5 active:translate-y-0 transition-all">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tulis Artikel Baru</span>
            </a>
        </div>

        <div class="bg-white dark:bg-[#1E293B] rounded-3xl border border-slate-200/90 dark:border-slate-800 shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 dark:bg-[#0F172A]/50 text-slate-500 font-mono uppercase tracking-wider text-[10px] border-b border-slate-100 dark:border-slate-800">
                        <tr>
                            <th class="p-4">Judul Artikel</th>
                            <th class="p-4">Kategori</th>
                            <th class="p-4">Estimasi Baca</th>
                            <th class="p-4">Status &amp; Tanggal</th>
                            <th class="p-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        @forelse($posts as $post)
                            <tr class="hover:bg-slate-50/60 dark:hover:bg-slate-800/40 transition-colors">
                                <td class="p-4">
                                    <div class="flex items-center gap-3">
                                        @if($post->cover_image_url)
                                            <img src="{{ $post->cover_image_url }}" alt="{{ $post->title_id }}" class="w-14 h-9 rounded-lg object-cover border border-slate-200 dark:border-slate-700 shrink-0 bg-slate-100 dark:bg-slate-800">
                                        @else
                                            <div class="w-14 h-9 rounded-lg bg-blue-50 dark:bg-blue-950/40 border border-blue-200/60 dark:border-blue-900/40 flex items-center justify-center text-blue-600 dark:text-sky-400 shrink-0">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="min-w-0">
                                            <a href="{{ route('posts.show', $post->slug) }}" target="_blank" class="font-bold text-slate-800 dark:text-slate-200 hover:text-blue-600 dark:hover:text-sky-400 block truncate">
                                                {{ $post->title_id }}
                                            </a>
                                            <span class="text-slate-400 text-[11px] block mt-0.5 font-mono truncate">
                                                /blog/{{ $post->slug }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div class="flex flex-wrap gap-1">
                                        @forelse($post->categories as $category)
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-mono bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300">
                                                {{ $category->name }}
                                            </span>
                                        @empty
                                            <span class="text-slate-400 text-[11px]">—</span>
                                        @endforelse
                                    </div>
                                </td>
                                <td class="p-4 font-mono text-slate-500">
                                    {{ $post->reading_time }}
                                </td>
                                <td class="p-4">
                                    <div class="space-y-1">
                                        @if($post->status === 'published')
                                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-300 border border-emerald-200/60 inline-block">
                                                Published
                                            </span>
                                        @elseif($post->status === 'draft')
                                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-amber-50 text-amber-700 dark:bg-amber-950/60 dark:text-amber-300 border border-amber-200/60 inline-block">
                                                Draft
                                            </span>
                                        @else
                                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-400 inline-block">
                                                Archived
                                            </span>
                                        @endif
                                        <span class="text-[10px] text-slate-400 font-mono block">
                                            {{ $post->published_at ? $post->published_at->format('d M Y') : 'Belum tayang' }}
                                        </span>
                                    </div>
                                </td>
                                <td class="p-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('posts.show', $post->slug) }}" target="_blank" class="p-1.5 rounded-lg text-slate-500 hover:text-blue-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800 transition-colors" title="Lihat di Web">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                        </a>

                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="p-1.5 rounded-lg text-slate-600 hover:text-blue-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800 transition-colors" title="Edit Artikel">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 rounded-lg text-slate-600 hover:text-red-600 hover:bg-red-50 dark:text-slate-400 dark:hover:bg-slate-800 transition-colors" title="Hapus Artikel">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-slate-400">
                                    Belum ada artikel atau catatan rekayasa. Klik tombol "Tulis Artikel Baru" di atas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($posts->hasPages())
                <div class="p-4 border-t border-slate-100 dark:border-slate-800">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.admin>

