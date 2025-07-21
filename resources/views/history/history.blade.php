<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah Aksara Batak - Aksaranta</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Jua&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #1a1a1a;
            --card-bg-dark: #2c2c2c;
            --text-light: #f0f0f0;
            --text-muted: #d0d0d0;
            --accent-yellow: #ffee00;
            --accent-yellow-hover: #ffda00;
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
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: var(--card-bg-dark);
            border-radius: 12px;
            box-shadow: 0 8px 20px var(--shadow-dark);
        }

        /* --- Bagian Header Kustom (Hero) --- */
        .hero-header {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://via.placeholder.com/1500x500/34495e/ffffff?text=Aksara+Batak+History+Banner') no-repeat center center/cover; /* Ganti URL gambar banner Anda di sini */
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
            background: rgba(0,0,0,0.3); /* Overlay gelap pada gambar */
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
            color: #333;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
            animation: fadeIn 1.2s ease-out 0.4s;
        }

        .hero-header .button:hover {
            background-color: var(--accent-yellow-hover);
            transform: translateY(-3px);
        }

        /* --- Bagian Intro Konten --- */
        .section-intro {
            text-align: center;
            margin-bottom: 60px;
            font-size: 1.1em;
            color: var(--text-muted);
            padding: 0 20px;
        }

        /* --- Styling Garis Waktu (Timeline) --- */
        h1#timeline-section { /* Menargetkan judul "Garis Waktu Perkembangan Aksara" */
            text-align: center;
            color: var(--text-light);
            margin-bottom: 40px;
            font-size: 3em; /* Ukuran font lebih kecil dari judul hero */
            font-family: var(--font-jua);
            position: relative;
            animation: fadeInDown 1s ease-out;
        }
        h1#timeline-section::after { /* Garis bawah judul timeline */
            content: '';
            display: block;
            width: 100px;
            height: 5px;
            background-color: var(--accent-yellow);
            margin: 15px auto 0;
            border-radius: 2px;
        }


        .timeline {
            position: relative;
            padding: 20px 0;
            list-style: none;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            width: 4px;
            height: 100%;
            background-color: var(--accent-yellow);
            transform: translateX(-50%);
            z-index: 1;
        }

        .timeline-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 80px;
            position: relative;
            opacity: 0; /* Untuk animasi awal */
            transform: translateY(50px);
            transition: opacity 1.2s ease-out, transform 1.2s ease-out; /* Animasi default */
        }

        .timeline-item.fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        .timeline-item:nth-child(even) { /* Item genap di kanan */
            flex-direction: row-reverse;
        }

        .timeline-item-content {
            width: 45%;
            background-color: var(--card-bg-dark);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 6px 15px var(--shadow-dark);
            position: relative;
            border: 1px solid var(--accent-yellow); /* Border kuning untuk efek visual */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transisi hover */
        }

        .timeline-item-content:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.7);
        }

        .timeline-item-content::before {
            content: '';
            position: absolute;
            top: 20px;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 10px;
            z-index: 2;
        }

        .timeline-item:nth-child(odd) .timeline-item-content::before {
            right: -20px;
            border-color: transparent transparent transparent var(--accent-yellow); /* Panah ke kanan */
        }

        .timeline-item:nth-child(even) .timeline-item-content::before {
            left: -20px;
            border-color: transparent var(--accent-yellow) transparent transparent; /* Panah ke kiri */
        }

        .timeline-item-point {
            position: absolute;
            left: 50%;
            top: 20px;
            width: 20px;
            height: 20px;
            background-color: var(--accent-yellow);
            border-radius: 50%;
            transform: translateX(-50%);
            z-index: 3;
            border: 3px solid var(--text-light); /* Lingkaran di timeline */
            box-shadow: 0 0 0 5px var(--card-bg-dark); /* Agar terlihat mengambang */
        }

        .timeline-item-content h3 {
            color: var(--accent-yellow);
            font-family: var(--font-jua);
            margin-bottom: 10px;
            font-size: 1.8em;
        }

        .timeline-item-content p {
            color: var(--text-muted);
            font-size: 0.95em;
        }

        .timeline-date {
            width: 8%; /* Ruang untuk tanggal */
            text-align: center;
            color: var(--text-light);
            font-family: var(--font-jua);
            font-size: 1.2em;
            margin-top: 25px;
        }

        /* --- Styling Komponen Baru --- */
        .key-facts {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 60px 0;
            padding: 20px 0;
            border-top: 1px solid var(--text-muted);
            border-bottom: 1px solid var(--text-muted);
        }

        .fact-item {
            text-align: center;
            margin: 20px;
            opacity: 0; /* Animasi */
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .fact-item.fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        .fact-item h4 {
            font-family: var(--font-jua);
            font-size: 2.5em;
            color: var(--accent-yellow);
            margin-bottom: 5px;
        }

        .fact-item p {
            font-size: 1.1em;
            color: var(--text-light);
        }

        .media-section {
            margin: 80px 0;
            text-align: center;
        }

        .media-section h2 {
            font-family: var(--font-jua);
            color: var(--accent-yellow);
            font-size: 2.5em;
            margin-bottom: 30px;
            animation: fadeInDown 1s ease-out;
        }

        .media-wrapper {
            background-color: var(--card-bg-dark);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 6px 15px var(--shadow-dark);
            max-width: 800px;
            margin: 0 auto;
            opacity: 0; /* Animasi */
            transform: translateY(50px);
            transition: opacity 1.2s ease-out, transform 1.2s ease-out;
        }
        .media-wrapper.fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        .media-wrapper iframe {
            width: 100%;
            height: 450px; /* Sesuaikan tinggi video */
            border: none;
            border-radius: 8px;
        }

        .did-you-know {
            background-color: var(--accent-yellow);
            color: #333;
            padding: 30px;
            border-radius: 10px;
            margin: 80px auto;
            max-width: 800px;
            text-align: center;
            box-shadow: 0 6px 15px var(--shadow-dark);
            /* Properti Awal untuk Animasi Masuk */
            opacity: 0;
            transform: scale(0.8) rotateZ(-5deg); /* Awalnya lebih kecil dan sedikit berputar */
            transition: opacity 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94), /* Custom easing for smoother entry */
                        transform 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94); /* Sama untuk transform */
        }

        .did-you-know.fade-in {
            opacity: 1;
            transform: scale(1) rotateZ(0deg); /* Kembali ke ukuran dan rotasi normal */
        }

        .did-you-know h3 {
            font-family: var(--font-jua);
            font-size: 2em;
            margin-bottom: 15px;
        }

        .did-you-know p {
            font-size: 1.2em;
            font-weight: 500;
            transition: opacity 0.5s ease-in-out; /* Transisi untuk pergantian teks fakta */
        }

        /* --- Desain Responsif --- */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                margin: 20px auto;
                padding: 15px;
            }

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

            .section-intro {
                font-size: 1em;
                margin-bottom: 40px;
            }

            .timeline::before {
                left: 20px; /* Pindah timeline ke kiri */
                transform: translateX(0);
            }

            .timeline-item {
                flex-direction: column !important; /* Semua item di bawah satu sama lain */
                align-items: flex-start; /* Sejajarkan ke kiri */
                margin-bottom: 60px;
            }

            .timeline-item-content {
                width: calc(100% - 60px); /* Lebar card */
                margin-left: 60px; /* Dorong ke kanan untuk memberi ruang timeline */
            }

            .timeline-item-content::before {
                left: -20px !important; /* Pindah panah ke kiri */
                border-color: transparent var(--accent-yellow) transparent transparent !important;
            }

            .timeline-item-point {
                left: 20px; /* Sejajarkan titik ke timeline */
                top: 0; /* Sesuaikan posisi vertikal */
                transform: translateX(-50%);
            }

            .timeline-date {
                width: 100%; /* Tanggal bisa di atas card atau di mana saja yang masuk akal */
                text-align: left;
                margin-left: 60px; /* Sejajarkan dengan card */
                margin-bottom: 10px; /* Jarak dengan card */
                font-size: 1em;
            }

            .key-facts {
                flex-direction: column;
            }

            .fact-item {
                margin: 15px 0;
            }

            .fact-item h4 {
                font-size: 2em;
            }

            .media-wrapper iframe {
                height: 250px; /* Sesuaikan tinggi video untuk mobile */
            }

            .did-you-know {
                margin: 50px auto;
                padding: 20px;
            }

            .did-you-know h3 {
                font-size: 1.5em;
            }
            .did-you-know p {
                font-size: 1em;
            }
        }

        /* --- Animasi Global (Keyframes) --- */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <header class="hero-header">
        <div class="hero-header-content">
            <h1>Jejak Aksara Batak</h1>
            <p>
                Selami kedalaman sejarah Aksara Batak, sebuah warisan abadi yang membentuk identitas dan peradaban.
                Dari prasasti kuno hingga revitalisasi digital, setiap era adalah kisah yang patut dipelajari.
            </p>
            <a href="#timeline-section" class="button">Mulai Eksplorasi</a>
        </div>
    </header>

    <div class="container">
        <h1 id="timeline-section">Garis Waktu Perkembangan Aksara</h1>
        <p class="section-intro">
            Aksara Batak adalah sistem penulisan yang kaya, mencerminkan pemikiran dan kearifan lokal. Mari kita telusuri momen-momen penting dalam perjalanannya.
        </p>

        <ul class="timeline">
            <li class="timeline-item">
                <div class="timeline-date">Abad 14</div>
                <div class="timeline-item-content">
                    <h3>Kemunculan Awal & Pengaruh Asing</h3>
                    <p>Aksara Batak diperkirakan mulai berkembang pada abad ke-14, dengan akar pengaruh dari aksara Pallawa yang dibawa dari India Selatan, melalui adaptasi lokal dan kontak dengan aksara Kawi dari Jawa dan Sumatra.</p>
                </div>
                <div class="timeline-item-point"></div>
            </li>
            <li class="timeline-item">
                <div class="timeline-date">Abad 16-19</div>
                <div class="timeline-item-content">
                    <h3>Era Pustaha Laklak</h3>
                    <p>Periode ini ditandai dengan penggunaan meluas Aksara Batak pada kulit kayu Pustaha Laklak. Manuskrip ini tidak hanya catatan spiritual atau ritual, tetapi juga ensiklopedia lokal yang berisi pengobatan, ramalan, dan silsilah.</p>
                </div>
                <div class="timeline-item-point"></div>
            </li>
            <li class="timeline-item">
                <div class="timeline-date">1800-an</div>
                <div class="timeline-item-content">
                    <h3>Interaksi dengan Misionaris</h3>
                    <p>Kedatangan misionaris Eropa membawa perubahan signifikan. Mereka mendokumentasikan, mempelajari, dan menerbitkan materi tentang Aksara Batak, termasuk kamus dan tata bahasa awal, yang menjadi fondasi studi modern.</p>
                </div>
                <div class="timeline-item-point"></div>
            </li>
            <li class="timeline-item">
                <div class="timeline-date">Awal 1900-an</div>
                <div class="timeline-item-content">
                    <h3>Pergeseran ke Huruf Latin</h3>
                    <p>Seiring dengan masuknya pendidikan formal bergaya Barat dan penyebaran literasi melalui huruf Latin, penggunaan Aksara Batak di ranah publik dan sehari-hari secara bertahap berkurang.</p>
                </div>
                <div class="timeline-item-point"></div>
            </li>
            <li class="timeline-item">
                <div class="timeline-date">Pertengahan 1900-an</div>
                <div class="timeline-item-content">
                    <h3>Masa Senja Aksara</h3>
                    <p>Penggunaan Aksara Batak semakin terbatas pada upacara adat, praktik keagamaan tradisional, dan kalangan tertentu yang masih melestarikannya secara turun-temurun, sementara generasi muda lebih akrab dengan Latin.</p>
                </div>
                <div class="timeline-item-point"></div>
            </li>
            <li class="timeline-item">
                <div class="timeline-date">Abad 21</div>
                <div class="timeline-item-content">
                    <h3>Fajar Revitalisasi Digital</h3>
                    <p>Di era informasi, muncul inisiatif dari komunitas dan akademisi untuk menghidupkan kembali Aksara Batak melalui digitalisasi. Berbagai aplikasi, *font*, dan platform daring mulai dikembangkan untuk mempermudah akses dan pembelajaran.</p>
                </div>
                <div class="timeline-item-point"></div>
            </li>


            <li class="timeline-item">
                <div class="timeline-date">Masa Kini</div>
                <div class="timeline-item-content">
                    <h3>Aksaranta - Jembatan Masa Depan</h3>
                    <p>Aksaranta hadir sebagai salah satu wujud nyata dari upaya revitalisasi ini. Kami berkomitmen untuk menjembatani generasi kini dengan warisan leluhur, memastikan Aksara Batak tetap hidup dan relevan di dunia modern.</p>
                </div>
                <div class="timeline-item-point"></div>
            </li>
        </ul>

        <div class="key-facts">
            <div class="fact-item">
                <h4>7</h4>
                <p>Variasi dari awal <br>abad sampai sekarang</p>
            </div>
            <div class="fact-item">
                <h4>>600</h4>
                <p>Pustaha Laklak <br> Tercatat - media tulis</p>
            </div>
            <div class="fact-item">
                <h4>14</h4>
                <p>Abad Awal Kemunculan</p>
            </div>
        </div>

        <div class="media-section">
            <h2>Saksikan Perjalanan Aksara</h2>
            <div class="media-wrapper">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/7iiawKyA4os?si=3qqFTgmMluETghoK" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <p style="margin-top: 15px; color: var(--text-muted);">
                    *Video ilustrasi: Sejarah singkat dan keindahan Aksara Batak. (Mohon ganti dengan video asli yang relevan)*
                </p>
            </div>
        </div>

        <div class="did-you-know">
            <h3>Tahukah Kamu?</h3>
            <p id="fact-text">Aksara Batak disebut juga Surat Batak. Setiap sub-etnis Batak memiliki sedikit perbedaan dalam gaya penulisannya.</p>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll(
                '.timeline-item, .fact-item, .media-wrapper, .did-you-know'
            );

            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            // Membuat Intersection Observer
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Jika elemen masuk viewport, tambahkan kelas 'fade-in'
                        entry.target.classList.add('fade-in');
                        // Hentikan observasi setelah animasi dipicu agar tidak berulang
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Mulai mengamati setiap elemen yang ditentukan
            animatedElements.forEach(element => {
                observer.observe(element);
            });

            // Efek Paralaks Ringan pada Header (opsional)
            const heroHeader = document.querySelector('.hero-header');
            if (heroHeader) {
                window.addEventListener('scroll', function() {
                    const scrollPosition = window.pageYOffset;
                    // Menggeser latar belakang ke atas 30% dari kecepatan scroll
                    heroHeader.style.backgroundPositionY = -scrollPosition * 0.3 + 'px';
                });
            }

            // Fakta Menarik Bergantian di Bagian "Tahukah Kamu?"
            const facts = [
                "Aksara Batak adalah sistem penulisan yang berasal dari aksara Brahmi kuno di India.",
                "Setiap aksara Batak mewakili satu suku kata, bukan satu huruf tunggal seperti alfabet Latin.",
                "Pustaha Laklak, media tulis Aksara Batak, seringkali dibuat dari kulit kayu pohon alim.",
                "Ada lima jenis utama Aksara Batak yang dikenal: Toba, Karo, Mandailing, Pakpak, dan Simalungun.",
                "Misionaris Belanda dan Jerman berperan besar dalam mendokumentasikan Aksara Batak ke dalam bentuk buku."
            ];
            const factTextElement = document.getElementById('fact-text');
            let currentFactIndex = 0;

            function updateFact() {
                if (factTextElement) {
                    // Mulai animasi fade out
                    factTextElement.style.opacity = 0;
                    setTimeout(() => {
                        // Setelah fade out, ganti teks
                        factTextElement.textContent = facts[currentFactIndex];
                        // Mulai animasi fade in
                        factTextElement.style.opacity = 1;
                        // Lanjut ke fakta berikutnya
                        currentFactIndex = (currentFactIndex + 1) % facts.length;
                    }, 500); // Durasi fade out (sesuaikan dengan CSS transition opacity)
                }
            }

            // Panggil fungsi sekali saat halaman dimuat untuk menampilkan fakta pertama
            if (factTextElement) {
                updateFact();
            }

            // Ganti fakta setiap beberapa detik (misalnya 7 detik = 7000 ms)
            if (factTextElement) {
                setInterval(updateFact, 7000);
            }
        });
    </script>
</body>
</html>
