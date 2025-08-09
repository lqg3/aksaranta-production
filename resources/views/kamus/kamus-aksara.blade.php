@extends('layouts.general')

@section('title', 'Aksaranta - Aksara & Ejaan')

@section('body-class', 'font-title bg-bg-dark text-white')

@section('head')
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Batak&display=swap" rel="stylesheet">
@endsection

@section('content')

    <!-- Hero / Intro -->
    <section class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 my-20 lg:my-28 flex flex-col gap-6">
        <div class="flex flex-col gap-3">
            <h2 class="text-red-400">Kamus</h2>
            <h3 class="font-bold text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wider">
                Aksara Batak <span class="text-red-400">& Ejaan</span>
            </h3>
            <p class="font-sans text-sm sm:text-base md:text-lg max-w-3xl">
                Pelajari bentuk dan pelafalan setiap aksara Batak. Jelajahi konsonan dasar, vokal, dan tanda baca yang membentuk warisan tulis-menulis ini.
            </p>
        </div>
    </section>

    <!-- Intro + Alphabet nav + Grid -->
    <section class="flex flex-col gap-8">
        <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <div class="bg-white/5 rounded-3xl p-6 sm:p-10">
                <h3 class="text-red-400 text-center my-2 text-sm sm:text-base">Mengenal</h3>
                <h2 class="text-center text-2xl sm:text-3xl md:text-4xl">Induk Surat dan <span class="text-red-400">Anak Surat</span></h2>
                <p class="font-sans text-center mx-auto max-w-3xl text-sm sm:text-base mt-4">
                    "Induk Surat" (huruf dasar) memuat vokal inheren 'a'. "Anak Surat" (diakritik) mengubah vokal dasar atau menambahkan konsonan akhir.
                </p>
            </div>

            <!-- Tabs: sub-etnis -->
            <div id="aksara-tabs" class="mt-6 flex flex-wrap gap-2">
                <button type="button" data-tab="all" class="px-3 py-1.5 rounded-full bg-white/20 text-white text-sm">Semua</button>
                <button type="button" data-tab="toba" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-white text-sm">Batak Toba</button>
                <button type="button" data-tab="karo" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-white text-sm">Batak Karo</button>
                <button type="button" data-tab="pakpak" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-white text-sm">Batak Pakpak</button>
                <button type="button" data-tab="mandailing" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-white text-sm">Batak Mandailing</button>
                <button type="button" data-tab="simalungun" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-white text-sm">Batak Simalungun</button>
            </div>

            <!-- Base characters -->
            <h4 class="mt-8 text-white/80 text-sm tracking-wide">Huruf dasar</h4>
            <div id="aksara-grid-base" class="mt-2 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-10 gap-3 sm:gap-4"></div>

            <!-- Vocals / Diacritics -->
            <h4 class="mt-8 text-white/80 text-sm tracking-wide">Vokal & diakritik</h4>
            <div id="aksara-grid-diacritics" class="mt-2 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-10 gap-3 sm:gap-4"></div>
            
            <!-- Guide: Usage & Pronunciation -->
            <div class="mt-12 bg-white/5 rounded-3xl p-6 sm:p-10">
                <h3 class="text-red-400 text-center my-2 text-sm sm:text-base">Panduan</h3>
                <h2 class="text-center text-2xl sm:text-3xl md:text-4xl">Penggunaan & <span class="text-red-400">Pelafalan</span></h2>
                
                <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- How to write/read -->
                    <div class="bg-white/5 rounded-2xl p-5 border border-white/10">
                        <h4 class="font-semibold text-lg">Cara menggunakan aksara</h4>
                        <ul class="mt-3 list-disc list-inside space-y-2 text-white/80 font-sans text-sm">
                            <li>Huruf dasar memiliki vokal inheren <span class="font-semibold">"a"</span> (mis. <span style="font-family: 'Noto Sans Batak', sans-serif" class="text-lg uc" data-cp="1BC5"></span> dibaca <span class="italic">ba</span>).</li>
                            <li>Ubah vokal dengan <span class="font-semibold">tanda vokal</span> (anak surat):
                                <span class="inline-flex gap-2 pl-1" style="font-family: 'Noto Sans Batak', sans-serif">
                                    <span title="E" class="uc" data-cp="1BE7"></span>
                                    <span title="I" class="uc" data-cp="1BEA"></span>
                                    <span title="U" class="uc" data-cp="1BEE"></span>
                                    <span title="O" class="uc" data-cp="1BEC"></span>
                                </span>
                                (contoh: <span style="font-family: 'Noto Sans Batak', sans-serif" class="text-lg"><span class="uc" data-cp="1BC5"></span><span class="uc" data-cp="1BEA"></span></span> ≈ <span class="italic">bi</span>).
                            </li>
                            <li>Matikan vokal dengan <span class="font-semibold">pangolat/panongonan</span>:
                                <span style="font-family: 'Noto Sans Batak', sans-serif" class="inline-flex gap-2 pl-1">
                                    <span title="Pangolat" class="uc" data-cp="1BF2"></span>
                                    <span title="Panongonan" class="uc" data-cp="1BF3"></span>
                                </span>
                                (mis. <span style="font-family: 'Noto Sans Batak', sans-serif" class="text-lg"><span class="uc" data-cp="1BC5"></span><span class="uc" data-cp="1BF2"></span></span> ≈ <span class="italic">b</span>).</li>
                            <li>Konsonan akhir: gunakan pangolat, opsional dengan <span class="font-semibold">tanda NG/H</span>:
                                <span style="font-family: 'Noto Sans Batak', sans-serif" class="inline-flex gap-2 pl-1">
                                    <span title="NG" class="uc" data-cp="1BF0"></span>
                                    <span title="H" class="uc" data-cp="1BF1"></span>
                                </span>
                                (mis. <span style="font-family: 'Noto Sans Batak', sans-serif" class="text-lg"><span class="uc" data-cp="1BD4"></span><span class="uc" data-cp="1BF2"></span><span class="uc" data-cp="1BF0"></span></span> ≈ <span class="italic">m-ng</span>).</li>
                            <li>Variasi dialek: beberapa tanda memiliki bentuk khusus (mis. <span class="italic">Karo I</span> <span class="uc" data-cp="1BEB"></span>, <span class="italic">Karo O</span> <span class="uc" data-cp="1BED"></span>).</li>
                            <li>Arah tulis: kiri → kanan.</li>
                        </ul>
                        <div class="mt-4 rounded-xl bg-white/5 border border-white/10 p-4">
                            <p class="text-white/70 text-sm">Contoh merangkai suku kata:</p>
                            <div class="mt-2 grid grid-cols-2 gap-3 text-sm">
                                <div>
                                    <p class="text-white/60">ba + i</p>
                                    <p style="font-family: 'Noto Sans Batak', sans-serif" class="text-2xl"><span class="uc" data-cp="1BC5"></span><span class="uc" data-cp="1BEA"></span></p>
                                </div>
                                <div>
                                    <p class="text-white/60">ta + o</p>
                                    <p style="font-family: 'Noto Sans Batak', sans-serif" class="text-2xl"><span class="uc" data-cp="1BD6"></span><span class="uc" data-cp="1BEC"></span></p>
                                </div>
                                <div>
                                    <p class="text-white/60">ga + pangolat</p>
                                    <p style="font-family: 'Noto Sans Batak', sans-serif" class="text-2xl"><span class="uc" data-cp="1BCE"></span><span class="uc" data-cp="1BF2"></span></p>
                                </div>
                                <div>
                                    <p class="text-white/60">sa + u</p>
                                    <p style="font-family: 'Noto Sans Batak', sans-serif" class="text-2xl"><span class="uc" data-cp="1BD8"></span><span class="uc" data-cp="1BEE"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pronunciation quick map -->
                    <div class="bg-white/5 rounded-2xl p-5 border border-white/10">
                        <h4 class="font-semibold text-lg">Peta pelafalan singkat</h4>
                        <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm font-sans">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between gap-3 p-2 rounded-lg bg-white/5">
                                    <span>Ba</span><span style="font-family: 'Noto Sans Batak', sans-serif" class="text-xl uc" data-cp="1BC5"></span><span class="text-white/60">/ba/</span>
                                </div>
                                <div class="flex items-center justify-between gap-3 p-2 rounded-lg bg-white/5">
                                    <span>Pa</span><span style="font-family: 'Noto Sans Batak', sans-serif" class="text-xl uc" data-cp="1BC7"></span><span class="text-white/60">/pa/</span>
                                </div>
                                <div class="flex items-center justify-between gap-3 p-2 rounded-lg bg-white/5">
                                    <span>Ga</span><span style="font-family: 'Noto Sans Batak', sans-serif" class="text-xl uc" data-cp="1BCE"></span><span class="text-white/60">/ga/</span>
                                </div>
                                <div class="flex items-center justify-between gap-3 p-2 rounded-lg bg-white/5">
                                    <span>Da</span><span style="font-family: 'Noto Sans Batak', sans-serif" class="text-xl uc" data-cp="1BD1"></span><span class="text-white/60">/da/</span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center justify-between gap-3 p-2 rounded-lg bg-white/5">
                                    <span>Sa</span><span style="font-family: 'Noto Sans Batak', sans-serif" class="text-xl uc" data-cp="1BD8"></span><span class="text-white/60">/sa/</span>
                                </div>
                                <div class="flex items-center justify-between gap-3 p-2 rounded-lg bg-white/5">
                                    <span>Ta</span><span style="font-family: 'Noto Sans Batak', sans-serif" class="text-xl uc" data-cp="1BD6"></span><span class="text-white/60">/ta/</span>
                                </div>
                                <div class="flex items-center justify-between gap-3 p-2 rounded-lg bg-white/5">
                                    <span>La</span><span style="font-family: 'Noto Sans Batak', sans-serif" class="text-xl uc" data-cp="1BDE"></span><span class="text-white/60">/la/</span>
                                </div>
                                <div class="flex items-center justify-between gap-3 p-2 rounded-lg bg-white/5">
                                    <span>Ra</span><span style="font-family: 'Noto Sans Batak', sans-serif" class="text-xl uc" data-cp="1BD2"></span><span class="text-white/60">/ra/</span>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 text-xs text-white/60">Catatan: simbol IPA disederhanakan. Pelafalan dapat bervariasi antar dialek.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Replace raw unicode placeholders in guide (elements with class 'uc' and data-cp)
            document.querySelectorAll('.uc[data-cp]').forEach(el => {
                const cp = el.getAttribute('data-cp');
                try {
                    el.textContent = String.fromCodePoint(parseInt(cp, 16));
                } catch { /* noop */ }
            });
            // Unicode-based dataset (see unicode.md reference)
            const aksaraCharacters = [
                // Vokal Induk (independent vowels)
                { latin: 'A', aksara: '\u{1BC0}', type: 'Vokal Induk' }, // BATAK LETTER A
                { latin: 'A (Simalungun)', aksara: '\u{1BC1}', type: 'Vokal Induk' }, // SIMALUNGUN A
                { latin: 'I', aksara: '\u{1BE4}', type: 'Vokal Induk' }, // BATAK LETTER I
                { latin: 'U', aksara: '\u{1BE5}', type: 'Vokal Induk' }, // BATAK LETTER U

                // Konsonan Induk (base consonants)
                { latin: 'Ha', aksara: '\u{1BC2}', type: 'Konsonan Induk' }, // BATAK LETTER HA
                { latin: 'Ha (Simalungun)', aksara: '\u{1BC3}', type: 'Konsonan Induk' },
                { latin: 'Ha (Mandailing)', aksara: '\u{1BC4}', type: 'Konsonan Induk' },
                { latin: 'Ba', aksara: '\u{1BC5}', type: 'Konsonan Induk' },
                { latin: 'Ba (Karo)', aksara: '\u{1BC6}', type: 'Konsonan Induk' },
                { latin: 'Pa', aksara: '\u{1BC7}', type: 'Konsonan Induk' },
                { latin: 'Pa (Simalungun)', aksara: '\u{1BC8}', type: 'Konsonan Induk' },
                { latin: 'Na', aksara: '\u{1BC9}', type: 'Konsonan Induk' },
                { latin: 'Na (Mandailing)', aksara: '\u{1BCA}', type: 'Konsonan Induk' },
                { latin: 'Wa', aksara: '\u{1BCB}', type: 'Konsonan Induk' },
                { latin: 'Wa (Simalungun)', aksara: '\u{1BCC}', type: 'Konsonan Induk' },
                { latin: 'Wa (Pakpak)', aksara: '\u{1BCD}', type: 'Konsonan Induk' },
                { latin: 'Ga', aksara: '\u{1BCE}', type: 'Konsonan Induk' },
                { latin: 'Ga (Simalungun)', aksara: '\u{1BCF}', type: 'Konsonan Induk' },
                { latin: 'Ja', aksara: '\u{1BD0}', type: 'Konsonan Induk' },
                { latin: 'Da', aksara: '\u{1BD1}', type: 'Konsonan Induk' },
                { latin: 'Ra', aksara: '\u{1BD2}', type: 'Konsonan Induk' },
                { latin: 'Ra (Simalungun)', aksara: '\u{1BD3}', type: 'Konsonan Induk' },
                { latin: 'Ma', aksara: '\u{1BD4}', type: 'Konsonan Induk' },
                { latin: 'Ma (Simalungun)', aksara: '\u{1BD5}', type: 'Konsonan Induk' },
                { latin: 'Ta (Selatan)', aksara: '\u{1BD6}', type: 'Konsonan Induk' },
                { latin: 'Ta (Utara)', aksara: '\u{1BD7}', type: 'Konsonan Induk' },
                { latin: 'Sa', aksara: '\u{1BD8}', type: 'Konsonan Induk' },
                { latin: 'Sa (Simalungun)', aksara: '\u{1BD9}', type: 'Konsonan Induk' },
                { latin: 'Sa (Mandailing)', aksara: '\u{1BDA}', type: 'Konsonan Induk' },
                { latin: 'Ya', aksara: '\u{1BDB}', type: 'Konsonan Induk' },
                { latin: 'Ya (Simalungun)', aksara: '\u{1BDC}', type: 'Konsonan Induk' },
                { latin: 'Nga', aksara: '\u{1BDD}', type: 'Konsonan Induk' },
                { latin: 'La', aksara: '\u{1BDE}', type: 'Konsonan Induk' },
                { latin: 'La (Simalungun)', aksara: '\u{1BDF}', type: 'Konsonan Induk' },
                { latin: 'Nya', aksara: '\u{1BE0}', type: 'Konsonan Induk' },
                { latin: 'Ca', aksara: '\u{1BE1}', type: 'Konsonan Induk' },
                { latin: 'Nda', aksara: '\u{1BE2}', type: 'Konsonan Khusus' },
                { latin: 'Mba', aksara: '\u{1BE3}', type: 'Konsonan Khusus' },

                // Anak Surat Vokal (vowel signs)
                { latin: 'E (tanda)', aksara: '\u{1BE7}', type: 'Anak Surat Vokal' },
                { latin: 'Pakpak E (tanda)', aksara: '\u{1BE8}', type: 'Anak Surat Vokal' },
                { latin: 'EE (tanda)', aksara: '\u{1BE9}', type: 'Anak Surat Vokal' },
                { latin: 'I (tanda)', aksara: '\u{1BEA}', type: 'Anak Surat Vokal' },
                { latin: 'Karo I (tanda)', aksara: '\u{1BEB}', type: 'Anak Surat Vokal' },
                { latin: 'O (tanda)', aksara: '\u{1BEC}', type: 'Anak Surat Vokal' },
                { latin: 'Karo O (tanda)', aksara: '\u{1BED}', type: 'Anak Surat Vokal' },
                { latin: 'U (tanda)', aksara: '\u{1BEE}', type: 'Anak Surat Vokal' },
                { latin: 'U untuk Simalungun SA (tanda)', aksara: '\u{1BEF}', type: 'Anak Surat Vokal' },

                // Tanda Konsonan / Virama
                { latin: 'Tanda NG', aksara: '\u{1BF0}', type: 'Tanda Konsonan' },
                { latin: 'Tanda H', aksara: '\u{1BF1}', type: 'Tanda Konsonan' },
                { latin: 'Pangolat', aksara: '\u{1BF2}', type: 'Pangolat' },
                { latin: 'Panongonan', aksara: '\u{1BF3}', type: 'Pangolat' },
            ].sort((a, b) => a.latin.localeCompare(b.latin));

    const gridBase = document.getElementById('aksara-grid-base');
    const gridDia = document.getElementById('aksara-grid-diacritics');
    const tabsContainer = document.getElementById('aksara-tabs');

    function renderGridTo(container, chars) {
        container.innerHTML = '';
        if (!chars.length) {
            container.innerHTML = '<p class="col-span-full text-center text-white/60">Tidak ada aksara.</p>';
                    return;
                }
        chars.forEach((ch) => {
            const card = document.createElement('div');
            card.className = 'bg-white/5 rounded-xl p-2 sm:p-3 text-center border border-white/10 hover:border-red-400/50 transition-colors';

            // Split variant label in parentheses into a small badge
            let baseLabel = ch.latin;
            let variantLabel = '';
            const m = typeof ch.latin === 'string' ? ch.latin.match(/^(.*?)\s*\(([^)]+)\)$/) : null;
            if (m) {
                baseLabel = m[1].trim();
                variantLabel = m[2].trim();
            }

            card.innerHTML = `
                <p style=\"font-family: 'Noto Sans Batak', sans-serif\" class=\"text-3xl sm:text-4xl leading-none\">${ch.aksara}</p>
                <div class=\"mt-2 flex flex-col items-center justify-center gap-1\">
                    <h3 class=\"text-white text-sm sm:text-base font-semibold break-words whitespace-normal\" title=\"${ch.latin}\">${baseLabel}</h3>
                    ${variantLabel ? `<span class=\"px-2 py-0.5 rounded-full text-[10px] bg-white/10 border border-white/10 text-white/80\">${variantLabel}</span>` : ''}
                </div>
                <p class=\"text-white/70 text-[10px] sm:text-xs mt-0.5\" title=\"${ch.type}\">${ch.type}</p>
            `;
            container.appendChild(card);
        });
    }

    function renderSections(chars) {
        const baseTypes = new Set(['Konsonan Induk', 'Konsonan Khusus', 'Vokal Induk']);
        const diaTypes = new Set(['Anak Surat Vokal', 'Tanda Konsonan', 'Pangolat']);
        const base = chars.filter(ch => baseTypes.has(ch.type));
        const dia = chars.filter(ch => diaTypes.has(ch.type));
        renderGridTo(gridBase, base);
        renderGridTo(gridDia, dia);
    }

    // Datasets per sub-etnis (placeholder subsets). TODO: Adjust arrays to real variant coverage if needed.
    const pick = (names) => aksaraCharacters.filter(ch => names.includes(ch.latin));
    const datasets = {
        all: aksaraCharacters,
        toba: pick(['A','I','U','Ha','Ba','Pa','Na','Wa','Ga','Ja','Da','Ra','Ma','Ta (Selatan)','Sa','Ya','Nga','La','Nya','Ca','Nda','Mba']),
        karo: pick(['A','I','U','Ha','Ba (Karo)','Pa','Na','Wa','Ga','Ja','Da','Ra','Ma','Ta (Utara)','Sa','Ya','Nga','La','Nya','Ca','Nda','Mba']),
        pakpak: pick(['A','I','U','Ha','Ba','Pa','Na','Wa (Pakpak)','Ga','Ja','Da','Ra','Ma','Ta (Utara)','Sa','Ya','Nga','La','Nya','Ca','Nda','Mba']),
        mandailing: pick(['A','I','U','Ha (Mandailing)','Ba','Pa','Na (Mandailing)','Wa','Ga','Ja','Da','Ra','Ma','Ta (Selatan)','Sa (Mandailing)','Ya','Nga','La','Nya','Ca','Nda','Mba']),
        simalungun: pick(['A (Simalungun)','I','U','Ha (Simalungun)','Ba','Pa (Simalungun)','Na','Wa (Simalungun)','Ga (Simalungun)','Ja','Da','Ra (Simalungun)','Ma (Simalungun)','Ta (Selatan)','Sa (Simalungun)','Ya (Simalungun)','Nga','La (Simalungun)','Nya','Ca','Nda','Mba'])
    };

    function setActiveTab(tabKey) {
        const buttons = tabsContainer.querySelectorAll('button[data-tab]');
        buttons.forEach(btn => {
            if (btn.getAttribute('data-tab') === tabKey) {
                btn.className = 'px-3 py-1.5 rounded-full bg-white/20 text-white text-sm';
                    } else {
                btn.className = 'px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-white text-sm';
            }
        });
        renderSections(datasets[tabKey] || aksaraCharacters);
    }

    tabsContainer.addEventListener('click', (e) => {
        const target = e.target.closest('button[data-tab]');
        if (!target) return;
        const tabKey = target.getAttribute('data-tab');
        setActiveTab(tabKey);
    });

    // Initialize default tab
    setActiveTab('all');
        });
    </script>
@endsection
