<?php

namespace Database\Seeders;

use App\Models\Informations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class InformationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informations')->insert([
            [
                'app_name' => 'Star Workshop',
                'facebook' => 'https://www.facebook.com/starlabs.dev',
                'instagram' => 'https://www.instagram.com/starlabs.dev/?fbclid=IwAR3wldNXhzIQwX-1K8Q-gSPB5mDozBuNUrf9rUh9lyysXeDbKcCkanwFPRY',
                'twitter' => 'https://twitter.com/infostarlabspr1?fbclid=IwAR0C78xaZbFxdiNnfgjiNOxGsxbC7rbfk5XlWI1B4VDUhDA2HQd4nJhuaYs',
                'linkedin' => 'https://www.linkedin.com/company/starlabspro/',
            ],
        ]);
    }
}
