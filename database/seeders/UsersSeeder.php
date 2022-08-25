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
           
        ],[
            'name' => 'user2',
            'email' => 'user2@user2.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'user',
            'description' => 'William Tobey’s career encompasses extensive management experience in defense policy, arms control and counter-proliferation, as well as in investment banking and venture capital. He served on the National Security Council Staff in three US administrations and also managed the US government’s largest programme to prevent nuclear proliferation and terrorism by detecting, securing and disposing of dangerous nuclear material.',
        ],
        [
            'name' => 'Albina Ahmeti',
            'email' => 'albina@star-workshop.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'user',
            'description' => 'William Tobey’s career encompasses extensive management experience in defense policy, arms control and counter-proliferation, as well as in investment banking and venture capital. He served on the National Security Council Staff in three US administrations and also managed the US government’s largest programme to prevent nuclear proliferation and terrorism by detecting, securing and disposing of dangerous nuclear material.',
        ],
        [
            'name' => 'Almir Pinduk',
            'email' => 'almir@star-workshop.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'user',
            'description' => 'William Tobey’s career encompasses extensive management experience in defense policy, arms control and counter-proliferation, as well as in investment banking and venture capital. He served on the National Security Council Staff in three US administrations and also managed the US government’s largest programme to prevent nuclear proliferation and terrorism by detecting, securing and disposing of dangerous nuclear material.',
        ],
        [
            'name' => 'Ardit Shaqiri',
            'email' => 'ardit@star-workshop.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'user',
            'description' => 'William Tobey’s career encompasses extensive management experience in defense policy, arms control and counter-proliferation, as well as in investment banking and venture capital. He served on the National Security Council Staff in three US administrations and also managed the US government’s largest programme to prevent nuclear proliferation and terrorism by detecting, securing and disposing of dangerous nuclear material.',
        ],
        [
            'name' => 'Blendar Hasani',
            'email' => 'blendar@star-workshop.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'user',
            'description' => 'William Tobey’s career encompasses extensive management experience in defense policy, arms control and counter-proliferation, as well as in investment banking and venture capital. He served on the National Security Council Staff in three US administrations and also managed the US government’s largest programme to prevent nuclear proliferation and terrorism by detecting, securing and disposing of dangerous nuclear material.',
       ],
        [
            'name' => 'Gramos Shala',
            'email' => 'gramos@star-workshop.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'user',
            'description' => 'William Tobey’s career encompasses extensive management experience in defense policy, arms control and counter-proliferation, as well as in investment banking and venture capital. He served on the National Security Council Staff in three US administrations and also managed the US government’s largest programme to prevent nuclear proliferation and terrorism by detecting, securing and disposing of dangerous nuclear material.',
        ],
        [
            'name' => 'Granit Salihu',
            'email' => 'granit@star-workshop.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'user',
            'description' => 'I am Granit Salihu, a MA degree student of Computer Sciences, at Public University in Gjilan. I am a methodical but technical person, I like to problem solve and figure things out and that is why I enjoy writing and developing new software as it requires a great deal of thought and logical like solving a puzzle. I am also a very organized and dedicated person to my work. My time management is good and I am a honest person.',
        ]
    ]);
    
        
        
       

    }
}
