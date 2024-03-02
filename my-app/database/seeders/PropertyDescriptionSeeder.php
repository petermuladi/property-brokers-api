<?php

namespace Database\Seeders;
//
use App\Models\PropertyDescription;
use Illuminate\Database\Seeder;

class PropertyDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PropertyDescription::factory(1)->create();
    }
}