<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aksaranta - Aksara & Ejaan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Jua&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* --- Variabel CSS Global (Konsisten dengan halaman lain) --- */
        :root {
            --bg-dark: #1a1a1a;
            --card-bg-dark: #2c2c2c;
            --highlight-bg: #3f3c3c;
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
            overflow-x: hidden;
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
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://via.placeholder.com/1500x500/1e88e5/ffffff?text=Aksara+Batak+Chart+Banner') no-repeat center center/cover; /* Ganti URL gambar banner Anda di sini */
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
            background: rgba(0,0,0,0.3);
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

        /* --- Section Intro (Umum) --- */
        .section-intro {
            max-width: 800px;
            margin: 60px auto;
            padding: 0 20px;
            text-align: center;
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }
        .section-intro.fade-in {
            opacity: 1;
            transform: translateY(0);
        }
        .section-intro h2 {
            font-family: var(--font-jua);
            font-size: 2.5em;
            color: var(--accent-yellow);
            margin-bottom: 15px;
            position: relative;
        }
        .section-intro h2::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background-color: var(--accent-yellow);
            margin: 15px auto 0;
            border-radius: 2px;
        }
        .section-intro p {
            font-size: 1.1em;
            color: var(--text-muted);
            margin-top: 20px;
            line-height: 1.8;
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
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .alphabet-nav.fade-in {
            opacity: 1;
            transform: translateY(0);
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
            color: #fff;
        }

        /* --- Aksara Grid --- */
        #aksara-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); /* Kolom lebih kecil untuk aksara */
            gap: 20px; /* Gap lebih kecil */
            padding: 20px 0;
            justify-content: center;
        }
        .aksara-card {
            background-color: var(--member-card-bg);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            border: 1px solid var(--accent-yellow);
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
            cursor: pointer;
        }
        .aksara-card.fade-in {
            opacity: 1;
            transform: translateY(0);
        }
        .aksara-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
        }
        .aksara-card .aksara-glyph {
            font-family: 'Noto Sans Batak', sans-serif; /* PENTING: Font untuk Aksara Batak */
            font-size: 5em; /* Ukuran besar untuk glyph */
            color: var(--text-light);
            line-height: 1;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }
        .aksara-card:hover .aksara-glyph {
            color: var(--accent-yellow);
        }
        .aksara-card .latin-translit {
            font-family: var(--font-jua);
            font-size: 1.8em;
            color: var(--accent-yellow);
            margin-bottom: 5px;
        }
        .aksara-card .type {
            font-size: 0.85em;
            color: var(--text-muted);
            font-style: italic;
        }
        .alphabet-heading { /* Judul A, B, C, dll. di dalam grid */
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
        .no-results {
            grid-column: 1 / -1;
            text-align: center;
            color: var(--text-muted);
            font-size: 1.2em;
            padding: 50px 0;
        }

        /* --- Footer & Scroll-to-Top (Konsisten) --- */
        footer {
            width: 100%; display: flex; justify-content: space-around;
            background-color: var(--accent-yellow); padding: 15px; box-sizing: border-box;
            color: #fff; margin-top: 60px;
        }
        .footer-kiri { margin: 30px 0; width: 40%; }
        .footer-kiri p { font-size: 16px; color: #333333; font-family: var(--font-opensans); }
        .footer-kiri .foo { font-size: 21px; color: #333333; font-weight: bold; margin: 0 0 15px 0; font-family: var(--font-opensans); }
        .footer-kanan { margin: 30px 0; width: 40%; display: flex; justify-content: space-around; }
        .satu-footer h5 { font-size: 21px; color: #333333; font-weight: bold; font-family: var(--font-opensans); }
        .satu-footer p { font-size: 16px; color: #333333; margin: 15px 0 0 0; font-family: var(--font-opensans); }
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
            .section-intro h2 { font-size: 2em; }
            .section-intro p { font-size: 1em; }
            .alphabet-nav { margin: 20px auto; padding: 10px; }
            .alphabet-nav a { padding: 5px 8px; font-size: 0.8em; }
            #aksara-grid { grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); gap: 10px; }
            .aksara-card .aksara-glyph { font-size: 3.5em; }
            .aksara-card .latin-translit { font-size: 1.4em; }
            .alphabet-heading { font-size: 2em; }
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
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Batak&display=swap" rel="stylesheet">
</head>
<body>
    <header class="hero-header" id="top">
        <div class="hero-header-content">
            <h1>Aksara Batak & Ejaan</h1>
            <p>
                Pelajari bentuk dan pelafalan setiap aksara Batak. Jelajahi konsonan dasar, vokal, dan tanda baca yang membentuk warisan tulis-menulis yang indah ini.
            </p>
            <a href="#aksara-chart-section" class="button">Lihat Aksara Lengkap</a>
        </div>
    </header>

    <main id="main-content">
        <div class="container">
            <section class="section-intro">
                <h2 id="aksara-chart-section">Mengenal Induk Surat dan Anak Surat</h2>
                <p>
                    Aksara Batak terdiri dari "Induk Surat" (huruf dasar) yang memiliki vokal 'a' inheren, dan "Anak Surat" (diakritik) yang mengubah vokal dasar atau menambahkan konsonan akhir. Berikut adalah daftar aksara yang umum digunakan.
                </p>
            </section>

            <div class="alphabet-nav">
                </div>

            <section id="aksara-grid">
                </section>
        </div>
    </main>

    <footer>
        <div class="footer-kiri">
            <p class="foo">Aksaranta</p>
            <p>Gerbang Aksara Batak Digital Anda.</p>
        </div>
        <div class="footer-kanan">
            <div class="satu-footer">
                <h5>Aksara</h5>
                <p>Toba</p>
                <p>Karo</p>
                <p>Simalungun</p>
                <p>Mandailing</p>
                <p>Pakpak</p>
            </div>
            <div class="satu-footer">
                <h5>Fitur</h5>
                <p>Transliterasi</p>
                <p>Kamus</p>
                <p>Virtual Tour</p>
                <p>Musik</p>
            </div>
            <div class="satu-footer">
                <h5>Informasi</h5>
                <p>Sejarah</p>
                <p>Budaya</p>
                <p>Blog</p>
                <p>Wisata</p>
            </div>
        </div>
    </footer>

    <div class="up">
        <a href="#top" aria-label="Scroll to top">
            <div class="klik-up">
                <img src="../img/top.png" width="30px" alt="Panah atas" />
            </div>
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Data Karakter Aksara Batak ---
            // Karakter-karakter ini sesuai dengan yang Anda berikan, diurutkan berdasarkan transliterasi Latinnya
            const aksaraCharacters = [
                { latin: "A", aksara: "ᯀ", type: "Vokal Induk" },
                { latin: "Ba", aksara: "ᯞ", type: "Konsonan Induk" },
                { latin: "Ca", aksara: "ᯝ", type: "Konsonan Induk" },
                { latin: "Da", aksara: "ᯔ", type: "Konsonan Induk" },
                { latin: "E (diacritic)", aksara: "ᯬ", type: "Anak Surat Vokal" }, // Anak Surat untuk 'e'
                { latin: "Ga", aksara: "ᯋ", type: "Konsonan Induk" },
                { latin: "Ha", aksara: "ᯂ", type: "Konsonan Induk" },
                { latin: "I (diacritic)", aksara: "ᯩ", type: "Anak Surat Vokal" }, // Anak Surat untuk 'i'
                { latin: "Ja", aksara: "ᯒ", type: "Konsonan Induk" },
                { latin: "Ka", aksara: "ᯡ", type: "Konsonan Induk" },
                { latin: "La", aksara: "ᯎ", type: "Konsonan Induk" },
                { latin: "Ma", aksara: "ᯇ", type: "Konsonan Induk" },
                { latin: "Na", aksara: "ᯅ", type: "Konsonan Induk" },
                { latin: "Nga", aksara: "ᯖ", type: "Konsonan Induk" },
                { latin: "Nja", aksara: "ᯣ", type: "Konsonan Induk" },
                { latin: "Nya", aksara: "ᯛ", type: "Konsonan Induk" },
                { latin: "Mba", aksara: "ᯤ", type: "Konsonan Khusus" }, // Contoh konsonan khusus
                { latin: "Ngga", aksara: "ᯥ", type: "Konsonan Khusus" }, // Contoh konsonan khusus
                { latin: "O (diacritic)", aksara: "ᯪ", type: "Anak Surat Vokal" }, // Anak Surat untuk 'o' (seringnya ᯫ)
                { latin: "Pa", aksara: "ᯐ", type: "Konsonan Induk" },
                { latin: "Pangolat Ha", aksara: "ᯮ", type: "Pangolat" }, // Tanda penghenti konsonan
                { latin: "Pangolat La", aksara: "᯲", type: "Pangolat" },
                { latin: "Pangolat Ma", aksara: "᯽", type: "Pangolat" },
                { latin: "Pangolat Na", aksara: "᯳", type: "Pangolat" },
                { latin: "Pangolat Nga", aksara: "ᯰ", type: "Pangolat" },
                { latin: "Pangolat Nya", aksara: "᯿", type: "Pangolat" },
                { latin: "Pangolat Pa", aksara: "᯼", type: "Pangolat" },
                { latin: "Pangolat Ra", aksara: "ᯱ", type: "Pangolat" },
                { latin: "Pangolat Ta", aksara: "᯾", type: "Pangolat" },
                { latin: "Ra", aksara: "ᯉ", type: "Konsonan Induk" },
                { latin: "Sa", aksara: "ᯑ", type: "Konsonan Induk" },
                { latin: "Ta", aksara: "ᯠ", type: "Konsonan Induk" },
                { latin: "U (diacritic)", aksara: "ᯧ", type: "Anak Surat Vokal" }, // Anak Surat untuk 'u'
                { latin: "Wa", aksara: "ᯗ", type: "Konsonan Induk" },
                { latin: "Ya", aksara: "ᯢ", type: "Konsonan Induk" }
            ].sort((a,b) => a.latin.localeCompare(b.latin)); // Urutkan data secara alfabetis berdasarkan Latin


            // --- Elemen DOM ---
            const aksaraGridContainer = document.getElementById('aksara-grid');
            const alphabetNavContainer = document.querySelector('.alphabet-nav');
            const animatedElementsOnLoad = document.querySelectorAll('.hero-header, .section-intro, .alphabet-nav');

            // --- Fungsi Rendering Aksara ---
            function renderAksaraCharacters(characters) {
                aksaraGridContainer.innerHTML = ''; // Kosongkan grid sebelumnya

                if (characters.length === 0) {
                    aksaraGridContainer.innerHTML = '<p class="no-results">Tidak ada aksara yang ditemukan.</p>';
                    return;
                }

                let lastInitial = '';
                characters.forEach((char, index) => {
                    const currentInitial = char.latin.charAt(0).toUpperCase();
                    if (currentInitial !== lastInitial) {
                        const heading = document.createElement('h2');
                        heading.classList.add('alphabet-heading');
                        heading.textContent = currentInitial;
                        heading.id = `alpha-${currentInitial}`; // Tambahkan ID untuk navigasi A-Z
                        aksaraGridContainer.appendChild(heading);
                        observer.observe(heading); // Amati heading untuk animasi
                        lastInitial = currentInitial;
                    }

                    const card = document.createElement('div');
                    card.classList.add('aksara-card');
                    card.innerHTML = `
                        <p class="aksara-glyph">${char.aksara}</p>
                        <h3 class="latin-translit">${char.latin}</h3>
                        <p class="type">${char.type}</p>
                    `;
                    aksaraGridContainer.appendChild(card);
                    observer.observe(card); // Amati kartu baru untuk animasi
                });
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
                            alphabetNavContainer.querySelectorAll('a').forEach(a => a.classList.remove('active'));
                            e.target.classList.add('active');
                        }
                    });
                    alphabetNavContainer.appendChild(link);
                });
            }

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
                        // Unobserve elemen yang dianimasikan sekali
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Mengamati elemen yang sudah ada saat load
            animatedElementsOnLoad.forEach(element => observer.observe(element));

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

            // --- Inisialisasi Halaman saat dimuat ---
            setupAlphabetNav(); // Buat navigasi A-Z
            renderAksaraCharacters(aksaraCharacters); // Tampilkan semua aksara
        });
    </script>
</body>
</html>
