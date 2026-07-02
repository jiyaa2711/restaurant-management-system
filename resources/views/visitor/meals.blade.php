@extends('layouts.visitor_layout')

@section('main')

<style>
    /* --- General Styling --- */
    .menu-container {
        padding: 60px 0;
        background-color: #fcfcfc;
        min-height: 80vh;
    }

    .section-title {
        font-weight: 800;
        font-size: 36px;
        margin-bottom: 10px;
        color: #212529;
    }

    .section-subtitle {
        color: #6c757d;
        margin-bottom: 50px;
    }

    /* --- Category Card Fixes --- */
    .category-card {
        border-radius: 20px;
        overflow: hidden;
        border: none;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        transition: all 0.4s ease;
        background: #fff;
        height: 100%; /* Column ki height lega */
        display: flex;
        flex-direction: column;
    }

    .category-img-container {
        height: 250px; /* Fixed height for all category images */
        overflow: hidden;
    }

    .category-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Image crop karega stretch nahi */
        transition: transform 0.6s ease;
    }

    .category-content {
        padding: 20px;
        text-align: center;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .btn-view-all {
        background-color: #198754;
        color: white !important;
        border-radius: 30px;
        padding: 8px 20px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
        transition: 0.3s;
        display: inline-block;
        text-decoration: none;
        margin-top: 10px;
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .category-card:hover img {
        transform: scale(1.1);
    }

    /* --- Meal Card Fixes --- */
    .meal-card {
        border-radius: 20px;
        border: none;
        transition: all 0.4s ease;
        background: #fff;
        height: 100%;
    }

    .meal-img-container {
        height: 220px;
        overflow: hidden;
        border-radius: 20px 20px 0 0;
    }

    .meal-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .meal-price {
        font-size: 20px;
        font-weight: 800;
        color: #198754;
    }

    .btn-add-cart {
        background-color: #198754;
        color: white !important;
        border-radius: 12px;
        font-weight: 700;
        padding: 10px;
        border: none;
        width: 100%;
    }

    .back-btn {
        border-radius: 30px;
        padding: 8px 20px;
        font-weight: 600;
        border: 2px solid #198754;
        color: #198754;
    }
</style>

<div class="menu-container">
    <div class="container">

        {{-- Section 1: Categories --}}
        @if(!request('category'))
            <div class="text-center">
                <h1 class="section-title">What's on your <span style="color: #198754;">Mind?</span></h1>
                <p class="section-subtitle">Pick a category to explore our wide range of dishes.</p>
            </div>

            <div class="row">
                @foreach($categories as $cat)
                <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                    <div class="card category-card shadow-sm w-100">
                        <div class="category-img-container">
                            <img src="{{ asset('images/categories/' . $cat->image) }}" alt="{{ $cat->name }}">
                        </div>
                        
                        <div class="category-content">
                            <h3 style="font-weight: 700; color: #333; margin-bottom: 5px;">{{ $cat->name }}</h3>
                            <p class="text-muted small" style="font-size:15px;">Fresh and authentic {{ $cat->name }} dishes.</p>
                            <div>
                                <a href="{{ route('user.meals', ['category' => $cat->id]) }}" class="btn-view-all">
                                    View All Items
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        {{-- Section 2: Meals --}}
        @else
            <div class="row mb-5 align-items-center">
                <div class="col-md-8 text-left">
                    <h2 class="section-title" style="margin-bottom: 0;">Showing <span style="color: #198754;">Delicious Items</span></h2>
                    <p class="text-muted">Freshly prepared meals just for you.</p>
                </div>
                <div class="col-md-4 text-md-right">
                    <a href="{{ route('user.meals') }}" class="btn back-btn text-decoration-none">
                        <i class="fa fa-arrow-left"></i> All Categories
                    </a>
                </div>
            </div>

            <div class="row">
                @forelse($meals as $meal)
                <div class="col-lg-4 col-md-6 mb-5 d-flex align-items-stretch">
                    <div class="card meal-card shadow-sm w-100">
                        <div class="meal-img-container">
                            <a href="{{ route('user.meal_details', ['id' => $meal->id]) }}">
                                <img src="{{ asset('images/meals/' . $meal->image) }}" class="meal-img" alt="{{ $meal->name }}">
                            </a>
                        </div>
                        
                        <div class="card-body text-center p-4 d-flex flex-column">
                            <a href="{{ route('user.meal_details', ['id' => $meal->id]) }}" class="text-decoration-none">
                                <h4 style="font-weight: 700; color: #333;">{{ $meal->name }}</h4>
                            </a>
                            
                            <p class="meal-price mb-2">₹{{ $meal->price }}</p>
                            
                            <p class="text-muted small flex-grow-1">
                                {{ Str::limit($meal->description, 70) }}
                            </p>

                            <div class="mt-3">
                                <a href="{{ route('add.to.cart', $meal->id) }}" class="btn btn-add-cart">
                                     Order Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <h4 class="text-muted mt-3">No meals found in this category!</h4>
                    <a href="{{ route('user.meals') }}" class="btn btn-success mt-3">Go Back</a>
                </div>
                @endforelse
            </div>
        @endif

    </div>
</div>

@endsection