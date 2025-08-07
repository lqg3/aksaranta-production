
@php
    // Determine if the current route is a "learn" route
    $isLearn = request()->is('learn*');
@endphp

<nav 
    class="w-full h-10 z-[99999] fixed top-0 left-0 pt-8 pb-8 !bg-[linear-gradient(180deg,rgba(27,27,27,1)_0%,rgba(255,255,255,0)_70%)]"
    x-data="userNavTransition()"
    x-init="init()"
>
    <ul class="flex items-center justify-center h-full px-4 font-title gap-4">
        <li>
            <a class="text-white transition-all duration-300 {{ !$isLearn ? 'text-opacity-80 font-bold cursor-default' : 'text-opacity-50 hover:text-opacity-80' }}"
               href="{{ route('home') }}"
               @click.prevent="navigateTo('{{ route('home') }}')"
            >Home</a>
        </li>
        <li>
            <a class="w-12"
               href="{{ route('home') }}"
               @click.prevent="navigateTo('{{ route('home') }}')"
            >
                <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/design/logo-white-notext.svg" class="w-12" alt="Aksaranta Logo">
            </a>
        </li>
        <li>
            <a class="text-white transition-all duration-300 {{ $isLearn ? 'text-opacity-80 cursor-default font-bold' : 'text-opacity-50 hover:text-opacity-80' }}"
               href="{{ route('learn.index') }}"
               @click.prevent="navigateTo('{{ route('learn.index') }}')"
            >Learn</a>
        </li>
    </ul>
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
