@extends('layouts.general')

@section('title', 'Aksaranta - Tentang Tim Kami')

@section('head')

@endsection

@section('body-class', 'font-title bg-bg-dark text-white')

@section('content', )

    <section
        class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 my-20 lg:my-28 flex flex-col lg:flex-row justify-between gap-12">
        <div class="w-full lg:w-1/2 flex flex-col justify-between gap-6">
            <h2 class="text-red-400">Apa itu Batak?</h2>
            <h3 class="font-bold text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wider font-title">
                Budaya <span class="text-red-400">Batak</span>
            </h3>
            <p class="font-sans text-sm sm:text-base md:text-lg">
                Batak adalah suku etnis terbesar ketiga di Indonesia
                <sup class="relative inline-block group align-super">
                    <a href="https://indonesia.go.id/mediapublik/detail/2071" target="_blank" rel="noopener noreferrer"
                        class="underline text-red-400">[s]</a>
                    <span
                        class="pointer-events-none absolute bottom-full left-1/2 z-10 mb-2 -translate-x-1/2 whitespace-nowrap rounded bg-gray-800 px-2 py-1 text-xs text-white opacity-0 transition-opacity duration-150 group-hover:opacity-100">
                        indonesia.go.id (Klik untuk melihat sumber)
                        <span class="absolute left-1/2 top-full -translate-x-1/2 h-2 w-2 rotate-45 bg-gray-800"></span>
                    </span>
                </sup>
                setelah suku Sunda dan suku Jawa. Nama suku Batak dapat digunakan untuk mengidentifikasikan beberapa suku
                yang berasal dari Sumatera Utara. Selain itu, kata 'Batak' dapat digunakan untuk mengidentifikasikan
                suku-suku yang berbicara menggunakan bahasa Batak seperti suku Karo, Pakpak, Simalungun, Toba, Angkola,
                Mandailing, dan suku-suku lainnya dengan bahasa dan adat-adat yang berbeda.
            </p>
        </div>
        <div class="w-full lg:w-1/2 flex justify-center lg:justify-end">
            <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img10.webp" alt="Tour Guide"
                class="w-full max-w-md object-cover rounded-[36px]" />
        </div>
    </section>
@endsection
