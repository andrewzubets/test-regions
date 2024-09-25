<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Region;
use Illuminate\Database\Seeder;

class AboutsSeeder extends Seeder
{
    /**
     * Run about seeds.
     */
    public function run(): void
    {
        About::truncate();
        $regions = Region::all();

        /** @var Region $region */
        foreach ($regions as $region){
            $about = About::factory(1)->make()->first();
            if($about instanceof About) {
                $about->region_id = $region->id;
                $about->save();
            }
        }
    }
}
