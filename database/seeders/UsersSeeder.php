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
       $users = [
            [
            'name' => 'author',
            'email' => 'author@author.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'admin',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'facebook' => 'https://www.facebook.com/starlabs.dev',
            'instagram' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'github' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'created_at' => "2022-01-14 15:44:13"
        
        ],
        [
            'name' => 'Albina Ahmeti',
            'email' => 'albina@star-workshop.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'user',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'facebook' => 'https://www.facebook.com/starlabs.dev',
            'instagram' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'github' => 'https://github.com/AlbinaAhmeti',
            'created_at' => "2022-01-14 15:44:13"
        ],
        [
            'name' => 'Almir Pinduk',
            'email' => 'almir@star-workshop.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'user',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'facebook' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'instagram' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'github' => 'https://github.com/AlmirPinduku',
            'created_at' => "2022-06-14 15:44:13"
        ],
        [
            'name' => 'Ardit Shaqiri',
            'email' => 'ardit@star-workshop.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'user',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'facebook' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'instagram' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'github' => 'https://github.com/arditshaqiri',
            'created_at' => "2022-08-14 15:44:13"
        ],
        [
            'name' => 'Blenard Hasani',
            'email' => 'blenard@star-workshop.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'user',
            'description' => 'I am Blenard Hasani. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'facebook' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'instagram' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'github' => 'https://github.com/BlenardHasani',
            'created_at' => "2022-08-14 15:44:13"
        ],
        [
            'name' => 'Gramos Shala',
            'email' => 'gramos@star-workshop.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'user',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'facebook' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'instagram' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
            'github' => 'https://github.com/gramosshala',
            'created_at' => "2022-10-14 15:44:13"
        ],
        [
            'name' => 'Granit Salihu',
            'email' => 'granit@star-workshop.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Mce3xViPlXMwIxAooHi.k.8RTC1m0xz/CGgpAQVFrj8h6bV9Ilwgq', // password
            'remember_token' => Str::random(10),
            'user_status' => 'user',
            'description' => 'I am Granit Salihu, a MA degree student of Computer Sciences, at Public University in Gjilan. I am a methodical but technical person, I like to problem solve and figure things out and that is why I enjoy writing and developing new software as it requires a great deal of thought and logical like solving a puzzle. I am also a very organized and dedicated person to my work. My time management is good and I am a honest person.',
            'facebook' => 'https://www.facebook.com/uqk.smir',
            'instagram' => 'https://www.instagram.com/granits.ss/',
            'github' => 'https://github.com/granitsalihu1',
            'created_at' => "2022-10-14 15:44:13"
        ],
    ];
    
    foreach($users as $user){
        User::create($user);
    }
        
       

    }
}
