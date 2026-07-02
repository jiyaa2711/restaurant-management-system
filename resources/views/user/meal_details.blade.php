@extends('layouts.user_layout')

@section('main')
<style>
    /* --- Main Container --- */
    .detail-container {
        padding: 80px 0;
        background-color: #f8fbf9;
        min-height: 90vh;
    }

    /* --- Premium Horizontal Card --- */
    .premium-meal-card {
        background: #ffffff;
        border-radius: 30px;
        border: none;
        display: flex;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0,0,0,0.07);
        max-width: 1100px;
        margin: 0 auto;
    }

    /* Image Styling */
    .meal-image-side {
        width: 500px;
        height: 550px;
        background: #fff;
        padding: 30px;
    }

    .meal-image-side img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 25px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    /* Info Styling */
    .meal-details-side {
        padding: 50px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* --- Category & Status Badges --- */
    .badge-wrapper {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .category-badge {
        display: inline-block;
        color: #ffffff;
        background: #198754; /* Green background for category */
        padding: 6px 15px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 10px rgba(25, 135, 84, 0.2);
    }

    .status-indicator {
        display: inline-block;
        color: #198754;
        background: #eef7f2;
        padding: 6px 15px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .meal-main-title {
        font-size: 42px;
        font-weight: 800;
        color: #1a1a1a;
        margin-bottom: 10px;
        line-height: 1.2;
    }

    .meal-main-price {
        font-size: 32px;
        color: #198754;
        font-weight: 800;
        margin-bottom: 25px;
    }

    .meal-main-desc {
        color: #555;
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 35px;
    }

    /* Modern Tags */
    .meta-tags {
        display: flex;
        gap: 12px;
        margin-bottom: 40px;
        flex-wrap: wrap;
    }

    .meta-pill {
        background: #f1f3f5;
        padding: 8px 16px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 600;
        color: #495057;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* --- SQUARE QUANTITY & BUTTON --- */
    .action-group-detail {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .qty-modern-square {
        display: flex;
        align-items: center;
        background: #f1f3f5;
        border-radius: 15px;
        padding: 6px;
        border: 1px solid #e9ecef;
    }

    .qty-sq-btn {
        width: 42px;
        height: 42px;
        border: none;
        background: #fff;
        color: #198754;
        border-radius: 10px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 0 3px 6px rgba(0,0,0,0.05);
        transition: 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .qty-sq-btn:hover {
        background: #198754;
        color: #fff;
    }

    .qty-sq-input {
        width: 55px;
        border: none !important;
        background: transparent !important;
        text-align: center !important;
        font-weight: 800;
        font-size: 1.2rem;
        outline: none !important;
        padding: 0 !important;
    }

    .btn-add-plate-lg {
        background: #198754;
        color: white !important;
        flex: 1;
        padding: 18px;
        border-radius: 15px;
        font-weight: 700;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: 0.3s;
        border: none;
        display: inline-block;
        cursor: pointer;
    }

    .btn-add-plate-lg:hover {
        background: #146c43;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(25, 135, 84, 0.25);
    }

    @media (max-width: 991px) {
        .premium-meal-card { flex-direction: column; }
        .meal-image-side { width: 100%; height: auto; padding: 20px; }
        .meal-details-side { padding: 30px; }
        .action-group-detail { flex-direction: column; align-items: stretch; }
        .meal-main-title { font-size: 32px; }
    }
</style>

<div class="detail-container">
    <div class="container">
        
        <div class="premium-meal-card">
            <div class="meal-image-side text-center">
                <img src="{{ asset('images/meals/' . $meal->image) }}" alt="{{ $meal->name }}">
            </div>

            <div class="meal-details-side">
                <div class="badge-wrapper">
                    <div class="category-badge">
                        <i class="fas fa-utensils me-1"></i> {{ $meal->category->name ?? 'Special Menu' }}
                    </div>
                    <div class="status-indicator">
                        <i class="fas fa-circle me-1" style="font-size: 8px;"></i> Freshly Prepared
                    </div>
                </div>
                
                <h1 class="meal-main-title">{{ $meal->name }}</h1>
                <div class="meal-main-price">₹{{ number_format($meal->price, 2) }}</div>
                
                <p class="meal-main-desc">
                    {{ $meal->description }}
                </p>

                <div class="meta-tags">
                    <div class="meta-pill"><i class="fas fa-leaf text-success"></i> Pure Veg</div>
                    <div class="meta-pill"><i class="fas fa-clock text-primary"></i> 15-20 Mins</div>
                    <div class="meta-pill"><i class="fas fa-star text-warning"></i> 4.8 Rating</div>
                </div>

                <form action="{{ route('add.to.cart', $meal->id) }}" method="GET">
                    <div class="action-group-detail">
                        <div class="qty-modern-square">
                            <button type="button" class="qty-sq-btn" onclick="let i = this.parentNode.querySelector('input'); if(i.value > 1) i.stepDown();">
                                <i class="fas fa-minus"></i>
                            </button>
                            
                            <input type="number" name="quantity" value="1" min="1" max="10" class="qty-sq-input" readonly>
                            
                            <button type="button" class="qty-sq-btn" onclick="this.parentNode.querySelector('input').stepUp()">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <button type="submit" class="btn-add-plate-lg">
                            Add To Plate <i class="fas fa-shopping-basket ms-2"></i>
                        </button>
                    </div>
                </form>

                <div class="mt-5 pt-3 border-top">
                    <a href="{{ route('user.meals') }}" class="text-muted text-decoration-none small fw-bold hover-green" style="color:#198754; font-size:15px;">
                        <i class="fas fa-arrow-left me-2" style="color:#198754; font-size:15px;"></i> EXPLORE MORE DISHES
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection