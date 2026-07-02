@extends('layouts.admin_layout')

@section('main')
{{-- Container set with horizontal padding and top margin --}}
<div class="container-fluid px-4 mt-4">
    
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm" style="background-color: #d4edda; color: #155724;">
            <small class="fw-bold">{{ session('success') }}</small>
        </div>
    @endif

    {{-- Header Section with proper alignment --}}
    <div class="row mb-4">
        <div class="col-12">
            <div style="border-left: 5px solid #00a651; padding-left: 15px;">
                <h2 class="fw-bold mb-0" style="color: #2d3436; letter-spacing: -1px; font-size: 1.6rem;">
                    Categories <span style="color: #00a651;">List</span> 
                </h2>
            </div>
        </div>
    </div>

    {{-- Table responsive wrapper with shadow --}}
    <div class="table-responsive shadow-sm" style="border-radius: 5px;">
        <table class="table table-bordered table-hover mb-0">
            <thead style="background-color: #00a651; color: white;">
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th style="width: 120px;">Image</th>
                    <th>Category Name</th>
                    <th class="text-center" style="width: 180px;">Action</th>
                </tr>
            </thead>
            <tbody style="background-color: white;">
                @forelse($categories as $category)
                <tr>
                    <td class="align-middle font-weight-bold" style="font-size: 16px;">{{ $category->id }}</td>
                    <td class="align-middle">
                        @if($category->image)
                            <img src="{{ asset('images/categories/' . $category->image) }}" 
                                 alt="{{ $category->name }}" 
                                 style="width: 70px; height: 70px; object-fit: cover; border: 1px solid #ddd; border-radius: 4px;">
                        @else
                            <div style="width: 70px; height: 70px; background: #eee; display: flex; align-items: center; justify-content: center; font-size: 11px; color: #999; border-radius: 4px;">No Image</div>
                        @endif
                    </td>
                    <td class="align-middle" style="color: #444; font-size: 16px; font-weight: 500;">{{ $category->name }}</td>
                    <td class="text-center align-middle">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" 
                           class="btn btn-sm text-white" 
                           style="background-color: #ffc107; border-radius: 4px; padding: 4px 12px; font-weight: bold;">Edit</a>
                        
                        <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm text-white" 
                                    style="background-color: #dc3545; border-radius: 4px; padding: 4px 12px; font-weight: bold; border: none;"
                                    onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5 text-muted" style="font-size: 16px;">No categories found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .table thead th {
        border-bottom: none;
        font-weight: 600;
        vertical-align: middle;
        font-size: 15px;
    }
    .table td {
        vertical-align: middle;
        border-color: #dee2e6;
    }
</style>
@endsection