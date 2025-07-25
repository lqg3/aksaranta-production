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
        /*padding: 0;*/
      }
      @font-face {
        src: url(font/Jua-Regular.ttf);
        font-family: "jua";
      }
      @font-face {
        src: url(font/OpenSansRegular.ttf);
        font-family: "opensans";
      }
      body{
        background-color: #333;
      }

      h3{
        color: rgb(255, 255, 255);
      }



      .pembatas {
        height: 100px;
      }

      /* END HEADER */

      .kalimat-virtual-tour {
        width: 80%;
        margin: 10px auto;
        text-align: center;
      }
      .kalimat-virtual-tour h5 {
        font-size: 18px;
        color: #e0e252;
        font-family: "jua";
      }
      .kalimat-virtual-tour h3 {
        font-size: 45px;
        /*margin: -25px 0 0 0;*/
        font-family: "jua";
        color: rgb(255, 255, 255);
      }
      .kalimat-virtual-tour p {
        font-size: 23px;
        font-family: "opensans";
        color: rgb(255, 255, 255);
      }
      @media (max-width: 800px) {
        .kalimat-virtual-tour h3 {
          font-size: 30px;
          margin: -15px 0 0 0;
        }
        .kalimat-virtual-tour p {
          font-size: 14px;
        }
      }
      .box-peta {
        width: 80%;
        height: 95%;
        margin: 50px auto;
        /* box-shadow: 0.1px 0.1px 50px #d1d1d1; */
        border-radius: 20px;
      }
      .box-peta iframe {
        width: 100%;
        border-radius: 10px;
      }

      .container-virtual-tour {
        width: 80%;
        margin: 200px auto;
        /* border: 1px solid black; */
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
      }
      .box-tour {
        margin: 30px 0 0 5px;
        width: 20%;
        /* border: 1px solid black; */
        /* box-shadow: 0.1px 0.1px 50px #d1d1d1; */
        border-radius: 10px;
        transition: 0.8s;
      }
      .box-tour:hover {
        background-color: #5a5151;
      }
      .box-tour img {
        width: 100%;
        border-radius: 10px;
        height: 150px;
      }
      .kalimat-tour {
        padding: 20px;
        box-sizing: border-box;
        text-align: center;
      }
      .kalimat-tour p {
        margin: 0 0 10px 0;
        font-size: 15px;
        color: #cded3d;
        font-weight: bold;
        font-family: "jua";
      }
      .kalimat-tour h3 {
        font-size: 23px;
        font-family: "opensans";
      }

      /* FOOTER */
      footer {
        width: 100%;
        background-color: #2b2c16;
        display: flex;
        justify-content: space-around;
        padding: 15px;
        box-sizing: border-box;
      }
      .footer-kiri {
        margin: 30px 0 30px 0;
        width: 40%;
        /*border: 1px solid black;*/
      }
      .footer-kiri p {
        font-size: 16px;
        color: #fff;
      }
      .footer-kiri .foo {
        font-size: 21px;
        color: #fff;
        font-weight: bold;
        margin: 0 0 15px 0;
      }
      .footer-kanan {
        margin: 30px 0 30px 0;
        /*border: 1px solid black;*/
        width: 40%;
        display: flex;
        justify-content: space-around;
      }
      .satu-footer h5 {
        font-size: 21px;
        color: #fff;
        font-weight: bold;
      }
      .satu-footer p {
        font-size: 16px;
        color: #fff;
        margin: 15px 0 0 0;
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
        .box-tour {
          width: 100%;
        }
      }
      /* END FOOTER */

      /* NAIK */
      .up {
        width: 100%;
        /* border: 1px solid black; */
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
        /* box-shadow: 0.1px 0.1px 50px #d1d1d1; */
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
      /* END NAIK */

      .box-peta1{
        background-image: url('../img/airterjunpiso.jpg'); /* Gambar latar belakang */
    width: 100%;
    height: 600px;
    background-size: 100% 100%;
    display: flex;
    flex-direction: column; /* Mengatur agar elemen anak ditata secara vertikal */
    justify-content: flex-end; /* Mengatur agar konten berada di bagian bawah */
    color: white;
      }
      .box-peta1 .content {
            /* text-align: center; */
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5); /* Latar belakang semi-transparan */
            border-radius: 15px;
        }

        .box-peta1 .content h1{
            font-size: 50px;
            margin: 0 0 10px 30px;
        }

        .box-peta1 .content p{
            /* font-size: 50px; */
            margin: 0 0 0 30px;
        }
    </style>
    </style>
  </head>
  <body>


    <div class="box-peta1">
        {{-- <img src="img/wisata.jpg" alt="" height="450" width="100%"/> --}}
        <div class="content">
            <h1>Virtual Tour</h1>
            <p>360-Degree View Control: Users can rotate the view to explore all angles of <br> a space or scene, providing a more realistic experience.</p>
        </div>
    </div>

    <div class="pembatas"></div>
    <div class="up">
      <a href=""
        ><div class="klik-up">
          <img src="img/top.png" width="30px" alt="" />
        </div>
      </a>
    </div>

    <div class="kalimat-virtual-tour">
      <h5>DESKRIPSI SELENGKAPNYA</h5>
      <br />
      <h3>Nikmati virtual tour disetiap detiknya</h3>
      <br />
      <p>
        Gambar Di Bawah Ini Merupakan Virtual Tour Untuk Megetahui Keindahan
        Tempat Hiburan Secara Lansung Serta Mengispirasi Agar Semua Orang Bisa
        Memilih Destinasi Hiburan Selanjutnya
      </p>
    </div>

    <div class="box-peta">
      <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1019974.485808343!2d98.41522052909876!3d3.020530465828571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1swisata%20sumatra%20utara!5e0!3m2!1sen!2sid!4v1752649389494!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="container-virtual-tour">
      <div class="box-tour">
        <div class="img-tour">
          <a href="{{ url('/virtual/bukitHolbung') }}"><img src="../img/bukitholbung.jpg" alt="" /></a>
        </div>

        <div class="kalimat-tour">
          <div class="flex-tour">
            <p>SUMATRA UTARA</p>
          </div>
          <h3>Bukit Holbung</h3>
        </div>
      </div>

      <div class="box-tour">
        <div class="img-tour">
          <a href="{{ url('/virtual/airterjunPiso') }}"><img src="../img/airterjunpiso.jpg" alt="" /></a>
        </div>

        <div class="kalimat-tour">
          <div class="flex-tour">
            <p>SUMATRA UTARA</p>
          </div>
          <h3>Air terjun Piso</h3>
        </div>
      </div>

      <div class="box-tour">
        <div class="img-tour">
          <a href="{{ url('/virtual/danautoba') }}"><img src="../img/danautoba2.jpg" alt="" height="100%" /></a>
        </div>

        <div class="kalimat-tour">
          <div class="flex-tour">
            <p>SUMATRA UTARA</p>
          </div>
          <h3>Danau toba</h3>
        </div>
      </div>

      <div class="box-tour">
        <div class="img-tour">
          <a href="{{ url('/virtual/sibeabea') }}"><img src="../img/sibeabea2.jpg" alt="" /></a>
        </div>

        <div class="kalimat-tour">
          <div class="flex-tour">
            <p>SUMATRA UTARA</p>
          </div>
          <h3>Sibea-bea</h3>
        </div>
      </div>

      <div class="box-tour">
        <div class="img-tour">
          <a href="{{ url('/virtual/tamanAlamLubini') }}"><img src="../img/tamanalamlubini.jpg" alt="" /></a>
        </div>

        <div class="kalimat-tour">
          <div class="flex-tour">
            <p>SUMATRA UTARA</p>
          </div>
          <h3>Taman alam lubini</h3>
        </div>
      </div>

      <div class="box-tour">
        <div class="img-tour">
          <a href="{{ url('/virtual/arrasyid') }}"><img src="../img/alam.png" alt="" /></a>
        </div>

        <div class="kalimat-tour">
          <div class="flex-tour">
            <p>SUMATRA UTARA</p>
          </div>
          <h3>Arrasyiid cookies cake snack</h3>
        </div>
      </div>

      <div class="box-tour">
        <div class="img-tour">
          <a href="{{ url('/virtual/grahaBunda') }}"><img src="../img/gereja.jpg" alt="" /></a>
        </div>

        <div class="kalimat-tour">
          <div class="flex-tour">
            <p>SUMATRA UTARA</p>
          </div>
          <h3>Graha bunda maria annai velangkanni</h3>
        </div>
      </div>

      <div class="box-tour">
        <div class="img-tour">
          <a href="{{ url('/virtual/funland') }}"><img src="../img/fundlan.jpeg" alt="" /></a>
        </div>

        <div class="kalimat-tour">
          <div class="flex-tour">
            <p>SUMATRA UTARA</p>
          </div>
          <h3>Mikie Funland</h3>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <footer>
      <div class="footer-kiri">
        <p class="foo">
          <i class="fa-sharp fa-solid fa-satellite" style="color: #fff"></i>
          Geulify
        </p>
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
    <!-- FOOTER -->
  </body>
</html>
