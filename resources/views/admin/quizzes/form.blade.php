<form method="POST" action="/admin/quizzes/store-multiple-choice">
  <label>Pertanyaan:</label>
  <textarea name="question"></textarea>

  <label>Pilihan Jawaban:</label>
  <input name="options[0][text]">
  <input type="checkbox" name="options[0][is_correct]"> Benar

  <input name="options[1][text]">
  <input type="checkbox" name="options[1][is_correct]"> Benar

  <!-- Tambahkan dynamic input pilihan -->
  <button type="submit">Simpan</button>
</form>

<form method="POST" action="/admin/quizzes/store-drag-drop">
  <label>Pertanyaan:</label>
  <input name="question_text">

  <label>Options (Item):</label>
  <input name="options[0][text]"> → <input name="options[0][match]">
  <input name="options[1][text]"> → <input name="options[1][match]">

  <button type="submit">Simpan</button>
</form>


<form method="POST" action="/admin/quizzes/store-fill-blank">
  <label>Kalimat Lengkap:</label>
  <input name="full_sentence" placeholder="The quick brown fox jumps over the lazy dog.">

  <label>Blanks:</label>
  <input name="blanks[0][text]" value="quick">
  <input name="blanks[1][text]" value="brown">
  <input name="blanks[2][text]" value="lazy">

  <button type="submit">Simpan</button>
</form>
