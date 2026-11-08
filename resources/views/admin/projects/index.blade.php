<x-layouts.admin title="Manajemen Proyek — Admin CMS">
    <div class="space-y-6">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Manajemen Proyek &amp; Studi Kasus
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Kelola portofolio sistem, aplikasi web, dan arsitektur backend yang ditampilkan ke publik.
                </p>
            </div>

            <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs shadow-sm shadow-blue-500/20 hover:-translate-y-0.5 active:translate-y-0 transition-all">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Proyek Baru</span>
            </a>
        </div>

        <div class="bg-white dark:bg-[#1E293B] rounded-3xl border border-slate-200/90 dark:border-slate-800 shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 dark:bg-[#0F172A]/50 text-slate-500 font-mono uppercase tracking-wider text-[10px] border-b border-slate-100 dark:border-slate-800">
                        <tr>
                            <th class="p-4">Proyek &amp; Peran</th>
                            <th class="p-4">Kategori &amp; Stack</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Featured</th>
                            <th class="p-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        @forelse($projects as $project)
                            <tr class="hover:bg-slate-50/60 dark:hover:bg-slate-800/40 transition-colors">
                                <td class="p-4">
                                    <div class="flex items-center gap-3">
                                        @if($project->cover_image_url)
                                            <img src="{{ $project->cover_image_url }}" alt="{{ $project->title_id }}" class="w-14 h-9 rounded-lg object-cover border border-slate-200 dark:border-slate-700 shrink-0 bg-slate-100 dark:bg-slate-800">
                                        @else
                                            <div class="w-14 h-9 rounded-lg bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-400 shrink-0" title="Belum ada foto tampilan">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="min-w-0">
                                            <a href="{{ route('projects.show', $project->slug) }}" target="_blank" class="font-bold text-slate-800 dark:text-slate-200 hover:text-blue-600 dark:hover:text-sky-400 block truncate">
                                                {{ $project->title_id }}
                                            </a>
                                            <span class="text-slate-400 text-[11px] block mt-0.5 font-mono truncate">
                                                {{ $project->role_id ?? 'Backend Architecture' }} &bull; /projects/{{ $project->slug }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div class="flex flex-wrap gap-1 mb-1">
                                        @foreach($project->categories as $category)
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-mono bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300">
                                                {{ $category->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($project->technologies->take(3) as $tech)
                                            <span class="px-1.5 py-0.5 rounded text-[9px] font-mono bg-slate-100 dark:bg-slate-800 text-slate-500">
                                                {{ $tech->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="p-4">
                                    @if($project->status === 'published')
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-300 border border-emerald-200/60">
                                            Published
                                        </span>
                                    @elseif($project->status === 'draft')
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-medium bg-amber-50 text-amber-700 dark:bg-amber-950/60 dark:text-amber-300 border border-amber-200/60">
                                            Draft
                                        </span>
                                    @else
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-medium bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-400">
                                            Archived
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    @if($project->is_featured)
                                        <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-blue-600 dark:text-sky-400">
                                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                                <path d="M12 2l2.4 7.2h7.6l-6.1 4.5 2.3 7.3-6.2-4.6-6.2 4.6 2.3-7.3-6.1-4.5h7.6z"/>
                                            </svg>
                                            <span>Ya</span>
                                        </span>
                                    @else
                                        <span class="text-slate-300 dark:text-slate-600">—</span>
                                    @endif
                                </td>
                                <td class="p-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="p-1.5 rounded-lg text-slate-600 hover:text-blue-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800 transition-colors" title="Edit Proyek">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-950/40 transition-colors" title="Hapus Proyek">
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
                                <td colspan="5" class="p-8 text-center text-slate-400 text-xs">
                                    Belum ada proyek yang terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($projects->hasPages())
                <div class="p-4 border-t border-slate-100 dark:border-slate-800">
                    {{ $projects->links() }}
                </div>
            @endif
        </div>

    </div>
</x-layouts.admin>

