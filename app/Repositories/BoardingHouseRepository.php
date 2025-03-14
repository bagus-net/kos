<?php

namespace App\Repositories;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use App\Models\Category;
use App\Models\City;

use Illuminate\Database\Eloquent\Builder;
use GuzzleHttp\Psr7\Request;

class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{

    // public function findBoardingHouses(Request $request)

    // {

    //     $citySlug = $request->input('city');

    //     $categorySlug = $request->input('category');

    //     $search = $request->input('search');

    

    //     $category = $categorySlug ? Category::where('slug', $categorySlug)->first() : null;

    //     $city = $citySlug ? City::where('slug', $citySlug)->first() : null;

    

    //     // Jika kategori atau kota yang dipilih tidak valid, abaikan filter tersebut

    //     $categorySlug = $category ? $categorySlug : null;

    //     $citySlug = $city ? $citySlug : null;

    

    //     // Ambil data kos berdasarkan filter

    //     return $this->getAllBoardingHouses($search, $categorySlug, $citySlug);

    // }       
public function getAllBoardingHouses ($search = null, $city = null, $category = null)
{
$query=BoardingHouse::query();


// disini ketika search di isi maka dia akan dijalankan
if ($search) {
    $query->where('name', 'like',$search, '%');
}

// jika city di isi dia akan mencari berdasarkan slug city
if ($city) {
    $query->whereHas('city', function (Builder $query) use ($city) {
        $query->where('slug', $city);
});
}

// dia akan mencari berdasarkan slug dari category
if ($category) {
    $query->whereHas ('category', function (Builder $query) use ($category) { 
        $query->where( 'slug', $category);
});
}
return $query->get();
}

public function getPopularBoardingHouses($limit = 5)
{
    return BoardingHouse::withCount('transactions')->orderBy('transactions_count', 'desc')
    ->take($limit)->get();
}

public function getBoardingHousesByCitySlug($slug)
{
    return BoardingHouse::whereHas('city',function (Builder $query) use ($slug) {
        $query->where('slug', $slug);
    }) ->get();
}

public function getBoardingHousesByCategorySlug($slug)
{
    return BoardingHouse::whereHas('category',function (Builder $query) use ($slug) {
        $query->where('slug', $slug);
    }) ->get();
}

public function getBoardingHousesBySlug($slug)
{
    return BoardingHouse::where('slug', $slug)->first();
}
}
