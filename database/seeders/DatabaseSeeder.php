<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
use App\Models\Video;
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

        Video::factory(5)
            ->create();

        Video::all()->each(function($video) {
            $user = User::inRandomOrder()->first();
            $comment = Comment::factory()->make(['user_id' => $user->id]);
            $video->comments()->save($comment);
        });

        User::factory(2)
            ->hasAddress(1)
            ->create();

        Post::factory(2)
            ->create();

        Post::all()->each(function($post) {
            $amount = random_int(1, 3);

            $user = User::inRandomOrder()->first();
            $comment = Comment::factory()->make(['user_id' => $user->id]);
            $post->comments()->save($comment);

            $tags = Tag::inRandomOrder()->take($amount)->get();
            $statusData = [];
            $tags->each(function($tag) use (&$statusData) {
                $statusData[$tag->id] = ['status' => $this->faker->word()];
            });
            $post->tags()->attach($statusData);
        });

        Project::factory(5)
            ->create();

        User::all()->each(function($user) {
            $project1 = Project::inRandomOrder()->first();
            $project2 = Project::inRandomOrder()->first();
            $user->projects()->attach([$project1->id, $project2->id]);

            $amount = random_int(0, 5);
            if ($amount) {
                Task::factory($amount)->create(['user_id' => $user->id]);
            }
        });

        Project::all()->each(function($project) {
            $user1 = User::inRandomOrder()->first();
            $user2 = User::inRandomOrder()->first();
            $user3 = User::inRandomOrder()->first();
            $project->users()->attach([$user1->id, $user2->id, $user3->id]);
        });

        User::inRandomOrder()->first()->projects()->detach();
        Project::inRandomOrder()->first()->users()->detach();
    }
}
