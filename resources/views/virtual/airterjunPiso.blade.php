<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aksaranta - Air Terjun Sipiso-piso</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Jua&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* --- Variabel CSS Global (Konsisten dengan halaman lain) --- */
        :root {
            --bg-dark: #1a1a1a;
            --card-bg-dark: #2c2c2c; /* Latar belakang card/kontainer utama */
            --highlight-bg: #3f3c3c; /* Latar belakang untuk elemen yang menonjol */
            --text-light: #f0f0f0;
            --text-muted: #d0d0d0;
            --accent-yellow: #d84b4b; /* Mengganti warna kuning tua Anda */
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

        .container-content { /* Mengganti container-wisata */
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: var(--card-bg-dark);
            border-radius: 12px;
            box-shadow: 0 8px 20px var(--shadow-dark);
        }

        /* --- Header Kustom (Hero Section) --- */
        .hero-header {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('../img/airterjunpiso.jpg') no-repeat center center/cover;
            color: var(--text-light);
            text-align: center;
            padding: 100px 20px;
            margin-bottom: 60px;
            position: relative;
            overflow: hidden;
            display: flex;
            height: 100vh;
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
            margin: auto;
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

        /* --- Video/Map Section (wisata) --- */
        .video-map-section { /* Mengganti wisata */
            width: 90%;
            margin: 30px auto;
            border-radius: 12px; /* Tambahkan border-radius */
            overflow: hidden; /* Pastikan iframe tidak keluar batas */
            box-shadow: 0 8px 20px var(--shadow-dark); /* Tambahkan shadow */
            opacity: 0; /* Untuk animasi */
            transform: translateY(30px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }
        .video-map-section.fade-in {
            opacity: 1;
            transform: translateY(0);
        }
        .video-map-section iframe {
            width: 100%;
            height: 700px; /* Tinggi yang cukup untuk map/video */
            border: 0;
        }

        /* --- Flex Content Section (flex-wisata) --- */
        .flex-content-section { /* Mengganti flex-wisata */
            display: flex;
            justify-content: space-between;
            margin: 0 0 30px 0;
            flex-wrap: wrap;
            width: 100%;
            padding: 20px 0; /* Padding agar tidak terlalu mepet container */
            opacity: 0; /* Untuk animasi */
            transform: translateY(30px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }
        .flex-content-section.fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        .flex-content-section img {
            width: 48%; /* Sedikit kurang dari 50% untuk gap */
            height: auto; /* Agar gambar tidak terdistorsi */
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .flex-text-block { /* Mengganti flex-kalimat-ampat */
            width: 48%; /* Sedikit kurang dari 50% untuk gap */
            padding-left: 20px; /* Jarak dari gambar */
        }

        .flex-text-block h3 {
            font-size: 2.2em; /* Ukuran lebih besar */
            margin: 0 0 20px 0;
            font-family: var(--font-jua);
            color: #fff;
        }

        .flex-text-block p {
            font-family: var(--font-opensans);
            color: var(--text-light);
        }

        .main-description-paragraph { /* Untuk paragraf deskripsi utama di bawah flex-content */
            font-family: var(--font-opensans);
            color: var(--text-light);
            margin-top: 20px;
            padding: 0 20px; /* Sesuaikan padding dengan container */
            line-height: 1.8; /* Jarak antar baris */
            opacity: 0; /* Untuk animasi */
            transform: translateY(30px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }
        .main-description-paragraph.fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        /* --- Daftar Pustaka (References) --- */
        .daftar-pustaka {
            width: 70%; /* Lebar yang lebih spesifik */
            margin: 60px auto 30px auto; /* Margin yang konsisten */
            border-left: 5px solid var(--accent-yellow); /* Warna kuning */
            padding: 10px 0 10px 20px; /* Padding untuk teks */
            background-color: var(--highlight-bg); /* Latar belakang highlight */
            border-radius: 0 8px 8px 0; /* Sudut membulat hanya di kanan */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            opacity: 0; /* Untuk animasi */
            transform: translateY(30px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }
        .daftar-pustaka.fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        .daftar-pustaka p {
            margin: 0; /* Hapus margin default p */
            font-family: var(--font-opensans);
            color: var(--text-muted); /* Warna teks redup */
        }

        .daftar-pustaka span {
            color: var(--accent-yellow); /* Warna kuning */
            font-weight: bold;
            font-family: var(--font-jua); /* Font Jua */
            display: block; /* Agar REFERENCE di baris baru */
            margin-bottom: 5px;
        }
        .daftar-pustaka a {
            color: var(--text-light); /* Warna link */
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .daftar-pustaka a:hover {
            color: var(--accent-yellow);
            text-decoration: underline;
        }

        /* --- FOOTER --- */
        footer {
            width: 100%;
            display: flex;
            justify-content: space-around;
            background-color: var(--accent-yellow);
            padding: 15px;
            box-sizing: border-box;
            color: #fff;
            margin-top: 60px;
        }

        .footer-kiri {
            margin: 30px 0;
            width: 40%;
        }

        .footer-kiri p {
            font-size: 16px;
            color: #333333;
            font-family: var(--font-opensans);
        }

        .footer-kiri .foo {
            font-size: 21px;
            color: #333333;
            font-weight: bold;
            margin: 0 0 15px 0;
            font-family: var(--font-opensans);
        }

        .footer-kanan {
            margin: 30px 0;
            width: 40%;
            display: flex;
            justify-content: space-around;
        }

        .satu-footer h5 {
            font-size: 21px;
            color: #333333;
            font-weight: bold;
            font-family: var(--font-opensans);
        }

        .satu-footer p {
            font-size: 16px;
            color: #333333;
            margin: 15px 0 0 0;
            font-family: var(--font-opensans);
        }

        /* --- NAIK (Scroll-to-top button) --- */
        .up {
            width: 100%;
            bottom: 0px;
            padding: 20px;
            box-sizing: border-box;
            position: fixed;
            margin: 0 0 15px 0;
            z-index: 1000;
        }

        .klik-up {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--accent-yellow);
            display: flex;
            float: right;
            transition: 0.7s;
            margin: 0 35px 0 0;
            cursor: pointer;
        }

        .klik-up img {
            margin: auto;
            filter: invert(100%);
        }

        .klik-up:hover {
            background-color: var(--accent-yellow-hover);
        }

        /* --- Responsive Design --- */
        @media (max-width: 800px) {
            .hero-header {
                padding: 60px 20px;
                margin-bottom: 40px;
            }
            .hero-header-content h1 {
                font-size: 3em;
            }
            .hero-header-content p {
                font-size: 1em;
            }

            .video-map-section {
                width: 95%; /* Lebih lebar di mobile */
            }
            .video-map-section iframe {
                height: 350px; /* Sesuaikan tinggi iframe */
            }

            .container-content {
                width: 95%;
                margin: 20px auto;
                padding: 15px;
            }

            .flex-content-section {
                flex-direction: column; /* Tumpuk item */
                padding: 0;
            }
            .flex-content-section img {
                width: 100%;
                margin-bottom: 20px; /* Jarak antara gambar dan teks */
            }
            .flex-text-block {
                width: 100%;
                padding-left: 0;
                text-align: center; /* Teks di tengah di mobile */
            }
            .flex-text-block h3 {
                margin-top: 20px; /* Jarak dari gambar di mobile */
                font-size: 1.8em;
            }
            .flex-text-block p {
                font-size: 0.95em;
            }

            .main-description-paragraph {
                padding: 0 15px;
                font-size: 0.95em;
            }

            .daftar-pustaka {
                width: 95%;
                margin: 40px auto 20px auto;
                padding: 10px 15px 10px 20px;
            }
            .daftar-pustaka span {
                font-size: 1em;
            }
            .daftar-pustaka p {
                font-size: 0.85em;
            }

            footer {
                flex-wrap: wrap;
                text-align: center;
            }
            .footer-kiri, .footer-kanan {
                width: 100%;
                margin: 15px 0;
                justify-content: center;
            }
            .footer-kanan div {
                margin: 0 10px;
            }

            .up {
                padding: 10px;
                margin: 0 0 25px 0;
            }
            .klik-up {
                margin: 0 10px 0 0;
            }
            footer p, h5 {

                color: #fff
            }
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
            <h1>Air Terjun Sipiso-piso</h1>
            <p>
                Saksikan keagungan salah satu air terjun tertinggi di Indonesia, menawarkan pesona alam yang memukau dengan latar belakang Danau Toba yang megah.
            </p>
            <a href="#detail-section" class="button">Lihat Detail</a>
        </div>
    </header>

    <main id="main-content">
        <section class="video-map-section fade-in">
            <iframe src="https://www.google.com/maps/embed?pb=!4v1752982707931!6m8!1m7!1sCAoSFkNJSE0wb2dLRUlDQWdJQ2tsSUtIYnc.!2m2!1d2.916029829981075!2d98.52060658329124!3f300!4f10!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </section>

        <div class="container-content" id="detail-section">
            <div class="flex-content-section fade-in">
                <img src="../img/airterjunpiso.jpg" alt="Air Terjun Sipiso-piso" />
                <div class="flex-text-block">
                    <h3>AIR TERJUN PISO-PISO</h3>
                    <p>
                        Air Terjun Sipiso-piso, terletak di Desa Tongging, Kecamatan Merek, Kabupaten Karo, Sumatera Utara, merupakan salah satu air terjun tertinggi di Indonesia dengan ketinggian mencapai 120 meter. Nama "Sipiso-piso" dalam bahasa Batak berarti "seperti pisau", menggambarkan bentuk air terjun yang sempit dan tajam, mirip dengan bilah pisau. Air terjun ini terbentuk dari aliran Sungai Pajanabolon yang mengalir melalui gua di sisi kawah Danau Toba, menciptakan pemandangan alam yang memukau.
                    </p>
                </div>
            </div>

            <p class="main-description-paragraph fade-in">
                Untuk mencapai lokasi ini, pengunjung dapat menempuh perjalanan sekitar 70 km dari Medan ke Kota Kabanjahe, kemudian melanjutkan perjalanan sekitar 30 menit menuju Desa Tongging. Jalan menuju Air Terjun Sipiso-piso sudah diaspal dengan baik, memudahkan akses bagi wisatawan. Setibanya di lokasi, pengunjung dapat menikmati pemandangan dari gardu pandang yang menawarkan panorama indah Danau Toba dan sekitarnya. Bagi yang ingin merasakan sensasi lebih dekat dengan alam, tersedia jalur tangga yang menurun menuju dasar air terjun. Perjalanan ini cukup menantang, dengan sekitar 651 anak tangga yang harus dilalui. Namun, usaha tersebut akan terbayar dengan pemandangan spektakuler dari dekat air terjun, serta cipratan air yang menyegarkan.
            </p>
            <p class="main-description-paragraph fade-in">
                Di sekitar lokasi, tersedia berbagai fasilitas untuk kenyamanan pengunjung, seperti area parkir yang luas, warung makan, toko suvenir, dan fasilitas umum lainnya. Harga tiket masuk ke Air Terjun Sipiso-piso cukup terjangkau, menjadikannya destinasi wisata yang ramah di kantong. Pengunjung juga dapat menikmati kuliner khas Batak di warung-warung sekitar, menambah pengalaman wisata yang menyenangkan.
                <br /><br />
                Air Terjun Sipiso-piso bukan hanya menawarkan keindahan alam, tetapi juga pengalaman petualangan yang memuaskan. Dengan akses yang mudah, fasilitas yang memadai, dan pemandangan alam yang luar biasa, destinasi ini layak masuk dalam daftar kunjungan bagi para pecinta alam dan wisatawan yang ingin menikmati keindahan Sumatera Utara.
            </p>

            <div class="daftar-pustaka fade-in">
                <span>REFERENSI</span>
                <p>Antautamaofficial. (2017, December 2). Air Terjun Sipiso-piso. Antautama Official. Retrieved from
                <a href="https://antautamaofficial.wordpress.com/2017/12/02/air-terjun-sipiso-piso/" target="_blank">
                https://antautamaofficial.wordpress.com/2017/12/02/air-terjun-sipiso-piso/</a>
                </p>
            </div>
        </div>
    </main>

    {{-- <footer>
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
    </footer> --}}
    <div class="up">
        <a href="#top" aria-label="Scroll to top">
            <div class="klik-up">
                <img src="img/top.png" width="30px" alt="Panah atas" />
            </div>
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Memilih semua elemen yang akan dianimasikan saat discroll
            const animatedElements = document.querySelectorAll(
                '.video-map-section, .flex-content-section, .main-description-paragraph, .daftar-pustaka'
            );

            // Opsi untuk Intersection Observer
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1 // Ketika 10% dari elemen terlihat
            };

            // Membuat Intersection Observer
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                        observer.unobserve(entry.target); // Hentikan observasi setelah animasi dipicu
                    }
                });
            }, observerOptions);

            // Mengamati elemen yang sudah ada saat load
            animatedElements.forEach(element => observer.observe(element));

            // Efek Paralaks Ringan pada Header (opsional)
            const heroHeader = document.querySelector('.hero-header');
            if (heroHeader) {
                window.addEventListener('scroll', function() {
                    const scrollPosition = window.pageYOffset;
                    heroHeader.style.backgroundPositionY = -scrollPosition * 0.3 + 'px';
                });
            }

            // Fungsi untuk tombol scroll-to-top
            const scrollToTopBtn = document.querySelector('.klik-up');
            if (scrollToTopBtn) {
                scrollToTopBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }

            // Tampilkan/sembunyikan tombol scroll-to-top
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) { // Tampilkan jika sudah scroll lebih dari 300px
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
            // Pastikan tombol tersembunyi saat halaman dimuat jika tidak di atas
            if (window.pageYOffset <= 300 && scrollToTopBtn) {
                scrollToTopBtn.style.display = 'none';
                scrollToTopBtn.style.opacity = '0';
            }
        });
    </script>
</body>
</html>
