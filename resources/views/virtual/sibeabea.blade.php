@extends('layouts.general')

@section('title', 'Sibea-bea')

@section('body-class', 'font-title bg-bg-dark text-white')

@section('content')
    <header id="top" class="relative h-[70vh] md:h-[85vh] flex items-center justify-center">
        <div class="absolute inset-0 bg-center bg-cover" style="background-image: url('{{ asset('img/sibeabea2.jpg') }}')"></div>
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative z-10 max-w-[1000px] px-6 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold font-title">Sibea-bea</h1>
            <p class="mt-4 text-white/90 text-base sm:text-lg md:text-xl">Ikon tangga berliku dengan lanskap Danau Toba.</p>
            <a href="#detail-section" class="inline-block mt-6 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">Lihat Lebih Lanjut</a>
        </div>
    </header>

    <section id="detail-section" class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 py-16">
        <div class="rounded-2xl overflow-hidden shadow-xl bg-white/5">
            <iframe class="w-full h-[340px] sm:h-[420px] md:h-[540px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31877.28699706284!2d98.700000!3d2.450000!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sSibea-bea!5e0!3m2!1sid!2sid!4v1700000000000" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

        <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            <img src="{{ asset('img/sibeabea2.jpg') }}" alt="Sibea-bea" class="w-full rounded-2xl shadow-lg object-cover" />
            <div>
                <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold">Sibea-bea</h3>
                <p class="mt-4 text-white/80 font-sans">Sibea-bea terkenal dengan jalur tangga berliku yang menurun ke arah Danau Toba, memberikan sudut pandang yang indah untuk menikmati lanskap perbukitan dan danau. Lokasi ini menjadi tempat populer untuk berswafoto dan menikmati panorama.</p>
      </div>
        </div>

        <div class="mt-10 bg-white/5 rounded-2xl p-6">
            <span class="text-red-400 font-semibold">Referensi</span>
            <p class="mt-2 text-white/80 font-sans">
                IDN Times. Wisata Bukit Sibea-bea, Samosir, Sumatra Utara.
                <a class="text-red-400 underline" href="https://www.idntimes.com/travel/destination/wisata-bukit-sibea-bea-sumatra-utara-00-819v4-4xpbtd?utm_source" target="_blank" rel="noopener">tautan</a>.
            </p>
        </div>

        <nav class="mt-12 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('virtual.index') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition-colors">
                <span>←</span><span>Kembali ke Virtual Tour</span>
            </a>
            <div class="flex items-center gap-3">
                <a href="{{ route('virtual.funland') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">← Prev: Mikie Funland</a>
                <a href="{{ route('virtual.taman-alam-lubini') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Next: Taman Alam Lumbini →</a>
        </div>
        </nav>
    </section>

    <a href="#top" class="fixed bottom-6 right-6 w-12 h-12 rounded-full bg-red-600 hover:bg-red-700 flex items-center justify-center shadow-lg transition-colors" aria-label="Scroll to top">
        <img src="{{ asset('img/top.png') }}" alt="Top" class="w-6 h-6 invert" />
    </a>
@endsection
