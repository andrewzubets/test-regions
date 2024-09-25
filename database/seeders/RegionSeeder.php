<?php

namespace Database\Seeders;

use App\Models\Region;
use Exception;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Database\Seeder;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class RegionSeeder extends Seeder
{

    /**
     * Run region seeds.
     *
     * @throws ConnectionException
     * @throws Exception
     */
    public function run(): void
    {

        $response = Http::get('https://api.hh.ru/areas');
        if($response->status() !== 200){
            throw new ConnectionException("hh.ru areas are not available");
        }
        $data = $response->json();
        if(empty($data)){
            throw new JsonEncodingException("Invalid response received. Expected not empty json object.");
        }

        $countryName = env('APP_COUNTRY_NAME');
        if(empty($countryName)){
            throw new Exception("APP_COUNTRY_NAME not specified in env.");
        }
        $countryData = Arr::where($data, function ($item) use($countryName) {

            return $item['name'] === $countryName;
        });
        $countryData = Arr::first($countryData);
        if(empty($countryData)){
            throw new Exception("Country regions not found.");
        }
        $countryCities = $this->extractCities($countryData['areas']);
        Region::truncate();
        foreach ($countryCities as $cityData){
            $record = new Region();
            $record->id = $cityData['id'];
            $record->name = $cityData['name'];
            $record->save();
        }
    }

    /**
     * Extracts cities from country area nested arrays.
     *
     * @param array $countryAreas
     *  Nested country arrays.
     * @return array
     *  Flat array with city names and their ids.
     */
    private function extractCities(array $countryAreas): array {
        $cities = [];
        foreach ($countryAreas as $countryArea){
            if(!empty($countryArea['areas'])){
                $cities = array_merge($cities, $this->extractCities($countryArea['areas']));
            }else{
                $cityData = Arr::only($countryArea, ['id','name']);
                $cities[] = $cityData;
            }
        }
        return $cities;
    }
}
