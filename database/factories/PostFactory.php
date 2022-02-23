<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       // 'imagePath'=>'images/'.$this->faker->image('storage/app/public/images',640,480,null,false),
        $title=$this->faker->sentence(rand(2,6));
        return [
            'title'=>$title,
            'slug'=>Str::slug($title),
            'content'=>$this->faker->sentence(rand(4,10)),
            'imagePath'=>'images/'.$this->faker->image('storage/app/public/images',640,480,null,false),
        ];
    }
}
