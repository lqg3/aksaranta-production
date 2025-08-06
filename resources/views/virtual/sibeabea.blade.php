
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aksaranta</title>
    <style>
      * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background-color: #1a1a1a; /* Latar belakang gelap */
  color: white; /* Teks berwarna putih */
}

@font-face {
  src: url(font/Jua-Regular.ttf);
  font-family: "jua";
}

@font-face {
  src: url(font/OpenSansRegular.ttf);
  font-family: "opensans";
}

.pembatas {
  height: 150px;
}

.wisata {
  width: 90%;
  margin: 30px auto;
}

.wisata iframe {
  width: 100%;
  height: 600px;
}

.container-wisata {
  width: 80%;
  margin: 30px auto;
}

.flex-wisata {
  display: flex;
  justify-content: space-between;
  margin: 0 0 30px 0;
  flex-wrap: wrap;
  width: 100%;
}

.flex-wisata img {
  width: 50%;
}

.flex-kalimat-ampat {
  width: 40%;
}

.flex-kalimat-ampat h3 {
  font-size: 25px;
  margin: 0 0 30px 0;
  font-family: "jua";
}

.flex-kalimat-ampat p {
  font-family: "opensans";
}

.daftar-pustaka {
  width: 70%;
  margin: 0 30px 0 30px;
  border-left: 5px solid #B10002;
}

.daftar-pustaka p {
  margin: 0 0 0 20px;
  font-family: "opensans";
}

@media (max-width: 800px) {
  .flex-wisata img {
    width: 100%;
  }
  .flex-kalimat-ampat {
    width: 100%;
  }
  .flex-kalimat-ampat h3 {
    text-align: center;
    margin: 30px 0 30px 0;
  }
}

/* FOOTER */
footer {
  width: 100%;
  background-color: #3a394e;
  display: flex;
  justify-content: space-around;
  padding: 15px;
  box-sizing: border-box;
}

.footer-kiri {
  margin: 30px 0 30px 0;
  width: 40%;
}

.footer-kiri p {
  font-size: 16px;
  color: #fff;
  font-family: "opensans";
}

.footer-kiri .foo {
  font-size: 21px;
  color: #fff;
  font-weight: bold;
  margin: 0 0 15px 0;
  font-family: "opensans";
}

.footer-kanan {
  margin: 30px 0 30px 0;
  width: 40%;
  display: flex;
  justify-content: space-around;
}

.satu-footer h5 {
  font-size: 21px;
  color: #fff;
  font-weight: bold;
  font-family: "opensans";
}

.satu-footer p {
  font-size: 16px;
  color: #fff;
  margin: 15px 0 0 0;
  font-family: "opensans";
}

@media (max-width: 800px) {
  footer {
    flex-wrap: wrap;
  }
  .footer-kiri {
    width: 100%;
    text-align: center;
  }
  .footer-kanan {
    width: 100%;
  }
}

/* NAIK */
.up {
  width: 100%;
  bottom: 0px;
  padding: 20px;
  box-sizing: border-box;
  position: absolute;
  margin: auto;
  position: fixed;
  margin: 0 0 15px 0;
}

.klik-up {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: #bab5ff;
  display: flex;
  float: right;
  transition: 0.7s;
  margin: 0 35px 0 0;
}

.klik-up img {
  margin: auto;
}

.klik-up:hover {
  background-color: antiquewhite;
}

@media (max-width: 800px) {
  .up {
    padding: 10px;
    margin: 0 0 35px 0;
  }
  .klik-up {
    margin: 0 1px 0 0;
  }
}

.box-peta1 {
  background-image: url('../img/sibeabea2.jpg');
  width: 80%;
  height: 450px;
  background-size: cover; /* Mengatur agar gambar tidak pecah dan tetap menutupi elemen */
  background-position: center; /* Menjaga gambar tetap berada di tengah */
  background-repeat: no-repeat; /* Menghindari gambar diulang */
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  color: white;
  margin: 20px auto
}



.box-peta1 .content {
  padding: 20px;
  background-color: rgba(0, 0, 0, 0.5);
  /* border-radius: 15px; */
}

.box-peta1 .content h1 {
  font-size: 50px;
  margin: 0 0 10px 30px;
}

.box-peta1 .content p {
  margin: 0 0 0 30px;
}

/* --- Variabel CSS Global (Pastikan ini ada di bagian atas blok <style> Anda) --- */
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

/* --- Gaya CSS untuk Header --- */
.hero-header {
    /* Ganti URL gambar banner Anda di sini. Sesuaikan path jika perlu. */
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('../img/sibeabea2.jpg') no-repeat center center/cover;
    color: var(--text-light);
    text-align: center;
    padding: 100px 20px;
    margin-bottom: 60px; /* Jarak antara header dan konten selanjutnya */
    position: relative;
    overflow: hidden;
    display: flex;
    height: 100vh;
    animation: fadeIn 1.5s ease-out; /* Animasi fade-in saat halaman dimuat */
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
    margin: auto;
    transition: transform 0.5s ease-out; /* Untuk efek paralaks ringan */
}

.hero-header-content h1 {
    font-family: var(--font-jua);
    font-size: 4.5em;
    margin-bottom: 10px;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
    animation: fadeInDown 1.2s ease-out; /* Animasi judul */
    color: var(--text-light);
}

.hero-header-content p {
    font-size: 1.3em;
    max-width: 800px;
    margin: 0 auto 30px;
    color: var(--text-light);
    animation: fadeInUp 1.2s ease-out 0.2s; /* Animasi paragraf */
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
    animation: fadeIn 1.2s ease-out 0.4s; /* Animasi tombol */
}

.hero-header .button:hover {
    background-color: var(--accent-yellow-hover);
    transform: translateY(-3px); /* Efek hover pada tombol */
}

/* --- Media Queries untuk Header (Responsive) --- */
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
}

/* --- Keyframe Animations (Pastikan ini juga ada di blok <style> Anda) --- */
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
        <h1>Bukit Sibea-bea</h1>
        <p>
             Bukit Sibea-bea, terletak di Harian Boho, Kabupaten Samosir, Sumatera Utara, adalah destinasi wisata yang menawarkan pemandangan menakjubkan dari ketinggian 1.021 meter di atas permukaan laut. Dikenal dengan sebutan "Kelok 8"
        </p>
        <a href="#detail-section" class="button">Lihat Lebih Lanjut</a>
    </div>
