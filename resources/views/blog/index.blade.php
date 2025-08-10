@extends('layouts.general')

@section('title', 'Blog')

@section('body-class', 'font-title bg-bg-dark text-white')

@section('content')
    <!-- Simple Header -->
    <section class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 my-8">
        <div class="bg-white/5 rounded-3xl p-6 sm:p-8">
            <h1 class="font-bold text-3xl sm:text-4xl md:text-5xl">Blog</h1>
            <p class="font-sans text-sm sm:text-base text-white/80 mt-2">Cerita, wawasan, dan pembaruan seputar budaya Batak.</p>
        </div>
    </section>

    <!-- List -->
    <section class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 my-12 lg:my-16 flex flex-col gap-5 items-center">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold tracking-wide text-center">Jelajahi artikel pilihan</h2>
        <p class="font-sans w-full sm:w-3/4 text-center text-white/70">Telusuri kumpulan artikel yang dikurasi untuk menemani perjalanan belajarmu.</p>

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
