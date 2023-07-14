<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Day;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Employé']);

        Day::create(['name' => 'Lundi']);
        Day::create(['name' => 'Mardi']);
        Day::create(['name' => 'Mercredi']);
        Day::create(['name' => 'Jeudi']);
        Day::create(['name' => 'Vendredi']);
        Day::create(['name' => 'Samedi']);
        Day::create(['name' => 'Dimanche']);


        User::create([
            'name' => 'Vincent Parrot',
            'email' => 'vincent@garagevparrot.com',
            'password' => bcrypt('vincent@garagevparrot.com'),
            'gender' => 'Masculin',
            'image' => 'vincent_image.jpg',
            'role_id' => 1
        ]);
    }
}
