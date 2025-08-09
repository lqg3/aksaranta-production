@extends('layouts.general')

@section('title', 'Blog')

@section('body-class', 'font-title bg-bg-dark text-white')

@section('content')
    <!-- Hero -->
    <section class="relative w-full h-[80dvh] max-h-[900px] overflow-hidden flex items-center justify-center rounded-3xl">
        <img src="{{ asset('img/culture/hero-section-bg.svg') }}" alt="Background"
             class="absolute inset-0 w-full h-full object-cover -z-10 pointer-events-none select-none" />

        <div class="w-full max-w-[1440px] relative h-full">
            <div class="absolute left-6 bottom-10 sm:left-10 md:left-20 lg:left-28 flex flex-col gap-4">
                <h1 class="font-bold text-4xl sm:text-5xl md:text-6xl lg:text-7xl">Blog</h1>
                <p class="font-sans text-sm sm:text-base w-full sm:w-5/6 md:w-3/4 text-white/80">
                    Cerita, wawasan, dan pembaruan seputar budaya Batak: sejarah, kuliner, musik, bahasa, dan lainnya.
                </p>
            </div>
        </div>
    </section>

    <!-- List -->
    <section class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 my-20 lg:my-28 flex flex-col gap-5 items-center">
        <h3 class="text-red-400 text-center">Tulisan Terbaru</h3>
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold tracking-wide text-center">Jelajahi artikel pilihan</h2>
        <p class="font-sans w-full sm:w-3/4 text-center text-white/70">
            Telusuri kumpulan artikel yang dikurasi untuk menemani perjalanan belajarmu.
        </p>

        <div id="blog-posts-container" class="w-full">
            @include('blog._grid', ['posts' => $posts, 'pagination' => $pagination])
        </div>
    </section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('blog-posts-container');

    // AJAX search submit
    document.addEventListener('submit', function(e) {
        const form = e.target;
        if (form && form.id === 'search-form') {
            e.preventDefault();
            const query = new URLSearchParams(new FormData(form)).toString();
            fetch(`{{ route('blog.index') }}?${query}`, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(res => res.text())
                .then(html => {
                    container.innerHTML = html;
                    window.history.pushState({}, '', `?${query}`);
                });
        }
    });

    // AJAX pagination
    document.addEventListener('click', function(e) {
        const link = e.target.closest('.pagination a');
        if (!link) return;
        e.preventDefault();
        const url = link.href;
        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(res => res.text())
            .then(html => {
                container.innerHTML = html;
                window.history.pushState({}, '', url);
            });
    });
});
</script>
@endsection
