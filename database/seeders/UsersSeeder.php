<?php

namespace Database\Seeders;

use App\Models\Feedback;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\City;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'author',
            'email' => 'author@author.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'admin',
            'description' => 'William Tobey’s career encompasses extensive management experience in defense policy, arms control and counter-proliferation, as well as in investment banking and venture capital. He served on the National Security Council Staff in three US administrations and also managed the US government’s largest programme to prevent nuclear proliferation and terrorism by detecting, securing and disposing of dangerous nuclear material.',
            'profile_photo_path' => 'profile-photos/eX7qm6HxXwRdmpw5DUQgVMyIzjqXIuP9XnGFDCDo.png',
        
        ],[
            'name' => 'user2',
            'email' => 'user2@user2.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'user',
            'description' => 'William Tobey’s career encompasses extensive management experience in defense policy, arms control and counter-proliferation, as well as in investment banking and venture capital. He served on the National Security Council Staff in three US administrations and also managed the US government’s largest programme to prevent nuclear proliferation and terrorism by detecting, securing and disposing of dangerous nuclear material.',
            'profile_photo_path' => 'profile-photos/eX7qm6HxXwRdmpw5DUQgVMyIzjqXIuP9XnGFDCDo.png',
        ]
    ]);
    
        
        
       

    }
}
