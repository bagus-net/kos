<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    public function __construct(
       
        BoardingHouseRepositoryInterface $boardingHouseRepository
    ) {
        
        $this->boardingHouseRepository = $boardingHouseRepository;
    }
    public function show($slug){
        $boardingHouses =$this->boardingHouseRepository->get($slug);
    }

}

