<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{

    public function definition(): array
    {
        $name = $this->faker->words(2,true);
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'description'=>$this->faker->sentence(15),
            'image'=>$this->faker->imageUrl,
        ];
    }
}
