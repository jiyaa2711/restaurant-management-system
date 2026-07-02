@extends('layouts.user_layout')

@section('main')

<div class="position-fixed w-100 d-flex justify-content-center" style="z-index: 9999; top: 20px;">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-lg" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif
</div>

{{-- Slider Section Updated: Interval set to 2000 (2 Seconds) --}}
<div id="vegeHomeSlider" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2000">
    <ol class="carousel-indicators centered-indicators">
        <li data-target="#vegeHomeSlider" data-slide-to="0" class="active"></li>
        <li data-target="#vegeHomeSlider" data-slide-to="1"></li>
        <li data-target="#vegeHomeSlider" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        
        {{-- Slide 1 --}}
        <div class="carousel-item active">
            <div class="slider-overlay" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('images/slider1.jpg') }}'); background-size: cover; background-position: center; height: 600px;">
                <div class="container h-100 d-flex align-items-center">
                    <div class="text-white text-left">
                        <h1 class="display-3 font-weight-bold">The Art of <br><span style="color: #28a745;">Fine Dining</span></h1>
                        <p class="lead mt-3" style="max-width: 600px; color:#fff;">Savor the taste of nature with our hand-picked organic ingredients.</p>
                        <div class="mt-4 d-flex">
                            <a href="{{ route('user.meals') }}" class="btn btn-success btn-lg px-5 rounded-pill mr-3 shadow">Explore Menu</a>
                            <a href="{{ route('user.book_table') }}" class="btn btn-success btn-lg px-5 rounded-pill shadow">Book A Table</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Slide 2 --}}
        <div class="carousel-item">
            <div class="slider-overlay" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('images/slider2.jpg') }}'); background-size: cover; background-position: center; height: 600px;">
                <div class="container h-100 d-flex align-items-center">
                    <div class="text-white text-left">
                        <h1 class="display-3 font-weight-bold">Fresh <br><span style="color: #28a745;">Ingredients</span></h1>
                        <p class="lead mt-3" style="max-width: 600px; color:#fff;">Quality meals prepared with love and organic vegetables.</p>
                        <div class="mt-4 d-flex">
                            <a href="{{ route('user.meals') }}" class="btn btn-success btn-lg px-5 rounded-pill mr-3 shadow">View Menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Slide 3 --}}
        <div class="carousel-item">
            <div class="slider-overlay" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('images/slider3.jpg') }}'); background-size: cover; background-position: center; height: 600px;">
                <div class="container h-100 d-flex align-items-center">
                    <div class="text-white text-left">
                        <h1 class="display-3 font-weight-bold">Delicious <br><span style="color: #28a745;">Fast Food</span></h1>
                        <p class="lead mt-3" style="max-width:600px; color:#fff;" >Experience the best taste in Ahmedabad at LJ University.</p>
                        <div class="mt-4 d-flex">
                            <a href="{{ route('user.book_table') }}" class="btn btn-success btn-lg px-5 rounded-pill shadow">Reserve Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-2 font-weight-bold">Our <span class="text-success">Famous Meals</span></h2>
        <p class="text-muted mb-5" style="font-weight:bold; font-size:15px;">Try our most loved and top-rated dishes from Ahmedabad.</p>
        
        <div class="row">
            @if(isset($famous_meals) && $famous_meals->count() > 0)
                @foreach($famous_meals as $meal)
                <div class="col-lg-3 col-md-6 mb-4 d-flex">
                    <div class="card border-0 shadow-sm meal-card-new w-100">
                        <a href="{{ route('user.meal_details', ['id' => $meal->id]) }}" class="text-decoration-none">
                            <div class="meal-img-container">
                                <img src="{{ asset('images/meals/' . $meal->image) }}" class="card-img-top" alt="{{ $meal->name }}">
                            </div>
                        </a>
                        <div class="card-body text-center">
                            <a href="{{ route('user.meal_details', ['id' => $meal->id]) }}" class="text-decoration-none">
                                <h6 class="font-weight-bold mb-2 text-dark">{{ $meal->name }}</h6>
                            </a>
                            <p class="small text-muted mb-2" style="font-weight:bold; font-size:15px;">{{ \Illuminate\Support\Str::limit($meal->description, 40) }}</p>
                            <div class="meal-price-bottom text-success font-weight-bold">
                                ₹{{ $meal->price }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-muted">No meals found in the database.</p>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- Rest of the sections (About & Contact) remain same --}}
<section id="about" class="section-padding bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('images/about-img.png') }}" class="img-fluid rounded shadow-lg border-0">
            </div>
            <div class="col-md-6 pl-md-5 mt-4 mt-md-0 text-left">
                <h2 class="font-weight-bold">About <span class="text-success">Vege</span></h2>
                <p class="text-muted lead mt-3">Our mission is simple: To serve honest and delicious food that nourishes both body and soul.</p>
                <p>We combine traditional recipes with modern culinary techniques at LJ University.</p>
                <a href="{{ route('user.about') }}" class="btn btn-success rounded-pill px-4 shadow">Read More</a>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="section-padding bg-dark text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 mb-4 text-left">
                <h2 class="font-weight-bold text-white">Get In <span class="text-success">Touch</span></h2>
                <p class="mt-4"><i class="fa fa-map-marker text-success mr-3"></i> LJ University, Ahmedabad</p>
                <p><i class="fa fa-phone text-success mr-3"></i> +91 98765 43210</p>
                <p><i class="fa fa-envelope text-success mr-3"></i> info@vege.com</p>
            </div>
            <div class="col-md-7">
                <form class="bg-white p-4 rounded text-dark shadow-lg">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block py-2 rounded-pill shadow">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    .section-padding { padding: 80px 0; margin: 0; }
    .text-decoration-none { text-decoration: none !important; }

    .meal-card-new {
        border-radius: 20px;
        overflow: hidden;
        background: #fff;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid #f0f0f0 !important;
    }

    .meal-img-container { height: 200px; overflow: hidden; position: relative; cursor: pointer; }
    .meal-img-container img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease; }

    .meal-card-new:hover { transform: translateY(-15px); box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important; border-color: #28a745 !important; }
    .meal-card-new:hover .meal-img-container img { transform: scale(1.15); }
    .meal-card-new h6 { font-size: 1.1rem; color: #333; transition: color 0.3s; }
    .meal-card-new:hover h6 { color: #28a745 !important; }

    .meal-price-bottom { font-size: 1.25rem; letter-spacing: 0.5px; margin-top: 10px; }

    /* Updated Indicators Styling for Centering */
    .carousel-indicators.centered-indicators { 
        bottom: 30px !important; 
        left: 0;
        right: 0;
        display: flex !important;
        justify-content: center !important;
        margin-left: auto;
        margin-right: auto;
        padding-left: 0;
    }

    .carousel-indicators li { 
        width: 12px; 
        height: 12px; 
        border-radius: 50%; 
        background-color: #fff; 
        opacity: 0.5; 
        margin: 0 5px; 
        border: none;
    }

    .carousel-indicators li.active { 
        background-color: #28a745; 
        opacity: 1; 
    }

    #contact { margin-bottom: 0 !important; }
</style>

@endsection