<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InformationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'app_name' => 'Star Workshop',
            'facebook' => 'Star Workshop',
            'instagram' => 'Star Workshop',
            'twitter' => 'Star Workshop',
            'linkedin' => 'Star Workshop',
        ];
    }
}
