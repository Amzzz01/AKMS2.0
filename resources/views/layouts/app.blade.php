<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'AKMS-Masjid Al-Irsyad') }}</title>
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

        .action-buttons {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .btn-header {
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
            border: none;
            cursor: pointer;
        }

        .btn-header:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
            color: white;
            text-decoration: none;
        }

        .btn-header.back-btn {
            background: linear-gradient(45deg, #6c757d, #495057);
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        }

        .btn-header.back-btn:hover {
            box-shadow: 0 6px 20px rgba(108, 117, 125, 0.4);
        }

        /* Main Content Container */
        .main-content {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px 20px;
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
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
            width: 100%;
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

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-title {
            color: #2c3e50;
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 10px;
            position: relative;
        }

        .form-subtitle {
            color: #666;
            margin-bottom: 20px;
            font-size: 1rem;
        }

        .form-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(45deg, #3498db, #e74c3c);
            border-radius: 2px;
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
            font-size: 0.95rem;
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
        }

        .invalid-feedback {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .invalid-feedback::before {
            content: '⚠';
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

        .input-icon.clickable {
            pointer-events: auto;
            cursor: pointer;
        }

        /* Enhanced Checkbox */
        .form-check {
            margin: 20px 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .form-check-input {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #3498db;
            border-radius: 4px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .form-check-input:checked {
            background: linear-gradient(45deg, #3498db, #2980b9);
            border-color: #2980b9;
        }

        .form-check-input:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            font-size: 12px;
        }

        .form-check-label {
            color: #555;
            font-size: 0.9rem;
            cursor: pointer;
        }

        /* Enhanced Submit Button */
        .btn-submit {
            width: 100%;
            padding: 18px;
            font-size: 1.1rem;
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

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s ease;
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(231,76,60,0.4);
        }

        .btn-submit:active {
            transform: translateY(-1px);
        }

        /* Form Footer */
        .form-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e1e8ed;
        }

        .form-footer a {
            color: #3498db;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            color: #2980b9;
            text-decoration: underline;
        }

        .form-footer small {
            color: #666;
            font-size: 0.9rem;
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
                font-size: 1.8rem;
            }

            .action-buttons {
                flex-direction: row;
                gap: 10px;
                width: 100%;
                justify-content: space-between;
            }

            .btn-header {
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 25px 15px;
            }

            .form-title {
                font-size: 1.6rem;
            }
        }

        /* Loading Animation */
        .form-container.loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }

        /* Success Message */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            border: none;
            font-weight: 500;
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            border-left: 4px solid #dc3545;
        }
    </style>
</head>
<body>
    <!-- HEADER SECTION -->
    <header>
        <div class="header-content">
            <div class="logo">
                <i class="fas fa-mosque"></i>
                <strong>AKMS-Masjid Al-Irsyad</strong>
            </div>
            <div class="action-buttons">
                <button onclick="history.back()" class="btn-header back-btn">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <a href="{{ route('welcome') }}" class="btn-header">
                    <i class="fas fa-home"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Base JavaScript -->
    <script>
        // Password visibility toggle
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling;
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Add ripple effect to buttons
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('button, .btn-header').forEach(button => {
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
                    
                    // Remove invalid state if field now has value
                    if (this.value.trim()) {
                        this.classList.remove('is-invalid');
                        const feedback = this.parentElement.nextElementSibling;
                        if (feedback && feedback.classList.contains('invalid-feedback')) {
                            feedback.style.display = 'none';
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>