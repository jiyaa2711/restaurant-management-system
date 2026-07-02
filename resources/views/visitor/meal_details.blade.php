@extends('layouts.visitor_layout')

@section('main')
<!-- Font Awesome link icons ke liye -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
    .detail-container {
        padding: 60px 0;
        background-color: #fcfcfc;
        min-height: 80vh;
    }

    .meal-card-horizontal {
        background: #fff;
        border-radius: 20px;
        border: 1px solid #eee;
        display: flex;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        max-width: 1000px;
        margin: 0 auto;
    }

    /* Image Section - Controlled Size */
    .meal-img-wrapper {
        width: 450px; /* Fixed Width */
        height: 450px; /* Fixed Height */
        background: #f8f8f8;
        padding: 20px;
    }

    .meal-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 15px;
    }

    /* Content Section */
    .meal-info-content {
        padding: 40px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .status-badge {
        color: #198754;
        font-weight: 700;
        font-size: 13px;
        margin-bottom: 10px;
        display: block;
    }

    .display-name {
        font-size: 36px;
        font-weight: 800;
        color: #222;
        margin-bottom: 15px;
    }

    .display-price {
        font-size: 28px;
        color: #198754;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .display-desc {
        color: #666;
        font-size: 15px;
        line-height: 1.6;
        margin-bottom: 30px;
    }

    .feature-tags {
        display: flex;
        gap: 15px;
        margin-bottom: 30px;
    }

    .tag {
        background: #f1f1f1;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 13px;
        color: #444;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .cart-action-btn {
        background: #198754;
        color: white !important;
        text-decoration: none;
        padding: 15px 30px;
        border-radius: 12px;
        font-weight: 600;
        text-align: center;
        transition: 0.3s;
        display: inline-block;
    }

    .cart-action-btn:hover {
        background: #157347;
        transform: translateY(-2px);
    }

    @media (max-width: 991px) {
        .meal-card-horizontal { flex-direction: column; }
        .meal-img-wrapper { width: 100%; height: 300px; }
    }
</style>

<div class="detail-container">
    <div class="container">
        
        <div class="meal-card-horizontal">
            <div class="meal-img-wrapper">
                <img src="{{ asset('images/meals/' . $meal->image) }}" alt="{{ $meal->name }}">
            </div>

            <div class="meal-info-content">
                <span class="status-badge">● Freshly Prepared</span>
                <h1 class="display-name">{{ $meal->name }}</h1>
                <div class="display-price">₹{{ number_format($meal->price, 2) }}</div>
                
                <p class="display-desc">
                    {{ $meal->description }}
                </p>

                <div class="feature-tags">
                    <!-- Added correct FontAwesome classes -->
                    <div class="tag"><i class="fa-solid fa-leaf" style="color: #198754;"></i> Veg</div>
                    <div class="tag"><i class="fa-solid fa-clock"></i> 20 Mins</div>
                    <div class="tag"><i class="fa-solid fa-star" style="color: #ffc107;"></i> 4.5</div>
                </div>

                <a href="{{ route('add.to.cart', $meal->id) }}" class="cart-action-btn">
                    Add to Cart 
                </a>
            </div>
        </div>

    </div>
</div>
@endsection