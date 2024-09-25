<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Region;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run news seeds.
     */
    public function run(): void
    {
        News::truncate();
        $regions = Region::all();

        /** @var Region $region */
        foreach ($regions as $region){
            $news = News::factory(1)->make()->first();
            if($news instanceof News) {
                $news->region_id = $region->id;
                $news->save();
            }
        }
    }
}
