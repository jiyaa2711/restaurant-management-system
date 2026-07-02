@extends('layouts.user_layout')

@section('main')

<div class="container" style="margin-top: 100px;">
    <h2 style="font-weight: bold;">Give Your Feedback</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('feedback.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
    <label for="user_name" class="form-label" style="font-weight: 600;">Your Name</label>
    
    {{-- Auth::user()->name ka use karke login user ka naam value mein dikhayenge --}}
    <input type="text" 
           name="user_name" 
           id="user_name" 
           class="form-control" 
           value="{{ Auth::user()->name }}" 
           readonly {{-- User isse badal na sake isliye readonly (optional) --}}
           required>
</div>
        <div class="mb-3">
            <label>Message</label>
            <textarea name="message" class="form-control" rows="4" required></textarea>
        </div>

        <div class="d-flex" style="gap: 30px;">
            <button type="submit" class="btn btn-success px-4">Submit</button>
            <a href="/" class="btn btn-secondary px-4">Back</a>
        </div>
    </form>
</div>
@endsection