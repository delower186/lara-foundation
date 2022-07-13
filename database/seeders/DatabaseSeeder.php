<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        $roles = ['admin','editor','writer'];

        foreach($roles as $role){
            Role::create(['name' => $role ]);
        }

        foreach(User::all() as $user){
            // foreach(Role::all() as $role){
            //     $user->roles()->attach($role->id);
            // }
            $user->roles()->attach(rand(2,3));
        }

        $user = User::factory()->create([
            'name' => 'Md. Delower Hossain',
            'email' => 'info@delower.me',
            'password' => Hash::make('delower1')
        ]);

        $user->roles()->attach(1);
    }
}
