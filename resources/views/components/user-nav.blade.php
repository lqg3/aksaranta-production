
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
        'aksaraTranslator' => request()->routeIs('aksara-translator'),
        'about' => request()->routeIs('about'),
        'animasi' => request()->routeIs('animasi'),
    ];
@endphp

<nav 
    class="w-full h-10 z-[99999] fixed flex px-4 items-center justify-between top-0 left-0 pt-8 pb-8 dark:!bg-[linear-gradient(180deg,rgba(27,27,27,1)_0%,rgba(255,255,255,0)_70%)] !bg-[linear-gradient(180deg,rgba(255,255,255,1)_0%,rgba(255,255,255,0)_100%)]"
    x-data="userNavTransition()"
    x-init="init()"
>
    <!-- Left Nav -->
    <div class="items-center h-full hidden md:flex">
        <a href="{{ route('home') }}" class="text-2xl dark:text-white text-black font-title">aksaranta</a>
    </div>

    <!-- Center Nav -->
    <div class="flex items-center h-full">
        <ul class="flex items-center justify-center h-full font-title gap-4">
            <li class="flex items-center h-full relative" x-data="{open:false}" @mouseenter="open=true" @mouseleave="open=false">
                <button type="button" class="mr-2 dark:text-white text-black/60 md:hover:text-opacity-80 transition-colors" aria-label="All pages">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 hidden md:inline" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.25 8.29a.75.75 0 01-.02-1.08z" clip-rule="evenodd"/></svg>
                </button>
                <a class="transition-all duration-300 dark:text-white text-black {{ $navActive['home'] ? 'text-opacity-80 font-bold cursor-default' : 'text-opacity-60 md:hover:text-opacity-80' }}"
                   href="{{ route('home') }}"
                   @click.prevent="navigateTo('{{ route('home') }}')"
                >Home</a>
                <!-- Dropdown anchored to arrow/home -->
                <div x-cloak x-show="open" x-transition class="hidden md:block absolute top-full left-0 mt-2 w-80 bg-white/30 dark:bg-bg-dark/50 backdrop-blur-sm rounded-xl border border-black/10 dark:border-white/10 shadow-lg p-3">
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <a @click.prevent="navigateTo('{{ route('culture') }}')" href="{{ route('culture') }}" class="dark:text-white text-black px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 {{ $navActive['culture'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Budaya</a>
                        <a @click.prevent="navigateTo('{{ route('history') }}')" href="{{ route('history') }}" class="dark:text-white text-black px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 {{ $navActive['history'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Sejarah</a>
                        <a @click.prevent="navigateTo('{{ route('kamus-aksara') }}')" href="{{ route('kamus-aksara') }}" class="dark:text-white text-black px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 {{ $navActive['kamusAksara'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Aksara</a>
                        <a @click.prevent="navigateTo('{{ route('kamus') }}')" href="{{ route('kamus') }}" class="dark:text-white text-black px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 {{ $navActive['kamus'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Kamus</a>
                        <a @click.prevent="navigateTo('{{ route('virtual.index') }}')" href="{{ route('virtual.index') }}" class="dark:text-white text-black px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 {{ $navActive['virtual'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Virtual</a>
                        <a @click.prevent="navigateTo('{{ route('aksaranta') }}')" href="{{ route('aksaranta') }}" class="dark:text-white text-black px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 {{ $navActive['aksaranta'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Aksaranta</a>
                        <a @click.prevent="navigateTo('{{ route('blog.index') }}')" href="{{ route('blog.index') }}" class="dark:text-white text-black px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 {{ $navActive['blog'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Blog</a>
                        <a @click.prevent="navigateTo('{{ route('batak-songs') }}')" href="{{ route('batak-songs') }}" class="dark:text-white text-black px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 {{ $navActive['songs'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Lagu Batak</a>
                        <a @click.prevent="navigateTo('{{ route('aksara-translator') }}')" href="{{ route('aksara-translator') }}" class="dark:text-white text-black px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 {{ $navActive['aksaraTranslator'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Aksara Translator</a>
                        <a @click.prevent="navigateTo('{{ route('about.index') }}')" href="{{ route('about.index') }}" class="dark:text-white text-black px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 {{ $navActive['about'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Kami</a>
                        <a @click.prevent="navigateTo('{{ route('animasi') }}')" href="{{ route('animasi') }}" class="dark:text-white text-black px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 {{ $navActive['animasi'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Game</a>
                        <a href="https://chat.aksaranta.id/" target="_blank" rel="noopener noreferrer" class="dark:text-white text-black px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5">Chat</a>
                    </div>
                </div>
            </li>
            <li class="flex items-center h-full">
                <a class="w-12 flex items-center h-full"
                   href="{{ route('home') }}"
                   @click.prevent="navigateTo('{{ route('home') }}')"
                >
                    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/design/logo-white-notext.svg" class="w-12 dark:invert-0 invert" alt="Aksaranta Logo">
                </a>
            </li>
            <li class="flex items-center h-full">
                <a class="!text-black dark:!text-white transition-all duration-300 {{ $navActive['learn'] ? 'text-opacity-80 cursor-default font-bold' : 'text-opacity-50 hover:text-opacity-80' }}"
                   href="{{ route('learn.index') }}"
                   @click.prevent="navigateTo('{{ route('learn.index') }}')"
                >Learn</a>
            </li>
            
            <!-- Mobile menu -->
            <li class="md:hidden flex items-center h-full" x-data="{open:false}">
                <button @click="open=!open" class="dark:text-white text-black text-opacity-80">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
                <div x-cloak x-show="open" @click.away="open=false" x-transition class="fixed inset-0 z-[999999] bg-black/70">
                    <div class="absolute right-0 top-0 w-72 h-full bg-white dark:bg-bg-dark p-6 overflow-y-auto">
                        <div class="flex justify-between items-center mb-4">
                            <span class="font-title dark:text-white text-black">Menu</span>
                            <button @click="open=false" class="dark:text-white/70 text-black/60">✕</button>
                        </div>
                        <nav class="flex flex-col gap-2 text-base">
                            <a @click.prevent="navigateTo('{{ route('culture') }}')" href="{{ route('culture') }}" class="px-3 py-2 rounded-lg dark:hover:bg-white/5 hover:bg-black/5 {{ $navActive['culture'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Budaya</a>
                            <a @click.prevent="navigateTo('{{ route('history') }}')" href="{{ route('history') }}" class="px-3 py-2 rounded-lg dark:hover:bg-white/5 hover:bg-black/5 {{ $navActive['history'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Sejarah</a>
                            <a @click.prevent="navigateTo('{{ route('kamus-aksara') }}')" href="{{ route('kamus-aksara') }}" class="px-3 py-2 rounded-lg dark:hover:bg-white/5 hover:bg-black/5 {{ $navActive['kamusAksara'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Aksara</a>
                            <a @click.prevent="navigateTo('{{ route('kamus') }}')" href="{{ route('kamus') }}" class="px-3 py-2 rounded-lg dark:hover:bg-white/5 hover:bg-black/5 {{ $navActive['kamus'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Kamus</a>
                            <a @click.prevent="navigateTo('{{ route('virtual.index') }}')" href="{{ route('virtual.index') }}" class="px-3 py-2 rounded-lg dark:hover:bg-white/5 hover:bg-black/5 {{ $navActive['virtual'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Virtual Tour</a>
                            <a @click.prevent="navigateTo('{{ route('aksaranta') }}')" href="{{ route('aksaranta') }}" class="px-3 py-2 rounded-lg dark:hover:bg-white/5 hover:bg-black/5 {{ $navActive['aksaranta'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Aksaranta</a>
                            <a @click.prevent="navigateTo('{{ route('blog.index') }}')" href="{{ route('blog.index') }}" class="px-3 py-2 rounded-lg dark:hover:bg-white/5 hover:bg-black/5 {{ $navActive['blog'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Blog</a>
                            <a @click.prevent="navigateTo('{{ route('batak-songs') }}')" href="{{ route('batak-songs') }}" class="px-3 py-2 rounded-lg dark:hover:bg-white/5 hover:bg-black/5 {{ $navActive['songs'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Lagu Batak</a>
                             <a @click.prevent="navigateTo('{{ route('aksara-translator') }}')" href="{{ route('aksara-translator') }}" class="px-3 py-2 rounded-lg dark:hover:bg-white/5 hover:bg-black/5 {{ $navActive['aksaraTranslator'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Aksara Translator</a>
                            <a @click.prevent="navigateTo('{{ route('about.index') }}')" href="{{ route('about.index') }}" class="px-3 py-2 rounded-lg dark:hover:bg-white/5 hover:bg-black/5 {{ $navActive['about'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Kami</a>
                            <a @click.prevent="navigateTo('{{ route('animasi') }}')" href="{{ route('animasi') }}" class="px-3 py-2 rounded-lg dark:hover:bg-white/5 hover:bg-black/5 {{ $navActive['animasi'] ? 'bg-black/10 dark:bg-white/10' : '' }}">Game</a>
                            <a href="https://chat.aksaranta.id/" target="_blank" rel="noopener noreferrer" class="px-3 py-2 rounded-lg dark:hover:bg-white/5 hover:bg-black/5">Chat</a>
                            @if (auth()->check())
                                <form method="POST" action="{{ route('logout') }}" class="mt-1">
                                    @csrf
                                    <button type="submit" class="text-left px-3 py-2 rounded-lg hover:bg-white/5 text-red-400">Logout</button>
                                </form>
                            @else
                                <a @click.prevent="navigateTo('{{ route('login') }}')" href="{{ route('login') }}" class="px-3 py-2 rounded-lg dark:hover:bg-white/5 hover:bg-black/5">Login</a>
                                @if (Route::has('register'))
                                    <a @click.prevent="navigateTo('{{ route('register') }}')" href="{{ route('register') }}" class="px-3 py-2 rounded-lg dark:hover:bg-white/5 hover:bg-black/5">Register</a>
                                @endif
                            @endif
                        </nav>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <!-- Right Nav -->
    <div class="flex items-center dark:text-white text-black h-full">
        <p class="dark:text-white text-black text-opacity-50 font-title border-r border-black/20 dark:border-white pr-4 mr-4"></p>
        <!-- Theme toggle with SVG icons -->
        <div x-data="{ toast:null, toastTimer:null, init(){ this.toast = document.getElementById('theme-toast'); }, toggle(){ const html = document.documentElement; const isDark = html.classList.contains('dark'); html.classList.toggle('dark', !isDark); html.classList.toggle('light', isDark); try { localStorage.setItem('theme', !isDark ? 'dark' : 'light'); } catch(e) {} try { const toast = this.toast || document.getElementById('theme-toast'); if (toast){ const on = !isDark; toast.textContent = on ? 'Dark mode dinyalakan' : 'Dark mode dimatikan'; // show
                toast.classList.remove('opacity-0','translate-y-2','pointer-events-none');
                toast.classList.add('opacity-100');
                // schedule hide
                if (this.toastTimer) clearTimeout(this.toastTimer);
                this.toastTimer = setTimeout(()=>{
                    toast.classList.remove('opacity-100');
                    toast.classList.add('opacity-0','translate-y-2','pointer-events-none');
                }, 2000);
            } } catch(e) {} } }" class="mr-4">
            <button @click="toggle()" class="px-3 py-1 rounded-lg hover:bg-black/10 dark:hover:bg-white/10 focus:outline-none" aria-label="Toggle theme">
                <!-- Sun icon for light mode target -->
                <svg class="w-5 h-5 inline dark:hidden" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M10 3a1 1 0 011 1v1a1 1 0 11-2 0V4a1 1 0 011-1zm0 11a4 4 0 100-8 4 4 0 000 8zm7-4a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zm9.071 4.071a1 1 0 010 1.414l-.707.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM6.05 5.636a1 1 0 010 1.414L5.343 7.757a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zm9.9-1.414a1 1 0 010 1.414l-.707.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM6.05 14.364l-.707.707A1 1 0 113.93 13.657l.707-.707a1 1 0 111.414 1.414z"/></svg>
                <!-- Moon icon for dark mode target -->
                <svg class="w-5 h-5 hidden dark:inline" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M17.293 13.293A8 8 0 016.707 2.707a8 8 0 1010.586 10.586z"/></svg>
            </button>
        </div>
        @if (auth()->check())
            <span class="text-opacity-80 mr-4 font-title dark:text-white text-black">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="hidden md:inline">
                @csrf
                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors duration-300">Logout</button>
            </form>
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
