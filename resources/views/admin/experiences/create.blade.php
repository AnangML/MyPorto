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

        @php
            $initialProvince = old('province', 'Banten');
            $initialCity = old('city', 'Kota Tangerang Selatan');
            $initialLocationType = old('location_type', 'offline');
        @endphp

        <form 
            method="POST" 
            action="{{ route('admin.experiences.store') }}" 
            x-data="{
                locationType: @js($initialLocationType),
                selectedProvince: @js($initialProvince),
                selectedCity: @js($initialCity),
                regions: @js($regions),
                provinces: @js($provinces),
                availableCities: [],
                init() {
                    this.updateCities(true);
                },
                updateCities(isInitial = false) {
                    if (this.selectedProvince && this.regions[this.selectedProvince]) {
                        this.availableCities = this.regions[this.selectedProvince];
                        if (!isInitial || !this.selectedCity || !this.availableCities.includes(this.selectedCity)) {
                            if (!isInitial) {
                                this.selectedCity = this.availableCities[0] || '';
                            }
                        }
                    } else {
                        this.availableCities = [];
                        this.selectedCity = '';
                    }
                }
            }"
            class="p-6 sm:p-8 rounded-3xl bg-white dark:bg-[#1E293B] border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-6"
        >
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

            <!-- Lokasi & Format Pelaksanaan (BPS / Kemendagri) -->
            <div class="pt-4 border-t border-slate-100 dark:border-slate-800 space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <label class="block text-xs font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                            Lokasi &amp; Format Pelaksanaan
                        </label>
                        <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">
                            Pilih format kerja/studi: tatap muka di Indonesia (Provinsi &rarr; Kota), daring/remote, atau luar negeri.
                        </p>
                    </div>
                    <span class="hidden sm:inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-mono bg-blue-50 text-blue-700 dark:bg-blue-950/60 dark:text-sky-300 border border-blue-200/60">
                        38 Provinsi &amp; 514 Kota BPS
                    </span>
                </div>

                <!-- Tipe Lokasi Radio Tabs -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                    <label 
                        class="flex items-center justify-center gap-2 p-2.5 rounded-xl border cursor-pointer text-xs font-medium transition-all"
                        :class="locationType === 'offline' ? 'bg-blue-50/80 dark:bg-blue-950/60 border-blue-500 text-blue-700 dark:text-sky-300 ring-2 ring-blue-500/20' : 'bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:border-slate-300'"
                    >
                        <input type="radio" name="location_type" value="offline" x-model="locationType" class="sr-only">
                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Tatap Muka (Indonesia)</span>
                    </label>

                    <label 
                        class="flex items-center justify-center gap-2 p-2.5 rounded-xl border cursor-pointer text-xs font-medium transition-all"
                        :class="locationType === 'online' ? 'bg-blue-50/80 dark:bg-blue-950/60 border-blue-500 text-blue-700 dark:text-sky-300 ring-2 ring-blue-500/20' : 'bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:border-slate-300'"
                    >
                        <input type="radio" name="location_type" value="online" x-model="locationType" class="sr-only">
                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Daring / Remote / WFH</span>
                    </label>

                    <label 
                        class="flex items-center justify-center gap-2 p-2.5 rounded-xl border cursor-pointer text-xs font-medium transition-all"
                        :class="locationType === 'international' ? 'bg-blue-50/80 dark:bg-blue-950/60 border-blue-500 text-blue-700 dark:text-sky-300 ring-2 ring-blue-500/20' : 'bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:border-slate-300'"
                    >
                        <input type="radio" name="location_type" value="international" x-model="locationType" class="sr-only">
                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Luar Negeri (International)</span>
                    </label>
                </div>

                <!-- Opsi 1: Tatap Muka di Indonesia (Cascading Dropdown BPS / Kemendagri) -->
                <div x-show="locationType === 'offline'" x-transition class="space-y-3 pt-1">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Dropdown Provinsi -->
                        <div>
                            <label for="province" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                                Provinsi <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="province" 
                                id="province" 
                                x-model="selectedProvince" 
                                @change="updateCities(false)" 
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 font-medium"
                            >
                                <option value="">-- Pilih Provinsi --</option>
                                <template x-for="prov in provinces" :key="prov">
                                    <option :value="prov" x-text="prov" :selected="prov === selectedProvince"></option>
                                </template>
                            </select>
                        </div>

                        <!-- Dropdown Kota / Kabupaten -->
                        <div>
                            <label for="city" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                                Kota / Kabupaten <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="city" 
                                id="city" 
                                x-model="selectedCity" 
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500 font-medium"
                            >
                                <option value="">-- Pilih Kota / Kabupaten --</option>
                                <template x-for="itemCity in availableCities" :key="itemCity">
                                    <option :value="itemCity" x-text="itemCity" :selected="itemCity === selectedCity"></option>
                                </template>
                            </select>
                        </div>
                    </div>

                    <!-- Gedung / Tempat / Kampus / Kantor -->
                    <div>
                        <label for="venue_or_platform_offline" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Gedung / Kampus / Kantor (Opsional)
                        </label>
                        <input 
                            type="text" 
                            name="venue_or_platform" 
                            id="venue_or_platform_offline" 
                            value="{{ old('venue_or_platform') }}" 
                            placeholder="Contoh: Kampus UNPAM Viktor Lt. 8, Gedung Cyber 2, Menara BCA" 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500"
                        />
                    </div>
                </div>

                <!-- Opsi 2: Daring / Remote / WFH -->
                <div x-show="locationType === 'online'" x-transition class="space-y-3 pt-1">
                    <div>
                        <label for="venue_or_platform_online" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Keterangan Format Remote (Opsional)
                        </label>
                        <input 
                            type="text" 
                            name="venue_or_platform" 
                            id="venue_or_platform_online" 
                            value="{{ old('venue_or_platform') }}" 
                            placeholder="Contoh: Remote / WFH, Hybrid, Full Remote (Indonesia)" 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500"
                        />
                    </div>
                </div>

                <!-- Opsi 3: Luar Negeri (International) -->
                <div x-show="locationType === 'international'" x-transition class="space-y-3 pt-1">
                    <div>
                        <label for="venue_or_platform_intl" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Negara &amp; Kota Luar Negeri
                        </label>
                        <input 
                            type="text" 
                            name="venue_or_platform" 
                            id="venue_or_platform_intl" 
                            value="{{ old('venue_or_platform') }}" 
                            placeholder="Contoh: Singapura, Tokyo (Jepang), San Francisco (USA)" 
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-[#0F172A] text-slate-900 dark:text-white text-xs focus:border-blue-500"
                        />
                    </div>
                </div>
            </div>

            <div class="pt-2">
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

