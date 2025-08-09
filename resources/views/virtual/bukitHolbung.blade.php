@extends('layouts.general')

@section('title', 'Bukit Holbung')

@section('body-class', 'font-title bg-bg-dark text-white')

@section('content')
    <header id="top" class="relative h-[70vh] md:h-[85vh] flex items-center justify-center">
        <div class="absolute inset-0 bg-center bg-cover" style="background-image: url('{{ asset('img/bukitholbung3.jpg') }}')"></div>
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative z-10 max-w-[1000px] px-6 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold">Bukit Holbung</h1>
            <p class="mt-4 text-white/90 text-base sm:text-lg md:text-xl">Panorama Danau Toba dari perbukitan savana yang memukau.</p>
            <a href="#detail-section" class="inline-block mt-6 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">Lihat Lebih Lanjut</a>
    </div>
</header>

    <section id="detail-section" class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 py-16">
        <div class="rounded-2xl overflow-hidden shadow-xl bg-white/5">
            <iframe class="w-full h-[340px] sm:h-[420px] md:h-[540px]" src="https://www.google.com/maps/embed?pb=!4v1752499280074!6m8!1m7!1sCAoSF0NJSE0wb2dLRUlDQWdJQ0owY3ZLMEFF!2m2!1d2.534517020904797!2d98.70421379637801!3f297.32734438255034!4f0.6947227147914248!5f0.7820865974627469" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            <img src="{{ asset('img/bukitholbung.jpg') }}" alt="Bukit Holbung" class="w-full rounded-2xl shadow-lg object-cover" />
            <div>
                <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold">Bukit Holbung</h3>
                <p class="mt-4 text-white/80 font-sans">Bukit Holbung adalah salah satu destinasi wisata alam yang terletak di Kabupaten Samosir, Sumatera Utara. Bukit ini dikenal karena pemandangannya yang memukau, dengan latar belakang Danau Toba yang luas dan indah. Bukit Holbung menjadi favorit para wisatawan yang mencari tempat untuk menikmati keindahan alam dan berfoto dengan latar belakang yang menakjubkan. Dari puncak bukit, pengunjung dapat melihat panorama Danau Toba yang dikelilingi oleh pegunungan hijau.</p>
                <p class="mt-4 text-white/80 font-sans">Untuk mencapai puncak Bukit Holbung, jalur pendakiannya cukup landai dan ramah bagi pemula. Suasana tenang, angin sepoi, dan padang rumput yang luas menghadirkan pengalaman yang mengesankan, terutama saat matahari terbit atau terbenam.</p>
            </div>
        </div>

        <div class="mt-10 bg-white/5 rounded-2xl p-6">
            <span class="text-red-400 font-semibold">Referensi</span>
            <p class="mt-2 text-white/80 font-sans">Aldira. (2022, Juni 25). Pesona Danau Toba dari Bukit Holbung. Lemon8. <a class="text-red-400 underline" href="https://www.lemon8-app.com/aldira/7112998082899411457?region=id" target="_blank" rel="noopener">tautan</a>.</p>
        </div>

        <nav class="mt-12 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('virtual.index') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition-colors">
                <span>←</span><span>Kembali ke Virtual Tour</span>
            </a>
            <div class="flex items-center gap-3">
                <a href="{{ route('virtual.danau-toba') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Next: Danau Toba →</a>
            </div>
        </nav>
    </section>

    <a href="#top" class="fixed bottom-6 right-6 w-12 h-12 rounded-full bg-red-600 hover:bg-red-700 flex items-center justify-center shadow-lg transition-colors" aria-label="Scroll to top">
        <img src="{{ asset('img/top.png') }}" alt="Top" class="w-6 h-6 invert" />
    </a>
@endsection
