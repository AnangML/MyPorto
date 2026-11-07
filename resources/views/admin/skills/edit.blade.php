<x-layouts.admin title="Edit Skill — Admin CMS">
    <div class="max-w-2xl space-y-6">
        
        <div class="flex items-center justify-between pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Edit Skill: {{ $skill->name }}
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Perbarui nama, kategori matriks, atau status visibilitas skill ini.
                </p>
            </div>

            <a href="{{ route('admin.skills.index') }}" class="text-xs font-semibold text-slate-500 hover:text-blue-600 transition-colors">
                &larr; Kembali
            </a>
        </div>

        <form method="POST" action="{{ route('admin.skills.update', $skill->id) }}" class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                    Nama Teknologi / Skill <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $skill->name) }}" 
                    required 
                    class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                />
            </div>

            <div>
                <label for="category" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                    Kategori Matriks <span class="text-red-500">*</span>
                </label>
                <select 
                    id="category" 
                    name="category" 
                    required 
                    class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500">
                    @foreach($categories as $key => $label)
                        <option value="{{ $key }}" {{ old('category', $skill->category) === $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="description_id" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Keterangan Singkat (ID)
                    </label>
                    <input 
                        type="text" 
                        id="description_id" 
                        name="description_id" 
                        value="{{ old('description_id', $skill->description_id) }}" 
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500"
                    />
                </div>

                <div>
                    <label for="description_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Keterangan Singkat (EN)
                    </label>
                    <input 
                        type="text" 
                        id="description_en" 
                        name="description_en" 
                        value="{{ old('description_en', $skill->description_en) }}" 
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500"
                    />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="sort_order" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Urutan Tampil (Sort Order)
                    </label>
                    <input 
                        type="number" 
                        id="sort_order" 
                        name="sort_order" 
                        value="{{ old('sort_order', $skill->sort_order) }}" 
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500"
                    />
                </div>

                <div class="flex items-center pt-5">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="is_visible" 
                            value="1"
                            {{ old('is_visible', $skill->is_visible) ? 'checked' : '' }}
                            class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 dark:border-slate-700 dark:bg-slate-900"
                        />
                        <span class="text-xs font-semibold text-slate-700 dark:text-slate-300">
                            Tampilkan di Halaman Publik
                        </span>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                <a href="{{ route('admin.skills.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-xs font-semibold text-slate-600 dark:text-slate-400 hover:bg-slate-100 transition-colors">
                    Batal
                </a>
                <button 
                    type="submit" 
                    class="px-7 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs shadow-md shadow-blue-500/20 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                    Simpan Perubahan
                </button>
            </div>
        </form>

    </div>
</x-layouts.admin>

