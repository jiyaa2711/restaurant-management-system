@extends('layouts.admin_layout')
@section('main')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-info  text-white">
                    <h4 class="mb-0">Add New Meal</h4>
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

                    <form action="{{ route('admin.meals.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label font-weight-bold">Meal Name</label>
                                <input type="text" name="name" class="form-control" placeholder="e.g. Cheese Burger" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label font-weight-bold">Category</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label font-weight-bold">Price (₹)</label>
                                <input type="number" name="price" step="0.01" class="form-control" placeholder="Enter price" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label font-weight-bold">Meal Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label font-weight-bold">Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Briefly describe the meal..."></textarea>
                        </div>

                        <div class="mt-4 d-flex" style="gap: 30px;">
                            <button type="submit" class="btn btn-success px-4">Save</button>
                            <!-- Fixed Back Button Link below -->
                            <a href="{{ route('admin.meals.index') }}" class="btn btn-secondary px-4">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection