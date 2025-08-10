@extends('layouts.general')

@section('title', 'Game')

@section('content')
<section class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 my-20 text-white">
    <h1 class="text-3xl md:text-5xl font-title font-bold mb-4">Game</h1>
    <p class="text-white/80">Placeholder page for a future game. Replace this with the real content.</p>
    <p class="mt-6 text-white/60">Route name: <code>game</code></p>
    <a href="{{ route('home') }}" class="inline-block mt-8 px-4 py-2 rounded bg-white/10 hover:bg-white/20">Back to Home</a>
</section>
@endsection


