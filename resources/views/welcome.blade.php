<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MASJID AL-IRSYAD</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            overflow-x: hidden;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        /* ============================================
   2. HEADER - MOBILE FIRST
   ============================================ */
        header {
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            padding: 12px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Logo - Mobile First */
        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1rem;
            font-weight: 600;
            color: white;
        }

        .logo i {
            font-size: 1.5rem;
            color: #f39c12;
        }

        /* Navigation - Mobile First */
        nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-button {
            background: linear-gradient(45deg, #e74c3c, #f39c12);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            box-shadow: 0 2px 10px rgba(231, 76, 60, 0.3);
            transition: transform 0.2s;
        }

        .dropdown-button:active {
            transform: translateY(-2px);
        }

        .dropdown-button i {
            margin-right: 5px;
        }

        /* Admin Icon Button - Mobile First */
        .admin-link {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 2px 10px rgba(39, 174, 96, 0.3);
            transition: all 0.2s;
        }

        .admin-link:active {
            transform: translateY(-2px);
        }

        .admin-link i {
            font-size: 1.1rem;
            margin: 0;
        }

        /* Dropdown Content */
        .dropdown-content {
            display: none;
            position: absolute;
            top: 110%;
            right: 0;
            background: white;
            min-width: 180px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 15px;
            color: #2c3e50;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background 0.2s;
        }

        .dropdown-content a:hover {
            background: #f8f9fa;
        }

        .dropdown-content a i {
            width: 20px;
            color: #3498db;
        }

        /* ============================================
   3. HERO SECTION - MOBILE FIRST
   ============================================ */
        .hero {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.7), rgba(52, 152, 219, 0.3));
            text-align: center;
            padding: 60px 20px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
            animation: float 20s infinite linear;
        }

        .main-hero-text {
            font-size: clamp(1.5rem, 5vw, 3.5rem);
            font-weight: 700;
            color: white;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
            animation: fadeInUp 1s ease;
            position: relative;
            z-index: 2;
        }

        .hero-subtitle {
            font-size: clamp(1rem, 3vw, 2rem);
            color: #f39c12;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 1s ease 0.5s both;
            position: relative;
            z-index: 2;
        }

        /* ============================================
   4. MAIN CONTENT - MOBILE FIRST
   ============================================ */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px;
        }

        /* ============================================
   5. SECTIONS - MOBILE FIRST
   ============================================ */
        .section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            margin: 20px 0;
            border-radius: 16px;
            padding: 20px 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            width: 100%;
            clear: both;
        }

        .section h2 {
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 15px;
        }

        .section h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(45deg, #3498db, #e74c3c);
            border-radius: 2px;
        }

        .section h2 i {
            font-size: 1.3rem;
            margin-right: 8px;
        }

        /* ============================================
   6. CARDS - MOBILE FIRST
   ============================================ */
        .cards-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
            margin-top: 20px;
            width: 100%;
        }

        .card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(52, 152, 219, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .card:active {
            transform: scale(0.98);
        }

        .card h3 {
            color: #2c3e50;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .card h3 i {
            font-size: 1rem;
        }

        .card p {
            font-size: 0.9rem;
            line-height: 1.6;
            color: #555;
        }

        /* ============================================
   7. CAROUSEL - MOBILE FIRST
   ============================================ */
        .carousel-container {
            position: relative;
            max-width: 100%;
            margin: 20px auto;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .carousel {
            display: flex;
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .carousel img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .carousel-buttons {
            text-align: center;
            margin-top: 15px;
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .carousel-buttons button {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
            border: none;
            padding: 10px 14px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(52, 152, 219, 0.3);
            font-size: 0.9rem;
        }

        .carousel-buttons button:active {
            transform: scale(0.95);
        }

        /* ============================================
   8. BUTTONS - MOBILE FIRST
   ============================================ */
        .register-button {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 15px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
            position: relative;
            overflow: hidden;
        }

        .register-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .register-button:active {
            transform: scale(0.98);
        }

        .register-button i {
            font-size: 0.9rem;
        }

        /* ============================================
   9. MODALS - MOBILE FIRST
   ============================================ */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 2000;
        }

        .modal-content {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 25px 20px;
            border-radius: 16px;
            max-width: 500px;
            width: 90%;
            max-height: 85vh;
            overflow-y: auto;
            text-align: center;
            position: relative;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            animation: slideIn 0.3s ease;
        }

        .modal-content h2 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .modal-content p {
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .modal-content img {
            max-width: 100%;
            height: auto;
        }

        .close-button {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            margin: 8px;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(231, 76, 60, 0.3);
        }

        .close-button:active {
            transform: scale(0.98);
        }

        /* ============================================
   10. FOOTER - MOBILE FIRST
   ============================================ */
        footer {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            text-align: center;
            padding: 25px 15px;
            margin-top: 30px;
            position: relative;
            overflow: hidden;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.05)"/></svg>') repeat;
            animation: float 15s infinite linear;
        }

        footer p {
            font-size: 0.95rem;
            margin-bottom: 8px;
            position: relative;
            z-index: 2;
        }

        footer a {
            font-size: 0.9rem;
            margin: 0 8px;
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
            position: relative;
            z-index: 2;
        }

        footer div {
            position: relative;
            z-index: 2;
        }

        /* ============================================
   11. SCROLL TO TOP - MOBILE FIRST
   ============================================ */
        .scroll-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:active {
            transform: translateY(-2px);
        }

        /* ============================================
   12. ANIMATIONS
   ============================================ */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }

            100% {
                transform: translateY(-100px) rotate(360deg);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px) scale(0.8);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes gradientShift {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        /* ============================================
   13. TABLET STYLES (min-width: 768px)
   ============================================ */
        @media (min-width: 768px) {

            /* Header */
            header {
                padding: 15px 0;
            }

            .logo {
                font-size: 1.3rem;
            }

            .logo i {
                font-size: 1.8rem;
            }

            .dropdown-button {
                padding: 10px 20px;
                font-size: 1rem;
            }

            .dropdown-button:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(231, 76, 60, 0.4);
            }

            .admin-link {
                width: 44px;
                height: 44px;
            }

            .admin-link:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(39, 174, 96, 0.4);
            }

            .admin-link i {
                font-size: 1.2rem;
            }

            nav {
                gap: 12px;
            }

            .dropdown-content {
                min-width: 200px;
            }

            /* Hero */
            .hero {
                padding: 80px 30px;
            }

            /* Main Content */
            .main-content {
                padding: 20px;
            }

            /* Sections */
            .section {
                padding: 30px 25px;
                margin: 25px 0;
                border-radius: 18px;
            }

            .section h2 {
                font-size: 1.8rem;
                margin-bottom: 25px;
            }

            .section h2 i {
                font-size: 1.6rem;
            }

            /* Cards */
            .cards-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
                margin-top: 30px;
            }

            .card {
                padding: 25px;
                border-radius: 18px;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            }

            .card:hover::before {
                left: 100%;
            }

            .card h3 {
                font-size: 1.3rem;
                margin-bottom: 15px;
            }

            .card h3 i {
                font-size: 1.2rem;
            }

            .card p {
                font-size: 1rem;
            }

            /* Carousel */
            .carousel-container {
                margin: 25px auto;
                border-radius: 18px;
            }

            .carousel img {
                height: 300px;
            }

            .carousel-buttons {
                margin-top: 18px;
                gap: 12px;
            }

            .carousel-buttons button {
                padding: 12px 16px;
                font-size: 1rem;
            }

            .carousel-buttons button:hover {
                transform: translateY(-2px) scale(1.05);
                box-shadow: 0 4px 12px rgba(52, 152, 219, 0.4);
            }

            /* Buttons */
            .register-button {
                padding: 14px 28px;
                font-size: 1rem;
                border-radius: 30px;
            }

            .register-button:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 18px rgba(231, 76, 60, 0.4);
            }

            .register-button:hover::before {
                left: 100%;
            }

            /* Modals */
            .modal-content {
                padding: 35px 30px;
                width: 80%;
                border-radius: 18px;
            }

            .modal-content h2 {
                font-size: 1.6rem;
                margin-bottom: 18px;
            }

            .modal-content p {
                font-size: 1rem;
            }

            .close-button {
                padding: 12px 24px;
                font-size: 1rem;
                margin: 10px;
            }

            .close-button:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(231, 76, 60, 0.4);
            }

            /* Footer */
            footer {
                padding: 30px 20px;
            }

            footer p {
                font-size: 1rem;
            }

            footer a {
                font-size: 1rem;
            }

            /* Scroll to Top */
            .scroll-top {
                width: 55px;
                height: 55px;
                bottom: 25px;
                right: 25px;
            }

            .scroll-top:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 25px rgba(52, 152, 219, 0.4);
            }
        }

        /* ============================================
   14. DESKTOP STYLES (min-width: 1024px)
   ============================================ */
        @media (min-width: 1024px) {

            /* Header */
            .logo {
                font-size: 1.5rem;
            }

            .logo i {
                font-size: 2rem;
            }

            .admin-link {
                width: 48px;
                height: 48px;
            }

            .admin-link i {
                font-size: 1.3rem;
            }

            nav {
                gap: 15px;
            }

            /* Hero */
            .hero {
                padding: 100px 40px;
            }

            /* Main Content */
            .main-content {
                padding: 30px;
            }

            /* Sections */
            .section {
                padding: 40px;
                margin: 35px 0;
                border-radius: 20px;
            }

            .section h2 {
                font-size: 2.2rem;
                margin-bottom: 30px;
            }

            .section h2::after {
                width: 80px;
            }

            /* Cards */
            .cards-container {
                grid-template-columns: repeat(3, 1fr);
                gap: 25px;
            }

            .card {
                padding: 30px;
                border-radius: 20px;
            }

            .card:hover {
                transform: translateY(-8px) rotateX(3deg);
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            }

            .card h3 {
                font-size: 1.5rem;
            }

            /* Carousel */
            .carousel-container {
                max-width: 800px;
                margin: 30px auto;
                border-radius: 20px;
            }

            .carousel img {
                height: 400px;
            }

            .carousel-buttons {
                margin-top: 20px;
                gap: 15px;
            }

            .carousel-buttons button {
                padding: 12px 18px;
            }

            /* Buttons */
            .register-button {
                padding: 15px 30px;
                border-radius: 50px;
            }

            /* Modals */
            .modal-content {
                width: 70%;
                max-width: 500px;
                padding: 40px;
                border-radius: 20px;
            }

            .modal-content h2 {
                font-size: 1.8rem;
            }

            /* Footer */
            footer {
                padding: 35px;
            }

            /* Scroll to Top */
            .scroll-top {
                width: 60px;
                height: 60px;
                bottom: 30px;
                right: 30px;
            }
        }

        /* ============================================
   15. LARGE DESKTOP STYLES (min-width: 1200px)
   ============================================ */
        @media (min-width: 1200px) {

            /* Hero */
            .hero {
                padding: 120px 40px;
            }

            /* Sections */
            .section {
                padding: 50px;
            }

            .section h2 {
                font-size: 2.5rem;
            }

            /* Carousel */
            .carousel img {
                height: 450px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER SECTION -->
    <header>
        <div class="header-content">
            <div class="logo">
                <i class="fas fa-mosque"></i>
                <strong>MASJID AL IRSYAD</strong>
            </div>
            <nav>
                <div class="dropdown">
                    <button class="dropdown-button">
                        <i class="fas fa-bars"></i> Menu
                    </button>
                    <div class="dropdown-content">
                        <a href="#"><i class="fas fa-calendar"></i> Acara</a>
                        <a href="#donate"><i class="fas fa-heart"></i> Sumbangan</a>
                        <a href="{{ route('anak-kariah.view') }}"><i class="fas fa-users"></i> Daftar Anak Kariah</a>
                        <a href="javascript:void(0);" onclick="showContactModal()"><i class="fas fa-phone"></i>
                            Hubungi</a>
                    </div>
                </div>
                <a href="{{ route('login') }}" class="admin-link">
                    <i class="fas fa-user-shield"></i>
                </a>
            </nav>
        </div>
    </header>

    <!-- AUTO-OPEN MODAL -->
    <div id="autoOpenModal" class="modal">
        <div class="modal-content">
            <h2><i class="fas fa-mosque"></i> Selamat Datang ke Laman Web Masjid Al-Irsyad</h2>
            <p>Jika anda adalah anak kariah, sila daftar untuk mendapat manfaat penuh dari program kami</p>
            <a href="{{ route('anak-kariah.view') }}" class="register-button">
                <i class="fas fa-user-plus"></i> Daftar Anak Kariah
            </a>
            <button class="close-button" onclick="closeModal()">
                <i class="fas fa-times"></i> Tutup
            </button>
        </div>
    </div>

    <!-- Modal for contact number -->
    <div id="contactModal" class="modal">
        <div class="modal-content">
            <h2><i class="fas fa-phone"></i> Nombor Pengurusan Masjid</h2>
            <p>Hubungi kami di:</p>
            <p><strong><i class="fas fa-user"></i> +60 11-2417 1668</strong> (Tuan Imam)</p>
            <p><strong><i class="fas fa-user-tie"></i> +60111111111</strong> (Pengurus)</p>
            <button class="close-button" onclick="closeContactModal()">
                <i class="fas fa-times"></i> Tutup
            </button>
        </div>
    </div>

    <!-- HERO SECTION -->
    <div class="hero">
        <h1 class="main-hero-text">SELAMAT DATANG KE MASJID AL-IRSYAD, TELOK BAGAN</h1>
        <p class="hero-subtitle">🕌 Masjid Mesra Jemaah 🕌</p>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- CAROUSEL FOR PROGRAM MASJID -->
        <div class="section" id="program-masjid">
            <h2><i class="fas fa-calendar-alt"></i> Program Masjid</h2>
            <div class="carousel-container">
                <div class="carousel" id="programCarousel">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 400'><rect width='800' height='400' fill='%23667eea'/><text x='400' y='200' text-anchor='middle' fill='white' font-family='Arial' font-size='24'>Program Masjid 1</text></svg>"
                        alt="Program 1">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 400'><rect width='800' height='400' fill='%23764ba2'/><text x='400' y='200' text-anchor='middle' fill='white' font-family='Arial' font-size='24'>Program Masjid 2</text></svg>"
                        alt="Program 2">
                </div>
            </div>
            <div class="carousel-buttons">
                <button onclick="previousSlide('programCarousel')">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button onclick="nextSlide('programCarousel')">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- CAROUSEL FOR KULIAH MAGHRIB -->
        <div class="section" id="kuliah-maghrib">
            <h2><i class="fas fa-book-open"></i> Kuliah Maghrib</h2>
            <div class="carousel-container">
                <div class="carousel" id="kuliahCarousel">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 400'><rect width='800' height='400' fill='%23e74c3c'/><text x='400' y='200' text-anchor='middle' fill='white' font-family='Arial' font-size='24'>Kuliah Maghrib 1</text></svg>"
                        alt="Kuliah 1">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 400'><rect width='800' height='400' fill='%23f39c12'/><text x='400' y='200' text-anchor='middle' fill='white' font-family='Arial' font-size='24'>Kuliah Maghrib 2</text></svg>"
                        alt="Kuliah 2">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 400'><rect width='800' height='400' fill='%2327ae60'/><text x='400' y='200' text-anchor='middle' fill='white' font-family='Arial' font-size='24'>Kuliah Maghrib 3</text></svg>"
                        alt="Kuliah 3">
                </div>
            </div>
            <div class="carousel-buttons">
                <button onclick="previousSlide('kuliahCarousel')">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button onclick="nextSlide('kuliahCarousel')">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- CAROUSEL FOR IMAGE DISPLAY -->
        <div class="section" id="image-display">
            <h2><i class="fas fa-clock"></i> Jadual Kuliah</h2>
            <div class="carousel-container">
                <div class="carousel" id="imageCarousel">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 400'><rect width='800' height='400' fill='%233498db'/><text x='400' y='180' text-anchor='middle' fill='white' font-family='Arial' font-size='20'>Jadual Kuliah</text><text x='400' y='220' text-anchor='middle' fill='white' font-family='Arial' font-size='16'>Januari 2025</text></svg>"
                        alt="Jadual Kuliah" id="image-display-img">
                </div>
            </div>
            <div class="carousel-buttons">
                <button onclick="previousSlide('imageCarousel')">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button onclick="nextSlide('imageCarousel')">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <button onclick="downloadImage()">
                    <i class="fas fa-download"></i> Download
                </button>
            </div>
        </div>

        <!-- ANAK KARIAH REGISTRATION SECTION -->
        <div class="section">
            <h2><i class="fas fa-user-plus"></i> Pendaftaran Anak Kariah</h2>
            <div class="cards-container">
                <div class="card">
                    <h3><i class="fas fa-question-circle"></i> Mengapa Mendaftar?</h3>
                    <p>Kami sedang mengumpul maklumat tentang Anak Kariah untuk memastikan pengagihan bantuan dan
                        perkhidmatan sokongan yang berkesan. Penyertaan anda akan membantu kami melayani anda dengan
                        lebih baik.</p>
                </div>
                <div class="card">
                    <h3><i class="fas fa-edit"></i> Daftar Sekarang</h3>
                    <p>Klik butang di bawah untuk mengisi borang pendaftaran Anak Kariah. Ia hanya mengambil masa
                        beberapa minit!</p>
                    <a href="{{ route('anak-kariah.view') }}" class="register-button">
                        <i class="fas fa-user-plus"></i> Daftar Di Sini
                    </a>
                </div>
                <div class="card">
                    <h3><i class="fas fa-users"></i> Siapa Yang Patut Mendaftar?</h3>
                    <p>Semua anak kariah Masjid Al-Irsyad digalakkan untuk mendaftar bagi mendapat manfaat daripada
                        program dan bantuan yang akan datang.</p>
                </div>
            </div>
        </div>

        <!-- DONATE SECTION -->
        <div class="section" id="donate">
            <h2><i class="fas fa-heart"></i> Sumbangan</h2>
            <div class="cards-container">
                <div class="card">
                    <h3><i class="fas fa-info-circle"></i> Mengapa Sumbangan Penting?</h3>
                    <p>Sumbangan anda membantu kami untuk mengekalkan operasi masjid, menjalankan aktiviti keagamaan,
                        dan menyokong komuniti setempat dengan pelbagai program sosial.</p>
                </div>
                <div class="card">
                    <h3><i class="fas fa-credit-card"></i> Cara Menyumbang</h3>
                    <p>Anda boleh menyumbang melalui pindahan bank atau secara dalam talian. Semua sumbangan anda adalah
                        amat dihargai.</p>
                    <p>
                        <strong><i class="fas fa-university"></i> Maklumat Akaun Bank:</strong><br>
                        Bank Islam Malaysia Berhad<br>
                        Nama Akaun: Masjid Al-Irsyad<br>
                        Nombor Akaun: 02105010008808
                    </p>
                    <a href="javascript:void(0);" class="register-button" onclick="showQRModal()">
                        <i class="fas fa-qrcode"></i> Lihat QR Code
                    </a>
                </div>
            </div>
        </div>

        <div id="qrModal" class="modal">
            <div class="modal-content">
                <h2><i class="fas fa-qrcode"></i> QR Code Sumbangan</h2>
                <p>Imbas kod ini untuk menyumbang:</p>
                <img id="qrCodeImage"
                    src="data:image/svg+xml,<svg xmlns='https://ibb.co/fVnzfGC9' viewBox='0 0 300 300'><rect width='300' height='300' fill='white'/><rect x='50' y='50' width='200' height='200' fill='black'/><rect x='75' y='75' width='150' height='150' fill='white'/><text x='150' y='160' text-anchor='middle' fill='black' font-family='Arial' font-size='16'>QR Code</text></svg>"
                    alt="QR Code"
                    style="width: 300px; height: 300px; margin: 20px 0; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">

                <button class="close-button" onclick="downloadQRCode()">
                    <i class="fas fa-download"></i> Download QR Code
                </button>
                <button class="close-button" onclick="closeQRModal()">
                    <i class="fas fa-times"></i> Tutup
                </button>
            </div>
        </div>

        <!-- TENTANG KAMI -->
        <div class="section">
            <h2><i class="fas fa-info-circle"></i> Tentang Masjid Al-Irsyad</h2>
            <div class="cards-container">
                <div class="card">
                    <h3><i class="fas fa-bullseye"></i> Misi Kami</h3>
                    <p>Untuk menyatukan komuniti dan mempromosikan ajaran Islam yang sejati, memberikan perkhidmatan
                        terbaik kepada jemaah, dan menjadi pusat pembelajaran agama yang berkualiti.</p>
                </div>
                <div class="card">
                    <h3><i class="fas fa-eye"></i> Visi Kami</h3>
                    <p>Menjadi pusat kecemerlangan dalam perkhidmatan agama, pendidikan, dan sosial yang menginspirasi
                        komuniti untuk hidup mengikut ajaran Islam yang benar.</p>
                </div>
                <div class="card">
                    <h3><i class="fas fa-history"></i> Sejarah</h3>
                    <p>Masjid Al-Irsyad ditubuhkan sebagai pusat ibadah dan pembelajaran yang menghubungkan komuniti
                        Muslim di Telok Bagan dengan nilai-nilai Islam yang murni.</p>
                </div>
            </div>
        </div>

        <!-- SERVICES SECTION -->
        <div class="section">
            <h2><i class="fas fa-hands-helping"></i> Perkhidmatan Kami</h2>
            <div class="cards-container">
                <div class="card">
                    <h3><i class="fas fa-pray"></i> Solat Berjemaah</h3>
                    <p>Kami menyediakan ruang yang selesa untuk solat berjemaah lima waktu setiap hari dengan imam yang
                        berpengalaman.</p>
                </div>
                <div class="card">
                    <h3><i class="fas fa-graduation-cap"></i> Pendidikan Islam</h3>
                    <p>Program pendidikan Islam untuk semua peringkat umur termasuk kelas Al-Quran, Fiqh, dan Akidah.
                    </p>
                </div>
                <div class="card">
                    <h3><i class="fas fa-ring"></i> Majlis Perkahwinan</h3>
                    <p>Perkhidmatan lengkap untuk majlis akad nikah dan resepsi perkahwinan mengikut syariah Islam.</p>
                </div>
                <div class="card">
                    <h3><i class="fas fa-baby"></i> Majlis Aqiqah</h3>
                    <p>Kemudahan untuk majlis aqiqah dan khitan dengan panduan yang sesuai mengikut sunnah.</p>
                </div>
                <div class="card">
                    <h3><i class="fas fa-hand-holding-heart"></i> Program Kebajikan</h3>
                    <p>Program bantuan untuk keluarga yang memerlukan termasuk agihan makanan dan bantuan kewangan.</p>
                </div>
                <div class="card">
                    <h3><i class="fas fa-calendar-check"></i> Program Ramadan</h3>
                    <p>Program khusus bulan Ramadan termasuk berbuka puasa bersama dan qiam al-lail.</p>
                </div>
            </div>
        </div>

        <!-- CONTACT INFORMATION -->
        <div class="section">
            <h2><i class="fas fa-map-marker-alt"></i> Maklumat Hubungan</h2>
            <div class="cards-container">
                <div class="card">
                    <h3><i class="fas fa-map"></i> Alamat</h3>
                    <p>Masjid Al-Irsyad<br>
                        Telok Bagan<br>
                        Johor Bahru, Johor<br>
                        Malaysia</p>
                </div>
                <div class="card">
                    <h3><i class="fas fa-clock"></i> Waktu Operasi</h3>
                    <p><strong>Setiap Hari:</strong><br>
                        Subuh: 5:30 AM<br>
                        Zohor: 1:00 PM<br>
                        Asar: 4:30 PM<br>
                        Maghrib: 7:15 PM<br>
                        Isyak: 8:30 PM</p>
                </div>
                <div class="card">
                    <h3><i class="fas fa-phone"></i> Hubungi Kami</h3>
                    <p><strong>Tuan Imam:</strong><br>+60 11-2417 1668</p>
                    <p><strong>Pengurus:</strong><br>+60111111111</p>
                    <a href="javascript:void(0);" class="register-button" onclick="showContactModal()">
                        <i class="fas fa-phone"></i> Hubungi Sekarang
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- FOOTER SECTION -->
    <footer>
        <div style="max-width: 1200px; margin: 0 auto; position: relative; z-index: 2;">
            <p style="font-size: 1.2rem; margin-bottom: 10px;">
                <i class="fas fa-mosque"></i>
                <strong>Masjid Al-Irsyad, Telok Bagan</strong>
            </p>
            <p style="margin-bottom: 15px;">Masjid Mesra Jemaah - Menyatukan Umat dalam Iman</p>
            <div style="display: flex; justify-content: center; gap: 20px; margin-bottom: 20px; flex-wrap: wrap;">
                <a href="#" style="color: #3498db; text-decoration: none; transition: color 0.3s ease;">
                    <i class="fab fa-facebook"></i> Facebook
                </a>
                <a href="#" style="color: #25d366; text-decoration: none; transition: color 0.3s ease;">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
                <a href="#" style="color: #ff6b6b; text-decoration: none; transition: color 0.3s ease;">
                    <i class="fas fa-envelope"></i> Email
                </a>
            </div>
            <p style="font-size: 0.9rem; opacity: 0.8;">
                © 2025 AKMS-Masjid Al-Irsyad v2.0. All Rights Reserved.
            </p>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTopBtn" onclick="scrollToTop()">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- JAVASCRIPT -->
    <script>
        // Carousel functionality
        const currentIndices = {
            programCarousel: 0,
            kuliahCarousel: 0,
            imageCarousel: 0,
        };

        function showSlide(carouselId, index) {
            const carousel = document.getElementById(carouselId);
            const totalImages = carousel.querySelectorAll('img').length;

            if (index >= totalImages) currentIndices[carouselId] = 0;
            else if (index < 0) currentIndices[carouselId] = totalImages - 1;
            else currentIndices[carouselId] = index;

            const offset = -currentIndices[carouselId] * 100;
            carousel.style.transform = `translateX(${offset}%)`;
        }

        function nextSlide(carouselId) {
            showSlide(carouselId, currentIndices[carouselId] + 1);
        }

        function previousSlide(carouselId) {
            showSlide(carouselId, currentIndices[carouselId] - 1);
        }

        // Auto-scroll for carousels
        setInterval(() => nextSlide('programCarousel'), 5000);
        setInterval(() => nextSlide('kuliahCarousel'), 7000);
        setInterval(() => nextSlide('imageCarousel'), 9000);

        // Modal functions
        function showContactModal() {
            document.getElementById('contactModal').style.display = 'flex';
        }

        function closeContactModal() {
            document.getElementById('contactModal').style.display = 'none';
        }

        function showQRModal() {
            document.getElementById('qrModal').style.display = 'flex';
        }

        function closeQRModal() {
            document.getElementById('qrModal').style.display = 'none';
        }

        function downloadQRCode() {
            const qrImage = document.getElementById('qrCodeImage');
            const link = document.createElement('a');
            link.href = qrImage.src;
            link.download = 'qr-code-sumbangan.png';
            link.click();
        }

        function downloadImage() {
            const image = document.getElementById('image-display-img');
            const link = document.createElement('a');
            link.href = image.src;
            link.download = 'jadual_kuliah.jpg';
            link.click();
        }

        // Auto-open modal
        window.onload = function() {
            setTimeout(() => {
                const modal = document.getElementById("autoOpenModal");
                modal.style.display = "flex";
            }, 1000);
        };

        function closeModal() {
            const modal = document.getElementById("autoOpenModal");
            modal.style.display = "none";
        }

        // Scroll to top functionality
        window.onscroll = function() {
            const scrollTopBtn = document.getElementById('scrollTopBtn');
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        };

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add click effects to buttons
        document.querySelectorAll('button, .register-button').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.cssText = `
        position: absolute;
        width: ${size}px;
        height: ${size}px;
        left: ${x}px;
        top: ${y}px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 0.6s ease-out;
        pointer-events: none;
      `;

                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add ripple animation CSS
        const style = document.createElement('style');
        style.textContent = `
    @keyframes ripple {
      to {
        transform: scale(2);
        opacity: 0;
      }
    }
  `;
        document.head.appendChild(style);

        // Fade in animation for sections
        const sections = document.querySelectorAll('.section');

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Initialize section animations
        sections.forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(30px)';
            section.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            observer.observe(section);
        });
    </script>

</body>

</html>
