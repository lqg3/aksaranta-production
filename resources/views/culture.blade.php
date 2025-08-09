@extends('layouts.general')

@section('title', 'Batak Culture')

@section('body-class', 'font-title bg-bg-dark text-white')

@section('content')

    <section
        class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 my-20 lg:my-28 flex flex-col lg:flex-row justify-between gap-12">
        <div class="w-full lg:w-1/2 flex flex-col justify-between gap-6">
            <h2 class="text-red-400">Apa itu Batak?</h2>
            <h3 class="font-bold text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wider">
                Budaya <span class="text-red-400">Batak</span>
            </h3>
            <p class="font-sans text-sm sm:text-base md:text-lg">
                Batak adalah suku etnis terbesar ketiga di Indonesia
                <sup class="relative inline-block group align-super">
                    <a href="https://indonesia.go.id/mediapublik/detail/2071" target="_blank" rel="noopener noreferrer"
                        class="underline text-red-400">[s]</a>
                    <span
                        class="pointer-events-none absolute bottom-full left-1/2 z-10 mb-2 -translate-x-1/2 whitespace-nowrap rounded bg-gray-800 px-2 py-1 text-xs text-white opacity-0 transition-opacity duration-150 group-hover:opacity-100">
                        indonesia.go.id (Klik untuk melihat sumber)
                        <span class="absolute left-1/2 top-full -translate-x-1/2 h-2 w-2 rotate-45 bg-gray-800"></span>
                    </span>
                </sup>
                setelah suku Sunda dan suku Jawa. Nama suku Batak dapat digunakan untuk mengidentifikasikan beberapa suku
                yang berasal dari Sumatera Utara. Selain itu, kata 'Batak' dapat digunakan untuk mengidentifikasikan
                suku-suku yang berbicara menggunakan bahasa Batak seperti suku Karo, Pakpak, Simalungun, Toba, Angkola,
                Mandailing, dan suku-suku lainnya dengan bahasa dan adat-adat yang berbeda.
            </p>
        </div>
        <div class="w-full lg:w-1/2 flex justify-center lg:justify-end">
            <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img10.webp" alt="Tour Guide"
                class="w-full max-w-md object-cover rounded-[36px]" />
        </div>
    </section>

<section 
    name="culture-navigation" 
    class="sticky top-0 z-30 pt-20 sm:px-4 scroll-smooth sm:!text-sm bg-bg-dark bg-opacity-50"
    x-data="{
        active: '',
        links: [
            { id: 'lebih-dari-satu-batak', label: 'Subetnis Batak' },
            { id: 'marga', label: 'Sistem Marga' },
            { id: 'religi', label: 'Religi' }
        ],
        onScroll() {
            // Find all sections
            let found = '';
            for (const link of this.links) {
                const el = document.getElementById(link.id);
                if (el) {
                    const rect = el.getBoundingClientRect();
                    if (rect.top <= 120) {
                        found = link.id;
                    }
                }
            }
            this.active = found;
        }
    }"
    x-init="window.addEventListener('scroll', () => onScroll()); onScroll();"
>
    <ul class="flex flex-wrap gap-2 justify-center">
        <template x-for="(link, idx) in links" :key="link.id + idx">
            <li class="flex-1 max-w-xs">
                <a 
                    :href="'#' + link.id"
                    :class="active === link.id 
                        ? 'block text-center text-white text-opacity-80 hover:text-opacity-100 cursor-pointer transition-colors duration-150 scroll-smooth py-2 px-3 rounded-lg sm:text-base text-sm'
                        : 'block text-center text-white text-opacity-50 hover:text-opacity-100 cursor-pointer transition-colors duration-150 scroll-smooth py-2 px-3 rounded-lg sm:text-base text-sm'"
                    x-text="link.label"
                ></a>
            </li>
        </template>
    </ul>
</section>
<style>
    html {
        scroll-behavior: smooth;
    }

    /* Horizontal scrollbar styling (gray) for the marga table */
    #marga-chips-scroll {
        scrollbar-width: thin;                /* Firefox */
        scrollbar-color: #9ca3af transparent; /* gray-400 on transparent track */
    }
    #marga-chips-scroll::-webkit-scrollbar {  /* Chrome/Safari/Edge */
        height: 8px;
    }
    #marga-chips-scroll::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.08);
        border-radius: 9999px;
    }
    #marga-chips-scroll::-webkit-scrollbar-thumb {
        background: #9ca3af; /* gray-400 */
        border-radius: 9999px;
    }
    #marga-chips-scroll::-webkit-scrollbar-thumb:hover {
        background: #6b7280; /* gray-500 */
    }
