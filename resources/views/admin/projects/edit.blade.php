<x-layouts.admin title="Edit Proyek — Admin CMS">
    <div class="max-w-4xl space-y-6">
        
        <div class="flex items-center justify-between pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Edit Proyek: {{ $project->title_id }}
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Perbarui informasi, stack teknologi, atau status publikasi proyek ini.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('projects.show', $project->slug) }}" target="_blank" class="text-xs font-semibold text-blue-600 dark:text-sky-400 hover:underline">
                    Lihat di Web &rarr;
                </a>
                <a href="{{ route('admin.projects.index') }}" class="text-xs font-semibold text-slate-500 hover:text-blue-600 transition-colors">
                    &larr; Kembali
                </a>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Card 1: Basic Identifiers -->
            <div class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] pb-3 border-b border-slate-100 dark:border-slate-800">
                    Informasi &amp; Judul Proyek
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="title_id" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Judul Proyek (Bahasa Indonesia) <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="title_id" 
                            name="title_id" 
                            value="{{ old('title_id', $project->title_id) }}" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>

                    <div>
                        <label for="title_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Judul Proyek (English) <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="title_en" 
                            name="title_en" 
                            value="{{ old('title_en', $project->title_en) }}" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label for="slug" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Slug URL <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="slug" 
                            name="slug" 
                            value="{{ old('slug', $project->slug) }}" 
                            required
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs font-mono focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>

                    <div>
                        <label for="role_id" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Peran / Posisi (ID)
                        </label>
                        <input 
                            type="text" 
                            id="role_id" 
                            name="role_id" 
                            value="{{ old('role_id', $project->role_id) }}" 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>

                    <div>
                        <label for="role_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Peran / Posisi (EN)
                        </label>
                        <input 
                            type="text" 
                            id="role_en" 
                            name="role_en" 
                            value="{{ old('role_en', $project->role_en) }}" 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="repository_url" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            URL Repositori GitHub
                        </label>
                        <input 
                            type="url" 
                            id="repository_url" 
                            name="repository_url" 
                            value="{{ old('repository_url', $project->repository_url) }}" 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>

                    <div>
                        <label for="project_url" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            URL Demo / Website Live
                        </label>
                        <input 
                            type="url" 
                            id="project_url" 
                            name="project_url" 
                            value="{{ old('project_url', $project->project_url) }}" 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                    <div>
                        <label for="status" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Status Publikasi <span class="text-red-500">*</span>
                        </label>
                        <select 
                            id="status" 
                            name="status" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500">
                            <option value="published" {{ old('status', $project->status) === 'published' ? 'selected' : '' }}>Published (Tampil di Publik)</option>
                            <option value="draft" {{ old('status', $project->status) === 'draft' ? 'selected' : '' }}>Draft (Konsep)</option>
                            <option value="archived" {{ old('status', $project->status) === 'archived' ? 'selected' : '' }}>Archived (Arsip)</option>
                        </select>
                    </div>

                    <div class="flex items-center pt-5">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input 
                                type="checkbox" 
                                name="is_featured" 
                                value="1"
                                {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}
                                class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 dark:border-slate-700 dark:bg-slate-900"
                            />
                            <span class="text-xs font-semibold text-slate-700 dark:text-slate-300">
                                Tandai sebagai Proyek Unggulan (Featured)
                            </span>
                        </label>
                    </div>

                    <div>
                        <label for="sort_order" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Urutan Tampil (Sort Order)
                        </label>
                        <input 
                            type="number" 
                            id="sort_order" 
                            name="sort_order" 
                            value="{{ old('sort_order', $project->sort_order) }}" 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500"
                        />
                    </div>
                </div>
            </div>

            <!-- Card 2: Categories and Technologies -->
            <div class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] pb-3 border-b border-slate-100 dark:border-slate-800">
                    Kategori &amp; Teknologi (Tech Stack)
                </h2>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Pilih Kategori Proyek
                    </label>
                    <div class="flex flex-wrap gap-2">
                        @foreach($categories as $category)
                            <label class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-[#0F172A] text-xs cursor-pointer hover:border-blue-400">
                                <input 
                                    type="checkbox" 
                                    name="categories[]" 
                                    value="{{ $category->id }}"
                                    {{ in_array($category->id, old('categories', $selectedCategories)) ? 'checked' : '' }}
                                    class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                                />
                                <span class="font-medium text-slate-700 dark:text-slate-200">{{ $category->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="pt-2">
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Pilih Teknologi yang Digunakan
                    </label>
                    <div class="flex flex-wrap gap-2">
                        @foreach($technologies as $tech)
                            <label class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-[#0F172A] text-xs cursor-pointer hover:border-blue-400">
                                <input 
                                    type="checkbox" 
                                    name="technologies[]" 
                                    value="{{ $tech->id }}"
                                    {{ in_array($tech->id, old('technologies', $selectedTechnologies)) ? 'checked' : '' }}
                                    class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                                />
                                <span class="font-medium text-slate-700 dark:text-slate-200">{{ $tech->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Card 3: Summaries & Deep Case Study Details -->
            <div class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] pb-3 border-b border-slate-100 dark:border-slate-800">
                    Ringkasan &amp; Studi Kasus Lengkap
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="summary_id" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Ringkasan Kartu (Bahasa Indonesia) <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="summary_id" 
                            name="summary_id" 
                            rows="3" 
                            required 
                            maxlength="300"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 resize-none">{{ old('summary_id', $project->summary_id) }}</textarea>
                    </div>

                    <div>
                        <label for="summary_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Ringkasan Kartu (English) <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="summary_en" 
                            name="summary_en" 
                            rows="3" 
                            required 
                            maxlength="300"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 resize-none">{{ old('summary_en', $project->summary_en) }}</textarea>
                    </div>
                </div>

                <div class="space-y-4 pt-2">
                    <div>
                        <label for="description_id" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Penjelasan Kasus &amp; Solusi (Bahasa Indonesia) <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="description_id" 
                            name="description_id" 
                            rows="5" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500">{{ old('description_id', $project->description_id) }}</textarea>
                    </div>

                    <div>
                        <label for="description_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Penjelasan Kasus &amp; Solusi (English) <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="description_en" 
                            name="description_en" 
                            rows="5" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500">{{ old('description_en', $project->description_en) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end gap-3 pt-2">
                <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-xs font-semibold text-slate-600 dark:text-slate-400 hover:bg-slate-100 transition-colors">
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

