<?php

namespace App\Custom;

use App\Models\Region;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class RegionManager
{
    public function __construct(
        protected ?Region $region = null
    ){
        $path = \request()->path();
        $pathParts = Str::of($path)->split('/\//');
        $this->region = Region::where('slug', $pathParts->first())->first();
    }
    public function getRegionSlug(): string {
        if(!$this->hasRegion()){
            return '';
        }
        return $this->region->slug;
    }
    public function getRegion(): ?Region {
        return $this->region;
    }

    public function hasRegion(): bool {
        return !is_null($this->region);
    }

    public function getRegionRedirectUrl(Region $region) {
        $path = \request()->path();
        return '/'.$region->slug.'/'.$path;
    }

}
