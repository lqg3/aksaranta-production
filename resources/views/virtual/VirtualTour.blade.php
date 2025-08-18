@extends('layouts.general')

@section('title', 'Virtual Tour')

@section('body-class', 'font-title bg-app text-app')

@section('content')

    <section class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 pt-24">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold">Virtual Tour</h1>
        <p class="mt-3 dark:text-white/80 font-sans max-w-3xl">Jelajahi keindahan alam Sumatera Utara melalui pengalaman interaktif, dari Danau Toba yang megah hingga Air Terjun Sipiso-piso yang menakjubkan.</p>
    </section>

    <section id="detail-section" class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 py-16">
        <div class="text-center max-w-3xl mx-auto">
            <h5 class="text-red-400 tracking-wider">Nikmati keindahan alamn Sumatera Utara</h5>
            <h3 class="mt-2 text-2xl sm:text-3xl md:text-4xl font-bold">Virtual Tour Sumatera Utara</h3>
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


@endsection
