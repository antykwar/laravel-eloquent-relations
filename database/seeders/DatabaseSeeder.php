<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
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
        Tag::factory(10)
            ->create();

        User::factory(5)
               ->hasAddress(1)
               ->hasPosts(3)
            ->create();

        User::factory(2)
            ->hasAddress(1)
            ->create();

        Post::factory(2)
            ->create();

        Post::all()->each(static function($post) {
            $amount = random_int(0, 5);

            if ($amount) {
                $tags = Tag::inRandomOrder()->take($amount)->get();
                $post->tags()->attach($tags);
            }
        });
    }
}
