<?php

namespace App\Http\Middleware;

use App\Custom\RegionManager;
use App\Models\Region;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfRegionSet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $regionManager = app('region_manager');
        $savedRegion = Cookie::get('region');
        if($regionManager->hasRegion()){
            if(empty($savedRegion)
                || $savedRegion !== $regionManager->getRegionSlug()){
                Cookie::queue('region', $regionManager->getRegionSlug());
            }
        }
        elseif(!empty($savedRegion)){
            $region = Region::where('slug', $savedRegion)->first();
            if(empty($region)){
                Cookie::forget('region');
            }else{
                return redirect($regionManager->getRegionRedirectUrl($region), 301);
            }
        }

        return $next($request);
    }
}
