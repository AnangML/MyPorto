<x-layouts.admin title="Seminar & Pelatihan — Admin CMS">
    <div class="space-y-6">
        
        <!-- Header & Action -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Seminar &amp; Pelatihan
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Kelola riwayat keikutsertaan seminar, sertifikasi, workshop, dan pelatihan vokasi kejuruan IT.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.trainings.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs shadow-sm shadow-blue-500/20 hover:-translate-y-0.5 active:translate-y-0 transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tambah Seminar / Pelatihan</span>
                </a>
            </div>
        </div>

        <!-- Filter & Search Bar -->
        <div class="p-4 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs">
            <form method="GET" action="{{ route('admin.trainings.index') }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                <!-- Search Input -->
                <div class="sm:col-span-2">
                    <label for="search" class="sr-only">Cari</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="search" 
                            id="search" 
                            value="{{ request('search') }}" 
                            placeholder="Cari judul seminar, penyelenggara, atau lokasi..." 
                            class="w-full pl-9 pr-3 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200"
                        >
                    </div>
                </div>

                <!-- Sub Vocation Filter Dropdown -->
                <div>
                    <select 
                        name="sub_vocation" 
                        onchange="this.form.submit()" 
                        class="w-full px-3 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200"
                    >
                        <option value="">Semua Sub Kejuruan</option>
                        @foreach($subVocations as $key => $sub)
                            <option value="{{ $key }}" {{ request('sub_vocation') === $key ? 'selected' : '' }}>
                                {{ $sub['combined'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Type Filter Dropdown -->
                <div class="flex items-center gap-2">
                    <select 
                        name="type" 
                        onchange="this.form.submit()" 
                        class="w-full px-3 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200"
                    >
                        <option value="">Semua Jenis</option>
                        @foreach($types as $key => $typeData)
                            <option value="{{ $key }}" {{ request('type') === $key ? 'selected' : '' }}>
                                {{ $typeData['id'] }}
                            </option>
                        @endforeach
                    </select>

                    @if(request('search') || request('sub_vocation') || request('type'))
                        <a href="{{ route('admin.trainings.index') }}" class="p-2 text-xs text-slate-400 hover:text-red-500 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800" title="Reset Filter">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Data Table -->
        <div class="bg-white dark:bg-[#1E293B] rounded-3xl border border-slate-200/90 dark:border-slate-800 shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 dark:bg-[#0F172A]/50 text-slate-500 font-mono uppercase tracking-wider text-[10px] border-b border-slate-100 dark:border-slate-800">
                        <tr>
                            <th class="p-4">Kegiatan &amp; Penyelenggara</th>
                            <th class="p-4">Kejuruan / Sub Kejuruan</th>
                            <th class="p-4">Lokasi &amp; Tanggal</th>
                            <th class="p-4">Sertifikat</th>
                            <th class="p-4">Status</th>
                            <th class="p-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        @forelse($trainings as $item)
                            <tr class="hover:bg-slate-50/60 dark:hover:bg-slate-800/40 transition-colors">
                                <!-- Title & Organizer -->
                                <td class="p-4 max-w-xs">
                                    <div class="flex items-start gap-2">
                                        <span class="px-2 py-0.5 rounded-md text-[10px] font-semibold uppercase tracking-wider shrink-0 
                                            {{ $item->type === 'certification' ? 'bg-amber-50 text-amber-700 dark:bg-amber-950/60 dark:text-amber-300 border border-amber-200/60' : 
                                               ($item->type === 'seminar' ? 'bg-blue-50 text-blue-700 dark:bg-blue-950/60 dark:text-blue-300 border border-blue-200/60' : 
                                               'bg-indigo-50 text-indigo-700 dark:bg-indigo-950/60 dark:text-indigo-300 border border-indigo-200/60') }}">
                                            {{ $item->type_label }}
                                        </span>
                                    </div>
                                    <span class="font-bold text-slate-800 dark:text-slate-200 block text-xs mt-1.5 leading-snug">
                                        {{ $item->title_id }}
                                    </span>
                                    @if($item->title_en && $item->title_en !== $item->title_id)
                                        <span class="text-slate-400 text-[11px] italic block">
                                            {{ $item->title_en }}
                                        </span>
                                    @endif
                                    <span class="text-slate-500 dark:text-slate-400 text-[11px] block mt-1 flex items-center gap-1.5 font-medium">
                                        <svg class="w-3.5 h-3.5 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        {{ $item->organizer }}
                                    </span>
                                </td>

                                <!-- Kejuruan & Sub Kejuruan -->
                                <td class="p-4">
                                    <span class="text-[11px] font-semibold text-slate-700 dark:text-slate-300 block mb-1">
                                        {{ $item->vocation }}
                                    </span>
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-medium bg-blue-50 text-blue-700 dark:bg-blue-950/60 dark:text-sky-300 border border-blue-200/60">
                                        <svg class="w-2.5 h-2.5 shrink-0" fill="currentColor" viewBox="0 0 8 8">
                                            <circle cx="4" cy="4" r="3" />
                                        </svg>
                                        {{ $item->sub_vocation_combined }}
                                    </span>
                                </td>

                                <!-- Location & Date -->
                                <td class="p-4">
                                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300 text-[11px]">
                                        @if($item->location_type === 'online')
                                            <svg class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            <span class="font-medium text-emerald-600 dark:text-emerald-400">
                                                {{ $item->location_display }}
                                            </span>
                                        @else
                                            <svg class="w-3.5 h-3.5 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span>{{ $item->location_display }}</span>
                                        @endif
                                    </div>
                                    <span class="font-mono text-[11px] text-slate-400 block mt-1">
                                        {{ $item->start_date->format('d M Y') }}
                                        @if($item->end_date && $item->end_date->ne($item->start_date))
                                            — {{ $item->end_date->format('d M Y') }}
                                        @endif
                                    </span>
                                </td>

                                <!-- Certificate -->
                                <td class="p-4">
                                    @if($item->certificate_url_resolved)
                                        <a href="{{ $item->certificate_url_resolved }}" target="_blank" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[10px] font-semibold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-300 border border-emerald-200/60 hover:bg-emerald-100 transition-colors">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <span>Lihat Bukti</span>
                                        </a>
                                    @else
                                        <span class="text-slate-400 text-[11px] italic">Tidak ada</span>
                                    @endif
                                </td>

                                <!-- Visibility -->
                                <td class="p-4">
                                    @if($item->is_visible)
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-300 border border-emerald-200/60">
                                            Tampil
                                        </span>
                                    @else
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-medium bg-slate-100 text-slate-500 dark:bg-slate-800">
                                            Disembunyikan
                                        </span>
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td class="p-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.trainings.edit', $item->id) }}" class="p-1.5 rounded-lg text-slate-600 hover:text-blue-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800 transition-colors" title="Edit Data">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form method="POST" action="{{ route('admin.trainings.destroy', $item->id) }}" onsubmit="return confirm('Hapus seminar/pelatihan {{ addslashes($item->title_id) }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-950/40 transition-colors" title="Hapus Data">
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
                                <td colspan="6" class="p-12 text-center">
                                    <div class="max-w-xs mx-auto">
                                        <div class="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-sky-400 flex items-center justify-center mx-auto mb-3">
                                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                            </svg>
                                        </div>
                                        <h3 class="font-bold text-sm text-slate-800 dark:text-slate-200">Belum Ada Seminar atau Pelatihan</h3>
                                        <p class="text-xs text-slate-400 mt-1 mb-4">Tambahkan sertifikat seminar, webinar, atau pelatihan IT yang pernah kamu ikuti.</p>
                                        <a href="{{ route('admin.trainings.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-600 text-white font-semibold text-xs shadow-sm">
                                            Input Pelatihan Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($trainings->hasPages())
                <div class="p-4 border-t border-slate-100 dark:border-slate-800">
                    {{ $trainings->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.admin>

