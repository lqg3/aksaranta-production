@extends('layouts.homepage')

@section('content')

<style>
body{
    height: 100%;
    width: 100%;
    margin: 0rem;
    overflow: hidden;
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}
.image-container {
    position: relative;
    width: 40vmin;
    height: 56vmin;
}

.image-container > .image{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: 100% 50%;
}

.image-overlay {
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    color: white;
    padding: 2rem;
    opacity: 0.5;
    transition: opacity 0.3s ease;
    background: linear-gradient(transparent, rgba(0,0,0,0.6));
}

.image-container:hover .image-overlay {
    opacity: 1;
}

.image-overlay h3 {
    margin: 0;
    font-size: 1.2rem;
    font-weight: 300;
    transition: .2s;
}
.image-overlay h3:hover{
    text-decoration: underline;
    cursor: pointer;
}

.image-overlay p {
    margin: 0;
    font-size: 0.9rem;
    opacity: 0.8;
}
#image-track{
    display: flex;
    gap: 4vmin;
    position: absolute;
    left: 40%;
    top: 50%;
    transform: translate(0%, -50%);
}
#switchNavigation {
        transition-property: transform, opacity;
        transition-duration: 0.6s;
        transition-timing-function: cubic-bezier(0.22, 1, 0.36, 1);
}
#switchNavigation.translate-y-24 {
    transform: translate(-50%, 6rem);
    opacity: 0;
}
#switchNavigation.translate-y-0 {
    transform: translate(-50%, 0);
    opacity: 1;
}
#switchNavigation.opacity-0 {
    opacity: 0;
}
#switchNavigation.opacity-100 {
    opacity: 1;
}
</style>

<div id="loading-screen" class="fixed inset-0 w-screen h-screen flex items-center justify-center z-[1000] transition-opacity duration-500 opacity-100">
    <div id="loading-text" class="text-md text-white">0%</div>
</div>
<style>
    #loading-screen.fade-out {
        opacity: 0 !important;
        pointer-events: none;
    }
</style>

<div id="nav-1" class="transition-all duration-300">
    <canvas id="canvas" class="fixed z-[-500] top-0 left-0"></canvas>
    <!-- 10% dark overlay over canvas -->
    <div class="fixed inset-0 pointer-events-none z-[-400] bg-black bg-opacity-30"></div>

    <!-- Navigation overlay with fade transitions -->
    <div id="navigation-overlay" 
        class="fixed inset-0 pointer-events-none z-10 opacity-0 transition-opacity duration-600 ease-in-out"
        x-data="navigationTransition()"
        x-init="init(); window.currentPageTransition = $data"
        @navigate="navigateTo($event.detail)">
        
        <!-- Loading overlay for navigation transitions -->
        <div x-show="isTransitioning" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="z-[2500] fixed inset-0 bg-bg-dark flex items-center justify-center">
        </div>

        <nav class="navigation-carousel text-center text-5xl pointer-events-auto" role="navigation" aria-label="Main navigation">
        <div class="navigation-container">
            <!-- Navigation Item 0: Budaya Batak - Image 9 (center from zoom: column 2, row 1) -->
            <div class="navigation-item font-title font-extralight transition-all ease-in-out duration-100 hidden" 
                data-index="0" data-image="9"
                role="listitem">
                <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                        aria-label="Previous navigation item" 
                        data-direction="prev">
                    ←
                </button>
                <a class="nav-link hover:underline hover:decoration-2" 
                @click.prevent="$dispatch('navigate', '{{ route('culture') }}')"
                href="{{ route('culture') }}" 
                aria-label="Go to Budaya Batak">
                    Budaya Batak
                </a>
                <button class="nav-control nav-next hover:underline hover:decoration-2 text-3xl ml-8" 
                        aria-label="Next navigation item" 
                        data-direction="next">
                    →
                </button>
            </div>

            <!-- Navigation Item 1: Sejarah Batak - Image 0 -->
            <div class="navigation-item font-title font-extralight transition-all ease-in-out duration-100 hidden" 
                data-index="1" data-image="25"
                role="listitem">
                <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                        aria-label="Previous navigation item" 
                        data-direction="prev">
                    ←
                </button>
                <a class="nav-link hover:underline hover:decoration-2" 
                @click.prevent="$dispatch('navigate', '{{ route('about.history') }}')"
                href="{{ route('about.history') }}" 
                aria-label="Go to Sejarah Batak">
                    Sejarah Batak
                </a>
                <button class="nav-control nav-next hover:underline hover:decoration-2 text-3xl ml-8" 
                        aria-label="Next navigation item" 
                        data-direction="next">
                    →
                </button>
            </div>

            <!-- Navigation Item 2: Aksara Batak - Image 4 -->
            <div class="navigation-item font-title font-extralight transition-all ease-in-out duration-100 hidden" 
                data-index="2" data-image="27"
                role="listitem">
                <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                        aria-label="Previous navigation item" 
                        data-direction="prev">
                    ←
                </button>
                <a class="nav-link hover:underline hover:decoration-2" 
                @click.prevent="$dispatch('navigate', '{{ route('learn.index') }}')"
                href="{{ route('learn.index') }}" 
                aria-label="Go to Aksara Batak">
                    Aksara Batak
                </a>
                <button class="nav-control nav-next hover:underline hover:decoration-2 text-3xl ml-8" 
                        aria-label="Next navigation item" 
                        data-direction="next">
                    →
                </button>
            </div>

            <!-- Navigation Item 3: Glosarium & Kamus - Image 3 -->
            <div class="navigation-item font-title font-extralight transition-all ease-in-out duration-100 hidden" 
                data-index="3" data-image="26"
                role="listitem">
                <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                        aria-label="Previous navigation item" 
                        data-direction="prev">
                    ←
                </button>
                <a class="nav-link hover:underline hover:decoration-2" 
                @click.prevent="$dispatch('navigate', '{{ route('about.kamus') }}')"
                href="{{ route('about.kamus') }}" 
                aria-label="Go to Glosarium & Kamus">
                    Glosarium & Kamus
                </a>
                <button class="nav-control nav-next hover:underline hover:decoration-2 text-3xl ml-8" 
                        aria-label="Next navigation item" 
                        data-direction="next">
                    →
                </button>
            </div>

            <!-- Navigation Item 4: Virtual Tour - Image 19 -->
            <div class="navigation-item font-title font-extralight transition-all ease-in-out duration-100 hidden" 
                data-index="4" data-image="28"
                role="listitem">
                <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                        aria-label="Previous navigation item" 
                        data-direction="prev">
                    ←
                </button>
                <a class="nav-link hover:underline hover:decoration-2" 
                @click.prevent="$dispatch('navigate', '{{ route('virtual.index') }}')"
                href="{{ route('virtual.index') }}" 
                aria-label="Go to Virtual Tour">
                    Virtual Tour
                </a>
                <button class="nav-control nav-next hover:underline hover:decoration-2 text-3xl ml-8" 
                        aria-label="Next navigation item" 
                        data-direction="next">
                    →
                </button>
            </div>

            <!-- Navigation Item 5: Lagu Batak - Image 5 -->
            <div class="navigation-item font-title font-extralight transition-all ease-in-out duration-100 hidden" 
                data-index="5" data-image="29"
                role="listitem">
                <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                        aria-label="Previous navigation item" 
                        data-direction="prev">
                    ←
                </button>
                <a class="nav-link hover:underline hover:decoration-2" 
                @click.prevent="$dispatch('navigate', '{{ route('batak-songs') }}')"
                href="{{ route('batak-songs') }}" 
                aria-label="Go to Lagu Batak">
                    Lagu Batak
                </a>
                <button class="nav-control nav-next hover:underline hover:decoration-2 text-3xl ml-8" 
                        aria-label="Next navigation item" 
                        data-direction="next">
                    →
                </button>
            </div>

            <!-- Navigation Item 6: Aksaranta - Image 6 -->
            <div class="navigation-item font-title font-extralight transition-all ease-in-out duration-100 hidden" 
                data-index="6" data-image="30"
                role="listitem">
                <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                        aria-label="Previous navigation item" 
                        data-direction="prev">
                    ←
                </button>
                <a class="nav-link hover:underline hover:decoration-2" 
                @click.prevent="$dispatch('navigate', '{{ route('about.kamus-aksara') }}')"
                href="{{ route('about.kamus-aksara') }}" 
                aria-label="Go to Aksaranta">
                    Aksaranta
                </a>
                <button class="nav-control nav-next hover:underline hover:decoration-2 text-3xl ml-8" 
                        aria-label="Next navigation item" 
                        data-direction="next">
                    →
                </button>
            </div>

            <!-- Navigation Item 7: Blog - Image 7 -->
            <div class="navigation-item font-title font-extralight transition-all ease-in-out duration-100 hidden" 
                data-index="7" data-image="31"
                role="listitem">
                <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                        aria-label="Previous navigation item" 
                        data-direction="prev">
                    ←
                </button>
                <a class="nav-link hover:underline hover:decoration-2" 
                @click.prevent="$dispatch('navigate', '{{ route('blog.index') }}')"
                href="{{ route('blog.index') }}" 
                aria-label="Go to Blog">
                    Blog
                </a>
                <button class="nav-control nav-next hover:underline hover:decoration-2 text-3xl ml-8" 
                        aria-label="Next navigation item" 
                        data-direction="next">
                    →
                </button>
            </div>

            <!-- Navigation Item 8: Tentang Kami - Image 14 -->
            <div class="navigation-item font-title font-extralight transition-all ease-in-out duration-100 hidden" 
                data-index="8" data-image="32"
                role="listitem">
                <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                        aria-label="Previous navigation item" 
                        data-direction="prev">
                    ←
                </button>
                <a class="nav-link hover:underline hover:decoration-2" 
                @click.prevent="$dispatch('navigate', '{{ route('about.index') }}')"
                href="{{ route('about.index') }}" 
                aria-label="Go to Tentang Kami">
                    Tentang Kami
                </a>
                <button class="nav-control nav-next hover:underline hover:decoration-2 text-3xl ml-8" 
                        aria-label="Next navigation item" 
                        data-direction="next">
                    →
                </button>
            </div>
        </div>
        </nav>
    </div>
</div>

<!-- #nav-2 with routes and transitions matching #nav-1 -->
<div id="nav-2" class="top-0 left-0 transition-all duration-300 hidden"
     x-data="navigationTransition()"
     @navigate="navigateTo($event.detail)">
    
    <!-- Loading overlay for navigation transitions -->
    <div x-show="isTransitioning" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="z-[2500] fixed inset-0 bg-bg-dark flex items-center justify-center">
    </div>
    
    <div id="image-track">
        <!-- Budaya Batak -->
        <div class="image-container">
            <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img10.webp" alt="" class="image" data-mouse-down-at="0" draggable="false" data-prev-percentage="0" data-image-index="0">
            <div class="image-overlay">
                <a class="font-title text-md hover:!underline cursor-pointer" 
                   href="{{ route('culture') }}" 
                   @click.prevent="$dispatch('navigate', '{{ route('culture') }}')"
                   style="text-decoration: none; color: inherit; cursor: pointer;"
                   draggable="false"
                >Budaya Batak</a>
            </div>
        </div>
        <!-- Sejarah Batak -->
        <div class="image-container">
            <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img26.webp" alt="" class="image" data-mouse-down-at="0" draggable="false" data-prev-percentage="0">
            <div class="image-overlay">
                <a class="font-title text-md hover:!underline cursor-pointer" 
                   href="{{ route('about.history') }}" 
                   @click.prevent="$dispatch('navigate', '{{ route('about.history') }}')"
                   style="text-decoration: none; color: inherit; cursor: pointer;"
                   draggable="false"
                >Sejarah Batak</a>
            </div>
        </div>
        <!-- Aksara Batak -->
        <div class="image-container">
            <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img28.webp" alt="" class="image" data-mouse-down-at="0" draggable="false" data-prev-percentage="0">
            <div class="image-overlay">
                <a class="font-title text-md hover:!underline cursor-pointer" 
                   href="{{ route('learn.index') }}" 
                   @click.prevent="$dispatch('navigate', '{{ route('learn.index') }}')"
                   style="text-decoration: none; color: inherit; cursor: pointer;"
                   draggable="false"
                >Aksara Batak</a>
            </div>
        </div>
        <!-- Glosarium & Kamus -->
        <div class="image-container">
            <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img27.webp" alt="" class="image" data-mouse-down-at="0" draggable="false" data-prev-percentage="0">
            <div class="image-overlay">
                <a class="font-title text-md hover:!underline cursor-pointer" 
                   href="{{ route('about.kamus') }}" 
                   @click.prevent="$dispatch('navigate', '{{ route('about.kamus') }}')"
                   style="text-decoration: none; color: inherit; cursor: pointer;"
                   draggable="false"
                >Glosarium & Kamus</a>
            </div>
        </div>
        <!-- Virtual Tour -->
        <div class="image-container">
            <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img29.webp" alt="" class="image" data-mouse-down-at="0" draggable="false" data-prev-percentage="0">
            <div class="image-overlay">
                <a class="font-title text-md hover:!underline cursor-pointer" 
                   href="{{ route('virtual.index') }}" 
                   @click.prevent="$dispatch('navigate', '{{ route('virtual.index') }}')"
                   style="text-decoration: none; color: inherit; cursor: pointer;"
                   draggable="false"
                >Virtual Tour</a>
            </div>
        </div>
        <!-- Lagu Batak -->
        <div class="image-container">
            <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img30.webp" alt="" class="image" data-mouse-down-at="0" draggable="false" data-prev-percentage="0">
            <div class="image-overlay">
                <a class="font-title text-md hover:!underline cursor-pointer" 
                   href="{{ route('batak-songs') }}" 
                   @click.prevent="$dispatch('navigate', '{{ route('batak-songs') }}')"
                   style="text-decoration: none; color: inherit; cursor: pointer;"
                   draggable="false"
                >Lagu Batak</a>
            </div>
        </div>
        <!-- Aksaranta -->
        <div class="image-container">
            <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img31.webp" alt="" class="image" data-mouse-down-at="0" draggable="false" data-prev-percentage="0">
            <div class="image-overlay">
                <a class="font-title text-md hover:!underline cursor-pointer" 
                   href="{{ route('about.kamus-aksara') }}" 
                   @click.prevent="$dispatch('navigate', '{{ route('about.kamus-aksara') }}')"
                   style="text-decoration: none; color: inherit; cursor: pointer;"
                   draggable="false"
                >Aksaranta</a>
            </div>
        </div>
        <!-- Blog -->
        <div class="image-container">
            <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img32.webp" alt="" class="image" data-mouse-down-at="0" draggable="false" data-prev-percentage="0">
            <div class="image-overlay">
                <a class="font-title text-md hover:!underline cursor-pointer" 
                   href="{{ route('blog.index') }}" 
                   @click.prevent="$dispatch('navigate', '{{ route('blog.index') }}')"
                   style="text-decoration: none; color: inherit; cursor: pointer;"
                   draggable="false"
                >Blog</a>
            </div>
        </div>
        <!-- Tentang Kami -->
        <div class="image-container">
            <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img33.webp" alt="" class="image" data-mouse-down-at="0" draggable="false" data-prev-percentage="0">
            <div class="image-overlay">
                <a class="font-title text-md hover:!underline cursor-pointer" 
                   href="{{ route('about.index') }}" 
                   @click.prevent="$dispatch('navigate', '{{ route('about.index') }}')"
                   style="text-decoration: none; color: inherit; cursor: pointer;"
                   draggable="false"
                >Tentang Kami</a>
            </div>
        </div>
    </div>
</div>


<button id="switchNavigation" class="fixed left-1/2 -translate-x-1/2 bottom-6 z-50 px-6 py-3 text-white font-title rounded-lg shadow-lg hover:bg-opacity-90 transition-all duration-300 translate-y-24 opacity-0"
    style="transition-all duration-300"
>Lihat Semua Halaman
</button>


<!-- Navigation switch script -->
<script>
    // Navigation switch logic
    const btn = document.getElementById('switchNavigation');
    btn.addEventListener('click', function() {
        const nav1 = document.getElementById('nav-1');
        const nav2 = document.getElementById('nav-2');
        const fadeDuration = 300;

        // Helper to fade out an element
        function fadeOut(el, callback) {
            el.style.transition = `opacity ${fadeDuration}ms`;
            el.style.opacity = 0;
            setTimeout(() => {
                if (callback) callback();
            }, fadeDuration);
        }

        // Helper to fade in an element
        function fadeIn(el) {
            el.style.transition = `opacity ${fadeDuration}ms`;
            el.style.opacity = 1;
        }

        // Ensure both navs have opacity set for transition
        nav1.style.opacity = nav1.style.opacity === "" ? "1" : nav1.style.opacity;
        nav2.style.opacity = nav2.style.opacity === "" ? "1" : nav2.style.opacity;

        if (nav1.classList.contains('hidden')) {
            // Switch to nav-1 with fade
            nav1.classList.remove('hidden');
            nav1.style.opacity = 0;
            fadeOut(nav2, () => {
                nav2.classList.add('hidden');
                fadeIn(nav1);
            });
            btn.textContent = 'Lihat Semua Halaman';
        } else {
            // Switch to nav-2 with fade
            nav2.classList.remove('hidden');
            nav2.style.opacity = 0;
            fadeOut(nav1, () => {
                nav1.classList.add('hidden');
                fadeIn(nav2);
            });
            btn.textContent = 'Kembali';
        }
    });

    // Track drag logic: only active when nav-2 is visible
    const track = document.getElementById("image-track");
    if (track) {
        track.dataset.prevPercentage = "0";

        let isDragging = false;

        // Helper to check if nav-2 is visible
        function isNav2Visible() {
            const nav2 = document.getElementById('nav-2');
            return nav2 && !nav2.classList.contains('hidden');
        }

        function onPointerDown(e) {
            if (!isNav2Visible()) return;
            isDragging = true;
            track.dataset.mouseDownAt = e.clientX ?? (e.touches?.[0]?.clientX ?? 0);
        }

        function onPointerUp(e) {
            if (!isDragging) return;
            isDragging = false;
            track.dataset.mouseDownAt = "0";
            track.dataset.prevPercentage = track.dataset.percentage || "0";
        }

        function onPointerMove(e) {
            if (!isDragging || !isNav2Visible()) return;
            const clientX = e.clientX ?? (e.touches?.[0]?.clientX ?? 0);
            if(track.dataset.mouseDownAt === "0") return;
            const mouseDelta = parseFloat(track.dataset.mouseDownAt) - clientX,
                maxDelta = window.innerWidth / 2;
            const percentage = (mouseDelta / maxDelta) * -100,
                nextPercentageUnconstrained = parseFloat(track.dataset.prevPercentage) + percentage,
                nextPercentage = Math.max(Math.min(nextPercentageUnconstrained, 0), -90);
            track.dataset.percentage = nextPercentage;
            track.animate({
                transform: `translate(${nextPercentage}%, -50%)` 
            }, { duration: 1200, fill: "forwards"});
            for(const image of track.getElementsByClassName("image")) {
                image.animate({
                    objectPosition: `${100 + nextPercentage}% center`
                }, {duration: 1200, fill: "forwards"});
            }
        }

        // Mouse events
        track.addEventListener('mousedown', onPointerDown);
        window.addEventListener('mouseup', onPointerUp);
        window.addEventListener('mousemove', onPointerMove);

        // Touch events for mobile
        track.addEventListener('touchstart', onPointerDown, {passive: false});
        window.addEventListener('touchend', onPointerUp, {passive: false});
        window.addEventListener('touchmove', onPointerMove, {passive: false});
    }
</script>

<!-- Transition Script -->
<script>
    // Alpine.js navigation transition component
    function navigationTransition() {
        return {
            isTransitioning: false,
            isNavigationReady: false,
            
            init() {
                // Monitor for navigation readiness
                this.checkNavigationReadiness();
            },
            
            checkNavigationReadiness() {
                // Wait for canvas animation to complete and navigation to be initialized
                const checkInterval = setInterval(() => {
                    if (window.navigationCarousel && window.navigationCarousel.isTextVisible) {
                        this.showNavigation();
                        clearInterval(checkInterval);
                    }
                }, 100);
                
                // Fallback timeout
                setTimeout(() => {
                    clearInterval(checkInterval);
                    if (window.navigationCarousel) {
                        this.showNavigation();
                    }
                }, 8000);
            },
            
            showNavigation() {
                this.isNavigationReady = true;
                const overlay = document.getElementById('navigation-overlay');
                if (overlay) {
                    overlay.classList.add('ready');
                }
            },
            
            async navigateTo(url) {
                if (this.isTransitioning) return;
                
                // Start transition
                this.isTransitioning = true;
                
                try {
                    // Wait for transition animation
                    await new Promise(resolve => setTimeout(resolve, 600));
                    
                    // Navigate to new page
                    window.location.href = url;
                    
                } catch (error) {
                    console.error('Navigation error:', error);
                    this.isTransitioning = false;
                    
                    // Fallback navigation
                    window.location.href = url;
                }
            }
        }
    }
</script>

