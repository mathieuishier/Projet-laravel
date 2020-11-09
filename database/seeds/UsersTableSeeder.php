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
        // factory(User::class, 20)->create();

        // factory(User::class, 10)->create()->each(function($user) {
        //     $user->boards()->saveMany(factory(Board::class, 5)->create([
        //         'user_id' => $user->id
        //         ]));
        //     });
        App\User::create([
            'name' => 'cos',
            'password' => '$2y$10$wAvx3fYyH8awNU.uTK50uezk/dWAK5esxYr7djSI0Phy77u30LU/q',
            'email' => '8costa21@gmail.com',
            'role' => 'admin',
            ]);

            App\User::create([
                'name' => 'cedric',
                'password' =>'$2y$10$R2i4dAYvHapDD.J9AcC2M.XA9LbVldfS5JCENVy4.AA/e4U50k3n2',
                'email' =>'elliott_ced@hotmail.com',
                'role' => 'admin',
                ]);
    }
}




