<?php

namespace App\Observers;

use App\Models\Region;
use Illuminate\Support\Str;

class RegionObserver
{
    /**
     * Handle the Region "saving" event.
     */
    public function saving(Region $region): void
    {
       if(empty($region->slug)){
           $generatedSlug = Str::slug($region->name);
           $slug = $generatedSlug;
           $index = 0;
           while (Region::where('slug', $slug)->first() !== null){
               $slug = $generatedSlug . '-'.($index++);
           }
           $region->slug = $slug;
       }
    }
}
