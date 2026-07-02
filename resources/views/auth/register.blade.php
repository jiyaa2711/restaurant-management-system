@extends('layouts.visitor_layout')

@section('main')
{{-- Background Wrapper for Blur Effect --}}
<div class="auth-wrapper">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                <div class="card border-0 shadow-lg register-card">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <h2 class="fw-bold text-success" style="font-weight:bold;">Create Account</h2>
                            <p class="text-muted small mt-2">Join us today! It only takes a minute.</p>
                        </div>

                        <form method="POST" action="/register">
                            @csrf
{{-- Full Name --}}
<div class="row mb-3 align-items-center">
    <div class="col-sm-4">
        <label class="form-label fw-bold text-dark mb-0" style="font-size:18px;">Full Name</label>
    </div>
    <div class="col-sm-8">
        <input type="text" name="name" value="{{ old('name') }}" class="form-control custom-input @error('name') is-invalid @enderror" placeholder="Enter full name">
        @error('name')
            <div class="text-danger small mt-1 fw-bold">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Email Address --}}
<div class="row mb-3 align-items-center">
    <div class="col-sm-4">
        <label class="form-label fw-bold text-dark mb-0" style="font-size:18px;">Email Address</label>
    </div>
    <div class="col-sm-8">
        <input type="email" name="email" value="{{ old('email') }}" class="form-control custom-input @error('email') is-invalid @enderror" placeholder="example@mail.com">
        @error('email')
            <div class="text-danger small mt-1 fw-bold">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Password --}}
<div class="row mb-3 align-items-center">
    <div class="col-sm-4">
        <label class="form-label fw-bold text-dark mb-0" style="font-size:18px;">Password</label>
    </div>
    <div class="col-sm-8">
        <input type="password" name="password" class="form-control custom-input @error('password') is-invalid @enderror" placeholder="Create password">
        @error('password')
            <div class="text-danger small mt-1 fw-bold">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Confirm Password --}}
<div class="row mb-4 align-items-center">
    <div class="col-sm-4">
        <label class="form-label fw-bold text-dark mb-0" style="font-size:18px;">Confirm Password</label>
    </div>
    <div class="col-sm-8">
        <input type="password" name="password_confirmation" class="form-control custom-input" placeholder="Repeat password">
    </div>
</div>                    <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success fw-bold shadow-sm py-2 register-btn w-50">
                                        REGISTER NOW
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <p class="small text-muted mb-0">
                                Already have an account? <a href="/login" class="text-success fw-bold text-decoration-none">Login here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Full Screen Background Setup */
    .auth-wrapper {
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
                    url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        margin-top: -48px; /* Layout navbar gap correction */
        position: relative;
    }

    /* Blur Effect Layer */
    .auth-wrapper::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        z-index: 0;
    }

    .container {
        position: relative;
        z-index: 1;
    }

    /* Glassmorphism Card Style */
    .register-card {
        background: rgba(255, 255, 255, 0.9) !important;
        border-radius: 20px !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
    }

    .custom-input {
        background-color: #f8f9fa !important;
        border: 2px solid #edeff1 !important;
        border-radius: 12px !important;
        padding: 12px 15px !important;
        transition: all 0.3s ease;
    }

    .custom-input:focus {
        background-color: #fff !important;
        border-color: #00a651 !important;
        box-shadow: 0 0 0 4px rgba(0, 166, 81, 0.1) !important;
    }

    .register-btn {
        background: #00a651;
        border: none;
        border-radius: 12px;
        transition: 0.3s;
        letter-spacing: 1px;
    }

    .register-btn:hover {
        background: #008a44;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 166, 81, 0.3);
    }

    .col-sm-4 {
        padding-right: 10px;
    }
</style>
@endsection