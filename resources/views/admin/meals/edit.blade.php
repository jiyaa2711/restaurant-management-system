@extends('layouts.admin_layout')
@section('main')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-info text-dark">
                    <h4 class="mb-0">Edit Meal: {{ $meal->name }}</h4>
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

                    <form action="{{ route('admin.meals.update', $meal->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label font-weight-bold">Meal Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $meal->name) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label font-weight-bold">Category</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $meal->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label font-weight-bold">Price (₹)</label>
                                <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', $meal->price) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label font-weight-bold">Meal Image</label>
                                
                                <div class="mb-2">
                                    @if($meal->image)
                                        {{-- Maan ke chal rahe hain ki meals images 'public/images/meals/' folder mein hain --}}
                                        <img src="{{ asset('images/meals/' . $meal->image) }}" width="100" class="img-thumbnail shadow-sm" alt="current image">
                                        <div class="small text-muted mt-1">Current Image</div>
                                    @else
                                        <span class="badge bg-warning text-dark">No Image Uploaded</span>
                                    @endif
                                </div>

                                <input type="file" name="image" class="form-control">
                                <small class="text-muted text-italic">Leave blank if you don't want to change the image.</small>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label font-weight-bold">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $meal->description) }}</textarea>
                        </div>

                        <div class="mt-4 d-flex" style="gap: 30px;">
                            <button type="submit" class="btn btn-success px-4 font-weight-bold">Update</button>
                            <a href="{{ route('admin.meals.index') }}" class="btn btn-secondary px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection