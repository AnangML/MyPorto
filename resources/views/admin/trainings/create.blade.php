<x-layouts.admin title="Tambah Seminar & Pelatihan — Admin CMS">
    <div class="space-y-6 max-w-5xl mx-auto">
        
        <!-- Header & Breadcrumbs -->
        <div class="flex items-center justify-between pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <div class="flex items-center gap-2 text-xs text-slate-400 mb-1">
                    <a href="{{ route('admin.trainings.index') }}" class="hover:text-blue-600 transition-colors">Seminar &amp; Pelatihan</a>
                    <span>/</span>
                    <span class="text-slate-600 dark:text-slate-300 font-medium">Input Baru</span>
                </div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Input Seminar &amp; Pelatihan Baru
                </h1>
            </div>

            <a href="{{ route('admin.trainings.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 text-xs font-semibold hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali</span>
            </a>
        </div>

        <!-- Form Submission -->
        <form method="POST" action="{{ route('admin.trainings.store') }}" enctype="multipart/form-data">
            @csrf
            
            @include('admin.trainings._form', [
                'training' => null,
                'subVocations' => $subVocations,
                'types' => $types,
                'locationTypes' => $locationTypes,
                'provinces' => $provinces,
                'regions' => $regions,
            ])
        </form>
    </div>
</x-layouts.admin>

