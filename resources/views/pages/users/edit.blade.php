@extends('layouts.app')

@section('content')
    <form action="{{ route('users.update', $user) }}" method="post">
        @method('PUT')
        @csrf
        <div class="card col-5">
            <div class="card-header fs-3 d-flex align-items-center">
                Edit user
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>
                @error('name')
                    <small class="invalid-feedback d-block">{{ $message }}</small>
                @enderror
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                @error('email')
                    <small class="invalid-feedback d-block">{{ $message }}</small>
                @enderror
                <div class="mb-2">
                    <label for="credits" class="form-label">Credits</label>
                    <input type="number" name="credits" class="form-control" value="{{ $user->credits }}" required>
                </div>
                @error('credits')
                    <small class="invalid-feedback d-block">{{ $message }}</small>
                @enderror
                <div class="mb-2">
                    <label for="active" class="form-label w-100">Active</label>
                    <input type="checkbox" name="active" class="form-check-input" @checked($user->active)>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#anonymousModal">
                    Make Anonymous
                </button>
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </form>
    <div class="modal" tabindex="-1" id="anonymousModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to make {{ $user->name }} anonymous?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('users.make-anonymous', $user) }}" method="post">
                        @method('post')
                        @csrf
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Yes, I am sure</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