</style>

    <hr class="border-red-800 border-opacity-30 my-10"  id="lebih-dari-satu-batak">

    <!-- Batak Subpeople Section -->
    <section class="flex flex-col gap-8">

    <!-- Batak Toba -->

        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <h3 class="text-red-400 text-center my-3 text-sm sm:text-base">Lebih dari satu Batak</h3>
            <h2 class="text-center text-2xl sm:text-3xl md:text-4xl">Suku Batak terdiri dari <span
                    class="text-red-400">enam</span> sub-etnis yang berbeda.</h2>
            <div class="flex flex-col lg:justify-between lg:flex-row w-full my-10 gap-10">
                <div class="w-full lg:w-1/2 flex justify-center items-center">
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img15.webp"
                        alt="Kharisma Indonesia" class="w-full max-w-md rounded-[36px] aspect-video" />
                </div>
                <div class="w-full lg:w-1/2 flex flex-col justify-center gap-5">
                    <h3 class="text-red-400">Suku Batak Terbesar</h3>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide">
                        Batak Toba
                    </h2>
                    <p class="font-sans text-sm sm:text-base">
                        Suku Batak Toba adalah suku Batak terbesar dan memiliki populasi paling banyak di Indonesia. Suku Batak
                        ini umumnya menempati di daerah sekitar Danu Toba dan Pulau Samosir. Suku Batak Toba memiliki sistem
                        tradisi
                        turunan yang kuat, dan bangunan tradisional Rumah Bolon.
                    </p>
                </div>
            </div>
        </div>

        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <div class="flex flex-col lg:justify-between lg:flex-row w-full my-10 gap-10">
                <div class="w-full lg:w-1/2 flex justify-center items-center">
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img34.webp"
                        alt="Kharisma Indonesia" class="w-full max-w-md rounded-[36px] aspect-video" />
                </div>
                <div class="w-full lg:w-1/2 flex flex-col justify-center gap-5">
                    <h3 class="text-red-400">Merga Silima: Lima Marga Induk</h3>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide">
                        Batak Karo
                    </h2>
                    <p class="font-sans text-sm sm:text-base">
                        Suku Batak Karo mendiami Dataran Tinggi Karo di Sumatera Utara, seperti Kabupaten Karo, Kabanjahe, dan Berastagi. Keunikan utama masyarakat Karo terletak pada sistem sosial Merga Silima, yaitu struktur masyarakat yang didasarkan pada lima marga induk (Ginting, Karo-karo, Perangin-angin, Sembiring, dan Tarigan). Orang Karo memiliki bahasa, aksara, dan adat istiadat sendiri yang sangat kaya. Mereka dikenal sebagai masyarakat agraris yang pekerja keras, dengan ikatan kekerabatan yang erat dan sangat menjunjung tinggi tradisi leluhur.
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <div class="flex flex-col lg:justify-between lg:flex-row w-full my-10 gap-10">
                <div class="w-full lg:w-1/2 flex justify-center items-center">
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img35.webp"
                        alt="Kharisma Indonesia" class="w-full max-w-md rounded-[36px] aspect-video" />
                </div>
                <div class="w-full lg:w-1/2 flex flex-col justify-center gap-5">
                    <h3 class="text-red-400">Harajaon: Kerajaan-Kerajaan Simalungun</h3>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide">
                        Batak Simalungun
                    </h2>
                    <p class="font-sans text-sm sm:text-base">
                        Suku Batak Simalungun berasal dari wilayah Simalungun di Sumatera Utara, yang dikenal dengan sejarah kerajaan-kerajaan kecil (Harajaon) dan sistem pemerintahan adat yang unik. Simalungun memiliki bahasa dan aksara sendiri, serta adat istiadat yang khas, seperti upacara adat dan musik tradisional Gondang Simalungun. Rumah adat Bolon Simalungun dan kain tradisional Hiou menjadi ciri khas budaya mereka. Masyarakat Simalungun dikenal ramah, menjunjung tinggi nilai gotong royong, dan memiliki tradisi pertanian yang kuat di sekitar Danau Toba dan dataran tinggi sekitarnya.
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <div class="flex flex-col lg:justify-between lg:flex-row w-full my-10 gap-10">
                <div class="w-full lg:w-1/2 flex justify-center items-center">
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img36.webp"
                        alt="Kharisma Indonesia" class="w-full max-w-md rounded-[36px] aspect-video" />
                </div>
                <div class="w-full lg:w-1/2 flex flex-col justify-center gap-5">
                    <h3 class="text-red-400">Silima Suak: Lima Subkelompok Pakpak</h3>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide">
                        Batak Pakpak
                    </h2>
                    <p class="font-sans text-sm sm:text-base">
                        Suku Batak Pakpak mendiami wilayah Dairi, Pakpak Bharat, dan sebagian Aceh Tenggara. Keunikan Pakpak terletak pada pembagian lima subkelompok utama yang disebut Silima Suak. Bahasa Pakpak, adat istiadat, dan rumah adat Jerro Pakpak menjadi identitas utama mereka. Masyarakat Pakpak dikenal dengan sistem kekerabatan yang erat, tradisi musyawarah (sulang silima), serta upacara adat yang sarat makna. Mereka juga terkenal sebagai petani ulet dan memiliki seni budaya seperti musik dan tarian tradisional yang unik.
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <div class="flex flex-col lg:justify-between lg:flex-row w-full my-10 gap-10">
                <div class="w-full lg:w-1/2 flex justify-center items-center">
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img37.webp"
                        alt="Kharisma Indonesia" class="w-full max-w-md rounded-[36px] aspect-video" />
                </div>
                <div class="w-full lg:w-1/2 flex flex-col justify-center gap-5">
                    <h3 class="text-red-400">Dalihan Na Tolu: Falsafah Hidup Angkola</h3>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide">
                        Batak Angkola
                    </h2>
                    <p class="font-sans text-sm sm:text-base">
                        Suku Batak Angkola berasal dari wilayah Tapanuli Selatan, khususnya di sekitar Sungai Angkola. Masyarakat Angkola sangat menjunjung tinggi falsafah Dalihan Na Tolu dalam kehidupan sehari-hari, yang menjadi dasar sistem kekerabatan dan adat mereka. Mereka memiliki bahasa dan adat istiadat yang khas, serta dikenal dengan tradisi lisan seperti umpasa (pantun) dan upacara adat yang sarat makna. Rumah adat Angkola dan pakaian tradisional ulos menjadi bagian penting dari identitas mereka. Suku Angkola juga dikenal sebagai masyarakat yang religius dan menjunjung tinggi nilai kekeluargaan.
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <div class="flex flex-col lg:justify-between lg:flex-row w-full my-10 gap-10">
                <div class="w-full lg:w-1/2 flex justify-center items-center">
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img38.webp"
                        alt="Kharisma Indonesia" class="w-full max-w-md rounded-[36px] aspect-video" />
                </div>
                <div class="w-full lg:w-1/2 flex flex-col justify-center gap-5">
                    <h3 class="text-red-400">Gordang Sambilan & Tradisi Merantau</h3>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide">
                        Batak Mandailing
                    </h2>
                    <p class="font-sans text-sm sm:text-base">
                        Suku Batak Mandailing berasal dari wilayah Mandailing Natal dan sekitarnya di Sumatera Utara. Mandailing dikenal dengan seni musik Gordang Sambilan yang megah dan tradisi merantau yang kuat. Mereka memiliki bahasa, aksara, dan adat istiadat yang khas, serta menjunjung tinggi sistem Dalihan Na Tolu dalam struktur sosialnya. Masyarakat Mandailing juga terkenal dengan kuliner khas seperti lemang dan sambal tuktuk, serta peran penting dalam penyebaran Islam di Sumatera Utara. Nilai kekeluargaan, adat, dan agama sangat dijaga dalam kehidupan sehari-hari.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <hr class="border-red-800 border-opacity-30 my-10"  id="marga">

    <!-- Batak Marga Section -->
    <section class="flex flex-col gap-8">
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <h3 class="text-red-400 text-center my-3 text-sm sm:text-base">Sistem Kekerabatan</h3>
            <h2 class="text-center text-2xl sm:text-3xl md:text-4xl">Marga dalam masyarakat <span class="text-red-400">Batak</span></h2>
            <p class="font-sans text-center mx-auto max-w-3xl text-sm sm:text-base mt-4">
                Marga menjadi identitas genealogis, mengatur relasi sosial–adat, dan menautkan setiap orang pada leluhur.
            </p>

            <!-- Cards: ringkas, tidak monoton -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
                <div class="bg-white/5 rounded-2xl p-6 h-full">
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/svg1.svg" alt="Ikon Patrilineal" class="mb-4 rounded-xl" />
                    <h4 class="text-lg font-semibold">Patrilineal</h4>
                    <p class="font-sans text-sm mt-2">Marga diturunkan melalui garis ayah dan menjadi penanda utama kekerabatan.</p>
                </div>
                <div class="bg-white/5 rounded-2xl p-6 h-full">
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/svg2.svg" alt="Ikon Dalihan Na Tolu" class="mb-4 rounded-xl" />
                    <h4 class="text-lg font-semibold">Dalihan Na Tolu</h4>
                    <p class="font-sans text-sm mt-2">Falsafah tiga peran (Hula-hula, Boru, Dongan Tubu) yang menata perilaku adat.</p>
                </div>
                <div class="bg-white/5 rounded-2xl p-6 h-full">
                    <!-- TODO: Replace placeholder with a local icon, e.g., asset('img/culture/icon-exogamy.svg') -->
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/svg3.svg" alt="Ikon Eksogami" class="mb-4 rounded-xl" />
                    <h4 class="text-lg font-semibold">Eksogami</h4>
                    <p class="font-sans text-sm mt-2">Perkawinan antarmarga menjaga jejaring, menghindari pernikahan semarga.</p>
                </div>
            </div>

            <!-- Alternating row: gambar di kanan untuk variasi -->
            <div class="flex flex-col lg:flex-row-reverse lg:justify-between w-full my-12 gap-10">
                <div class="w-full lg:w-1/2 flex justify-center items-center">
                    <!-- TODO: Replace placeholder with asset('img/culture/marga-overview.webp') or a relevant SVG/WEBP -->
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img40.webp" alt="Ilustrasi Sistem Marga" class="w-full max-w-md rounded-[36px] aspect-video" />
                </div>
                <div class="w-full lg:w-1/2 flex flex-col justify-center gap-5">
                    <h3 class="text-red-400">Patrilineal & Identitas</h3>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide">Apa itu Marga?</h2>
                    <p class="font-sans text-sm sm:text-base">
                        Marga menautkan individu ke silsilah leluhur, menjadi dasar sapaan, hak–kewajiban adat, serta posisi dalam
                        musyawarah dan upacara. Melalui marga, jejaring sosial terbentuk lintas komunitas Batak.
                    </p>
                </div>
            </div>

            <!-- Stepper roles: Hula-hula, Boru, Dongan Tubu -->
            <div class="bg-white/5 rounded-3xl p-6 sm:p-8">
                <h4 class="text-lg font-semibold mb-4">Peran dalam Dalihan Na Tolu</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="rounded-2xl p-5 bg-white/5">
                        <span class="text-red-400 text-sm">01</span>
                        <h5 class="mt-1 font-semibold">Hula-hula</h5>
                        <p class="font-sans text-sm mt-2">Pihak pemberi perempuan; dihormati dan menjadi sumber berkat dalam adat.</p>
                    </div>
                    <div class="rounded-2xl p-5 bg-white/5">
                        <span class="text-red-400 text-sm">02</span>
                        <h5 class="mt-1 font-semibold">Boru</h5>
                        <p class="font-sans text-sm mt-2">Pihak penerima perempuan; bertugas melayani jalannya prosesi adat.</p>
                    </div>
                    <div class="rounded-2xl p-5 bg-white/5">
                        <span class="text-red-400 text-sm">03</span>
                        <h5 class="mt-1 font-semibold">Dongan Tubu</h5>
                        <p class="font-sans text-sm mt-2">Pihak semarga; penyeimbang yang mendukung dan menjaga kehormatan.</p>
                    </div>
                </div>
            </div>

            <!-- Tabel scroll horizontal: contoh marga per sub-etnis -->
            <div class="mt-10">
                <h4 class="text-lg font-semibold mb-3">Contoh marga pada sub-etnis</h4>
                <div id="marga-chips-scroll" class="overflow-x-auto scroll-smooth pb-2">
                    <table class="min-w-full text-left text-sm font-sans whitespace-nowrap">
                        <thead>
                            <tr class="text-white/70">
                                <th class="py-2 pr-6">Sub-etnis</th>
                                <th class="py-2 pr-6">Contoh marga</th>
                                <th class="py-2 pr-6">Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t border-white/10">
                                <td class="py-3 pr-6">Toba</td>
                                <td class="py-3 pr-6">Simanjuntak, Sihombing, Situmorang, Sitorus, Siahaan, Butarbutar</td>
                                <td class="py-3 pr-6">Sistem Dalihan Na Tolu kuat, larangan semarga</td>
                            </tr>
                            <tr class="border-t border-white/10">
                                <td class="py-3 pr-6">Simalungun</td>
                                <td class="py-3 pr-6">Damanik, Purba, Saragih, Sinaga</td>
                                <td class="py-3 pr-6">Sejarah harajaon (kerajaan kecil)</td>
                            </tr>
                            <tr class="border-t border-white/10">
                                <td class="py-3 pr-6">Karo (Merga Silima)</td>
                                <td class="py-3 pr-6">Ginting, Karo-karo, Perangin-angin, Sembiring, Tarigan</td>
                                <td class="py-3 pr-6">Lima marga induk (Merga Silima)</td>
                            </tr>
                            <tr class="border-t border-white/10">
                                <td class="py-3 pr-6">Pakpak</td>
                                <td class="py-3 pr-6">Berutu, Manik, Padang, Ujung, Solin</td>
                                <td class="py-3 pr-6">Pembagian Silima Suak</td>
                            </tr>
                            <tr class="border-t border-white/10">
                                <td class="py-3 pr-6">Angkola</td>
                                <td class="py-3 pr-6">Harahap, Siregar</td>
                                <td class="py-3 pr-6">Falsafah Dalihan Na Tolu dijunjung</td>
                            </tr>
                            <tr class="border-t border-white/10">
                                <td class="py-3 pr-6">Mandailing</td>
                                <td class="py-3 pr-6">Nasution, Lubis, Hasibuan</td>
                                <td class="py-3 pr-6">Tradisi merantau dan Gordang Sambilan</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-md font-semibold-mb-3">Suku batak memiliki ratusan marga. Untuk melihat marga lain, dapat membaca <a href="https://id.wikipedia.org/wiki/Daftar_marga_Batak" class="text-red-400 underline">artikel ini</a></p>
            </div>
        </div>
    </section>

    <hr class="border-red-800 border-opacity-30 my-10"  id="religi">

    <!-- Batak Religi Section -->
    <section class="flex flex-col gap-8">
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <div class="bg-white/5 rounded-3xl p-6 sm:p-10">
                <h3 class="text-red-400 text-center my-2 text-sm sm:text-base">Kepercayaan & Spiritualitas</h3>
                <h2 class="text-center text-2xl sm:text-3xl md:text-4xl">Religi dalam masyarakat <span class="text-red-400">Batak</span></h2>
                <p class="font-sans text-center mx-auto max-w-3xl text-sm sm:text-base mt-4">
                    Ekspresi religius masyarakat Batak hadir dalam pelbagai bentuk, dari kepercayaan asli hingga agama-agama besar, 
                    berpadu dengan adat dan musik tradisional.
                </p>
            </div>

            <!-- Tiga kartu: Parmalim, Kekristenan, Islam -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
                <div class="bg-white/5 rounded-2xl p-6 h-full flex flex-col">
                    <!-- TODO: Replace placeholder with asset('img/culture/parmalim.webp') -->
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img42.webp" alt="Ugamo Parmalim" class="w-full rounded-2xl aspect-video object-cover" />
                    <h4 class="text-lg font-semibold mt-4">Ugamo Parmalim</h4>
                    <p class="font-sans text-sm mt-2">Kepercayaan asli Batak menekankan keselarasan alam, hormat leluhur, dan etika hidup.</p>
                </div>
                <div class="bg-white/5 rounded-2xl p-6 h-full flex flex-col">
                    <!-- TODO: Replace placeholder with asset('img/culture/kristen.webp') -->
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img41.webp" alt="Kekristenan di Tanah Batak" class="w-full rounded-2xl aspect-video object-cover" />
                    <h4 class="text-lg font-semibold mt-4">Kekristenan</h4>
                    <p class="font-sans text-sm mt-2">Berkembang pesat melalui misi dan pendidikan; berpadu dengan adat dan musik gereja.</p>
                </div>
                <div class="bg-white/5 rounded-2xl p-6 h-full flex flex-col">
                    <!-- TODO: Replace placeholder with asset('img/culture/islam.webp') -->
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img43.webp" class="w-full rounded-2xl aspect-video object-cover" />
                    <h4 class="text-lg font-semibold mt-4">Islam</h4>
                    <p class="font-sans text-sm mt-2">Kuat di Mandailing–Angkola; identitas keislaman berpadu dengan Dalihan Na Tolu.</p>
                </div>
            </div>

            <!-- Alternating row: sorot Parmalim lebih dalam -->
            <div class="flex flex-col lg:justify-between lg:flex-row w-full my-12 gap-10">
                <div class="w-full lg:w-1/2 flex justify-center items-center">
                    <!-- TODO: Replace placeholder with asset('img/culture/parmalim-ritual.webp') -->
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img44.webp" alt="Ritual Parmalim" class="w-full max-w-md rounded-[36px] aspect-video" />
                </div>
                <div class="w-full lg:w-1/2 flex flex-col justify-center gap-5">
                    <h3 class="text-red-400">Warisan Lokal</h3>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide">Parmalim dalam keseharian</h2>
                    <p class="font-sans text-sm sm:text-base">
                        Nilai harmoni dengan alam, doa, dan musik <em>gondang</em> hadir dalam upacara adat dan praktik spiritual.
                        Jejaknya tetap terasa sekalipun masyarakat memeluk agama formal yang beragam.
                    </p>
                </div>
            </div>

            <!-- Kutipan / callout -->
            <div class="bg-white/5 rounded-3xl p-6 sm:p-10">
                <p class="font-sans text-base sm:text-lg italic text-white/90">
                    “Adat do na nioloi, ugamo do na niatur”: adat menuntun pergaulan, agama mengatur batin; keduanya berjalan serasi.
                </p>
            </div>
        </div>
    </section>

    <!-- Extra content: deepen sections -->
    <section class="flex flex-col gap-8 mt-8">
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <!-- Marga: Etika & Siklus Adat -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white/5 rounded-3xl p-6 sm:p-8">
                    <h3 class="text-red-400 text-sm">Etika bertutur (tutur ni halak)</h3>
                    <h4 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide mt-1">Sopan santun dalam relasi marga</h4>
                    <ul class="mt-5 space-y-3 font-sans text-sm sm:text-base list-disc list-inside marker:text-red-400">
                        <li>Kenali posisi: <em>hula-hula</em>, <em>boru</em>, atau <em>dongan tubu</em> sebelum berbicara.</li>
                        <li>Gunakan sapaan adat sesuai hubungan (tutur), hindari memanggil nama langsung pada senior.</li>
                        <li>Dahulukan penghormatan kepada <em>hula-hula</em> dalam musyawarah dan upacara.</li>
                        <li>Jaga tutur dan intonasi saat berunding; utamakan mufakat dan kebersamaan.</li>
                        <li>Berpakaian sopan saat acara adat; pahami aturan ulos dan posisinya.</li>
                    </ul>
                </div>
                <div class="bg-white/5 rounded-3xl p-6 sm:p-8">
                    <h3 class="text-red-400 text-sm">Siklus adat & peran marga</h3>
                    <h4 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide mt-1">Dari lahir hingga kematian</h4>
                    <div class="mt-5 grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="rounded-2xl bg-white/5 p-4">
                            <h5 class="font-semibold">Kelahiran</h5>
                            <p class="font-sans text-sm mt-1">Pemberian nama mempertimbangkan marga dan doa keluarga.</p>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-4">
                            <h5 class="font-semibold">Pernikahan</h5>
                            <p class="font-sans text-sm mt-1">Eksogami antarmarga; peran <em>hula-hula</em> dan <em>boru</em> sangat sentral.</p>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-4">
                            <h5 class="font-semibold">Kematian</h5>
                            <p class="font-sans text-sm mt-1">Upacara dan posisi duduk diatur menurut relasi marga.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Religi: Timeline ringkas -->
            <div class="mt-12 grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-white/5 rounded-3xl p-6 sm:p-8">
                    <h3 class="text-red-400 text-sm">Jejak sejarah (singkat)</h3>
                    <h4 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide mt-1">Perkembangan religi di Tanah Batak</h4>
                    <div class="mt-6 relative pl-6 border-l border-white/10">
                        <div class="mb-6">
                            <span class="absolute -left-2 top-0 w-4 h-4 rounded-full bg-red-500"></span>
                            <p class="text-sm text-white/70">pra-abad 19</p>
                            <p class="font-sans text-sm sm:text-base">Tradisi lokal: kepercayaan terhadap Debata, roh leluhur, dan harmoni alam.</p>
                        </div>
                        <div class="mb-6">
                            <span class="absolute -left-2 w-4 h-4 rounded-full bg-red-500"></span>
                            <p class="text-sm text-white/70">abad 19–20</p>
                            <p class="font-sans text-sm sm:text-base">Masuknya misi dan pendidikan modern: gereja berkembang di berbagai wilayah.</p>
                        </div>
                        <div class="mb-2">
                            <span class="absolute -left-2 w-4 h-4 rounded-full bg-red-500"></span>
                            <p class="text-sm text-white/70">abad 19–kini</p>
                            <p class="font-sans text-sm sm:text-base">Perkembangan Islam kuat di Mandailing–Angkola; ko-eksistensi dengan adat.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white/5 rounded-3xl p-6 sm:p-8">
                    <h3 class="text-red-400 text-sm">Tahukah kamu?</h3>
                    <h4 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide mt-1">Fakta singkat</h4>
                    <ul class="mt-5 space-y-3 font-sans text-sm sm:text-base list-disc list-inside marker:text-red-400">
                        <li>Makna ulos berbeda menurut motif dan peruntukan upacara.</li>
                        <li>Musik <em>gondang</em> hadir dalam ritual adat dan perayaan keagamaan.</li>
                        <li>Bahasa dan marga memengaruhi tutur pada khotbah/adat setempat.</li>
                    </ul>
                </div>
            </div>

            <!-- Religi & Seni: Ruang ibadah dan musik -->
            <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="rounded-3xl bg-white/5 p-6 sm:p-8 flex flex-col">
                    <h3 class="text-red-400 text-sm">Ruang ibadah</h3>
                    <h4 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide mt-1">Jejak arsitektur & komunitas</h4>
                    <p class="font-sans text-sm sm:text-base mt-3">Gereja, masjid, dan ruang pertemuan adat sering berdiri berdekatan, menandai ko-eksistensi yang akrab.</p>
                </div>
                <div class="rounded-3xl bg-white/5 p-6 sm:p-8 flex flex-col">
                    <h3 class="text-red-400 text-sm">Musik & liturgi</h3>
                    <h4 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide mt-1">Gondang, nyanyian, dan inculturasi</h4>
                    <p class="font-sans text-sm sm:text-base mt-3">Unsur musik tradisional kerap hadir dalam ibadah dan perayaan, mencerminkan identitas budaya.</p>
                </div>
            </div>

            <!-- Glosarium mini -->
            <div class="mt-12 bg-white/5 rounded-3xl p-6 sm:p-8">
                <h3 class="text-red-400 text-sm">Glosarium</h3>
                <h4 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide mt-1">Istilah penting</h4>
                <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-2xl bg-white/5 p-4">
                        <h5 class="font-semibold">Hula-hula</h5>
                        <p class="font-sans text-sm mt-1">Pihak pemberi perempuan; dihormati dan menjadi sumber berkat.</p>
                    </div>
                    <div class="rounded-2xl bg-white/5 p-4">
                        <h5 class="font-semibold">Boru</h5>
                        <p class="font-sans text-sm mt-1">Pihak penerima perempuan; penggerak teknis prosesi adat.</p>
                    </div>
                    <div class="rounded-2xl bg-white/5 p-4">
                        <h5 class="font-semibold">Dongan Tubu</h5>
                        <p class="font-sans text-sm mt-1">Pihak semarga; penyeimbang dan pendukung utama.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection