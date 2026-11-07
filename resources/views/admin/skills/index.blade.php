<x-layouts.admin title="Skills Matrix — Admin CMS">
    <div class="space-y-6">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Skills &amp; Engineering Matrix
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Kelola keahlian teknis, spesialisasi backend, database, dan tools yang tampil di section About.
                </p>
            </div>

            <a href="{{ route('admin.skills.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs shadow-sm shadow-blue-500/20 hover:-translate-y-0.5 active:translate-y-0 transition-all">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Skill</span>
            </a>
        </div>

        @php
            $catLabels = [
                'backend' => 'Backend & Architecture',
                'database' => 'Databases & Storage',
                'frontend' => 'Frontend & Styling',
                'tools' => 'DevOps & Tools',
                'other' => 'Other / Miscellaneous',
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach(['backend', 'database', 'frontend', 'tools'] as $categoryKey)
                <div class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100 dark:border-slate-800">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                                <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                                    {{ $catLabels[$categoryKey] ?? ucfirst($categoryKey) }}
                                </h2>
                            </div>
                            <span class="text-[11px] font-mono text-slate-400">
                                {{ count($skills[$categoryKey] ?? []) }} items
                            </span>
                        </div>

                        <ul class="divide-y divide-slate-100 dark:divide-slate-800/80">
                            @forelse($skills[$categoryKey] ?? [] as $skill)
                                <li class="py-2.5 flex items-center justify-between gap-3 text-xs">
                                    <div class="truncate">
                                        <span class="font-semibold text-slate-800 dark:text-slate-200 block truncate">
                                            {{ $skill->name }}
                                        </span>
                                        @if($skill->description_id || $skill->description_en)
                                            <span class="text-[11px] text-slate-400 block truncate font-mono">
                                                {{ $skill->description_id ?: $skill->description_en }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="flex items-center gap-2 shrink-0">
                                        @if($skill->is_visible)
                                            <span class="px-2 py-0.5 rounded-full text-[9px] font-mono bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-300">
                                                Visible
                                            </span>
                                        @else
                                            <span class="px-2 py-0.5 rounded-full text-[9px] font-mono bg-slate-100 text-slate-400 dark:bg-slate-800">
                                                Hidden
                                            </span>
                                        @endif

                                        <a href="{{ route('admin.skills.edit', $skill->id) }}" class="p-1 rounded text-slate-400 hover:text-blue-600 transition-colors" title="Edit Skill">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form method="POST" action="{{ route('admin.skills.destroy', $skill->id) }}" onsubmit="return confirm('Hapus skill {{ $skill->name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1 rounded text-slate-400 hover:text-red-600 transition-colors" title="Hapus Skill">
                                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @empty
                                <li class="py-4 text-center text-slate-400 text-xs">
                                    Belum ada skill di kategori ini.
                                </li>
                            @endforelse
                        </ul>
                    </div>

                    <div class="pt-4 mt-3 border-t border-slate-100 dark:border-slate-800 text-right">
                        <a href="{{ route('admin.skills.create') }}?category={{ $categoryKey }}" class="text-xs font-semibold text-blue-600 dark:text-sky-400 hover:underline">
                            + Tambah ke {{ $catLabels[$categoryKey] }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-layouts.admin>

