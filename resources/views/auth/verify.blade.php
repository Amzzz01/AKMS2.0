@extends('layouts.app')

@section('content')
<div class="form-container">
    <div class="form-header">
        <h1 class="form-title">
            <i class="fas fa-envelope-open-text"></i> Verify Your Email
        </h1>
        <p class="form-subtitle">Pengesahan Alamat Email Diperlukan</p>
    </div>

    @if (session('resent'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    <div class="verification-content">
        <div class="verification-icon">
            <i class="fas fa-envelope"></i>
        </div>
        
        <div class="verification-message">
            <h3>{{ __('Almost There!') }}</h3>
            <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
            <p class="email-instruction">
                <i class="fas fa-info-circle"></i>
                Sila semak folder <strong>Inbox</strong> dan <strong>Spam/Junk</strong> anda untuk email pengesahan.
            </p>
        </div>

        <div class="verification-actions">
            <div class="resend-section">
                <p class="resend-text">{{ __('If you did not receive the email') }}?</p>
                
                <form method="POST" action="{{ route('verification.resend') }}" id="resend-form">
                    @csrf
                    <button type="submit" class="btn-resend">
                        <i class="fas fa-paper-plane"></i>
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>
            </div>

            <div class="help-section">
                <div class="help-card">
                    <h4><i class="fas fa-question-circle"></i> Perlukan Bantuan?</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Pastikan alamat email yang betul</li>
                        <li><i class="fas fa-check"></i> Semak folder spam/junk mail</li>
                        <li><i class="fas fa-check"></i> Tunggu beberapa minit untuk email tiba</li>
                        <li><i class="fas fa-check"></i> Cuba hantar semula email pengesahan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="form-footer">
        <small>
            <i class="fas fa-shield-alt"></i>
            Email pengesahan adalah untuk keselamatan akaun anda
        </small>
    </div>
</div>

<style>
    /* Additional styles specific to verification page */
    .verification-content {
        text-align: center;
        padding: 20px 0;
    }

    .verification-icon {
        margin-bottom: 25px;
    }

    .verification-icon i {
        font-size: 4rem;
        color: #3498db;
        background: linear-gradient(135deg, #e3f2fd, #bbdefb);
        padding: 30px;
        border-radius: 50%;
        box-shadow: 0 8px 25px rgba(52, 152, 219, 0.2);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); box-shadow: 0 8px 25px rgba(52, 152, 219, 0.2); }
        50% { transform: scale(1.05); box-shadow: 0 12px 35px rgba(52, 152, 219, 0.3); }
        100% { transform: scale(1); box-shadow: 0 8px 25px rgba(52, 152, 219, 0.2); }
    }

    .verification-message {
        margin-bottom: 30px;
    }

    .verification-message h3 {
        color: #2c3e50;
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .verification-message p {
        color: #666;
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .email-instruction {
        background: linear-gradient(135deg, #fff3cd, #ffeaa7);
        border: 1px solid #f39c12;
        border-radius: 10px;
        padding: 15px;
        margin: 20px 0;
        display: flex;
        align-items: center;
        gap: 10px;
        text-align: left;
    }

    .email-instruction i {
        color: #f39c12;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .verification-actions {
        margin: 30px 0;
    }

    .resend-section {
        margin-bottom: 30px;
    }

    .resend-text {
        color: #666;
        margin-bottom: 15px;
        font-size: 0.95rem;
    }

    .btn-resend {
        background: linear-gradient(45deg, #3498db, #2980b9);
        color: white;
        padding: 15px 30px;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 6px 20px rgba(52, 152, 219, 0.3);
        position: relative;
        overflow: hidden;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        border: none;
        font-family: 'Poppins', sans-serif;
    }

    .btn-resend::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.6s ease;
    }

    .btn-resend:hover::before {
        left: 100%;
    }

    .btn-resend:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(52, 152, 219, 0.4);
        color: white;
        text-decoration: none;
    }

    .btn-resend:active {
        transform: translateY(-1px);
    }

    .help-section {
        margin-top: 30px;
    }

    .help-card {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 15px;
        padding: 25px;
        text-align: left;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border: 1px solid #e1e8ed;
    }

    .help-card h4 {
        color: #2c3e50;
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .help-card h4 i {
        color: #3498db;
    }

    .help-card ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .help-card li {
        padding: 8px 0;
        color: #555;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.95rem;
    }

    .help-card li i {
        color: #27ae60;
        font-size: 0.9rem;
        width: 16px;
        flex-shrink: 0;
    }

    .form-footer {
        text-align: center;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #e1e8ed;
    }

    .form-footer small {
        color: #666;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .form-footer i {
        color: #27ae60;
    }

    /* Success alert enhancement */
    .alert-success {
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        color: #155724;
        border: none;
        border-left: 4px solid #28a745;
        border-radius: 10px;
        padding: 15px 20px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 500;
        animation: slideInDown 0.5s ease;
    }

    .alert-success i {
        color: #28a745;
        font-size: 1.2rem;
    }

    @keyframes slideInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Loading state for resend button */
    .btn-resend.loading {
        pointer-events: none;
        opacity: 0.7;
    }

    .btn-resend.loading::after {
        content: '';
        position: absolute;
        width: 16px;
        height: 16px;
        border: 2px solid transparent;
        border-top: 2px solid white;
        border-radius: 50%;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: translateY(-50%) rotate(0deg); }
        100% { transform: translateY(-50%) rotate(360deg); }
    }

    /* Responsive enhancements */
    @media (max-width: 768px) {
        .verification-icon i {
            font-size: 3rem;
            padding: 25px;
        }

        .verification-message h3 {
            font-size: 1.3rem;
        }

        .help-card {
            padding: 20px;
        }

        .btn-resend {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .verification-icon i {
            font-size: 2.5rem;
            padding: 20px;
        }

        .email-instruction {
            padding: 12px;
            font-size: 0.9rem;
        }

        .help-card {
            padding: 15px;
        }

        .help-card h4 {
            font-size: 1.1rem;
        }

        .help-card li {
            font-size: 0.9rem;
        }
    }

    /* Hover effects for interactive elements */
    .help-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    /* Focus states for accessibility */
    .btn-resend:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.3);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const resendForm = document.getElementById('resend-form');
        const resendButton = document.querySelector('.btn-resend');
        
        resendForm.addEventListener('submit', function(e) {
            // Add loading state
            resendButton.classList.add('loading');
            resendButton.innerHTML = '<i class="fas fa-paper-plane"></i> Menghantar...';
            
            // Disable button to prevent double submission
            resendButton.disabled = true;
            
            // Reset button state after some time (in case of errors)
            setTimeout(() => {
                resendButton.classList.remove('loading');
                resendButton.innerHTML = '<i class="fas fa-paper-plane"></i> {{ __("Resend Verification Email") }}';
                resendButton.disabled = false;
            }, 5000);
        });

        // Add countdown timer for resend button (optional enhancement)
        let countdown = 0;
        
        function startCountdown() {
            countdown = 60; // 60 seconds cooldown
            resendButton.disabled = true;
            
            const timer = setInterval(() => {
                if (countdown <= 0) {
                    clearInterval(timer);
                    resendButton.disabled = false;
                    resendButton.innerHTML = '<i class="fas fa-paper-plane"></i> {{ __("Resend Verification Email") }}';
                } else {
                    resendButton.innerHTML = `<i class="fas fa-clock"></i> Tunggu ${countdown}s`;
                    countdown--;
                }
            }, 1000);
        }

        // Start countdown if email was just resent
        @if (session('resent'))
            startCountdown();
        @endif
    });
</script>
@endsection