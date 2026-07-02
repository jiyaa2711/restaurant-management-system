@extends('layouts.user_layout')

@section('main')

<style>
    .menu-page-container { padding: 40px 0; background-color: #fcfcfc; min-height: 100vh; }

    /* --- 1. Hero Search Section --- */
    .search-hero-section {
        background: #ffffff;
        border-radius: 25px;
        padding: 40px;
        text-align: center;
        box-shadow: 0 10px 40px rgba(0,0,0,0.03);
        margin-bottom: 50px;
        border: 1px solid #f1f1f1;
    }

    .search-hero-section h1 {
        font-weight: 800;
        font-size: 2.5rem;
        color: #1a1a1a;
        margin-bottom: 25px;
    }

    .main-search-wrapper {
        max-width: 600px;
        margin: 0 auto;
        position: relative;
    }

    .main-search-input {
        height: 60px;
        border-radius: 15px !important;
        padding-left: 25px;
        padding-right: 120px;
        font-size: 1.1rem;
        border: 2px solid #eee !important;
        transition: 0.3s;
    }

    .main-search-input:focus {
        border-color: #198754 !important;
        box-shadow: 0 0 15px rgba(25, 135, 84, 0.1) !important;
    }

    .search-action-btn {
        position: absolute;
        right: 8px;
        top: 8px;
        bottom: 8px;
        background: #198754 !important;
        color: white !important;
        border-radius: 12px !important;
        width: 100px;
        border: none;
        font-weight: 600;
        cursor: pointer;
    }

    /* --- 2. Section Header --- */
    .section-header-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding: 0 10px;
    }

    .section-header-row h2 {
        font-weight: 700;
        position: relative;
        padding-left: 15px;
    }

    .section-header-row h2::before {
        content: '';
        position: absolute;
        left: 0;
        top: 20%;
        bottom: 20%;
        width: 5px;
        background: #198754;
        border-radius: 10px;
    }

    /* --- 3. Premium Food Card --- */
    .food-card-new {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid #f0f0f0 !important;
        transition: 0.3s cubic-bezier(.25,.8,.25,1);
        height: 100%;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.02);
    }

    .food-card-new:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
    }

    .food-img-new { height: 230px; object-fit: cover; width: 100%; transition: 0.5s; }
    .food-card-new:hover .food-img-new { transform: scale(1.05); }

    .food-info-new { padding: 25px; text-align: center; }
    .food-price-new { font-weight: 800; font-size: 1.4rem; color: #198754; margin: 10px 0; }
    
    /* --- 4. Quantity Box Fixes --- */
    .qty-box-wrapper {
        display: flex;
        justify-content: center;
        width: 100%;
        margin-bottom: 20px;
    }

    .qty-box-modern {
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        background: #f1f3f5;
        border-radius: 12px;
        width: 140px;
        padding: 5px;
        border: 1px solid #e9ecef;
    }

    .qty-btn-modern {
        width: 35px;
        height: 35px;
        border: none;
        background: white;
        border-radius: 10px;
        color: #198754;
        font-weight: bold;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .qty-input-modern {
        width: 50px;
        border: none !important;
        background: transparent !important;
        text-align: center !important;
        font-weight: 800;
        font-size: 1.1rem;
        outline: none !important;
        padding: 0 !important;
        margin: 0;
        appearance: textfield;
    }

    .qty-input-modern::-webkit-outer-spin-button,
    .qty-input-modern::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .add-plate-btn-new {
        background: #198754;
        color: white !important;
        width: 100%;
        padding: 14px;
        border-radius: 15px;
        border: none;
        font-weight: 700;
        letter-spacing: 0.5px;
        box-shadow: 0 5px 15px rgba(25, 135, 84, 0.2);
        transition: 0.3s;
    }

    .add-plate-btn-new:hover {
        background: #146c43;
        transform: scale(1.02);
    }
</style>

<div class="menu-page-container">
    <div class="container">
        
        <div class="search-hero-section">
            <h1>Craving something <span style="color: #198754;">Delicious?</span></h1>
            <div class="main-search-wrapper">
                <form action="{{ route('user.meals') }}" method="GET">
                    <input type="text" name="search" class="form-control main-search-input" 
                           placeholder="Search pizza, burger, sandwiches..." value="{{ request('search') }}">
                    <button class="search-action-btn" type="submit">Search</button>
                </form>
            </div>
        </div>

        <div class="section-header-row">
            <h2>{{ request('category') || request('search') ? 'Results for you' : 'Our Specials' }}</h2>
            @if(request('category') || request('search'))
                <a href="{{ route('user.meals') }}" class="btn btn-outline-dark px-4 rounded-pill">
                    <i class="fa fa-arrow-left me-2"></i> View All Menu
                </a>
            @endif
        </div>

        <div class="row">
            @php
                $itemsToDisplay = (request('category') || request('search')) ? $meals : $categories;
            @endphp

            @forelse($itemsToDisplay as $item)
            <div class="col-lg-4 col-md-6">
                <div class="food-card-new">
                    @if(request('category') || request('search'))
                        <a href="{{ route('user.meal_details', $item->id) }}" class="text-decoration-none text-dark">
                            <img src="{{ asset('images/meals/' . $item->image) }}" class="food-img-new">
                            <div class="food-info-new">
                                <h4 class="fw-bold mb-1">{{ $item->name }}</h4>
                                <div class="food-price-new">₹{{ number_format($item->price, 2) }}</div>
                                <p class="text-muted small mb-3">{{ Str::limit($item->description, 60) }}</p>
                        </a>
                                <form action="{{ route('add.to.cart', $item->id) }}" method="GET">
                                    <div class="qty-box-wrapper">
                                        <div class="qty-box-modern">
                                            <button type="button" class="qty-btn-modern" onclick="let i = this.parentNode.querySelector('input'); if(i.value > 1) i.stepDown();">-</button>
                                            <input type="number" name="quantity" value="1" min="1" max="10" class="qty-input-modern" readonly>
                                            <button type="button" class="qty-btn-modern" onclick="this.parentNode.querySelector('input').stepUp()">+</button>
                                        </div>
                                    </div>
                                    <button type="submit" class="add-plate-btn-new">
                                        <i class="fa fa-shopping-basket me-2"></i> Add to Plate
                                    </button>
                                </form>
                            </div>
                    @else
                        <a href="{{ route('user.meals', ['category' => $item->id]) }}" class="text-decoration-none text-dark">
                            <img src="{{ asset('images/categories/' . $item->image) }}" class="food-img-new">
                            <div class="p-4 text-center">
                                <h3 class="fw-bold m-0" style="font-weight:bold;">{{ $item->name }}</h3>
                                <span style="color:green; font-size:large; font-weight:bold;">Explore Menu <i class="fa fa-chevron-right ms-1"></i></span>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <h3 class="text-muted">No items found matching your request.</h3>
                <a href="{{ route('user.meals') }}" class="btn btn-success mt-3 rounded-pill">Reset Filters</a>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection