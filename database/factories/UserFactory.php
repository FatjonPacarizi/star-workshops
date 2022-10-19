<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Fatjon Paçarizi',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'superadmin',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'facebook' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'instagram' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'github' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'created_at' => '2022-07-18 15:04:56',
       
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}
