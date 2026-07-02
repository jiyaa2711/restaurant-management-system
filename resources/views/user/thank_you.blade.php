@extends('layouts.user_layout')

@section('main')
<div class="container mt-5 mb-5 text-center" style="min-height: 75vh; display: flex; align-items: center; justify-content: center;">
    <div class="card shadow border-0 p-5" style="border-radius: 20px; max-width: 600px; width: 100%;">
        <div class="mb-4">
            <i class="fas fa-check-circle text-success" style="font-size: 80px;"></i>
        </div>
        
        <h1 style="font-weight: 800; color: #198754; text-transform: uppercase;">Order Confirmed!</h1>
        <h4 class="text-muted mb-4">Aapka order successfully mil gaya hai.</h4>
        
        <p class="mb-5 text-secondary">Humein aapka order mil chuka hai. Hum jald hi aapka tasty meal taiyaar karke aapke address par bhej denge.</p>
        
        <div class="d-flex justify-content-center" style="gap: 15px;">
            <a href="{{ url('/user/dashboard') }}" class="btn btn-success btn-lg px-4" style="border-radius: 12px; font-weight: bold; background-color: #198754;">
                Go to Dashboard
            </a>
            <a href="{{ route('user.meals') }}" class="btn btn-outline-secondary btn-lg px-4" style="border-radius: 12px;">
                Browse More
            </a>
        </div>
    </div>
</div>
@endsection