<?php

namespace App\Providers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;
use App\Models\BoardingHouse;
use App\Models\Category;
use App\Repositories\BoardingHouseRepository;
use App\Repositories\CityRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class ReposityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
       $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
       $this->app->bind(BoardingHouseRepositoryInterface::class, BoardingHouseRepository::class);
       $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
