<x-layouts.app title="404 — Halaman Tidak Ditemukan">
    <div class="min-h-[70vh] flex flex-col items-center justify-center text-center px-4 py-16">
        <span class="font-mono text-sm font-bold text-blue-600 dark:text-sky-400 uppercase tracking-widest px-3.5 py-1.5 rounded-full bg-blue-50 dark:bg-blue-950/60 border border-blue-200/60 mb-6">
            Error 404
        </span>

        <h1 class="text-4xl sm:text-6xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
            Halaman Tidak Ditemukan
        </h1>

        <p class="text-sm sm:text-base text-slate-500 dark:text-slate-400 max-w-md mt-4 leading-relaxed">
            Halaman atau tautan yang Anda cari mungkin telah dipindahkan, dihapus, atau belum dipublikasikan.
        </p>

        <div class="mt-8 flex items-center gap-4">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-medium text-xs shadow-md shadow-blue-500/25 transition-all hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </div>
</x-layouts.app>

