@extends('layouts.admin_layout')

@section('main')
{{-- Yeh raha sahi container setting --}}
<div class="container-fluid px-4 mt-4">
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3 py-2 shadow-sm" role="alert">
            <small class="fw-bold" style="font-size: 15px;">{{ session('success') }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Heading section with proper padding to match table --}}
    <div class="row mb-4">
        <div class="col-12">
            <div style="border-left: 5px solid #00a651; padding-left: 15px;">
                <h2 class="fw-bold mb-0" style="color: #2d3436; letter-spacing: -1px; font-size: 1.8rem;">
                    Meals <span style="color: #00a651;">List</span> 
                </h2>
            </div>
        </div>
    </div>
            
    {{-- Table wrapper with shadow for professional look --}}
    <div class="table-responsive shadow-sm" style="border-radius: 5px; border: 1px solid #dee2e6;">
        <table class="table table-bordered table-hover mb-0">
            <thead style="background-color: #00a651; color: white;">
                <tr>
                    <th style="width: 60px; font-size: 16px;">ID</th>
                    <th style="width: 100px; font-size: 16px;">Image</th>
                    <th style="font-size: 16px;">Meal Name</th>
                    <th style="font-size: 16px;">Category</th>
                    <th style="font-size: 16px;">Description</th> 
                    <th style="font-size: 16px;">Price</th>
                    <th class="text-center" style="width: 180px; font-size: 16px;">Action</th>
                </tr>
            </thead>
            <tbody style="background-color: white;">
                @forelse($meals as $meal)
                <tr>
                    <td class="align-middle fw-bold text-muted" style="font-size: 16px;">{{ $meal->id }}</td>
                    <td class="align-middle text-center">
                        @if($meal->image)
                            <img src="{{ asset('images/meals/' . $meal->image) }}" 
                                 alt="meal" 
                                 style="width: 70px; height: 70px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;">
                        @else
                            <div style="width: 70px; height: 70px; background: #eee; display: flex; align-items: center; justify-content: center; font-size: 11px; color: #999;">No Image</div>
                        @endif
                    </td>
                    <td class="align-middle fw-bold text-dark" style="font-size: 16px;">{{ $meal->name }}</td>
                    <td class="align-middle" style="font-size: 15px;">{{ $meal->category->name ?? 'N/A' }}</td>
                    <td class="align-middle text-muted" style="font-size: 14px;">{{ Str::limit($meal->description, 50) }}</td>
                    <td class="align-middle fw-bold text-success" style="font-size: 17px;">₹{{ number_format($meal->price, 2) }}</td>
                    
                    <td class="text-center align-middle">
                        <div class="d-flex justify-content-center" style="gap: 10px;"> 
                        <a href="{{ route('admin.meals.edit', $meal->id) }}" 
                            class="btn btn-sm text-white px-3 py-2" 
                            style="background-color: #ffc107; border-radius: 4px; font-size: 14px; font-weight: bold; border: none;">
                            Edit
                        </a>

                        <form action="{{ route('admin.meals.delete', $meal->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                            <button type="submit" 
                                class="btn btn-sm text-white px-3 py-2" 
                                style="background-color: #dc3545; border-radius: 4px; font-size: 14px; font-weight: bold; border: none;"
                                onclick="return confirm('Are you sure you want to delete this meal?')">
                                Delete
                            </button>
                        </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5 text-muted" style="font-size: 16px;">No records found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Styling preserved as per your requirement */
    .table thead th {
        border-bottom: none !important;
        font-weight: 600;
        vertical-align: middle;
    }
    .table td {
        vertical-align: middle;
        border-color: #f1f1f1;
    }
</style>
@endsection