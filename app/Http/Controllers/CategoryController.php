<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private CategoryRepositoryInterface $categoryRepository;
    public function __construct(
       
        BoardingHouseRepositoryInterface $boardingHouseRepository,
        CategoryRepositoryInterface $categoryRepository

    ) {
        
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->categoryRepository = $categoryRepository;
     }
    public function show($slug){
        $category=$this->categoryRepository->getCategoryBySlug($slug);
        $boardingHouses =$this->boardingHouseRepository->getBoardingHousesByCategorySlug($slug);
        return view ("pages.category.show", compact('category',"boardingHouses"));
    }

}

