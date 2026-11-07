<x-layouts.admin title="Detail Pesan — Admin CMS">
    <div class="max-w-3xl space-y-6">
        
        <div class="flex items-center justify-between pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Pesan dari {{ $message->name }}
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Diterima pada {{ $message->created_at->format('d F Y \p\u\k\u\l H:i') }} ({{ $message->created_at->diffForHumans() }})
                </p>
            </div>

            <a href="{{ route('admin.messages.index') }}" class="text-xs font-semibold text-slate-500 hover:text-blue-600 transition-colors">
                &larr; Kembali ke Inbox
            </a>
        </div>

        <!-- Sender Card & Status Controls -->
        <div class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-6">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-100 dark:border-slate-800">
                <div class="space-y-1">
                    <span class="text-[10px] font-mono uppercase text-slate-400 block">Pengirim</span>
                    <span class="text-base font-bold text-[#0F172A] dark:text-[#F8FAFC] block">
                        {{ $message->name }}
                    </span>
                    <a href="mailto:{{ $message->email }}?subject=Re:%20{{ rawurlencode($message->subject ?? 'Inquiry Portofolio') }}" class="text-xs font-mono text-blue-600 dark:text-sky-400 hover:underline inline-flex items-center gap-1">
                        <span>{{ $message->email }}</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>

                <!-- Status Updater Form -->
                <form method="POST" action="{{ route('admin.messages.status', $message->id) }}" class="flex items-center gap-2">
                    @csrf
                    @method('PATCH')
                    
                    <label for="status" class="text-xs font-medium text-slate-500">Status:</label>
                    <select name="status" id="status" onchange="this.form.submit()" class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-[#0F172A] text-xs font-medium text-slate-800 dark:text-white">
                        <option value="new" {{ $message->status === 'new' ? 'selected' : '' }}>Baru</option>
                        <option value="read" {{ $message->status === 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
                        <option value="replied" {{ $message->status === 'replied' ? 'selected' : '' }}>Sudah Dibalas</option>
                        <option value="archived" {{ $message->status === 'archived' ? 'selected' : '' }}>Diarsipkan</option>
                    </select>
                </form>
            </div>

            <!-- Subject -->
            <div>
                <span class="text-[10px] font-mono uppercase text-slate-400 block mb-1">Subjek</span>
                <p class="text-sm font-semibold text-slate-800 dark:text-slate-200">
                    {{ $message->subject ?: '(Tidak ada subjek yang dicantumkan)' }}
                </p>
            </div>

            <!-- Full Body -->
            <div>
                <span class="text-[10px] font-mono uppercase text-slate-400 block mb-2">Isi Pesan</span>
                <div class="p-5 rounded-2xl bg-slate-50 dark:bg-[#0F172A] border border-slate-100 dark:border-slate-800 text-xs sm:text-sm text-slate-700 dark:text-slate-300 leading-relaxed whitespace-pre-line">
                    {{ $message->message }}
                </div>
            </div>

            <!-- Actions Bar -->
            <div class="pt-4 border-t border-slate-100 dark:border-slate-800 flex flex-wrap items-center justify-between gap-3 text-xs">
                <!-- Reply mailto button -->
                <a href="mailto:{{ $message->email }}?subject=Re:%20{{ rawurlencode($message->subject ?? 'Inquiry Portofolio') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-sm shadow-blue-500/20 hover:-translate-y-0.5 active:translate-y-0 transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>Balas Pesan via Email Client</span>
                </a>

                <!-- Delete Message -->
                <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-red-600 hover:bg-red-50 dark:hover:bg-red-950/40 font-semibold transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        <span>Hapus Pesan</span>
                    </button>
                </form>
            </div>
        </div>

    </div>
</x-layouts.admin>

