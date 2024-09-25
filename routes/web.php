<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Region;
use Illuminate\Support\Str;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

$prefix = app('region_manager')->getRegionSlug();

Route::prefix($prefix)->middleware('region.redirects')->group(function () {
    Route::get('/', HomeController::class.'@index')->name('index');
    Route::get('/about', HomeController::class.'@about')->name('about');
    Route::get('/news', HomeController::class.'@news')->name('news');
});


//$requestUri = \Illuminate\Support\Facades\Request::getRequestUri();
//$basePart = exp($requestUri);
//dd($basePart);
