@extends('layouts.general')

@section('title', 'Glosarium & Kamus')

@section('body-class', 'font-title bg-bg-dark text-white')

@section('content')

    <section class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 my-20 lg:my-28 flex flex-col gap-6">
        <div class="flex flex-col gap-3">
            <h2 class="text-red-400">Kamus</h2>
            <h3 class="font-bold text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wider">Glosarium <span class="text-red-400">Aksaranta</span></h3>
            <p class="font-sans text-sm sm:text-base md:text-lg max-w-3xl">Temukan kosakata Batak lintas dialek. Cari, saring, dan jelajahi istilah sehari-hari hingga budaya.</p>
        </div>
    </section>


    
    <section class="flex flex-col gap-8">
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">

            <div class="mt-6 bg-white/5 rounded-3xl p-6 sm:p-8 mb-8">
                <p class="text-sm text-white/70">
                    Karena keterbatasan data, bahasa Batak Toba memiliki jumlah kata yang paling banyak. Proyek
                    <a class="text-red-400 underline" href="https://github.com/IndoNLP/nusax" target="_blank" rel="noopener">NusaX</a>
                    digunakan untuk mendapatkan kata-kata Batak Toba.
                </p>
            </div>


            <div class="bg-white/5 rounded-3xl p-6 sm:p-10" id="search-section">
                <h3 class="text-red-400 text-center my-2 text-sm sm:text-base">Cari Kata</h3>
                <h2 class="text-center text-2xl sm:text-3xl md:text-4xl">Kamus <span class="text-red-400">Bahasa Batak</span></h2>
                <div class="mt-6 flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                    <input id="searchInput" type="text" placeholder="Ketik kata Indonesia atau Batak..." class="w-full sm:w-2/3 max-w-xl px-4 py-3 rounded-xl bg-white/10 border border-white/10 outline-none focus:border-red-400 font-sans placeholder-white/40" />
                    <select id="dialekFilter" class="w-full sm:w-64 px-4 py-3 rounded-xl bg-white/10 border border-white/10 focus:border-red-400 font-sans">
                        <option class="bg-bg-card font-sans" value="all">Semua Dialek</option>
                        <option class="bg-bg-card font-sans" value="Toba">Batak Toba</option>
                        <option class="bg-bg-card font-sans" value="Simalungun">Batak Simalungun</option>
                        <option class="bg-bg-card font-sans" value="Angkola-Mandailing">Batak Angkola–Mandailing</option>
                        <option class="bg-bg-card font-sans" value="Karo">Batak Karo</option>
                        <option class="bg-bg-card font-sans" value="Pakpak-Dairi">Batak Pakpak–Dairi</option>
                </select>
                    <button id="searchButton" class="px-5 py-3 rounded-xl bg-red-500 hover:bg-red-600 transition-colors font-sans">Cari</button>
                </div>
            </div>
            <!-- Letter filter A-Z below search -->
            <div id="letter-filter" class="mt-4 overflow-x-auto scroll-smooth pb-2">
                <div class="inline-flex gap-2 whitespace-nowrap text-sm text-white/80"></div>
        </div>

            <section id="dictionary-results" class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6"></section>
            <div id="loadingIndicator" class="hidden text-white/60 text-sm mt-6 text-center">Memuat...</div>


            <div class="mt-12 bg-white/5 rounded-3xl p-6 sm:p-10">
                <h3 class="text-red-400 text-center my-2 text-sm sm:text-base">Tahukah kamu?</h3>
                <p id="fact-text" class="text-center font-sans text-base sm:text-lg">Bahasa Batak memiliki beragam dialek dengan kekhasan kosakata dan pelafalan.</p>
            </div>
    </div>
    </section>

    <style>
        #letter-filter { scrollbar-width: thin; scrollbar-color: #9ca3af transparent; }
        #letter-filter::-webkit-scrollbar { height: 8px; }
        #letter-filter::-webkit-scrollbar-track { background: rgba(255,255,255,0.08); border-radius: 9999px; }
        #letter-filter::-webkit-scrollbar-thumb { background: #9ca3af; border-radius: 9999px; }
        #letter-filter::-webkit-scrollbar-thumb:hover { background: #6b7280; }
    </style>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const PAGE_SIZE = 12;

    // DOM elements
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');
    const dialekFilterSelect = document.getElementById('dialekFilter');
    const dictionaryResultsContainer = document.getElementById('dictionary-results');
    const loadingIndicator = document.getElementById('loadingIndicator');
    const letterFilterContainer = document.querySelector('#letter-filter > div');
    const factTextElement = document.getElementById('fact-text');

    // Simulated dictionary data
    let ALL_DICTIONARY_DATA = [
                { id: 1, indo: "cinta", batak: "holong", desc: "Perasaan kasih sayang yang mendalam.", dialek: "Toba" },
                { id: 2, indo: "selamat datang", batak: "horas", desc: "Ungkapan sambutan.", dialek: "Toba" },
                { id: 3, indo: "terima kasih", batak: "mauliate", desc: "Ungkapan rasa syukur.", dialek: "Toba" },
                { id: 4, indo: "ayah", batak: "ama", desc: "Panggilan untuk orang tua laki-laki.", dialek: "Toba" },
                { id: 5, indo: "ibu", batak: "ina", desc: "Panggilan untuk orang tua perempuan.", dialek: "Toba" },
                { id: 6, indo: "saudara", batak: "ito", desc: "Panggilan untuk saudara kandung atau kerabat dekat.", dialek: "Toba" },
                { id: 7, indo: "rumah", batak: "jabu", desc: "Tempat tinggal atau kediaman.", dialek: "Toba" },
                { id: 8, indo: "makan", batak: "mangan", desc: "Kegiatan mengonsumsi makanan.", dialek: "Toba" },
                { id: 9, indo: "minum", batak: "inum", desc: "Kegiatan mengonsumsi minuman.", dialek: "Toba" },
                { id: 10, indo: "teman", batak: "dongan", desc: "Orang yang dikenal baik dan akrab.", dialek: "Toba" },

                { id: 11, indo: "senang", batak: "sonang", desc: "Perasaan gembira atau bahagia.", dialek: "Simalungun" },
                { id: 12, indo: "hati", batak: "uhur", desc: "Pusat perasaan dan pikiran.", dialek: "Simalungun" },
                { id: 13, indo: "besar", batak: "bolon", desc: "Ukuran yang melebihi rata-rata.", dialek: "Simalungun" },
                { id: 14, indo: "kecil", batak: "otik", desc: "Ukuran yang kurang dari rata-rata.", dialek: "Simalungun" },
                { id: 15, indo: "jalan", batak: "dalani", desc: "Bergerak dari satu tempat ke tempat lain dengan kaki.", dialek: "Simalungun" },

                { id: 16, indo: "gunung", batak: "deleng", desc: "Daratan tinggi yang menjulang.", dialek: "Karo" },
                { id: 17, indo: "air", batak: "lau", desc: "Zat cair yang penting bagi kehidupan.", dialek: "Karo" },
                { id: 18, indo: "api", batak: "api", desc: "Panas dan cahaya yang dihasilkan dari pembakaran.", dialek: "Karo" },
                { id: 19, indo: "langit", batak: "langit", desc: "Ruang hampa di atas bumi.", dialek: "Karo" },
                { id: 20, indo: "bumi", batak: "donok", desc: "Planet tempat kita hidup.", dialek: "Karo" },

                { id: 21, indo: "pergi", batak: "lao", desc: "Bergerak meninggalkan suatu tempat.", dialek: "Angkola-Mandailing" },
                { id: 22, indo: "datang", batak: "ro", desc: "Bergerak menuju suatu tempat.", dialek: "Angkola-Mandailing" },
                { id: 23, indo: "duduk", batak: "hundul", desc: "Berada dalam posisi bertumpu pada pantat.", dialek: "Angkola-Mandailing" },
                { id: 24, indo: "berdiri", batak: "jongjong", desc: "Berada dalam posisi tegak.", dialek: "Angkola-Mandailing" },
                { id: 25, indo: "tidur", batak: "modom", desc: "Beristirahat dengan memejamkan mata.", dialek: "Angkola-Mandailing" },

                { id: 26, indo: "bangun", batak: "hehe", desc: "Terjaga dari tidur.", dialek: "Pakpak-Dairi" },
                { id: 27, indo: "lihat", batak: "ida", desc: "Menggunakan mata untuk melihat.", dialek: "Pakpak-Dairi" },
                { id: 28, indo: "dengar", batak: "tangihon", desc: "Menggunakan telinga untuk mendengar.", dialek: "Pakpak-Dairi" },
                { id: 29, indo: "bicara", batak: "manghatai", desc: "Berkomunikasi menggunakan kata-kata.", dialek: "Pakpak-Dairi" },
                { id: 30, indo: "diam", batak: "sip", desc: "Tidak mengeluarkan suara.", dialek: "Pakpak-Dairi" },

                { id: 31, indo: "buruk", batak: "jelek", desc: "Kualitas tidak bagus.", dialek: "Toba" },
                { id: 32, indo: "panas", batak: "boro", desc: "Suhu tinggi.", dialek: "Toba" },
                { id: 33, indo: "dingin", batak: "dingin", desc: "Suhu rendah.", dialek: "Toba" },
                { id: 34, indo: "lapar", batak: "male", desc: "Butuh makanan.", dialek: "Toba" },
                { id: 35, indo: "haus", batak: "uas", desc: "Butuh minuman.", dialek: "Toba" },

                { id: 36, indo: "siapa", batak: "isih", desc: "Kata tanya orang.", dialek: "Simalungun" },
                { id: 37, indo: "apa", batak: "aha", desc: "Kata tanya benda.", dialek: "Simalungun" },
                { id: 38, indo: "kapan", batak: "andigan", desc: "Kata tanya waktu.", dialek: "Simalungun" },
                { id: 39, indo: "dimana", batak: "didia", desc: "Kata tanya tempat.", dialek: "Simalungun" },

                { id: 40, indo: "mengapa", batak: "ngkai", desc: "Kata tanya alasan.", dialek: "Karo" },
                { id: 41, indo: "bagaimana", batak: "uga", desc: "Kata tanya cara.", dialek: "Karo" },
                { id: 42, indo: "berapa", batak: "enda", desc: "Kata tanya jumlah.", dialek: "Karo" },
                { id: 43, indo: "hari", batak: "wari", desc: "Periode 24 jam.", dialek: "Karo" },

                { id: 44, indo: "malam", batak: "berngi", desc: "Waktu gelap.", dialek: "Angkola-Mandailing" },
                { id: 45, indo: "pagi", batak: "pagi", desc: "Waktu awal hari.", dialek: "Angkola-Mandailing" },
                { id: 46, indo: "sore", batak: "potang", desc: "Waktu petang.", dialek: "Angkola-Mandailing" },

                { id: 47, indo: "sekarang", batak: "saonari", desc: "Waktu saat ini.", dialek: "Pakpak-Dairi" },
                { id: 48, indo: "nanti", batak: "anon", desc: "Waktu mendatang.", dialek: "Pakpak-Dairi" },
                { id: 49, indo: "kemarin", batak: "naeng", desc: "Hari sebelumnya.", dialek: "Pakpak-Dairi" },

                { id: 50, indo: "baru", batak: "imbaru", desc: "Belum lama ada.", dialek: "Toba" },
                { id: 51, indo: "lama", batak: "najolo", desc: "Sudah lama ada.", dialek: "Toba" },
                { id: 52, indo: "cepat", batak: "hatop", desc: "Bergerak gesit.", dialek: "Toba" },
                { id: 53, indo: "lambat", batak: "lambat", desc: "Bergerak pelan.", dialek: "Toba" },
                { id: 54, indo: "jauh", batak: "dao", desc: "Berjarak panjang.", dialek: "Toba" },
                { id: 55, indo: "dekat", batak: "jonok", desc: "Berjarak pendek.", dialek: "Toba" },
                { id: 56, indo: "atas", batak: "ginjang", desc: "Posisi di ketinggian.", dialek: "Toba" },
                { id: 57, indo: "bawah", batak: "toru", desc: "Posisi di kerendahan.", dialek: "Toba" },
                { id: 58, indo: "depan", batak: "jolo", desc: "Bagian muka.", dialek: "Toba" },
                { id: 59, indo: "belakang", batak: "pudi", desc: "Bagian belakang.", dialek: "Toba" },
                { id: 60, indo: "kiri", batak: "hambirang", desc: "Sisi kiri.", dialek: "Toba" },
                { id: 61, indo: "kanan", batak: "siang", desc: "Sisi kanan.", dialek: "Toba" },
                { id: 62, indo: "tengah", batak: "tangah", desc: "Pusat.", dialek: "Toba" },
                { id: 63, indo: "baik-baik", batak: "horas-horas", desc: "Harapan kebaikan.", dialek: "Toba" },
                { id: 64, indo: "nama", batak: "goar", desc: "Identitas.", dialek: "Toba" },

                { id: 65, indo: "sehat", batak: "sehat", desc: "Kondisi baik.", dialek: "Simalungun" },
                { id: 66, indo: "sakit", batak: "sakit", desc: "Kondisi tidak enak.", dialek: "Simalungun" },
                { id: 67, indo: "senyum", batak: "sip", desc: "Ekspresi gembira.", dialek: "Simalungun" },
                { id: 68, indo: "tangis", batak: "tangis", desc: "Ekspresi sedih.", dialek: "Simalungun" },

                { id: 69, indo: "marah", batak: "rimas", desc: "Perasaan kesal.", dialek: "Karo" },
                { id: 70, indo: "takut", batak: "bias", desc: "Perasaan cemas.", dialek: "Karo" },
                { id: 71, indo: "berani", batak: "berani", desc: "Memiliki nyali.", dialek: "Karo" },

                { id: 72, indo: "cantik", batak: "baleng", desc: "Indah dilihat.", dialek: "Angkola-Mandailing" },
                { id: 73, indo: "ganteng", batak: "bagak", desc: "Tampan dilihat.", dialek: "Angkola-Mandailing" },
                { id: 74, indo: "rajin", batak: "ginjang", desc: "Suka bekerja.", dialek: "Angkola-Mandailing" },

                { id: 75, indo: "malas", batak: "malas", desc: "Tidak suka bekerja.", dialek: "Pakpak-Dairi" },
                { id: 76, indo: "kaya", batak: "kaya", desc: "Banyak harta.", dialek: "Pakpak-Dairi" },
                { id: 77, indo: "miskin", batak: "miskin", desc: "Sedikit harta.", dialek: "Pakpak-Dairi" },

                { id: 78, indo: "pintar", batak: "pintar", desc: "Cerdas.", dialek: "Toba" },
                { id: 79, indo: "bodoh", batak: "oto", desc: "Tidak cerdas.", dialek: "Toba" },
                { id: 80, indo: "sedih", batak: "aroha", desc: "Perasaan tidak bahagia.", dialek: "Toba" },
                { id: 81, indo: "bahagia", batak: "las roha", desc: "Perasaan sangat senang.", dialek: "Toba" },
                { id: 82, indo: "tua", batak: "matua", desc: "Berumur lanjut.", dialek: "Toba" },
                { id: 83, indo: "muda", batak: "poso", desc: "Belum berumur.", dialek: "Toba" },

                { id: 84, indo: "pulang", batak: "mulak", desc: "Kembali ke asal.", dialek: "Simalungun" },
                { id: 85, indo: "tidur", batak: "modom", desc: "Istirahat malam.", dialek: "Simalungun" },
                { id: 86, indo: "bunga", batak: "bunga", desc: "Tanaman indah.", dialek: "Simalungun" },

                { id: 87, indo: "pohon", batak: "kayu", desc: "Tanaman keras.", dialek: "Karo" },
                { id: 88, indo: "daun", batak: "bulung", desc: "Bagian hijau tanaman.", dialek: "Karo" },
                { id: 89, indo: "buah", batak: "buah", desc: "Hasil tanaman.", dialek: "Karo" },

                { id: 90, indo: "burung", batak: "manuk-manuk", desc: "Hewan terbang.", dialek: "Angkola-Mandailing" },
                { id: 91, indo: "ikan", batak: "juhut", desc: "Hewan air.", dialek: "Angkola-Mandailing" },
                { id: 92, indo: "kucing", batak: "huting", desc: "Peliharaan berbulu.", dialek: "Angkola-Mandailing" },

                { id: 93, indo: "anjing", batak: "gukguk", desc: "Peliharaan setia.", dialek: "Pakpak-Dairi" },
                { id: 94, indo: "ular", batak: "ule", desc: "Hewan melata.", dialek: "Pakpak-Dairi" },
                { id: 95, indo: "orang", batak: "jalma", desc: "Manusia.", dialek: "Pakpak-Dairi" },

                { id: 96, indo: "desa", batak: "kuta", desc: "Permukiman kecil.", dialek: "Toba" },
                { id: 97, indo: "kota", batak: "kota", desc: "Permukiman besar.", dialek: "Toba" },
                { id: 98, indo: "sungai", batak: "aek", desc: "Aliran air.", dialek: "Toba" },
                { id: 99, indo: "danau", batak: "tao", desc: "Kumpulan air luas.", dialek: "Toba" },
                { id: 100, indo: "pulau", batak: "pulau", desc: "Daratan dikelilingi air.", dialek: "Toba" },

                // Tambahan data agar lebih banyak dari 100
                { id: 101, indo: "belajar", batak: "marsiajar", desc: "Mempelajari sesuatu.", dialek: "Toba" },
                { id: 102, indo: "membaca", batak: "manjaha", desc: "Melihat dan memahami tulisan.", dialek: "Toba" },
                { id: 103, indo: "menulis", batak: "manurat", desc: "Menciptakan tulisan.", dialek: "Toba" },
                { id: 104, indo: "mendengar", batak: "manangihon", desc: "Menangkap suara.", dialek: "Toba" },
                { id: 105, indo: "melihat", batak: "mangida", desc: "Menangkap gambar.", dialek: "Toba" },
                { id: 106, indo: "berpikir", batak: "marroha", desc: "Menggunakan pikiran.", dialek: "Toba" },
                { id: 107, indo: "bertanya", batak: "manungkun", desc: "Mengajukan pertanyaan.", dialek: "Toba" },
                { id: 108, indo: "menjawab", batak: "mangalusi", desc: "Memberikan jawaban.", dialek: "Toba" },
                { id: 109, indo: "menolong", batak: "manumpahi", desc: "Memberikan bantuan.", dialek: "Toba" },
                { id: 110, indo: "meminta", batak: "mangido", desc: "Mengajukan permohonan.", dialek: "Toba" },
                { id: 111, indo: "memberi", batak: "mangalehon", desc: "Menyerahkan sesuatu.", dialek: "Toba" },
                { id: 112, indo: "membawa", batak: "mamboan", desc: "Mengambil sesuatu dari satu tempat ke tempat lain.", dialek: "Toba" },
                { id: 113, indo: "pulang", batak: "mulih", desc: "Kembali ke rumah.", dialek: "Karo" },
                { id: 114, indo: "tidur", batak: "medem", desc: "Beristirahat.", dialek: "Karo" },
                { id: 115, indo: "makan", batak: "ngan", desc: "Menyantap makanan.", dialek: "Karo" },
                { id: 116, indo: "minum", batak: "ninum", desc: "Menyantap minuman.", dialek: "Karo" },
                { id: 117, indo: "duduk", batak: "kundul", desc: "Berada di posisi duduk.", dialek: "Karo" },
                { id: 118, indo: "berdiri", batak: "jongjong", desc: "Berada di posisi tegak.", dialek: "Karo" },
                { id: 119, indo: "mata", batak: "mata", desc: "Indra penglihatan.", dialek: "Toba" },
                { id: 120, indo: "hidung", batak: "igung", desc: "Indra penciuman.", dialek: "Toba" },
                { id: 121, indo: "mulut", batak: "baba", desc: "Indra perasa dan bicara.", dialek: "Toba" },
                { id: 122, indo: "tangan", batak: "tangan", desc: "Anggota gerak atas.", dialek: "Toba" },
                { id: 123, indo: "kaki", batak: "pat", desc: "Anggota gerak bawah.", dialek: "Toba" },
                { id: 124, indo: "kepala", batak: "ulu", desc: "Bagian atas tubuh.", dialek: "Toba" },
                { id: 125, indo: "perut", batak: "butuha", desc: "Bagian tubuh tempat pencernaan.", dialek: "Toba" },
                { id: 126, indo: "hati", batak: "ateate", desc: "Organ dalam tubuh, juga pusat emosi.", dialek: "Toba" },
                { id: 127, indo: "darah", batak: "dara", desc: "Cairan merah dalam tubuh.", dialek: "Toba" },
                { id: 128, indo: "tulang", batak: "holiholi", desc: "Rangka tubuh.", dialek: "Toba" },
                { id: 129, indo: "kulit", batak: "huling", desc: "Lapisan terluar tubuh.", dialek: "Toba" },
                { id: 130, indo: "rambut", batak: "obuk", desc: "Tumbuh di kepala.", dialek: "Toba" },
                { id: 131, indo: "gigi", batak: "ngingi", desc: "Untuk mengunyah makanan.", dialek: "Toba" },
                { id: 132, indo: "lidah", batak: "dila", desc: "Untuk merasa dan bicara.", dialek: "Toba" },
                { id: 133, indo: "telinga", batak: "tangkup", desc: "Indra pendengaran.", dialek: "Toba" },
                { id: 134, indo: "otak", batak: "utok", desc: "Organ berpikir.", dialek: "Toba" },
                { id: 135, indo: "roh", batak: "tondi", desc: "Roh atau jiwa.", dialek: "Toba" },
                { id: 136, indo: "dunia", batak: "portibi", desc: "Dunia atau alam.", dialek: "Toba" },
                { id: 137, indo: "surga", batak: "banuaginjang", desc: "Tempat kebahagiaan abadi.", dialek: "Toba" },
                { id: 138, indo: "neraka", batak: "api", desc: "Tempat penderitaan.", dialek: "Toba" },
                { id: 139, indo: "Tuhan", batak: "Debata", desc: "Sang Pencipta.", dialek: "Toba" },
                { id: 140, indo: "malaikat", batak: "surusuruan", desc: "Makhluk suci.", dialek: "Toba" },
                { id: 141, indo: "setan", batak: "sibolis", desc: "Makhluk jahat.", dialek: "Toba" },
                { id: 142, indo: "doa", batak: "tangiang", desc: "Memohon kepada Tuhan.", dialek: "Toba" },
                { id: 143, indo: "iman", batak: "haporseaon", desc: "Kepercayaan.", dialek: "Toba" },
                { id: 144, indo: "kasih", batak: "holong", desc: "Cinta kasih.", dialek: "Toba" },
                { id: 145, indo: "damai", batak: "marsihohot", desc: "Kondisi tanpa konflik.", dialek: "Toba" },
                { id: 146, indo: "sukacita", batak: "las roha", desc: "Perasaan sangat senang.", dialek: "Toba" },
                { id: 147, "indo": "satu", "batak": "sada", "desc": "Angka tunggal.", "dialek": "Toba" },
                { "id": 148, "indo": "dua", "batak": "dua", "desc": "Angka setelah satu.", "dialek": "Toba" },
                { "id": 149, "indo": "tiga", "batak": "tolu", "desc": "Angka setelah dua.", "dialek": "Toba" },
                { "id": 150, "indo": "empat", "batak": "opat", "desc": "Angka setelah tiga.", "dialek": "Toba" },
                { "id": 151, "indo": "lima", "batak": "lima", "desc": "Angka setelah empat.", "dialek": "Toba" },
                { "id": 152, "indo": "enam", "batak": "onom", "desc": "Angka setelah lima.", "dialek": "Toba" },
                { "id": 153, "indo": "tujuh", "batak": "pitu", "desc": "Angka setelah enam.", "dialek": "Toba" },
                { "id": 154, "indo": "delapan", "batak": "ulu", "desc": "Angka setelah tujuh.", "dialek": "Toba" },
                { "id": 155, "indo": "sembilan", "batak": "sia", "desc": "Angka setelah delapan.", "dialek": "Toba" },
                { "id": 156, "indo": "sepuluh", "batak": "sampulu", "desc": "Angka setelah sembilan.", "dialek": "Toba" },
                { "id": 157, "indo": "seratus", "batak": "saratus", "desc": "Sepuluh kali sepuluh.", "dialek": "Toba" },
                { "id": 158, "indo": "seribu", "batak": "saribu", "desc": "Sepuluh kali seratus.", "dialek": "Toba" },
                { "id": 159, "indo": "siapa", "batak": "ise", "desc": "Menanyakan identitas.", "dialek": "Simalungun" },
                { "id": 160, "indo": "mengapa", "batak": "aha do", "desc": "Menanyakan sebab.", "dialek": "Simalungun" },
                { "id": 161, "indo": "bagaimana", "batak": "sonaha", "desc": "Menanyakan cara.", "dialek": "Simalungun" },
                { "id": 162, "indo": "dimana", "batak": "ija", "desc": "Menanyakan tempat.", "dialek": "Simalungun" },
                { "id": 163, "indo": "kapan", "batak": "andigan", "desc": "Menanyakan waktu.", "dialek": "Simalungun" },
                { "id": 164, "indo": "pulang", "batak": "mulih", "desc": "Kembali ke tempat asal.", "dialek": "Angkola-Mandailing" },
                { "id": 165, "indo": "tidur", "batak": "modom", "desc": "Beristirahat di malam hari.", "dialek": "Angkola-Mandailing" },
                { "id": 166, "indo": "makan", "batak": "mangan", "desc": "Mengonsumsi makanan.", "dialek": "Angkola-Mandailing" },
                { "id": 167, "indo": "minum", "batak": "minum", "desc": "Mengonsumsi minuman.", "dialek": "Angkola-Mandailing" },
                { "id": 168, "indo": "duduk", "batak": "hundul", "desc": "Berada dalam posisi duduk.", "dialek": "Angkola-Mandailing" },
                { "id": 169, "indo": "berdiri", "batak": "jongjong", "desc": "Berada dalam posisi tegak.", "dialek": "Angkola-Mandailing" },
                { "id": 170, "indo": "jauh", "batak": "dadung", "desc": "Memiliki jarak yang jauh.", "dialek": "Karo" },
                { "id": 171, "indo": "dekat", "batak": "deket", "desc": "Memiliki jarak yang dekat.", "dialek": "Karo" },
                { "id": 172, "indo": "atas", "batak": "babah", "desc": "Posisi di atas.", "dialek": "Karo" },
                { "id": 173, "indo": "bawah", "batak": "teruh", "desc": "Posisi di bawah.", "dialek": "Karo" },
                { "id": 174, "indo": "depan", "batak": "lebe", "desc": "Bagian depan.", "dialek": "Karo" },
                { "id": 175, "indo": "belakang", "batak": " pudi", "desc": "Bagian belakang.", "dialek": "Karo" },
                { "id": 176, "indo": "kiri", "batak": "kiri", "desc": "Sisi kiri.", "dialek": "Karo" },
                { "id": 177, "indo": "kanan", "batak": "kanan", "desc": "Sisi kanan.", "dialek": "Karo" },
                { "id": 178, "indo": "utara", "batak": "utara", "desc": "Arah mata angin.", "dialek": "Pakpak-Dairi" },
                { "id": 179, "indo": "selatan", "batak": "selatan", "desc": "Arah mata angin.", "dialek": "Pakpak-Dairi" },
                { "id": 180, "indo": "timur", "batak": "timur", "desc": "Arah mata angin.", "dialek": "Pakpak-Dairi" },
                { "id": 181, "indo": "barat", "batak": "barat", "desc": "Arah mata angin.", "dialek": "Pakpak-Dairi" },
                { "id": 182, "indo": "saudara perempuan", batak: "iboto", desc: "Saudari kandung.", dialek: "Toba" },
                { id: 183, indo: "abang", batak: "abang", desc: "Kakak laki-laki.", dialek: "Toba" },
                { id: 184, indo: "adik", batak: "angkang", desc: "Adik kandung.", dialek: "Toba" },
                { id: 185, indo: "paman", batak: "tulang", desc: "Paman (dari pihak ibu).", dialek: "Toba" },
                { id: 186, indo: "bibi", batak: "namboru", desc: "Bibi (istri tulang).", dialek: "Toba" },
                { id: 187, indo: "mertua laki-laki", batak: "hulahula", desc: "Pihak pemberi istri.", dialek: "Toba" },
                { id: 188, indo: "anak", batak: "ianak", desc: "Buah hati.", dialek: "Toba" },
                { id: 189, indo: "cucu", batak: "pahompu", desc: "Anak dari anak.", dialek: "Toba" },
                { id: 190, indo: "nenek", batak: "ompung boru", desc: "Nenek dari pihak ibu/ayah.", dialek: "Toba" },
                { id: 191, indo: "kakek", batak: "ompung doli", desc: "Kakek dari pihak ibu/ayah.", dialek: "Toba" },
                { id: 192, indo: "istri", batak: "parsonduan", desc: "Pasangan hidup wanita.", dialek: "Toba" },
                { id: 193, indo: "suami", batak: "halak", desc: "Pasangan hidup pria.", dialek: "Toba" },
                { id: 194, indo: "perempuan", batak: "parompuan", desc: "Jenis kelamin wanita.", dialek: "Toba" },
                { id: 195, indo: "laki-laki", batak: "doling", desc: "Jenis kelamin pria.", dialek: "Toba" },
                { id: 196, indo: "anak kecil", batak: "dakdanak", desc: "Anak yang masih kecil.", dialek: "Toba" },
                { id: 197, indo: "remaja", batak: "naposo", desc: "Orang muda.", dialek: "Toba" },
                { id: 198, indo: "dewasa", batak: "magodang", desc: "Orang dewasa.", dialek: "Toba" },
                { id: 199, indo: "orang tua", batak: "natua-tua", desc: "Orang yang sudah berumur.", dialek: "Toba" },
                { id: 200, indo: "kampung", batak: "bonapasogit", desc: "Kampung halaman.", dialek: "Toba" },
                { id: 201, indo: "lapangan", batak: "lapangan", desc: "Area terbuka luas.", dialek: "Toba" },
                { id: 202, indo: "pasar", batak: "onapan", desc: "Tempat jual beli.", dialek: "Toba" },
                { id: 203, indo: "gereja", batak: "gereja", desc: "Tempat ibadah Kristen.", dialek: "Toba" },
                { id: 204, indo: "mesjid", batak: "mesjid", desc: "Tempat ibadah Muslim.", dialek: "Toba" },
                { id: 205, indo: "kuburan", batak: "tampat tano", desc: "Tempat pemakaman.", dialek: "Toba" },
                { id: 206, indo: "sawah", batak: "sawah", desc: "Lahan pertanian padi.", dialek: "Toba" },
                { id: 207, indo: "ladang", batak: "ladang", desc: "Lahan pertanian kering.", dialek: "Toba" },
                { id: 208, indo: "kebun", batak: "porlak", desc: "Area menanam tanaman.", dialek: "Toba" },
                { id: 209, indo: "padi", batak: "eme", desc: "Tanaman pokok.", dialek: "Toba" },
                { id: 210, indo: "jagung", batak: "jagung", desc: "Tanaman pangan.", dialek: "Toba" },
                { id: 211, indo: "ubi", batak: "gadong", desc: "Tanaman umbi-umbian.", dialek: "Toba" },
                { id: 212, indo: "kopi", batak: "kopi", desc: "Tanaman penghasil minuman.", dialek: "Toba" },
                { id: 213, indo: "karet", batak: "karet", desc: "Tanaman penghasil lateks.", dialek: "Toba" },
                { id: 214, indo: "kakao", batak: "kakao", desc: "Tanaman penghasil cokelat.", dialek: "Toba" },
                { id: 215, indo: "ikan mas", batak: "ihan mas", desc: "Jenis ikan air tawar.", dialek: "Toba" },
                { id: 216, indo: "ikan nila", batak: "ihan nila", desc: "Jenis ikan air tawar.", dialek: "Toba" },
                { id: 217, indo: "ayam", batak: "manuk", desc: "Jenis unggas.", dialek: "Toba" },
                { id: 218, indo: "babi", batak: "babi", desc: "Jenis hewan ternak.", dialek: "Toba" },
                { id: 219, indo: "kerbau", batak: "horbo", desc: "Jenis hewan ternak besar.", dialek: "Toba" },
                { id: 220, indo: "sapi", batak: "lomok", desc: "Jenis hewan ternak besar.", dialek: "Toba" },
                { id: 221, indo: "anjing", batak: "biang", desc: "Jenis hewan peliharaan.", dialek: "Simalungun" },
                { id: 222, indo: "kucing", batak: "pusuk", desc: "Jenis hewan peliharaan.", dialek: "Simalungun" },
                { id: 223, indo: "belajar", batak: "maboto", desc: "Mempelajari sesuatu.", dialek: "Simalungun" },
                { id: 224, indo: "menulis", batak: "manurat", desc: "Menciptakan tulisan.", dialek: "Simalungun" },
                { id: 225, indo: "membaca", batak: "manjaha", desc: "Melihat dan memahami tulisan.", dialek: "Simalungun" },
                { id: 226, indo: "air", batak: "bah", desc: "Zat cair.", dialek: "Karo" },
                { id: 227, indo: "api", batak: "apuy", desc: "Elemen panas.", dialek: "Karo" },
                { id: 228, indo: "angin", batak: "angin", desc: "Udara bergerak.", dialek: "Karo" },
                { id: 229, indo: "tanah", batak: "taneh", desc: "Lapisan bumi.", dialek: "Karo" },
                { id: 230, indo: "batu", batak: "batu", desc: "Benda padat alami.", dialek: "Karo" },
                { id: 231, indo: "besar", batak: "belgah", desc: "Ukuran yang signifikan.", dialek: "Angkola-Mandailing" },
                { id: 232, indo: "kecil", batak: "etek", desc: "Ukuran yang tidak signifikan.", dialek: "Angkola-Mandailing" },
                { id: 233, indo: "jauh", batak: "dao", desc: "Berjarak panjang.", dialek: "Angkola-Mandailing" },
                { id: 234, indo: "dekat", batak: "jonok", desc: "Berjarak pendek.", dialek: "Angkola-Mandailing" },
                { id: 235, indo: "cepat", batak: "habis", desc: "Dengan kecepatan tinggi.", dialek: "Pakpak-Dairi" },
                { id: 236, indo: "lambat", batak: "lempang", desc: "Dengan kecepatan rendah.", dialek: "Pakpak-Dairi" },
                { id: 237, indo: "senang", batak: "sonang", desc: "Perasaan gembira.", dialek: "Pakpak-Dairi" },
                { id: 238, indo: "sedih", batak: "sedih", desc: "Perasaan tidak bahagia.", dialek: "Pakpak-Dairi" },
                { id: 239, indo: "bahagia", batak: "las roha", desc: "Perasaan sangat senang.", dialek: "Pakpak-Dairi" },
                { id: 240, indo: "pintar", batak: "bisuk", desc: "Cerdas.", dialek: "Pakpak-Dairi" },
                { id: 241, indo: "bodoh", batak: "oto", desc: "Tidak cerdas.", dialek: "Pakpak-Dairi" },
                { id: 242, indo: "sehat", batak: "hipas", desc: "Kondisi tubuh baik.", dialek: "Pakpak-Dairi" },
                { id: 243, indo: "sakit", batak: "hansit", desc: "Kondisi tubuh tidak enak.", dialek: "Pakpak-Dairi" }
        // Tambahkan lebih banyak data bila perlu
    ].sort((a,b) => a.indo.localeCompare(b.indo));

    // Letter filter state
    let currentLetter = 'A';
            let currentQuery = '';
    let currentDialekFilter = 'all';
    let filteredData = [];
    let isLoading = false;

    function getFilteredData(query, dialek) {
        const q = (query || '').toLowerCase();
        const result = ALL_DICTIONARY_DATA.filter(term => {
            const matchesQuery = term.indo.toLowerCase().includes(q) || term.batak.toLowerCase().includes(q);
                            const matchesDialek = dialek === 'all' || term.dialek === dialek;
                            return matchesQuery && matchesDialek;
        }).sort((a,b) => a.indo.localeCompare(b.indo));
        return result;
    }

            function renderDictionaryResults(results, append = false) {
                if (!append) {
            dictionaryResultsContainer.innerHTML = '';
                }
                if (results.length === 0 && !append) {
            dictionaryResultsContainer.innerHTML = '<p class="col-span-full text-center text-white/60">Kata tidak ditemukan. Coba kata lain!</p>';
                    return;
                }

        let lastInitial = append && dictionaryResultsContainer.lastInitial ? dictionaryResultsContainer.lastInitial : '';
        results.forEach(term => {
                    const currentInitial = term.indo.charAt(0).toUpperCase();
                    if (currentInitial !== lastInitial) {
                        const heading = document.createElement('h2');
                heading.className = 'col-span-full text-left font-title text-red-400 text-2xl sm:text-3xl mt-8 mb-2 border-b border-red-400/60 pb-1';
                        heading.textContent = currentInitial;
                heading.id = `alpha-${currentInitial}`;
                        dictionaryResultsContainer.appendChild(heading);
                        lastInitial = currentInitial;
                    }

                    const card = document.createElement('div');
            card.className = 'bg-white/5 rounded-xl p-4 border border-white/10 hover:bg-white/10 transition';
                    card.innerHTML = `
                <h3 class="font-bold text-red-400 text-lg">${term.indo}</h3>
                <p class="text-white mt-1">${term.batak}</p>
                <p class="text-white/60 text-sm mt-1 italic">${term.dialek}</p>
                <p class="text-white/80 text-sm mt-2">${term.desc}</p>
                    `;
                    dictionaryResultsContainer.appendChild(card);
                });
        dictionaryResultsContainer.lastInitial = lastInitial;
            }

            async function performSearch(reset = true) {
                if (isLoading) return;
                if (reset) {
            currentQuery = (searchInput?.value || '').toLowerCase().trim();
            currentDialekFilter = dialekFilterSelect?.value || 'all';
            filteredData = getFilteredData(currentQuery, currentDialekFilter);
            dictionaryResultsContainer.lastInitial = '';
        }
        isLoading = true;
        loadingIndicator.classList.remove('hidden');
        const pageItems = filteredData.filter(item => !currentLetter || item.indo.charAt(0).toUpperCase() === currentLetter);
        renderDictionaryResults(pageItems, false);
        isLoading = false;
        loadingIndicator.classList.add('hidden');
        setupLetterFilter();
    }

    async function loadNusaxToba() {
        try {
            const url = 'https://raw.githubusercontent.com/IndoNLP/nusax/refs/heads/main/datasets/lexicon/toba_batak.csv';
            const res = await fetch(url, { headers: { 'Accept': 'text/csv' } });
            if (!res.ok) return;
            const text = await res.text();
            const lines = text.split(/\r?\n/).filter(l => l.trim().length > 0);
            // first line is header
            const dataLines = lines.slice(1);
            const nusaxItems = [];
            for (let i = 0; i < dataLines.length; i++) {
                const row = dataLines[i];
                const parts = row.split(',');
                if (parts.length < 3) continue;
                const indo = parts[1]?.trim();
                const batak = parts.slice(2).join(',').trim(); // in case value contains comma
                if (!indo || !batak) continue;
                nusaxItems.push({ id: `nusax_${i}`, indo, batak, desc: 'Sumber: NusaX', dialek: 'Toba' });
            }
            // remove existing Toba items and merge
            const nonToba = ALL_DICTIONARY_DATA.filter(t => t.dialek !== 'Toba');
            ALL_DICTIONARY_DATA = nonToba.concat(nusaxItems).sort((a,b) => a.indo.localeCompare(b.indo));
        } catch (e) {
            console.warn('Gagal memuat data NusaX:', e);
        }
    }

    // Events
    if (searchButton) searchButton.addEventListener('click', () => performSearch(true));
    if (searchInput) {
        searchInput.addEventListener('keyup', (event) => {
                if (event.key === 'Enter') {
                    performSearch(true);
            } else {
                    clearTimeout(searchInput.typingTimer);
                searchInput.typingTimer = setTimeout(() => performSearch(true), 300);
            }
        });
    }
    if (dialekFilterSelect) dialekFilterSelect.addEventListener('change', () => performSearch(true));

    // Rotate fun facts
            const facts = [
        'Bahasa Batak memiliki beragam dialek: Toba, Karo, Simalungun, Mandailing, Pakpak.',
        'Aksara Batak disebut juga Surat Batak dan memiliki variasi per sub-etnis.',
        'Pustaha Laklak sering dibuat dari kulit kayu pohon alim.',
        "Kata 'horas' berarti sehat/sukses dan dipakai sebagai salam umum.",
        'Marga adalah sistem kekerabatan penting dalam budaya Batak.'
    ];
    let factIndex = 0;
            function updateFact() {
        if (!factTextElement) return;
        factTextElement.style.opacity = 0.4;
                    setTimeout(() => {
            factTextElement.textContent = facts[factIndex];
                        factTextElement.style.opacity = 1;
            factIndex = (factIndex + 1) % facts.length;
        }, 250);
            }
            if (factTextElement) {
                updateFact();
                setInterval(updateFact, 7000);
            }

    function setupLetterFilter() {
        if (!letterFilterContainer) return;
        const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
        letterFilterContainer.innerHTML = '';
        alphabet.forEach(letter => {
            const btn = document.createElement('button');
            btn.textContent = letter;
            btn.className = `px-3 py-1 rounded-full ${currentLetter === letter ? 'bg-red-500 text-white' : 'bg-white/10 hover:bg-white/20'}`;
            btn.addEventListener('click', () => { currentLetter = letter; performSearch(false); });
            letterFilterContainer.appendChild(btn);
        });
    }

    // Init
    (async () => {
        await loadNusaxToba();
        performSearch(true);
    })();
        });
    </script>
@endsection
