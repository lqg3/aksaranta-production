
@php
    // Active route helpers
    $navActive = [
        'home' => request()->routeIs('home'),
        'learn' => request()->routeIs('learn.*'),
        'culture' => request()->routeIs('culture'),
        'history' => request()->routeIs('history'),
        'kamus' => request()->routeIs('kamus'),
        'kamusAksara' => request()->routeIs('kamus-aksara'),
        'virtual' => request()->routeIs('virtual.*'),
        'blog' => request()->routeIs('blog.*'),
        'songs' => request()->routeIs('batak-songs'),
        'aksaranta' => request()->routeIs('aksaranta'),
        'about' => request()->routeIs('about'),
        'animasi' => request()->routeIs('animasi'),
    ];
@endphp

<nav 
    class="w-full h-10 z-[99999] fixed flex px-4 items-center justify-between top-0 left-0 pt-8 pb-8 !bg-[linear-gradient(180deg,rgba(27,27,27,1)_0%,rgba(255,255,255,0)_70%)]"
    x-data="userNavTransition()"
    x-init="init()"
>
    <!-- Left Nav -->
    <div class="items-center h-full hidden md:flex">
        <a href="{{ route('home') }}" class="text-2xl text-white font-title">aksaranta</a>
    </div>

    <!-- Center Nav -->
    <div class="flex items-center h-full">
        <ul class="flex items-center justify-center h-full font-title gap-4">
            <li class="flex items-center h-full relative" x-data="{open:false}" @mouseenter="open=true" @mouseleave="open=false">
                <button type="button" class="mr-2 text-white text-opacity-50 hover:text-opacity-80 transition-colors" aria-label="All pages">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 hidden md:inline" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.25 8.29a.75.75 0 01-.02-1.08z" clip-rule="evenodd"/></svg>
                </button>
                <a class="text-white transition-all duration-300 {{ $navActive['home'] ? 'text-opacity-80 font-bold cursor-default' : 'text-opacity-50 hover:text-opacity-80' }}"
                   href="{{ route('home') }}"
                   @click.prevent="navigateTo('{{ route('home') }}')"
                >Home</a>
                <!-- Dropdown anchored to arrow/home -->
                <div x-cloak x-show="open" x-transition class="absolute top-full left-0 mt-2 w-80 bg-bg-dark/50 backdrop-blur-sm rounded-xl border border-white/10 shadow-lg p-3">
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <a @click.prevent="navigateTo('{{ route('culture') }}')" href="{{ route('culture') }}" class="text-white px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['culture'] ? 'bg-white/10' : '' }}">Budaya</a>
                        <a @click.prevent="navigateTo('{{ route('history') }}')" href="{{ route('history') }}" class="text-white px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['history'] ? 'bg-white/10' : '' }}">Sejarah</a>
                        <a @click.prevent="navigateTo('{{ route('kamus-aksara') }}')" href="{{ route('kamus-aksara') }}" class="text-white px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['kamusAksara'] ? 'bg-white/10' : '' }}">Aksara</a>
                        <a @click.prevent="navigateTo('{{ route('kamus') }}')" href="{{ route('kamus') }}" class="text-white px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['kamus'] ? 'bg-white/10' : '' }}">Kamus</a>
                        <a @click.prevent="navigateTo('{{ route('virtual.index') }}')" href="{{ route('virtual.index') }}" class="text-white px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['virtual'] ? 'bg-white/10' : '' }}">Virtual</a>
                        <a @click.prevent="navigateTo('{{ route('aksaranta') }}')" href="{{ route('aksaranta') }}" class="text-white px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['aksaranta'] ? 'bg-white/10' : '' }}">Aksaranta</a>
                        <a @click.prevent="navigateTo('{{ route('blog.index') }}')" href="{{ route('blog.index') }}" class="text-white px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['blog'] ? 'bg-white/10' : '' }}">Blog</a>
                        <a @click.prevent="navigateTo('{{ route('batak-songs') }}')" href="{{ route('batak-songs') }}" class="text-white px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['songs'] ? 'bg-white/10' : '' }}">Lagu Batak</a>
                        <a @click.prevent="navigateTo('{{ route('about.index') }}')" href="{{ route('about.index') }}" class="text-white px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['about'] ? 'bg-white/10' : '' }}">Kami</a>
                        <a @click.prevent="navigateTo('{{ route('animasi') }}')" href="{{ route('animasi') }}" class="text-white px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['animasi'] ? 'bg-white/10' : '' }}">Game</a>
                    </div>
                </div>
            </li>
            <li class="flex items-center h-full">
                <a class="w-12 flex items-center h-full"
                   href="{{ route('home') }}"
                   @click.prevent="navigateTo('{{ route('home') }}')"
                >
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/design/logo-white-notext.svg" class="w-12" alt="Aksaranta Logo">
                </a>
            </li>
            <li class="flex items-center h-full">
                <a class="text-white transition-all duration-300 {{ $navActive['learn'] ? 'text-opacity-80 cursor-default font-bold' : 'text-opacity-50 hover:text-opacity-80' }}"
                   href="{{ route('learn.index') }}"
                   @click.prevent="navigateTo('{{ route('learn.index') }}')"
                >Learn</a>
            </li>
            
            <!-- Mobile menu -->
            <li class="md:hidden flex items-center h-full" x-data="{open:false}">
                <button @click="open=!open" class="text-white text-opacity-80">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
                <div x-cloak x-show="open" @click.away="open=false" x-transition class="fixed inset-0 z-[999999] bg-black/70">
                    <div class="absolute right-0 top-0 w-72 h-full bg-bg-dark p-6 overflow-y-auto">
                        <div class="flex justify-between items-center mb-4">
                            <span class="font-title">Menu</span>
                            <button @click="open=false" class="text-white/70">✕</button>
                        </div>
                        <nav class="flex flex-col gap-2 text-base">
                            <a @click.prevent="navigateTo('{{ route('culture') }}')" href="{{ route('culture') }}" class="px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['culture'] ? 'bg-white/10' : '' }}">Budaya</a>
                            <a @click.prevent="navigateTo('{{ route('history') }}')" href="{{ route('history') }}" class="px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['history'] ? 'bg-white/10' : '' }}">Sejarah</a>
                            <a @click.prevent="navigateTo('{{ route('kamus-aksara') }}')" href="{{ route('kamus-aksara') }}" class="px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['kamusAksara'] ? 'bg-white/10' : '' }}">Aksara</a>
                            <a @click.prevent="navigateTo('{{ route('kamus') }}')" href="{{ route('kamus') }}" class="px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['kamus'] ? 'bg-white/10' : '' }}">Kamus</a>
                            <a @click.prevent="navigateTo('{{ route('virtual.index') }}')" href="{{ route('virtual.index') }}" class="px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['virtual'] ? 'bg-white/10' : '' }}">Virtual Tour</a>
                            <a @click.prevent="navigateTo('{{ route('aksaranta') }}')" href="{{ route('aksaranta') }}" class="px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['aksaranta'] ? 'bg-white/10' : '' }}">Aksaranta</a>
                            <a @click.prevent="navigateTo('{{ route('blog.index') }}')" href="{{ route('blog.index') }}" class="px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['blog'] ? 'bg-white/10' : '' }}">Blog</a>
                            <a @click.prevent="navigateTo('{{ route('batak-songs') }}')" href="{{ route('batak-songs') }}" class="px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['songs'] ? 'bg-white/10' : '' }}">Lagu Batak</a>
                            <a @click.prevent="navigateTo('{{ route('about.index') }}')" href="{{ route('about.index') }}" class="px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['about'] ? 'bg-white/10' : '' }}">Kami</a>
                            <a @click.prevent="navigateTo('{{ route('animasi') }}')" href="{{ route('animasi') }}" class="px-3 py-2 rounded-lg hover:bg-white/5 {{ $navActive['animasi'] ? 'bg-white/10' : '' }}">Game</a>
                            @if (auth()->check())
                                <a @click.prevent="navigateTo('{{ route('dashboard') }}')" href="{{ route('dashboard') }}" class="px-3 py-2 rounded-lg hover:bg-white/5">Dashboard</a>
                            @endif
                        </nav>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <!-- Right Nav -->
    <div class="flex items-center text-white h-full">
        <p class="text-white text-opacity-50 font-title border-r border-white pr-4 mr-4"></p>
        @if (auth()->check())
            <span class="text-opacity-80 mr-4  font-title text-white">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors duration-300">
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class=" font-title text-white hover:text-opacity-80 transition-colors duration-300"
               @click.prevent="navigateTo('{{ route('login') }}')">Login</a>
        @endif
    </div>
</nav>

<script>
    function userNavTransition() {
        return {
            init() {
                // Ensure navigation is always visible
                this.$el.style.opacity = '1';
                this.$el.style.visibility = 'visible';
            },
            async navigateTo(url) {
                try {
                    // Use the globally exposed page transition system
                    if (window.currentPageTransition && typeof window.currentPageTransition.navigateTo === 'function') {
                        await window.currentPageTransition.navigateTo(url);
                        return;
                    }
                    
                    // Fallback to direct navigation
                    window.location.href = url;
                    
                } catch (error) {
                    console.error('Navigation error:', error);
                    // Always fallback to direct navigation
                    window.location.href = url;
                }
            }
        }
    }
</script>
