<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name'      => 'Bootcamp-FrontEnd-Developer',
        ]);
        Type::create([
            'name'      => 'Bootcamp-BackEnd-Developer',
        ]);
        Type::create([
            'name'      => 'Bootcamp-FullStack-Developer',
        ]);

        Type::create([
            'name'      => 'Online Workshops-Teaching Students to Ask Their Own Questions: Best Practices in the Question Formulation Technique',
        ]);
        Type::create([
            'name'      => 'Online Workshops-Action-Planning for the New Normal: Making Sense of Our Time On Screens',
        ]);
        Type::create([
            'name'      => 'Online Workshops-Culturally Responsive Literature Instruction',
        ]);

        Type::create([
            'name'      => 'Live Training-HACKER Noon',
        ]);
        Type::create([
            'name'      => 'Live Training-hackr.io',
        ]);
        Type::create([
            'name'      => 'Live Training-Reactgo',
        ]);
        Type::create([
            'name'      => 'Live Training-Live Code Stream',
        ]);
        Type::create([
            'name'      => 'Live Training-Real Python',
        ]);
    }
}
