<x-layouts.admin title="Tambah Proyek — Admin CMS">
    <div class="max-w-4xl space-y-6">
        
        <div class="flex items-center justify-between pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Tambah Proyek Baru
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Isi detail proyek, arsitektur teknis, dan tautan repositori untuk portofolio Anda.
                </p>
            </div>

            <a href="{{ route('admin.projects.index') }}" class="text-xs font-semibold text-slate-500 hover:text-blue-600 transition-colors">
                &larr; Kembali ke Daftar Proyek
            </a>
        </div>

        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

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
                            value="{{ old('title_id') }}" 
                            required 
                            placeholder="Sistem Manajemen Aset Enterprise"
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
                            value="{{ old('title_en') }}" 
                            required 
                            placeholder="Enterprise Asset Management System"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label for="slug" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Slug URL (Opsional / Otomatis)
                        </label>
                        <input 
                            type="text" 
                            id="slug" 
                            name="slug" 
                            value="{{ old('slug') }}" 
                            placeholder="enterprise-asset-management"
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
                            value="{{ old('role_id') }}" 
                            placeholder="Lead Backend Engineer"
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
                            value="{{ old('role_en') }}" 
                            placeholder="Lead Backend Engineer"
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
                            value="{{ old('repository_url') }}" 
                            placeholder="https://github.com/AnangML/my-repo"
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
                            value="{{ old('project_url') }}" 
                            placeholder="https://example.com"
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
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published (Tampil di Publik)</option>
                            <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>Draft (Konsep)</option>
                            <option value="archived" {{ old('status') === 'archived' ? 'selected' : '' }}>Archived (Arsip)</option>
                        </select>
                    </div>

                    <div class="flex items-start pt-4">
                        <label class="flex items-start gap-2 cursor-pointer">
                            <input 
                                type="checkbox" 
                                name="is_featured" 
                                value="1"
                                {{ old('is_featured') ? 'checked' : '' }}
                                class="mt-0.5 rounded border-slate-300 text-blue-600 focus:ring-blue-500 dark:border-slate-700 dark:bg-slate-900"
                            />
                            <div>
                                <span class="text-xs font-semibold text-slate-700 dark:text-slate-300 block">
                                    Tandai sebagai Proyek Unggulan (Featured)
                                </span>
                                <span class="text-[11px] text-slate-500 dark:text-slate-400 block mt-0.5">
                                    Diprioritaskan tampil paling atas di beranda dan diberi lencana bintang &starf; Featured.
                                </span>
                            </div>
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
                            value="{{ old('sort_order', 0) }}" 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500"
                        />
                    </div>
                </div>
            </div>

            <!-- Card: Foto Tampilan Web & Tangkapan Layar Proyek -->
            <div 
                x-data="{
                    coverPreview: null,
                    galleryPreviews: [],
                    previewCover(event) {
                        const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                this.coverPreview = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    },
                    removeCoverPreview() {
                        this.coverPreview = null;
                        const input = document.getElementById('cover_image');
                        if (input) input.value = '';
                    },
                    previewGallery(event) {
                        this.galleryPreviews = [];
                        const files = event.target.files;
                        if (files && files.length > 0) {
                            for (let i = 0; i < files.length; i++) {
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    this.galleryPreviews.push(e.target.result);
                                };
                                reader.readAsDataURL(files[i]);
                            }
                        }
                    }
                }"
                class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-6"
            >
                <div class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
                    <div>
                        <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600 dark:text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Foto Tampilan Web &amp; Mockup Proyek</span>
                        </h2>
                        <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">
                            Unggah tangkapan layar (screenshot) website atau aplikasi yang telah dibuat untuk ditampilkan pada kartu portofolio dan halaman studi kasus.
                        </p>
                    </div>
                </div>

                <!-- 1. Foto Tampilan Utama (Cover Showcase) -->
                <div class="space-y-3">
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300">
                        Foto Tampilan Utama / Mockup Web (Cover Image)
                    </label>

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-start">
                        <!-- Preview Box (Aspect Video) -->
                        <div class="md:col-span-5 relative">
                            <div class="aspect-video w-full rounded-2xl overflow-hidden border-2 border-dashed border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/60 flex flex-col items-center justify-center relative group">
                                <template x-if="coverPreview">
                                    <div class="w-full h-full relative">
                                        <img :src="coverPreview" alt="Preview Tampilan Web" class="w-full h-full object-cover">
                                        <button 
                                            type="button" 
                                            @click="removeCoverPreview()" 
                                            class="absolute top-2 right-2 p-1.5 rounded-lg bg-red-600/90 hover:bg-red-700 text-white shadow-sm transition-all"
                                            title="Batalkan Pilihan Foto"
                                        >
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </template>
                                <template x-if="!coverPreview">
                                    <div class="text-center p-4">
                                        <div class="w-10 h-10 mx-auto rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-sky-400 flex items-center justify-center mb-2">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <span class="text-[11px] font-semibold text-slate-600 dark:text-slate-400 block">Belum ada foto tampilan</span>
                                        <span class="text-[10px] text-slate-400 dark:text-slate-500">Rasio 16:9 disarankan (misal: 1920x1080)</span>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Upload Controls & Guidelines -->
                        <div class="md:col-span-7 space-y-3">
                            <input 
                                type="file" 
                                id="cover_image" 
                                name="cover_image" 
                                accept="image/png,image/jpeg,image/jpg,image/webp,image/svg+xml"
                                @change="previewCover($event)"
                                class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-slate-800 dark:file:text-slate-200 cursor-pointer"
                            />

                            <div class="p-3.5 rounded-xl bg-slate-50/70 dark:bg-slate-900/40 border border-slate-100 dark:border-slate-800/80 text-[11px] text-slate-500 dark:text-slate-400 space-y-1">
                                <p class="font-semibold text-slate-700 dark:text-slate-300">Panduan Tangkapan Layar:</p>
                                <ul class="list-disc pl-4 space-y-0.5 text-[10.5px]">
                                    <li>Format didukung: <strong>PNG, JPG, JPEG, WEBP, SVG</strong> (Maksimal 5MB).</li>
                                    <li>Rekomendasi rasio: <strong>16:9</strong> (contoh: 1920&times;1080 atau 1280&times;720 px).</li>
                                    <li>Foto ini otomatis ditampilkan di kartu etalase beranda dan di bagian atas studi kasus detail.</li>
                                </ul>
                            </div>
                            @error('cover_image')
                                <p class="text-xs text-red-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- 2. Tangkapan Layar Tambahan / Galeri (Opsional) -->
                <div class="pt-5 border-t border-slate-100 dark:border-slate-800 space-y-3">
                    <div>
                        <label for="screenshots" class="block text-xs font-semibold text-slate-700 dark:text-slate-300">
                            Tangkapan Layar Tambahan / Galeri Halaman (Opsional)
                        </label>
                        <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">
                            Pilih beberapa foto sekaligus untuk menunjukkan halaman sekunder, alur checkout, atau tampilan antarmuka lainnya.
                        </p>
                    </div>

                    <input 
                        type="file" 
                        id="screenshots" 
                        name="screenshots[]" 
                        multiple
                        accept="image/png,image/jpeg,image/jpg,image/webp"
                        @change="previewGallery($event)"
                        class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 dark:file:bg-slate-800 dark:file:text-slate-200 cursor-pointer"
                    />

                    <!-- Multi-preview grid -->
                    <div x-show="galleryPreviews.length > 0" class="pt-2">
                        <span class="text-[10px] font-semibold text-slate-500 uppercase tracking-wider block mb-2">Preview Foto Tambahan yang Dipilih:</span>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            <template x-for="(src, idx) in galleryPreviews" :key="idx">
                                <div class="aspect-video rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 bg-slate-100 dark:bg-slate-900">
                                    <img :src="src" class="w-full h-full object-cover">
                                </div>
                            </template>
                        </div>
                    </div>
                    @error('screenshots')
                        <p class="text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                    @error('screenshots.*')
                        <p class="text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Card 2: Categories and Technologies (With Quick-Add) -->
            @php
                $initialCategories = $categories->map(fn ($c) => ['id' => $c->id, 'name' => $c->name])->values();
                $initialSelectedCategories = array_map('intval', old('categories', []));
                $initialTechnologies = $technologies->map(fn ($t) => ['id' => $t->id, 'name' => $t->name])->values();
                $initialSelectedTechnologies = array_map('intval', old('technologies', []));
            @endphp
            <div 
                x-data="{
                    categories: @js($initialCategories),
                    selectedCategories: @js($initialSelectedCategories),
                    technologies: @js($initialTechnologies),
                    selectedTechnologies: @js($initialSelectedTechnologies),
                    
                    showNewCategoryForm: false,
                    newCategoryNameId: '',
                    newCategoryNameEn: '',
                    isSubmittingCategory: false,
                    categoryError: '',
                    categorySuccess: '',

                    showNewTechForm: false,
                    newTechName: '',
                    isSubmittingTech: false,
                    techError: '',
                    techSuccess: '',

                    async addCategory() {
                        const nameId = this.newCategoryNameId.trim();
                        if (!nameId) return;
                        this.isSubmittingCategory = true;
                        this.categoryError = '';
                        this.categorySuccess = '';

                        try {
                            const res = await fetch('{{ route('admin.project-categories.store') }}', {
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
                                if (!this.selectedCategories.includes(data.category.id)) {
                                    this.selectedCategories.push(data.category.id);
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
                            this.isSubmittingCategory = false;
                        }
                    },

                    async deleteCategory(id, name) {
                        if (!confirm(`Hapus kategori \'${name}\'?`)) return;
                        try {
                            const res = await fetch(`/admin/project-categories/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                }
                            });
                            if (res.ok) {
                                this.categories = this.categories.filter(c => c.id !== id);
                                this.selectedCategories = this.selectedCategories.filter(cid => cid !== id);
                            }
                        } catch (e) {
                            alert('Gagal menghapus kategori.');
                        }
                    },

                    async addTechnology() {
                        const name = this.newTechName.trim();
                        if (!name) return;
                        this.isSubmittingTech = true;
                        this.techError = '';
                        this.techSuccess = '';

                        try {
                            const res = await fetch('{{ route('admin.technologies.store') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: JSON.stringify({ name: name })
                            });
                            const data = await res.json();
                            if (res.ok && data.success) {
                                this.technologies.push({ id: data.technology.id, name: data.technology.name });
                                if (!this.selectedTechnologies.includes(data.technology.id)) {
                                    this.selectedTechnologies.push(data.technology.id);
                                }
                                this.newTechName = '';
                                this.techSuccess = data.message;
                                setTimeout(() => {
                                    this.showNewTechForm = false;
                                    this.techSuccess = '';
                                }, 1200);
                            } else {
                                this.techError = data.message || 'Gagal menambahkan teknologi.';
                            }
                        } catch (e) {
                            this.techError = 'Terjadi kesalahan jaringan.';
                        } finally {
                            this.isSubmittingTech = false;
                        }
                    },

                    async deleteTechnology(id, name) {
                        if (!confirm(`Hapus teknologi \'${name}\'?`)) return;
                        try {
                            const res = await fetch(`/admin/technologies/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                }
                            });
                            if (res.ok) {
                                this.technologies = this.technologies.filter(t => t.id !== id);
                                this.selectedTechnologies = this.selectedTechnologies.filter(tid => tid !== id);
                            }
                        } catch (e) {
                            alert('Gagal menghapus teknologi.');
                        }
                    }
                }"
                class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-5"
            >
                <div class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
                    <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                        Kategori &amp; Teknologi (Tech Stack)
                    </h2>
                    <span class="text-[11px] font-mono text-slate-400">
                        Dapat ditambah bebas
                    </span>
                </div>

                <!-- Kategori Proyek Section -->
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300">
                            Pilih Kategori Proyek
                        </label>
                        <button 
                            type="button" 
                            @click="showNewCategoryForm = !showNewCategoryForm" 
                            class="inline-flex items-center gap-1 text-xs font-semibold text-blue-600 dark:text-sky-400 hover:text-blue-700 dark:hover:text-blue-300 transition-colors">
                            <span x-text="showNewCategoryForm ? '✕ Tutup Form' : '+ Tambah Kategori Baru'"></span>
                        </button>
                    </div>

                    <!-- Micro-Form Tambah Kategori Baru -->
                    <div 
                        x-show="showNewCategoryForm" 
                        x-transition 
                        class="p-4 rounded-2xl bg-blue-50/50 dark:bg-blue-950/30 border border-blue-200/80 dark:border-blue-900/60 space-y-3"
                    >
                        <div class="text-xs font-bold text-blue-900 dark:text-blue-200 flex items-center justify-between">
                            <span>Form Tambah Kategori Baru</span>
                            <span class="text-[10px] font-mono text-blue-600 dark:text-blue-400">Tersimpan otomatis ke database</span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-medium text-slate-600 dark:text-slate-400 mb-1">
                                    Nama Kategori (Bahasa Indonesia) <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    x-model="newCategoryNameId" 
                                    placeholder="Contoh: Mobile App, IoT, AI / ML, dsb." 
                                    @keydown.enter.prevent="addCategory()"
                                    class="w-full px-3 py-2 text-xs rounded-xl bg-white dark:bg-[#0F172A] border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-blue-500 text-slate-900 dark:text-white"
                                />
                            </div>
                            <div>
                                <label class="block text-[11px] font-medium text-slate-600 dark:text-slate-400 mb-1">
                                    Nama Kategori (English — Opsional)
                                </label>
                                <input 
                                    type="text" 
                                    x-model="newCategoryNameEn" 
                                    placeholder="Contoh: Mobile Application" 
                                    @keydown.enter.prevent="addCategory()"
                                    class="w-full px-3 py-2 text-xs rounded-xl bg-white dark:bg-[#0F172A] border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-blue-500 text-slate-900 dark:text-white"
                                />
                            </div>
                        </div>

                        <!-- Feedback Messages -->
                        <div x-show="categoryError" class="text-xs text-red-500" x-text="categoryError"></div>
                        <div x-show="categorySuccess" class="text-xs text-emerald-600 dark:text-emerald-400 font-semibold" x-text="categorySuccess"></div>

                        <div class="flex items-center justify-end gap-2 pt-1">
                            <button 
                                type="button" 
                                @click="showNewCategoryForm = false; categoryError = '';" 
                                class="px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700 text-xs text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                                Batal
                            </button>
                            <button 
                                type="button" 
                                @click="addCategory()" 
                                :disabled="isSubmittingCategory || !newCategoryNameId.trim()" 
                                class="px-4 py-1.5 rounded-lg bg-blue-600 hover:bg-blue-700 disabled:opacity-50 text-white font-semibold text-xs shadow-xs transition-colors flex items-center gap-1.5">
                                <span x-show="!isSubmittingCategory">Simpan &amp; Pilih Kategori</span>
                                <span x-show="isSubmittingCategory">Menyimpan...</span>
                            </button>
                        </div>
                    </div>

                    <!-- Category Pills List -->
                    <div class="flex flex-wrap gap-2">
                        <template x-for="cat in categories" :key="cat.id">
                            <label class="group/pill inline-flex items-center gap-2 px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-[#0F172A] text-xs cursor-pointer hover:border-blue-400 transition-colors">
                                <input 
                                    type="checkbox" 
                                    name="categories[]" 
                                    :value="cat.id"
                                    :checked="selectedCategories.includes(cat.id)"
                                    @change="if ($event.target.checked) { if (!selectedCategories.includes(cat.id)) selectedCategories.push(cat.id); } else { selectedCategories = selectedCategories.filter(id => id !== cat.id); }"
                                    class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                                />
                                <span class="font-medium text-slate-700 dark:text-slate-200" x-text="cat.name"></span>
                                <button 
                                    type="button" 
                                    @click.stop.prevent="deleteCategory(cat.id, cat.name)" 
                                    class="opacity-0 group-hover/pill:opacity-100 text-slate-400 hover:text-red-500 transition-opacity ml-1 px-1 text-sm font-bold leading-none" 
                                    title="Hapus kategori ini">
                                    &times;
                                </button>
                            </label>
                        </template>
                    </div>
                </div>

                <!-- Teknologi yang Digunakan Section -->
                <div class="pt-4 border-t border-slate-100 dark:border-slate-800 space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300">
                            Pilih Teknologi yang Digunakan
                        </label>
                        <button 
                            type="button" 
                            @click="showNewTechForm = !showNewTechForm" 
                            class="inline-flex items-center gap-1 text-xs font-semibold text-blue-600 dark:text-sky-400 hover:text-blue-700 dark:hover:text-blue-300 transition-colors">
                            <span x-text="showNewTechForm ? '✕ Tutup Form' : '+ Tambah Teknologi Baru'"></span>
                        </button>
                    </div>

                    <!-- Micro-Form Tambah Teknologi Baru -->
                    <div 
                        x-show="showNewTechForm" 
                        x-transition 
                        class="p-4 rounded-2xl bg-blue-50/50 dark:bg-blue-950/30 border border-blue-200/80 dark:border-blue-900/60 space-y-3"
                    >
                        <div class="text-xs font-bold text-blue-900 dark:text-blue-200 flex items-center justify-between">
                            <span>Form Tambah Teknologi Baru</span>
                            <span class="text-[10px] font-mono text-blue-600 dark:text-blue-400">Tersimpan otomatis ke database</span>
                        </div>

                        <div>
                            <label class="block text-[11px] font-medium text-slate-600 dark:text-slate-400 mb-1">
                                Nama Teknologi / Tool <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                x-model="newTechName" 
                                placeholder="Contoh: Docker, Flutter, Python, Redis, Go, Vue.js, dsb." 
                                @keydown.enter.prevent="addTechnology()"
                                class="w-full px-3 py-2 text-xs rounded-xl bg-white dark:bg-[#0F172A] border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-blue-500 text-slate-900 dark:text-white"
                            />
                        </div>

                        <!-- Feedback Messages -->
                        <div x-show="techError" class="text-xs text-red-500" x-text="techError"></div>
                        <div x-show="techSuccess" class="text-xs text-emerald-600 dark:text-emerald-400 font-semibold" x-text="techSuccess"></div>

                        <div class="flex items-center justify-end gap-2 pt-1">
                            <button 
                                type="button" 
                                @click="showNewTechForm = false; techError = '';" 
                                class="px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700 text-xs text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                                Batal
                            </button>
                            <button 
                                type="button" 
                                @click="addTechnology()" 
                                :disabled="isSubmittingTech || !newTechName.trim()" 
                                class="px-4 py-1.5 rounded-lg bg-blue-600 hover:bg-blue-700 disabled:opacity-50 text-white font-semibold text-xs shadow-xs transition-colors flex items-center gap-1.5">
                                <span x-show="!isSubmittingTech">Simpan &amp; Pilih Teknologi</span>
                                <span x-show="isSubmittingTech">Menyimpan...</span>
                            </button>
                        </div>
                    </div>

                    <!-- Tech Pills List -->
                    <div class="flex flex-wrap gap-2">
                        <template x-for="tech in technologies" :key="tech.id">
                            <label class="group/pill inline-flex items-center gap-2 px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/60 dark:bg-[#0F172A] text-xs cursor-pointer hover:border-blue-400 transition-colors">
                                <input 
                                    type="checkbox" 
                                    name="technologies[]" 
                                    :value="tech.id"
                                    :checked="selectedTechnologies.includes(tech.id)"
                                    @change="if ($event.target.checked) { if (!selectedTechnologies.includes(tech.id)) selectedTechnologies.push(tech.id); } else { selectedTechnologies = selectedTechnologies.filter(id => id !== tech.id); }"
                                    class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                                />
                                <span class="font-medium text-slate-700 dark:text-slate-200" x-text="tech.name"></span>
                                <button 
                                    type="button" 
                                    @click.stop.prevent="deleteTechnology(tech.id, tech.name)" 
                                    class="opacity-0 group-hover/pill:opacity-100 text-slate-400 hover:text-red-500 transition-opacity ml-1 px-1 text-sm font-bold leading-none" 
                                    title="Hapus teknologi ini">
                                    &times;
                                </button>
                            </label>
                        </template>
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
                            Ringkasan Kartu (Bahasa Indonesia, Maks 300 char) <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="summary_id" 
                            name="summary_id" 
                            rows="3" 
                            required 
                            maxlength="300"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 resize-none">{{ old('summary_id') }}</textarea>
                    </div>

                    <div>
                        <label for="summary_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Ringkasan Kartu (English, Maks 300 char) <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="summary_en" 
                            name="summary_en" 
                            rows="3" 
                            required 
                            maxlength="300"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 resize-none">{{ old('summary_en') }}</textarea>
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
                            placeholder="Jelaskan tantangan sistem, implementasi arsitektur, dan dampak teknisnya..."
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500">{{ old('description_id') }}</textarea>
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
                            placeholder="Detail the system challenges, architectural approach, and technical outcome..."
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500">{{ old('description_en') }}</textarea>
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
                    Simpan Proyek
                </button>
            </div>
        </form>

    </div>
</x-layouts.admin>

