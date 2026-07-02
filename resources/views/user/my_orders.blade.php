@extends('layouts.user_layout')

@section('main')
<div class="container mt-5 mb-5" style="min-height: 80vh;">
    <h2 class="mb-4" style="font-weight: 700; color: #198754;">My Orders</h2>

    @if($orders->isEmpty())
        <div class="card shadow border-0 p-5 text-center" style="border-radius: 15px;">
            <i class="fas fa-box-open mb-3 text-muted" style="font-size: 50px;"></i>
            <h4>No orders found.</h4>
            <p class="text-muted">Once you place an order, it will appear here permanently.</p>
            <a href="{{ route('user.meals') }}" class="btn btn-success mt-3 px-4">Order Now</a>
        </div>
    @else
        <div class="table-responsive shadow-sm" style="border-radius: 15px; overflow: hidden;">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-success text-white">
                    <tr>
                        <th class="p-3">Order No</th> 
                        <th class="p-3">Customer</th>
                        <th class="p-3">Amount</th>
                        <th class="p-3">Order Date</th>
                        <th class="p-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    @php $status = strtolower($order->status); @endphp
                    <tr>
                        <td class="p-3 fw-bold">{{ $loop->iteration }}</td>
                        <td class="p-3">
                            <div>{{ $order->name }}</div>
                            <small class="text-muted">{{ $order->phone }}</small>
                        </td> 
                        <td class="p-3 fw-bold">₹{{ number_format($order->total_amount, 2) }}</td>
                        <td class="p-3">
                            {{ $order->created_at->format('d M Y') }}<br>
                            <small class="text-muted">{{ $order->created_at->format('h:i A') }}</small>
                        </td>
                        <td class="p-3">
                            @if($status == 'pending')
                                <span class="badge bg-warning text-dark px-3 py-2">
                                    <i class="fas fa-spinner fa-spin me-1"></i> Pending
                                </span>
                            @elseif($status == 'approved' || $status == 'accepted')
                                <span class="badge bg-success px-3 py-2 text-white">
                                    <i class="fas fa-check me-1"></i> Approved
                                </span>
                            @elseif($status == 'delivered')
                                <span class="badge bg-primary px-3 py-2">
                                    <i class="fas fa-truck me-1"></i> Delivered
                                </span>
                            @elseif($status == 'rejected' || $status == 'cancelled')
                                <span class="badge bg-danger px-3 py-2">
                                    <i class="fas fa-times me-1"></i> Rejected
                                </span>
                            @else
                                <span class="badge bg-secondary px-3 py-2">{{ ucfirst($order->status) }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection