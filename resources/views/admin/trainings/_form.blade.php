@props([
    'training' => null,
    'subVocations' => [],
    'types' => [],
    'locationTypes' => [],
    'provinces' => [],
    'regions' => [],
])

@php
    $isEdit = isset($training) && $training->exists;
    $initialProvince = old('province', $training->province ?? 'Banten');
    $initialCity = old('city', $training->city ?? 'Kota Tangerang Selatan');
    $initialLocationType = old('location_type', $training->location_type ?? 'offline');
@endphp

<div 
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
    class="space-y-8"
>

    <!-- SECTION 1: Informasi Dasar Seminar / Pelatihan -->
    <div class="bg-white dark:bg-[#1E293B] p-6 sm:p-8 rounded-3xl border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-6">
        <div>
            <h2 class="text-base font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                Informasi Utama Seminar / Pelatihan
            </h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                Lengkapi judul kegiatan, nama lembaga penyelenggara, jenis kegiatan, dan sertifikasi.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Judul (Bahasa Indonesia) -->
            <div class="sm:col-span-2">
                <label for="title_id" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    Judul Seminar / Pelatihan (Bahasa Indonesia) <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="title_id" 
                    id="title_id" 
                    value="{{ old('title_id', $training->title_id ?? '') }}" 
                    required 
                    placeholder="Contoh: Pelatihan Rekayasa Perangkat Lunak Berbasis Cloud & Microservices" 
                    class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200"
                >
                @error('title_id')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Judul (English / Opsional) -->
            <div class="sm:col-span-2">
                <label for="title_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    Judul Seminar / Pelatihan (English — Opsional)
                </label>
                <input 
                    type="text" 
                    name="title_en" 
                    id="title_en" 
                    value="{{ old('title_en', $training->title_en ?? '') }}" 
                    placeholder="Contoh: Cloud & Microservices Software Engineering Training" 
                    class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200"
                >
                @error('title_en')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Lembaga Pelatihan / Penyelenggara -->
            <div>
                <label for="organizer" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    Lembaga Pelatihan / Penyelenggara <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="organizer" 
                    id="organizer" 
                    value="{{ old('organizer', $training->organizer ?? '') }}" 
                    required 
                    placeholder="Contoh: Balai Latihan Kerja (BLK), BPSDM Kominfo, Google, Dicoding, Kemnaker" 
                    class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200"
                >
                @error('organizer')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Jenis Kegiatan -->
            <div>
                <label for="type" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    Jenis Kegiatan <span class="text-red-500">*</span>
                </label>
                <select 
                    name="type" 
                    id="type" 
                    required 
                    class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200 font-medium"
                >
                    @foreach($types as $key => $typeData)
                        <option value="{{ $key }}" {{ old('type', $training->type ?? 'seminar') === $key ? 'selected' : '' }}>
                            {{ $typeData['id'] }} ({{ $typeData['en'] }})
                        </option>
                    @endforeach
                </select>
                @error('type')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <!-- SECTION 2: Klasifikasi Kejuruan & Sub Kejuruan -->
    <div class="bg-white dark:bg-[#1E293B] p-6 sm:p-8 rounded-3xl border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-6">
        <div>
            <h2 class="text-base font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                Klasifikasi Kejuruan &amp; Spesialisasi
            </h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                Tentukan rumpun kejuruan dan sub kejuruan IT resmi dengan label dwibahasa (Indonesia / English).
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Kejuruan (Vocation) -->
            <div>
                <label for="vocation" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    Kejuruan Utama <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="vocation" 
                    id="vocation" 
                    list="vocation-suggestions" 
                    value="{{ old('vocation', $training->vocation ?? 'Teknologi Informasi dan Komunikasi') }}" 
                    required 
                    placeholder="Contoh: Teknologi Informasi dan Komunikasi" 
                    class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200"
                >
                <datalist id="vocation-suggestions">
                    <option value="Teknologi Informasi dan Komunikasi">
                    <option value="Teknik Komputer dan Informatika">
                    <option value="Rekayasa Perangkat Lunak">
                    <option value="Sistem Informasi">
                    <option value="Bisnis dan Manajemen Digital">
                </datalist>
                <span class="text-[11px] text-slate-400 mt-1 block">Rumpun kejuruan induk (Standar BNSP / Kemnaker).</span>
                @error('vocation')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Sub Kejuruan (11 Pilihan dengan Bahasa Indonesia & English) -->
            <div>
                <label for="sub_vocation" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    Sub Kejuruan / Bidang Spesialisasi <span class="text-red-500">*</span>
                </label>
                <select 
                    name="sub_vocation" 
                    id="sub_vocation" 
                    required 
                    class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200 font-semibold"
                >
                    <option value="" disabled {{ old('sub_vocation', $training->sub_vocation ?? '') ? '' : 'selected' }}>
                        -- Pilih Salah Satu Sub Kejuruan --
                    </option>
                    @foreach($subVocations as $subKey => $subData)
                        <option value="{{ $subKey }}" {{ old('sub_vocation', $training->sub_vocation ?? '') === $subKey ? 'selected' : '' }}>
                            {{ $subData['id'] }} ({{ $subData['en'] }})
                        </option>
                    @endforeach
                </select>
                <span class="text-[11px] text-blue-600 dark:text-sky-400 mt-1 block">
                    11 Pilihan: Networking, Technical Support, Computer Engineering, Pemrograman, Multimedia, Database, System Analyst, AI, Public Relations, Graphic Design, IT Governance.
                </span>
                @error('sub_vocation')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <!-- SECTION 3: Lokasi Pelaksanaan & Data Administratif Indonesia (BPS / Kemendagri) -->
    <div class="bg-white dark:bg-[#1E293B] p-6 sm:p-8 rounded-3xl border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-6">
        <div>
            <div class="flex items-center justify-between">
                <h2 class="text-base font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                    Lokasi &amp; Daerah Pelaksanaan
                </h2>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-mono bg-blue-50 text-blue-700 dark:bg-blue-950/60 dark:text-sky-300 border border-blue-200/60">
                    <svg class="w-3 h-3 text-blue-600 dark:text-sky-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"/>
                    </svg>
                    Data 38 Provinsi &amp; 514 Kota Resmi (Kemendagri / BPS)
                </span>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                Pilih format tatap muka (cascading dropdown Provinsi &rarr; Kota/Kabupaten), daring (webinar), atau luar negeri.
            </p>
        </div>

        <!-- Tipe Lokasi Tabs -->
        <div>
            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                Format Pelaksanaan <span class="text-red-500">*</span>
            </label>
            <div class="grid grid-cols-3 gap-3">
                <label 
                    class="flex items-center justify-center gap-2 p-3 rounded-2xl border cursor-pointer text-xs font-medium transition-all"
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
                    class="flex items-center justify-center gap-2 p-3 rounded-2xl border cursor-pointer text-xs font-medium transition-all"
                    :class="locationType === 'online' ? 'bg-blue-50/80 dark:bg-blue-950/60 border-blue-500 text-blue-700 dark:text-sky-300 ring-2 ring-blue-500/20' : 'bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:border-slate-300'"
                >
                    <input type="radio" name="location_type" value="online" x-model="locationType" class="sr-only">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>Daring / Webinar (Online)</span>
                </label>

                <label 
                    class="flex items-center justify-center gap-2 p-3 rounded-2xl border cursor-pointer text-xs font-medium transition-all"
                    :class="locationType === 'international' ? 'bg-blue-50/80 dark:bg-blue-950/60 border-blue-500 text-blue-700 dark:text-sky-300 ring-2 ring-blue-500/20' : 'bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:border-slate-300'"
                >
                    <input type="radio" name="location_type" value="international" x-model="locationType" class="sr-only">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Luar Negeri (International)</span>
                </label>
            </div>
            @error('location_type')
                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Opsi 1: Tatap Muka di Indonesia (Cascading Dropdown BPS / Kemendagri) -->
        <div x-show="locationType === 'offline'" x-transition class="space-y-4 pt-2">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Dropdown Provinsi (38 Provinsi Indonesia) -->
                <div>
                    <label for="province" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Pilih Provinsi <span class="text-red-500">*</span>
                    </label>
                    <select 
                        name="province" 
                        id="province" 
                        x-model="selectedProvince" 
                        @change="updateCities(false)" 
                        class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200 font-medium"
                    >
                        <option value="">-- Pilih Provinsi --</option>
                        <template x-for="prov in provinces" :key="prov">
                            <option :value="prov" x-text="prov" :selected="prov === selectedProvince"></option>
                        </template>
                    </select>
                    @error('province')
                        <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Dropdown Kota / Kabupaten (Menyesuaikan Provinsi yang dipilih) -->
                <div>
                    <label for="city" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Pilih Kota / Kabupaten <span class="text-red-500">*</span>
                    </label>
                    <select 
                        name="city" 
                        id="city" 
                        x-model="selectedCity" 
                        class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200 font-medium"
                    >
                        <option value="">-- Pilih Kota/Kabupaten --</option>
                        <template x-for="itemCity in availableCities" :key="itemCity">
                            <option :value="itemCity" x-text="itemCity" :selected="itemCity === selectedCity"></option>
                        </template>
                    </select>
                    @error('city')
                        <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Detail Tempat / Gedung / Venue -->
            <div>
                <label for="venue_or_platform_offline" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    Nama Gedung / Kampus / Tempat Acara (Opsional)
                </label>
                <input 
                    type="text" 
                    name="venue_or_platform" 
                    id="venue_or_platform_offline" 
                    value="{{ old('venue_or_platform', $training->venue_or_platform ?? '') }}" 
                    placeholder="Contoh: Gedung Graha Sabha Pramana, Kampus UNPAM Viktor Lt. 8, Hotel Santika" 
                    class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200"
                >
            </div>
        </div>

        <!-- Opsi 2: Daring / Webinar (Online) -->
        <div x-show="locationType === 'online'" x-transition class="space-y-4 pt-2">
            <div>
                <label for="venue_or_platform_online" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    Platform / Saluran Daring (Online Meeting)
                </label>
                <input 
                    type="text" 
                    name="venue_or_platform" 
                    id="venue_or_platform_online" 
                    value="{{ old('venue_or_platform', $training->venue_or_platform ?? '') }}" 
                    placeholder="Contoh: Zoom Meeting, Google Meet, YouTube Live, LMS Dicoding, Coursera" 
                    class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200"
                >
            </div>
        </div>

        <!-- Opsi 3: Luar Negeri (International) -->
        <div x-show="locationType === 'international'" x-transition class="space-y-4 pt-2">
            <div>
                <label for="venue_or_platform_intl" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    Negara, Kota, &amp; Lokasi Luar Negeri
                </label>
                <input 
                    type="text" 
                    name="venue_or_platform" 
                    id="venue_or_platform_intl" 
                    value="{{ old('venue_or_platform', $training->venue_or_platform ?? '') }}" 
                    placeholder="Contoh: Singapore Expo, Singapura / Kuala Lumpur, Malaysia" 
                    class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200"
                >
            </div>
        </div>
    </div>

    <!-- SECTION 4: Tanggal Pelaksanaan & Dokumen Sertifikat -->
    <div class="bg-white dark:bg-[#1E293B] p-6 sm:p-8 rounded-3xl border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-6">
        <div>
            <h2 class="text-base font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                Waktu Pelaksanaan &amp; Sertifikat
            </h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                Tentukan tanggal kegiatan berlangsung dan unggah salinan bukti sertifikat kelulusan.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Tanggal Mulai -->
            <div>
                <label for="start_date" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    Tanggal Mulai / Pelaksanaan <span class="text-red-500">*</span>
                </label>
                <input 
                    type="date" 
                    name="start_date" 
                    id="start_date" 
                    value="{{ old('start_date', isset($training->start_date) ? $training->start_date->format('Y-m-d') : '') }}" 
                    required 
                    class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200"
                >
                @error('start_date')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tanggal Selesai -->
            <div>
                <label for="end_date" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    Tanggal Selesai (Kosongkan bila 1 hari)
                </label>
                <input 
                    type="date" 
                    name="end_date" 
                    id="end_date" 
                    value="{{ old('end_date', isset($training->end_date) ? $training->end_date->format('Y-m-d') : '') }}" 
                    class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200"
                >
                @error('end_date')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Upload File Sertifikat (PDF / JPG / PNG) -->
            <div>
                <label for="certificate_file" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    File Sertifikat (PDF, PNG, JPG — Max 5MB)
                </label>
                <input 
                    type="file" 
                    name="certificate_file" 
                    id="certificate_file" 
                    accept=".pdf,.png,.jpg,.jpeg,.webp" 
                    class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-slate-800 dark:file:text-slate-200"
                >
                @if($isEdit && $training->certificate_file_path)
                    <div class="mt-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-900/60 border border-slate-200 dark:border-slate-800 flex items-center justify-between">
                        <a href="{{ Storage::disk('public')->url($training->certificate_file_path) }}" target="_blank" class="text-xs text-blue-600 dark:text-sky-400 hover:underline flex items-center gap-1.5 font-medium">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            <span>Lihat Sertifikat Tersimpan</span>
                        </a>
                        <label class="flex items-center gap-1.5 text-[11px] text-red-600 cursor-pointer">
                            <input type="checkbox" name="remove_certificate_file" value="1" class="rounded border-slate-300 text-red-600 focus:ring-red-500">
                            <span>Hapus File</span>
                        </label>
                    </div>
                @endif
                @error('certificate_file')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- URL Verifikasi Sertifikat / Credential -->
            <div>
                <label for="certificate_url" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    Tautan Verifikasi Daring (Credential URL)
                </label>
                <input 
                    type="url" 
                    name="certificate_url" 
                    id="certificate_url" 
                    value="{{ old('certificate_url', $training->certificate_url ?? '') }}" 
                    placeholder="https://coursera.org/verify/... atau https://dicoding.com/certificates/..." 
                    class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200"
                >
                @error('certificate_url')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <!-- SECTION 5: Ringkasan Materi & Pengaturan Tampilan -->
    <div class="bg-white dark:bg-[#1E293B] p-6 sm:p-8 rounded-3xl border border-slate-200/90 dark:border-slate-800 shadow-xs space-y-6">
        <div>
            <h2 class="text-base font-bold text-[#0F172A] dark:text-[#F8FAFC]">
                Ringkasan Silabus &amp; Pengaturan
            </h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                Catatan ringkas topik materi yang dipelajari dan visibilitas di portofolio publik.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Deskripsi (ID) -->
            <div>
                <label for="description_id" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    Materi / Silabus yang Dipelajari (Bahasa Indonesia)
                </label>
                <textarea 
                    name="description_id" 
                    id="description_id" 
                    rows="3" 
                    placeholder="Contoh: Mempelajari konfigurasi router MikroTik, subnetting VLSM, routing protokol OSPF/BGP, dan keamanan firewall jaringan enterprise." 
                    class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200 leading-relaxed"
                >{{ old('description_id', $training->description_id ?? '') }}</textarea>
                @error('description_id')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Deskripsi (EN) -->
            <div>
                <label for="description_en" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-2">
                    Materi / Silabus (English — Opsional)
                </label>
                <textarea 
                    name="description_en" 
                    id="description_en" 
                    rows="3" 
                    placeholder="Example: Covered MikroTik routing configurations, VLSM subnetting, OSPF/BGP dynamic routing protocols, and enterprise network firewall security." 
                    class="w-full px-4 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200 leading-relaxed"
                >{{ old('description_en', $training->description_en ?? '') }}</textarea>
                @error('description_en')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Urutan & Visibilitas -->
            <div class="sm:col-span-2 pt-2 flex flex-wrap items-center justify-between gap-4 border-t border-slate-100 dark:border-slate-800">
                <div class="flex items-center gap-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="is_visible" 
                            value="1" 
                            {{ old('is_visible', $training->is_visible ?? true) ? 'checked' : '' }} 
                            class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                        >
                        <span class="text-xs font-semibold text-slate-700 dark:text-slate-300">
                            Tampilkan di Portofolio Publik
                        </span>
                    </label>

                    <div class="flex items-center gap-2">
                        <label for="sort_order" class="text-xs font-semibold text-slate-700 dark:text-slate-300">
                            Urutan:
                        </label>
                        <input 
                            type="number" 
                            name="sort_order" 
                            id="sort_order" 
                            value="{{ old('sort_order', $training->sort_order ?? 0) }}" 
                            class="w-20 px-3 py-1.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-slate-200"
                        >
                    </div>
                </div>

                <!-- Action Button -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.trainings.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-semibold text-xs hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs shadow-sm shadow-blue-500/20 hover:-translate-y-0.5 active:translate-y-0 transition-all">
                        {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Data Pelatihan' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

