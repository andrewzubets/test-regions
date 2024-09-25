<?php

namespace App\Http\Controllers;

use App\Custom\RegionManager;
use App\Models\Region;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{

    public function index(): View {
        return \view('home.index',['regions' => Region::simplePaginate(40)]);
    }

    public function about(RegionManager $regionManager): View|RedirectResponse {
        if($regionManager->hasRegion()) {
            return \view('home.about', ['record' => $regionManager->getRegion()->abouts?->first()]);
        }
        return redirect(route('index'));
    }

    public function news(RegionManager $regionManager): View|RedirectResponse {
        if($regionManager->hasRegion()) {
            return \view('home.news', ['record' => $regionManager->getRegion()->news?->first()]);
        }
        return redirect(route('index'));
    }
}
