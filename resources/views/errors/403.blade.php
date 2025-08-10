@extends('layouts.general')

@section('title', '403 Forbidden')

@section('content')
<section class="min-h-[60vh] w-full flex items-center justify-center px-6 md:px-12">
  <div class="text-center max-w-2xl">
    <p class="text-red-400 font-mono text-sm mb-2">Error 403</p>
    <h1 class="text-white text-4xl md:text-6xl font-title mb-4">Akses ditolak</h1>
    <p class="text-white/70 mb-8">Anda tidak memiliki izin untuk mengakses halaman ini.</p>

    <div class="flex flex-col sm:flex-row gap-3 justify-center">
      <a href="{{ route('home') }}" class="px-5 py-3 rounded-xl bg-red-500 hover:bg-red-600 transition text-white">Ke Beranda</a>
      <a href="{{ route('learn.index') }}" class="px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 transition text-white">Lihat Course</a>
      <button type="button" onclick="history.back()" class="px-5 py-3 rounded-xl border border-white/10 hover:bg-white/5 transition text-white">Kembali</button>
    </div>
  </div>
</section>
@endsection


