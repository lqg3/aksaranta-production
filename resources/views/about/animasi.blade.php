<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Game Pakaian Adat Batak</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Arial", sans-serif;
        /* background: linear-gradient(135deg, #fff8dc 0%, #ffe4e1 100%); */
        background-color: #333;
        min-height: 100vh;
        padding: 20px;
      }

      .container {
        max-width: 1200px;
        margin: 0 auto;
      }

      .header {
        text-align: center;
        margin-bottom: 30px;
      }

      .header h1 {
        color: #f5f5f5;
        font-size: 2.5rem;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
      }

      .header p {
        color: #d2d2d2;
        font-size: 1.1rem;
      }

      .game-area {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
        align-items: start;
      }

      .character-section {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .character-container {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 4px solid #dc143c;
      }

      #gameCanvas {
        border: 3px solid #daa520;
        border-radius: 15px;
        background: linear-gradient(to bottom, #87ceeb 0%, #98fb98 100%);
      }

      .reset-btn {
        margin-top: 20px;
        padding: 12px 24px;
        background: #dc143c;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
      }

      .reset-btn:hover {
        background: #b22222;
        transform: translateY(-2px);
      }

      .controls-section {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 4px solid #dc143c;
      }

      .category-tabs {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        margin-bottom: 25px;
      }

      .category-tab {
        padding: 15px 10px;
        border: none;
        border-radius: 10px;
        background: #f5f5f5;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        font-size: 0.9rem;
        font-weight: bold;
      }

      .category-tab.active {
        background: #dc143c;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 20, 60, 0.3);
      }

      .category-tab:hover:not(.active) {
        background: #e0e0e0;
      }

      .clothing-items {
        max-height: 400px;
        overflow-y: auto;
        padding-right: 10px;
      }

      .clothing-items::-webkit-scrollbar {
        width: 6px;
      }

      .clothing-items::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
      }

      .clothing-items::-webkit-scrollbar-thumb {
        background: #dc143c;
        border-radius: 3px;
      }

      .items-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
      }

      .clothing-item {
        padding: 15px;
        border: 2px solid #ddd;
        border-radius: 10px;
        background: #f9f9f9;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
      }

      .clothing-item:hover {
        border-color: #dc143c;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }

      .clothing-item.selected {
        border-color: #dc143c;
        background: #ffe4e1;
        box-shadow: 0 4px 12px rgba(220, 20, 60, 0.2);
      }

      .color-preview {
        width: 100%;
        height: 40px;
        border-radius: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
      }

      .item-name {
        font-size: 0.85rem;
        font-weight: bold;
        color: #333;
      }

      .current-outfit {
        margin-top: 25px;
        padding: 20px;
        background: #fff8dc;
        border-radius: 10px;
        border: 2px solid #daa520;
      }

      .current-outfit h4 {
        color: #b8860b;
        margin-bottom: 15px;
        font-size: 1.1rem;
      }

      .outfit-item {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
        font-size: 0.9rem;
        color: #8b4513;
      }

      .outfit-item span {
        margin-right: 10px;
        font-size: 1.2rem;
      }

      .cultural-info {
        margin-top: 30px;
        background: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border: 2px solid #daa520;
      }

      .cultural-info h3 {
        color: #8b0000;
        margin-bottom: 20px;
        font-size: 1.5rem;
      }

      .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
      }

      .info-item h4 {
        color: #dc143c;
        margin-bottom: 10px;
        font-size: 1.1rem;
      }

      .info-item p {
        color: #666;
        line-height: 1.6;
        font-size: 0.95rem;
      }

      @media (max-width: 768px) {
        .game-area {
          grid-template-columns: 1fr;
          gap: 20px;
        }

        .header h1 {
          font-size: 2rem;
        }

        .category-tabs {
          grid-template-columns: repeat(3, 1fr);
          gap: 5px;
        }

        .category-tab {
          padding: 10px 5px;
          font-size: 0.8rem;
        }

        .items-grid {
          grid-template-columns: 1fr;
        }

        .info-grid {
          grid-template-columns: 1fr;
        }
      }

      .loading {
        text-align: center;
        color: #666;
        font-style: italic;
      }

      .fade-in {
        animation: fadeIn 0.5s ease-in;
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .bounce {
        animation: bounce 0.6s ease;
      }

      @keyframes bounce {
        0%,
        20%,
        50%,
        80%,
        100% {
          transform: translateY(0);
        }
        40% {
          transform: translateY(-10px);
        }
        60% {
          transform: translateY(-5px);
        }
      }


    </style>
  </head>
  <body>
    <div class="container">
      <!-- Header -->
      <div class="header">
        <h1>🎭 Pakaian Adat Batak 🎭</h1>
        <p>
          Ganti pakaian karakter dengan pakaian tradisional Batak yang indah
        </p>
      </div>

      <!-- Game Area -->
      <div class="game-area">
        <!-- Character Section -->
        <div class="character-section">
          <div class="character-container">
            <canvas id="gameCanvas" width="400" height="500"></canvas>
            <button class="reset-btn" onclick="resetOutfit()">
              🔄 Reset Pakaian
            </button>
          </div>
        </div>

        <!-- Controls Section -->
        <div class="controls-section">
          <!-- Category Tabs -->
          <div class="category-tabs">
            <button
              class="category-tab active"
              onclick="selectCategory('head')"
            >
              <div style="font-size: 1.5rem; margin-bottom: 5px">👑</div>
              Kepala
            </button>
            <button class="category-tab" onclick="selectCategory('shirt')">
              <div style="font-size: 1.5rem; margin-bottom: 5px">👕</div>
              Baju
            </button>
            <button class="category-tab" onclick="selectCategory('pants')">
              <div style="font-size: 1.5rem; margin-bottom: 5px">👖</div>
              Celana
            </button>
          </div>

          <!-- Clothing Items -->
          <div class="clothing-items">
            <h3
              style="
                margin-bottom: 15px;
                color: #333;
                border-bottom: 2px solid #dc143c;
                padding-bottom: 10px;
              "
            >
              Pilih <span id="categoryName">Kepala</span>
            </h3>
            <div class="items-grid" id="itemsGrid">
              <!-- Items will be populated by JavaScript -->
            </div>
          </div>

          <!-- Current Outfit -->
          <div class="current-outfit">
            <h4>👗 Pakaian Saat Ini:</h4>
            <div class="outfit-item">
              <span>👑</span>
              <span id="currentHead">Tanpa Penutup</span>
            </div>
            <div class="outfit-item">
              <span>👕</span>
              <span id="currentShirt">Ulos Klasik</span>
            </div>
            <div class="outfit-item">
              <span>👖</span>
              <span id="currentPants">Sarung Batak</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Cultural Information -->
      <div class="cultural-info">
        <h3>📚 Tentang Pakaian Adat Batak</h3>
        <div class="info-grid">
          <div class="info-item">
            <h4>🧵 Ulos - Kain Suci Batak</h4>
            <p>
              Ulos adalah kain tenun tradisional Batak yang dianggap suci dan
              memiliki kekuatan magis. Terdapat berbagai jenis Ulos seperti Ragi
              Hotang (Pohon Kehidupan), Sibolang (Kadal), Bintang Maratur
              (Bintang Tersusun), Sadum, Mangiring, dan Ragidup yang
              masing-masing memiliki makna filosofis mendalam dalam kehidupan
              masyarakat Batak.
            </p>
          </div>
          <div class="info-item">
            <h4>🎨 Motif Gorga - Seni Ukir Batak</h4>
            <p>
              Gorga adalah seni ukir dan motif hias tradisional Batak yang
              berbeda antara sub-suku. Gorga Toba memiliki pola spiral yang
              lebih rumit, sedangkan Gorga Simalungun lebih sederhana. Motif ini
              melambangkan kehidupan, kesuburan, perlindungan, dan hubungan
              harmonis antara manusia dengan alam semesta.
            </p>
          </div>
          <div class="info-item">
            <h4>🌈 Makna Warna dalam Budaya Batak</h4>
            <p>
              Setiap warna dalam pakaian adat Batak memiliki makna sakral: Merah
              (marmerah) melambangkan keberanian dan semangat juang, Hitam
              (maitom) melambangkan kebijaksanaan dan kematangan, Putih (marbun)
              melambangkan kesucian dan kedamaian, Emas/Kuning melambangkan
              kemakmuran dan keagungan, serta warna-warna alam lainnya yang
              mencerminkan hubungan harmonis dengan alam.
            </p>
          </div>
          <div class="info-item">
            <h4>🎭 Penggunaan dalam Upacara Adat</h4>
            <p>
              Pakaian adat Batak digunakan dalam berbagai upacara sakral seperti
              Horja (pesta), Mangokkal Holi (pemindahan tulang belulang),
              Martutuaon (pernikahan), dan upacara adat lainnya. Ulos Ragi
              Hotang digunakan untuk upacara besar, Ulos Sibolang untuk
              perlindungan, dan setiap jenis memiliki aturan penggunaan yang
              ketat sesuai filosofi Dalihan Na Tolu (tiga tungku) dalam
              masyarakat Batak.
            </p>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Game state
      let canvas, ctx;
      let currentCategory = "head";
      let animationFrame = 0;
      let currentOutfit = {
        head: {
          id: "head4",
          name: "Tanpa Penutup",
          color: "transparent",
          pattern: "none",
        },
        shirt: {
          id: "shirt1",
          name: "Ulos Klasik",
          color: "#8B0000",
          pattern: "ulos",
        },
        pants: {
          id: "pants1",
          name: "Sarung Batak",
          color: "#8B4513",
          pattern: "ulos",
        },
      };

      // Clothing items data
      const clothingItems = {
        head: [
          {
            id: "head1",
            name: "Ulos Ragi Hotang",
            color: "#8B0000",
            pattern: "ragi_hotang",
          },
          {
            id: "head2",
            name: "Ulos Sibolang",
            color: "#B8860B",
            pattern: "sibolang",
          },
          {
            id: "head3",
            name: "Ulos Bintang Maratur",
            color: "#DC143C",
            pattern: "bintang_maratur",
          },
          {
            id: "head4",
            name: "Ulos Sadum",
            color: "#2F4F4F",
            pattern: "sadum",
          },
          {
            id: "head5",
            name: "Topi Gotong Batak",
            color: "#654321",
            pattern: "gotong",
          },
          {
            id: "head6",
            name: "Ulos Mangiring",
            color: "#8B4513",
            pattern: "mangiring",
          },
          {
            id: "head7",
            name: "Tanpa Penutup",
            color: "transparent",
            pattern: "none",
          },
        ],
        shirt: [
          {
            id: "shirt1",
            name: "Ulos Ragi Hotang",
            color: "#8B0000",
            pattern: "ragi_hotang",
          },
          {
            id: "shirt2",
            name: "Ulos Sibolang",
            color: "#B8860B",
            pattern: "sibolang",
          },
          {
            id: "shirt3",
            name: "Ulos Bintang Maratur",
            color: "#DC143C",
            pattern: "bintang_maratur",
          },
          {
            id: "shirt4",
            name: "Ulos Sadum",
            color: "#2F4F4F",
            pattern: "sadum",
          },
          {
            id: "shirt5",
            name: "Ulos Mangiring",
            color: "#8B4513",
            pattern: "mangiring",
          },
          {
            id: "shirt6",
            name: "Ulos Ragidup",
            color: "#4B0082",
            pattern: "ragidup",
          },
          {
            id: "shirt7",
            name: "Ulos Pinuncaan",
            color: "#228B22",
            pattern: "pinuncaan",
          },
          {
            id: "shirt8",
            name: "Baju Gorga Simalungun",
            color: "#2F2F2F",
            pattern: "gorga_simalungun",
          },
          {
            id: "shirt9",
            name: "Baju Gorga Toba",
            color: "#800000",
            pattern: "gorga_toba",
          },
          {
            id: "shirt10",
            name: "Kemeja Adat Putih",
            color: "#F5F5DC",
            pattern: "simple",
          },
        ],
        pants: [
          {
            id: "pants1",
            name: "Sarung Ulos Ragi Hotang",
            color: "#8B0000",
            pattern: "ragi_hotang",
          },
          {
            id: "pants2",
            name: "Sarung Ulos Sibolang",
            color: "#B8860B",
            pattern: "sibolang",
          },
          {
            id: "pants3",
            name: "Sarung Ulos Bintang Maratur",
            color: "#DC143C",
            pattern: "bintang_maratur",
          },
          {
            id: "pants4",
            name: "Sarung Ulos Sadum",
            color: "#2F4F4F",
            pattern: "sadum",
          },
          {
            id: "pants5",
            name: "Sarung Ulos Mangiring",
            color: "#8B4513",
            pattern: "mangiring",
          },
          {
            id: "pants6",
            name: "Sarung Ulos Ragidup",
            color: "#4B0082",
            pattern: "ragidup",
          },
          {
            id: "pants7",
            name: "Sarung Ulos Pinuncaan",
            color: "#228B22",
            pattern: "pinuncaan",
          },
          {
            id: "pants8",
            name: "Celana Gorga Hitam",
            color: "#2F2F2F",
            pattern: "gorga_toba",
          },
          {
            id: "pants9",
            name: "Celana Adat Coklat",
            color: "#654321",
            pattern: "simple",
          },
        ],
      };

      const categoryNames = {
        head: "Kepala",
        shirt: "Baju",
        pants: "Celana",
      };

      // Initialize the game
      function init() {
        canvas = document.getElementById("gameCanvas");
        ctx = canvas.getContext("2d");

        // Start animation loop
        setInterval(() => {
          animationFrame = (animationFrame + 1) % 60;
          drawCharacter();
        }, 100);

        // Initialize UI
        selectCategory("head");
        updateCurrentOutfitDisplay();
      }

      // Draw the character
      function drawCharacter() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        const centerX = canvas.width / 2;
        const centerY = canvas.height / 2;
        const scale = Math.min(canvas.width, canvas.height) / 400;

        // Apply breathing animation
        const breathOffset = Math.sin(animationFrame * 0.2) * 2;
        ctx.save();
        ctx.translate(centerX, centerY + breathOffset);
        ctx.scale(scale, scale);

        // Draw character layers
        drawBody();
        drawFace();
        drawClothing();

        ctx.restore();
      }

      // Draw character body
      function drawBody() {
        ctx.fillStyle = "#DEB887"; // Skin color

        // Head
        ctx.beginPath();
        ctx.arc(0, -120, 40, 0, Math.PI * 2);
        ctx.fill();

        // Neck
        ctx.fillRect(-10, -85, 20, 25);

        // Body
        ctx.fillRect(-50, -60, 100, 120);

        // Arms
        ctx.fillRect(-70, -40, 20, 80);
        ctx.fillRect(50, -40, 20, 80);

        // Legs
        ctx.fillRect(-30, 60, 25, 60);
        ctx.fillRect(5, 60, 25, 60);
      }

      // Draw character face
      function drawFace() {
        // Eyes
        ctx.fillStyle = "#000";
        ctx.beginPath();
        ctx.arc(-15, -125, 3, 0, Math.PI * 2);
        ctx.arc(15, -125, 3, 0, Math.PI * 2);
        ctx.fill();

        // Smile
        ctx.strokeStyle = "#000";
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.arc(0, -115, 15, 0, Math.PI);
        ctx.stroke();

        // Hair
        ctx.fillStyle = "#2F2F2F";
        ctx.beginPath();
        ctx.arc(0, -130, 45, Math.PI, 2 * Math.PI);
        ctx.fill();
      }

      // Draw clothing
      function drawClothing() {
        // Draw in layers: pants, shirt, head
        drawClothingItem(currentOutfit.pants, "pants");
        drawClothingItem(currentOutfit.shirt, "shirt");
        if (currentOutfit.head.pattern !== "none") {
          drawClothingItem(currentOutfit.head, "head");
        }
      }

      // Draw individual clothing item
      function drawClothingItem(item, type) {
        if (item.color === "transparent") return;

        ctx.fillStyle = item.color;

        switch (type) {
          case "head":
            drawHeadItem(item);
            break;
          case "shirt":
            drawShirtItem(item);
            break;
          case "pants":
            drawPantsItem(item);
            break;
        }

        // Add patterns
        if (item.pattern === "ragi_hotang") {
          drawRagiHotangPattern(type);
        } else if (item.pattern === "sibolang") {
          drawSibolangPattern(type);
        } else if (item.pattern === "bintang_maratur") {
          drawBintangMaraturPattern(type);
        } else if (item.pattern === "sadum") {
          drawSadumPattern(type);
        } else if (item.pattern === "mangiring") {
          drawMangiringPattern(type);
        } else if (item.pattern === "ragidup") {
          drawRagidupPattern(type);
        } else if (item.pattern === "pinuncaan") {
          drawPinuncaanPattern(type);
        } else if (item.pattern === "gorga_simalungun") {
          drawGorgaSimalunggunPattern(type);
        } else if (item.pattern === "gorga_toba") {
          drawGorgaTobaPattern(type);
        } else if (item.pattern === "gotong") {
          drawGotongPattern(type);
        }
      }

      // Draw head items
      function drawHeadItem(item) {
        if (item.name.includes("Ulos") || item.name.includes("Gotong")) {
          // Ulos head wrap
          ctx.beginPath();
          ctx.arc(0, -135, 50, Math.PI, 2 * Math.PI);
          ctx.fill();

          // Decorative band
          ctx.fillStyle = "#FFD700";
          ctx.fillRect(-50, -140, 100, 8);

          // Add traditional tassels for certain Ulos
          if (
            item.name.includes("Ragi Hotang") ||
            item.name.includes("Bintang Maratur")
          ) {
            ctx.fillStyle = "#FFD700";
            ctx.beginPath();
            ctx.arc(-45, -135, 3, 0, Math.PI * 2);
            ctx.arc(45, -135, 3, 0, Math.PI * 2);
            ctx.fill();
          }
        } else if (item.name.includes("Topi") || item.name.includes("Gotong")) {
          // Traditional hat
          ctx.beginPath();
          ctx.arc(0, -140, 45, Math.PI, 2 * Math.PI);
          ctx.fill();

          // Hat brim
          ctx.beginPath();
          ctx.ellipse(0, -125, 55, 10, 0, 0, 2 * Math.PI);
          ctx.fill();

          // Traditional ornament on top
          ctx.fillStyle = "#FFD700";
          ctx.beginPath();
          ctx.arc(0, -150, 5, 0, Math.PI * 2);
          ctx.fill();
        }
      }

      // Draw shirt items
      function drawShirtItem(item) {
        // Main shirt body
        ctx.fillRect(-50, -60, 100, 120);

        // Sleeves
        ctx.fillRect(-70, -40, 20, 60);
        ctx.fillRect(50, -40, 20, 60);

        // Collar
        ctx.beginPath();
        ctx.moveTo(-20, -60);
        ctx.lineTo(0, -45);
        ctx.lineTo(20, -60);
        ctx.fill();
      }

      // Draw pants items
      function drawPantsItem(item) {
        if (item.name.includes("Sarung")) {
          // Traditional sarong
          ctx.fillRect(-35, 50, 70, 70);
        } else {
          // Regular pants
          ctx.fillRect(-30, 60, 25, 60);
          ctx.fillRect(5, 60, 25, 60);
        }
      }

      // Draw Ragi Hotang pattern (Tree of Life)
      function drawRagiHotangPattern(type) {
        ctx.strokeStyle = "#FFD700";
        ctx.lineWidth = 2;

        let startY = 0,
          endY = 0,
          startX = -40,
          endX = 40;

        switch (type) {
          case "head":
            startY = -145;
            endY = -125;
            break;
          case "shirt":
            startY = -50;
            endY = 50;
            break;
          case "pants":
            startY = 55;
            endY = 115;
            break;
        }

        // Draw tree-like patterns (Ragi Hotang = Tree of Life)
        for (let y = startY; y < endY; y += 15) {
          // Main trunk line
          ctx.beginPath();
          ctx.moveTo(0, y);
          ctx.lineTo(0, y + 10);
          ctx.stroke();

          // Branches
          for (let x = -30; x <= 30; x += 15) {
            ctx.beginPath();
            ctx.moveTo(0, y + 5);
            ctx.lineTo(x, y);
            ctx.stroke();

            // Leaves
            ctx.beginPath();
            ctx.arc(x, y, 2, 0, Math.PI * 2);
            ctx.fill();
          }
        }
      }

      // Draw Sibolang pattern (Lizard motif)
      function drawSibolangPattern(type) {
        ctx.strokeStyle = "#8B4513";
        ctx.fillStyle = "#8B4513";
        ctx.lineWidth = 1.5;

        let startY = 0,
          endY = 0;

        switch (type) {
          case "head":
            startY = -140;
            endY = -130;
            break;
          case "shirt":
            startY = -40;
            endY = 40;
            break;
          case "pants":
            startY = 60;
            endY = 110;
            break;
        }

        // Draw lizard-like zigzag patterns
        for (let y = startY; y < endY; y += 20) {
          ctx.beginPath();
          ctx.moveTo(-30, y);
          for (let x = -30; x <= 30; x += 10) {
            ctx.lineTo(x, y + (x % 20 === 0 ? 5 : -5));
          }
          ctx.stroke();
        }
      }

      // Draw Bintang Maratur pattern (Arranged Stars)
      function drawBintangMaraturPattern(type) {
        ctx.fillStyle = "#FFD700";
        ctx.strokeStyle = "#FFD700";
        ctx.lineWidth = 1;

        let startY = 0,
          endY = 0;

        switch (type) {
          case "head":
            startY = -140;
            endY = -130;
            break;
          case "shirt":
            startY = -40;
            endY = 40;
            break;
          case "pants":
            startY = 60;
            endY = 110;
            break;
        }

        // Draw star patterns
        for (let y = startY; y < endY; y += 25) {
          for (let x = -30; x <= 30; x += 20) {
            // Draw 8-pointed star
            ctx.beginPath();
            for (let i = 0; i < 8; i++) {
              const angle = (i * Math.PI) / 4;
              const radius = i % 2 === 0 ? 4 : 2;
              const px = x + Math.cos(angle) * radius;
              const py = y + Math.sin(angle) * radius;
              if (i === 0) ctx.moveTo(px, py);
              else ctx.lineTo(px, py);
            }
            ctx.closePath();
            ctx.fill();
          }
        }
      }

      // Draw Sadum pattern (Traditional geometric)
      function drawSadumPattern(type) {
        ctx.strokeStyle = "#FFD700";
        ctx.lineWidth = 2;

        let startY = 0,
          endY = 0;

        switch (type) {
          case "head":
            startY = -140;
            endY = -130;
            break;
          case "shirt":
            startY = -40;
            endY = 40;
            break;
          case "pants":
            startY = 60;
            endY = 110;
            break;
        }

        // Draw interlocking rectangles
        for (let y = startY; y < endY; y += 15) {
          for (let x = -30; x <= 30; x += 15) {
            ctx.strokeRect(x - 5, y - 3, 10, 6);
            ctx.strokeRect(x - 3, y - 5, 6, 10);
          }
        }
      }

      // Draw Mangiring pattern (Winding/flowing)
      function drawMangiringPattern(type) {
        ctx.strokeStyle = "#DAA520";
        ctx.lineWidth = 2;

        let startY = 0,
          endY = 0;

        switch (type) {
          case "head":
            startY = -140;
            endY = -130;
            break;
          case "shirt":
            startY = -40;
            endY = 40;
            break;
          case "pants":
            startY = 60;
            endY = 110;
            break;
        }

        // Draw flowing wave patterns
        for (let y = startY; y < endY; y += 12) {
          ctx.beginPath();
          ctx.moveTo(-40, y);
          for (let x = -40; x <= 40; x += 5) {
            const waveY = y + Math.sin(x * 0.2) * 3;
            ctx.lineTo(x, waveY);
          }
          ctx.stroke();
        }
      }

      // Draw Ragidup pattern (Double tree)
      function drawRagidupPattern(type) {
        ctx.strokeStyle = "#FFD700";
        ctx.fillStyle = "#FFD700";
        ctx.lineWidth = 1.5;

        let startY = 0,
          endY = 0;

        switch (type) {
          case "head":
            startY = -140;
            endY = -130;
            break;
          case "shirt":
            startY = -40;
            endY = 40;
            break;
          case "pants":
            startY = 60;
            endY = 110;
            break;
        }

        // Draw double tree patterns
        for (let y = startY; y < endY; y += 20) {
          // Left tree
          ctx.beginPath();
          ctx.moveTo(-15, y + 10);
          ctx.lineTo(-15, y);
          ctx.lineTo(-25, y - 5);
          ctx.moveTo(-15, y);
          ctx.lineTo(-5, y - 5);
          ctx.stroke();

          // Right tree
          ctx.beginPath();
          ctx.moveTo(15, y + 10);
          ctx.lineTo(15, y);
          ctx.lineTo(5, y - 5);
          ctx.moveTo(15, y);
          ctx.lineTo(25, y - 5);
          ctx.stroke();
        }
      }

      // Draw Pinuncaan pattern (Pointed/sharp)
      function drawPinuncaanPattern(type) {
        ctx.strokeStyle = "#FFD700";
        ctx.fillStyle = "#FFD700";
        ctx.lineWidth = 1.5;

        let startY = 0,
          endY = 0;

        switch (type) {
          case "head":
            startY = -140;
            endY = -130;
            break;
          case "shirt":
            startY = -40;
            endY = 40;
            break;
          case "pants":
            startY = 60;
            endY = 110;
            break;
        }

        // Draw pointed triangular patterns
        for (let y = startY; y < endY; y += 15) {
          for (let x = -30; x <= 30; x += 15) {
            ctx.beginPath();
            ctx.moveTo(x, y - 5);
            ctx.lineTo(x - 5, y + 5);
            ctx.lineTo(x + 5, y + 5);
            ctx.closePath();
            ctx.fill();
          }
        }
      }

      // Draw Gorga Simalungun pattern
      function drawGorgaSimalunggunPattern(type) {
        ctx.strokeStyle = "#FFD700";
        ctx.lineWidth = 1.5;

        let startY = 0,
          endY = 0;

        switch (type) {
          case "shirt":
            startY = -40;
            endY = 40;
            break;
          case "pants":
            startY = 60;
            endY = 110;
            break;
        }

        // Draw Simalungun-style spiral patterns
        for (let y = startY; y < endY; y += 25) {
          for (let x = -30; x < 30; x += 25) {
            // Outer spiral
            ctx.beginPath();
            ctx.arc(x, y, 8, 0, Math.PI * 2);
            ctx.stroke();

            // Inner spiral
            ctx.beginPath();
            ctx.arc(x, y, 4, 0, Math.PI * 2);
            ctx.stroke();

            // Connecting lines
            ctx.beginPath();
            ctx.moveTo(x - 8, y);
            ctx.lineTo(x - 15, y);
            ctx.moveTo(x + 8, y);
            ctx.lineTo(x + 15, y);
            ctx.stroke();
          }
        }
      }

      // Draw Gorga Toba pattern
      function drawGorgaTobaPattern(type) {
        ctx.strokeStyle = "#FFD700";
        ctx.lineWidth = 1.5;

        let startY = 0,
          endY = 0;

        switch (type) {
          case "shirt":
            startY = -40;
            endY = 40;
            break;
          case "pants":
            startY = 60;
            endY = 110;
            break;
        }

        // Draw Toba-style Gorga patterns (more elaborate)
        for (let y = startY; y < endY; y += 25) {
          for (let x = -30; x < 30; x += 30) {
            // Main circle
            ctx.beginPath();
            ctx.arc(x, y, 8, 0, Math.PI * 2);
            ctx.stroke();

            // Inner details
            ctx.beginPath();
            ctx.arc(x, y, 4, 0, Math.PI * 2);
            ctx.stroke();

            // Cross pattern inside
            ctx.beginPath();
            ctx.moveTo(x - 3, y);
            ctx.lineTo(x + 3, y);
            ctx.moveTo(x, y - 3);
            ctx.lineTo(x, y + 3);
            ctx.stroke();

            // Decorative corners
            ctx.beginPath();
            ctx.moveTo(x - 6, y - 6);
            ctx.lineTo(x - 4, y - 4);
            ctx.moveTo(x + 6, y - 6);
            ctx.lineTo(x + 4, y - 4);
            ctx.moveTo(x - 6, y + 6);
            ctx.lineTo(x - 4, y + 4);
            ctx.moveTo(x + 6, y + 6);
            ctx.lineTo(x + 4, y + 4);
            ctx.stroke();
          }
        }
      }

      // Draw Gotong pattern (for traditional hat)
      function drawGotongPattern(type) {
        if (type !== "head") return;

        ctx.strokeStyle = "#FFD700";
        ctx.fillStyle = "#FFD700";
        ctx.lineWidth = 1;

        // Draw traditional hat ornaments
        for (let angle = 0; angle < 360; angle += 45) {
          const rad = (angle * Math.PI) / 180;
          const x = Math.cos(rad) * 40;
          const y = -135 + Math.sin(rad) * 15;

          ctx.beginPath();
          ctx.arc(x, y, 2, 0, Math.PI * 2);
          ctx.fill();
        }
      }

      // Select category
      function selectCategory(category) {
        currentCategory = category;

        // Update tab appearance
        document.querySelectorAll(".category-tab").forEach((tab) => {
          tab.classList.remove("active");
        });
        event.target.classList.add("active");

        // Update category name
        document.getElementById("categoryName").textContent =
          categoryNames[category];

        // Update items grid
        updateItemsGrid();
      }

      // Update items grid
      function updateItemsGrid() {
        const grid = document.getElementById("itemsGrid");
        grid.innerHTML = "";

        clothingItems[currentCategory].forEach((item) => {
          const itemElement = document.createElement("div");
          itemElement.className = "clothing-item";
          if (currentOutfit[currentCategory].id === item.id) {
            itemElement.classList.add("selected");
          }

          itemElement.innerHTML = `
                    <div class="color-preview" style="background-color: ${
                      item.color === "transparent" ? "#f3f4f6" : item.color
                    }"></div>
                    <div class="item-name">${item.name}</div>
                `;

          itemElement.onclick = () => selectClothingItem(item);
          grid.appendChild(itemElement);
        });
      }

      // Select clothing item
      function selectClothingItem(item) {
        currentOutfit[currentCategory] = item;
        updateItemsGrid();
        updateCurrentOutfitDisplay();

        // Add bounce animation to character
        canvas.classList.add("bounce");
        setTimeout(() => canvas.classList.remove("bounce"), 600);
      }

      // Update current outfit display
      function updateCurrentOutfitDisplay() {
        document.getElementById("currentHead").textContent =
          currentOutfit.head.name;
        document.getElementById("currentShirt").textContent =
          currentOutfit.shirt.name;
        document.getElementById("currentPants").textContent =
          currentOutfit.pants.name;
      }

      // Reset outfit
      function resetOutfit() {
        currentOutfit = {
          head: clothingItems.head.find((item) => item.id === "head7"),
          shirt: clothingItems.shirt.find((item) => item.id === "shirt1"),
          pants: clothingItems.pants.find((item) => item.id === "pants1"),
        };

        updateItemsGrid();
        updateCurrentOutfitDisplay();

        // Add bounce animation
        canvas.classList.add("bounce");
        setTimeout(() => canvas.classList.remove("bounce"), 600);
      }

      // Initialize when page loads
      window.onload = init;
    </script>
  </body>
</html>
