<x-layouts.admin title="Kotak Pesan Masuk — Admin CMS">
    <div class="space-y-6">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Kotak Pesan Masuk (Inbox)
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Daftar pertanyaan, penawaran proyek, dan pesan yang dikirimkan melalui formulir kontak portofolio.
                </p>
            </div>

            <!-- Status Filter Tabs -->
            <div class="flex flex-wrap items-center gap-1.5 p-1 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200 dark:border-slate-800 text-xs">
                <a href="{{ route('admin.messages.index') }}" class="px-3 py-1.5 rounded-xl transition-colors {{ $status === 'all' ? 'bg-blue-600 text-white font-semibold shadow-xs' : 'text-slate-600 dark:text-slate-400 hover:text-blue-600' }}">
                    Semua ({{ $counts['all'] }})
                </a>
                <a href="{{ route('admin.messages.index', ['status' => 'new']) }}" class="px-3 py-1.5 rounded-xl transition-colors {{ $status === 'new' ? 'bg-blue-600 text-white font-semibold shadow-xs' : 'text-slate-600 dark:text-slate-400 hover:text-blue-600' }}">
                    Baru ({{ $counts['new'] }})
                </a>
                <a href="{{ route('admin.messages.index', ['status' => 'read']) }}" class="px-3 py-1.5 rounded-xl transition-colors {{ $status === 'read' ? 'bg-blue-600 text-white font-semibold shadow-xs' : 'text-slate-600 dark:text-slate-400 hover:text-blue-600' }}">
                    Dibaca ({{ $counts['read'] }})
                </a>
                <a href="{{ route('admin.messages.index', ['status' => 'replied']) }}" class="px-3 py-1.5 rounded-xl transition-colors {{ $status === 'replied' ? 'bg-blue-600 text-white font-semibold shadow-xs' : 'text-slate-600 dark:text-slate-400 hover:text-blue-600' }}">
                    Dibalas ({{ $counts['replied'] }})
                </a>
            </div>
        </div>

        <div class="bg-white dark:bg-[#1E293B] rounded-3xl border border-slate-200/90 dark:border-slate-800 shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 dark:bg-[#0F172A]/50 text-slate-500 font-mono uppercase tracking-wider text-[10px] border-b border-slate-100 dark:border-slate-800">
                        <tr>
                            <th class="p-4">Pengirim</th>
                            <th class="p-4">Subjek &amp; Pesan</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Diterima</th>
                            <th class="p-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        @forelse($messages as $msg)
                            <tr class="hover:bg-slate-50/60 dark:hover:bg-slate-800/40 transition-colors {{ $msg->status === 'new' ? 'bg-blue-50/20 dark:bg-blue-950/20 font-semibold' : '' }}">
                                <td class="p-4">
                                    <span class="font-bold text-slate-800 dark:text-slate-200 block">
                                        {{ $msg->name }}
                                    </span>
                                    <span class="text-slate-400 text-[11px] block mt-0.5 font-mono">
                                        {{ $msg->email }}
                                    </span>
                                </td>
                                <td class="p-4 max-w-sm">
                                    <span class="font-semibold text-slate-700 dark:text-slate-300 block truncate">
                                        {{ $msg->subject ?: '(Tanpa Subjek)' }}
                                    </span>
                                    <span class="text-slate-400 text-[11px] block truncate font-normal">
                                        {{ $msg->message }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    @if($msg->status === 'new')
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-50 text-blue-700 dark:bg-blue-950/60 dark:text-blue-300 border border-blue-200/60">
                                            Baru
                                        </span>
                                    @elseif($msg->status === 'replied')
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-300 border border-emerald-200/60">
                                            Dibalas
                                        </span>
                                    @else
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-medium bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-400">
                                            Dibaca
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4 font-mono text-[11px] text-slate-500">
                                    {{ $msg->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="p-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.messages.show', $msg->id) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-950/60 dark:text-sky-400 font-medium hover:bg-blue-100 transition-colors">
                                            <span>Buka</span>
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>

                                        <form method="POST" action="{{ route('admin.messages.destroy', $msg->id) }}" onsubmit="return confirm('Hapus pesan dari {{ $msg->name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-950/40 transition-colors" title="Hapus Pesan">
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
                                    Tidak ada pesan di kategori ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($messages->hasPages())
                <div class="p-4 border-t border-slate-100 dark:border-slate-800">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>

    </div>
</x-layouts.admin>

