@extends('layouts.admin_layout')

@section('main')
{{-- Container set with horizontal padding and top margin --}}
<div class="container-fluid px-4 mt-4">
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3 py-2 shadow-sm" role="alert">
            <small class="fw-bold" style="font-size: 15px;">{{ session('success') }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Header Section with proper alignment --}}
    <div class="row mb-4">
        <div class="col-12">
            <div style="border-left: 5px solid #00a651; padding-left: 15px;">
                <h2 class="fw-bold mb-0" style="color: #2d3436; letter-spacing: -1px; font-size: 1.8rem;">
                    User <span style="color: #00a651;">Feedbacks</span> 
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
                    <th style="font-size: 16px;">User Name</th>
                    <th style="font-size: 16px;">Message</th>
                    <th style="width: 180px; font-size: 16px;">Date</th>
                </tr>
            </thead>
            <tbody style="background-color: white;">
                @forelse($feedbacks as $item)
                <tr>
                    <td class="align-middle font-weight-bold" style="font-size: 16px;">{{ $item->feedback_id }}</td>
                    <td class="align-middle fw-bold text-dark" style="font-size: 16px;">{{ $item->user_name }}</td>
                    <td class="align-middle text-muted" style="font-size: 15px;">{{ $item->message }}</td>
                    <td class="align-middle" style="font-size: 15px;">
                        <i class="fa fa-calendar-o text-success me-1"></i>
                        {{ is_string($item->date) ? date('d-m-Y', strtotime($item->date)) : $item->date->format('d-m-Y') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5 text-muted" style="font-size: 16px;">No feedbacks available.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Table consistency preserved */
    .table thead th {
        border-bottom: none;
        font-weight: 600;
        vertical-align: middle;
    }
    .table td {
        vertical-align: middle;
        border-color: #dee2e6;
    }
</style>
@endsection