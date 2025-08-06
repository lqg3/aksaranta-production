@extends('layouts.homepage')

@section('content')
<div id="loading-screen" class="fixed inset-0 w-screen h-screen flex items-center justify-center z-[1000] transition-opacity duration-500 opacity-100">
    <div id="loading-text" class="text-md text-white">0%</div>
</div>
<style>
    #loading-screen.fade-out {
        opacity: 0 !important;
        pointer-events: none;
    }
</style>

<canvas id="canvas" class="fixed z-[-500] "></canvas>
<!-- 10% dark overlay over canvas -->
<div class="fixed inset-0 pointer-events-none z-[-400]"></div>
<nav class="navigation-carousel text-center text-5xl" role="navigation" aria-label="Main navigation">
    <div class="navigation-container">
        <!-- Navigation Item 0: Budaya Batak - Image 9 (center from zoom: column 2, row 1) -->
        <div class="navigation-item font-extralight transition-all ease-in-out duration-300 hidden" 
             data-index="0" data-image="9"
             role="listitem">
            <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                    aria-label="Previous navigation item" 
                    data-direction="prev">
                ←
            </button>
            <a class="nav-link hover:underline hover:decoration-2" 
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
        <div class="navigation-item font-extralight transition-all ease-in-out duration-300 hidden" 
             data-index="1" data-image="25"
             role="listitem">
            <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                    aria-label="Previous navigation item" 
                    data-direction="prev">
                ←
            </button>
            <a class="nav-link hover:underline hover:decoration-2" 
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
        <div class="navigation-item font-extralight transition-all ease-in-out duration-300 hidden" 
             data-index="2" data-image="27"
             role="listitem">
            <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                    aria-label="Previous navigation item" 
                    data-direction="prev">
                ←
            </button>
            <a class="nav-link hover:underline hover:decoration-2" 
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
        <div class="navigation-item font-extralight transition-all ease-in-out duration-300 hidden" 
             data-index="3" data-image="26"
             role="listitem">
            <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                    aria-label="Previous navigation item" 
                    data-direction="prev">
                ←
            </button>
            <a class="nav-link hover:underline hover:decoration-2" 
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
        <div class="navigation-item font-extralight transition-all ease-in-out duration-300 hidden" 
             data-index="4" data-image="28"
             role="listitem">
            <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                    aria-label="Previous navigation item" 
                    data-direction="prev">
                ←
            </button>
            <a class="nav-link hover:underline hover:decoration-2" 
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
        <div class="navigation-item font-extralight transition-all ease-in-out duration-300 hidden" 
             data-index="5" data-image="29"
             role="listitem">
            <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                    aria-label="Previous navigation item" 
                    data-direction="prev">
                ←
            </button>
            <a class="nav-link hover:underline hover:decoration-2" 
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
        <div class="navigation-item font-extralight transition-all ease-in-out duration-300 hidden" 
             data-index="6" data-image="30"
             role="listitem">
            <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                    aria-label="Previous navigation item" 
                    data-direction="prev">
                ←
            </button>
            <a class="nav-link hover:underline hover:decoration-2" 
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
        <div class="navigation-item font-extralight transition-all ease-in-out duration-300 hidden" 
             data-index="7" data-image="31"
             role="listitem">
            <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                    aria-label="Previous navigation item" 
                    data-direction="prev">
                ←
            </button>
            <a class="nav-link hover:underline hover:decoration-2" 
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
        <div class="navigation-item font-extralight transition-all ease-in-out duration-300 hidden" 
             data-index="8" data-image="32"
             role="listitem">
            <button class="nav-control nav-prev hover:underline hover:decoration-2 text-3xl mr-8" 
                    aria-label="Previous navigation item" 
                    data-direction="prev">
                ←
            </button>
            <a class="nav-link hover:underline hover:decoration-2" 
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

