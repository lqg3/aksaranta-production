@extends('layouts.general')

@section('title', 'Arrasyiid Cookies Cake Snack')

@section('body-class', 'font-title bg-bg-dark text-white')

@section('content')
    <section class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 pt-24">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold">Arrasyiid Cookies Cake Snack</h1>
        <p class="mt-3 text-white/80 font-sans max-w-3xl">Destinasi santai di Berastagi untuk menikmati camilan khas dengan udara pegunungan yang sejuk.</p>
    </section>

    <section id="detail-section" class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 py-16">
        <div class="rounded-2xl overflow-hidden shadow-xl bg-white/5">
            <iframe class="w-full h-[340px] sm:h-[420px] md:h-[540px]" src="https://www.google.com/maps/embed?pb=!4v1752650955374!6m8!1m7!1sCAoSFkNJSE0wb2dLRUlDQWdJQzQ5XzZFU2c.!2m2!1d3.188207978484253!2d98.50930995824886!3f215.46530537032132!4f-8.65823738843359!5f0.7820865974627469" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            <img src="{{ asset('img/alam.png') }}" alt="Arrasyiid" class="w-full rounded-2xl shadow-lg object-cover" />
            <div>
                <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold">Arrasyiid Cookies Cake Snack</h3>
                <p class="mt-4 text-white/80 font-sans">Arrasyiid Cookies Cake Snack merupakan salah satu destinasi wisata yang terletak di kawasan Berastagi, Kabupaten Karo, Sumatera Utara. Tempat ini dikenal dengan suasana yang nyaman dan tenang, cocok untuk Anda yang ingin menikmati pemandangan alam yang indah sambil menikmati camilan khas. Berlokasi di Gundaling I, tempat ini tidak hanya menawarkan berbagai jenis cookies dan cake, tetapi juga pengalaman unik untuk para wisatawan yang berkunjung ke kawasan dataran tinggi ini.</p>
                <p class="mt-4 text-white/80 font-sans">Meskipun lebih dikenal dengan sebutan "cookies cake snack", Arrasyiid juga memiliki daya tarik tersendiri karena konsep tempat yang nyaman untuk bersantai. Pengunjung bisa menikmati camilan sambil duduk menikmati udara segar Berastagi, dikelilingi oleh pemandangan pegunungan yang menawan. Tempat ini menjadi pilihan sempurna untuk berhenti sejenak setelah berkeliling Berastagi atau menikmati perjalanan menuju daerah ini.</p>
        </div>
    </div>

        <p class="mt-8 text-white/80 font-sans leading-7">Tempat wisata ini buka setiap hari mulai pukul 08:00 hingga 16:00. Dengan jam operasional yang cukup fleksibel, pengunjung dapat mampir kapan saja untuk menikmati camilan sambil menghabiskan waktu berkualitas. Arrasyiid Cookies Cake Snack menjadi tempat yang pas untuk mencicipi makanan ringan khas daerah sambil berbincang dengan teman atau keluarga. Tidak hanya itu, tempat ini juga cocok untuk mencari oleh-oleh khas Berastagi bagi mereka yang ingin membawa pulang makanan ringan unik dari daerah ini.</p>
        <p class="mt-6 text-white/80 font-sans leading-7">Alamat dari Arrasyiid Cookies Cake Snack adalah di Gundaling I, Kecamatan Berastagi, Kabupaten Karo, Sumatera Utara (22153). Lokasi strategis dan keindahan alam sekitar menambah nilai kunjungan.</p>

        <div class="mt-10 bg-white/5 rounded-2xl p-6">
            <span class="text-red-400 font-semibold">Referensi</span>
            <p class="mt-2 text-white/80 font-sans">
                Trip.com. Arrasyiid cookies cake snack. <a class="text-red-400 underline" href="https://id.trip.com/travel-guide/attraction/karo/arrasyiid-cookies-cake-snack-142480595/" target="_blank" rel="noopener">tautan</a>.
          </p>
      </div>

        <nav class="mt-12 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('virtual.index') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition-colors">
                <span>←</span><span>Kembali ke Virtual Tour</span>
            </a>
            <div class="flex items-center gap-3">
                <a href="{{ route('virtual.taman-alam-lubini') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">← Prev: Taman Alam Lumbini</a>
                <a href="{{ route('virtual.graha-bunda') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Next: Graha Bunda →</a>
      </div>
        </nav>
    </section>

    <a href="#top" class="fixed bottom-6 right-6 w-12 h-12 rounded-full bg-red-600 hover:bg-red-700 flex items-center justify-center shadow-lg transition-colors" aria-label="Scroll to top">
        <img src="{{ asset('img/top.png') }}" alt="Top" class="w-6 h-6 invert" />
    </a>

    <nav class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 pb-8">
    <h2 class="text-2xl text-bold text-white"> Virtual Tour Lainnya </h2>
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('virtual.bukit-holbung') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Bukit Holbung</a>
            <a href="{{ route('virtual.air-terjun-piso') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Air Terjun Sipiso-piso</a>
            <a href="{{ route('virtual.danau-toba') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Danau Toba</a>
            <a href="{{ route('virtual.sibeabea') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Sibea-bea</a>
            <a href="{{ route('virtual.taman-alam-lubini') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Taman Alam Lumbini</a>
            <a href="{{ route('virtual.arrasyid') }}" class="bg-white/20 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Arrasyiid</a>
            <a href="{{ route('virtual.graha-bunda') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Graha Bunda</a>
            <a href="{{ route('virtual.funland') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Mikie Funland</a>
        </div>
    </nav>
@endsection
