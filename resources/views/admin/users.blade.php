@extends('layouts.admin_layout')

@section('main')
{{-- Container-fluid with horizontal padding for better alignment --}}
<div class="container-fluid px-4 mt-4">
    
    {{-- Success Alert --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3 py-2" role="alert">
            <small>{{ session('success') }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Header Section: Adjusted margins --}}
    <div class="row mb-4">
        <div class="col-12">
            <div style="border-left: 5px solid #00a651; padding-left: 15px;">
                <h2 class="fw-bold mb-0" style="color: #2d3436; letter-spacing: -1px; font-size: 1.6rem;">
                    User <span style="color: #00a651;">List</span> 
                </h2>
            </div>
        </div>
    </div>
            
    {{-- Table Wrapper: Adding a bit of shadow/border for container look if needed --}}
    <div class="table-responsive shadow-sm" style="border-radius: 5px;">
        <table class="table table-bordered table-hover mb-0">
            {{-- Green Header matching your Category and Meals pages --}}
            <thead style="background-color: #00a651; color: white;">
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                    <th class="text-center" style="width: 150px;">Action</th>
                </tr>
            </thead>
            <tbody style="background-color: white;">
                @forelse($users as $user)
                <tr>
                    <td class="align-middle font-weight-bold">{{ $user->id }}</td>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle">{{ $user->created_at->format('d-m-Y') }}</td>
                    <td class="text-center align-middle">
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm text-white" 
                                    style="background-color: #dc3545; border-radius: 4px; padding: 2px 10px; border: none;"
                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">No users found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Aapka original CSS waisa hi hai */
    .table thead th {
        border-bottom: none;
        font-weight: 600;
        vertical-align: middle;
    }
    .table td {
        vertical-align: middle;
        font-size: 14px;
        border-color: #dee2e6;
    }
    .btn-sm {
        font-size: 13px;
        font-weight: 500;
    }
</style>
@endsection