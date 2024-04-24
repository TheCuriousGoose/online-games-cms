@extends('layouts.app')

@section('content')
    <div class="row row-gap-2">
        <div class="col-4">
            <div class="card">
                <div class="card-header fs-3">
                    Games Available
                </div>
                <div class="card-body text-end">
                    <h2>{{ $gamesCount }}</h2>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header fs-3">
                    Credits used
                </div>
                <div class="card-body text-end">
                    <h2>{{ $amountOfCreditsUsed }}</h2>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header fs-3">
                    Games played
                </div>
                <div class="card-body text-end">
                    <h2>{{ $amountOfGamesPlayed }}</h2>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header fs-3">
                    Users
                </div>
                <div class="card-body text-end">
                    <h2>{{ $userCount }}</h2>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header fs-3">
                    Average credits used per user
                </div>
                <div class="card-body text-end">
                    <h2>{{ $averageCreditsUsed }}</h2>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header fs-3">
                    Average games played per user
                </div>
                <div class="card-body text-end">
                    <h2>{{ $averageGamesPlayed }}</h2>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header fs-3 d-flex align-items-center">
            Games
            <div class="ms-auto">
                <a href="{{ route('games.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
        <div class="card-body py-2 px-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Times played</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                        <tr>
                            <td>{{ $game->id }}</td>
                            <td>{{ $game->title }}</td>
                            <td>{{ $game->description }}</td>
                            <td>{{ $game->getTimesPlayed() }}</td>
                            <td>{{ $game->active ? 'Yes' : 'No' }}</td>
                            <td>
                                <a class="btn btn-secondary @if ($loop->first) disabled @endif"
                                    @if ($loop->first) disabled @endif
                                    href="{{ route('games.move-up', $game) }}">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="btn btn-secondary  @if ($loop->last) disabled @endif"
                                    @if ($loop->last) disabled @endif
                                    href="{{ route('games.move-down', $game) }}">
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                                <a class="btn btn-primary" href="{{ route('games.edit', $game) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
