<?php
// PHP Data Component
$universitas = "Universitas Islam Indonesia";
$fakultas = "Fakultas Hukum";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Resmi - FH UII</title>
    
    <link rel="icon" type="image/png" href="logo.png.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --uii-blue: #0B3C82;       /* Navy Khas UII */
            --uii-blue-dark: #062047;  /* Deep Navy */
            --uii-gold: #FFD100;       /* Emas FH UII */
            --uii-gold-hover: #E6BC00;
            --bg-light: #F4F7FA;
            --text-dark: #1E293B;
            --text-muted: #64748B;
            --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 10px 25px -5px rgba(11, 60, 130, 0.1), 0 8px 10px -6px rgba(11, 60, 130, 0.05);
            --shadow-lg: 0 20px 40px -15px rgba(0, 0, 0, 0.08);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* Background Pattern Tekstur Modern */
        .pattern-bg {
            position: relative;
        }
        .pattern-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            opacity: 0.4;
            background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
            background-size: 24px 24px;
            z-index: -1;
        }

        /* Navigation Bar Glassmorphism */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999 !important;
            padding: 24px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: var(--transition);
            background: linear-gradient(to bottom, rgba(6, 32, 71, 0.85), rgba(6, 32, 71, 0));
        }

        nav.scrolled {
            background: rgba(11, 60, 130, 0.96) !important;
            padding: 14px 6%;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 10px 30px rgba(6, 32, 71, 0.15);
            border-bottom: 3px solid var(--uii-gold);
        }

        /* Logo Brand Area */
        .logo-area {
            display: flex;
            align-items: center;
            gap: 14px;
            cursor: pointer;
        }

        .logo-img {
            height: 56px; 
            width: auto;
            object-fit: contain;
            transition: var(--transition);
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.15));
        }

        .logo-text-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            line-height: 1.1;
            border-left: 2px solid rgba(255, 255, 255, 0.25);
            padding-left: 12px;
        }

        .logo-text-container .txt-fakultas {
            color: #ffffff;
            font-weight: 400;
            font-size: 0.6rem;
            letter-spacing: 4px;
            text-transform: uppercase;
        }

        .logo-text-container .txt-hukum {
            color: var(--uii-gold);
            font-weight: 1000;
            font-size: 1rem;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .logo-area:hover .logo-img {
            transform: translateY(-2px) scale(1.03);
        }

        /* Tombol Titik Tiga Melayang */
        .dot-menu-toggle {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 4px;
            cursor: pointer;
            z-index: 10005 !important;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .dot-menu-toggle:hover {
            background: var(--uii-gold) !important;
            border-color: var(--uii-gold) !important;
            box-shadow: 0 8px 20px rgba(255, 209, 0, 0.3);
            transform: scale(1.05);
        }

        .dot-menu-toggle span {
            display: block;
            width: 5px;
            height: 5px;
            background-color: #ffffff !important;
            border-radius: 50%;
            transition: var(--transition);
            pointer-events: none;
        }

        .dot-menu-toggle:hover span {
            background-color: var(--uii-blue-dark) !important;
        }

        /* Animasi Hamburger Titik Tiga Menu Aktif */
        .dot-menu-toggle.active {
            background: var(--uii-gold) !important;
            border-color: var(--uii-gold) !important;
        }
        .dot-menu-toggle.active span {
            background-color: var(--uii-blue-dark) !important;
        }
        .dot-menu-toggle.active span:nth-child(1) { transform: translateY(9px) scale(1.2); }
        .dot-menu-toggle.active span:nth-child(2) { transform: scale(0); }
        .dot-menu-toggle.active span:nth-child(3) { transform: translateY(-9px) scale(1.2); }

        /* Sidebar Menu Minimalis Panel */
        .sidebar-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 340px;
            height: 100vh;
            background: rgba(6, 32, 71, 0.98);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            z-index: 10000 !important;
            padding: 130px 30px 30px 30px;
            box-shadow: -15px 0 40px rgba(6, 32, 71, 0.2);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            gap: 14px;
            border-left: 4px solid var(--uii-gold);
        }

        .sidebar-menu.open {
            right: 0;
        }

        .sidebar-menu .menu-label {
            font-size: 0.72rem;
            color: rgba(255, 255, 255, 0.35);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 15px 0 4px 5px;
            font-weight: 700;
        }

        .sidebar-menu .menu-label:first-child { margin-top: 0; }

        .sidebar-menu a {
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 600;
            transition: var(--transition);
            padding: 15px 20px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.03);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid rgba(255, 255, 255, 0.03);
            cursor: pointer;
        }

        .sidebar-menu a:hover {
            color: var(--uii-blue-dark);
            background: var(--uii-gold);
            padding-left: 26px;
            box-shadow: 0 8px 20px rgba(255, 209, 0, 0.15);
        }

        /* Gaya Tombol DATA DIRI yang Ditingkatkan */
        #link-menu-data-diri {
           display: flex;
           justify-content: space-between;
           align-items: center;
           padding: 11px 16px;
           color: #ffffff;
           text-decoration: none;
       /* Menggunakan gradasi Navy khas UII yang solid dan mewah */
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.08) 0%, rgba(255, 255, 255, 0.03) 100%);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            font-family: 'Segoe UI', system-ui, sans-serif;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 0.8px;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
}        

/* Efek menyala bawaan saat hover */
#link-menu-data-diri:hover {
    color: #ffffff;
    background: rgba(255, 255, 255, 0.15) !important;
    border-color: rgba(255, 255, 255, 0.3);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    transform: translateY(-1px);
}

        /* Hero Section Berkelas */
        .hero {
            height: 85vh;
            background: linear-gradient(rgba(4, 21, 48, 0.82), rgba(11, 60, 130, 0.88)), url('bg-hero.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #ffffff;
            padding: 0 24px;
            position: relative;
            z-index: 1;
        }

        .hero-content {
            max-width: 850px;
            animation: fadeIn Hero 1s ease;
        }

        .hero-content h2 {
            font-size: 3.8rem;
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -0.5px;
            line-height: 1.2;
            text-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .hero-content p {
            font-size: 1.25rem;
            margin-bottom: 40px;
            color: rgba(255, 255, 255, 0.85);
            line-height: 1.6;
            font-weight: 400;
        }

        /* Tombol Panggil Aksi Premium (CTA) */
        .cta-btn {
            background: var(--uii-gold);
            color: var(--uii-blue-dark);
            padding: 18px 42px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            border: none;
            display: inline-block;
            transition: var(--transition);
            box-shadow: 0 10px 28px rgba(255, 209, 0, 0.35);
            letter-spacing: 0.5px;
        }

        .cta-btn:hover {
            background: #ffffff;
            color: var(--uii-blue);
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(255, 255, 255, 0.2);
        }

        /* Grid Kartu Statistik Kreatif */
        .stats-container {
            max-width: 1140px;
            margin: -75px auto 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            padding: 0 24px;
            z-index: 10;
            position: relative;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 35px 30px;
            text-align: center;
            box-shadow: var(--shadow-lg);
            border-top: 5px solid var(--uii-blue);
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(11, 60, 130, 0.15);
            border-top-color: var(--uii-gold);
        }

        .stat-card h3 {
            font-size: 3rem;
            font-weight: 800;
            color: var(--uii-blue);
            margin-bottom: 6px;
            letter-spacing: -1px;
        }

        .stat-card p {
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Komponen Deskripsi Sejarah */
        .section-sejarah {
            max-width: 1140px;
            margin: 100px auto;
            padding: 0 24px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 60px;
            align-items: center;
        }

        @media (min-width: 768px) {
            .section-sejarah { grid-template-columns: 1.2fr 0.8fr; }
        }

        .sejarah-text h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 24px;
            color: var(--uii-blue);
            letter-spacing: -0.5px;
        }

        .sejarah-text p {
            line-height: 1.9;
            color: #475569;
            font-size: 1.05rem;
            text-align: justify;
        }
`
        .nilai-card {
            background: #ffffff; 
            padding: 40px; 
            border-radius: 24px; 
            box-shadow: var(--shadow-md); 
            border-left: 6px solid var(--uii-gold);
            position: relative;
        }

        .nilai-card h3 {
            color: var(--uii-blue); 
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .nilai-card p {
            color: var(--text-muted); 
            font-style: italic;
            line-height: 1.7;
            font-size: 1rem;
        }

        /* Kaki Halaman (Footer) */
        footer {
            background: var(--uii-blue-dark);
            color: rgba(255,255,255,0.55);
            padding: 40px 24px;
            text-align: center;
            border-top: 5px solid var(--uii-gold);
            font-size: 0.95rem;
            font-weight: 500;
        }
    </style>
</head>
<body class="pattern-bg">

    <nav id="navbar">
        <div class="logo-area" id="btn-logo-home">
            <img src="logo.png.png" alt="Logo FH UII" class="logo-img" onerror="this.src='logo.png'">
            <div class="logo-text-container">
                <span class="txt-fakultas">FACULTY OF LAW</span>
                <span class="txt-hukum">UNIVERSITAS ISLAM INDONESIA</span>
            </div>
        </div>
        
        <div class="dot-menu-toggle" id="menuToggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

  <div class="sidebar-menu" id="sidebarMenu" style="padding-top: 50px !important;">
    <div style="display: flex; align-items: center; gap: 12px; padding: 10px 15px 15px 10px !important; width: 100%; box-sizing: border-box;">
        <img src="logo.png.png" alt="Logo" style="width: 40px; height: auto; object-fit: contain; flex-shrink: 0; margin-left: -5px;">
        <a href="biodata.php" id="link-menu-profil" style="flex-grow: 1; margin: 0; display: flex; justify-content: space-between; align-items: center;">
            DATA DIRI<span>&rarr;</span>
        </a>
    </div>
    <div class="menu-label">Navigasi Internal</div>
    <a id="link-menu-profil">BERANDA<span>&rarr;</span></a>
    <a id="link-menu-absen">ABSENSI<span>&rarr;</span></a>

    <div class="menu-label">Tautan Eksternal</div>
    <a href="https://law.uii.ac.id" target="_blank" style="border-left: 3px solid var(--uii-gold);">WEBSITE RESMI FH UII<span>&rarr;</span></a>
    <a href="https://www.uii.ac.id" target="_blank" style="border-left: 3px solid var(--uii-gold);">WEBSITE RESMI UII<span>&rarr;</span></a>
</div>

    <section class="hero">
        <div class="hero-content">
            <h2><?php echo $fakultas; ?> UII</h2>
            <p>Mencetak Praktisi Yuridis Profesional, Unggul, dan Berintegritas Tinggi Berdasarkan Nilai-Nilai Islam Universal.</p>
            <button class="cta-btn" id="btn-buka-absen">SEJARAH FH UII</button>
        </div>
    </section>

    <section class="stats-container" id="js-stats-target"></section>

    <section class="section-sejarah">
        <div class="sejarah-text">
            <h2>Berkembang Pesat & Dinamis</h2>
            <p>Fakultas Hukum Universitas Islam Indonesia (FH UII) didirikan sebagai bagian dari cita-cita luhur bangsa untuk menghadirkan pendidikan tinggi yang memadukan komitmen keagamaan (keislaman) dan kemahiran profesional keilmuan. Sebagai salah satu fakultas hukum tertua di Indonesia, FH UII terus bertransformasi mengadopsi standarisasi kurikulum internasional guna melahirkan lulusan berdaya saing global.</p>
        </div>
        <div class="nilai-card">
            <h3>Nilai Nilai Dasar</h3>
            <p>"Menjunjung tinggi kebenaran, integritas moral, serta berkomitmen mewujudkan kepastian hukum yang berkeadilan bagi seluruh lapisan masyarakat sipil."</p>
        </div>
    </section>

    <footer>
        <p>© 2026 Fakultas Hukum Universitas Islam Indonesia • Kinerja Server WSL Lokal</p>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // 1. Data Statistik Dinamis
            const dataStatistik = [
                { angka: "A", label: "Akreditasi Unggul" },
                { angka: "1948", label: "Tahun Berdiri" },
                { angka: "6", label: "Program Studi" },
                { angka: "15K+", label: "Total Alumni" }
            ];

            const targetContainer = document.getElementById('js-stats-target');
            if(targetContainer) {
                targetContainer.innerHTML = ""; 
                dataStatistik.forEach(item => {
                    const card = document.createElement('div');
                    card.className = 'stat-card';
                    card.innerHTML = `<h3>${item.angka}</h3><p>${item.label}</p>`;
                    targetContainer.appendChild(card);
                });
            }

            // 2. Mesin Navigasi Klik Amans
            function pindahHalaman(tujuan) {
                window.location.href = tujuan;
            }

            document.getElementById('btn-logo-home').addEventListener('click', () => pindahHalaman('profil.php'));
            document.getElementById('link-menu-profil').addEventListener('click', () => pindahHalaman('profil.php'));
            document.getElementById('btn-buka-absen').addEventListener('click', () => pindahHalaman('sejarah.php'));
            document.getElementById('link-menu-absen').addEventListener('click', () => pindahHalaman('index.php'));

            // 3. Detektor Scroll Navbar Efek Kaca (Glassmorphism)
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 40) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // 4. Logika Buka/Tutup Menu Titik Tiga & Sidebar
            const menuToggle = document.getElementById('menuToggle');
            const sidebarMenu = document.getElementById('sidebarMenu');

            if(menuToggle && sidebarMenu) {
                menuToggle.addEventListener('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    this.classList.toggle('active');
                    sidebarMenu.classList.toggle('open');
                });

                // Deteksi klik di luar area sidebar untuk menutup otomatis
                document.addEventListener('click', function(event) {
                    if (!sidebarMenu.contains(event.target) && !menuToggle.contains(event.target)) {
                        menuToggle.classList.remove('active');
                        sidebarMenu.classList.remove('open');
                    }
                });
            }
        });
    </script>
        <script>
document.addEventListener("DOMContentLoaded", function() {
    // 1. Ambil semua elemen kartu statistik yang ada di halaman
    const statCards = document.querySelectorAll('.stat-card, [class*="card"]');

    statCards.forEach(card => {
        // Ubah kursor menjadi pointer saat didekati agar pengguna tahu ini bisa diklik
        card.style.cursor = 'pointer';

        // 2. Tambahkan logika klik pada setiap kartu
        card.addEventListener('click', function(event) {
            // Cegah perilaku bawaan jika elemen aslinya adalah tag anchor <a>
            event.preventDefault(); 

            // Cari tag judul (H3) di dalam kartu untuk mengidentifikasi tombol
            const heading = card.querySelector('h3');
            if (!heading) return;

            const textValue = heading.textContent.trim().toUpperCase();

            // 3. Sistem Pengalihan Rute (Routing) sesuai permintaan Anda
            if (textValue === 'A') {
                window.location.href = 'akreditasi.php';
            } else if (textValue === '1948') {
                window.location.href = 'tahun.php';
            } else if (textValue === '6') {
                window.location.href = 'prodi.php';
            } else if (textValue === '15K+') {
                window.location.href = 'alumni.php';
            }
        });
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Ambil semua elemen kartu statistik
    const statCards = document.querySelectorAll('.stat-card, [class*="card"]');

    statCards.forEach(card => {
        // Ubah kursor menjadi pointer saat diarahkan ke kartu
        card.style.cursor = 'pointer';

        card.addEventListener('click', function(event) {
            // Cegah tabrakan dengan link default bawaan HTML lama
            event.preventDefault();

            const heading = card.querySelector('h3');
            if (!heading) return;

            const textValue = heading.textContent.trim().toUpperCase();

            // Jalur redirect sesuai instruksi Anda
            if (textValue === 'A') {
                window.location.href = 'akreditasi.php';
            } else if (textValue === '1948') {
                window.location.href = 'tahun.php';
            } else if (textValue === '6') {
                window.location.href = 'prodi.php';
            } else if (textValue === '15K+') {
                window.location.href = 'alumni.php';
            }
        });
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const checkExist = setInterval(function() {
        const statCards = document.querySelectorAll('.stat-card');
        
        if (statCards.length > 0) {
            clearInterval(checkExist);

            statCards.forEach(card => {
                // Set dasar container kartu
                card.style.position = 'relative';
                card.style.overflow = 'hidden';
                card.style.transition = 'background-color 0.4s cubic-bezier(0.25, 1, 0.5, 1), box-shadow 0.4s cubic-bezier(0.25, 1, 0.5, 1)';

                const statNumber = card.querySelector('h3');
                const statLabel = card.querySelector('p');
                
                if (statNumber && statLabel) {
                    // Transisi halus bawaan elemen asli Anda
                    statNumber.style.transition = 'opacity 0.35s ease, transform 0.35s cubic-bezier(0.25, 1, 0.5, 1)';
                    statLabel.style.transition = 'opacity 0.35s ease, transform 0.35s cubic-bezier(0.25, 1, 0.5, 1)';

                    // Membuat elemen "MASUK" yang stand-by di tengah
                    const masukText = document.createElement('div');
                    masukText.innerText = 'MASUK';
                    
                    // Mengatur style
                    Object.assign(masukText.style, {
                        position: 'absolute',
                        top: '50%',
                        left: '50%',
                        transform: 'translate(-50%, -50%) scale(0.8)',
                        opacity: '0',
                        visibility: 'hidden',
                        color: '#ffffff',
                        fontSize: '2.1rem',
                        fontFamily: "'Inter', 'Segoe UI', system-ui, sans-serif",
                        fontWeight: '900',
                        letterSpacing: '0.3px',
                        transition: 'opacity 0.4s cubic-bezier(0.25, 1, 0.5, 1), transform 0.4s cubic-bezier(0.25, 1, 0.5, 1)',
                        zIndex: '10'
                    });
                    
                    card.appendChild(masukText);

                    // 1. KURSOR MASUK (HOVER)
                    card.addEventListener('mouseenter', function() {
                        card.style.backgroundColor = '#0a192f'; 
                        card.style.boxShadow = '0 15px 35px rgba(10, 25, 47, 0.3)';
                        
                        statNumber.style.opacity = '0';
                        statNumber.style.transform = 'scale(0.7)';
                        
                        statLabel.style.opacity = '0';
                        statLabel.style.transform = 'translateY(10px) scale(0.9)';
                        
                        masukText.style.visibility = 'visible';
                        masukText.style.opacity = '1';
                        masukText.style.transform = 'translate(-50%, -50%) scale(1)';
                    });

                    // 2. KURSOR KELUAR (LEAVE)
                    card.addEventListener('mouseleave', function() {
                        card.style.backgroundColor = '';
                        card.style.boxShadow = '';
                        
                        statNumber.style.opacity = '1';
                        statNumber.style.transform = 'scale(1)';
                        
                        statLabel.style.opacity = '1';
                        statLabel.style.transform = 'translateY(0) scale(1)';
                        
                        masukText.style.opacity = '0';
                        masukText.style.transform = 'translate(-50%, -50%) scale(0.8)';
                        
                        setTimeout(() => {
                            if (masukText.style.opacity === '0') {
                                masukText.style.visibility = 'hidden';
                            }
                        }, 400);
                    });
                }
            });
        }
    }, 100);
});
</script>

</body>
</html>
