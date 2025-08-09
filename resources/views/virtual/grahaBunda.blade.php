@extends('layouts.general')

@section('title', 'Graha Bunda Maria Annai Velangkanni')

@section('body-class', 'font-title bg-bg-dark text-white')

@section('content')
    <header id="top" class="relative h-[70vh] md:h-[85vh] flex items-center justify-center">
        <div class="absolute inset-0 bg-center bg-cover" style="background-image: url('{{ asset('img/gereja.jpg') }}')"></div>
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative z-10 max-w-[1000px] px-6 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold">Graha Bunda Maria Annai Velangkanni</h1>
            <p class="mt-4 text-white/90 text-base sm:text-lg md:text-xl">Gereja Katolik berarsitektur unik di Medan Tuntungan.</p>
            <a href="#detail-section" class="inline-block mt-6 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">Lihat Lebih Lanjut</a>
        </div>
    </header>

    <section id="detail-section" class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 py-16">
        <div class="rounded-2xl overflow-hidden shadow-xl bg-white/5">
            <iframe class="w-full h-[340px] sm:h-[420px] md:h-[540px]" src="https://www.google.com/maps/embed?pb=!4v1752651696589!6m8!1m7!1sCAoSF0NJSE0wb2dLRUlDQWdJQ2t6UHl1LUFF!2m2!1d3.547739571126882!2d98.6087281085821!3f24.169970427569623!4f22.46328910870656!5f0.7820865974627469" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            <img src="{{ asset('img/gereja.jpg') }}" alt="Graha Bunda Maria Annai Velangkanni" class="w-full rounded-2xl shadow-lg object-cover" />
            <div>
                <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold">Graha Bunda Maria Annai Velangkanni</h3>
                <p class="mt-4 text-white/80 font-sans">Terletak di Jalan Sakura III No. 7-10, Tanjung Selamat, gereja ini dibangun pada 2005 dan didedikasikan untuk Bunda Maria sebagai Annai Velangkanni (Our Lady of Good Health). Arsitekturnya memadukan gaya Indo-Mughal dan unsur lokal, menyerupai kuil dengan menara tinggi dan ornamen kaya. Tujuh tingkat bangunan melambangkan tujuh sakramen.</p>
            </div>
        </div>

        <div class="mt-10 bg-white/5 rounded-2xl p-6">
            <span class="text-red-400 font-semibold">Referensi</span>
            <p class="mt-2 text-white/80 font-sans">Wisata.app. (2023, September 20). Wisata religi Graha Maria Annai Velangkanni. <a class="text-red-400 underline" href="https://wisata.app/diary/259371?utm_source" target="_blank" rel="noopener">tautan</a>.</p>
        </div>

        <nav class="mt-12 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('virtual.index') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition-colors">
                <span>←</span><span>Kembali ke Virtual Tour</span>
            </a>
            <div class="flex items-center gap-3">
                <a href="{{ route('virtual.arrasyid') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">← Prev: Arrasyiid</a>
                <a href="{{ route('virtual.funland') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Next: Mikie Funland →</a>
            </div>
        </nav>
    </section>

    <a href="#top" class="fixed bottom-6 right-6 w-12 h-12 rounded-full bg-red-600 hover:bg-red-700 flex items-center justify-center shadow-lg transition-colors" aria-label="Scroll to top">
        <img src="{{ asset('img/top.png') }}" alt="Top" class="w-6 h-6 invert" />
    </a>
@endsection
