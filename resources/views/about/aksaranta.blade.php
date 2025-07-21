<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aksaranta - Gerbang Aksara Batak Digital</title>
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
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: var(--card-bg-dark);
            border-radius: 12px;
            box-shadow: 0 8px 20px var(--shadow-dark);
        }

        .hero-header {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('../img/raja-ampat.jpg') no-repeat center center/cover;
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

        .pembatas {
            height: 100px;
            display: none;
        }

        .kalimat-about {
            width: 80%;
            margin: 10px auto 60px auto;
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }
        .kalimat-about.fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        .kalimat-about h5 {
            font-size: 18px;
            color: var(--accent-yellow);
            font-family: var(--font-jua);
        }
        .kalimat-about h3 {
            font-size: 45px;
            color: var(--text-light);
            font-family: var(--font-jua);
        }
        .kalimat-about p {
            font-size: 23px;
            font-family: var(--font-opensans);
            color: var(--text-muted);
        }

        .container-about {
            width: 80%;
            display: flex;
            margin: 30px auto;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .box-about {
            width: 27%;
            padding: 15px;
            box-sizing: border-box;
            box-shadow: 0.1px 0.1px 50px var(--shadow-dark);
            text-align: center;
            margin: 30px auto;
            background-color: var(--card-bg-dark);
            color: var(--text-light);
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }
        .box-about.fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        .box-about {
            transition: opacity 1s ease-out, transform 1s ease-out, box-shadow 0.3s ease-in-out;
        }
        .box-about:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.7);
        }

        .box-about h3 {
            font-size: 21px;
            color: var(--accent-yellow);
            font-family: var(--font-jua);
        }
        .box-about p {
            margin: 15px 0 0 0;
            font-size: 18px;
            font-family: var(--font-opensans);
            color: var(--text-muted);
        }

        .biodata {
            width: 80%;
            margin: 30px auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .box-biodata {
            width: 45%;
            box-shadow: 0.1px 0.1px 50px var(--shadow-dark);
            padding: 15px;
            box-sizing: border-box;
            background-color: var(--card-bg-dark);
            text-align: center;
            color: var(--text-light);
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }
        .box-biodata.fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        .box-biodata {
            transition: opacity 1s ease-out, transform 1s ease-out, box-shadow 0.3s ease-in-out;
        }
        .box-biodata:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.7);
        }

        .box-biodata h4 {
            font-size: 20px;
            font-family: var(--font-jua);
            color: var(--accent-yellow);
        }
        .box-biodata p {
            font-size: 18px;
            margin: 15px 0 0 0;
            font-family: var(--font-opensans);
            color: var(--text-muted);
        }

        .container-about-2 {
            width: 80%;
            box-shadow: 0.1px 0.1px 50px var(--shadow-dark);
            display: flex;
            justify-content: space-between;
            margin: 30px auto;
            padding: 20px;
            flex-wrap: wrap;
            box-sizing: border-box;
            background-color: var(--card-bg-dark);
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .container-about-2.fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        .gambar-book-satu {
            width: 47%;
        }
        .gambar-book-satu img {
            width: 100%;
        }
        .content-book-satu {
            width: 50%;
        }

        .box-content-satu {
            margin: 10px 0 0 0;
            display: flex;
            justify-content: space-between;
        }
        .kalimat-book-satu {
            margin: 0 0 0 20px;
        }
        .kalimat-book-satu h3 {
            font-size: 20px;
            font-family: var(--font-jua);
            color: var(--accent-yellow);
        }
        .kalimat-book-satu p {
            font-size: 18px;
            margin: 15px 0 0 0;
            color: var(--text-muted);
            font-family: var(--font-opensans);
        }

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

        footer {
            width: 100%;
            display: flex;
            justify-content: space-around;
            background-color: var(--accent-yellow);
            padding: 15px;
            box-sizing: border-box;
            color: #333;
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

            .kalimat-about {
                margin-bottom: 40px;
            }
            .kalimat-about h3 {
                font-size: 30px;
            }
            .kalimat-about p {
                font-size: 14px;
            }

            .box-about {
                width: 100%;
                margin: 30px auto;
            }
            .box-about p {
                font-size: 14px;
            }

            .box-biodata {
                width: 100%;
                margin: 30px auto;
            }
            .box-biodata p {
                font-size: 14px;
            }

            .gambar-book-satu {
                width: 100%;
            }
            .content-book-satu {
                width: 100%;
            }
            .box-content-satu img {
                display: none;
            }
            .kalimat-book-satu {
                margin: 0;
            }
            .kalimat-book-satu p {
                font-size: 14px;
            }

            footer {
                flex-wrap: wrap;
            }
            .footer-kiri, .footer-kanan {
                width: 100%;
                text-align: center;
                justify-content: center;
            }
            .footer-kanan div {
                margin: 0 10px;
            }

            .up {
                padding: 10px;
                margin: 0 0 35px 0;
            }
            .klik-up {
                margin: 0 1px 0 0;
            }
        }

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
            <h1>Aksaranta</h1>
            <p>
                Selamat datang di Aksaranta, aplikasi web komprehensif yang didedikasikan untuk melestarikan dan memperkenalkan
                kekayaan Aksara Batak serta budaya luhur masyarakat Batak. Kami percaya bahwa teknologi dapat
                menjadi jembatan untuk memahami warisan leluhur, dan itulah misi utama kami.
            </p>
            <a href="#main-content" class="button">Mulai Eksplorasi</a>
        </div>
    </header>

    <main id="main-content">
        <div class="up">
            <a href="#top" aria-label="Scroll to top">
                <div class="klik-up">
                    <img src="../img/top.png" width="30px" alt="Panah atas" />
                </div>
            </a>
        </div>

        <div class="kalimat-about fade-in">
            <h5>EKSPLORASI AKSARA BATAK</h5>
            <br />
            <h3>Mengenal Kekayaan Budaya Batak Lebih Dalam</h3>
            <br />
            <p>
                Kami hadirkan aplikasi web komprehensif untuk mendalami Aksara Batak,
                menyediakan fitur transliterasi, informasi budaya, sejarah, virtual tour,
                blog inspiratif, musik tradisional, kamus, hingga panduan tempat wisata
                yang memukau.
            </p>
        </div>

        <div class="container-about">
            <div class="box-about">
                <img src="../img/about/mandarin1.png" width="200px" height="135px" alt="Bahasa Inggris" />
                <h3>Transliterasi Akurat</h3>
                <p>
                    Ubah Aksara Batak ke Latin atau sebaliknya dengan mudah dan presisi,
                    membantu Anda memahami dan menulis aksara.
                </p>
            </div>

            <div class="box-about atas">
                <img src="../img/about/skill5.png" width="200px" height="135px" alt="Pusat Budaya Batak" />
                <h3>Pusat Budaya Batak</h3>
                <p>
                    Jelajahi keunikan budaya Batak, mulai dari adat istiadat, filosofi,
                    hingga kekayaan keseniannya.
                </p>
            </div>

            <div class="box-about">
                <img src="../img/about/skill2.png" width="200px" height="135px" alt="Jejak Sejarah Aksara" />
                <h3>Jejak Sejarah Aksara</h3>
                <p>
                    Pelajari asal-usul dan evolusi Aksara Batak, menelusuri jejak sejarah
                    yang membentuk identitasnya.
                </p>
            </div>

            <div class="box-about">
                <img src="../img/about/skill4.png" width="200px" height="135px" alt="Virtual Tour Imersif" />
                <h3>Virtual Tour Imersif</h3>
                <p>
                    Rasakan sensasi berkeliling destinasi budaya Batak tanpa harus beranjak,
                    hadirkan pengalaman yang nyata.
                </p>
            </div>

            <div class="box-about atas">
                <img src="../img/about/skill3.png" width="200px" height="135px" alt="Kamus & Musik Tradisional" />
                <h3>Kamus & Musik Tradisional</h3>
                <p>
                    Perkaya kosakata Anda dengan kamus Aksara Batak dan nikmati alunan
                    musik tradisional yang menenangkan jiwa.
                </p>
            </div>

            <div class="box-about">
                <img src="../img/about/social1.png" width="200px" height="135px" alt="Blog & Destinasi Wisata" />
                <h3>Blog & Destinasi Wisata</h3>
                <p>
                    Temukan artikel menarik seputar Batak dan jelajahi rekomendasi tempat
                    wisata ikonik dengan panduan lengkap.
                </p>
            </div>
        </div>

        <div class="biodata">
            <div class="box-biodata">
                <img src="../img/about/diri.png" width="200px" height="135px" alt="Tim Aksaranta" />
                <h4>Tim Aksaranta</h4>
                <p>Pengembang Aksara Batak Digital</p>
                <p>Indonesia</p>
            </div>

            <div class="box-biodata">
                <img src="../img/about/univ.png" width="200px" height="135px" alt="Dedikasi untuk Budaya" />
                <h4>Dedikasi untuk Budaya</h4>
                <p>Berkomitmen melestarikan Aksara Batak</p>
                <p>Aksaranta@gmail.com</p>
            </div>
        </div>

        <div class="container-about-2">
            <div class="gambar-book-satu">
                <img src="../img/about/icon-satu.png" alt="Icon Wawasan" />
            </div>

            <div class="content-book-satu">
                <div class="box-content-satu">
                    <img src="../img/about/wawasan.png" width="130px" alt="Wawasan Yang Luas" />
                    <div class="kalimat-book-satu">
                        <h3>Antarmuka Mudah Digunakan</h3>
                        <p>Dirancang untuk navigasi yang intuitif, memungkinkan eksplorasi Aksara Batak tanpa hambatan.</p>
                    </div>
                </div>

                <div class="box-content-satu">
                    <img src="../img/about/skill1.png" width="130px" alt="Rekomendasi Tempat" />
                    <div class="kalimat-book-satu">
                        <h3>Konten Selalu Diperbarui</h3>
                        <p>
                            Kami terus menambahkan informasi, fitur, dan destinasi baru untuk memperkaya pengalaman Anda.
                        </p>
                    </div>
                </div>

                <div class="box-content-satu">
                    <img src="../img/about/informasi.png" width="130px" alt="Memberi Informasi" />
                    <div class="kalimat-book-satu">
                        <h3>Mendukung Pelestarian Budaya</h3>
                        <p>
                            Dengan setiap penggunaan, Anda turut serta dalam melestarikan dan memperkenalkan kekayaan Aksara Batak kepada dunia.
                        </p>
                    </div>
                </div>
            </div>
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const animatedElements = document.querySelectorAll(
                ".kalimat-about, .box-about, .box-biodata, .container-about-2"
            );

            const observerOptions = {
                root: null,
                rootMargin: "0px",
                threshold: 0.1,
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("fade-in");
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            animatedElements.forEach((element) => {
                observer.observe(element);
            });

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

        });
    </script>
</body>
</html>
