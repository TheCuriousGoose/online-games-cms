<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CreditLog;
use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrcreate([
            'name' => 'Admin',
            'email' => 'Admin',
            'password' => Hash::make('aDmin123!HasH'),
            'guard_name' => 'admin'
        ]);

        $game = Game::create([
            'title' => 'Pong',
            'description' => 'The programmers favourite response to ping! Give this classic a shot',
            'credit_cost' => 1,
            'sorting' => 1
        ]);

        $game->addMediaFromUrl(asset('imgs/pong.webp'))->toMediaCollection('thumbnail');

        $game = Game::create([
            'title' => 'Tetris',
            'description' => 'A good old classic that you will rage at!',
            'credit_cost' => 1,
            'sorting' => 5
        ]);

        $game->addMediaFromUrl(asset('imgs/tetris.webp'))->toMediaCollection('thumbnail');

        $game = Game::create([
            'title' => 'Whack-a-mole',
            'description' => 'Do you have aggression problems? Well this is the perfect chance to take it out on some moles!',
            'credit_cost' => 3,
            'sorting' => 2
        ]);

        $game->addMediaFromUrl(asset('imgs/whack-a-mole.webp'))->toMediaCollection('thumbnail');

        $game = Game::create([
            'title' => 'Snake',
            'description' => 'Those apples must be so tasty! But can you catch them all?',
            'credit_cost' => 2,
            'sorting' => 3
        ]);

        $game->addMediaFromUrl(asset('imgs/snake.webp'))->toMediaCollection('thumbnail');

        $game = Game::create([
            'title' => 'Jumper',
            'description' => 'Are you going to be the next olympic champion? Probably not so you can at least try it here!',
            'credit_cost' => 1,
            'sorting' => 8
        ]);

        $game->addMediaFromUrl(asset('imgs/jumper.webp'))->toMediaCollection('thumbnail');

        $game = Game::create([
            'title' => 'Race',
            'description' => 'Are you Lighting Mcqueen or maybe even the next Max Verstappen? Show you racing skills here!',
            'credit_cost' => 3,
            'sorting' => 7
        ]);

        $game->addMediaFromUrl(asset('imgs/race.webp'))->toMediaCollection('thumbnail');

        $game = Game::create([
            'title' => 'Penguin Danger',
            'description' => 'Gotta go fast! Wait wrong $game = Game well anyways just try to not get caught!',
            'credit_cost' => 1,
            'sorting' => 4
        ]);

        $game->addMediaFromUrl(asset('imgs/tower-of-hantoi.webp'))->toMediaCollection('thumbnail');

        $game = Game::create([
            'title' => 'Tower of Hantoi',
            'description' => 'You\'ll need your brain for this. But I believe in your 2 brain cells',
            'credit_cost' => 2,
            'sorting' => 6
        ]);

        for ($i = 0; $i < 30; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->email(),
                'password' => fake()->password(),
                'credits' => fake()->numberBetween(0, 40),
                'guard_name' => 'web',
            ]);
        }

        for ($i = 0; $i < 3000; $i++) {
            CreditLog::create([
                'user_id' => fake()->numberBetween(2, 30),
                'game_id' => fake()->numberBetween(1, 8),
                'credits_deducted' => fake()->numberBetween(1, 3)
            ]);
        }
    }
}
