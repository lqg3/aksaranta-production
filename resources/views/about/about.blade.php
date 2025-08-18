@extends('layouts.general')

@section('title', 'Aksaranta - Tentang Tim Kami')

@section('head')

@endsection

@section('body-class', 'font-title bg-app text-app')

@section('content')
    <!-- Hero / Intro -->
    <section
        class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 my-20 lg:my-28 flex flex-col lg:flex-row justify-between gap-12">
        <div class="w-full lg:w-1/2 flex flex-col justify-between gap-6">
            <h2 class="text-red-400">Tentang Kami</h2>
            <h3 class="font-bold text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wider">
                Tim <span class="text-red-400">Aksaranta</span>
            </h3>
            <p class="font-sans text-sm sm:text-base md:text-lg dark:text-white/90">
                Kami adalah empat mahasiswa dari <strong>Universitas Pendidikan Indonesia</strong> —
                <strong>Kampus Daerah Cibiru</strong>. Aksaranta lahir dari ketertarikan kami terhadap aksara dan budaya
                Batak, dengan misi membuatnya mudah diakses, dipelajari, dan dicintai oleh generasi masa kini.
            </p>
        </div>
        <div class="w-full lg:w-1/2 flex justify-center lg:justify-end">
            <!-- TODO: Replace placeholder with real campus photo (UPI Kampus Daerah Cibiru) -->
            <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/persons/kd-cibiru.webp"
                 alt="Universitas Pendidikan Indonesia (placeholder)"
                 class="w-full max-w-md object-cover rounded-[36px] aspect-video" />
        </div>
    </section>

    <!-- Team Members -->
    <section class="flex flex-col gap-8">
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <h3 class="text-red-400 text-center my-2 text-sm sm:text-base">Tim Kami</h3>
            <h2 class="text-center text-2xl sm:text-3xl md:text-4xl">Empat mahasiswa <span class="text-red-400">UPI KDCibiru</span></h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-10">
                <!-- Jovanka -->
                <div class="bg-white/5 rounded-2xl p-6 h-full flex flex-col items-center text-center">
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/persons/jovanka.webp"
                         alt="Jovanka" class="w-32 h-32 rounded-full object-cover mb-4 border-4 border-white/10" />
                    <h4 class="text-lg font-semibold">Jovanka</h4>
                    <p class="font-sans text-sm mt-1 dark:text-white/70">Rekayasa Perangkat Lunak<div class="p-1 bg-red-800 bg-opacity/80 rounded-2xl px-2 text-sm text-white">Ketua Tim</div></p>
                </div>

                <!-- Steven -->
                <div class="bg-white/5 rounded-2xl p-6 h-full flex flex-col items-center text-center">
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/persons/stevenn.webp"
                         alt="Steven" class="w-32 h-32 rounded-full object-cover mb-4 border-4 border-white/10" />
                    <h4 class="text-lg font-semibold">Steven</h4>
                    <p class="font-sans text-sm mt-1 dark:text-white/70">Rekayasa Perangkat Lunak<div class="p-1 bg-red-800 bg-opacity/80 rounded-2xl px-2 text-sm text-white">Front End Developer</div></p>
                </div>

                <!-- Ryan -->
                <div class="bg-white/5 rounded-2xl p-6 h-full flex flex-col items-center text-center">
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/persons/ryan.webp"
                         alt="Ryan" class="w-32 h-32 rounded-full object-cover mb-4 border-4 border-white/10" />
                    <h4 class="text-lg font-semibold">Ryan</h4>
                    <p class="font-sans text-sm mt-1 dark:text-white/70">Mahasiswa UPI Kampus Daerah Cibiru<div class="p-1 bg-red-800 bg-opacity/80 rounded-2xl px-2 text-sm text-white">Back End Developer</div></p>
                </div>

                <!-- Sofia -->
                <div class="bg-white/5 rounded-2xl p-6 h-full flex flex-col items-center text-center">
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/persons/sofia.webp"
                         alt="Sofia" class="w-32 h-32 rounded-full object-cover mb-4 border-4 border-white/10" />
                    <h4 class="text-lg font-semibold">Sofia</h4>
                    <p class="font-sans text-sm mt-1 dark:text-white/70">Mahasiswa UPI KDCibiru<div class="p-1 bg-red-800 bg-opacity/80 rounded-2xl px-2 text-sm text-white">Instructor & Research</div></p>
                </div>
            </div>

            <!-- Optional: Our focus -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <div class="bg-white/5 rounded-2xl p-6 h-full">
                    <h4 class="text-lg font-semibold">Aksara & Budaya</h4>
                    <p class="font-sans text-sm mt-2">Kami merancang pengalaman belajar aksara Batak yang interaktif dan informatif.</p>
                </div>
                <div class="bg-white/5 rounded-2xl p-6 h-full">
                    <h4 class="text-lg font-semibold">Riset & Kurasi</h4>
                    <p class="font-sans text-sm mt-2">Konten dirancang dengan rujukan yang jelas dan gaya tutur yang mudah dipahami.</p>
                </div>
                <div class="bg-white/5 rounded-2xl p-6 h-full">
                    <h4 class="text-lg font-semibold">Akses Terbuka</h4>
                    <p class="font-sans text-sm mt-2">Kami berupaya menjaga akses yang ramah perangkat dan inklusif.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
