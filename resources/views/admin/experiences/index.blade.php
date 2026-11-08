<x-layouts.admin title="Manajemen Pengalaman — Admin CMS">
    <div class="space-y-6">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Pengalaman Kerja &amp; Pendidikan
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Kelola riwayat profesional, institusi pendidikan, dan peran teknis yang tampil di timeline.
                </p>
            </div>

            <a href="{{ route('admin.experiences.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs shadow-sm shadow-blue-500/20 hover:-translate-y-0.5 active:translate-y-0 transition-all">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Pengalaman</span>
            </a>
        </div>

        <div class="bg-white dark:bg-[#1E293B] rounded-3xl border border-slate-200/90 dark:border-slate-800 shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 dark:bg-[#0F172A]/50 text-slate-500 font-mono uppercase tracking-wider text-[10px] border-b border-slate-100 dark:border-slate-800">
                        <tr>
                            <th class="p-4">Posisi &amp; Organisasi</th>
                            <th class="p-4">Tipe &amp; Lokasi</th>
                            <th class="p-4">Periode</th>
                            <th class="p-4">Status</th>
                            <th class="p-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        @forelse($experiences as $exp)
                            <tr class="hover:bg-slate-50/60 dark:hover:bg-slate-800/40 transition-colors">
                                <td class="p-4">
                                    <span class="font-bold text-slate-800 dark:text-slate-200 block">
                                        {{ $exp->position_id }}
                                    </span>
                                    <span class="text-slate-400 text-[11px] block mt-0.5">
                                        {{ $exp->organization }}
                                    </span>
                                </td>
                                <td class="p-4 text-slate-600 dark:text-slate-300">
                                    <span class="block">{{ $exp->employment_type ?? 'Career' }}</span>
                                    <span class="text-slate-400 text-[11px] flex items-center gap-1.5 mt-0.5">
                                        @if($exp->location_type === 'online')
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse shrink-0"></span>
                                        @elseif($exp->location_type === 'international')
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500 shrink-0"></span>
                                        @endif
                                        <span>{{ $exp->location_display }}</span>
                                    </span>
                                </td>
                                <td class="p-4 font-mono text-[11px] text-blue-600 dark:text-sky-400 font-semibold">
                                    {{ $exp->started_at->format('M Y') }} — {{ $exp->is_current ? 'Sekarang (Aktif)' : ($exp->ended_at ? $exp->ended_at->format('M Y') : '—') }}
                                </td>
                                <td class="p-4">
                                    @if($exp->is_visible)
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-300 border border-emerald-200/60">
                                            Visible
                                        </span>
                                    @else
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-medium bg-slate-100 text-slate-500 dark:bg-slate-800">
                                            Hidden
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.experiences.edit', $exp->id) }}" class="p-1.5 rounded-lg text-slate-600 hover:text-blue-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800 transition-colors" title="Edit Pengalaman">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form method="POST" action="{{ route('admin.experiences.destroy', $exp->id) }}" onsubmit="return confirm('Hapus pengalaman {{ $exp->organization }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-950/40 transition-colors" title="Hapus Pengalaman">
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
                                    Belum ada data pengalaman kerja / pendidikan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($experiences->hasPages())
                <div class="p-4 border-t border-slate-100 dark:border-slate-800">
                    {{ $experiences->links() }}
                </div>
            @endif
        </div>

    </div>
</x-layouts.admin>

