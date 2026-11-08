<x-layouts.admin title="Pengaturan Profil — Admin CMS">
    <div class="max-w-4xl space-y-6">
        
        <div class="flex items-center justify-between pb-6 border-b border-slate-200/80 dark:border-slate-800">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-[#0F172A] dark:text-[#F8FAFC]">
                    Pengaturan Profil &amp; Branding
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Kelola biodata, headline editorial, tautan sosial, dan berkas CV PDF pemilik portofolio.
                </p>
            </div>

            @if($profile->cv_file_path)
                <a href="{{ route('cv.download') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-xs font-semibold text-slate-700 dark:text-slate-200 transition-colors">
                    <svg class="w-4 h-4 text-blue-600 dark:text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>Unduh CV Aktif</span>
                </a>
            @endif
        </div>

        <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Profile Photo & Portrait Hero Card -->
            <div 
                x-data="{
                    photoPreview: null,
                    previewPhoto(event) {
                        const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                this.photoPreview = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                }"
                class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-4"
            >
                <div class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
                    <div>
                        <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                            Foto Profil &amp; Potret Hero
                        </h2>
                        <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">
                            Foto utama yang tampil di bagian Hero beranda publik portofolio dan avatar CMS.
                        </p>
                    </div>

                    @if($profile->profile_photo_path)
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-300 border border-emerald-200/60">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Foto Kustom Aktif
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-300">
                            Foto Default Aktif
                        </span>
                    @endif
                </div>

                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 pt-2">
                    <!-- Photo Preview Box -->
                    <div class="relative shrink-0">
                        <div class="w-28 h-36 rounded-2xl overflow-hidden border-2 border-slate-200 dark:border-slate-700 shadow-sm bg-slate-100 dark:bg-slate-900 flex items-center justify-center group relative">
                            <!-- Show live preview if selected, else current photo -->
                            <template x-if="photoPreview">
                                <img :src="photoPreview" alt="Preview Foto Baru" class="w-full h-full object-contain p-1">
                            </template>
                            <template x-if="!photoPreview">
                                <img src="{{ $profile->profile_photo_url }}" alt="Foto Profil" class="w-full h-full object-contain p-1">
                            </template>
                        </div>
                        <span x-show="photoPreview" class="absolute -top-2 -right-2 px-2 py-0.5 rounded-full text-[9px] font-bold bg-blue-600 text-white shadow-xs">
                            Preview Baru
                        </span>
                    </div>

                    <!-- Upload Controls & Guidelines -->
                    <div class="flex-1 space-y-3 w-full">
                        <div>
                            <label for="profile_photo" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                                Unggah Foto Baru (JPG, JPEG, PNG, WEBP — Maksimal 5MB)
                            </label>
                            <input 
                                type="file" 
                                id="profile_photo" 
                                name="profile_photo" 
                                accept="image/jpeg,image/png,image/webp,image/jpg"
                                @change="previewPhoto($event)"
                                class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-950/60 dark:file:text-blue-300 cursor-pointer"
                            />
                            @error('profile_photo')
                                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <p class="text-[11px] text-slate-400 leading-relaxed">
                            💡 <strong>Saran tampilan terbaik</strong>: Gunakan foto portrait dengan rasio 3:4 atau 4:5 dan pencahayaan kontras tajam agar menyatu sempurna dengan efek pendaran biru di Hero portofolio.
                        </p>

                        @if($profile->profile_photo_path)
                            <div class="pt-2 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                                <span class="text-[11px] text-slate-400 font-mono truncate max-w-xs">
                                    {{ $profile->profile_photo_path }}
                                </span>
                                <label class="flex items-center gap-2 text-xs text-red-600 dark:text-red-400 font-medium cursor-pointer hover:underline">
                                    <input type="checkbox" name="remove_profile_photo" value="1" class="rounded border-slate-300 text-red-600 focus:ring-red-500">
                                    <span>Hapus foto &amp; gunakan foto default</span>
                                </label>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- General Card -->
            <div class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] pb-3 border-b border-slate-100 dark:border-slate-800">
                    Informasi Utama &amp; Ketersediaan
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="display_name" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="display_name" 
                            name="display_name" 
                            value="{{ old('display_name', $profile->display_name) }}" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>

                    <div>
                        <label for="email_public" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Email Publik
                        </label>
                        <input 
                            type="email" 
                            id="email_public" 
                            name="email_public" 
                            value="{{ old('email_public', $profile->email_public) }}" 
                            placeholder="anang.developer@example.com"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div>
                        <label for="location" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Lokasi
                        </label>
                        <input 
                            type="text" 
                            id="location" 
                            name="location" 
                            value="{{ old('location', $profile->location) }}" 
                            placeholder="Tangerang Selatan, Indonesia"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>

                    <div class="flex items-center pt-5">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input 
                                type="checkbox" 
                                name="availability_status" 
                                value="1"
                                {{ old('availability_status', $profile->availability_status) ? 'checked' : '' }}
                                class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500 dark:border-slate-700 dark:bg-slate-900"
                            />
                            <div>
                                <span class="text-xs font-semibold text-slate-800 dark:text-slate-200 block">
                                    Status Ketersediaan Proyek (Available)
                                </span>
                                <span class="text-[11px] text-slate-400 block">
                                    Tampilkan lencana hijau "Available for new projects" di Hero.
                                </span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Bilingual Editorial Headlines & Bio -->
            <div class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] pb-3 border-b border-slate-100 dark:border-slate-800">
                    Headline &amp; Biografi Bilingual
                </h2>

                <div class="space-y-4">
                    <div>
                        <label for="headline_id" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Headline Utama (Bahasa Indonesia) <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="headline_id" 
                            name="headline_id" 
                            value="{{ old('headline_id', $profile->headline_id) }}" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>

                    <div>
                        <label for="headline_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Headline Utama (English) <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="headline_en" 
                            name="headline_en" 
                            value="{{ old('headline_en', $profile->headline_en) }}" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>

                    <div>
                        <label for="bio_id" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Biografi Singkat (Bahasa Indonesia) <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="bio_id" 
                            name="bio_id" 
                            rows="3" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500 resize-none">{{ old('bio_id', $profile->bio_id) }}</textarea>
                    </div>

                    <div>
                        <label for="bio_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Biografi Singkat (English) <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="bio_en" 
                            name="bio_en" 
                            rows="3" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500 resize-none">{{ old('bio_en', $profile->bio_en) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Social Links & CV Document -->
            <div class="p-6 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-4">
                <h2 class="text-sm font-bold text-[#0F172A] dark:text-[#F8FAFC] pb-3 border-b border-slate-100 dark:border-slate-800">
                    Tautan Profesional &amp; Berkas CV
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="github_url" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            URL Profil GitHub
                        </label>
                        <input 
                            type="url" 
                            id="github_url" 
                            name="github_url" 
                            value="{{ old('github_url', $profile->github_url) }}" 
                            placeholder="https://github.com/AnangML"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>

                    <div>
                        <label for="linkedin_url" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            URL Profil LinkedIn
                        </label>
                        <input 
                            type="url" 
                            id="linkedin_url" 
                            name="linkedin_url" 
                            value="{{ old('linkedin_url', $profile->linkedin_url) }}" 
                            placeholder="https://linkedin.com/in/username"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        />
                    </div>
                </div>

                <div class="pt-2">
                    <label for="cv_file" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                        Unggah Berkas CV / Resume (Format PDF, Maks. 5MB)
                    </label>
                    <input 
                        type="file" 
                        id="cv_file" 
                        name="cv_file" 
                        accept="application/pdf"
                        class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-950/60 dark:file:text-blue-300 cursor-pointer"
                    />
                    @if($profile->cv_file_path)
                        <p class="text-[11px] text-slate-400 mt-1 font-mono">
                            Berkas aktif tersimpan: {{ $profile->cv_file_path }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end gap-3 pt-2">
                <button 
                    type="submit" 
                    class="px-7 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs shadow-md shadow-blue-500/20 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                    Simpan Perubahan Profil
                </button>
            </div>
        </form>

    </div>
</x-layouts.admin>

