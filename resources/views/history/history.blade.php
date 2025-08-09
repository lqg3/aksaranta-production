@extends('layouts.general')

@section('title', 'Sejarah Aksara Batak')

@section('body-class', 'font-title bg-bg-dark text-white')

@section('content')

    <!-- Hero / Intro -->
    <section class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 my-20 lg:my-28 flex flex-col gap-6">
        <div class="flex flex-col gap-3">
            <h2 class="text-red-400">Sejarah</h2>
            <h3 class="font-bold text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wider">
                Jejak <span class="text-red-400">Aksara Batak</span>
            </h3>
            <p class="font-sans text-sm sm:text-base md:text-lg max-w-3xl">
                Aksara Batak adalah sistem penulisan Nusantara yang kaya, merekam pengetahuan setempat hingga spiritualitas.
                Berikut rangkaian momen penting dalam perjalanannya.
            </p>
        </div>
    </section>

    <!-- Timeline -->
    <section class="flex flex-col gap-8">
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <div class="bg-white/5 rounded-3xl p-6 sm:p-10">
                <h3 class="text-red-400 text-center my-2 text-sm sm:text-base">Garis Waktu</h3>
                <h2 class="text-center text-2xl sm:text-3xl md:text-4xl">Perkembangan <span class="text-red-400">Aksara Batak</span></h2>
                <p class="font-sans text-center mx-auto max-w-3xl text-sm sm:text-base mt-4">
                    Dari kemunculan awal, masa <em>Pustaha Laklak</em>, pengaruh misionaris, hingga revitalisasi digital.
                </p>
    </div>

            <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white/5 rounded-3xl p-6 sm:p-8">
                    <div class="relative pl-6 border-l border-white/10">
                        <div class="mb-6">
                            <span class="absolute -left-2 top-0 w-4 h-4 rounded-full bg-red-500"></span>
                            <p class="text-sm text-white/70">Abad 14</p>
                            <p class="font-sans text-sm sm:text-base">Kemunculan awal; pengaruh aksara Pallawa dan Kawi melalui adaptasi lokal.</p>
                        </div>
                        <div class="mb-6">
                            <span class="absolute -left-2 w-4 h-4 rounded-full bg-red-500"></span>
                            <p class="text-sm text-white/70">Abad 16–19</p>
                            <p class="font-sans text-sm sm:text-base">Era <em>Pustaha Laklak</em>: manuskrip kulit kayu berisi ritual, pengobatan, ramalan, silsilah.</p>
                        </div>
                        <div class="mb-6">
                            <span class="absolute -left-2 w-4 h-4 rounded-full bg-red-500"></span>
                            <p class="text-sm text-white/70">1800-an</p>
                            <p class="font-sans text-sm sm:text-base">Interaksi misionaris Eropa; dokumentasi kamus dan tata bahasa awal.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white/5 rounded-3xl p-6 sm:p-8">
                    <div class="relative pl-6 border-l border-white/10">
                        <div class="mb-6">
                            <span class="absolute -left-2 top-0 w-4 h-4 rounded-full bg-red-500"></span>
                            <p class="text-sm text-white/70">Awal 1900-an</p>
                            <p class="font-sans text-sm sm:text-base">Pergeseran ke huruf Latin seiring pendidikan modern dan literasi.</p>
                        </div>
                        <div class="mb-6">
                            <span class="absolute -left-2 w-4 h-4 rounded-full bg-red-500"></span>
                            <p class="text-sm text-white/70">Pertengahan 1900-an</p>
                            <p class="font-sans text-sm sm:text-base">Penggunaan Aksara Batak menyempit pada ranah adat dan komunitas tertentu.</p>
                        </div>
                        <div class="mb-2">
                            <span class="absolute -left-2 w-4 h-4 rounded-full bg-red-500"></span>
                            <p class="text-sm text-white/70">Abad 21 – Masa Kini</p>
                            <p class="font-sans text-sm sm:text-base">Revitalisasi digital: aplikasi, font, platform belajar; Aksaranta jadi jembatan generasi.</p>
                        </div>
                    </div>
                </div>
                </div>
                </div>
    </section>

    <!-- Key facts -->
    <section class="flex flex-col gap-8 mt-12">
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="bg-white/5 rounded-3xl p-6 sm:p-8 text-center">
                    <div class="text-4xl sm:text-5xl font-bold text-red-400">7</div>
                    <p class="mt-2 font-sans text-sm">Variasi dari awal abad hingga kini</p>
                </div>
                <div class="bg-white/5 rounded-3xl p-6 sm:p-8 text-center">
                    <div class="text-4xl sm:text-5xl font-bold text-red-400">600+</div>
                    <p class="mt-2 font-sans text-sm">Pustaha Laklak tercatat</p>
                </div>
                <div class="bg-white/5 rounded-3xl p-6 sm:p-8 text-center">
                    <div class="text-4xl sm:text-5xl font-bold text-red-400">14</div>
                    <p class="mt-2 font-sans text-sm">Abad awal kemunculan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Media embed -->
    <section class="flex flex-col gap-8 mt-12">
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <div class="bg-white/5 rounded-3xl p-6 sm:p-8">
                <h3 class="text-red-400 text-sm">Media</h3>
                <h4 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide mt-1">Saksikan perjalanan Aksara</h4>
                <div class="mt-4 w-full">
                    <iframe 
                        class="w-full h-64 sm:h-96 rounded-xl"
                        src="https://www.youtube.com/embed/7iiawKyA4os?si=3qqFTgmMluETghoK" 
                        title="YouTube video player" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        referrerpolicy="strict-origin-when-cross-origin" 
                        allowfullscreen>
                    </iframe>
            </div>
            </div>
        </div>
    </section>

    <!-- Did you know -->
    <section class="flex flex-col gap-8 mt-12">
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <div class="bg-white/5 rounded-3xl p-6 sm:p-10">
                <h3 class="text-red-400 text-center my-2 text-sm sm:text-base">Tahukah kamu?</h3>
                <p class="text-center font-sans text-base sm:text-lg">
                    Aksara Batak disebut juga Surat Batak. Tiap sub-etnis memiliki variasi gaya penulisan yang unik.
                </p>
            </div>
        </div>
    </section>

@endsection
