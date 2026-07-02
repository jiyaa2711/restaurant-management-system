@extends('layouts.admin_layout')

@section('main')
<div class="container-fluid px-4 mt-4">
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3 py-2 shadow-sm" role="alert">
            <small class="fw-bold">{{ session('success') }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row mb-4">
        <div class="col-12">
            <div style="border-left: 5px solid #00a651; padding-left: 15px;">
                <h2 class="fw-bold mb-0" style="color: #2d3436; letter-spacing: -1px; font-size: 1.8rem;">
                    Customers <span style="color: #00a651;">Orders</span> 
                </h2>
            </div>
        </div>
    </div>

    <div class="table-responsive shadow-sm" style="border-radius: 5px;">
        <table class="table table-bordered table-hover mb-0">
            <thead style="background-color: #00a651; color: white;">
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>Customer Details</th>
                    <th>Ordered Items</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody style="background-color: white;">
                @forelse($orders as $order)
                @php $status = strtolower($order->status); @endphp
                <tr>
                    <td class="align-middle font-weight-bold" style="font-size: 16px;">{{ $order->id }}</td>
                    <td class="align-middle">
                        <div class="font-weight-bold text-dark" style="font-size: 16px;">{{ $order->name }}</div>
                        <small class="text-muted" style="font-size: 14px;"><i class="fa fa-phone"></i> {{ $order->phone }}</small><br>
                        <small class="text-muted" style="font-size: 14px;"><i class="fa fa-map-marker"></i> {{ $order->address }}</small>
                    </td>
                    <td class="align-middle">
                        <ul class="list-unstyled mb-0" style="font-size: 15px;">
                            @foreach($order->items as $item)
                                <li><i class="fa fa-check-circle text-success"></i> {{ $item->meal_name }} <strong>(x{{ $item->quantity }})</strong></li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="align-middle font-weight-bold text-success" style="font-size: 17px;">
                        ₹{{ number_format($order->total_amount, 2) }}
                    </td>
                    <td class="align-middle text-center">
                        @if($status == 'pending')
                            <span class="badge bg-warning text-dark py-2 px-3" style="font-size: 14px;">Pending</span>
                        @elseif($status == 'accepted' || $status == 'approved')
                            <span class="badge bg-success text-white py-2 px-3" style="font-size: 14px;">Accepted</span>
                        @elseif($status == 'rejected')
                            <span class="badge bg-danger text-white py-2 px-3" style="font-size: 14px;">Rejected</span>
                        @else
                            <span class="badge bg-info text-white py-2 px-3" style="font-size: 14px;">{{ ucfirst($status) }}</span>
                        @endif
                    </td>
                    <td class="text-center align-middle text-nowrap">
                        @if($status == 'pending')
                            <a href="{{ route('admin.order.status', [$order->id, 'Accepted']) }}" 
                               class="btn btn-sm btn-success py-2 px-3 font-weight-bold" 
                               style="font-size: 13px; border-radius: 4px;"
                               onclick="return confirm('Are you sure you want to accept this order?')">
                               Accept
                            </a>

                            <a href="{{ route('admin.order.status', [$order->id, 'Rejected']) }}" 
                               class="btn btn-sm btn-danger py-2 px-3 font-weight-bold ms-1" 
                               style="font-size: 13px; border-radius: 4px;"
                               onclick="return confirm('Are you sure you want to reject this order?')">
                               Reject
                            </a>
                        @else
                            <span class="text-muted font-italic" style="font-size: 14px;">
                                <i class="fa fa-check-double text-success"></i> Processed
                            </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted" style="font-size: 16px;">No orders found yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- External Libraries --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .table thead th { border-bottom: none; font-weight: 600; vertical-align: middle; font-size: 15px; }
    .table td { vertical-align: middle; border-color: #dee2e6; }
</style>

{{-- Real-time Notification Script --}}
<script>
    // Har 10 seconds mein check karega
    setInterval(function() {
        fetch("{{ route('admin.check.new.orders') }}")
            .then(response => response.json())
            .then(data => {
                if (data.new_order) {
                    // 1. Notification Sound
                    let audio = new Audio('https://assets.mixkit.co/active_storage/sfx/2869/2869-preview.mp3');
                    audio.play();

                    // 2. SweetAlert Pop-up
                    Swal.fire({
                        title: 'New Order Alert!',
                        text: 'Naya order aaya hai: Order #' + data.order_id + ' from ' + data.customer,
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#00a651',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Dekho Order',
                        cancelButtonText: 'Baad mein'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload(); // Page refresh karke list update kar dega
                        }
                    });
                }
            })
            .catch(error => console.error('Error fetching new orders:', error));
    }, 10000); 
</script>
@endsection