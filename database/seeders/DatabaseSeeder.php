<?php

namespace Database\Seeders;

use App\Models\Post;
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
         User::factory(3)
                ->hasAddress(1)
                ->hasPosts(3)
             ->create();

         User::factory(2)
                ->hasAddress(1)
             ->create();

         Post::factory(2)
             ->create();
    }
}
