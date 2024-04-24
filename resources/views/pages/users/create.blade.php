@extends('layouts.app')

@section('content')
    <form action="{{ route('users.store') }}" method="post">
        @method('POST')
        @csrf
        <div class="card col-5">
            <div class="card-header fs-3 d-flex align-items-center">
                Create user
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                @error('name')
                    <small class="invalid-feedback d-block">{{ $message }}</small>
                @enderror
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                @error('email')
                    <small class="invalid-feedback d-block">{{ $message }}</small>
                @enderror
                <div class="mb-2">
                    <label for="credits" class="form-label">Credits</label>
                    <input type="number" name="credits" class="form-control" required>
                </div>
                @error('credits')
                    <small class="invalid-feedback d-block">{{ $message }}</small>
                @enderror
                <div class="mb-2">
                    <label for="active" class="form-label w-100">Active</label>
                    <input type="checkbox" name="active" class="form-check-input">
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </form>
@endsection
