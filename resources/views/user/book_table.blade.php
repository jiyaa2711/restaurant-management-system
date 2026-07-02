@extends('layouts.user_layout')

@section('main')
<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h1 class="display-4 font-weight-bold text-dark">Book A <span class="text-success">Table</span></h1>
            <div class="mx-auto" style="width: 60px; height: 3px; background: #28a745;"></div>
        </div>
    </div>
</div>

<div class="container pb-5">
    <div class="card border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
        <div class="row no-gutters">
            <div class="col-lg-6 d-none d-lg-block">
                <img src="{{ asset('images/about-img.png') }}" class="img-fluid h-100 w-100" style="object-fit: cover;">
            </div>
            
            <div class="col-lg-6 bg-white p-4 p-md-5">
                <h3 class="mb-4 font-weight-bold">Table Reservation</h3>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                        <i class="fa fa-check-circle mr-2"></i> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                <form action="{{ route('user.book_table') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <input type="text" name="name" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 px-0" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <input type="email" name="email" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 px-0" placeholder="Your Email" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <input type="text" name="phone" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 px-0" placeholder="Phone Number" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <input type="number" name="total_person" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 px-0" placeholder="Number of Guests" min="1" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label class="small text-muted mb-0">Booking Date</label>
                            <input type="date" name="booking_date" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 px-0" min="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 form-group mb-4">
                            <label class="small text-muted mb-0">Select Time</label>
                            <select name="booking_time" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 px-0" required>
                                <option value="19:00:00">07:00 PM</option>
                                <option value="20:00:00">08:00 PM</option>
                                <option value="21:00:00">09:00 PM</option>
                                <option value="22:00:00">10:00 PM</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block rounded-pill py-3 mt-3 shadow-sm font-weight-bold" style="background-color: #28a745; border: none;">
                        BOOK A TABLE NOW
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Input field ko clean banane ke liye styling */
    .form-control {
        border-bottom: 1px solid #ced4da !important;
        background: transparent !important;
        box-shadow: none !important;
    }
    .form-control:focus {
        border-bottom: 2px solid #28a745 !important;
    }
    .no-gutters { margin-right: 0; margin-left: 0; }
    .no-gutters > [class*="col-"] { padding-right: 0; padding-left: 0; }
</style>
@endsection