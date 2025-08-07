
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
  background-image: url('../img/bukitholbung3.jpg');
  width: 80%;
  height: 450px;
  background-size: cover; /* Mengatur agar gambar tidak pecah dan tetap menutupi elemen */
  background-position: center; /* Menjaga gambar tetap berada di tengah */
  background-repeat: no-repeat; /* Menghindari gambar diulang */
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  color: white;
  margin: 20px auto;
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
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('../img/bukitholbung3.jpg') no-repeat center center/cover;
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
    margin: auto;
    z-index: 2;
    transform: translateY(0);
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
        <h1> Arrasyiid Cookies Cake Snack</h1>
        <p>
            Arrasyiid Cookies Cake Snack merupakan salah satu destinasi wisata yang terletak di kawasan Berastagi, Kabupaten Karo, Sumatera Utara
        </p>
        <a href="#detail-section" class="button">Lihat Lebih Lanjut</a>
    </div>
</header>

    <div class="wisata" id="detail-section">
        <iframe src="https://www.google.com/maps/embed?pb=!4v1752499280074!6m8!1m7!1sCAoSF0NJSE0wb2dLRUlDQWdJQ0owY3ZLMEFF!2m2!1d2.534517020904797!2d98.70421379637801!3f297.32734438255034!4f0.6947227147914248!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    {{-- <div class="box-peta1">
        <div class="content">
            <h1>Bukit Holbung</h1>
            <p>360-Degree View Control: Users can rotate the view to explore all angles of <br> a space or scene, providing a more realistic experience.</p>
        </div>
    </div> --}}

    {{-- <div class="pembatas"></div> --}}

    <div class="up">
      <a href=""
        ><div class="klik-up">
          <img src="../img/top.png" width="30px" alt="" />
        </div>
      </a>
    </div>



    <div class="container-wisata">
      <div class="flex-wisata">
        <img src="../img/bukitholbung.jpg" alt="" />
        <div class="flex-kalimat-ampat">
          <h3>BUKIT HOLBUNG</h3>
          <p>
            Bukit Holbung adalah salah satu destinasi wisata alam yang terletak di Kabupaten Samosir, Sumatera Utara. Bukit ini dikenal karena pemandangannya yang memukau, dengan latar belakang Danau Toba yang luas dan indah. Bukit Holbung menjadi favorit para wisatawan yang mencari tempat untuk menikmati keindahan alam dan berfoto dengan latar belakang yang menakjubkan. Dari puncak bukit, pengunjung dapat melihat panorama Danau Toba yang dikelilingi oleh pegunungan hijau, menciptakan pemandangan yang sangat mempesona.

            <br /><br />
            Untuk mencapai puncak Bukit Holbung, pengunjung harus berjalan melalui jalur yang sedikit menanjak namun tidak terlalu sulit. Perjalanan menuju puncak bukit menawarkan pengalaman petualangan yang menyenangkan, dengan udara segar dan pemandangan hijau yang menenangkan sepanjang jalan. Saat berada di puncak, Anda akan disuguhi pemandangan 360 derajat yang mengagumkan, memanjakan mata dengan keindahan alam yang belum terjamah.Keistimewaan Bukit Holbung adalah padang rumput luas yang tertata rapi di sekelilingnya, yang memberikan kesan seperti berada di negeri dongeng. Pada saat matahari terbenam, cahaya emas yang memancar ke seluruh permukaan danau menciptakan suasana yang sangat magis.
          </p>
        </div>
      </div>

      <p style="font-family: 'opensans'">
        Bagi para penggemar fotografi, Bukit Holbung adalah surga. Setiap sudut bukit menawarkan kesempatan untuk mengambil foto yang menakjubkan, baik itu saat matahari terbit, terbenam, atau hanya sekedar menikmati keindahan alam sekitar. Banyak wisatawan yang datang ke bukit ini tidak hanya untuk menikmati pemandangan, tetapi juga untuk berburu momen indah yang dapat diabadikan dalam gambar.
        <br />
        <br />

        Meskipun Bukit Holbung semakin populer di kalangan wisatawan, tempat ini tetap terasa alami dan tenang. Udara yang segar dan suasana yang damai membuat Bukit Holbung menjadi pilihan ideal bagi mereka yang ingin beristirahat dari hiruk-pikuk kehidupan kota. Dengan pemandangan yang menawan dan akses yang relatif mudah, Bukit Holbung layak menjadi destinasi wisata alam yang tak boleh dilewatkan ketika berada di kawasan Danau Toba.
        <br /><br />

        Pada saat matahari terbenam, cahaya emas yang memancar ke seluruh permukaan danau menciptakan suasana yang sangat magis. Bukit Holbung juga menjadi tempat yang sempurna untuk menikmati keindahan sunrise, di mana langit yang berwarna-warni memberikan pengalaman visual yang tak terlupakan.
        <br /><br />
      </p>

      <div class="daftar-pustaka">
        <p style="font-family: 'opensans'">
          <span style="color: rgb(232, 239, 15); font-weight: bold">REFERENSI </span> <br />
          <br />
          Aldira. (2022, Juni 25). Pesona Danau Toba dari Bukit Holbung. Lemon8
          <a style="color: #347e9a"
            href="https://www.lemon8-app.com/aldira/7112998082899411457?region=id"
            >,
            https://www.lemon8-app.com/aldira/7112998082899411457?region=id</a
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
    </footer> --}}
    <!-- FOOTER -->
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
