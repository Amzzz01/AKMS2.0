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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
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

        /* Enhanced Header */
        header {
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            color: white;
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .logo i {
            font-size: 2rem;
            color: #f39c12;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 5px #f39c12; }
            to { text-shadow: 0 0 20px #f39c12, 0 0 30px #f39c12; }
        }

        .home-button {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            color: white;
            padding: 12px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .home-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
        }

        /* Main Content Container */
        .main-content {
            max-width: 900px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        /* Enhanced Form Container */
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
            animation: slideInUp 0.8s ease;
        }

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
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
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .form-title {
            color: #2c3e50;
            font-size: 2.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 10px;
            position: relative;
        }

        .form-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .form-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(45deg, #3498db, #e74c3c);
            border-radius: 2px;
        }

        /* Alert Messages */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
            animation: slideInDown 0.5s ease;
        }

        @keyframes slideInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
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

        /* Enhanced Image Container */
        .image-container {
            margin-bottom: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 300px;
            border-radius: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            position: relative;
        }

        .image-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); }
            100% { transform: translateY(-100px) rotate(360deg); }
        }

        .image-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            border-radius: 15px;
            position: relative;
            z-index: 2;
        }

        .image-placeholder {
            color: white;
            font-size: 3rem;
            position: relative;
            z-index: 2;
        }

        /* Enhanced Form Fields */
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group label i {
            color: #3498db;
        }

        .form-control {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e1e8ed;
            border-radius: 12px;
            font-size: 1rem;
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
            font-size: 0.875rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        select.form-control {
            cursor: pointer;
        }

        /* Enhanced Checkbox */
        .checkbox-container {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin: 25px 0;
            padding: 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 12px;
            border: 2px solid #e1e8ed;
            transition: all 0.3s ease;
        }

        .checkbox-container:hover {
            border-color: #3498db;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.1);
        }

        .checkbox-wrapper {
            position: relative;
        }

        .checkbox-wrapper input[type="checkbox"] {
            appearance: none;
            width: 24px;
            height: 24px;
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
            font-size: 14px;
        }

        .checkbox-label {
            flex: 1;
            color: #555;
            line-height: 1.5;
            font-size: 0.95rem;
        }

        /* Enhanced Submit Button */
        .submit-button {
            width: 100%;
            padding: 18px;
            font-size: 1.2rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(231,76,60,0.3);
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

        .submit-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s ease;
        }

        .submit-button:hover::before {
            left: 100%;
        }

        .submit-button:hover:not(:disabled) {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(231,76,60,0.4);
        }

        .submit-button:active:not(:disabled) {
            transform: translateY(-1px);
        }

        /* Loading Spinner */
        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Input Icons */
        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #3498db;
            pointer-events: none;
        }

        /* Success Popup Styles */
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
        }

        .popup-overlay.show {
            display: flex;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .popup-content {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            width: 90%;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            position: relative;
            animation: slideInScale 0.4s ease;
            border: 3px solid transparent;
            background-clip: padding-box;
        }

        .popup-content::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, #27ae60, #2ecc71, #3498db, #e74c3c);
            border-radius: 20px;
            z-index: -1;
            animation: gradientRotate 3s linear infinite;
        }

        @keyframes gradientRotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
            font-size: 4rem;
            color: #27ae60;
            margin-bottom: 20px;
            animation: bounce 1s ease infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        .popup-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 15px;
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .popup-message {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .popup-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .popup-button {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
        }

        .popup-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s ease;
        }

        .popup-button:hover::before {
            left: 100%;
        }

        .popup-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
        }

        .popup-button.secondary {
            background: linear-gradient(45deg, #95a5a6, #7f8c8d);
            box-shadow: 0 4px 15px rgba(149, 165, 166, 0.3);
        }

        .popup-button.secondary:hover {
            box-shadow: 0 6px 20px rgba(149, 165, 166, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 15px;
                padding: 0 15px;
            }
            
            .main-content {
                padding: 20px 15px;
            }
            
            .form-container {
                padding: 30px 20px;
            }

            .form-title {
                font-size: 2rem;
            }

            .image-container {
                height: 250px;
            }

            .popup-content {
                padding: 30px 20px;
                margin: 20px;
            }

            .popup-title {
                font-size: 1.7rem;
            }

            .popup-buttons {
                flex-direction: column;
            }

            .popup-button {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 25px 15px;
            }

            .form-title {
                font-size: 1.8rem;
            }

            .popup-content {
                padding: 25px 15px;
            }

            .popup-icon {
                font-size: 3rem;
            }

            .popup-title {
                font-size: 1.5rem;
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
                <strong>Pendaftaran Anak Kariah</strong>
            </div>
            <a href="{{ route('welcome') }}" class="home-button">
                <i class="fas fa-home"></i> Halaman Utama
            </a>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="form-container">
            <h1 class="form-title">
                <i class="fas fa-user-plus"></i> Pendaftaran Anak Kariah
            </h1>
            <p class="form-subtitle">Masjid Al-Irsyad, Telok Bagan - Sila lengkapkan maklumat di bawah</p>

            <!-- Success/Error Messages (Hidden if using popup) -->
            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            <!-- Enhanced Image Container -->
            <div class="image-container">
                <div class="image-placeholder">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
            </div>

            <form id="anak-kariah-form" action="{{ route('anak-kariah.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="full_name">
                        <i class="fas fa-user"></i> Nama Penuh:
                    </label>
                    <div class="input-group">
                        <input type="text" 
                               id="full_name" 
                               name="full_name" 
                               class="form-control @error('full_name') is-invalid @enderror" 
                               placeholder="Masukkan nama penuh anda" 
                               value="{{ old('full_name') }}"
                               required>
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
                        <input type="text" 
                               id="ic_number" 
                               name="ic_number" 
                               class="form-control @error('ic_number') is-invalid @enderror" 
                               placeholder="Contoh: 890101-01-1234" 
                               value="{{ old('ic_number') }}"
                               required>
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
                    <textarea id="address" 
                              name="address" 
                              class="form-control @error('address') is-invalid @enderror" 
                              placeholder="Masukkan alamat lengkap anda" 
                              required>{{ old('address') }}</textarea>
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
                    <select id="areas" 
                            name="areas" 
                            class="form-control @error('areas') is-invalid @enderror" 
                            required>
                        <option value="" disabled {{ old('areas') ? '' : 'selected' }}>Pilih Kawasan</option>
                        <option value="Kampung Luar" {{ old('areas') == 'Kampung Luar' ? 'selected' : '' }}>Kampung Luar</option>
                        <option value="Kampung Padang Mengkudu" {{ old('areas') == 'Kampung Padang Mengkudu' ? 'selected' : '' }}>Kampung Padang Mengkudu</option>
                        <option value="Kampung Tengah" {{ old('areas') == 'Kampung Tengah' ? 'selected' : '' }}>Kampung Tengah</option>
                        <option value="Lorong Kenanga" {{ old('areas') == 'Lorong Kenanga' ? 'selected' : '' }}>Lorong Kenanga</option>
                        <option value="Lorong Penghulu Lama" {{ old('areas') == 'Lorong Penghulu Lama' ? 'selected' : '' }}>Lorong Penghulu Lama</option>
                        <option value="Lorong Tok Imam" {{ old('areas') == 'Lorong Tok Imam' ? 'selected' : '' }}>Lorong Tok Imam</option>
                        <option value="Taman Bagan Indah" {{ old('areas') == 'Taman Bagan Indah' ? 'selected' : '' }}>Taman Bagan Indah</option>
                        <option value="Taman Bagan Permai" {{ old('areas') == 'Taman Bagan Permai' ? 'selected' : '' }}>Taman Bagan Permai</option>
                        <option value="Taman Desa Kiara" {{ old('areas') == 'Taman Desa Kiara' ? 'selected' : '' }}>Taman Desa Kiara</option>
                        <option value="Taman Seri Bagan" {{ old('areas') == 'Taman Seri Bagan' ? 'selected' : '' }}>Taman Seri Bagan</option>
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
                        <input type="text" 
                               id="phone_number" 
                               name="phone_number" 
                               class="form-control @error('phone_number') is-invalid @enderror" 
                               placeholder="Contoh: 012-3456789" 
                               value="{{ old('phone_number') }}"
                               required>
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
                    <select id="gender" 
                            name="gender" 
                            class="form-control @error('gender') is-invalid @enderror" 
                            required>
                        <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Pilih Jantina</option>
                        <option value="Lelaki" {{ old('gender') == 'Lelaki' ? 'selected' : '' }}>Lelaki</option>
                        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
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
                        <input type="date" 
                               id="date_of_birth" 
                               name="date_of_birth" 
                               class="form-control @error('date_of_birth') is-invalid @enderror" 
                               value="{{ old('date_of_birth') }}"
                               required>
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
                        <input type="checkbox" 
                               id="agreement" 
                               name="agreement" 
                               value="1"
                               {{ old('agreement') ? 'checked' : '' }}
                               required>
                    </div>
                    <label for="agreement" class="checkbox-label">
                        <i class="fas fa-shield-alt" style="color: #3498db; margin-right: 5px;"></i>
                        Saya bersetuju dengan penggunaan data peribadi saya oleh pihak masjid untuk tujuan pengurusan anak kariah dan program-program berkaitan.
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

    <!-- JavaScript -->
    <script>
        // Check if there's a success message from Laravel session
        @if(session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                showSuccessPopup();
            });
        @endif

        // Form submission handling
        document.getElementById('anak-kariah-form').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const submitIcon = document.getElementById('submitIcon');
            const submitText = document.getElementById('submitText');
            
            // Show loading state
            submitBtn.disabled = true;
            loadingSpinner.style.display = 'block';
            submitIcon.style.display = 'none';
            submitText.textContent = 'Memproses...';
            
            // Let the form submit naturally to Laravel
            // Loading state will be reset when page reloads
        });

        // Show success popup function
        function showSuccessPopup() {
            const popup = document.getElementById('successPopup');
            popup.classList.add('show');
            
            // Add confetti effect
            createConfetti();
            
            // Auto-hide after 30 seconds if user doesn't interact
            setTimeout(() => {
                if (popup.classList.contains('show')) {
                    popup.classList.remove('show');
                }
            }, 30000);
        }

        // Hide popup function
        function hideSuccessPopup() {
            document.getElementById('successPopup').classList.remove('show');
        }

        // Close popup when clicking outside
        document.getElementById('successPopup').addEventListener('click', function(e) {
            if (e.target === this) {
                hideSuccessPopup();
            }
        });

        // Close popup with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideSuccessPopup();
            }
        });

        // Confetti effect function
        function createConfetti() {
            const colors = ['#27ae60', '#3498db', '#e74c3c', '#f39c12', '#9b59b6'];
            const confettiCount = 100;
            
            for (let i = 0; i < confettiCount; i++) {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.style.cssText = `
                        position: fixed;
                        width: 10px;
                        height: 10px;
                        background: ${colors[Math.floor(Math.random() * colors.length)]};
                        left: ${Math.random() * 100}vw;
                        top: -10px;
                        z-index: 10000;
                        border-radius: ${Math.random() > 0.5 ? '50%' : '0'};
                        animation: confettiFall ${2 + Math.random() * 3}s linear forwards;
                        transform: rotate(${Math.random() * 360}deg);
                    `;
                    
                    document.body.appendChild(confetti);
                    
                    setTimeout(() => {
                        confetti.remove();
                    }, 5000);
                }, i * 10);
            }
        }

        // Add confetti animation CSS
        const confettiStyle = document.createElement('style');
        confettiStyle.textContent = `
            @keyframes confettiFall {
                0% {
                    transform: translateY(-10px) rotate(0deg);
                    opacity: 1;
                }
                100% {
                    transform: translateY(100vh) rotate(720deg);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(confettiStyle);

        // IC Number formatting
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

        // Phone number formatting
        document.getElementById('phone_number').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 3) {
                value = value.substring(0, 3) + '-' + value.substring(3);
            }
            e.target.value = value;
        });

        // Add ripple effect to buttons
        document.querySelectorAll('button, .home-button, .popup-button').forEach(button => {
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

        // Form field animations
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });

        // Auto-hide error alerts after 8 seconds
        document.querySelectorAll('.alert-danger').forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    alert.remove();
                }, 300);
            }, 8000);
        });

        // Set max date for date of birth (no future dates)
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('date_of_birth').setAttribute('max', today);

        // Set min date for date of birth (reasonable minimum age)
        const minDate = new Date();
        minDate.setFullYear(minDate.getFullYear() - 30); // 30 years ago
        document.getElementById('date_of_birth').setAttribute('min', minDate.toISOString().split('T')[0]);

        // Form validation enhancements
        document.getElementById('anak-kariah-form').addEventListener('submit', function(e) {
            let isValid = true;
            const requiredFields = this.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            // IC Number validation
            const icNumber = document.getElementById('ic_number').value;
            const icPattern = /^\d{6}-\d{2}-\d{4}$/;
            if (!icPattern.test(icNumber)) {
                document.getElementById('ic_number').classList.add('is-invalid');
                isValid = false;
            }
            
            // Phone number validation
            const phoneNumber = document.getElementById('phone_number').value;
            const phonePattern = /^\d{3}-\d{7,8}$/;
            if (!phonePattern.test(phoneNumber)) {
                document.getElementById('phone_number').classList.add('is-invalid');
                isValid = false;
            }
            
            if (!isValid) {
                e.preventDefault();
                // Reset button state
                const submitBtn = document.getElementById('submitBtn');
                const loadingSpinner = document.getElementById('loadingSpinner');
                const submitIcon = document.getElementById('submitIcon');
                const submitText = document.getElementById('submitText');
                
                submitBtn.disabled = false;
                loadingSpinner.style.display = 'none';
                submitIcon.style.display = 'inline';
                submitText.textContent = 'Daftar Sekarang';
                
                // Show error message
                alert('Sila lengkapkan semua maklumat dengan betul sebelum menghantar.');
            }
        });

        // Remove invalid class on input
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });
        });
    </script>
</body>
</html>