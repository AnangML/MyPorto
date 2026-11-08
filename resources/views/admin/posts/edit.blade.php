<x-layouts.admin title="Edit Artikel — Admin CMS">
    <div class="space-y-6 max-w-4xl">
        
        <div class="flex items-center justify-between pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Edit Artikel / Catatan Rekayasa
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Perbarui konten, kategori, atau status publikasi artikel.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('posts.show', $post->slug) }}" target="_blank" class="text-xs font-semibold text-blue-600 dark:text-sky-400 hover:underline">
                    Lihat di Web &rarr;
                </a>
                <a href="{{ route('admin.posts.index') }}" class="text-xs font-semibold text-slate-500 hover:text-blue-600 transition-colors">
                    &larr; Kembali
                </a>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Card 1: Identitas & Status Artikel -->
            <div class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] pb-3 border-b border-slate-100 dark:border-slate-800">
                    Informasi &amp; Judul Artikel
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="title_id" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Judul Artikel (Bahasa Indonesia) <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="title_id" 
                            name="title_id" 
                            value="{{ old('title_id', $post->title_id) }}" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                        @error('title_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="title_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Judul Artikel (English) <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="title_en" 
                            name="title_en" 
                            value="{{ old('title_en', $post->title_en) }}" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                        @error('title_en') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="slug" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Slug URL <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="slug" 
                            name="slug" 
                            value="{{ old('slug', $post->slug) }}" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs font-mono focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                        @error('slug') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Status Publikasi <span class="text-red-500">*</span>
                        </label>
                        <select 
                            id="status" 
                            name="status" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500">
                            <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Published (Tayang di Publik)</option>
                            <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Draft (Konsep)</option>
                            <option value="archived" {{ old('status', $post->status) === 'archived' ? 'selected' : '' }}>Archived (Arsip)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Card 2: Kategori Artikel (Dengan Quick-Add) -->
            @php
                $initialCategories = $categories->map(fn ($c) => ['id' => $c->id, 'name' => $c->name])->values();
                $initialSelected = array_map('intval', old('categories', $selectedCategories ?? []));
            @endphp
            <div 
                x-data="postCategoryManager(@js($initialCategories), @js($initialSelected))"
                class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-4"
            >
                <div class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
                    <div>
                        <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                            Kategori Artikel
                        </h2>
                        <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">
                            Pilih atau tambahkan topik bahasan untuk artikel ini.
                        </p>
                    </div>

                    <button 
                        type="button" 
                        @click="showNewCategoryForm = !showNewCategoryForm" 
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-sky-400 font-semibold text-xs border border-blue-200/60 dark:border-blue-800/60 hover:bg-blue-100 transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span x-text="showNewCategoryForm ? 'Tutup Input' : '+ Tambah Kategori Baru'"></span>
                    </button>
                </div>

                <!-- Inline Quick-Add Category Form -->
                <div x-show="showNewCategoryForm" x-transition class="p-4 rounded-2xl bg-blue-50/50 dark:bg-blue-950/30 border border-blue-100 dark:border-blue-900/50 space-y-3">
                    <span class="text-xs font-bold text-blue-900 dark:text-blue-300 block">Tambah Topik Kategori Baru</span>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <input 
                            type="text" 
                            x-model="newCategoryNameId" 
                            placeholder="Nama Kategori (ID)" 
                            class="px-3 py-2 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-[#0F172A] text-xs text-slate-900 dark:text-white"
                        />
                        <input 
                            type="text" 
                            x-model="newCategoryNameEn" 
                            placeholder="Nama Kategori (EN)" 
                            class="px-3 py-2 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-[#0F172A] text-xs text-slate-900 dark:text-white"
                        />
                    </div>
                    <div class="flex items-center gap-2">
                        <button 
                            type="button" 
                            @click="addCategory()" 
                            :disabled="isSubmitting || !newCategoryNameId.trim()" 
                            class="px-4 py-2 rounded-xl bg-blue-600 text-white text-xs font-semibold hover:bg-blue-700 disabled:opacity-50 transition-colors">
                            <span x-show="!isSubmitting">Simpan Kategori</span>
                            <span x-show="isSubmitting">Menyimpan...</span>
                        </button>
                    </div>
                    <p x-show="categoryError" x-text="categoryError" class="text-xs text-red-500 font-medium"></p>
                    <p x-show="categorySuccess" x-text="categorySuccess" class="text-xs text-emerald-600 font-medium"></p>
                </div>

                <!-- Category Checkboxes -->
                <div class="flex flex-wrap gap-2 pt-1">
                    <template x-for="cat in categories" :key="cat.id">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/70 dark:bg-slate-900/60 text-xs">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    name="categories[]" 
                                    :value="cat.id" 
                                    x-model="selected" 
                                    class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                                />
                                <span class="font-medium text-slate-700 dark:text-slate-300" x-text="cat.name"></span>
                            </label>
                            <button 
                                type="button" 
                                @click="deleteCategory(cat.id, cat.name)" 
                                class="text-slate-400 hover:text-red-500 ml-1 p-0.5 rounded transition-colors" 
                                title="Hapus Kategori">
                                &times;
                            </button>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Card 3: Ringkasan Singkat (Excerpt) -->
            <div class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] pb-3 border-b border-slate-100 dark:border-slate-800">
                    Ringkasan Singkat (Excerpt / Preview)
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="excerpt_id" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Ringkasan (Bahasa Indonesia)
                        </label>
                        <textarea 
                            id="excerpt_id" 
                            name="excerpt_id" 
                            rows="3" 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500">{{ old('excerpt_id', $post->excerpt_id) }}</textarea>
                    </div>

                    <div>
                        <label for="excerpt_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Ringkasan (English)
                        </label>
                        <textarea 
                            id="excerpt_en" 
                            name="excerpt_en" 
                            rows="3" 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500">{{ old('excerpt_en', $post->excerpt_en) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Card 4: Konten Lengkap Artikel -->
            <div class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] pb-3 border-b border-slate-100 dark:border-slate-800">
                    Konten Isi Artikel (Markdown / Text)
                </h2>

                <div>
                    <label for="content_id" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Konten Artikel (Bahasa Indonesia) <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        id="content_id" 
                        name="content_id" 
                        rows="8" 
                        required 
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs font-mono leading-relaxed focus:border-blue-500">{{ old('content_id', $post->content_id) }}</textarea>
                    @error('content_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="content_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Konten Artikel (English) <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        id="content_en" 
                        name="content_en" 
                        rows="8" 
                        required 
                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs font-mono leading-relaxed focus:border-blue-500">{{ old('content_en', $post->content_en) }}</textarea>
                    @error('content_en') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Card 5: Gambar Sampul / Cover (Opsional) -->
            <div 
                x-data="{
                    coverPreview: null,
                    existingCover: @js($post->cover_image_url),
                    previewCover(event) {
                        const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            const self = this;
                            reader.onload = function(e) { self.coverPreview = e.target.result; };
                            reader.readAsDataURL(file);
                        }
                    }
                }"
                class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-4"
            >
                <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] pb-3 border-b border-slate-100 dark:border-slate-800">
                    Gambar Sampul / Ilustrasi (Opsional)
                </h2>

                <div class="flex flex-col sm:flex-row items-start gap-4">
                    <div class="w-48 aspect-video rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 bg-slate-100 dark:bg-slate-900 shrink-0 flex items-center justify-center">
                        <template x-if="coverPreview">
                            <img :src="coverPreview" class="w-full h-full object-cover">
                        </template>
                        <template x-if="!coverPreview && existingCover">
                            <img :src="existingCover" class="w-full h-full object-cover">
                        </template>
                        <template x-if="!coverPreview && !existingCover">
                            <span class="text-[11px] text-slate-400 text-center px-2">Tanpa Sampul</span>
                        </template>
                    </div>

                    <div class="flex-1 space-y-2">
                        <input 
                            type="file" 
                            name="cover_image" 
                            accept="image/png,image/jpeg,image/jpg,image/webp" 
                            @change="previewCover($event)"
                            class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-slate-800 dark:file:text-slate-200 cursor-pointer"
                        />
                        @if($post->cover_image_path)
                            <label class="flex items-center gap-2 cursor-pointer text-xs text-red-600 pt-1">
                                <input type="checkbox" name="remove_cover_image" value="1" class="rounded border-slate-300 text-red-600 focus:ring-red-500">
                                <span>Hapus gambar sampul saat ini</span>
                            </label>
                        @endif
                        <p class="text-[11px] text-slate-400">PNG, JPG, WEBP maks 5MB. Rasio 16:9 disarankan.</p>
                    </div>
                </div>
            </div>

            <!-- Submit Button Bar -->
            <div class="flex items-center gap-3 pt-4">
                <button type="submit" class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs shadow-sm shadow-blue-500/25 transition-all">
                    Simpan Perubahan Artikel
                </button>
                <a href="{{ route('admin.posts.index') }}" class="px-5 py-3 rounded-xl border border-slate-200 dark:border-slate-700 text-xs font-semibold text-slate-600 dark:text-slate-400 hover:bg-slate-100 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>

    <script>
        function postCategoryManager(initialCategories, initialSelected) {
            return {
                categories: initialCategories || [],
                selected: initialSelected || [],
                showNewCategoryForm: false,
                newCategoryNameId: '',
                newCategoryNameEn: '',
                isSubmitting: false,
                categoryError: '',
                categorySuccess: '',

                async addCategory() {
                    const nameId = this.newCategoryNameId.trim();
                    if (!nameId) return;
                    this.isSubmitting = true;
                    this.categoryError = '';
                    this.categorySuccess = '';

                    try {
                        const res = await fetch('{{ route('admin.post-categories.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                name_id: nameId,
                                name_en: this.newCategoryNameEn.trim() || nameId,
                            })
                        });
                        const data = await res.json();
                        if (res.ok && data.success) {
                            this.categories.push({ id: data.category.id, name: data.category.name });
                            if (!this.selected.includes(data.category.id)) {
                                this.selected.push(data.category.id);
                            }
                            this.newCategoryNameId = '';
                            this.newCategoryNameEn = '';
                            this.categorySuccess = data.message;
                            setTimeout(() => {
                                this.showNewCategoryForm = false;
                                this.categorySuccess = '';
                            }, 1200);
                        } else {
                            this.categoryError = data.message || 'Gagal menambahkan kategori.';
                        }
                    } catch (e) {
                        this.categoryError = 'Terjadi kesalahan jaringan.';
                    } finally {
                        this.isSubmitting = false;
                    }
                },

                async deleteCategory(id, name) {
                    if (!confirm(`Hapus kategori "${name}"?`)) return;
                    try {
                        const res = await fetch(`{{ url('/admin/post-categories') }}/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            }
                        });
                        const data = await res.json();
                        if (res.ok && data.success) {
                            this.categories = this.categories.filter(c => c.id !== id);
                            this.selected = this.selected.filter(selectedId => selectedId !== id);
                        } else {
                            alert(data.message || 'Gagal menghapus kategori.');
                        }
                    } catch (e) {
                        alert('Gagal menghubungi server.');
                    }
                }
            };
        }
    </script>
</x-layouts.admin>

