@extends('layouts.admin_layout')

@section('main')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> <div class="card shadow border-0">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Add New Category</h4>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Category Name</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Punjabi, Fast Food" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Category Image</label>
                            <input type="file" name="image" class="form-control">
                            <small class="text-muted text-italic">Upload a small icon or image for this category.</small>
                        </div>

                        <div class="mt-4 d-flex" style="gap: 20px;">
                            <button type="submit" class="btn btn-success px-4">Save</button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary px-4">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection