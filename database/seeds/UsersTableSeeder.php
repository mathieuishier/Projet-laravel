<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Board;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create();

        // factory(User::class, 10)->create()->each(function($user) {
        //     $user->boards()->saveMany(factory(Board::class, 5)->create([
        //         'user_id' => $user->id
        //         ]));
        //     });

    }
}
