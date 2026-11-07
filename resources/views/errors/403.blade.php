<x-layouts.app title="403 — Akses Ditolak">
    <div class="min-h-[70vh] flex flex-col items-center justify-center text-center px-4 py-16">
        <span class="font-mono text-sm font-bold text-red-600 dark:text-red-400 uppercase tracking-widest px-3.5 py-1.5 rounded-full bg-red-50 dark:bg-red-950/60 border border-red-200/60 mb-6">
            Error 403
        </span>

        <h1 class="text-4xl sm:text-6xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
            Akses Ditolak
        </h1>

        <p class="text-sm sm:text-base text-slate-500 dark:text-slate-400 max-w-md mt-4 leading-relaxed">
            Anda tidak memiliki izin akses untuk membuka halaman atau direktori ini.
        </p>

        <div class="mt-8 flex items-center gap-4">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-[#0F172A] hover:bg-slate-800 text-white font-medium text-xs shadow-md transition-all hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </div>
</x-layouts.app>

