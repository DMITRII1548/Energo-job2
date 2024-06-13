<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profession;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Skill;
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
        \App\Models\User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        
        \App\Models\User::factory(1)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $role = Role::create([
            'title' => "admin"
        ]);

        // $user->roles()->sync([$role->id]);

        // $skills = Skill::factory(23)->create();
        // $professoins = Profession::factory(10)->create();
        // $users = User::factory(200)->create();

        // $users->each(function (User $user) {
        //     $skillsIds = [];
        //     $professoinsIds = [];

        //     for ($i=0; $i < 3; $i++) {
        //         $skillsIds[] = random_int(1, 23);
        //         $proffestionsIds[] = random_int(1, 10);
        //     }

        //     $user->profile->skills()->sync($skillsIds);
        //     $user->profile->professions()->sync($proffestionsIds);
        // });
    }
}
