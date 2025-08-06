<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aksaranta - Glosarium & Kamus</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Jua&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* --- Variabel CSS Global (Konsisten dengan halaman lain) --- */
        :root {
            --bg-dark: #1a1a1a;
            --card-bg-dark: #2c2c2c; /* Latar belakang card/kontainer utama */
            --highlight-bg: #3f3c3c; /* Latar belakang untuk elemen yang menonjol (misal search bar) */
            --text-light: #f0f0f0;
            --text-muted: #d0d0d0;
            --accent-yellow: #d84b4b;
            --accent-yellow-hover: #B10002;
            --shadow-dark: rgba(0, 0, 0, 0.5);
            --font-jua: 'Jua', cursive;
            --font-opensans: 'Open Sans', sans-serif;
        }

        /* --- Reset & Base Styling --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-opensans);
            background-color: var(--bg-dark);
            color: var(--text-light);
            line-height: 1.6;
            overflow-x: hidden; /* Mencegah scroll horizontal yang tidak diinginkan */
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: var(--card-bg-dark);
            border-radius: 12px;
            box-shadow: 0 8px 20px var(--shadow-dark);
        }

        /* --- Header Kustom (Hero Section) --- */
        .hero-header {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://via.placeholder.com/1500x500/8e44ad/ffffff?text=Kamus+Aksara+Batak+Banner') no-repeat center center/cover; /* Ganti URL gambar banner Anda di sini */
            color: var(--text-light);
            text-align: center;
            padding: 100px 20px;
            margin-bottom: 60px;
            position: relative;
            overflow: hidden;
            animation: fadeIn 1.5s ease-out;
        }
        .hero-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3); /* Overlay gelap */
            z-index: 1;
        }
        .hero-header-content {
            position: relative;
            z-index: 2;
            transform: translateY(0);
            transition: transform 0.5s ease-out;
        }
        .hero-header-content h1 {
            font-family: var(--font-jua);
            font-size: 4.5em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
            animation: fadeInDown 1.2s ease-out;
            color: var(--text-light);
        }
        .hero-header-content p {
            font-size: 1.3em;
            max-width: 800px;
            margin: 0 auto 30px;
            color: var(--text-light);
            animation: fadeInUp 1.2s ease-out 0.2s;
        }
        .hero-header .button {
            display: inline-block;
            background-color: var(--accent-yellow);
            color: #fff;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
            animation: fadeIn 1.2s ease-out 0.4s;
        }
        .hero-header .button:hover {
            background-color: var(--accent-yellow-hover);
            transform: translateY(-3px);
        }

        /* --- Search Section --- */
        .search-section {
            background-color: var(--highlight-bg);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px var(--shadow-dark);
            text-align: center;
            margin-bottom: 60px;
            opacity: 0; /* Untuk animasi */
            transform: translateY(30px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }
        .search-section.fade-in {
            opacity: 1;
            transform: translateY(0);
        }
        .search-section h2 {
            font-family: var(--font-jua);
            color: var(--accent-yellow);
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 600px;
            margin: 0 auto;
            background-color: var(--card-bg-dark);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .search-container input, .search-container select {
            flex-grow: 1;
            padding: 15px 20px;
            border: none;
            background: none;
            color: var(--text-light);
            font-size: 1.1em;
            outline: none;
            -webkit-appearance: none; /* Hapus gaya default select */
            -moz-appearance: none;
            appearance: none;
            background-color: var(--card-bg-dark); /* Agar select match input */
        }
        .search-container input::placeholder {
            color: var(--text-muted);
        }
        .search-container button {
            background-color: var(--accent-yellow);
            color: #333;
            border: none;
            padding: 15px 25px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-weight: bold;
        }
        .search-container button:hover {
            background-color: var(--accent-yellow-hover);
            transform: scale(1.05);
        }

        /* --- Filter Dialek --- */
        .filter-dialek {
            margin-top: 20px;
            text-align: center;
        }
        .filter-dialek label {
            font-size: 1.1em;
            color: var(--text-light);
            margin-right: 10px;
        }
        .filter-dialek select {
            padding: 10px 15px;
            border-radius: 5px;
            border: 1px solid var(--accent-yellow);
            background-color: var(--card-bg-dark);
            color: var(--text-light);
            font-size: 1em;
            cursor: pointer;
            outline: none;
        }
        .filter-dialek select option {
            background-color: var(--card-bg-dark);
            color: var(--text-light);
        }


        /* --- Guide Section --- */
        .guide-section {
            background-color: var(--highlight-bg);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px var(--shadow-dark);
            text-align: center;
            margin: 60px auto; /* Margin atas dan bawah */
            opacity: 0; /* Untuk animasi */
            transform: translateY(30px);
            transition: opacity 1s ease-out, transform 1s ease-out;
            max-width: 1000px; /* Lebar maksimum seperti container utama */
        }
        .guide-section.fade-in {
            opacity: 1;
            transform: translateY(0);
        }
        .guide-section h2 {
            font-family: var(--font-jua);
            color: var(--accent-yellow);
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .guide-section ol {
            list-style: none; /* Hapus bullet/angka default */
            padding: 0;
            counter-reset: step-counter; /* Reset counter untuk angka kustom */
            text-align: left; /* Teks panduan ke kiri */
            max-width: 700px;
            margin: 0 auto;
        }
        .guide-section ol li {
            counter-increment: step-counter; /* Tambahkan angka */
            margin-bottom: 15px;
            padding-left: 35px; /* Ruang untuk angka kustom */
            position: relative;
            font-size: 1.1em;
            color: var(--text-light);
        }
        .guide-section ol li::before {
            content: counter(step-counter) "."; /* Tampilkan angka kustom */
            position: absolute;
            left: 0;
            top: 0;
            font-family: var(--font-jua);
            color: var(--accent-yellow);
            font-size: 1.3em;
            font-weight: bold;
            line-height: 1.6;
        }
        .guide-section ol li strong {
            color: var(--accent-yellow); /* Highlight kata kunci dalam panduan */
        }

        /* --- Navigasi A-Z --- */
        .alphabet-nav {
            text-align: center;
            margin: 30px auto;
            padding: 15px;
            background-color: var(--highlight-bg);
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            max-width: 1000px;
        }
        .alphabet-nav a {
            display: inline-block;
            padding: 8px 12px;
            margin: 2px;
            color: var(--text-light);
            text-decoration: none;
            font-weight: bold;
            font-size: 0.9em;
            border-radius: 4px;
            transition: background-color 0.2s ease, color 0.2s ease;
        }
        .alphabet-nav a:hover, .alphabet-nav a.active {
            background-color: var(--accent-yellow);
            color: #333;
        }


        /* --- Dictionary Results --- */
        #dictionary-results {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            padding: 20px 0;
            justify-content: center; /* Untuk menengahkan item jika tidak mengisi baris penuh */
            min-height: 300px; /* Agar ada ruang saat loading */
        }
        .dict-card {
            background-color: var(--member-card-bg); /* Latar belakang card entri */
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            border: 1px solid var(--accent-yellow);
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
            cursor: pointer; /* Menunjukkan bisa diklik */
            word-wrap: break-word; /* Memastikan kata panjang tidak keluar dari batas */
        }
        .dict-card.fade-in {
            opacity: 1;
            transform: translateY(0);
        }
        .dict-card:hover {
            transform: translateY(-8px) scale(1.01);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
        }
        .dict-card h3 {
            font-family: var(--font-jua);
            color: var(--accent-yellow);
            font-size: 1.6em;
            margin-bottom: 5px;
            line-height: 1.2;
        }
        .dict-card .batak-term {
            font-family: var(--font-opensans);
            color: var(--text-light);
            font-size: 1.2em;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .dict-card .dialek { /* Gaya untuk dialek */
            font-size: 0.85em;
            color: #999;
            margin-bottom: 8px;
            font-style: italic;
        }
        .dict-card .description {
            color: var(--text-muted);
            font-size: 0.9em;
        }
        .no-results {
            grid-column: 1 / -1; /* Menempati seluruh lebar grid */
            text-align: center;
            color: var(--text-muted);
            font-size: 1.2em;
            padding: 50px 0;
        }
        .alphabet-heading { /* Judul A, B, C, dll. di dalam kamus */
            grid-column: 1 / -1; /* Membentang seluruh lebar grid */
            text-align: left;
            font-family: var(--font-jua);
            color: var(--accent-yellow);
            font-size: 2.5em;
            margin-top: 30px;
            margin-bottom: 15px;
            border-bottom: 2px solid var(--accent-yellow);
            padding-bottom: 5px;
        }


        /* --- Load More Button & Loading State --- */
        .load-more-container {
            grid-column: 1 / -1; /* Agar tombol di tengah di bawah grid */
            text-align: center;
            margin-top: 30px;
            padding-bottom: 50px;
        }
        #loadMoreButton {
            background-color: var(--accent-yellow);
            color: #333;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        #loadMoreButton:hover {
            background-color: var(--accent-yellow-hover);
            transform: translateY(-3px);
        }
        #loadMoreButton:disabled {
            background-color: #888;
            cursor: not-allowed;
            transform: none;
        }
        .loading-indicator {
            display: none; /* Default hidden */
            margin-top: 20px;
            color: var(--text-muted);
            font-size: 1.1em;
        }
        .loading-indicator.active {
            display: block;
        }
        .loading-spinner {
            border: 4px solid #f3f3f3; /* Light grey */
            border-top: 4px solid var(--accent-yellow); /* Yellow */
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            margin: 10px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* --- Did You Know Section (Konsisten) --- */
        .did-you-know {
            background-color: var(--accent-yellow);
            color: #fff;
            padding: 30px;
            border-radius: 10px;
            margin: 80px auto;
            max-width: 800px;
            text-align: center;
            box-shadow: 0 6px 15px var(--shadow-dark);
            opacity: 0; /* Untuk animasi */
            transform: scale(0.8) rotateZ(-5deg);
            transition: opacity 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                        transform 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .did-you-know.fade-in {
            opacity: 1;
            transform: scale(1) rotateZ(0deg);
        }
        .did-you-know h3 {
            font-family: var(--font-jua);
            font-size: 2em;
            margin-bottom: 15px;
        }
        .did-you-know p {
            font-size: 1.2em;
            font-weight: 500;
            transition: opacity 0.5s ease-in-out;
        }

        /* --- Footer (Konsisten) --- */
        footer {
            width: 100%;
            display: flex;
            justify-content: space-around;
            background-color: var(--accent-yellow);
            padding: 15px;
            box-sizing: border-box;
            color: #333;
            margin-top: 60px;
        }
        .footer-kiri { margin: 30px 0; width: 40%; }
        .footer-kiri p { font-size: 16px; color: #333333; font-family: var(--font-opensans); }
        .footer-kiri .foo { font-size: 21px; color: #333333; font-weight: bold; margin: 0 0 15px 0; font-family: var(--font-opensans); }
        .footer-kanan { margin: 30px 0; width: 40%; display: flex; justify-content: space-around; }
        .satu-footer h5 { font-size: 21px; color: #333333; font-weight: bold; font-family: var(--font-opensans); }
        .satu-footer p { font-size: 16px; color: #333333; margin: 15px 0 0 0; font-family: var(--font-opensans); }

        /* --- Scroll-to-Top Button (Konsisten) --- */
        .up {
            width: 100%; bottom: 0px; padding: 20px; box-sizing: border-box;
            position: fixed; margin: 0 0 15px 0; z-index: 1000;
        }
        .klik-up {
            width: 50px; height: 50px; border-radius: 50%;
            background-color: var(--accent-yellow); display: flex; float: right;
            transition: 0.7s; margin: 0 35px 0 0; cursor: pointer;
        }
        .klik-up img { margin: auto; filter: invert(100%); }
        .klik-up:hover { background-color: var(--accent-yellow-hover); }

        /* --- Responsive Design --- */
        @media (max-width: 768px) {
            .hero-header { padding: 60px 20px; margin-bottom: 40px; }
            .hero-header-content h1 { font-size: 3em; }
            .hero-header-content p { font-size: 1em; }

            .container { width: 95%; margin: 20px auto; padding: 15px; }
            .search-section { padding: 25px; margin-bottom: 40px; }
            .search-section h2 { font-size: 2em; }
            .search-container { flex-direction: column; }
            .search-container input, .search-container select { width: 100%; margin-bottom: 10px; }
            .search-container button { width: 100%; }

            .guide-section { margin: 40px auto; padding: 25px; }
            .guide-section h2 { font-size: 2em; }
            .guide-section ol li { font-size: 1em; padding-left: 25px; }
            .guide-section ol li::before { font-size: 1.1em; }

            .alphabet-nav { margin: 20px auto; padding: 10px; }
            .alphabet-nav a { padding: 5px 8px; font-size: 0.8em; }

            #dictionary-results { grid-template-columns: 1fr; gap: 20px; }

            .did-you-know { margin: 50px auto; padding: 20px; }
            .did-you-know h3 { font-size: 1.5em; }
            .did-you-know p { font-size: 1em; }

            footer { flex-wrap: wrap; text-align: center; }
            .footer-kiri, .footer-kanan { width: 100%; margin: 15px 0; justify-content: center; }
            .footer-kanan div { margin: 0 10px; }
            .up { padding: 10px; margin: 0 0 25px 0; }
            .klik-up { margin: 0 10px 0 0; }
        }

        /* --- Keyframe Animations --- */
        @keyframes fadeInDown { from { opacity: 0; transform: translateY(-50px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    </style>
</head>
<body>
    <header class="hero-header" id="top">
        <div class="hero-header-content">
            <h1>Glosarium & Kamus Aksaranta</h1>
            <p>
                Temukan kekayaan kosakata Bahasa Batak dalam terjemahan Indonesia. Cari kata, pelajari maknanya, dan
                selami lebih dalam warisan linguistik yang mempesona.
            </p>
            <a href="#search-section" class="button">Mulai Mencari</a>
        </div>
    </header>

    <main id="main-content">
        <section class="search-section" id="search-section">
            <h2>Cari Kata dalam Bahasa Batak</h2>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Ketik kata dalam Bahasa Indonesia...">
                <button id="searchButton">Cari</button>
            </div>
            <div class="filter-dialek">
                <label for="dialekFilter">Filter Dialek:</label>
                <select id="dialekFilter">
                    <option value="all">Semua Dialek</option>
                    <option value="Toba">Batak Toba</option>
                    <option value="Simalungun">Batak Simalungun</option>
                    <option value="Angkola-Mandailing">Batak Angkola-Mandailing</option>
                    <option value="Karo">Batak Karo</option>
                    <option value="Pakpak-Dairi">Batak Pakpak-Dairi</option>
                </select>
            </div>
        </section>

        <section class="guide-section">
            <h2>Panduan Penggunaan Kamus</h2>
            <ol>
                <li><strong>Temukan Kosakata:</strong> Semua kosakata kamus dimuat secara bertahap di bawah ini. Gulir ke bawah untuk melihat lebih banyak.</li>
                <li><strong>Gunakan Pencarian:</strong> Ketik kata dalam Bahasa Indonesia atau Batak pada kolom pencarian untuk memfilter daftar secara otomatis.</li>
                <li><strong>Filter Dialek:</strong> Gunakan dropdown "Filter Dialek" untuk menampilkan kosakata hanya dari dialek tertentu.</li>
                <li><strong>Navigasi A-Z:</strong> Klik huruf pada navigasi A-Z di bawah ini untuk melompat ke bagian kosakata yang dimulai dengan huruf tersebut.</li>
                <li><strong>Lihat Detail:</strong> Setiap kartu menampilkan kata Indonesia, terjemahan Batak, deskripsi singkat, dan dialeknya.</li>
            </ol>
        </section>

        <div class="container">
            <div class="alphabet-nav">
                </div>

            <section id="dictionary-results">
                </section>

            <div class="load-more-container">
                <button id="loadMoreButton">Muat Lebih Banyak</button>
                <div id="loadingIndicator" class="loading-indicator">
                    <div class="loading-spinner"></div>
                    Memuat...
                </div>
            </div>
        </div>

        <div class="did-you-know">
            <h3>Tahukah Kamu?</h3>
            <p id="fact-text">Bahasa Batak memiliki beragam dialek yang kaya, seperti Toba, Karo, Simalungun, Mandailing, dan Pakpak. Setiap dialek memiliki kekhasan kosakata dan pelafalannya.</p>
        </div>
    </main>



    <div class="up">
        <a href="#top" aria-label="Scroll to top">
            <div class="klik-up">
                <img src="../img/top.png" width="30px" alt="Panah atas" />
            </div>
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- DATA KAMUS SIMULASI (dengan dialek yang berbeda) ---
            // Data ini akan mensimulasikan data yang diambil dari "API"
            const ALL_DICTIONARY_DATA = [
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
                // Anda bisa tambahkan lebih banyak data di sini untuk mencapai "ratusan" atau "ribuan"
                // Pastikan setiap entri memiliki 'dialek'
            ].sort((a,b) => a.indo.localeCompare(b.indo)); // Urutkan data secara alfabetis berdasarkan kata Indonesia

            // --- KONFIGURASI PAGINASI ---
            const INITIAL_LOAD_LIMIT = 30; // Jumlah kata yang dimuat saat pertama kali atau setelah pencarian baru
            const LOAD_MORE_STEP = 20;    // Jumlah kata yang dimuat setiap kali tombol "Muat Lebih Banyak" diklik

            let currentOffset = 0;
            let currentQuery = '';
            let currentDialekFilter = 'all'; // Default filter dialek
            let filteredData = []; // Data yang sudah difilter oleh pencarian dan dialek
            let isLoading = false; // Status loading untuk menghindari pemuatan ganda

            // --- Elemen DOM ---
            const searchInput = document.getElementById('searchInput');
            const searchButton = document.getElementById('searchButton');
            const dialekFilterSelect = document.getElementById('dialekFilter');
            const dictionaryResultsContainer = document.getElementById('dictionary-results');
            const loadMoreButton = document.getElementById('loadMoreButton');
            const loadingIndicator = document.getElementById('loadingIndicator');
            const factTextElement = document.getElementById('fact-text');
            const alphabetNavContainer = document.querySelector('.alphabet-nav');
            const animatedElementsOnLoad = document.querySelectorAll('.hero-header, .search-section, .guide-section');

            // --- SIMULASI API: fetchDictionaryData ---
            async function fetchDictionaryData(query = '', dialek = 'all', offset = 0, limit = INITIAL_LOAD_LIMIT) {
                isLoading = true;
                loadingIndicator.classList.add('active'); // Tampilkan indikator loading
                loadMoreButton.disabled = true; // Nonaktifkan tombol load more

                return new Promise(resolve => {
                    setTimeout(() => { // Simulasikan delay jaringan
                        const lowerCaseQuery = query.toLowerCase();

                        let tempFilteredData = ALL_DICTIONARY_DATA.filter(term => {
                            const matchesQuery = term.indo.toLowerCase().includes(lowerCaseQuery) ||
                                                 term.batak.toLowerCase().includes(lowerCaseQuery);
                            const matchesDialek = dialek === 'all' || term.dialek === dialek;
                            return matchesQuery && matchesDialek;
                        });

                        // Urutkan kembali hasil setelah filter
                        tempFilteredData.sort((a, b) => a.indo.localeCompare(b.indo));

                        if (offset === 0) { // Jika ini pencarian/filter baru, reset filteredData global
                            filteredData = tempFilteredData;
                        }

                        const paginatedResults = filteredData.slice(offset, offset + limit);

                        isLoading = false;
                        loadingIndicator.classList.remove('active'); // Sembunyikan indikator loading
                        loadMoreButton.disabled = false; // Aktifkan tombol load more

                        resolve(paginatedResults);
                    }, 300); // Delay 300ms
                });
            }

            // --- Fungsi Rendering Hasil Kamus ---
            function renderDictionaryResults(results, append = false) {
                if (!append) {
                    dictionaryResultsContainer.innerHTML = ''; // Kosongkan jika tidak append
                    // Hapus observer dari card lama
                    dictionaryResultsContainer.querySelectorAll('.dict-card').forEach(card => observer.unobserve(card));
                }

                if (results.length === 0 && !append) {
                    dictionaryResultsContainer.innerHTML = '<p class="no-results">Kata tidak ditemukan. Coba kata lain!</p>';
                    loadMoreButton.style.display = 'none'; // Sembunyikan tombol
                    return;
                }

                let lastInitial = ''; // Untuk menambahkan judul A, B, C
                results.forEach((term) => {
                    const currentInitial = term.indo.charAt(0).toUpperCase();
                    if (currentInitial !== lastInitial) {
                        const heading = document.createElement('h2');
                        heading.classList.add('alphabet-heading');
                        heading.textContent = currentInitial;
                        heading.id = `alpha-${currentInitial}`; // Tambahkan ID untuk navigasi A-Z
                        dictionaryResultsContainer.appendChild(heading);
                        lastInitial = currentInitial;
                    }

                    const card = document.createElement('div');
                    card.classList.add('dict-card');
                    card.innerHTML = `
                        <h3>${term.indo}</h3>
                        <p class="batak-term">${term.batak}</p>
                        <p class="dialek">${term.dialek}</p>
                        <p class="description">${term.desc}</p>
                    `;
                    dictionaryResultsContainer.appendChild(card);
                    observer.observe(card); // Amati kartu baru untuk animasi on scroll
                });

                // Tampilkan/sembunyikan tombol "Muat Lebih Banyak"
                if (currentOffset + results.length < filteredData.length) {
                    loadMoreButton.style.display = 'block'; // Tampilkan jika masih ada data
                } else {
                    loadMoreButton.style.display = 'none'; // Sembunyikan jika semua data sudah dimuat
                }
            }

            // --- Fungsi Pencarian Utama ---
            async function performSearch(reset = true) {
                if (isLoading) return;

                if (reset) {
                    currentOffset = 0;
                    currentQuery = searchInput.value.toLowerCase().trim();
                    currentDialekFilter = dialekFilterSelect.value;
                }

                // Panggil fetchDictionaryData dengan parameter yang sesuai
                const newResults = await fetchDictionaryData(currentQuery, currentDialekFilter, currentOffset, reset ? INITIAL_LOAD_LIMIT : LOAD_MORE_STEP);
                renderDictionaryResults(newResults, !reset); // Jika reset false, append

                currentOffset += newResults.length;
            }

            // --- Inisialisasi Navigasi A-Z ---
            function setupAlphabetNav() {
                const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
                alphabetNavContainer.innerHTML = '';
                alphabet.forEach(letter => {
                    const link = document.createElement('a');
                    link.href = `#alpha-${letter}`;
                    link.textContent = letter;
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        const targetId = e.target.getAttribute('href').substring(1);
                        const targetElement = document.getElementById(targetId);
                        if (targetElement) {
                            window.scrollTo({
                                top: targetElement.offsetTop - 100, // Geser sedikit ke atas untuk header/nav
                                behavior: 'smooth'
                            });
                            // Tandai huruf yang aktif (opsional)
                            alphabetNavContainer.querySelectorAll('a').forEach(a => a.classList.remove('active'));
                            e.target.classList.add('active');
                        }
                    });
                    alphabetNavContainer.appendChild(link);
                });
            }

            // --- Event Listeners ---
            searchButton.addEventListener('click', () => performSearch(true));
            searchInput.addEventListener('keyup', function(event) {
                // Filter real-time saat mengetik, tapi hanya jika query berubah
                // Atau jika Enter ditekan (paksa refresh)
                if (event.key === 'Enter') {
                    performSearch(true);
                } else if (searchInput.value.toLowerCase().trim() !== currentQuery ||
                           dialekFilterSelect.value !== currentDialekFilter) {
                    // Beri sedikit delay untuk typing experience yang lebih baik
                    // Ini menghindari terlalu sering memicu pencarian saat mengetik cepat
                    clearTimeout(searchInput.typingTimer);
                    searchInput.typingTimer = setTimeout(() => {
                        performSearch(true);
                    }, 300);
                }
            });

            dialekFilterSelect.addEventListener('change', () => performSearch(true));
            loadMoreButton.addEventListener('click', () => performSearch(false));

            // Infinite Scroll
            window.addEventListener('scroll', async () => {
                const { scrollTop, scrollHeight, clientHeight } = document.documentElement;
                if (scrollTop + clientHeight >= scrollHeight - 300 && !isLoading && loadMoreButton.style.display !== 'none') {
                    await performSearch(false);
                }
            });


            // --- Animasi Fade-in On Scroll (Intersection Observer) ---
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                        // Hanya unobserve elemen yang dianimasikan sekali (misalnya header, search section, dll.)
                        // Dict-card tidak di-unobserve agar bisa dianimasikan ulang jika di-render ulang
                        if (entry.target.classList.contains('hero-header') ||
                            entry.target.classList.contains('search-section') ||
                            entry.target.classList.contains('guide-section') ||
                            entry.target.classList.contains('did-you-know') ||
                            entry.target.classList.contains('alphabet-heading')) { // Juga untuk heading A-Z
                             observer.unobserve(entry.target);
                        }
                    }
                });
            }, observerOptions);

            // Mengamati elemen yang sudah ada saat load
            animatedElementsOnLoad.forEach(element => observer.observe(element));
            const didYouKnowBox = document.querySelector('.did-you-know');
            if (didYouKnowBox) observer.observe(didYouKnowBox);

            // --- Fakta Menarik Bergantian ---
            const facts = [
                "Bahasa Batak memiliki beragam dialek yang kaya, seperti Toba, Karo, Simalungun, Mandailing, dan Pakpak. Setiap dialek memiliki kekhasan kosakata dan pelafalannya.",
                "Aksara Batak disebut juga Surat Batak. Setiap sub-etnis Batak memiliki sedikit perbedaan dalam gaya penulisannya.",
                "Pustaha Laklak, media tulis Aksara Batak, seringkali dibuat dari kulit kayu pohon alim.",
                "Kata 'horas' adalah salam umum yang penuh makna di kalangan Batak, berarti 'sehat' atau 'sukses'.",
                "Marga adalah sistem kekerabatan penting dalam budaya Batak, diwariskan dari ayah ke anak."
            ];
            let currentFactIndex = 0;

            function updateFact() {
                if (factTextElement) {
                    factTextElement.style.opacity = 0;
                    setTimeout(() => {
                        factTextElement.textContent = facts[currentFactIndex];
                        factTextElement.style.opacity = 1;
                        currentFactIndex = (currentFactIndex + 1) % facts.length;
                    }, 500);
                }
            }
            if (factTextElement) {
                updateFact();
                setInterval(updateFact, 7000);
            }

            // --- Scroll-to-Top Button ---
            const scrollToTopBtn = document.querySelector('.klik-up');
            if (scrollToTopBtn) {
                scrollToTopBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
                window.addEventListener('scroll', function() {
                    if (window.pageYOffset > 300) {
                        if (scrollToTopBtn.style.display === 'none' || scrollToTopBtn.style.display === '') {
                            scrollToTopBtn.style.display = 'flex';
                            scrollToTopBtn.style.opacity = '1';
                        }
                    } else {
                        if (scrollToTopBtn.style.display === 'flex' || scrollToTopBtn.style.opacity === '1') {
                            scrollToTopBtn.style.opacity = '0';
                            setTimeout(() => { scrollToTopBtn.style.display = 'none'; }, 300);
                        }
                    }
                });
                if (window.pageYOffset <= 300 && scrollToTopBtn) {
                    scrollToTopBtn.style.display = 'none';
                    scrollToTopBtn.style.opacity = '0';
                }
            }

            // --- Inisialisasi Kamus & Navigasi A-Z saat halaman dimuat ---
            setupAlphabetNav(); // Buat navigasi A-Z
            performSearch(true); // Muat data pertama kali
        });
    </script>
</body>
</html>
