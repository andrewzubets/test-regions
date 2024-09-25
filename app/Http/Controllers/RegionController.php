<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Region::simplePaginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Region
    {
        $values = $request->validate([
            'name' => 'required'
        ]);
        $region = new Region();
        $region->name = $values['name'];
        $region->save();

        return $region;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region): void
    {
        $region->delete();
    }
}
