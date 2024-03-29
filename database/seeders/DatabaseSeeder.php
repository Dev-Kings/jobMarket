<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(2)->create();
         $user = User::factory()->create([
             'name' => 'Kings Dave',
             'email' => 'kd@king.dev'
         ]);

         Job::factory(5)->create([
             'user_id' => $user->id
         ]);
    }
}
