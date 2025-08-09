@extends('layouts.general')

@section('title', 'Taman Alam Lumbini')

@section('body-class', 'font-title bg-bg-dark text-white')

@section('content')
    <section class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 pt-24">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold">Taman Alam Lumbini</h1>
        <p class="mt-3 text-white/80 font-sans max-w-3xl">Taman bernuansa religi dan alam dengan ikon pagoda emas.</p>
    </section>

    <section id="detail-section" class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 py-16">
        <div class="rounded-2xl overflow-hidden shadow-xl bg-white/5">
            <iframe class="w-full h-[340px] sm:h-[420px] md:h-[540px]" src="https://www.google.com/maps/embed?pb=!4v1752649671207!6m8!1m7!1sCAoSFkNJSE0wb2dLRUlDQWdJQ0V2ODNfYWc.!2m2!1d3.196336320278986!2d98.54089946331375!3f82.58955562607983!4f8.355888686727724!5f0.7820865974627469" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            <img src="{{ asset('img/tamanalamlubini.jpg') }}" alt="Taman Alam Lumbini" class="w-full rounded-2xl shadow-lg object-cover" />
            <div>
                <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold">Taman Alam Lumbini</h3>
                <p class="mt-4 text-white/80 font-sans">Destinasi bernuansa damai dengan area hijau dan bangunan ikonik. Jalur-jalur pejalan kaki menghadirkan suasana teduh, cocok untuk rekreasi keluarga maupun wisata religi.</p>
            </div>
        </div>

        <div class="mt-10 bg-white/5 rounded-2xl p-6">
            <span class="text-red-400 font-semibold">Referensi</span>
            <p class="mt-2 text-white/80 font-sans">Kumparan. (2023, 15 Juni). Taman Alam Lumbini: Lokasi, Daya Tarik, Jam Buka, Harga Tiket, dan Cara ke Sana. <a class="text-red-400 underline" href="https://kumparan.com/jendela-dunia/taman-alam-lumbini-lokasi-daya-tarik-jam-buka-harga-tiket-dan-cara-ke-sana-21z29bzcUjZ" target="_blank" rel="noopener">tautan</a>.</p>
        </div>

        <nav class="mt-12 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('virtual.index') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition-colors">
                <span>←</span><span>Kembali ke Virtual Tour</span>
            </a>
            <div class="flex items-center gap-3">
                <a href="{{ route('virtual.sibeabea') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">← Prev: Sibea-bea</a>
                <a href="{{ route('virtual.arrasyid') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Next: Arrasyiid →</a>
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
            <a href="{{ route('virtual.taman-alam-lubini') }}" class="bg-white/20 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Taman Alam Lumbini</a>
            <a href="{{ route('virtual.arrasyid') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Arrasyiid</a>
            <a href="{{ route('virtual.graha-bunda') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Graha Bunda</a>
            <a href="{{ route('virtual.funland') }}" class="bg-white/10 hover:bg-white/20 text-white/90 hover:text-white px-4 py-2 rounded-lg transition-colors">Mikie Funland</a>
        </div>
    </nav>
@endsection
