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
            'facebook' => 'https://www.facebook.com/starlabs.dev',
            'instagram' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'twitter' => 'https://twitter.com/infostarlabspr1?fbclid=IwAR0C78xaZbFxdiNnfgjiNOxGsxbC7rbfk5XlWI1B4VDUhDA2HQd4nJhuaYs',
            'linkedin' => 'https://www.linkedin.com/company/starlabspro/',
        ];
    }
}
