@extends('layouts.app')

@section('content')
<div class="form-container">
    <div class="form-header">
        <h1 class="form-title">
            <i class="fas fa-sign-in-alt"></i> Admin Login
        </h1>
        <p class="form-subtitle">Akses ke Portal Pentadbiran Masjid</p>
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

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" id="login-form">
        @csrf

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
                    autofocus
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
            <label for="password">
                <i class="fas fa-lock"></i> {{ __('Password') }}
            </label>
            <div class="input-group">
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    placeholder="Masukkan kata laluan anda" 
                    required 
                    autocomplete="current-password"
                >
                <i class="fas fa-eye input-icon clickable" onclick="togglePassword('password')"></i>
            </div>
            @error('password')
                <div class="invalid-feedback" style="display: block;">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-check">
            <input 
                class="form-check-input" 
                type="checkbox" 
                name="remember" 
                id="remember" 
                {{ old('remember') ? 'checked' : '' }}
            >
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        <button type="submit" class="btn-submit">
            <i class="fas fa-sign-in-alt"></i>
            {{ __('Log In') }}
        </button>
    </form>

    <div class="form-footer">
        @if (Route::has('password.request'))
            <small>
                Lupa kata laluan? 
                <a href="{{ route('password.request') }}">{{ __('Reset Password') }}</a>
            </small>
            <br>
        @endif
        @if (Route::has('register'))
            <small>
                Belum mempunyai akaun? 
                <a href="{{ route('register') }}">{{ __('Register here') }}</a>
            </small>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('login-form');
        
        form.addEventListener('submit', function(e) {
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
    });
</script>
@endsection