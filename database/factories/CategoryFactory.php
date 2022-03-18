<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        //no olvidarse del storage para decirle que guarde en una carpeta en especifica
        return [
            'image' => 'products/' . $this->faker->image('public/storage/products', 640, 480, null, false)
        ];
    }
}
