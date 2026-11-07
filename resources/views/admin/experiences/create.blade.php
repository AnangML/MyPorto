<x-layouts.admin title="Tambah Pengalaman — Admin CMS">
    <div class="max-w-3xl space-y-6">
        
        <div class="flex items-center justify-between pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Tambah Pengalaman Baru
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Tambahkan riwayat profesional, institusi pendidikan, atau peran freelance ke timeline.
                </p>
            </div>

            <a href="{{ route('admin.experiences.index') }}" class="text-xs font-semibold text-slate-500 hover:text-blue-600 transition-colors">
                &larr; Kembali
            </a>
        </div>

        <form method="POST" action="{{ route('admin.experiences.store') }}" class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-4">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="organization" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Nama Organisasi / Perusahaan / Kampus <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="organization" 
                        name="organization" 
                        value="{{ old('organization') }}" 
                        required 
                        placeholder="Universitas Pamulang"
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    />
                </div>

                <div>
                    <label for="employment_type" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Tipe / Kategori
                    </label>
                    <input 
                        type="text" 
                        id="employment_type" 
                        name="employment_type" 
                        value="{{ old('employment_type') }}" 
                        placeholder="Full-time, Internship, Education"
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500"
                    />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="position_id" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Posisi / Jurusan (Bahasa Indonesia) <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="position_id" 
                        name="position_id" 
                        value="{{ old('position_id') }}" 
                        required 
                        placeholder="Sarjana Teknik Informatika"
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    />
                </div>

                <div>
                    <label for="position_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Posisi / Jurusan (English) <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="position_en" 
                        name="position_en" 
                        value="{{ old('position_en') }}" 
                        required 
                        placeholder="Bachelor of Informatics Engineering"
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="started_at" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Tanggal Mulai <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="date" 
                        id="started_at" 
                        name="started_at" 
                        value="{{ old('started_at') }}" 
                        required 
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500"
                    />
                </div>

                <div>
                    <label for="ended_at" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Tanggal Selesai (Kosongkan jika aktif)
                    </label>
                    <input 
                        type="date" 
                        id="ended_at" 
                        name="ended_at" 
                        value="{{ old('ended_at') }}" 
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500"
                    />
                </div>

                <div class="flex items-center pt-5">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="is_current" 
                            value="1"
                            {{ old('is_current') ? 'checked' : '' }}
                            class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 dark:border-slate-700 dark:bg-slate-900"
                        />
                        <span class="text-xs font-semibold text-slate-700 dark:text-slate-300">
                            Masih Berjalan (Present)
                        </span>
                    </label>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="location" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Lokasi
                    </label>
                    <input 
                        type="text" 
                        id="location" 
                        name="location" 
                        value="{{ old('location') }}" 
                        placeholder="Tangerang Selatan, Indonesia"
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500"
                    />
                </div>

                <div class="flex items-center pt-5">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="is_visible" 
                            value="1"
                            {{ old('is_visible', true) ? 'checked' : '' }}
                            class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 dark:border-slate-700 dark:bg-slate-900"
                        />
                        <span class="text-xs font-semibold text-slate-700 dark:text-slate-300">
                            Tampilkan di Halaman Publik
                        </span>
                    </label>
                </div>
            </div>

            <div class="space-y-4 pt-2">
                <div>
                    <label for="description_id" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Deskripsi Peran &amp; Pencapaian (Bahasa Indonesia)
                    </label>
                    <textarea 
                        id="description_id" 
                        name="description_id" 
                        rows="3" 
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 resize-none">{{ old('description_id') }}</textarea>
                </div>

                <div>
                    <label for="description_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Deskripsi Peran &amp; Pencapaian (English)
                    </label>
                    <textarea 
                        id="description_en" 
                        name="description_en" 
                        rows="3" 
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 resize-none">{{ old('description_en') }}</textarea>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                <a href="{{ route('admin.experiences.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-xs font-semibold text-slate-600 dark:text-slate-400 hover:bg-slate-100 transition-colors">
                    Batal
                </a>
                <button 
                    type="submit" 
                    class="px-7 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs shadow-md shadow-blue-500/20 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                    Simpan Pengalaman
                </button>
            </div>
        </form>

    </div>
</x-layouts.admin>