</header>
    <div class="wisata" id="detail-section">
        <iframe src="https://www.google.com/maps/embed?pb=!4v1752499610365!6m8!1m7!1sCAoSF0NJSE0wb2dLRUlDQWdJRFJydUNJNUFF!2m2!1d2.550670110709745!2d98.67358866150647!3f7.905651189478301!4f-4.17544030146918!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    {{-- <div class="box-peta1">
        <div class="content">
            <h1>Bukit Sibea-bea</h1>
            <p>360-Degree View Control: Users can rotate the view to explore all angles of <br> a space or scene, providing a more realistic experience.</p>
        </div>
    </div> --}}

    {{-- <div class="pembatas"></div> --}}

    <div class="up">
      <a href=""
        ><div class="klik-up">
          <img src="img/top.png" width="30px" alt="" />
        </div>
      </a>
    </div>



    <div class="container-wisata">
      <div class="flex-wisata">
        <img src="../img/sibeabea.jpg" alt="" />
        <div class="flex-kalimat-ampat">
          <h3>BUKIT SIBEA-BEA</h3>
          <p>
            Bukit Sibea-bea, terletak di Harian Boho, Kabupaten Samosir, Sumatera Utara, adalah destinasi wisata yang menawarkan pemandangan menakjubkan dari ketinggian 1.021 meter di atas permukaan laut. Dikenal dengan sebutan "Kelok 8", bukit ini memiliki jalan berkelok yang menjadi daya tarik utama bagi wisatawan. Pemandangan Danau Toba yang indah bisa dinikmati dari berbagai sudut bukit ini, menjadikannya lokasi yang ideal untuk berfoto dan bersantai menikmati alam.


            <br /><br />
            Salah satu daya tarik utama Bukit Sibea-bea adalah patung Yesus Kristus setinggi 61 meter, yang merupakan patung Yesus tertinggi di dunia. Berdiri kokoh di puncak bukit, patung ini menjadi simbol spiritual bagi umat Kristiani sekaligus menarik perhatian para wisatawan. Keberadaan patung ini memberikan sentuhan religius sekaligus menambah daya tarik wisata di daerah sekitar Danau Toba.
            Selain itu, Bukit Sibea-bea juga menjadi destinasi yang cocok untuk wisatawan yang mencari ketenangan. Suasana sejuk dan udara yang bersih menjadikan tempat ini ideal untuk melarikan diri dari hiruk-pikuk kota. Pengunjung dapat menikmati waktu berharga dengan keluarga atau teman sambil meresapi kedamaian alam sekitar. Bukit ini juga memiliki potensi sebagai tempat meditasi atau refleksi diri, menjadikannya pilihan yang pas bagi mereka yang ingin merasakan ketenangan spiritual sambil menikmati keindahan alam yang luar biasa.

          </p>
        </div>
      </div>

      <p style="font-family: 'opensans'">
        Selain menikmati pemandangan alam yang spektakuler, pengunjung juga dapat melakukan berbagai aktivitas seru, seperti berfoto di spot-spot ikonik, menikmati sunrise dan sunset yang mempesona, atau bahkan camping di kawasan tersebut. Bukit Sibea-bea juga menawarkan kuliner khas Batak yang dapat ditemukan di warung sekitar area wisata, memberikan pengalaman yang lebih lengkap bagi para pengunjung.
        <br />
        <br />

        Akses ke Bukit Sibea-bea cukup mudah, meskipun beberapa bagian jalannya berkelok tajam. Dari Kota Medan, perjalanan menuju bukit ini memakan waktu sekitar 4,5 jam dengan kendaraan pribadi. Dengan harga tiket yang terjangkau, sekitar Rp 5.000 untuk pengunjung umum, Bukit Sibea-bea menjadi pilihan wisata yang sempurna bagi siapa saja yang ingin menikmati keindahan alam dan spiritualitas yang menyatu di satu tempat.
        <br /><br />


        <br /><br />
      </p>

      <div class="daftar-pustaka">
        <p style="font-family: 'opensans'">
          <span style="color: #B10002; font-weight: bold">REFERENSI </span> <br />
          <br />
          Idntimes. (2023, 22 Mei). Wisata Bukit Sibea-bea, Samosir, Sumatra Utara: Menikmati Pemandangan Danau Toba. Diambil dari"
          <a style="color: #47b1cb"
            href="https://www.idntimes.com/travel/destination/wisata-bukit-sibea-bea-sumatra-utara-00-819v4-4xpbtd?utm_source"
            >,
            https://www.idntimes.com/travel/destination/wisata-bukit-sibea-bea-sumatra-utara-00-819v4-4xpbtd?utm_source</a
          >
        </p>
      </div>
    </div>

    <!-- FOOTER -->
    {{-- <footer>
      <div class="footer-kiri">
        <p class="foo">Geulify</p>
        <p>Nikmati keseruan setiap detik nya.</p>
      </div>

      <div class="footer-kanan">
        <div class="satu-footer">
          <h5>Gunung</h5>
          <p>Keindahan</p>
          <p>Natural</p>
        </div>

        <div class="satu-footer">
          <h5>Pantai</h5>
          <p>Suasana</p>
          <p>Sejuk</p>
        </div>

        <div class="satu-footer">
          <h5>Kuliner</h5>
          <p>Kenikmatan</p>
          <p>Khas</p>
        </div>
      </div>
    </footer>
    <!-- FOOTER --> --}}

    <script>
        // --- Bagian JavaScript untuk Header ---
// Tempatkan kode ini di dalam tag <script> di bagian bawah file HTML Anda,
// atau di dalam document.addEventListener('DOMContentLoaded', function() { ... });

const heroHeader = document.querySelector('.hero-header');
if (heroHeader) {
    window.addEventListener('scroll', function() {
        const scrollPosition = window.pageYOffset;
        // Efek paralaks ringan pada gambar latar belakang header
        heroHeader.style.backgroundPositionY = -scrollPosition * 0.3 + 'px';
    });
}
    </script>
  </body>
</html>
