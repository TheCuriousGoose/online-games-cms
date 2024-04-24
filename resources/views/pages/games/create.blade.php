@extends('layouts.app')

@section('content')
    <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="card">
            <div class="card-header">
                Edit game
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <label for="title" class="form-label">Image</label>
                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                </div>
                <div class="mb-2">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                    @error('title')
                        <small class="invalid-feedback d-block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="5" required></textarea>
                    @error('description')
                        <small class="invalid-feedback d-block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="credit_cost" class="form-label">Credit cost</label>
                    <input type="number" name="credit_cost" class="form-control" required>
                    @error('credit_cost')
                        <small class="invalid-feedback d-block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="active" class="form-label w-100">Active</label>
                    <input type="checkbox" name="active" class="form-check-input">
                    @error('active')
                        <small class="invalid-feedback d-block">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">
                    Save
                </button>
            </div>
        </div>
    </form>
@endsection
