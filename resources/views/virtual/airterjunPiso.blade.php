@extends('layouts.general')

@section('title', 'Air Terjun Sipiso-piso')

@section('body-class', 'font-title bg-bg-dark text-white')

@section('content')
    <header id="top" class="relative h-[70vh] md:h-[85vh] flex items-center justify-center">
        <div class="absolute inset-0 bg-center bg-cover" style="background-image: url('{{ asset('img/airterjunpiso.jpg') }}')"></div>
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative z-10 max-w-[1000px] px-6 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold">Air Terjun Sipiso-piso</h1>
            <p class="mt-4 text-white/90 text-base sm:text-lg md:text-xl">Salah satu air terjun tertinggi di Indonesia dengan panorama Danau Toba yang megah.</p>
            <a href="#detail-section" class="inline-block mt-6 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">Lihat Detail</a>
        </div>
    </header>

    <main id="main-content" class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 py-16">
        <div class="rounded-2xl overflow-hidden shadow-xl bg-white/5">
            <iframe class="w-full h-[360px] sm:h-[440px] md:h-[560px]" src="https://www.google.com/maps/embed?pb=!4v1752982707931!6m8!1m7!1sCAoSFkNJSE0wb2dLRUlDQWdJQ2tsSUtIYnc.!2m2!1d2.916029829981075!2d98.52060658329124!3f300!4f10!5f0.7820865974627469" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

        <section id="detail-section" class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            <img src="{{ asset('img/airterjunpiso.jpg') }}" alt="Air Terjun Sipiso-piso" class="w-full rounded-2xl shadow-lg object-cover" />
            <div>
                <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold">Air Terjun Sipiso-piso</h3>
                <p class="mt-4 text-white/80 font-sans">Air Terjun Sipiso-piso, terletak di Desa Tongging, Kecamatan Merek, Kabupaten Karo, Sumatera Utara, merupakan salah satu air terjun tertinggi di Indonesia dengan ketinggian mencapai 120 meter. Nama "Sipiso-piso" dalam bahasa Batak berarti "seperti pisau", menggambarkan bentuk air terjun yang sempit dan tajam, mirip dengan bilah pisau. Air terjun ini terbentuk dari aliran Sungai Pajanabolon yang mengalir melalui gua di sisi kawah Danau Toba, menciptakan pemandangan alam yang memukau.</p>
            </div>
        </section>

        <p class="mt-8 text-white/80 font-sans leading-7">Untuk mencapai lokasi ini, pengunjung dapat menempuh perjalanan sekitar 70 km dari Medan ke Kota Kabanjahe, kemudian melanjutkan perjalanan sekitar 30 menit menuju Desa Tongging. Jalan menuju Air Terjun Sipiso-piso sudah diaspal dengan baik, memudahkan akses bagi wisatawan. Setibanya di lokasi, pengunjung dapat menikmati pemandangan dari gardu pandang yang menawarkan panorama indah Danau Toba dan sekitarnya. Bagi yang ingin merasakan sensasi lebih dekat dengan alam, tersedia jalur tangga yang menurun menuju dasar air terjun. Perjalanan ini cukup menantang, dengan sekitar 651 anak tangga yang harus dilalui. Namun, usaha tersebut akan terbayar dengan pemandangan spektakuler dari dekat air terjun, serta cipratan air yang menyegarkan.</p>
        <p class="mt-6 text-white/80 font-sans leading-7">Di sekitar lokasi, tersedia berbagai fasilitas untuk kenyamanan pengunjung, seperti area parkir yang luas, warung makan, toko suvenir, dan fasilitas umum lainnya. Harga tiket masuk ke Air Terjun Sipiso-piso cukup terjangkau, menjadikannya destinasi wisata yang ramah di kantong. Pengunjung juga dapat menikmati kuliner khas Batak di warung-warung sekitar, menambah pengalaman wisata yang menyenangkan. Air Terjun Sipiso-piso bukan hanya menawarkan keindahan alam, tetapi juga pengalaman petualangan yang memuaskan.</p>

        <div class="mt-10 bg-white/5 rounded-2xl p-6">
            <span class="text-red-400 font-semibold">Referensi</span>
            <p class="mt-2 text-white/80 font-sans">
                Antautamaofficial. (2017, December 2). Air Terjun Sipiso-piso. Antautama Official. Retrieved from
                <a class="text-red-400 underline" href="https://antautamaofficial.wordpress.com/2017/12/02/air-terjun-sipiso-piso/" target="_blank" rel="noopener">tautan ini</a>.
            </p>
        </div>

        <nav class="mt-12 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('virtual.index') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition-colors">
                <span>←</span><span>Kembali ke Virtual Tour</span>
            </a>
            <div class="flex items-center gap-3">
                <a href="{{ route('virtual.bukit-holbung') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">← Prev: Bukit Holbung</a>
                <a href="{{ route('virtual.danau-toba') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Next: Danau Toba →</a>
            </div>
        </nav>
    </main>

    <a href="#top" class="fixed bottom-6 right-6 w-12 h-12 rounded-full bg-red-600 hover:bg-red-700 flex items-center justify-center shadow-lg transition-colors" aria-label="Scroll to top">
        <img src="{{ asset('img/top.png') }}" alt="Top" class="w-6 h-6 invert" />
    </a>
@endsection
