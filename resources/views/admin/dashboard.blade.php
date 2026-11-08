<x-layouts.admin title="Dashboard — Admin CMS">
    <div class="space-y-8">
        
        <!-- Welcome Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Dashboard Overview
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Selamat datang di pusat kendali portofolio profesional Anang Muhamad Lutfi.
                </p>
            </div>

            <!-- Quick Action Buttons -->
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center gap-2 px-3.5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-xs shadow-sm hover:-translate-y-0.5 active:translate-y-0 transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tulis Artikel</span>
                </a>

                <a href="{{ route('admin.trainings.create') }}" class="inline-flex items-center gap-2 px-3.5 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-white font-semibold text-xs shadow-sm hover:-translate-y-0.5 active:translate-y-0 transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Input Seminar</span>
                </a>

                <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs shadow-sm shadow-blue-500/20 hover:-translate-y-0.5 active:translate-y-0 transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tambah Proyek</span>
                </a>

                <a href="{{ route('admin.profile.edit') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white dark:bg-[#1E293B] border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-200 hover:text-blue-600 font-semibold text-xs shadow-xs hover:-translate-y-0.5 active:translate-y-0 transition-all">
                    <span>Pengaturan Profil</span>
                </a>
            </div>
        </div>

        <!-- Metric Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <!-- Card 1: Projects -->
            <div class="p-5 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400">Total Proyek</span>
                    <span class="p-2 rounded-xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-sky-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </span>
                </div>
                <div class="mt-4 flex items-baseline justify-between">
                    <span class="text-3xl font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                        {{ $stats['total_projects'] }}
                    </span>
                    <span class="text-xs font-mono text-emerald-600 dark:text-emerald-400 font-medium">
                        {{ $stats['published_projects'] }} Published
                    </span>
                </div>
            </div>

            <!-- Card 2: Skills Matrix -->
            <div class="p-5 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400">Skills Matrix</span>
                    <span class="p-2 rounded-xl bg-emerald-50 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138z" />
                        </svg>
                    </span>
                </div>
                <div class="mt-4 flex items-baseline justify-between">
                    <span class="text-3xl font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                        {{ $stats['total_skills'] }}
                    </span>
                    <a href="{{ route('admin.skills.index') }}" class="text-xs text-blue-600 dark:text-sky-400 hover:underline">
                        Kelola Stack &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 3: Experiences -->
            <div class="p-5 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400">Pengalaman</span>
                    <span class="p-2 rounded-xl bg-purple-50 dark:bg-purple-950/60 text-purple-600 dark:text-purple-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                </div>
                <div class="mt-4 flex items-baseline justify-between">
                    <span class="text-3xl font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                        {{ $stats['total_experiences'] }}
                    </span>
                    <a href="{{ route('admin.experiences.index') }}" class="text-xs text-blue-600 dark:text-sky-400 hover:underline">
                        Timeline &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 4: Seminar & Pelatihan -->
            <div class="p-5 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400">Seminar/Pelatihan</span>
                    <span class="p-2 rounded-xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        </svg>
                    </span>
                </div>
                <div class="mt-4 flex items-baseline justify-between">
                    <span class="text-3xl font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                        {{ $stats['total_trainings'] }}
                    </span>
                    <a href="{{ route('admin.trainings.index') }}" class="text-xs text-blue-600 dark:text-sky-400 hover:underline">
                        Kelola &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 5: Artikel & Catatan -->
            <div class="p-5 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400">Artikel &amp; Catatan</span>
                    <span class="p-2 rounded-xl bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </span>
                </div>
                <div class="mt-4 flex items-baseline justify-between">
                    <span class="text-3xl font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                        {{ $stats['total_posts'] ?? 0 }}
                    </span>
                    <a href="{{ route('admin.posts.index') }}" class="text-xs text-blue-600 dark:text-sky-400 hover:underline">
                        Kelola &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 6: Inbox Messages -->
            <div class="p-5 rounded-2xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400">Pesan Masuk</span>
                    <span class="p-2 rounded-xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-sky-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                </div>
                <div class="mt-4 flex items-baseline justify-between">
                    <span class="text-3xl font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                        {{ $stats['total_messages'] }}
                    </span>
                    @if($stats['unread_messages'] > 0)
                        <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-blue-600 text-white animate-pulse">
                            {{ $stats['unread_messages'] }} Baru
                        </span>
                    @else
                        <span class="text-xs text-slate-400 font-mono">
                            Semua terbaca
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Recent Inbound Messages -->
        <div class="bg-white dark:bg-[#1E293B] rounded-3xl border border-slate-200/90 dark:border-slate-800 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                        Pesan Masuk Terbaru
                    </h2>
                    <p class="text-xs text-slate-400 mt-0.5">
                        Inquiries dan pesan yang dikirim melalui formulir kontak publik.
                    </p>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="text-xs font-semibold text-blue-600 dark:text-sky-400 hover:underline">
                    Buka Semua Inbox &rarr;
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 dark:bg-[#0F172A]/50 text-slate-500 font-mono uppercase tracking-wider text-[10px] border-b border-slate-100 dark:border-slate-800">
                        <tr>
                            <th class="p-4">Pengirim</th>
                            <th class="p-4">Subjek &amp; Cuplikan</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Tanggal</th>
                            <th class="p-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        @forelse($recentMessages as $msg)
                            <tr class="hover:bg-slate-50/60 dark:hover:bg-slate-800/40 transition-colors">
                                <td class="p-4">
                                    <span class="font-semibold text-slate-800 dark:text-slate-200 block">
                                        {{ $msg->name }}
                                    </span>
                                    <span class="text-slate-400 text-[11px] block">
                                        {{ $msg->email }}
                                    </span>
                                </td>
                                <td class="p-4 max-w-xs">
                                    <span class="font-medium text-slate-700 dark:text-slate-300 block truncate">
                                        {{ $msg->subject ?: '(Tanpa Subjek)' }}
                                    </span>
                                    <span class="text-slate-400 text-[11px] block truncate">
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
                                <td class="p-4 text-slate-500 font-mono text-[11px]">
                                    {{ $msg->created_at->diffForHumans() }}
                                </td>
                                <td class="p-4 text-right">
                                    <a href="{{ route('admin.messages.show', $msg->id) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-950/60 dark:text-sky-400 font-medium hover:bg-blue-100 transition-colors">
                                        <span>Buka</span>
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-slate-400 text-xs">
                                    Belum ada pesan masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-layouts.admin>

