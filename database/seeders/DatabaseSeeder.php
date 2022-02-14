<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
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
        $tags= Tag::factory(10)->create();
        User::factory(10)->create()->each(function($user) use ($tags){
            Post::factory(rand(2,5))->create([
                'user_id'=>$user->id
            ])->each(function($post)use($tags){
                $post->tags()->attach($tags->random(rand(2,4)));
            });
        }
        );
    }
}
