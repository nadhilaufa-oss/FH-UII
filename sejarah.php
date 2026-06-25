<?php
$pageTitle = "Manifesto Sejarah & Arsitektur Peradaban | FH UII";
$university = "Universitas Islam Indonesia";
$fakultas = "Fakultas Hukum";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="icon" type="image/png" href="logo.png.png"
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ==========================================================================
           1. CORE VISUAL TOKENS (Sesuai Karakter Warna Web UII - Kontras Tinggi)
           ========================================================================== */
        :root {
            --uii-navy: #0B3C82;
            --uii-navy-dark: #041530;
            --uii-gold: #FFD100;
            --uii-gold-deep: #C59B27;
            --bg-canvas: #FFFFFF;       /* Putih Bersih untuk keterbacaan solid */
            --text-main: #0F172A;       /* Slate 900 (Hitam Pekat Modern) */
            --text-muted: #334155;      /* Slate 700 (Abu Gelap Kontras Tinggi) */
            --transition-lux: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif; /* Diganti ke Sans-Serif Modern agar Sangat Jelas */
            background-color: var(--bg-canvas);
            color: var(--text-main);
            line-height: 2.0;
            letter-spacing: -0.1px;
        }

        /* Tipografi Editorial Modern */
        .editorial-title {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        /* Dropcap Modern */
        .editorial-dropcap::first-letter {
            font-family: 'Outfit', sans-serif;
            float: left;
            font-size: 6.2rem;
            line-height: 0.8;
            padding-top: 6px;
            padding-right: 14px;
            font-weight: 900;
            color: var(--uii-navy);
        }

        /* ==========================================================================
           2. NAVIGATION DESIGN WITH ANIMATION UPON SCROLL
           ========================================================================== */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
            padding: 24px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--uii-navy-dark);
            border-bottom: 4px solid var(--uii-gold);
            transition: var(--transition-lux); /* Animasi dasar saat kelas berubah */
        }

        /* Kelas Modifikasi Animasi yang akan dipicu oleh JavaScript saat di-scroll */
        nav.scrolled {
            padding: 12px 6%; /* Mengecil secara halus */
            background: rgba(4, 21, 48, 0.95); /* Menjadi sedikit transparan premium */
            backdrop-filter: blur(15px); /* Efek blur kaca di belakang bar */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15); /* Bayangan modern gantung */
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .logo-img {
            height: 46px;
            width: auto;
            transition: var(--transition-lux);
        }
        nav.scrolled .logo-img {
            height: 38px; /* Logo ikut menyesuaikan mengecil secara estetik */
        }

        .logo-text-box {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .logo-text-box .fak {
            color: #ffffff;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing:4px;
            font-weight: 400;
        }

        .logo-text-box .univ {
            color: var(--uii-gold);
            font-size: 1rem;
            font-weight: 1000;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-links a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 10px 22px;
            border-radius: 8px;
            transition: var(--transition-lux);
        }

        .nav-links a:hover, .nav-links a.active {
            color: var(--uii-navy-dark);
            background: var(--uii-gold);
            box-shadow: 0 4px 15px rgba(255, 209, 0, 0.35);
        }

        /* ==========================================================================
           3. COVER ARTICLE HEADER (Optimasi Tipografi Jelas & Bold)
           ========================================================================== */
        .article-cover {
            padding: 190px 24px 60px 24px;
            max-width: 1050px;
            margin: 0 auto;
            text-align: center;
        }

        .article-category {
            font-size: 0.95rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: var(--uii-gold-deep);
            margin-bottom: 25px;
        }

        .article-cover h1 {
            font-size: 3.8rem; /* Ukuran proporsional, tebal, dan anti pecah */
            color: var(--uii-navy); /* Menggunakan warna biru UII yang solid */
            line-height: 1.25;
            margin-bottom: 35px;
        }

        .article-meta {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            font-size: 1rem;
            color: var(--text-muted);
            border-top: 2px solid #E2E8F0;
            border-bottom: 2px solid #E2E8F0;
            padding: 18px 0;
            max-width: 750px;
            margin: 0 auto;
        }

        .meta-item strong {
            color: var(--uii-navy);
            font-weight: 700;
        }

        /* ==========================================================================
           4. MAIN ARTICLE CONTENT LAYOUT (Fokus Keterbacaan Sempurna)
           ========================================================================== */
        .article-container {
            max-width: 820px; /* Lebar terbaik untuk membaca baris teks panjang tanpa membuat lelah */
            margin: 0 auto 120px auto;
            padding: 0 24px;
        }

        /* Konten Paragraf Diperbesar & Jelas */
        .article-body p {
            font-size: 1.35rem; 
            color: var(--text-main);
            margin-bottom: 35px;
            text-align: justify;
            font-weight: 400;
        }

        /* Judul Sub-Seksi */
        .article-body h2 {
            font-size: 2.2rem;
            color: var(--uii-navy);
            margin: 65px 0 25px 0;
            border-left: 6px solid var(--uii-gold);
            padding-left: 20px;
            line-height: 1.3;
        }

        /* Blok Kutipan Besar Modern */
        .pull-quote {
            margin: 60px 0;
            padding: 45px;
            background: linear-gradient(135deg, var(--uii-navy-dark), var(--uii-navy));
            color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(11, 60, 130, 0.15);
        }

        .pull-quote p {
            font-family: 'Outfit', sans-serif;
            font-size: 1.9rem;
            font-style: italic;
            line-height: 1.5;
            color: var(--uii-gold);
            margin-bottom: 15px;
            text-align: left;
            font-weight: 600;
        }

        .pull-quote cite {
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #ffffff;
            display: block;
            font-style: normal;
            font-weight: 700;
        }

        /* Grid Infografis Data Sejarah */
        .article-data-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 25px;
            margin: 60px 0;
        }

        .data-node {
            background: #F8FAFC;
            border: 2px solid #E2E8F0;
            padding: 35px 20px;
            border-radius: 16px;
            text-align: center;
            transition: var(--transition-lux);
        }

        .data-node:hover {
            transform: translateY(-5px);
            border-color: var(--uii-gold);
            background-color: var(--uii-navy-dark);
        }

        .data-node .num {
            font-family: 'Outfit', sans-serif;
            font-size: 3.4rem;
            color: var(--uii-navy);
            font-weight: 800;
            line-height: 1;
            margin-bottom: 10px;
        }

        .data-node .lbl {
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
        }

        .data-node:hover .num { color: var(--uii-gold); }
        .data-node:hover .lbl { color: #ffffff; }

        /* ==========================================================================
           5. FOOTER DESIGN
           ========================================================================== */
        footer {
            background: var(--uii-navy-dark);
            color: rgba(255, 255, 255, 0.6);
            padding: 60px 24px;
            text-align: center;
            border-top: 5px solid var(--uii-gold);
            font-size: 1rem;
        }
    </style>
</head>
<body>

    <nav id="mainNavbar">
        <div class="logo-container">
            <img src="logo.png.png" alt="Logo UII" class="logo-img" onerror="this.src='logo.png'">
            <div class="logo-text-box">
                <span class="fak">FACULTY OF LAW</span>
                <span class="univ">UNIVERSITAS ISLAM INDONESIA</span>
            </div>
        </div>
        <div class="nav-links">
            <a href="sejarah.php" class="active">SEJARAH</a>
            <a href="beranda.php">BERANDA</a>
        </div>
    </nav>

    <header class="article-cover">
        <div class="article-category">Arsip Sejarah & Manifesto Akademik</div>
        <h1 class="editorial-title">Menapaki Pilar Hukum Kebangsaan: Setengah Abad Lebih Perjalanan Fakultas Hukum UII</h1>
        <div class="article-meta">
            <div class="meta-item">Naskah: <strong>Dewan Akademi FH</strong></div>
            <div class="meta-item">Tahun Berdiri: <strong>1948</strong></div>
            <div class="meta-item">Yurisdiksi: <strong>Nasional & Global</strong></div>
        </div>
    </header>

    <main class="article-container">
        <article class="article-body">
            
            <p class="editorial-dropcap">Fakultas Hukum Universitas Islam Indonesia (FH UII) tidak sekadar berdiri sebagai lembaga pencetak sarjana hukum semata, melainkan hadir sebagai buah pemikiran revolusioner para founding fathers Indonesia di masa-masa awal kemerdekaan. Sejarah mencatat bahwa embrio institusi ini lahir dari rahim perjuangan bangsa yang menginginkan supremasi hukum nasional berlandaskan pada fondasi moralitas keislaman yang universal dan berkeadilan sosial.</p>
            
            <p>Didirikan secara resmi pada tahun 1948 di Yogyakarta, Fakultas Hukum UII menempati posisi historis yang sangat sakral sebagai salah satu fakultas hukum swasta tertua di republik ini. Gagasan mulia ini diprakarsai oleh barisan intelektual dan ulama kharismatik Indonesia, termasuk di antaranya Mohammad Hatta, Mohammad Natsir, dan KH. Wahid Hasyim, yang melihat pentingnya benteng pertahanan yuridis untuk mengawal konstitusi serta kedaulatan negara yang baru seumur jagung.</p>

            <div class="article-data-grid">
                <div class="data-node"><div class="num">1948</div><div class="lbl">Tahun Berdiri Resmi</div></div>
                <div class="data-node"><div class="num">A</div><div class="lbl">Akreditasi Unggul</div></div>
                <div class="data-node"><div class="num">15K+</div><div class="lbl">Alumni Tersebar</div></div>
            </div>

            <h2 class="editorial-title">Para Perumus Cikal Bakal</h2>
            
            <p>Dalam perkembangannya, penataan kurikulum dan arah pergerakan akademik FH UII dimotori oleh tokoh-tokoh hukum legendaris nasional. Di antaranya adalah <strong>Prof. Mr. R.H.A. Soenardjo</strong>, yang bertindak sebagai Dekan Pertama sekaligus deklarator yang meletakkan dasar pengajaran hukum formal yang memadukan doktrin hukum tata negara barat dengan asas ketauhidan Islam. Pendekatan integratif ini memastikan bahwa setiap yuris yang lulus dari rahim FH UII memiliki ketajaman nalar hukum sekaligus kesalehan nurani yang tak tergoyahkan.</p>

            <p>Selain itu, peran <strong>Prof. Dr. MR. Pratikno</strong> turut memperkokoh kodifikasi pengajaran hukum praktis di era 1960-an. Beliau berhasil merumuskan sintesis baru yang mempertemukan kompleksitas hukum adat nusantara, positivisme hukum barat, dan nilai syariah. Transformasi progresif tersebut membuahkan hasil nyata berupa diakuinya sistem keilmuan FH UII sebagai salah satu kiblat pemikiran hukum paling berwibawa di tanah air.</p>

            <div class="pull-quote">
                <p>"Hukum tanpa moralitas adalah kehampaan; ia tidak akan melahirkan kedamaian, melainkan hanya tirani yang bersembunyi di balik lembaran undang-undang."</p>
                <cite>— Doktrin Fondasi Dasar Akademi FH UII</cite>
            </div>

            <h2 class="editorial-title">Transformasi Menuju Era Globalisasi</h2>
            
            <p>Memasuki abad ke-21, tantangan dunia hukum tidak lagi terbatas pada garis batas teritorial konvensional. Menyadari dinamika yurisdiksi digital dan hukum korporasi internasional yang bergerak cepat, Fakultas Hukum UII melakukan lompatan strategis yang revolusioner. Pembukaan *International Program* (IP) serta perolehan Akreditasi Unggul menjadi bukti sahih komitmen universitas dalam merajut kemitraan internasional bersama universitas-universitas elite di kawasan Asia, Eropa, hingga Australia.</p>

            <p>Kini, dengan ribuan alumni yang menduduki posisi strategis sebagai hakim agung, jaksa profesional, advokat internasional, hingga akademisi terkemuka, FH UII terus memantapkan posisinya. Melalui kurikulum mutakhir berbasis digitalisasi hukum, klinis hukum, dan integritas moral Islami, fakultas ini siap menyongsong masa depan, melahirkan para pembela kebenaran yang tangguh dan bermartabat demi tegaknya keadilan di bumi pertiwi.</p>

        </article>
    </main>

    <footer>
        <p>© 2026 Publikasi Resmi Dokumen Sejarah | <?php echo $fakultas . " " . $university; ?>.</p>
    </footer>

    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            // Jika halaman di-scroll ke bawah sejauh lebih dari 50px
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
