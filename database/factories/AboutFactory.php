<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'About',
            'heading' => 'We at StarLabs, know what it means to start from the bottom. We started from 0, and became 200!',
            'paragraf' =>'StarLabs was established in 2015 in Prishtina, the Capital City of Kosovo in southeastern Europe. Our Company was established by two technology and business management experts who have over 10 years of experience in ICT outsourcing services. Located in 1700 square meters in the center of Prishtina, we operate with 200 engineering teams. Our biggest advantage is that we have access to the biggest pool of talents through our access in Digital School – The sister company, which is the biggest programming school for youth in the country as well as a franchise in over 50 locations worldwide.',
            'image' => '1660483383.png',
            'button' =>'https://www.starlabs.dev/',
         
        ];
    }
}
