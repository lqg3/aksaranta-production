<div
    x-data="{
        insert(char) {
            const target = document.querySelector('[data-batak-input]');
            if (target) {
                const start = target.selectionStart;
                const end = target.selectionEnd;
                const value = target.value;
                target.value = value.slice(0, start) + char + value.slice(end);
                target.focus();
                target.selectionStart = target.selectionEnd = start + char.length;
            }
        }
    }"
    class="flex flex-wrap gap-2 p-2 bg-gray-100 rounded-md"
>
    @php
        $batakChars = [
            'ᯀ','ᯁ','ᯂ','ᯃ','ᯄ','ᯅ','ᯆ','ᯇ','ᯈ','ᯉ','ᯊ','ᯋ','ᯌ','ᯍ','ᯎ','ᯏ','ᯐ','ᯑ','ᯒ','ᯓ',
            'ᯔ','ᯕ','ᯖ','ᯗ','ᯘ','ᯙ','ᯚ','ᯛ','ᯜ','ᯞ','ᯟ','ᯠ','ᯡ','ᯢ','ᯣ','ᯤ','ᯥ','ᯧ','ᯨ','ᯩ','ᯪ','ᯫ','ᯬ','ᯭ','ᯮ',
            'ᯰ','ᯱ','᯲','᯳','᯦'
        ];
    @endphp

    @foreach($batakChars as $char)
        <button
            type="button"
            class="px-3 py-2 text-xl bg-white border rounded shadow hover:bg-gray-200"
            @click="insert('{{ $char }}')"
        >{{ $char }}</button>
    @endforeach
</div>
