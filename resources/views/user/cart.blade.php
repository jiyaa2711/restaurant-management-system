@extends('layouts.user_layout')

@section('main')
<div class="container mt-5 mb-5" style="min-height: 80vh;">
    <div class="text-center mb-5">
        <h2 style="font-weight: 800; color: #198754; text-transform: uppercase; letter-spacing: 1px;">
            <i class="fas fa-utensils mr-2"></i> Your Delicious Order
        </h2>
        <p class="text-muted">Review your delicious selection before checking out</p>
    </div>

    @php
        $total = 0;
    @endphp

    @if(isset($cartItems) && $cartItems->count() > 0)
        <div class="card shadow-sm border-0 mb-4" style="border-radius: 15px; overflow: hidden;">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr class="text-center">
                            <th class="py-3">Product</th>
                            <th class="py-3">Price</th>
                            <th class="py-3">Quantity</th>
                            <th class="py-3">Subtotal</th>
                            <th class="py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            @php 
                                $subtotal = $item->price * $item->quantity;
                                $total += $subtotal;
                            @endphp
                            <tr class="text-center">
                                <td class="align-middle text-left pl-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/meals/' . $item->meal->image) }}" 
                                             width="60" height="60" class="rounded mr-3 shadow-sm" style="object-fit: cover;">
                                        <span style="font-weight: 600;">{{ $item->meal->name }}</span>
                                    </div>
                                </td>
                                <td class="align-middle">₹{{ $item->price }}</td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        {{-- Quantity Badge --}}
                                        <span style="font-size: 16px; min-width: 40px;">
                                            {{ $item->quantity }}
                                        </span>
                                    </div>
                                </td>
                                <td class="align-middle font-weight-bold text-success">
                                    ₹{{ $subtotal }}
                                </td>
                                <td class="align-middle">
                                    {{-- Remove Button --}}
                                    <a href="{{ route('remove.from.cart', $item->id) }}" 
                                       class="btn btn-outline-danger btn-sm shadow-sm" 
                                       onclick="return confirm('Are you sure you want to remove this item?')"
                                       style="border-radius: 8px;">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row align-items-center mb-5" id="cartSummarySection">
            <div class="col-md-6">
                <a href="{{ url('/meals') }}" class="btn btn-outline-secondary px-4 shadow-sm" style="border-radius: 10px;">
                    <i class="fa fa-arrow-left mr-1"></i> Add More Items
                </a>
            </div>
            <div class="col-md-6 text-right">
                <div class="mb-3">
                    <h4 class="mb-0">Grand Total: <span style="font-weight: 800; color: #198754; font-size: 30px;">₹{{ $total }}</span></h4>
                </div>
                <button type="button" class="btn btn-success btn-lg px-5 shadow" id="checkoutBtn" onclick="toggleCheckoutForm()" style="border-radius: 12px; font-weight: bold;">
                    Proceed to Checkout <i class="fa fa-chevron-right ml-2"></i>
                </button>
            </div>
        </div>

        {{-- Checkout Form Section (Same as before) --}}
        <div id="checkoutFormSection" style="display: none; border-top: 2px dashed #ddd;" class="mt-5 pt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow border-0" style="border-radius: 20px;">
                        <div class="card-header bg-success text-white text-center py-3" style="border-radius: 20px 20px 0 0;">
                            <h4 class="mb-0 font-weight-bold">Delivery & Contact Information</h4>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('place.order') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">Receiver Name</label>
                                        <input type="text" name="name" class="form-control form-control-lg" value="{{ Auth::user()->name }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">Phone Number</label>
                                        <input type="text" name="phone" class="form-control form-control-lg" placeholder="e.g. 9876543210" required>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label class="font-weight-bold">Full Delivery Address</label>
                                        <textarea name="address" class="form-control form-control-lg" rows="3" placeholder="House No, Area, Landmark, Pincode" required></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <button type="button" class="btn btn-light px-4" onclick="toggleCheckoutForm()">Go Back</button>
                                    <button type="submit" class="btn btn-success btn-lg px-5 shadow-sm" style="border-radius: 12px; font-weight: bold; background-color: #198754;">
                                        Confirm & Place Order (COD)
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="text-center py-5 shadow-sm border rounded bg-white" style="border-radius: 20px;">
            <i class="fa fa-shopping-cart mb-4" style="font-size: 70px; color: #ddd;"></i>
            <h3 class="text-muted">Your cart is empty!</h3>
            <p>Looks like you haven't added any meals yet.</p>
            <a href="{{ url('/meals') }}" class="btn btn-success px-5 py-3 mt-3" style="border-radius: 30px; font-weight: bold; background-color: #198754;">
                Browse Menu
            </a>
        </div>
    @endif
</div>

<script>
    function toggleCheckoutForm() {
        var form = document.getElementById('checkoutFormSection');
        var btn = document.getElementById('checkoutBtn');
        var summary = document.getElementById('cartSummarySection');

        if (form.style.display === "none") {
            form.style.display = "block";
            btn.style.display = "none"; 
            window.scrollTo({
                top: form.offsetTop - 50,
                behavior: 'smooth'
            });
        } else {
            form.style.display = "none";
            btn.style.display = "inline-block";
        }
    }
</script>
@endsection