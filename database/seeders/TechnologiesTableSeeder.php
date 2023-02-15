<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologys = ["HTML", "CSS", "Bootstrap", "JavaScript", "SASS", "Vue", "PHP", "Laravel"];

        foreach ($technologys as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology;
            $newTechnology->save();
        }
    }
}
