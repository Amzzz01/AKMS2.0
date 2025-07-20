@extends('layouts.app')

@section('content')
<div class="form-container">
    <div class="form-header">
        <h1 class="form-title">
            <i class="fas fa-user-plus"></i> Admin Registration
        </h1>
        <p class="form-subtitle">Daftar Pentadbir Baharu</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>{{ __('Whoops! Something went wrong.') }}</strong>
            <ul style="margin: 10px 0 0 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" id="register-form">
        @csrf

        <div class="form-group">
            <label for="name">
                <i class="fas fa-user"></i> {{ __('Full Name') }}
            </label>
            <div class="input-group">
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    placeholder="Masukkan nama penuh anda" 
                    value="{{ old('name') }}" 
                    required 
                    autocomplete="name" 
                    autofocus
                >
                <i class="fas fa-user input-icon"></i>
            </div>
            @error('name')
                <div class="invalid-feedback" style="display: block;">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">
                <i class="fas fa-envelope"></i> {{ __('Email Address') }}
            </label>
            <div class="input-group">
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    placeholder="Masukkan alamat email anda" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="email"
                >
                <i class="fas fa-envelope input-icon"></i>
            </div>
            @error('email')
                <div class="invalid-feedback" style="display: block;">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone_number">
                <i class="fas fa-phone"></i> {{ __('Phone Number') }}
            </label>
            <div class="input-group">
                <input 
                    type="text" 
                    id="phone_number" 
                    name="phone_number" 
                    class="form-control @error('phone_number') is-invalid @enderror" 
                    placeholder="Contoh: 012-3456789" 
                    value="{{ old('phone_number') }}" 
                    required
                >
                <i class="fas fa-phone input-icon"></i>
            </div>
            @error('phone_number')
                <div class="invalid-feedback" style="display: block;">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">
                <i class="fas fa-lock"></i> {{ __('Password') }}
            </label>
            <div class="input-group">
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    placeholder="Cipta kata laluan yang selamat" 
                    required 
                    autocomplete="new-password"
                >
                <i class="fas fa-eye input-icon clickable" onclick="togglePassword('password')"></i>
            </div>
            @error('password')
                <div class="invalid-feedback" style="display: block;">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">
                <i class="fas fa-lock"></i> {{ __('Confirm Password') }}
            </label>
            <div class="input-group">
                <input 
                    type="password" 
                    id="password-confirm" 
                    name="password_confirmation" 
                    class="form-control" 
                    placeholder="Sahkan kata laluan anda" 
                    required 
                    autocomplete="new-password"
                >
                <i class="fas fa-eye input-icon clickable" onclick="togglePassword('password-confirm')"></i>
            </div>
            <div class="invalid-feedback" id="password-confirm-error" style="display: none;">
                Kata laluan tidak sepadan
            </div>
        </div>

        <button type="submit" class="btn-submit">
            <i class="fas fa-user-plus"></i>
            {{ __('Register') }}
        </button>
    </form>

    <div class="form-footer">
        <small>
            Sudah mempunyai akaun? 
            <a href="{{ route('login') }}">{{ __('Login here') }}</a>
        </small>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('register-form');
        const phoneInput = document.getElementById('phone_number');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password-confirm');
        
        // Phone number formatting
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 3) {
                value = value.substring(0, 3) + '-' + value.substring(3);
            }
            e.target.value = value;
        });

        // Password confirmation validation
        function validatePasswordConfirmation() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            const errorDiv = document.getElementById('password-confirm-error');
            
            if (confirmPassword && password !== confirmPassword) {
                confirmPasswordInput.classList.add('is-invalid');
                errorDiv.style.display = 'block';
                return false;
            } else {
                confirmPasswordInput.classList.remove('is-invalid');
                errorDiv.style.display = 'none';
                return true;
            }
        }

        confirmPasswordInput.addEventListener('input', validatePasswordConfirmation);
        passwordInput.addEventListener('input', function() {
            if (confirmPasswordInput.value) {
                validatePasswordConfirmation();
            }
        });

        // Form submission
        form.addEventListener('submit', function(e) {
            const isPasswordValid = validatePasswordConfirmation();
            
            if (!isPasswordValid && confirmPasswordInput.value) {
                e.preventDefault();
                return false;
            }
            
            const formContainer = document.querySelector('.form-container');
            formContainer.classList.add('loading');
            
            // Remove loading state if there are validation errors
            setTimeout(() => {
                if (document.querySelector('.invalid-feedback[style*="block"]')) {
                    formContainer.classList.remove('loading');
                }
            }, 100);
        });

        // Real-time validation feedback
        const inputs = form.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('is-invalid');
                    const feedback = this.parentElement.nextElementSibling;
                    if (feedback && feedback.classList.contains('invalid-feedback')) {
                        feedback.style.display = 'none';
                    }
                }
            });
        });

        // Password strength indicator (optional enhancement)
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const strength = calculatePasswordStrength(password);
            showPasswordStrength(strength);
        });

        function calculatePasswordStrength(password) {
            let score = 0;
            if (password.length >= 8) score++;
            if (/[a-z]/.test(password)) score++;
            if (/[A-Z]/.test(password)) score++;
            if (/[0-9]/.test(password)) score++;
            if (/[^A-Za-z0-9]/.test(password)) score++;
            return score;
        }

        function showPasswordStrength(strength) {
            // Remove existing strength indicator
            const existingIndicator = document.querySelector('.password-strength');
            if (existingIndicator) {
                existingIndicator.remove();
            }

            if (passwordInput.value.length > 0) {
                const strengthDiv = document.createElement('div');
                strengthDiv.className = 'password-strength';
                strengthDiv.style.cssText = `
                    margin-top: 5px;
                    font-size: 0.8rem;
                    display: flex;
                    align-items: center;
                    gap: 5px;
                `;

                let strengthText = '';
                let strengthColor = '';
                
                switch(strength) {
                    case 0:
                    case 1:
                        strengthText = 'Lemah';
                        strengthColor = '#e74c3c';
                        break;
                    case 2:
                    case 3:
                        strengthText = 'Sederhana';
                        strengthColor = '#f39c12';
                        break;
                    case 4:
                    case 5:
                        strengthText = 'Kuat';
                        strengthColor = '#27ae60';
                        break;
                }

                strengthDiv.innerHTML = `
                    <span style="color: ${strengthColor};">●</span>
                    <span style="color: ${strengthColor};">Kekuatan kata laluan: ${strengthText}</span>
                `;

                passwordInput.parentElement.parentElement.appendChild(strengthDiv);
            }
        }
    });
</script>

<style>
    /* Additional styles for password strength indicator */
    .password-strength {
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-5px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Enhanced form validation styles */
    .form-control.is-invalid {
        animation: shake 0.5s ease-in-out;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    /* Loading state enhancement */
    .form-container.loading::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }

    /* Form field focus enhancement */
    .form-control:focus + .input-icon {
        color: #2980b9;
        transform: translateY(-50%) scale(1.1);
    }

    /* Responsive enhancements */
    @media (max-width: 480px) {
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-control {
            padding: 12px 16px;
            font-size: 16px; /* Prevents zoom on mobile */
        }
        
        .btn-submit {
            padding: 16px;
            font-size: 1rem;
        }
    }
</style>
@endsection