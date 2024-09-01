<?php

namespace Admsys\FilamentBlog\Database\Factories;

use Admsys\FilamentBlog\Models\PostTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostTag::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'post_id' => $this->faker->randomNumber(),
            'tag_id' => $this->faker->randomNumber(),
        ];
    }
}