<script>
    const canvas = document.getElementById('canvas');
    const context = canvas.getContext('2d');

    // Mobile-optimized viewport handling
    function getOptimalCanvasSize() {
        // Get actual viewport dimensions
        let width = window.innerWidth;
        let height = window.innerHeight;
        
        // Handle mobile viewport quirks
        if (window.visualViewport) {
            width = window.visualViewport.width;
            height = window.visualViewport.height;
        }
        
        // Handle high-DPI screens consistently
        const dpr = window.devicePixelRatio || 1;
        
        return {
            displayWidth: width,
            displayHeight: height,
            canvasWidth: Math.round(width * dpr),
            canvasHeight: Math.round(height * dpr),
            pixelRatio: dpr
        };
    }

    let canvasSize = getOptimalCanvasSize();
    var windowWidth = canvasSize.displayWidth;
    var windowHeight = canvasSize.displayHeight;

    // Set canvas size with proper DPI handling
    canvas.width = canvasSize.canvasWidth;
    canvas.height = canvasSize.canvasHeight;
    canvas.style.width = canvasSize.displayWidth + 'px';
    canvas.style.height = canvasSize.displayHeight + 'px';
    
    // Scale context for high-DPI screens
    if (canvasSize.pixelRatio !== 1) {
        context.scale(canvasSize.pixelRatio, canvasSize.pixelRatio);
    }

    context.fillStyle = 'rgba(255, 255, 255, 0.5)';

    const cols = 5;
    const rows = 4;
    const totalImages = 33;

    // Performance optimization: Global layout cache
    let layoutCache = {
        windowWidth: 0,
        windowHeight: 0,
        gap: 0,
        rectWidth: 0,
        rectHeight: 0,
        positions: [],
        cropCache: new Map(),
        isValid: false
    };

    // Performance optimization: Cubic-bezier lookup table
    const BEZIER_SAMPLES = 100;
    const bezierLookupTable = new Map();

    // Pre-calculate cubic-bezier values for common easing functions
    function buildBezierLookupTable() {
        const curves = {
            'slideDefault': [0.5, 0.26, 0.25, 1],
            'slideCenter': [0.89, 0.01, 0.26, 0.80],
            'zoomEasing': [0.89, 0.01, 0.26, 0.90],
            'transitionEasing': [0.25, 1, 0.25, 1]
        };

        for (const [name, [p1x, p1y, p2x, p2y]] of Object.entries(curves)) {
            const table = [];
            for (let i = 0; i <= BEZIER_SAMPLES; i++) {
                const progress = i / BEZIER_SAMPLES;
                table.push(cubicBezierCalculate(progress, p1x, p1y, p2x, p2y));
            }
            bezierLookupTable.set(name, table);
        }
    }

    // Fast cubic-bezier lookup
    function cubicBezierLookup(progress, curveName) {
        const table = bezierLookupTable.get(curveName);
        if (!table) return progress; // Fallback
        
        const index = Math.min(Math.floor(progress * BEZIER_SAMPLES), BEZIER_SAMPLES - 1);
        const nextIndex = Math.min(index + 1, BEZIER_SAMPLES);
        const localProgress = (progress * BEZIER_SAMPLES) - index;
        
        // Linear interpolation between samples
        return table[index] + (table[nextIndex] - table[index]) * localProgress;
    }

    // Optimized layout calculation with caching
    function updateLayoutCache() {
        if (layoutCache.windowWidth === windowWidth && 
            layoutCache.windowHeight === windowHeight && 
            layoutCache.isValid) {
            return; // Use cached values
        }

        const gap = Math.min(windowWidth, windowHeight) / 50;
        const rectWidth = (windowWidth - (cols + 1) * gap) / cols;
        const rectHeight = (windowHeight - (rows + 1) * gap) / rows;

        layoutCache.windowWidth = windowWidth;
        layoutCache.windowHeight = windowHeight;
        layoutCache.gap = gap;
        layoutCache.rectWidth = rectWidth;
        layoutCache.rectHeight = rectHeight;
        layoutCache.positions = [];
        layoutCache.cropCache.clear();
        layoutCache.isValid = true;

        // Pre-calculate all grid positions
        let imageIndex = 0;
        for (let i = 0; i < cols; i++) {
            for (let j = 0; j < rows; j++) {
                const x = gap + i * (rectWidth + gap);
                const y = gap + j * (rectHeight + gap);
                
                layoutCache.positions.push({
                    x, y, imageIndex, column: i, row: j
                });
                imageIndex++;
            }
        }
    }

    // Pre-calculate crop coordinates for cover effect
    function getCropCoordinates(img, targetWidth, targetHeight) {
        const key = `${img.src}_${targetWidth}_${targetHeight}`;
        
        if (layoutCache.cropCache.has(key)) {
            return layoutCache.cropCache.get(key);
        }

        const imgAspect = img.width / img.height;
        const targetAspect = targetWidth / targetHeight;
        let sx, sy, sWidth, sHeight;

        if (imgAspect > targetAspect) {
            sHeight = img.height;
            sWidth = targetWidth * (img.height / targetHeight);
            sx = (img.width - sWidth) / 2;
            sy = 0;
        } else {
            sWidth = img.width;
            sHeight = targetHeight * (img.width / targetWidth);
            sx = 0;
            sy = (img.height - sHeight) / 2;
        }

        const cropData = { sx, sy, sWidth, sHeight };
        layoutCache.cropCache.set(key, cropData);
        return cropData;
    }

    // Reusable object to reduce garbage collection
    const reusableObjects = {
        animationFrame: { lastTime: 0, deltaTime: 0 }
    };

    // Debug and verification functions for seamless transitions
    function verifyTransitionState(targetColumn, targetRow) {
        const targetImageIndex = targetColumn * rows + targetRow;
        const targetImage = images[targetImageIndex];
        
        if (!targetImage || !targetImage.complete) {
            console.warn('Transition verification failed: Target image not loaded');
            return false;
        }
        
        // Verify crop coordinates are cached and consistent
        const rectCrop = getCropCoordinates(targetImage, layoutCache.rectWidth, layoutCache.rectHeight);
        const fullCrop = getCropCoordinates(targetImage, windowWidth, windowHeight);
        
        if (!rectCrop || !fullCrop) {
            console.warn('Transition verification failed: Crop coordinates not available');
            return false;
        }
        
        return true;
    }

    // Mobile-specific debugging helper
    function logMobileViewportInfo() {
        console.log('Mobile Viewport Info:', {
            windowSize: `${window.innerWidth}x${window.innerHeight}`,
            visualViewport: window.visualViewport ? `${window.visualViewport.width}x${window.visualViewport.height}` : 'not supported',
            devicePixelRatio: window.devicePixelRatio,
            canvasSize: `${canvas.width}x${canvas.height}`,
            displaySize: `${canvasSize.displayWidth}x${canvasSize.displayHeight}`
        });
    }

    // Original cubic-bezier calculation function (used for building lookup table)
    function cubicBezierCalculate(progress, p1x, p1y, p2x, p2y) {
        // Binary search to find t value for given x
        function solveCubicBezierX(x, p1x, p2x) {
            let t0 = 0;
            let t1 = 1;
            let t = x; // Initial guess
            
            // Binary search for the correct t value
            for (let i = 0; i < 10; i++) { // 10 iterations should be enough for good precision
                const currentX = 3 * (1 - t) * (1 - t) * t * p1x + 
                            3 * (1 - t) * t * t * p2x + 
                            t * t * t;
                
                if (Math.abs(currentX - x) < 0.001) break;
                
                if (currentX < x) {
                    t0 = t;
                } else {
                    t1 = t;
                }
                t = (t0 + t1) / 2;
            }
            
            return t;
        }
        
        // Find the t value for the given x
        const t = solveCubicBezierX(progress, p1x, p2x);
        
        // Calculate and return the y value for that t
        const y = 3 * (1 - t) * (1 - t) * t * p1y + 
                3 * (1 - t) * t * t * p2y + 
                t * t * t;
        
        return y;
    }

    // Loading screen elements
    const loadingScreen = document.getElementById('loading-screen');
    const loadingText = document.getElementById('loading-text');

    // Preload all images
    const images = [];
    let imagesLoaded = 0;

    function updateLoadingProgress() {
        const progress = Math.round((imagesLoaded / totalImages) * 100);
        loadingText.textContent = `Memuat gambar - ${progress}%`;
        
        if (imagesLoaded === totalImages) {
            // All images loaded, fade out loading screen and draw rectangles
            setTimeout(() => {
                loadingScreen.classList.add('fade-out');
                setTimeout(() => {
                    loadingScreen.classList.add('hidden');
                    drawRectangles();
                }, 500); // Wait for fade-out transition (match CSS)
            }, 200); // Small delay to show 100%
        }
    }

    function preloadImages() {
        for (let i = 1; i <= totalImages; i++) {
            const img = new Image();
            img.src = `https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/images/homepage/img${i}.webp`;
            img.onload = function() {
                imagesLoaded++;
                updateLoadingProgress();
            };
            images.push(img);
        }
        
    }

    function drawRectangles() {
        // If in single image mode, just draw the single image
        if (animationState.isSingleImageMode) {
            drawSingleImage();
            return;
        }

        // Use cached layout calculations
        updateLayoutCache();
        const { gap, rectWidth, rectHeight } = layoutCache;

        // Clear the canvas once
        context.clearRect(0, 0, windowWidth, windowHeight);

        // Batch zoom transformations to minimize save/restore calls
        const needsZoomTransform = animationState.isZooming;
        if (needsZoomTransform) {
            context.save();
            
            // Apply zoom transformations
            context.translate(animationState.zoomOffsetX, animationState.zoomOffsetY);
            
            // Scale from the center of the target image
            const targetX = gap + animationState.zoomTarget.column * (rectWidth + gap);
            const targetY = gap + animationState.zoomTarget.row * (rectHeight + gap);
            const imageCenterX = targetX + rectWidth / 2;
            const imageCenterY = targetY + rectHeight / 2;
            
            context.translate(imageCenterX, imageCenterY);
            context.scale(animationState.zoomScale, animationState.zoomScale);
            context.translate(-imageCenterX, -imageCenterY);
        }

        // Set global alpha once instead of per image
        context.globalAlpha = 1.0;

        // Use cached positions for optimized drawing
        for (let posIndex = 0; posIndex < layoutCache.positions.length; posIndex++) {
            const position = layoutCache.positions[posIndex];
            const { x, column, row, imageIndex } = position;
            let y = position.y;
            
            // Apply animation offsets if needed
            if (animationState.isAnimating && animationState.animationType === 'slideIn' && 
                animationState.imageOffsets[column] && animationState.imageOffsets[column][row] !== undefined) {
                y += animationState.imageOffsets[column][row];
            } else if (animationState.isAnimating && !animationState.imageOffsets[column]) {
                // Fallback to staging positions
                if (column % 2 === 0) {
                    y = windowHeight + gap + row * (rectHeight + gap);
                } else {
                    y = -(rectHeight * rows + gap * (rows + 1)) + gap + row * (rectHeight + gap);
                }
            }
            
            const img = images[imageIndex];
            if (img && img.complete) {
                // Use pre-calculated crop coordinates
                const { sx, sy, sWidth, sHeight } = getCropCoordinates(img, rectWidth, rectHeight);
                
                context.drawImage(
                    img,
                    sx, sy, sWidth, sHeight,
                    x, y, rectWidth, rectHeight
                );
            }
        }
        
        // Restore canvas state once if we applied zoom transformation
        if (needsZoomTransform) {
            context.restore();
        }
    }

    // Debounce function to limit resize frequency
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    function handleResize() {
        // Use mobile-optimized canvas sizing
        canvasSize = getOptimalCanvasSize();
        windowWidth = canvasSize.displayWidth;
        windowHeight = canvasSize.displayHeight;
        
        // Update canvas with proper DPI handling
        canvas.width = canvasSize.canvasWidth;
        canvas.height = canvasSize.canvasHeight;
        canvas.style.width = canvasSize.displayWidth + 'px';
        canvas.style.height = canvasSize.displayHeight + 'px';
        
        // Reset context scaling for high-DPI screens
        context.setTransform(1, 0, 0, 1, 0, 0); // Reset transform
        if (canvasSize.pixelRatio !== 1) {
            context.scale(canvasSize.pixelRatio, canvasSize.pixelRatio);
        }
        
        // Invalidate layout cache on resize
        layoutCache.isValid = false;
        
        // Redraw with new dimensions
        if (animationState.isSingleImageMode) {
            drawSingleImage();
        } else {
            drawRectangles();
        }
    }

    // Animation state
    let animationState = {
        isAnimating: false,
        animationType: 'none', // 'slideIn' for the intro animation
        imageOffsets: [], // Individual Y offset for each image [column][row]
        isZooming: false,
        zoomTarget: { column: -1, row: -1 }, // Target image for zoom
        zoomProgress: 0, // 0 to 1, zoom animation progress
        zoomScale: 1, // Current zoom scale
        zoomOffsetX: 0, // X offset for zoom centering
        zoomOffsetY: 0, // Y offset for zoom centering
        isSingleImageMode: false, // Track if we're in single image mode
        singleImage: null // Store the single image to display
    };

    function animateIntro(){
        // Initialize animation state
        animationState.isAnimating = true;
        animationState.animationType = 'slideIn';
        
        // Use cached layout for initial positioning
        updateLayoutCache();
        const { gap, rectHeight } = layoutCache;
        
        // Initialize 2D array for image offsets [column][row]
        animationState.imageOffsets = [];
        for (let i = 0; i < cols; i++) {
            animationState.imageOffsets[i] = [];
            for (let j = 0; j < rows; j++) {
                if (i % 2 === 0) {
                    // Even columns start below screen
                    animationState.imageOffsets[i][j] = windowHeight + gap;
                } else {
                    // Odd columns start above screen
                    animationState.imageOffsets[i][j] = -(rectHeight * rows + gap * (rows + 1));
                }
            }
        }
        
        // Start individual image animations with staggered timing
        for (let i = 0; i < cols; i++) {
            // Determine column delay
            let columnDelay = 0;
            if (i === 0 || i === 4) {
                columnDelay = 500; // Delay column 0 & 4 by 200ms
            } else if (i === 1 || i === 3) {
                columnDelay = 800; // Delay column 1 & 3 by 300ms
            }
            // Column 2 has no delay (0ms)
            
            // Determine animation order for this column
            let animationOrder;
            if (i % 2 === 0) {
                // Even columns: animate top to bottom (0, 1, 2, 3)
                animationOrder = [0, 1, 2, 3];
            } else {
                // Odd columns: animate bottom to top (3, 2, 1, 0)
                animationOrder = [3, 2, 1, 0];
            }
            
            animationOrder.forEach((rowIndex, orderIndex) => {
                let delay = columnDelay + (orderIndex * 300); // Column delay + 300ms stagger within each column
                
                // Special delay for column 2 images 2, 3, 4 (row indices 1, 2, 3)
                if (i === 2 && (rowIndex === 1 || rowIndex === 2 || rowIndex === 3)) {
                    delay += 150; // Additional 150ms delay for images 2, 3, 4 of column 2
                }
                
                setTimeout(() => {
                    animateImageSlideIn(i, rowIndex);
                }, delay);
            });
        }
        
        // Start zoom animation 1000ms into the slide-in animation
        setTimeout(() => {
            startZoomAnimation(2, 1); // Zoom into second image of middle column (column 2, row 1)
        }, 1000);
    }



    function animateImageSlideIn(columnIndex, rowIndex) {
        const duration = 1500;
        let startTime = 0;
        
        // Cache initial calculations
        updateLayoutCache();
        const { gap, rectHeight } = layoutCache;
        
        const startOffset = columnIndex % 2 === 0 
            ? windowWidth + gap 
            : -(rectHeight * rows + gap * (rows + 1));
        
        // Choose easing curve based on image position
        const easingCurve = (columnIndex === 2 && rowIndex === 0) ? 'slideCenter' : 'slideDefault';
        
        function animate(currentTime) {
            if (startTime === 0) startTime = currentTime;
            
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Use optimized lookup table for easing
            const easeProgress = progress === 0 || progress === 1 
                ? progress 
                : cubicBezierLookup(progress, easingCurve);
            
            // Animate from start offset to 0 (final position)
            animationState.imageOffsets[columnIndex][rowIndex] = startOffset * (1 - easeProgress);
            
            // Redraw the scene
            drawRectangles();
            
            if (progress < 1) {
                requestAnimationFrame(animate);
            } else {
                // Check if all images are done animating (optimized check)
                let allImagesAtFinalPosition = true;
                for (let i = 0; i < cols && allImagesAtFinalPosition; i++) {
                    for (let j = 0; j < rows; j++) {
                        if (Math.abs(animationState.imageOffsets[i][j]) >= 1) {
                            allImagesAtFinalPosition = false;
                            break;
                        }
                    }
                }
                
                if (allImagesAtFinalPosition) {
                    // Animation complete
                    animationState.isAnimating = false;
                    animationState.animationType = 'none';
                    animationState.imageOffsets = [];
                    drawRectangles();
                }
            }
        }
        
        requestAnimationFrame(animate);
    }

    function startZoomAnimation(targetColumn, targetRow) {
        animationState.isZooming = true;
        animationState.zoomTarget = { column: targetColumn, row: targetRow };
        animationState.zoomProgress = 0;
        
        const duration = 4000;
        let startTime = 0;
        
        // Pre-calculate zoom values to avoid repeated calculations
        updateLayoutCache();
        const { gap, rectWidth, rectHeight } = layoutCache;
        
        const targetX = gap + targetColumn * (rectWidth + gap);
        const targetY = gap + targetRow * (rectHeight + gap);
        const scaleToFitWidth = windowWidth / rectWidth;
        const scaleToFitHeight = windowHeight / rectHeight;
        const maxScale = Math.max(scaleToFitWidth, scaleToFitHeight);
        const imageCenterX = targetX + rectWidth / 2;
        const imageCenterY = targetY + rectHeight / 2;
        const screenCenterX = windowWidth / 2;
        const screenCenterY = windowHeight / 2;
        const maxOffsetX = screenCenterX - imageCenterX;
        const maxOffsetY = screenCenterY - imageCenterY;
        
        function animate(currentTime) {
            if (startTime === 0) startTime = currentTime;
            
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Use optimized easing lookup
            const easeProgress = progress === 0 || progress === 1 
                ? progress 
                : cubicBezierLookup(progress, 'zoomEasing');
            
            animationState.zoomProgress = easeProgress;
            
            // Use pre-calculated values for better performance
            animationState.zoomScale = 1 + (maxScale - 1) * easeProgress;
            animationState.zoomOffsetX = maxOffsetX * easeProgress;
            animationState.zoomOffsetY = maxOffsetY * easeProgress;
            
            // Redraw the scene with seamless transition logic
            if (easeProgress >= 0.98) {
                // Near completion: ensure pixel-perfect transition
                drawSeamlessTransition(easeProgress, targetColumn, targetRow);
            } else {
                drawRectangles();
            }
            
            if (progress < 1) {
                requestAnimationFrame(animate);
            } else {
                // Frame-perfect handoff to single image mode
                seamlessSwitchToSingleImageMode(targetColumn, targetRow);
            }
        }
        
        requestAnimationFrame(animate);
    }

    function drawSeamlessTransition(easeProgress, targetColumn, targetRow) {
        // Get the target image
        const targetImageIndex = targetColumn * rows + targetRow;
        const targetImage = images[targetImageIndex];
        
        if (!targetImage || !targetImage.complete) {
            drawRectangles(); // Fallback
            return;
        }
        
        // Clear canvas once
        context.clearRect(0, 0, windowWidth, windowHeight);
        
        // At 98%+ completion, render exactly as single image will render
        // This ensures pixel-perfect continuity
        if (easeProgress >= 0.99) {
            // Render exactly as drawSingleImage() will
            const { sx, sy, sWidth, sHeight } = getCropCoordinates(targetImage, windowWidth, windowHeight);
            
            context.drawImage(
                targetImage,
                sx, sy, sWidth, sHeight,
                0, 0, windowWidth, windowHeight
            );
        } else {
            // Transition factor (0 at 0.98 progress, 1 at 0.99 progress)
            const transitionFactor = (easeProgress - 0.98) / 0.01;
            
            // Use cached layout calculations
            const { gap, rectWidth, rectHeight } = layoutCache;
            const targetX = gap + targetColumn * (rectWidth + gap);
            const targetY = gap + targetRow * (rectHeight + gap);
            
            // Use pre-calculated zoom values from animationState
            const finalScale = animationState.zoomScale;
            const finalOffsetX = animationState.zoomOffsetX;
            const finalOffsetY = animationState.zoomOffsetY;
            
            // Draw the zoomed rectangle version
            context.save();
            context.translate(finalOffsetX, finalOffsetY);
            context.translate(targetX + rectWidth / 2, targetY + rectHeight / 2);
            context.scale(finalScale, finalScale);
            context.translate(-(targetX + rectWidth / 2), -(targetY + rectHeight / 2));
            
            // Use cached crop coordinates
            const { sx: rectSx, sy: rectSy, sWidth: rectSWidth, sHeight: rectSHeight } = getCropCoordinates(targetImage, rectWidth, rectHeight);
            
            context.globalAlpha = 1 - transitionFactor;
            context.drawImage(
                targetImage,
                rectSx, rectSy, rectSWidth, rectSHeight,
                targetX, targetY, rectWidth, rectHeight
            );
            
            context.restore();
            
            // Overlay the single image version
            context.globalAlpha = transitionFactor;
            const { sx: fullSx, sy: fullSy, sWidth: fullSWidth, sHeight: fullSHeight } = getCropCoordinates(targetImage, windowWidth, windowHeight);
            
            context.drawImage(
                targetImage,
                fullSx, fullSy, fullSWidth, fullSHeight,
                0, 0, windowWidth, windowHeight
            );
            
            context.globalAlpha = 1; // Reset alpha
        }
    }

    function seamlessSwitchToSingleImageMode(targetColumn, targetRow) {
        // Verify transition state before proceeding
        if (!verifyTransitionState(targetColumn, targetRow)) {
            console.warn('Seamless transition verification failed, falling back to standard transition');
            switchToSingleImageMode(targetColumn, targetRow);
            return;
        }
        
        // Set single image mode using the center image that was zoomed (column 2, row 1 = index 9)
        const targetImageIndex = targetColumn * rows + targetRow; // 2 * 4 + 1 = 9
        const targetImage = images[targetImageIndex];
        
        // CRITICAL: Set up state before any rendering to ensure seamless transition
        animationState.isSingleImageMode = true;
        animationState.singleImage = targetImage;
        
        // Reset animation state
        animationState.isZooming = false;
        animationState.isAnimating = false;
        animationState.animationType = 'none';
        
        // IMMEDIATE seamless draw - no delay, use same frame
        // The last frame of the zoom animation should be identical to this
        requestAnimationFrame(() => {
            drawSingleImage();
            
            // Only initialize navigation after confirming seamless visual transition
            requestAnimationFrame(() => {
                if (window.navigationCarousel) {
                    window.navigationCarousel.showCurrentText();
                }
            });
        });
    }

    // Legacy function kept for compatibility - fallback implementation
    function switchToSingleImageMode(targetColumn, targetRow) {
        // Set single image mode using the center image that was zoomed
        const targetImageIndex = targetColumn * rows + targetRow;
        animationState.isSingleImageMode = true;
        animationState.singleImage = images[targetImageIndex];
        
        // Reset animation state
        animationState.isZooming = false;
        animationState.isAnimating = false;
        animationState.animationType = 'none';
        
        // Draw the single image
        drawSingleImage();
        
        // Initialize navigation carousel after zoom completes
        setTimeout(() => {
            if (window.navigationCarousel) {
                window.navigationCarousel.showCurrentText();
            }
        }, 100);
    }

    function drawSingleImage() {
        // Clear the canvas
        context.clearRect(0, 0, windowWidth, windowHeight);
        
        if (animationState.singleImage && animationState.singleImage.complete) {
            // Use cached crop coordinates for consistent rendering with zoom transition
            const img = animationState.singleImage;
            const { sx, sy, sWidth, sHeight } = getCropCoordinates(img, windowWidth, windowHeight);

            context.drawImage(
                img,
                sx, sy, sWidth, sHeight,
                0, 0, windowWidth, windowHeight
            );
        }
    }

    function getColumnImages(columnIndex) {
        if (columnIndex < 0 || columnIndex >= cols) {
            console.error('Invalid column index. Must be between 0 and', cols - 1);
            return null;
        }
        
        const gap = Math.min(windowWidth, windowHeight) / 50;
        const rectWidth = (windowWidth - (cols + 1) * gap) / cols;
        const rectHeight = (windowHeight - (rows + 1) * gap) / rows;
        
        const columnImages = [];
        const columnPositions = [];
        
        // Calculate which images belong to this column
        for (let j = 0; j < rows; j++) {
            const imageIndex = columnIndex * rows + j;
            const x = gap + columnIndex * (rectWidth + gap);
            const y = gap + j * (rectHeight + gap);
            
            columnImages.push(images[imageIndex]);
            columnPositions.push({
                x: x,
                y: y,
                width: rectWidth,
                height: rectHeight,
                imageIndex: imageIndex,
                columnIndex: columnIndex,
                rowIndex: j
            });
        }
        
        return {
            images: columnImages,
            positions: columnPositions,
            columnIndex: columnIndex
        };
    }

    // Debounced resize handler
    const debouncedResize = debounce(handleResize, 150);

    // Navigation Carousel Functionality
    class NavigationCarousel {
        constructor() {
            this.currentIndex = 0;
            this.previousIndex = 0;
            this.items = document.querySelectorAll('.navigation-item');
            this.totalItems = this.items.length;
            this.imageTransition = {
                isTransitioning: false,
                direction: 'right',
                progress: 0
            };
            this.isTextVisible = false;
            
            // Cache DOM elements for performance
            this.carouselElement = document.querySelector('.navigation-carousel');
            
            // Performance optimization: Cache layout and image lookup results
            this.layoutCache = null;
            this.imageIndexCache = {};
            this.imageCache = {};
            
            this.init();
        }

        init() {
            this.bindEvents();
            this.hideAllText(); // Start with text hidden
        }

        bindEvents() {
            // Previous/Next buttons
            document.addEventListener('click', (e) => {
                if (e.target.classList.contains('nav-prev')) {
                    e.preventDefault();
                    this.previous();
                } else if (e.target.classList.contains('nav-next')) {
                    e.preventDefault();
                    this.next();
                }
            });

            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.target.closest('.navigation-carousel')) {
                    switch(e.key) {
                        case 'ArrowLeft':
                            e.preventDefault();
                            this.previous();
                            break;
                        case 'ArrowRight':
                            e.preventDefault();
                            this.next();
                            break;
                        case 'Home':
                            e.preventDefault();
                            this.goToSlide(0, 'left');
                            break;
                        case 'End':
                            e.preventDefault();
                            this.goToSlide(this.totalItems - 1, 'right');
                            break;
                    }
                }
            });

            // Auto-advance disabled per user request
            // this.startAutoAdvance();
        }

        hideAllText() {
            // Start fade out animation
            const carousel = document.querySelector('.navigation-carousel');
            if (carousel) {
                carousel.classList.remove('show');
                
                // After fade out completes, hide individual items and set display none
                setTimeout(() => {
                    if (!carousel.classList.contains('show')) {
                        this.items.forEach(item => {
                            item.classList.add('hidden');
                        });
                        carousel.style.display = 'none';
                    }
                }, 150); // Match CSS transition duration
            }
            
            this.isTextVisible = false;
        }

        showCurrentText() {
            const carousel = this.carouselElement;
            if (!carousel) return;
            
            // Batch DOM operations to minimize reflows
            const currentItem = this.items[this.currentIndex];
            
            // Single batch update: hide all items and show current
            this.items.forEach((item, index) => {
                if (index === this.currentIndex) {
                    item.classList.remove('hidden');
                    item.setAttribute('aria-current', 'page');
                } else {
                    item.classList.add('hidden');
                    item.removeAttribute('aria-current');
                }
            });
            
            // Optimized show sequence - single reflow
            carousel.classList.remove('show');
            carousel.style.display = 'block';
            
            // Single requestAnimationFrame is sufficient for modern browsers
            requestAnimationFrame(() => {
                carousel.classList.add('show');
            });
            
            this.isTextVisible = true;
        }

        previous() {
            if (this.imageTransition.isTransitioning) return;
            
            // Add transition lock to prevent multiple rapid clicks
            this.imageTransition.isTransitioning = true;
            
            this.hideAllText();
            this.previousIndex = this.currentIndex;
            this.currentIndex = (this.currentIndex - 1 + this.totalItems) % this.totalItems;
            
            // Start transition after fade out begins
            setTimeout(() => {
                this.startCenterImageTransition('left');
            }, 100);
        }

        next() {
            if (this.imageTransition.isTransitioning) return;
            
            // Add transition lock to prevent multiple rapid clicks
            this.imageTransition.isTransitioning = true;
            
            this.hideAllText();
            this.previousIndex = this.currentIndex;
            this.currentIndex = (this.currentIndex + 1) % this.totalItems;
            
            // Start transition after fade out begins
            setTimeout(() => {
                this.startCenterImageTransition('right');
            }, 100);
        }

        goToSlide(index, direction = 'right') {
            if (index >= 0 && index < this.totalItems && index !== this.currentIndex && !this.imageTransition.isTransitioning) {
                // Add transition lock to prevent multiple rapid clicks
                this.imageTransition.isTransitioning = true;
                
                this.hideAllText();
                this.previousIndex = this.currentIndex;
                this.currentIndex = index;
                
                // Start transition after fade out begins
                setTimeout(() => {
                    this.startCenterImageTransition(direction);
                }, 100);
            }
        }

        startCenterImageTransition(direction) {
            // isTransitioning is already set by the calling method
            this.imageTransition.direction = direction;
            this.imageTransition.progress = 0;

            const duration = 800;
            let startTime = 0;

            const animate = (currentTime) => {
                if (startTime === 0) startTime = currentTime;
                
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                // Use optimized easing lookup
                const easeProgress = progress === 0 || progress === 1 
                    ? progress 
                    : cubicBezierLookup(progress, 'transitionEasing');
                
                this.imageTransition.progress = easeProgress;
                
                // Redraw with transition
                this.drawCenterImageTransition();
                
                if (progress < 1) {
                    requestAnimationFrame(animate);
                } else {
                    this.imageTransition.isTransitioning = false;
                    this.imageTransition.progress = 0;
                    
                    // Update single image if in single image mode
                    if (animationState.isSingleImageMode) {
                        animationState.singleImage = this.getCenterImageForIndex(this.currentIndex);
                        drawSingleImage();
                    }
                    
                    // Show text immediately when transition completes
                    this.showCurrentText();
                }
            };

            requestAnimationFrame(animate);
        }

        drawCenterImageTransition() {
            // Clear only once at the start
            context.clearRect(0, 0, windowWidth, windowHeight);
            
            // Only draw static background images if not in single image mode
            if (!animationState.isSingleImageMode) {
                // Draw static background images (all except center)
                this.drawStaticImages();
            }
            
            // Draw transitioning center image
            this.drawTransitioningCenterImage();
        }

        drawStaticImages() {
            // Use global layout cache instead of local cache
            updateLayoutCache();
            const { rectWidth, rectHeight } = layoutCache;
            
            // Calculate static positions (excluding center image at column 2, row 1)
            if (!this.staticPositions || 
                this.staticPositions.windowWidth !== windowWidth || 
                this.staticPositions.windowHeight !== windowHeight) {
                
                this.staticPositions = {
                    windowWidth,
                    windowHeight,
                    positions: []
                };
                
                // Build static positions from global cache, excluding center
                for (let posIndex = 0; posIndex < layoutCache.positions.length; posIndex++) {
                    const pos = layoutCache.positions[posIndex];
                    // Skip center image (column 2, row 1)
                    if (pos.column === 2 && pos.row === 1) continue;
                    
                    this.staticPositions.positions.push(pos);
                }
            }
            
            // Draw all static images efficiently
            context.globalAlpha = 1.0;
            for (const pos of this.staticPositions.positions) {
                const img = images[pos.imageIndex];
                if (img && img.complete) {
                    this.drawImageWithCover(img, pos.x, pos.y, rectWidth, rectHeight);
                }
            }
        }

        drawTransitioningCenterImage() {
            // If we're in single image mode, use cover animation
            if (animationState.isSingleImageMode) {
                // Get images for transition
                const previousImage = this.getCenterImageForIndex(this.previousIndex);
                const currentImage = this.getCenterImageForIndex(this.currentIndex);
                
                // Draw the previous image with strong parallax movement
                if (previousImage && previousImage.complete) {
                    // Calculate parallax offset based on direction
                    let parallaxOffset = 0;
                    if (this.imageTransition.direction === 'right') {
                        // New image coming from right, previous should move left
                        parallaxOffset = -120 * this.imageTransition.progress;
                    } else {
                        // New image coming from left, previous should move right
                        parallaxOffset = 120 * this.imageTransition.progress;
                    }
                    
                    // Optimize: draw with offset without save/restore for performance
                    this.drawImageFullScreenWithOffset(previousImage, parallaxOffset, 0);
                }
                
                // Calculate cover animation offset with parallax for the new image
                const offsetDistance = windowWidth;
                let coverOffset = 0;
                let parallaxOffsetNew = 0;
                
                if (this.imageTransition.direction === 'right') {
                    // New image slides in from right, covering the previous image
                    coverOffset = offsetDistance * (1 - this.imageTransition.progress);
                    // Add parallax effect: new image moves slightly faster (additional 80px movement)
                    parallaxOffsetNew = 80 * (1 - this.imageTransition.progress);
                } else {
                    // New image slides in from left, covering the previous image
                    coverOffset = -offsetDistance * (1 - this.imageTransition.progress);
                    // Add parallax effect: new image moves slightly faster (additional 80px movement)
                    parallaxOffsetNew = -80 * (1 - this.imageTransition.progress);
                }
                
                // Draw current image sliding in with parallax effect
                if (currentImage && currentImage.complete) {
                    this.drawImageFullScreenWithOffset(currentImage, coverOffset + parallaxOffsetNew, 0);
                }
            } else {
                // Original logic for non-single image mode (shouldn't happen after zoom)
                const gap = Math.min(windowWidth, windowHeight) / 50;
                const rectWidth = (windowWidth - (cols + 1) * gap) / cols;
                const rectHeight = (windowHeight - (rows + 1) * gap) / rows;
                
                // Center image position (column 2, row 1)
                const centerX = gap + 2 * (rectWidth + gap);
                const centerY = gap + 1 * (rectHeight + gap);
                
                // Get images for transition
                const previousImage = this.getCenterImageForIndex(this.previousIndex);
                const currentImage = this.getCenterImageForIndex(this.currentIndex);
                
                // Draw previous center image with strong parallax movement
                if (previousImage && previousImage.complete) {
                    // Calculate parallax offset based on direction
                    let parallaxOffset = 0;
                    if (this.imageTransition.direction === 'right') {
                        // New image coming from right, previous should move left
                        parallaxOffset = -80 * this.imageTransition.progress;
                    } else {
                        // New image coming from left, previous should move right
                        parallaxOffset = 80 * this.imageTransition.progress;
                    }
                    
                    context.save();
                    context.translate(parallaxOffset, 0);
                    this.drawImageWithCover(previousImage, centerX, centerY, rectWidth, rectHeight);
                    context.restore();
                }
                
                // Calculate cover animation offset with parallax for the new image
                const offsetDistance = windowWidth;
                let coverOffset = 0;
                let parallaxOffsetNew = 0;
                
                if (this.imageTransition.direction === 'right') {
                    coverOffset = offsetDistance * (1 - this.imageTransition.progress);
                    // Add parallax effect: new image moves slightly faster (additional 60px movement)
                    parallaxOffsetNew = 60 * (1 - this.imageTransition.progress);
                } else {
                    coverOffset = -offsetDistance * (1 - this.imageTransition.progress);
                    // Add parallax effect: new image moves slightly faster (additional 60px movement)
                    parallaxOffsetNew = -60 * (1 - this.imageTransition.progress);
                }
                
                // Draw current center image sliding in with parallax effect
                if (currentImage && currentImage.complete) {
                    context.save();
                    context.translate(coverOffset + parallaxOffsetNew, 0);
                    this.drawImageWithCover(currentImage, centerX, centerY, rectWidth, rectHeight);
                    context.restore();
                }
            }
        }

        getCenterImageForIndex(pageIndex) {
            // Cache lookup results to avoid repeated DOM queries
            if (!this.imageIndexCache) this.imageIndexCache = {};
            if (this.imageIndexCache[pageIndex] !== undefined) {
                return this.imageIndexCache[pageIndex];
            }
            
            const navItem = this.items[pageIndex];
            if (navItem) {
                const dataImage = navItem.getAttribute('data-image');
                let resultImage;
                
                // Check if it's a URL (contains http, https, or starts with /)
                if (dataImage && (dataImage.includes('http') || dataImage.startsWith('/'))) {
                    // Check cache first for URL images
                    const cachedImg = this.imageCache && this.imageCache[dataImage];
                    if (cachedImg && cachedImg.complete) {
                        resultImage = cachedImg;
                    } else {
                        // Create new image and cache it
                        const img = new Image();
                        img.src = dataImage;
                        
                        if (!this.imageCache) this.imageCache = {};
                        this.imageCache[dataImage] = img;
                        
                        img.onload = () => {
                            // Clear cache to force refresh
                            delete this.imageIndexCache[pageIndex];
                            // Redraw if this is the current image
                            if (animationState.isSingleImageMode && 
                                animationState.singleImage === img) {
                                drawSingleImage();
                            }
                        };
                        
                        resultImage = img;
                    }
                } else {
                    // Original behavior: treat as image index
                    const imageIndex = parseInt(dataImage);
                    resultImage = images[imageIndex] || images[0];
                }
                
                // Cache the result for future lookups
                this.imageIndexCache[pageIndex] = resultImage;
                return resultImage;
            }
            
            // Fallback to first image if not found
            const fallback = images[0];
            this.imageIndexCache[pageIndex] = fallback;
            return fallback;
        }

        drawImageFullScreenWithOffset(img, offsetX, offsetY) {
            // Optimized full-screen drawing with offset, avoiding save/restore
            const imgAspect = img.width / img.height;
            const screenAspect = windowWidth / windowHeight;
            let sx, sy, sWidth, sHeight;
            
            if (imgAspect > screenAspect) {
                sHeight = img.height;
                sWidth = windowWidth * (img.height / windowHeight);
                sx = (img.width - sWidth) / 2;
                sy = 0;
            } else {
                sWidth = img.width;
                sHeight = windowHeight * (img.width / windowWidth);
                sx = 0;
                sy = (img.height - sHeight) / 2;
            }
            
            context.drawImage(
                img,
                sx, sy, sWidth, sHeight,
                offsetX, offsetY, windowWidth, windowHeight
            );
        }

        drawImageWithCover(img, x, y, width, height) {
            // Use global crop cache for better performance
            const { sx, sy, sWidth, sHeight } = getCropCoordinates(img, width, height);

            context.drawImage(
                img,
                sx, sy, sWidth, sHeight,
                x, y, width, height
            );
        }

        drawImageFullScreen(img) {
            // Use global crop cache for consistent performance
            const { sx, sy, sWidth, sHeight } = getCropCoordinates(img, windowWidth, windowHeight);

            context.drawImage(
                img,
                sx, sy, sWidth, sHeight,
                0, 0, windowWidth, windowHeight
            );
        }


    }

    // Initial setup
    document.addEventListener('DOMContentLoaded', function() {
        // Build easing lookup tables for performance
        buildBezierLookupTable();
        
        // Initialize image preloading and animation
        preloadImages();
        setTimeout(animateIntro(), 1500);
        
        // Initialize navigation carousel (store globally for later access)
        setTimeout(() => {
            window.navigationCarousel = new NavigationCarousel();
            const switchBtn = document.getElementById("switchNavigation");
            switchBtn.classList.remove('translate-y-24', 'opacity-0');
            switchBtn.classList.add('translate-y-0', 'opacity-100');
        }, 5000); // Start after zoom animation completes
    });

    // Handle window resize and mobile viewport changes
    window.addEventListener('resize', debouncedResize);
    
    // Handle mobile viewport changes (iOS Safari, etc.)
    if (window.visualViewport) {
        window.visualViewport.addEventListener('resize', debouncedResize);
    }
    
    // Handle orientation changes on mobile
    window.addEventListener('orientationchange', () => {
        setTimeout(debouncedResize, 100); // Small delay for orientation to complete
    });

</script>