@extends('layouts.admin_layout')

@section('main')
{{-- Container set with horizontal padding and top margin --}}
<div class="container-fluid px-4 mt-4">
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3 py-2 shadow-sm" role="alert">
            <small class="fw-bold" style="font-size: 15px;">{{ session('success') }}</small>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Header Section with proper alignment --}}
    <div class="row mb-4">
        <div class="col-12">
            <div style="border-left: 5px solid #00a651; padding-left: 15px;">
                <h2 class="fw-bold mb-0" style="color: #2d3436; letter-spacing: -1px; font-size: 1.8rem;">
                    Table <span style="color: #00a651;">Reservations</span> 
                </h2>
            </div>
        </div>
    </div>

    {{-- Table responsive wrapper with shadow --}}
    <div class="table-responsive shadow-sm" style="border-radius: 5px; border: 1px solid #dee2e6;">
        <table class="table table-bordered table-hover mb-0">
            <thead style="background-color: #00a651; color: white;">
                <tr>
                    <th style="width: 60px; font-size: 16px;">ID</th>
                    <th style="font-size: 16px;">Customer Details</th>
                    <th style="font-size: 16px;">Booking Slot</th>
                    <th class="text-center" style="font-size: 16px;">Persons</th>
                    <th style="font-size: 16px;">Status</th>
                    <th class="text-center" style="width: 200px; font-size: 16px;">Action</th>
                </tr>
            </thead>
            <tbody style="background-color: white;">
                @forelse($bookings as $booking)
                <tr>
                    <td class="align-middle font-weight-bold" style="font-size: 16px;">{{ $booking->id }}</td>
                    <td class="align-middle">
                        <div class="font-weight-bold text-dark" style="font-size: 16px;">{{ $booking->name }}</div>
                        <small class="text-muted" style="font-size: 14px;"><i class="fa fa-phone"></i> {{ $booking->phone }}</small><br>
                        <small class="text-muted" style="font-size: 14px;"><i class="fa fa-envelope"></i> {{ $booking->email }}</small>
                    </td>
                    <td class="align-middle">
                        <div style="font-size: 15px;"><i class="fa fa-calendar text-success"></i> {{ date('d M, Y', strtotime($booking->booking_date)) }}</div>
                        <small class="text-muted" style="font-size: 14px;"><i class="fa fa-clock-o"></i> {{ date('h:i A', strtotime($booking->booking_time)) }}</small>
                    </td>
                    <td class="align-middle text-center">
                        <span class="badge badge-light border px-3 py-2" style="font-size: 14px;">{{ $booking->total_person }} Guests</span>
                    </td>
                    <td class="align-middle">
                        @if($booking->status == 'Pending')
                            <span class="badge badge-warning text-white py-2 px-3" style="font-size: 14px;">Pending</span>
                        @elseif($booking->status == 'Confirmed')
                            <span class="badge badge-success text-white py-2 px-3" style="font-size: 14px;">Confirmed</span>
                        @else
                            <span class="badge badge-danger text-white py-2 px-3" style="font-size: 14px;">Cancelled</span>
                        @endif
                    </td>
                    <td class="text-center align-middle text-nowrap">
                        @if($booking->status == 'Pending')
                            <form action="{{ route('admin.update_status', $booking->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" name="status" value="Confirmed" 
                                   class="btn btn-sm btn-success py-2 px-3 font-weight-bold" 
                                   style="font-size: 13px; border-radius: 4px;"
                                   onclick="return confirm('Are you sure you want to confirm this booking?')">
                                   Confirm
                                </button>

                                <button type="submit" name="status" value="Cancelled" 
                                   class="btn btn-sm btn-danger py-2 px-3 font-weight-bold" 
                                   style="font-size: 13px; border-radius: 4px;"
                                   onclick="return confirm('Are you sure you want to cancel this booking?')">
                                   Cancel
                                </button>
                            </form>
                        @else
                            <span class="text-muted font-italic" style="font-size: 14px;">No Action Required</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted" style="font-size: 16px;">No table bookings found yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .font-weight-bold { font-weight: 700 !important; }
    .table td { vertical-align: middle !important; border-color: #dee2e6; }
    .table thead th { vertical-align: middle !important; border: none; }
</style>
@endsection