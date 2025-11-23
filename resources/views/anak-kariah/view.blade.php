<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pendaftaran Anak Kariah - Masjid Al-Irsyad</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* ==============================================
           MOBILE-FIRST RESPONSIVE DESIGN
           Base styles for mobile, then scale UP
           ============================================== */

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

        /* ===== MOBILE HEADER (BASE) ===== */
        /* Mobile-first header styles */
        .registration-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1rem 1rem;
            /* Reduced from 1.25rem */
            text-align: center;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
            /* Reduced from 1.5rem */
        }

        .header-icon {
            font-size: 2rem;
            /* Reduced from 2.5rem */
            margin-bottom: 0.25rem;
            display: block;
        }

        .registration-header h1 {
            color: white;
            font-size: 1.1rem;
            /* Reduced from 1.25rem */
            font-weight: 700;
            margin: 0 0 0.5rem 0;
            line-height: 1.2;
        }

        .home-button {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.35rem 0.75rem;
            /* Reduced further */
            border-radius: 16px;
            /* Smaller radius */
            text-decoration: none;
            font-size: 0.75rem;
            /* Reduced from 0.8rem */
            margin-top: 0;
            transition: background 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .home-button:hover {
            background: rgba(255, 255, 255, 0.3);
            color: white;
        }

        /* Tablet and up */
        @media (min-width: 768px) {
            .registration-header {
                padding: 2.5rem 2rem;
            }

            .registration-header h1 {
                font-size: 1.75rem;
            }
        }

        /* ===== MOBILE MAIN CONTENT (BASE) ===== */
        .main-content {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px 15px;
        }

        /* ===== MOBILE FORM CONTAINER (BASE) ===== */
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            animation: slideInUp 0.8s ease;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #e74c3c, #f39c12, #27ae60);
            background-size: 200% 100%;
            animation: gradientShift 3s ease infinite;
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

        .form-title {
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 8px;
            position: relative;
        }

        .form-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
            font-size: 0.85rem;
            line-height: 1.4;
        }

        /* ===== MOBILE ALERTS (BASE) ===== */
        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
            animation: slideInDown 0.5s ease;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* ===== MOBILE IMAGE/MAP CONTAINER (BASE) ===== */
        .image-container {
            margin-bottom: 20px;
            width: 100%;
            height: 250px;
            border-radius: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        /* ===== MOBILE FORM FIELDS (BASE) ===== */
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group label i {
            color: #3498db;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e8ed;
            border-radius: 10px;
            font-size: 0.95rem;
            color: #333;
            background: #ffffff;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            transform: translateY(-2px);
        }

        .form-control:hover {
            border-color: #3498db;
        }

        .form-control.is-invalid {
            border-color: #e74c3c;
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1);
        }

        .invalid-feedback {
            color: #e74c3c;
            font-size: 0.8rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        select.form-control {
            cursor: pointer;
        }

        /* ===== MOBILE CHECKBOX (BASE) ===== */
        .checkbox-container {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin: 20px 0;
            padding: 15px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 10px;
            border: 2px solid #e1e8ed;
            transition: all 0.3s ease;
        }

        .checkbox-wrapper {
            position: relative;
        }

        .checkbox-wrapper input[type="checkbox"] {
            appearance: none;
            width: 22px;
            height: 22px;
            border: 2px solid #3498db;
            border-radius: 6px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .checkbox-wrapper input[type="checkbox"]:checked {
            background: linear-gradient(45deg, #3498db, #2980b9);
            border-color: #2980b9;
        }

        .checkbox-wrapper input[type="checkbox"]:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            font-size: 12px;
        }

        .checkbox-label {
            flex: 1;
            color: #555;
            line-height: 1.5;
            font-size: 0.85rem;
        }

        /* ===== MOBILE SUBMIT BUTTON (BASE) ===== */
        .submit-button {
            width: 100%;
            padding: 15px;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.3);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .submit-button:disabled {
            background: #bdc3c7;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .submit-button:hover:not(:disabled) {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(231, 76, 60, 0.4);
        }

        /* ===== MOBILE INPUT GROUP (BASE) ===== */
        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #3498db;
            pointer-events: none;
            font-size: 0.9rem;
        }

        /* ===== MOBILE POPUP (BASE) ===== */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            z-index: 9999;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease;
            padding: 20px;
        }

        .popup-overlay.show {
            display: flex;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .popup-content {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 30px 20px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            position: relative;
            animation: slideInScale 0.4s ease;
        }

        @keyframes slideInScale {
            from {
                opacity: 0;
                transform: translateY(-50px) scale(0.8);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .popup-icon {
            font-size: 3rem;
            color: #27ae60;
            margin-bottom: 15px;
            animation: bounce 1s ease infinite;
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

        .popup-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 12px;
        }

        .popup-message {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .popup-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
            justify-content: center;
        }

        .popup-button {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .popup-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
        }

        .loading-spinner {
            display: none;
            width: 18px;
            height: 18px;
            border: 2px solid transparent;
            border-top: 2px solid #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* ===== TABLET STYLES (768px and up) ===== */
        @media (min-width: 768px) {
            .header-content {
                flex-direction: row;
                justify-content: space-between;
                max-width: 720px;
                padding: 0 20px;
            }

            .logo {
                font-size: 1.4rem;
            }

            .logo i {
                font-size: 1.8rem;
            }

            .home-button {
                padding: 12px 20px;
                font-size: 1rem;
            }

            .main-content {
                max-width: 750px;
                padding: 25px 20px;
            }

            .form-container {
                padding: 35px 40px;
                border-radius: 18px;
            }

            .form-title {
                font-size: 2rem;
                margin-bottom: 10px;
            }

            .form-subtitle {
                font-size: 1rem;
                margin-bottom: 25px;
            }

            .image-container {
                height: 350px;
                margin-bottom: 25px;
            }

            .form-group {
                margin-bottom: 22px;
            }

            .form-group label {
                font-size: 0.95rem;
            }

            .form-control {
                padding: 14px 18px;
                font-size: 1rem;
                border-radius: 11px;
            }

            textarea.form-control {
                min-height: 110px;
            }

            .checkbox-container {
                padding: 18px;
                margin: 22px 0;
            }

            .checkbox-label {
                font-size: 0.9rem;
            }

            .submit-button {
                padding: 16px;
                font-size: 1.1rem;
                border-radius: 11px;
            }

            .popup-content {
                padding: 35px 25px;
                border-radius: 18px;
            }

            .popup-icon {
                font-size: 3.5rem;
                margin-bottom: 18px;
            }

            .popup-title {
                font-size: 1.8rem;
                margin-bottom: 15px;
            }

            .popup-message {
                font-size: 1rem;
                margin-bottom: 25px;
            }

            .popup-buttons {
                flex-direction: row;
            }

            .popup-button {
                padding: 14px 28px;
                font-size: 1rem;
            }
        }

        /* ===== DESKTOP STYLES (1024px and up) ===== */
        @media (min-width: 1024px) {
            .header-content {
                max-width: 980px;
            }

            .logo {
                font-size: 1.5rem;
            }

            .logo i {
                font-size: 2rem;
            }

            .main-content {
                max-width: 980px;
                padding: 30px 20px;
            }

            .form-container {
                padding: 40px 60px;
                border-radius: 20px;
            }

            .form-title {
                font-size: 2.5rem;
            }

            .form-subtitle {
                font-size: 1.1rem;
                margin-bottom: 30px;
            }

            .image-container {
                height: 400px;
                margin-bottom: 30px;
                border-radius: 15px;
            }

            .form-group {
                margin-bottom: 25px;
            }

            .form-group label {
                font-size: 1rem;
            }

            .form-control {
                padding: 15px 20px;
                border-radius: 12px;
            }

            textarea.form-control {
                min-height: 120px;
            }

            .checkbox-container {
                padding: 20px;
                margin: 25px 0;
                border-radius: 12px;
            }

            .checkbox-wrapper input[type="checkbox"] {
                width: 24px;
                height: 24px;
            }

            .checkbox-label {
                font-size: 0.95rem;
            }

            .submit-button {
                padding: 18px;
                font-size: 1.2rem;
                border-radius: 12px;
            }

            .input-icon {
                right: 15px;
                font-size: 1rem;
            }

            .popup-content {
                padding: 40px;
                border-radius: 20px;
            }

            .popup-icon {
                font-size: 4rem;
                margin-bottom: 20px;
            }

            .popup-title {
                font-size: 2rem;
            }

            .popup-message {
                font-size: 1.1rem;
                margin-bottom: 30px;
            }

            .popup-button {
                padding: 15px 30px;
            }
        }

        /* ===== LARGE DESKTOP STYLES (1200px and up) ===== */
        @media (min-width: 1200px) {
            .header-content {
                max-width: 1140px;
            }

            .main-content {
                max-width: 1140px;
            }

            .image-container {
                height: 450px;
            }
        }

        /* ===== EXTRA LARGE DESKTOP (1400px and up) ===== */
        @media (min-width: 1400px) {
            .header-content {
                max-width: 1320px;
            }

            .main-content {
                max-width: 1320px;
            }
        }
    </style>
</head>

<body>
    <!-- HEADER SECTION -->
    <header class="registration-header">
        <span class="header-icon">🕌</span>
        <h1>Pendaftaran Anak Kariah</h1>
        <a href="{{ route('welcome') }}" class="home-button">
            <i class="fas fa-home"></i> Halaman Utama
        </a>
    </header>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="form-container">
            <h1 class="form-title">
                <i class="fas fa-user-plus"></i> Pendaftaran Anak Kariah
            </h1>
            <p class="form-subtitle">Masjid Al-Irsyad, Telok Bagan - Sila lengkapkan maklumat di bawah</p>

            @if (session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            <div class="image-container">
                @include('anak-kariah.map-view', [
                    'boundaries' => \App\Models\KariahBoundary::where('is_active', true)->get(),
                    'mosque' =>
                        \App\Models\MosqueLocation::first() ??
                        (object) ['latitude' => 1.4556, 'longitude' => 103.7645, 'zoom_level' => 15],
                ])
            </div>

            <form id="anak-kariah-form" action="{{ route('anak-kariah.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="full_name">
                        <i class="fas fa-user"></i> Nama Penuh:
                    </label>
                    <div class="input-group">
                        <input type="text" id="full_name" name="full_name"
                            class="form-control @error('full_name') is-invalid @enderror"
                            placeholder="Masukkan nama penuh anda" value="{{ old('full_name') }}" required>
                        <i class="fas fa-user input-icon"></i>
                    </div>
                    @error('full_name')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ic_number">
                        <i class="fas fa-id-card"></i> Nombor IC:
                    </label>
                    <div class="input-group">
                        <input type="text" id="ic_number" name="ic_number"
                            class="form-control @error('ic_number') is-invalid @enderror"
                            placeholder="Contoh: 890101-01-1234" value="{{ old('ic_number') }}" required>
                        <i class="fas fa-id-card input-icon"></i>
                    </div>
                    @error('ic_number')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">
                        <i class="fas fa-home"></i> Alamat:
                    </label>
                    <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror"
                        placeholder="Masukkan alamat lengkap anda" required>{{ old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="areas">
                        <i class="fas fa-map-marker-alt"></i> Kawasan:
                    </label>
                    <select id="areas" name="areas" class="form-control @error('areas') is-invalid @enderror"
                        required>
                        <option value="" disabled {{ old('areas') ? '' : 'selected' }}>Pilih Kawasan</option>
                        <option value="Kampung Luar" {{ old('areas') == 'Kampung Luar' ? 'selected' : '' }}>Kampung
                            Luar</option>
                        <option value="Kampung Padang Mengkudu"
                            {{ old('areas') == 'Kampung Padang Mengkudu' ? 'selected' : '' }}>Kampung Padang Mengkudu
                        </option>
                        <option value="Kampung Tengah" {{ old('areas') == 'Kampung Tengah' ? 'selected' : '' }}>Kampung
                            Tengah</option>
                        <option value="Lorong Kenanga" {{ old('areas') == 'Lorong Kenanga' ? 'selected' : '' }}>Lorong
                            Kenanga</option>
                        <option value="Lorong Penghulu Lama"
                            {{ old('areas') == 'Lorong Penghulu Lama' ? 'selected' : '' }}>Lorong Penghulu Lama
                        </option>
                        <option value="Lorong Tok Imam" {{ old('areas') == 'Lorong Tok Imam' ? 'selected' : '' }}>
                            Lorong Tok Imam</option>
                        <option value="Taman Bagan Indah" {{ old('areas') == 'Taman Bagan Indah' ? 'selected' : '' }}>
                            Taman Bagan Indah</option>
                        <option value="Taman Bagan Permai"
                            {{ old('areas') == 'Taman Bagan Permai' ? 'selected' : '' }}>Taman Bagan Permai</option>
                        <option value="Taman Desa Kiara" {{ old('areas') == 'Taman Desa Kiara' ? 'selected' : '' }}>
                            Taman Desa Kiara</option>
                        <option value="Taman Seri Bagan" {{ old('areas') == 'Taman Seri Bagan' ? 'selected' : '' }}>
                            Taman Seri Bagan</option>
                    </select>
                    @error('areas')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone_number">
                        <i class="fas fa-phone"></i> Nombor Telefon:
                    </label>
                    <div class="input-group">
                        <input type="text" id="phone_number" name="phone_number"
                            class="form-control @error('phone_number') is-invalid @enderror"
                            placeholder="Contoh: 012-3456789" value="{{ old('phone_number') }}" required>
                        <i class="fas fa-phone input-icon"></i>
                    </div>
                    @error('phone_number')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gender">
                        <i class="fas fa-venus-mars"></i> Jantina:
                    </label>
                    <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror"
                        required>
                        <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Pilih Jantina</option>
                        <option value="Lelaki" {{ old('gender') == 'Lelaki' ? 'selected' : '' }}>Lelaki</option>
                        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="date_of_birth">
                        <i class="fas fa-calendar-alt"></i> Tarikh Lahir:
                    </label>
                    <div class="input-group">
                        <input type="date" id="date_of_birth" name="date_of_birth"
                            class="form-control @error('date_of_birth') is-invalid @enderror"
                            value="{{ old('date_of_birth') }}" required>
                        <i class="fas fa-calendar-alt input-icon"></i>
                    </div>
                    @error('date_of_birth')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="checkbox-container">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="agreement" name="agreement" value="1"
                            {{ old('agreement') ? 'checked' : '' }} required>
                    </div>
                    <label for="agreement" class="checkbox-label">
                        <i class="fas fa-shield-alt" style="color: #3498db; margin-right: 5px;"></i>
                        Saya bersetuju dengan penggunaan data peribadi saya oleh pihak masjid untuk tujuan pengurusan
                        anak kariah dan program-program berkaitan.
                    </label>
                </div>
                @error('agreement')
                    <div class="invalid-feedback" style="margin-top: -15px; margin-bottom: 15px;">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="submit-button" id="submitBtn">
                    <span class="loading-spinner" id="loadingSpinner"></span>
                    <i class="fas fa-paper-plane" id="submitIcon"></i>
                    <span id="submitText">Daftar Sekarang</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Success Popup -->
    <div class="popup-overlay" id="successPopup">
        <div class="popup-content">
            <div class="popup-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2 class="popup-title">Pendaftaran Berjaya!</h2>
            <p class="popup-message">
                <strong>TERIMA KASIH!</strong><br>
                Terima kasih kerana mendaftarkan sebagai anak kariah Masjid Al-Irsyad.
                Maklumat telah berjaya disimpan.
                <br><br>
                <em>Semoga Allah memberkati anda dan sekeluarga.</em>
            </p>
            <div class="popup-buttons">
                <a href="{{ route('welcome') }}" class="popup-button">
                    <i class="fas fa-home"></i>
                    Kembali ke Halaman Utama
                </a>
            </div>
        </div>
    </div>

    <script>
        @if (session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('successPopup').classList.add('show');
            });
        @endif

        document.getElementById('anak-kariah-form').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const submitIcon = document.getElementById('submitIcon');
            const submitText = document.getElementById('submitText');

            submitBtn.disabled = true;
            loadingSpinner.style.display = 'block';
            submitIcon.style.display = 'none';
            submitText.textContent = 'Memproses...';
        });

        document.getElementById('ic_number').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 6) {
                value = value.substring(0, 6) + '-' + value.substring(6);
            }
            if (value.length >= 9) {
                value = value.substring(0, 9) + '-' + value.substring(9, 13);
            }
            e.target.value = value;
        });

        document.getElementById('phone_number').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 3) {
                value = value.substring(0, 3) + '-' + value.substring(3);
            }
            e.target.value = value;
        });

        const today = new Date().toISOString().split('T')[0];
        document.getElementById('date_of_birth').setAttribute('max', today);

        const minDate = new Date();
        minDate.setFullYear(minDate.getFullYear() - 30);
        document.getElementById('date_of_birth').setAttribute('min', minDate.toISOString().split('T')[0]);
    </script>
</body>

</html>
