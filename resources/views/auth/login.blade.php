@extends('layouts.visitor_layout')

@section('main')
<div class="auth-wrapper">
    <div class="container py-5">
        <div class="row justify-content-center" style="position: relative; z-index: 2;">
            <div class="col-lg-7 col-md-10">
                <div class="card border-0 shadow-lg" style="border-radius: 20px; background: rgba(255, 255, 255, 0.9);">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <h2 class="fw-bold text-success" style="font-weight:bold;">Login</h2>
                            <p class="text-muted small mt-2">Welcome back! Please login to your account.</p>
                        </div>

                        {{-- Global Login Error (Invalid Credentials) --}}
                        @if(session('error'))
                            <div class="alert alert-danger border-0 small py-2 mb-4 text-center">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login.process') }}">
                            @csrf

                            {{-- Email Address --}}
                            <div class="row mb-4 align-items-center">
                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-dark mb-sm-0" style="font-size:18px;">Email Address</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="email" name="email" value="{{ old('email') }}" 
                                        class="form-control custom-input @error('email') is-invalid @enderror" 
                                        placeholder="Enter your email">
                                    
                                    @error('email')
                                        <div class="text-danger small mt-1 fw-bold">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="row mb-5 align-items-center">
                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-dark mb-sm-0" style="font-size:18px;">Password</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="password" name="password" 
                                        class="form-control custom-input @error('password') is-invalid @enderror" 
                                        placeholder="Enter password">
                                    
                                    @error('password')
                                        <div class="text-danger small mt-1 fw-bold">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success fw-bold shadow-sm py-2 login-btn w-50">
                                        LOGIN NOW
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <p class="small text-muted mb-0">
                                Don't have an account? <a href="/register" class="text-success fw-bold text-decoration-none">Register here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Background Styles */
    .auth-wrapper {
        position: relative;
        min-height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        margin-top: -80px;
        overflow: hidden;
    }

    .auth-wrapper::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
                    url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=1470&q=80');
        background-size: cover;
        background-position: center;
        filter: blur(10px);
        transform: scale(1.1);
        z-index: 1;
    }

    .custom-input {
        background-color: #f8f9fa !important;
        border: 2px solid #edeff1 !important;
        border-radius: 12px !important;
        padding: 10px 15px !important;
        font-size: 0.95rem !important;
        transition: all 0.3s ease;
    }

    /* Error highlight */
    .is-invalid {
        border-color: #dc3545 !important;
    }

    .custom-input:focus {
        background-color: #fff !important;
        border-color: #00a651 !important;
        box-shadow: 0 0 0 4px rgba(0, 166, 81, 0.1) !important;
    }

    .login-btn {
        background: #00a651;
        border: none;
        border-radius: 12px;
        letter-spacing: 1px;
        transition: 0.3s;
    }

    .login-btn:hover {
        background: #008a44;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 166, 81, 0.3);
    }
</style>
@endsection