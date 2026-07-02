@extends('layouts.visitor_layout')

@section('main')
<div class="about_section layout_padding" style="min-height: 80vh; padding-bottom: 90px; padding-top: 60px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="about_taital" style="font-weight: bold; color: #198754; font-size: 45px;">Our Culinary Journey</h1>
                <p class="about_text" style="font-size: 18px; color: #666; margin-top: 10px;">Experience the true essence of vegetarian flavors, cooked to perfection.</p>
            </div>
        </div>
        
        <div class="about_section_2" style="margin-top: 60px;">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="about_img">
                        <img src="{{ asset('images/about-img.png') }}" class="img-fluid" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fresh_taital" style="font-size: 32px; font-weight: bold; color: #212529; margin-bottom: 20px;">The Secret of Our Taste</div>
                    <p class="ipsum_text" style="line-height: 1.9; color: #555; font-size: 16px; text-align: justify;">
                        We believe that great food starts with the finest ingredients. Every dish is crafted with love, using farm-fresh vegetables and authentic spices to bring you a taste that feels like home. Whether it's a quick snack or a hearty meal, we ensure that every bite is healthy, delicious, and unforgettable.
                        <br><br>
                        Our kitchen is a place where tradition meets modern taste. We take pride in sourcing organic ingredients to ensure that your meal is not only tasty but also packed with nutrition. From our signature spice blends to our hand-picked vegetables, every detail is designed to give you an exceptional dining experience.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection