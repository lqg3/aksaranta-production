@php($year = date('Y'))

<footer class="w-full mt-20 border-t border-white/10 text-white overflow-hidden">
  <div class="absolute w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 py-10 -z-50">
    <img src="https://aksara-batak.sgp1.cdn.digitaloceanspaces.com/design/logo-white-notext.svg" alt="Aksaranta Logo" class="opacity-20 max-w-[100vw]" />
  </div>
  <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 py-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
      <!-- Brand -->
      <div class="flex flex-col gap-3">
        <a href="{{ route('home') }}" class="text-2xl font-title">aksaranta</a>
        <p class="text-white/70 text-sm font-sans max-w-sm">
          Jelajahi budaya, aksara, dan sejarah Batak dalam satu tempat. Belajar interaktif, artikel, dan tur virtual.
        </p>
      </div>

      <!-- Explore -->
      <div>
        <h4 class="text-white/50 text-sm tracking-wide mb-3">Explore</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="{{ route('learn.index') }}" class="hover:text-red-400 transition-colors">Learn</a></li>
          <li><a href="{{ route('culture') }}" class="hover:text-red-400 transition-colors">Culture</a></li>
          <li><a href="{{ route('history') }}" class="hover:text-red-400 transition-colors">History</a></li>
          <li><a href="{{ route('blog.index') }}" class="hover:text-red-400 transition-colors">Blog</a></li>
          <li><a href="{{ route('animasi') }}" class="hover:text-red-400 transition-colors">Game</a></li>
        </ul>
      </div>

      <!-- Kamus & Tools -->
      <div>
        <h4 class="text-white/50 text-sm tracking-wide mb-3">Kamus & Tools</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="{{ route('kamus') }}" class="hover:text-red-400 transition-colors">Kamus</a></li>
          <li><a href="{{ route('kamus-aksara') }}" class="hover:text-red-400 transition-colors">Kamus Aksara</a></li>
          <li><a href="{{ route('batak-songs') }}" class="hover:text-red-400 transition-colors">Songs</a></li>
        </ul>
      </div>

      <!-- Virtual & More -->
      <div>
        <h4 class="text-white/50 text-sm tracking-wide mb-3">Virtual & More</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="{{ route('virtual.index') }}" class="hover:text-red-400 transition-colors">Virtual Tour</a></li>
          <li class="pt-1 text-white/50 text-xs uppercase tracking-wide">Destinations</li>
          <li><a href="{{ route('virtual.bukit-holbung') }}" class="hover:text-red-400 transition-colors">Bukit Holbung</a></li>
          <li><a href="{{ route('virtual.air-terjun-piso') }}" class="hover:text-red-400 transition-colors">Air Terjun Sipiso-piso</a></li>
          <li><a href="{{ route('virtual.danau-toba') }}" class="hover:text-red-400 transition-colors">Danau Toba</a></li>
          <li><a href="{{ route('virtual.sibeabea') }}" class="hover:text-red-400 transition-colors">Sibea-bea</a></li>
          <li><a href="{{ route('virtual.taman-alam-lubini') }}" class="hover:text-red-400 transition-colors">Taman Alam Lumbini</a></li>
          <li><a href="{{ route('virtual.arrasyid') }}" class="hover:text-red-400 transition-colors">Arrasyiid</a></li>
          <li><a href="{{ route('virtual.graha-bunda') }}" class="hover:text-red-400 transition-colors">Graha Bunda</a></li>
          <li><a href="{{ route('virtual.funland') }}" class="hover:text-red-400 transition-colors">Mikie Funland</a></li>
          @auth
            <li class="pt-3">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:text-red-400 transition-colors">Log out</button>
              </form>
            </li>
          @else
            <li class="pt-3"><a href="{{ route('login') }}" class="hover:text-red-400 transition-colors">Login</a></li>
          @endauth
        </ul>
      </div>
    </div>

    <hr class="my-8 border-white/10" />

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
      <p class="text-white/60 text-xs">© {{ $year }} Aksaranta. All rights reserved.</p>
      <div class="flex items-center gap-4 text-xs text-white/60">
        <a href="#" class="hover:text-red-400 transition-colors">Terms</a>
        <span class="opacity-30">•</span>
        <a href="#" class="hover:text-red-400 transition-colors">Privacy</a>
        <span class="opacity-30">•</span>
        <a href="#top" class="hover:text-red-400 transition-colors scroll-smooth" onclick="event.preventDefault(); window.scrollTo({top: 0, behavior: 'smooth'});">Kembali ke atas</a>
        <span class="opacity-30">•</span>
        <a href="#top" id="credits" class="hover:text-red-400 transition-colors">Credits</a>
      </div>
    </div>
  </div>

  <dialog class="bg-bg-dark text-white p-6 rounded-lg shadow-lg max-w-md mx-auto transition-all duration-300 opacity-0 pointer-events-none"
    id="creditsDialog"
    style="opacity:0; pointer-events:none; transition:opacity 300ms;">
    <div class="flex items-start justify-between mb-2">
      <p class="text-2xl">Credits</p>
      <button id="close" class="ml-4 text-white/40 underline hover:text-white transition-colors"
        onclick="closeCreditsDialog()"> 
        Tutup
      </button>
    </div>
    <p>Website ini menarik inspirasi besar dari <a href="https://camillemormal.com/" target="_blank" class="text-red-400 hover:underline cursor-pointer">camillemormal.com</a></p>
  </dialog>

  <script>
    const creditsBtn = document.getElementById('credits');
    const creditsDialog = document.getElementById('creditsDialog');

    function openCreditsDialog() {
      creditsDialog.showModal();
      document.body.style.overflow = 'hidden';
      // Fade in
      requestAnimationFrame(() => {
        creditsDialog.style.opacity = '1';
        creditsDialog.style.pointerEvents = 'auto';
      });
    }

    function closeCreditsDialog() {
      // Fade out
      creditsDialog.style.opacity = '0';
      creditsDialog.style.pointerEvents = 'none';
      setTimeout(() => {
        creditsDialog.close();
        document.body.style.overflow = 'auto';
      }, 300);
    }

    creditsBtn.addEventListener('click', function(event) {
      event.preventDefault();
      openCreditsDialog();
    });

    creditsDialog.addEventListener('close', function() {
      creditsDialog.style.opacity = '0';
      creditsDialog.style.pointerEvents = 'none';
      document.body.style.overflow = 'auto';
    });

    creditsDialog.addEventListener('click', function(event) {
      if (event.target === this) {
        closeCreditsDialog();
      }
    });

    // Ensure dialog is hidden on load
    creditsDialog.style.opacity = '0';
    creditsDialog.style.pointerEvents = 'none';
  </script>
</footer>

