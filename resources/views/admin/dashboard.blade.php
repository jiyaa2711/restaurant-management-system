@extends('layouts.admin_layout')

@section('main')
<div class="container-fluid py-4" style="background-color: #f4f7f6; min-height: 100vh;">
    
    {{-- Header Section --}}
    <div class="row mb-4 px-4">
        <div class="col-12">
            <div style="border-left: 5px solid #00a651; padding-left: 15px;">
                <h2 class="fw-bold mb-0" style="color: #2d3436; letter-spacing: -1px; font-size: 1.6rem;">
                    Admin <span style="color: #00a651;">Control</span> Panel
                </h2>
            </div>
        </div>
    </div>

    {{-- Stats Grid: 3 Boxes per Row with Gutter spacing --}}
    <div class="row g-4 px-4"> {{-- g-4 se rows aur columns ke beech auto space milta hai --}}
        
        {{-- Row 1 --}}
        <div class="col-lg-4 col-md-6 mb-2"> {{-- mb-2 add kiya extra gap ke liye --}}
            <a href="{{ route('admin.orders') }}" class="text-decoration-none">
                <div class="stat-card">
                    <div class="accent-bar bg-success"></div>
                    <div class="card-content" style="padding: 20px;">
                        <div class="icon-shape bg-light-success mb-3">
                            <i class="fas fa-shopping-basket text-success"></i>
                        </div>
                        <h3 class="stat-value">{{ $order_count }}</h3>
                        <p class="stat-name">Total Orders</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 mb-2">
            <a href="{{ route('admin.bookings') }}" class="text-decoration-none">
                <div class="stat-card">
                    <div class="accent-bar bg-warning"></div>
                    <div class="card-content" style="padding: 20px;">
                        <div class="icon-shape bg-light-warning mb-3">
                            <i class="fas fa-chair text-warning"></i>
                        </div>
                        <h3 class="stat-value">{{ $booking_count }}</h3>
                        <p class="stat-name">Reservations</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 mb-2">
            <a href="{{ route('admin.meals.index') }}" class="text-decoration-none">
                <div class="stat-card">
                    <div class="accent-bar bg-info"></div>
                    <div class="card-content" style="padding: 20px;">
                        <div class="icon-shape bg-light-info mb-3">
                            <i class="fas fa-utensils text-info"></i>
                        </div>
                        <h3 class="stat-value">{{ $meals_count }}</h3>
                        <p class="stat-name">Menu Items</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Row 2 --}}
        <div class="col-lg-4 col-md-6">
            <a href="{{ route('admin.users') }}" class="text-decoration-none">
                <div class="stat-card">
                    <div class="accent-bar bg-primary"></div>
                    <div class="card-content" style="padding: 20px;">
                        <div class="icon-shape bg-light-primary mb-3">
                            <i class="fas fa-users text-primary"></i>
                        </div>
                        <h3 class="stat-value">{{ $users_count }}</h3>
                        <p class="stat-name">Customers</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="{{ route('admin.categories.index') }}" class="text-decoration-none">
                <div class="stat-card">
                    <div class="accent-bar" style="background-color: #00a651 !important;"></div>
                    <div class="card-content" style="padding: 20px;">
                        <div class="icon-shape" style="background-color: #e8f5e9;">
                            <i class="fas fa-list text-success"></i>
                        </div>
                        <h3 class="stat-value">{{ $category_count }}</h3>
                        <p class="stat-name">Categories</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="{{ route('admin.feedback_list') }}" class="text-decoration-none">
                <div class="stat-card">
                    <div class="accent-bar bg-danger"></div>
                    <div class="card-content" style="padding: 20px;">
                        <div class="icon-shape bg-light-danger mb-3">
                            <i class="fas fa-comment-alt text-danger"></i>
                        </div>
                        <h3 class="stat-value">{{ $feedback_count }}</h3>
                        <p class="stat-name">User Feedbacks</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<style>
    .stat-card {
        background: #ffffff;
        border-radius: 15px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0,0,0,0.03);
        height: 100%;
        border: 1px solid rgba(0,0,0,0.05);
    }
    .stat-card:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,0.08); }
    .accent-bar { position: absolute; top: 0; left: 0; width: 100%; height: 4px; }
    .icon-shape { width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; }
    .stat-value { font-size: 28px; font-weight: 800; color: #1e272e; margin-bottom: 2px; }
    .stat-name { font-size: 12px; font-weight: 700; color: #a0a0a0; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0; }
    
    .bg-light-success { background-color: #e8f5e9; }
    .bg-light-warning { background-color: #fff8e1; }
    .bg-light-info { background-color: #e1f5fe; }
    .bg-light-primary { background-color: #f3e5f5; }
    .bg-light-danger { background-color: #ffebee; }
</style>
@endsection