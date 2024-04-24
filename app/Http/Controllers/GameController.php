<?php

namespace App\Http\Controllers;

use App\Models\CreditLog;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::orderBy('sorting', 'ASC')->get();
        $gamesCount = Game::whereActive(true)->count();

        $amountOfGamesPlayed = CreditLog::count();
        $amountOfCreditsUsed = Creditlog::sum('credits_deducted');

        $userCount = User::whereGuardName('web')->count();

        $averageGamesPlayed = round(($amountOfGamesPlayed / $userCount), 2);
        $averageCreditsUsed = round(($amountOfCreditsUsed / $userCount), 2);

        return view('pages.games.index', [
            'games' => $games,
            'gamesCount' => $gamesCount,
            'amountOfGamesPlayed' => $amountOfGamesPlayed,
            'amountOfCreditsUsed' => $amountOfCreditsUsed,
            'userCount' => $userCount,
            'averageGamesPlayed' => $averageGamesPlayed,
            'averageCreditsUsed' => $averageCreditsUsed,
        ]);
    }

    public function edit(Game $game)
    {
        return view('pages.games.edit', [
            'game' => $game
        ]);
    }

    public function create(){
        return view('pages.games.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'credit_cost' => ['required'],
            'active' => ['nullable'],
            'thumbnail' => ['file:image', 'nullable']
        ]);

        $validated['active'] = isset($validated['active']);

        $validated['sorting'] = Game::max('sorting') + 1;

        $game = Game::create($validated);

        if($request->hasFile('thumbnail')){
            $game->saveThumbnail($request->file('thumbnail'));
        }

        return redirect()->route('games.index')->with('success', 'Game successfully updated');
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'credit_cost' => ['required'],
            'active' => ['nullable'],
            'thumbnail' => ['file:image', 'nullable']
        ]);

        if($request->hasFile('thumbnail')){
            $game->saveThumbnail($request->file('thumbnail'));
        }

        $validated['active'] = isset($validated['active']);

        $game->update($validated);

        return redirect()->route('games.index')->with('success', 'Game successfully updated');
    }

    public function moveUp(Game $game)
    {
        $gamebelow = Game::whereSorting($game->sorting - 1)->first();
        $gamebelow->update([
            'sorting' => $game->sorting
        ]);

        $game->update([
            'sorting' => $game->sorting - 1
        ]);

        return back();
    }

    public function moveDown(Game $game)
    {
        $gameAbove = Game::whereSorting($game->sorting + 1)->first();
        $gameAbove->update([
            'sorting' => $game->sorting
        ]);

        $game->update([
            'sorting' => $game->sorting + 1
        ]);

        return back();
    }
}
