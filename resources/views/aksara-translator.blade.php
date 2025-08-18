@extends('layouts.general')

@section('title', 'Aksara Translator')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/virtual-keyboard.css'])

        <script>
            /**
             * Membacakan teks dari elemen input yang ditentukan.
             * @param {string} inputSelector Selector CSS untuk elemen input (misal: '#inputLatin').
             */
            function speakTextFromInput(inputSelector) {
                const inputElement = document.querySelector(inputSelector);

                if (!inputElement) {
                    console.error("Elemen input tidak ditemukan. Periksa selector Anda.");
                    return;
                }

                const input = inputElement.value;
                if (!input.trim()) {
                    alert("Masukkan teks dulu sebelum dibacakan.");
                    return;
                }

                const utterance = new SpeechSynthesisUtterance(input);
                utterance.lang = "id-ID";

                const voices = speechSynthesis.getVoices();
                const maleVoice = voices.find(
                    (v) => v.lang === "id-ID" && v.name.toLowerCase().includes("male")
                );

                if (maleVoice) {
                    utterance.voice = maleVoice;
                } else {
                    console.log("Suara laki-laki tidak ditemukan. Menggunakan default.");
                }

                utterance.rate = 0.95;
                utterance.pitch = 1;

                const timeout = setTimeout(() => {
                    speechSynthesis.cancel();
                    console.log("🔇 Bacaan dihentikan otomatis setelah 5 detik.");
                }, 5000);

                utterance.onend = () => {
                    clearTimeout(timeout);
                    console.log("✅ Bacaan selesai sebelum timeout.");
                };

                speechSynthesis.speak(utterance);
            }

            function startDictationTo(selector) {
                const input = document.querySelector(selector);

                const micIcon = document.getElementById("micIcon");
                const stopIcon = document.getElementById("stopIcon");
                if (!input) {
                    alert("Elemen tidak ditemukan: " + selector);
                    return;
                }

                // Cek dukungan browser
                const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
                if (!SpeechRecognition) {
                    alert("Browser kamu tidak mendukung Speech Recognition.");
                    return;
                }

                const recognition = new SpeechRecognition();
                recognition.lang = "id-ID"; // Bahasa Indonesia
                recognition.interimResults = false;
                recognition.maxAlternatives = 1;

                recognition.onstart = () => {
                    micIcon.classList.add("hidden");
                    stopIcon.classList.remove("hidden");
                    input.placeholder = "Sedang mendengarkan...";
                };

                recognition.onerror = (event) => {
                    stopIcon.classList.add("hidden");
                    micIcon.classList.remove("hidden");
                };

                recognition.onresult = (event) => {
                    const transcript = event.results[0][0].transcript;
                    stopIcon.classList.add("hidden");
                    micIcon.classList.remove("hidden");
                    input.value = transcript;
                    transliterateLatinToBatak('#inputLatin', '#outputBatak');
                };

                recognition.onend = () => {
                    stopIcon.classList.add("hidden");
                    micIcon.classList.remove("hidden");
                    input.placeholder = "Masukkan teks...";
                };

                recognition.start();
            }

            const toggleVirtualKeyboard = () => {
                const virtualKeyboard = document.getElementById('virtual-keyboard')
                virtualKeyboard.classList.toggle('hidden');
            }


            // === batak2latn dari script kamu ===
            var batak2latn = {
                "᯦": "​",
                "ᯀ": "a",
                "ᯁ": "a",
                "ᯃ": "ha",
                "ᯄ": "ha",
                "ᯂ": "ha",
                "ᯅ": "ba",
                "ᯆ": "ba",
                "ᯇ": "pa",
                "ᯈ": "pa",
                "ᯉ": "na",
                "ᯊ": "na",
                "ᯋ": "wa",
                "ᯌ": "wa",
                "ᯍ": "wa",
                "ᯎ": "ga",
                "ᯏ": "ga",
                "ᯐ": "ja",
                "ᯑ": "da",
                "ᯒ": "ra",
                "ᯓ": "ra",
                "ᯔ": "ma",
                "ᯕ": "ma",
                "ᯖ": "ta",
                "ᯗ": "ta",
                "ᯘ": "sa",
                "ᯙ": "sa",
                "ᯚ": "sa",
                "ᯛ": "ya",
                "ᯜ": "ya",
                "ᯞ": "la",
                "ᯟ": "la",
                "ᯡ": "ca",
                "ᯂᯧ": "qx",
                "ᯇᯧ": "fx",
                "ᯠ": "nya",
                "ᯝ": "nga",
                "ᯢ": "nda",
                "ᯣ": "mba",
                "ᯤ": "i",
                "ᯥ": "u",
                "ᯧ": "e",
                "ᯩ": "é",
                "ᯇ᯲": "f",
                "ᯪ": "i",
                "ᯫ": "i",
                "ᯬ": "o",
                "ᯭ": "o",
                "ᯨ": "o",
                "ᯮ": "u",
                "ᯱ": "h",
                "ᯰ": "ng",
                "᯳": "​",
                "᯲": "​",
                "ᯀᯧ᯲": "x",
                "ᯂ᯲": "q",
                // Komentar satu dari ini agar tidak error
                // "​": '#',
                // "​": ' '
            };


            // === Membuat latn2batak otomatis ===
            const latn2batak = {};
            for (const [batak, latin] of Object.entries(batak2latn)) {
                if (!latn2batak[latin]) {
                    latn2batak[latin] = batak;
                }
            }

            /**
             * Menerjemahkan teks Latin ke aksara Batak.
             * @param {string} inputSelector Selector CSS untuk elemen input (misal: '#inputLatin').
             * @param {string} outputSelector Selector CSS untuk elemen output (misal: '#output').
             */
            function transliterateLatinToBatak(inputSelector, outputSelector) {
                const inputElement = document.querySelector(inputSelector);
                const outputElement = document.querySelector(outputSelector);

                if (!inputElement || !outputElement) {
                    console.error("Elemen input atau output tidak ditemukan. Periksa selector Anda.");
                    return;
                }

                const input = inputElement.value.toLowerCase();
                let result = "";
                let i = 0;

                const vowels = {
                    a: "", // inherent vowel
                    i: "ᯤ",
                    u: "ᯥ",
                    e: "ᯧ",
                    o: "ᯬ",
                    é: "ᯩ",
                };

                const consonants = {
                    h: "ᯄ",
                    b: "ᯅ",
                    p: "ᯇ",
                    n: "ᯉ",
                    w: "ᯋ",
                    g: "ᯎ",
                    j: "ᯐ",
                    d: "ᯑ",
                    r: "ᯒ",
                    m: "ᯔ",
                    t: "ᯖ",
                    s: "ᯘ",
                    y: "ᯛ",
                    l: "ᯞ",
                    c: "ᯡ",
                    k: "ᯄ᯦", // kh
                    z: "ᯘ",
                    v: "ᯅ",
                    f: "ᯇ᯲", // ditambahkan
                };

                const specials = ["fx", "qx", "mba", "nda", "nya", "nga", "ng", "f", "q", "x"];

                while (i < input.length) {
                    let matched = false;

                    for (let sp of specials) {
                        const segment = input.substr(i, sp.length);
                        if (segment === sp && latn2batak[sp]) {
                            result += latn2batak[sp];
                            i += sp.length;
                            matched = true;
                            break;
                        }
                    }
                    if (matched) continue;

                    const char1 = input[i];
                    const char2 = input[i + 1] || "";

                    if (consonants[char1] && vowels[char2] !== undefined) {
                        result += consonants[char1] + vowels[char2];
                        i += 2;
                        continue;
                    }

                    if (consonants[char1]) {
                        result += consonants[char1];
                        i++;
                        continue;
                    }

                    if (vowels[char1] !== undefined) {
                        result += "ᯀ" + vowels[char1]; // vokal mandiri
                        i++;
                        continue;
                    }

                    result += char1; // karakter tidak dikenal
                    i++;
                }

                outputElement.textContent = result;
            }
        </script>
