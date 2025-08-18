@extends('layouts.general')

@section('title', 'Aksaranta — Gerbang Aksara Batak Digital')

@section('body-class', 'bg-app text-app')

@section('content')

    <!-- Hero -->
    <section class="relative w-full h-[70vh] min-h-[480px] max-h-[760px] overflow-hidden flex items-center">
        <img src="{{ asset('img/culture/hero-section-bg.svg') }}" alt="Background"
             class="absolute inset-0 w-full h-full object-cover -z-10 dark:opacity-70" />
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <div class="max-w-3xl">
                <h1 class="font-bold text-3xl sm:text-5xl md:text-6xl leading-tight text-white">Aksaranta</h1>
                <p class="mt-3 font-sans text-sm sm:text-base md:text-lg text-white/90">
                    Gerbang digital untuk mempelajari dan merayakan Aksara Batak — transliterasi, budaya, sejarah,
                    tur virtual, musik, dan kamus terkurasi dalam satu tempat.
                </p>
                <div class="mt-6 flex gap-3 flex-wrap">
                    <a href="{{ route('learn.index') }}" class="px-5 py-3 rounded-xl bg-red-500 hover:bg-red-600 transition text-white">Mulai Belajar</a>
                    <a href="{{ route('culture') }}" class="px-5 py-3 rounded-xl bg-white/10 hover:bg-white/20 transition text-white">Jelajahi Budaya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature overview -->
    <section class="flex flex-col gap-8 mt-12">
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <h3 class="text-red-400 text-center my-2 text-sm sm:text-base">Fitur Utama</h3>
            <h2 class="text-center text-2xl sm:text-3xl md:text-4xl">Semua yang Anda butuhkan untuk <span class="text-red-400">Aksara Batak</span></h2>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="{{ route('learn.index') }}" class="bg-white/5 rounded-2xl p-6 hover:bg-white/10 transition block">
                    <h4 class="text-lg font-semibold">Transliterasi & Kursus</h4>
                    <p class="font-sans text-sm dark:text-white/80 mt-1">Latih membaca/menulis dengan modul interaktif dan contoh nyata.</p>
                </a>
                <a href="{{ route('culture') }}" class="bg-white/5 rounded-2xl p-6 hover:bg-white/10 transition block">
                    <h4 class="text-lg font-semibold">Budaya & Marga</h4>
                    <p class="font-sans text-sm dark:text-white/80 mt-1">Pelajari falsafah Dalihan Na Tolu, sistem marga, dan tradisi.</p>
                </a>
                <a href="{{ route('history') }}" class="bg-white/5 rounded-2xl p-6 hover:bg-white/10 transition block">
                    <h4 class="text-lg font-semibold">Sejarah Aksara</h4>
                    <p class="font-sans text-sm dark:text-white/80 mt-1">Garis waktu evolusi Aksara Batak sampai era digital.</p>
                </a>
                <a href="{{ route('virtual.index') }}" class="bg-white/5 rounded-2xl p-6 hover:bg-white/10 transition block">
                    <h4 class="text-lg font-semibold">Virtual Tour</h4>
                    <p class="font-sans text-sm dark:text-white/80 mt-1">Jelajah imersif destinasi ikonik Sumatera Utara.</p>
                </a>
                <a href="{{ route('kamus-aksara') }}" class="bg-white/5 rounded-2xl p-6 hover:bg-white/10 transition block">
                    <h4 class="text-lg font-semibold">Kamus & Aksara</h4>
                    <p class="font-sans text-sm dark:text-white/80 mt-1">Glosarium multi-dialek dan daftar karakter per sub-etnis.</p>
                </a>
                <a href="{{ route('batak-songs') }}" class="bg-white/5 rounded-2xl p-6 hover:bg-white/10 transition block">
                    <h4 class="text-lg font-semibold">Musik Tradisional</h4>
                    <p class="font-sans text-sm dark:text-white/80 mt-1">Koleksi lagu-lagu Batak dan artis pilihan.</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Aksaranta -->
    <section class="flex flex-col gap-8 mt-12">
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">
                <div class="bg-white/5 rounded-3xl p-6 sm:p-10">
                    <h3 class="text-red-400 text-sm">Misi</h3>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide mt-1">Pelestarian melalui teknologi</h2>
                    <p class="font-sans text-sm sm:text-base mt-3">Aksaranta menyatukan pembelajaran, arsip budaya, dan media dalam pengalaman yang modern dan mudah diakses.</p>
                    <ul class="mt-4 space-y-2 text-sm font-sans dark:text-white/80 list-disc list-inside">
                        <li>Materi kurasi, kredibel, dan mudah dipahami</li>
                        <li>Fokus pada keanekaragaman sub-etnis: Toba, Karo, Simalungun, Mandailing, Pakpak</li>
                        <li>Terbuka untuk kontribusi komunitas</li>
                    </ul>
                </div>
                <div class="rounded-3xl p-6 sm:p-10 bg-white/5">
                    <h3 class="text-red-400 text-sm">Arsitektur Produk</h3>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide mt-1">Komponen inti</h2>
                    <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                        <div class="bg-white/5 rounded-xl p-3">Transliterasi</div>
                        <div class="bg-white/5 rounded-xl p-3">Kursus</div>
                        <div class="bg-white/5 rounded-xl p-3">Budaya</div>
                        <div class="bg-white/5 rounded-xl p-3">Sejarah</div>
                        <div class="bg-white/5 rounded-xl p-3">Kamus</div>
                        <div class="bg-white/5 rounded-xl p-3">Musik</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tribute / Inspiration -->
    <section class="flex flex-col gap-8 mt-12">
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <div class="rounded-3xl p-6 sm:p-10 bg-white/5">
                <h3 class="text-red-400 text-center my-2 text-sm sm:text-base">Apresiasi Desain</h3>
                <p class="text-center font-sans text-sm sm:text-base dark:text-white/80 max-w-3xl mx-auto">
                    Tema visual Aksaranta terinspirasi dari pendekatan desain yang elegan dan minimalis. Terima kasih kepada
                    <a href="https://camillemormal.com" target="_blank" rel="noopener noreferrer" class="underline text-red-400">camillemormal.com</a>
                    atas inspirasinya dalam membangun bahasa visual yang rapi, fokus, dan berkarakter.
                </p>
            </div>
        </div>
    </section>

@endsection
