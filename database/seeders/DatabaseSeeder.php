<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

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

        Post::all()->each(function($post) {
            $amount = random_int(1, 3);

            if ($amount) {
                $tags = Tag::inRandomOrder()->take($amount)->get();
                $statusData = [];
                $tags->each(function($tag) use (&$statusData) {
                    $statusData[$tag->id] = ['status' => $this->faker->word()];
                });
                $post->tags()->attach($statusData);
            }
        });
    }
}