<script>
    const canvas = document.getElementById('canvas');
    const context = canvas.getContext('2d');

    var windowWidth = window.innerWidth;
    var windowHeight = window.innerHeight;

    canvas.width = windowWidth;
    canvas.height = windowHeight;

    context.fillStyle = 'rgba(255, 255, 255, 0.5)';

    const cols = 5;
    const rows = 4;
    const totalImages = 33;

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

        const gap = Math.min(windowWidth, windowHeight) / 50;
        const rectWidth = (windowWidth - (cols + 1) * gap) / cols;
        const rectHeight = (windowHeight - (rows + 1) * gap) / rows;

        // Clear the canvas
        context.clearRect(0, 0, windowWidth, windowHeight);

        // Apply zoom transformation if zooming
        if (animationState.isZooming) {
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

        let imageIndex = 0;
        for (let i = 0; i < cols; i++) {
            for (let j = 0; j < rows; j++) {
                const x = gap + i * (rectWidth + gap);
                let y;
                
                // Calculate target position (center grid)
                const targetY = gap + j * (rectHeight + gap);
                
                if (animationState.isAnimating && animationState.animationType === 'slideIn' && 
                    animationState.imageOffsets[i] && animationState.imageOffsets[i][j] !== undefined) {
                    // Apply individual image offset for slide-in animation
                    y = targetY + animationState.imageOffsets[i][j];
                } else if (!animationState.isAnimating) {
                    // Final positions - center grid
                    y = targetY;
                } else {
                    // Fallback to staging positions if needed
                    if (i % 2 === 0) {
                        // Even columns (0, 2, 4) - position at bottom of frame
                        y = windowHeight + gap + j * (rectHeight + gap);
                    } else {
                        // Odd columns (1, 3) - position at top of frame
                        y = -(rectHeight * rows + gap * (rows + 1)) + gap + j * (rectHeight + gap);
                    }
                }
                
                const img = images[imageIndex];
                imageIndex++;

                if (img && img.complete) {
                    // Set opacity to 100% (no opacity animation)
                    context.globalAlpha = 1.0;

                    // Draw the image with object-fit: cover effect
                    // Calculate aspect ratios
                    const imgAspect = img.width / img.height;
                    const rectAspect = rectWidth / rectHeight;
                    let sx, sy, sWidth, sHeight;

                    if (imgAspect > rectAspect) {
                        // Image is wider than rect: crop sides
                        sHeight = img.height;
                        sWidth = rectWidth * (img.height / rectHeight);
                        sx = (img.width - sWidth) / 2;
                        sy = 0;
                    } else {
                        // Image is taller than rect: crop top/bottom
                        sWidth = img.width;
                        sHeight = rectHeight * (img.width / rectWidth);
                        sx = 0;
                        sy = (img.height - sHeight) / 2;
                    }

                    context.drawImage(
                        img,
                        sx, sy, sWidth, sHeight,
                        x, y, rectWidth, rectHeight
                    );
                }
            }
        }
        
        // Restore canvas state if we applied zoom transformation
        if (animationState.isZooming) {
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
        windowWidth = window.innerWidth;
        windowHeight = window.innerHeight;
        
        canvas.width = windowWidth;
        canvas.height = windowHeight;
        
        // Redraw with new dimensions
        drawRectangles();
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
        
        // Initialize 2D array for image offsets [column][row]
        animationState.imageOffsets = [];
        for (let i = 0; i < cols; i++) {
            animationState.imageOffsets[i] = [];
            for (let j = 0; j < rows; j++) {
                // Calculate initial offset for each image
                const gap = Math.min(windowWidth, windowHeight) / 50;
                const rectHeight = (windowHeight - (rows + 1) * gap) / rows;
                
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

    // Proper cubic bezier timing function implementation
    function cubicBezier(x, p1x, p1y, p2x, p2y) {
        // For CSS cubic-bezier timing functions, we need to solve for t given x
        // Then return the corresponding y value
        
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
        const t = solveCubicBezierX(x, p1x, p2x);
        
        // Calculate and return the y value for that t
        const y = 3 * (1 - t) * (1 - t) * t * p1y + 
                3 * (1 - t) * t * t * p2y + 
                t * t * t;
        
        return y;
    }

    function animateImageSlideIn(columnIndex, rowIndex) {
        const duration = 1500; // 2800ms animation duration (2 seconds slower)
        const startTime = Date.now();
        
        // Calculate initial and final positions
        const gap = Math.min(windowWidth, windowHeight) / 50;
        const rectHeight = (windowHeight - (rows + 1) * gap) / rows;
        
        let startOffset;
        if (columnIndex % 2 === 0) {
            // Even columns start below screen
            startOffset = windowHeight + gap;
        } else {
            // Odd columns start above screen
            startOffset = -(rectHeight * rows + gap * (rows + 1));
        }
        
        function animate() {
            const elapsed = Date.now() - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Custom cubic-bezier easing function
            let easeProgress;
            if (progress === 0) {
                easeProgress = 0;
            } else if (progress === 1) {
                easeProgress = 1;
            } else {
                // Check if this is the center first image (column 2, row 0)
                if (columnIndex === 2 && rowIndex === 0) {
                    // Special easing for center first image: cubic-bezier(.89,.01,.26,.90)
                    easeProgress = cubicBezier(progress, 0.89, 0.01, 0.26, 0.80);
                } else {
                    // Default easing for all other images: cubic-bezier(.5,.26,.25,1)
                    easeProgress = cubicBezier(progress, 0.5, 0.26, 0.25, 1);
                }
            }
            
            // Animate from start offset to 0 (final position)
            animationState.imageOffsets[columnIndex][rowIndex] = startOffset * (1 - easeProgress);
            
            // Redraw the scene
            drawRectangles();
            
            if (progress < 1) {
                requestAnimationFrame(animate);
            } else {
                // Check if all images are done animating
                let allImagesAtFinalPosition = true;
                for (let i = 0; i < cols; i++) {
                    for (let j = 0; j < rows; j++) {
                        if (Math.abs(animationState.imageOffsets[i][j]) >= 1) {
                            allImagesAtFinalPosition = false;
                            break;
                        }
                    }
                    if (!allImagesAtFinalPosition) break;
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
        
        const duration = 4000; // 4 second zoom animation
        const startTime = Date.now();
        
        function animate() {
            const elapsed = Date.now() - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Aggressive easing for zoom: cubic-bezier(.89,.01,.26,.90)
            const easeProgress = cubicBezier(progress, 0.89, 0.01, 0.26, 0.90);
            
            animationState.zoomProgress = easeProgress;
            
            // Calculate zoom scale and offsets
            const gap = Math.min(windowWidth, windowHeight) / 50;
            const rectWidth = (windowWidth - (cols + 1) * gap) / cols;
            const rectHeight = (windowHeight - (rows + 1) * gap) / rows;
            
            // Target image position
            const targetX = gap + targetColumn * (rectWidth + gap);
            const targetY = gap + targetRow * (rectHeight + gap);
            
            // Calculate how much we need to scale to fill the screen
            const scaleToFitWidth = windowWidth / rectWidth;
            const scaleToFitHeight = windowHeight / rectHeight;
            const maxScale = Math.max(scaleToFitWidth, scaleToFitHeight);
            
            // Animate scale from 1 to maxScale
            animationState.zoomScale = 1 + (maxScale - 1) * easeProgress;
            
            // Calculate offsets to center the zoomed image
            const imageCenterX = targetX + rectWidth / 2;
            const imageCenterY = targetY + rectHeight / 2;
            const screenCenterX = windowWidth / 2;
            const screenCenterY = windowHeight / 2;
            
            animationState.zoomOffsetX = (screenCenterX - imageCenterX) * easeProgress;
            animationState.zoomOffsetY = (screenCenterY - imageCenterY) * easeProgress;
            
            // Redraw the scene
            if (easeProgress >= 0.95) {
                // Near the end of zoom, start rendering as single image for seamless transition
                drawZoomToSingleTransition(easeProgress, targetColumn, targetRow);
            } else {
                drawRectangles();
            }
            
            if (progress < 1) {
                requestAnimationFrame(animate);
            } else {
                // At the end of zoom, switch to single image mode seamlessly
                // Skip the final drawRectangles call to avoid any visual inconsistency
                switchToSingleImageMode(targetColumn, targetRow);
            }
        }
        
        requestAnimationFrame(animate);
    }

    function drawZoomToSingleTransition(easeProgress, targetColumn, targetRow) {
        // Transition factor (0 at 0.95 progress, 1 at 1.0 progress)
        const transitionFactor = Math.min((easeProgress - 0.95) / 0.05, 1);
        
        // Get the target image
        const targetImageIndex = targetColumn * rows + targetRow;
        const targetImage = images[targetImageIndex];
        
        if (!targetImage || !targetImage.complete) {
            drawRectangles(); // Fallback
            return;
        }
        
        // Clear canvas
        context.clearRect(0, 0, windowWidth, windowHeight);
        
        // Calculate zoom rectangle dimensions and position
        const gap = Math.min(windowWidth, windowHeight) / 50;
        const rectWidth = (windowWidth - (cols + 1) * gap) / cols;
        const rectHeight = (windowHeight - (rows + 1) * gap) / rows;
        const targetX = gap + targetColumn * (rectWidth + gap);
        const targetY = gap + targetRow * (rectHeight + gap);
        
        // Calculate final zoom transform
        const scaleToFitWidth = windowWidth / rectWidth;
        const scaleToFitHeight = windowHeight / rectHeight;
        const maxScale = Math.max(scaleToFitWidth, scaleToFitHeight);
        
        const imageCenterX = targetX + rectWidth / 2;
        const imageCenterY = targetY + rectHeight / 2;
        const screenCenterX = windowWidth / 2;
        const screenCenterY = windowHeight / 2;
        
        const finalScale = 1 + (maxScale - 1) * easeProgress;
        const finalOffsetX = (screenCenterX - imageCenterX) * easeProgress;
        const finalOffsetY = (screenCenterY - imageCenterY) * easeProgress;
        
        // Blend between zoomed rectangle rendering and full-screen single image rendering
        if (transitionFactor < 1) {
            // Draw the zoomed rectangle version
            context.save();
            context.translate(finalOffsetX, finalOffsetY);
            context.translate(imageCenterX, imageCenterY);
            context.scale(finalScale, finalScale);
            context.translate(-imageCenterX, -imageCenterY);
            
            // Calculate crop for rectangle
            const imgAspect = targetImage.width / targetImage.height;
            const rectAspect = rectWidth / rectHeight;
            let sx, sy, sWidth, sHeight;
            
            if (imgAspect > rectAspect) {
                sHeight = targetImage.height;
                sWidth = rectWidth * (targetImage.height / rectHeight);
                sx = (targetImage.width - sWidth) / 2;
                sy = 0;
            } else {
                sWidth = targetImage.width;
                sHeight = rectHeight * (targetImage.width / rectWidth);
                sx = 0;
                sy = (targetImage.height - sHeight) / 2;
            }
            
            context.drawImage(
                targetImage,
                sx, sy, sWidth, sHeight,
                targetX, targetY, rectWidth, rectHeight
            );
            
            context.restore();
        }
        
        // If transitioning, also draw the single image version with opacity
        if (transitionFactor > 0) {
            context.globalAlpha = transitionFactor;
            
            // Draw full-screen single image
            const imgAspect = targetImage.width / targetImage.height;
            const screenAspect = windowWidth / windowHeight;
            let sx, sy, sWidth, sHeight;
            
            if (imgAspect > screenAspect) {
                sHeight = targetImage.height;
                sWidth = windowWidth * (targetImage.height / windowHeight);
                sx = (targetImage.width - sWidth) / 2;
                sy = 0;
            } else {
                sWidth = targetImage.width;
                sHeight = windowHeight * (targetImage.width / windowWidth);
                sx = 0;
                sy = (targetImage.height - sHeight) / 2;
            }
            
            context.drawImage(
                targetImage,
                sx, sy, sWidth, sHeight,
                0, 0, windowWidth, windowHeight
            );
            
            context.globalAlpha = 1; // Reset alpha
        }
    }

    function switchToSingleImageMode(targetColumn, targetRow) {
        // Set single image mode using the center image that was zoomed (column 2, row 1 = index 9)
        const targetImageIndex = targetColumn * rows + targetRow; // 2 * 4 + 1 = 9
        animationState.isSingleImageMode = true;
        animationState.singleImage = images[targetImageIndex]; // This matches the first navigation item
        
        // Reset animation state
        animationState.isZooming = false;
        animationState.isAnimating = false;
        animationState.animationType = 'none';
        
        // Draw the single image (this should be seamless since it's the same image that was zoomed)
        drawSingleImage();
        
        // Initialize navigation carousel after zoom completes
        setTimeout(() => {
            if (window.navigationCarousel) {
                window.navigationCarousel.showCurrentText();
            }
        }, 1000); // Increased delay to ensure zoom is completely finished
    }

    function drawSingleImage() {
        // Clear the canvas
        context.clearRect(0, 0, windowWidth, windowHeight);
        
        if (animationState.singleImage && animationState.singleImage.complete) {
            // Draw the image to fill the entire screen with cover effect
            const img = animationState.singleImage;
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
                }, 500); // Match CSS transition duration
            }
            
            this.isTextVisible = false;
        }

        showCurrentText() {
            const carousel = document.querySelector('.navigation-carousel');
            if (!carousel) return;
            
            // Always start fresh - remove show class and force reflow
            carousel.classList.remove('show');
            carousel.style.display = 'none';
            
            // Force browser reflow to ensure the state is reset
            void carousel.offsetHeight;
            
            // Prepare the navigation items first
            this.items.forEach(item => {
                item.classList.add('hidden');
                item.removeAttribute('aria-current');
            });
            
            // Show only the current navigation item
            if (this.items[this.currentIndex]) {
                this.items[this.currentIndex].classList.remove('hidden');
                this.items[this.currentIndex].setAttribute('aria-current', 'page');
            }
            
            // Set display block first
            carousel.style.display = 'block';
            
            // Force reflow before applying show class for consistent animation
            void carousel.offsetHeight;
            
            // Use double requestAnimationFrame for better consistency
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    carousel.classList.add('show');
                });
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

            const duration = 800; // 1000ms transition for more comfortable pacing
            const startTime = Date.now();

            const animate = () => {
                const elapsed = Date.now() - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                // Use same smooth cubic bezier as zoom animation
                let easeProgress;
                if (progress === 0) {
                    easeProgress = 0;
                } else if (progress === 1) {
                    easeProgress = 1;
                } else {
                    // Custom smooth easing: cubic-bezier(.34,.81,.34,.82)
                    easeProgress = cubicBezier(progress, 0.25, 1, 0.25, 1);
                }
                
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
                    
                    // Show text only after transition completes
                    setTimeout(() => {
                        this.showCurrentText();
                    }, 0); // Adjusted delay for slower animation
                }
            };

            requestAnimationFrame(animate);
        }

        drawCenterImageTransition() {
            // Clear the canvas
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
            const gap = Math.min(windowWidth, windowHeight) / 50;
            const rectWidth = (windowWidth - (cols + 1) * gap) / cols;
            const rectHeight = (windowHeight - (rows + 1) * gap) / rows;
            
            let imageIndex = 0;
            for (let i = 0; i < cols; i++) {
                for (let j = 0; j < rows; j++) {
                    // Skip center image (column 2, row 1)
                    if (i === 2 && j === 1) {
                        imageIndex++;
                        continue;
                    }
                    
                    const x = gap + i * (rectWidth + gap);
                    const y = gap + j * (rectHeight + gap);
                    
                    const img = images[imageIndex];
                    imageIndex++;

                    if (img && img.complete) {
                        context.globalAlpha = 1.0;
                        this.drawImageWithCover(img, x, y, rectWidth, rectHeight);
                    }
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
                    
                    context.save();
                    context.translate(parallaxOffset, 0);
                    this.drawImageFullScreen(previousImage);
                    context.restore();
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
                    context.save();
                    context.translate(coverOffset + parallaxOffsetNew, 0);
                    this.drawImageFullScreen(currentImage);
                    context.restore();
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
            const navItem = this.items[pageIndex];
            if (navItem) {
                const dataImage = navItem.getAttribute('data-image');
                
                // Check if it's a URL (contains http, https, or starts with /)
                if (dataImage && (dataImage.includes('http') || dataImage.startsWith('/'))) {
                    // Create and return a new image element for the URL
                    const img = new Image();
                    img.src = dataImage;
                    
                    // Check if this image is already loaded/cached
                    if (img.complete) {
                        return img;
                    } else {
                        // For unloaded images, we'll use a cached version or fallback
                        // Check if we already have this image in our cache
                        const cachedImg = this.imageCache && this.imageCache[dataImage];
                        if (cachedImg && cachedImg.complete) {
                            return cachedImg;
                        }
                        
                        // Start loading the image and cache it
                        if (!this.imageCache) this.imageCache = {};
                        if (!this.imageCache[dataImage]) {
                            this.imageCache[dataImage] = img;
                            img.onload = () => {
                                // Redraw if this is the current image
                                if (animationState.isSingleImageMode && 
                                    animationState.singleImage === img) {
                                    drawSingleImage();
                                }
                            };
                        }
                        
                        // Return the loading image (might not display until loaded)
                        return img;
                    }
                } else {
                    // Original behavior: treat as image index
                    const imageIndex = parseInt(dataImage);
                    return images[imageIndex];
                }
            }
            // Fallback to first image if not found
            return images[0];
        }

        drawImageWithCover(img, x, y, width, height) {
            const imgAspect = img.width / img.height;
            const rectAspect = width / height;
            let sx, sy, sWidth, sHeight;

            if (imgAspect > rectAspect) {
                sHeight = img.height;
                sWidth = width * (img.height / height);
                sx = (img.width - sWidth) / 2;
                sy = 0;
            } else {
                sWidth = img.width;
                sHeight = height * (img.width / width);
                sx = 0;
                sy = (img.height - sHeight) / 2;
            }

            context.drawImage(
                img,
                sx, sy, sWidth, sHeight,
                x, y, width, height
            );
        }

        drawImageFullScreen(img) {
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
                0, 0, windowWidth, windowHeight
            );
        }


    }

    // Initial setup
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize image preloading and animation
        preloadImages();
        setTimeout(animateIntro(), 1000);
        
        // Initialize navigation carousel (store globally for later access)
        setTimeout(() => {
            window.navigationCarousel = new NavigationCarousel();
        }, 6000); // Start after zoom animation completes
    });

    // Handle window resize
    window.addEventListener('resize', debouncedResize);

</script>
 <!-- ↑  ↓ ↚ ↛ ↜ ↝ ↞ ↟ -->