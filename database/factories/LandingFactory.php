<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LandingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'title' => 'Home',
          'heading' => 'Star Workshop Company',
         'paragraf' =>'We partner up with our clients by setting up, managing and operating their extended teams across Software Development, Quality Assurance, Customer Support, Technical Support and Business process outsourcing services. We make sure that our teams remain satisfied and therefore dedicated to our client’s needs. This makes us reliable, effective and productive. We offer a stress-free workplace, with recreative environments and competitive working conditions with the biggest tech Companies in Kosovo.',
          'image' => 'team1.png',
          'button' =>'https://www.starlabs.dev/whyus/',
        
        ];
    }
}