@endsection

@section('body-class', 'bg-app text-app font-poppins')

@section('content')
        <!-- Hero Section -->
        <div class="header">
            <h1 class="font-title text-4xl pt-24 md:text-5xl lg:text-5xl font-bold text-center">
                Pengubah Teks Aksara Batak
            </h1>
            <p class="text-center text-lg mt-4">
                Ubah aksara Latin ke Aksara Batak dengan mudah dan cepat
            </p>
        </div>

        <!-- Rotating Fun Facts -->
        <section class="max-w-[1440px] mx-auto px-4 mt-8">
            <div id="funFactContainer" class="border border-white/10 bg-white/5 rounded-2xl p-5 flex items-start gap-3">
                <span class="font-title text-xs text-red-400 font-semibold uppercase tracking-wide shrink-0 mt-1">Fun Fact</span>
                <p id="funFactText" role="status" aria-live="polite" class="dark:text-white/80 transition-all duration-500 ease-out"></p>
            </div>
        </section>

        <section class="max-w-[1440px] mx-auto my-20 space-y-4 px-4">
            <h2 class="font-title text-red-400 text-center text-xl font-semibold">Tulis • Baca • Lestarikan</h2>
            <h1 class="font-title font-bold text-4xl text-center">Aksara Batak untuk Semua</h1>
            <p class="pt-4 text-lg text-center">Jelajahi keindahan aksara Batak. Terjemahkan teks dari dan ke aksara
                Batak dengan cepat dan akurat.</p>

            <div class="flex flex-col md:flex-row gap-5 mt-8 items-stretch">
                <div class="flex md:w-1/2 flex-col shadow-sm overflow-hidden">
                    <h3 class="text-2xl">Aksara Latin</h3>
                    <textarea id="inputLatin" oninput="autoResize(this); debounceTransliterate()"
                        class="grow min-h-[250px] max-h-[1000px] overflow-hidden resize-none border-t border-r border-l p-6 border-[#3C3C3C] rounded-t-3xl focus:outline-0 dark:bg-[#262626] dark:text-white text-black/60 placeholder:text-black/30 dark:placeholder:text-white/60 dark:caret-white" placeholder="Masukkan teks..."></textarea>
                    <div
                        class="flex justify-between pt-2 px-4 pb-4 border-l border-r border-b rounded-b-3xl border-[#3C3C3C]">
                        <button onclick="startDictationTo('#inputLatin')" class="cursor-pointer" id="dictation-btn">
                            <div id="micIcon">
                                <i class="fa-solid fa-microphone text-[#4F4E4E] text-xl"></i>
                            </div>
                            <div id="stopIcon" class="hidden">
                                <i class="fa-solid fa-stop text-[#4F4E4E] text-xl"></i>
                            </div>
                        </button>
                        <button onclick="toggleVirtualKeyboard()" class="cursor-pointer">
                            <i class="fa-solid fa-keyboard text-[#4F4E4E] text-xl"></i>
                        </button>
                    </div>
                </div>

                <div class="flex md:w-1/2 flex-col shadow-sm overflow-hidden">
                    <h3 class="text-2xl">Aksara Batak</h3>
                    <div id="outputBatak"
                        class="min-h-[250px] border-t border-r border-l p-6 border-[#262626] dark:bg-[#262626] rounded-t-3xl break-words">
                    </div>
                    <div
                        class="flex justify-end gap-5 p-4 pt-2 border-l border-r border-b border-[#3C3C3C] dark:bg-[#262626] rounded-b-3xl">
                        <button onclick="speakTextFromInput('#inputLatin')" class="cursor-pointer">
                            <i class="fa-solid fa-volume-high text-[#7D7D7D] text-xl"></i>
                        </button>
                        <button onclick="copyToClipboard('#outputBatak')" class="cursor-pointer">
                            <i class="fa-solid fa-copy text-[#7D7D7D] text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <div id="virtual-keyboard" class="hidden">
            <div class="simple-keyboard text-black"></div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/simple-keyboard@latest/build/index.js"></script>
        <script>
            const Keyboard = window.SimpleKeyboard.default;

            const myKeyboard = new Keyboard({
                onChange: input => onChange(input),
                onKeyPress: button => onKeyPress(button)
            });

            function onChange(input) {
                document.querySelector("#inputLatin").value = input;
                debounceTransliterate();
            }

            function onKeyPress(button) {
                console.log("Button pressed", button);
            }
        </script>

        <script>
            // Debounce function
            let debounceTimer;

            function debounceTransliterate() {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    transliterateLatinToBatak('#inputLatin', '#outputBatak');
                }, 300); // Penundaan 300ms setelah ketikan terakhir
            }

            // Fungsi untuk menyalin teks ke clipboard
            function copyToClipboard(selector) {
                const element = document.querySelector(selector);
                if (!element) {
                    console.error("Elemen tidak ditemukan untuk disalin. Periksa selector Anda.");
                    return;
                }

                // Gunakan navigator.clipboard.writeText() untuk cara modern
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(element.textContent || element.value)
                        .then(() => {
                            alert('Teks berhasil disalin!');
                        })
                        .catch(err => {
                            console.error('Gagal menyalin teks: ', err);
                            alert('Gagal menyalin teks.');
                        });
                } else {
                    // Fallback untuk browser lama
                    const tempTextArea = document.createElement('textarea');
                    tempTextArea.value = element.textContent || element.value;
                    document.body.appendChild(tempTextArea);
                    tempTextArea.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempTextArea);
                    alert('Teks berhasil disalin (fallback)!');
                }
            }

            function autoResize(textarea) {
                const minHeight = 250; // sesuai dengan Tailwind min-h-[100px]

                textarea.style.height = 'auto';
                const newHeight = Math.max(textarea.scrollHeight, minHeight);
                textarea.style.height = newHeight + 'px';
            }
        </script>

        <script>
            (function initRotatingFunFacts() {
                const facts = [
                    'Aksara Batak adalah sistem tulisan abugida: setiap aksara konsonan membawa vokal inheren /a/.',
                    'Secara tradisional, naskah Batak ditulis pada pustaha dari kulit kayu, bambu, atau tulang kerbau.',
                    'Aksara Batak memiliki beberapa varian daerah: Toba, Karo, Mandailing, Simalungun, dan Pakpak.',
                    'Tanda pemati vokal (pangolat) ᯲ digunakan untuk mematikan vokal bawaan pada konsonan.',
                    'Blok Unicode untuk Aksara Batak berada pada rentang U+1BC0–U+1BFF.',
                    'Penulisan vokal mandiri memiliki bentuk khusus dan tidak selalu mengikuti pola konsonan + diakritik.',
                    'Banyak manuskrip Batak berisi ilmu perbintangan, pengobatan tradisional, hingga mantra-mantra.'
                ];

                const textEl = document.getElementById('funFactText');
                const container = document.getElementById('funFactContainer');
                if (!textEl || !container) return;

                let index = 0;
                let intervalId = null;

                function showNextFact() {
                    textEl.classList.add('opacity-0', 'translate-y-1');
                    setTimeout(() => {
                        textEl.textContent = facts[index];
                        textEl.classList.remove('opacity-0', 'translate-y-1');
                        index = (index + 1) % facts.length;
                    }, 250);
                }

                function startRotation() {
                    if (intervalId) return;
                    showNextFact();
                    intervalId = setInterval(showNextFact, 6000);
                }

                function stopRotation() {
                    if (!intervalId) return;
                    clearInterval(intervalId);
                    intervalId = null;
                }

                container.addEventListener('mouseenter', stopRotation);
                container.addEventListener('mouseleave', startRotation);
                document.addEventListener('visibilitychange', () => {
                    if (document.hidden) stopRotation(); else startRotation();
                });

                startRotation();
            })();
        </script>
@endsection
