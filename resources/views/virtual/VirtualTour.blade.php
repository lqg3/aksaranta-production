@extends('layouts.general')

@section('title', 'Virtual Tour')

@section('body-class', 'font-title bg-bg-dark text-white')

@section('content')

    <header id="top" class="relative h-[80vh] md:h-[90vh] flex items-center justify-center">
        <div class="absolute inset-0 bg-center bg-cover" style="background-image: url('{{ asset('img/danautoba2.jpg') }}')"></div>
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative z-10 max-w-[1000px] px-6 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold">Virtual Tour</h1>
            <p class="mt-4 text-white/90 text-base sm:text-lg md:text-xl">
                Jelajahi keindahan alam Sumatera Utara melalui pengalaman interaktif, dari Danau Toba yang megah hingga Air Terjun Sipiso-piso yang menakjubkan.
            </p>
            <a href="#detail-section" class="inline-block mt-6 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">Lihat Lebih Lanjut</a>
    </div>
    </header>

    <section id="detail-section" class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 py-16">
        <div class="text-center max-w-3xl mx-auto">
            <h5 class="text-red-400 tracking-wider">Deskripsi Selengkapnya</h5>
            <h3 class="mt-2 text-2xl sm:text-3xl md:text-4xl font-bold">Nikmati virtual tour di setiap detiknya</h3>
            <p class="mt-4 text-white/80 font-sans">
                Jelajahi destinasi terbaik di Sumatera Utara dengan tampilan 360° dan peta interaktif untuk menginspirasi destinasi pilihan Anda berikutnya.
            </p>
        </div>

        <div class="mt-10 rounded-2xl overflow-hidden shadow-xl bg-white/5">
            <iframe class="w-full h-[380px] sm:h-[450px] md:h-[560px]" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1019974.485808343!2d98.41522052909876!3d3.020530465828571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1swisata%20sumatra%20utara!5e0!3m2!1sen!2sid!4v1752649389494!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <a href="{{ route('virtual.bukit-holbung') }}" class="group bg-white/5 hover:bg-white/10 rounded-2xl overflow-hidden transition-colors">
                <img src="{{ asset('img/bukitholbung.jpg') }}" alt="Bukit Holbung" class="w-full h-40 object-cover" />
                <div class="p-4 text-center">
                    <p class="text-red-400 text-xs tracking-wider">SUMATERA UTARA</p>
                    <h3 class="mt-1 text-lg font-semibold">Bukit Holbung</h3>
          </div>
            </a>
            <a href="{{ route('virtual.air-terjun-piso') }}" class="group bg-white/5 hover:bg-white/10 rounded-2xl overflow-hidden transition-colors">
                <img src="{{ asset('img/airterjunpiso.jpg') }}" alt="Air Terjun Sipiso-piso" class="w-full h-40 object-cover" />
                <div class="p-4 text-center">
                    <p class="text-red-400 text-xs tracking-wider">SUMATERA UTARA</p>
                    <h3 class="mt-1 text-lg font-semibold">Air Terjun Sipiso-piso</h3>
        </div>
            </a>
            <a href="{{ route('virtual.danau-toba') }}" class="group bg-white/5 hover:bg-white/10 rounded-2xl overflow-hidden transition-colors">
                <img src="{{ asset('img/danautoba2.jpg') }}" alt="Danau Toba" class="w-full h-40 object-cover" />
                <div class="p-4 text-center">
                    <p class="text-red-400 text-xs tracking-wider">SUMATERA UTARA</p>
                    <h3 class="mt-1 text-lg font-semibold">Danau Toba</h3>
      </div>
            </a>
            <a href="{{ route('virtual.sibeabea') }}" class="group bg-white/5 hover:bg-white/10 rounded-2xl overflow-hidden transition-colors">
                <img src="{{ asset('img/sibeabea2.jpg') }}" alt="Sibea-bea" class="w-full h-40 object-cover" />
                <div class="p-4 text-center">
                    <p class="text-red-400 text-xs tracking-wider">SUMATERA UTARA</p>
                    <h3 class="mt-1 text-lg font-semibold">Sibea-bea</h3>
        </div>
            </a>
            <a href="{{ route('virtual.taman-alam-lubini') }}" class="group bg-white/5 hover:bg-white/10 rounded-2xl overflow-hidden transition-colors">
                <img src="{{ asset('img/tamanalamlubini.jpg') }}" alt="Taman Alam Lumbini" class="w-full h-40 object-cover" />
                <div class="p-4 text-center">
                    <p class="text-red-400 text-xs tracking-wider">SUMATERA UTARA</p>
                    <h3 class="mt-1 text-lg font-semibold">Taman Alam Lumbini</h3>
          </div>
            </a>
            <a href="{{ route('virtual.arrasyid') }}" class="group bg-white/5 hover:bg-white/10 rounded-2xl overflow-hidden transition-colors">
                <img src="{{ asset('img/alam.png') }}" alt="Arrasyiid Cookies Cake Snack" class="w-full h-40 object-cover" />
                <div class="p-4 text-center">
                    <p class="text-red-400 text-xs tracking-wider">SUMATERA UTARA</p>
                    <h3 class="mt-1 text-lg font-semibold">Arrasyiid Cookies Cake Snack</h3>
        </div>
            </a>
            <a href="{{ route('virtual.graha-bunda') }}" class="group bg-white/5 hover:bg-white/10 rounded-2xl overflow-hidden transition-colors">
                <img src="{{ asset('img/gereja.jpg') }}" alt="Graha Bunda Maria Annai Velangkanni" class="w-full h-40 object-cover" />
                <div class="p-4 text-center">
                    <p class="text-red-400 text-xs tracking-wider">SUMATERA UTARA</p>
                    <h3 class="mt-1 text-lg font-semibold">Graha Bunda Maria Annai Velangkanni</h3>
      </div>
            </a>
            <a href="{{ route('virtual.funland') }}" class="group bg-white/5 hover:bg-white/10 rounded-2xl overflow-hidden transition-colors">
                <img src="{{ asset('img/fundlan.jpeg') }}" alt="Mikie Funland" class="w-full h-40 object-cover" />
                <div class="p-4 text-center">
                    <p class="text-red-400 text-xs tracking-wider">SUMATERA UTARA</p>
                    <h3 class="mt-1 text-lg font-semibold">Mikie Funland</h3>
        </div>
            </a>
        </div>
    </section>

    <a href="#top" class="fixed bottom-6 right-6 w-12 h-12 rounded-full bg-red-600 hover:bg-red-700 flex items-center justify-center shadow-lg transition-colors" aria-label="Scroll to top">
        <img src="{{ asset('img/top.png') }}" alt="Top" class="w-6 h-6 invert" />
    </a>

    <nav class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 pb-16">
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('virtual.bukit-holbung') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Bukit Holbung</a>
            <a href="{{ route('virtual.air-terjun-piso') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Air Terjun Sipiso-piso</a>
            <a href="{{ route('virtual.danau-toba') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Danau Toba</a>
            <a href="{{ route('virtual.sibeabea') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Sibea-bea</a>
            <a href="{{ route('virtual.taman-alam-lubini') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Taman Alam Lumbini</a>
            <a href="{{ route('virtual.arrasyid') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Arrasyiid</a>
            <a href="{{ route('virtual.graha-bunda') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Graha Bunda</a>
            <a href="{{ route('virtual.funland') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Mikie Funland</a>
        </div>
    </nav>

@endsection
