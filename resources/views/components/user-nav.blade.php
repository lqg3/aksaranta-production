
@php
    // Determine if the current route is a "learn" route
    $isLearn = request()->is('learn*');
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
            <li class="flex items-center h-full">
                <a class="text-white transition-all duration-300 {{ !$isLearn ? 'text-opacity-80 font-bold cursor-default' : 'text-opacity-50 hover:text-opacity-80' }}"
                   href="{{ route('home') }}"
                   @click.prevent="navigateTo('{{ route('home') }}')"
                >Home</a>
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
                <a class="text-white transition-all duration-300 {{ $isLearn ? 'text-opacity-80 cursor-default font-bold' : 'text-opacity-50 hover:text-opacity-80' }}"
                   href="{{ route('learn.index') }}"
                   @click.prevent="navigateTo('{{ route('learn.index') }}')"
                >Learn</a>
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
