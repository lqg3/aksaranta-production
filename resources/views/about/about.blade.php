<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aksaranta - Tentang Tim Kami</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Jua&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #1a1a1a;
            --card-bg-dark: #2c2c2c;
            --member-card-bg: #3f3c3c;
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
            max-width: 1200px;
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
        .section-intro h1 {
            font-family: var(--font-jua);
            font-size: 2.8em;
            color: var(--accent-yellow);
            margin-bottom: 15px;
            position: relative;
        }
        .section-intro h1::after {
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
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            padding: 20px 0;
            justify-content: center;
            align-items: flex-start;
        }
        .team-member {
            background-color: var(--member-card-bg);
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            padding: 25px;
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out, box-shadow 0.3s ease-in-out;
            animation-fill-mode: forwards;
        }
        .team-member.fade-in {
            opacity: 1;
            transform: translateY(0);
        }
        .team-member:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.7);
        }
        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 5px solid var(--accent-yellow);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }
        .team-member:hover img {
            transform: scale(1.05);
        }
        .team-member h2 {
            color: var(--text-light);
            margin-bottom: 10px;
            font-size: 1.8em;
            font-family: var(--font-jua);
        }
        .team-member p {
            font-size: 0.95em;
            color: var(--text-muted);
            margin-bottom: 8px;
        }
        .team-member .role {
            font-weight: 600;
            color: var(--accent-yellow);
            margin-top: 5px;
            display: block;
            font-size: 1.1em;
        }
        .team-member .motto {
            font-style: italic;
            color: #bdc3c7;
            margin-top: 15px;
            font-size: 0.9em;
        }
        .team-grid .team-member:last-child:nth-last-child(1) {
            grid-column: 1 / -1;
            max-width: 350px;
            margin: 0 auto;
        }
        @media (max-width: 800px) {
            .team-grid .team-member:last-child:nth-last-child(1) {
                grid-column: auto;
                max-width: none;
                width: 95%;
                margin: 0 auto;
            }
        }
        .vision-section {
            background-color: var(--member-card-bg);
            padding: 40px;
            border-radius: 12px;
            margin-top: 50px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }
        .vision-section.fade-in {
            opacity: 1;
            transform: translateY(0);
        }
        .vision-section h2 {
            color: var(--accent-yellow);
            font-size: 2.2em;
            font-family: var(--font-jua);
            margin-bottom: 20px;
        }
        .vision-section p {
            max-width: 800px;
            margin: 0 auto;
            color: var(--text-light);
            font-size: 1.1em;
        }
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
            .container {
                width: 95%;
                margin: 20px auto;
                padding: 15px;
            }
            .section-intro {
                margin: 40px auto;
            }
            .section-intro h1 {
                font-size: 2.2em;
            }
            .section-intro p {
                font-size: 1em;
            }
            .team-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .team-member {
                width: 95%;
                margin: 0 auto;
            }
            .vision-section {
                padding: 25px;
            }
            .vision-section h2 {
                font-size: 1.8em;
            }
            .vision-section p {
                font-size: 1em;
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
    <header class="hero-header" id="top">
        <div class="hero-header-content">
            <h1>Tentang Tim Aksaranta</h1>
            <p>
                Kami adalah Developer dan Researcher di balik aplikasi Aksaranta ini, berdedikasi untuk menciptakan pengalaman terbaik bagi Anda.
                Kenali lebih dekat orang-orang yang bersemangat dalam melestarikan Aksara Batak.
            </p>
            <a href="#team-section" class="button">Lihat Tim Kami</a>
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
        <div class="container">
            <div class="section-intro">
                <h1>Mengenal Pengembang Kami</h1>
                <p>
                    Tim kami terdiri dari individu-individu berbakat dan berdedikasi yang memiliki visi bersama untuk
                    menghidupkan kembali dan melestarikan kekayaan Aksara Batak di era digital.
                </p>
            </div>
            <div class="team-grid" id="team-section">
                <div class="team-member" style="animation-delay: 0.2s;">
                    <img src="../img/fotoku-rapih.jpg" alt="Foto Jovanka Alexandro">
                    <h2>Jovanka <br> Alexandro</h2>
                    <p class="role">Developer</p>
                    <p><strong>Universitas:</strong> Universitas Pendidikan Indonesia</p>
                    <p class="motto">"Kode yang bersih adalah puisi yang indah."</p>
                </div>
                <div class="team-member" style="animation-delay: 0.4s;">
                    <img src="../img/tepen.jpeg" alt="Foto Steven Martua Christian Simbolon">
                    <h2>Steven Martua Christian Simbolon</h2>
                    <p class="role">Developer</p>
                    <p><strong>Universitas:</strong> Universitas Pendidikan Indonesia</p>
                    <p class="motto">"Desain adalah jembatan antara imajinasi dan realitas."</p>
                </div>
                <div class="team-member" style="animation-delay: 0.6s;">
                    <img src="../img/ryan.jpeg" alt="Foto Ryan Gabriel Siringoringo">
                    <h2>Ryan Gabriel Siringoringo</h2>
                    <p class="role">Developer</p>
                    <p><strong>Universitas:</strong> Universitas Pendidikan Indonesia</p>
                    <p class="motto">"Perencanaan yang baik adalah separuh dari kemenangan."</p>
                </div>
                <div class="team-member" style="animation-delay: 0.8s;">
                    <img src="../img/sofie.jpeg" alt="Foto Sofian Putri Lumban Gaol">
                    <h2>Sofian Putri Lumban Gaol</h2>
                    <p class="role">Modul Researcher & Teacher</p>
                    <p><strong>Universitas:</strong> Universitas Pendidikan Indonesia</p>
                    <p class="motto">"Kesempurnaan bukanlah hal kecil, tapi hal-hal kecil itulah yang menciptakan kesempurnaan."</p>
                </div>
            </div>
            <div class="vision-section">
                <h2>Visi Kami: Memajukan Aksara Batak di Era Digital</h2>
                <p>
                    Kami berkomitmen untuk mengembangkan platform Aksaranta yang intuitif dan kaya fitur, menjadi jembatan antara kekayaan budaya tradisional dan teknologi modern. Melalui inovasi, riset, dan kolaborasi, kami bertekad untuk memastikan Aksara Batak tidak hanya lestari, tetapi juga berkembang dan relevan bagi generasi mendatang di seluruh dunia.
                </p>
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
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll(
                '.section-intro, .team-member, .vision-section'
            );
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            animatedElements.forEach(element => {
                observer.observe(element);
            });
            const heroHeader = document.querySelector('.hero-header');
            if (heroHeader) {
                window.addEventListener('scroll', function() {
                    const scrollPosition = window.pageYOffset;
                    heroHeader.style.backgroundPositionY = -scrollPosition * 0.3 + 'px';
                });
            }
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
        });
    </script>
</body>
</html>
