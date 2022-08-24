<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = [
           [
            'name' => 'Front-End Developer',
           ],
           [
            'name' => 'Back-End Developer',
           ],
           [
            'name' => 'Mobile Developer',
           ],
           [
            'name' => 'Web Developer',
           ],
           [
            'name' => 'Full Stack Developer',
           ]
        ];
        foreach ($category as $key =>$value){
            Category::create($value);
        }
    }
}
