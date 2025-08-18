@extends('layouts.general')

@section('title', $post->title)

@section('body-class', 'bg-app text-app')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
@endsection

@section('content')

    <a href="{{ route('blog.index') }}"
        class="absolute mt-12 top-6 left-6 sm:top-8 sm:left-8 z-50 flex items-center gap-2 px-4 py-2 text-white bg-white/10 hover:bg-white/20 border border-white/20 font-semibold rounded-full shadow-md transition-all">
        <i class="fa-solid fa-chevron-left w-3.5"></i>
        <span class="text-sm sm:text-bas flex items-center font-title">Back</span>
    </a>

    {{-- Hero Section --}}
    <section class="relative w-full h-[90dvh] max-h-[900px] overflow-hidden flex items-end justify-center">
        <!-- Background -->
        <img src="{{ $post->thumbnail ?? asset('img/blog/default blog thumbnail.png') }}" alt="{{ $post->title }}"
            class="absolute inset-0 w-full h-full object-cover brightness-50 -z-10 pointer-events-none select-none" />

        <!-- Overlay Text -->
        <div class="px-6 sm:px-12 lg:px-24 w-full pb-16 max-w-[1440px]">
            <h1
                class="!text-white text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold font-title leading-relaxed w-full max-w[1440px]">
                {{ $post->title }}
            </h1>
            <p class="!text-white/70 text-sm sm:text-base mb-2 font-sans">
                {{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') }}
            </p>
        </div>
    </section>

    {{-- Blog Content --}}
    <section class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-20 my-16 sm:my-24">
        <article
            class="prose prose-invert max-w-none font-opensans prose-lg prose-img:rounded-xl prose-a:text-white prose-a:underline hover:prose-a:text-white/80 prose-pre:bg-gray-900">
            <div class="tinymce-content">
                {!! $post->body !!}
            </div>
        </article>
    </section>

@endsection
