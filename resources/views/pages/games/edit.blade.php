@extends('layouts.app')

@section('content')
    <form action="{{ route('games.update', $game) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="card-header">
                Edit game
            </div>
            <div class="card-body">
                <div class="row align-items-stretch">
                    <div class="col-5 border-end border-secondary">
                        <div class="flex-grow-1">
                            <img src="{{ $game->getThumbnail() }}" alt="An image of {{ $game->title }}"
                                class="mb-2 w-100 rounded-2">
                            <input type="file" name="thumbnail" class="form-control" accept="image/*">
                            @error('thumbnail')
                                <small class="invalid-feedback d-block">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="mb-2">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $game->title }}" required>
                            @error('title')
                                <small class="invalid-feedback d-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="5" required>{{ $game->description }}</textarea>
                            @error('description')
                                <small class="invalid-feedback d-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="credit_cost" class="form-label">Credit cost</label>
                            <input type="number" name="credit_cost" class="form-control" value="{{ $game->credit_cost }}"
                                required>
                            @error('credit_cost')
                                <small class="invalid-feedback d-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="active" class="form-label w-100">Active</label>
                            <input type="checkbox" name="active" class="form-check-input" value="{{ $game->credit_cost }}"
                                @checked($game->active)>
                            @error('active')
                                <small class="invalid-feedback d-block">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
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
