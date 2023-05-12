<?php

namespace App\Providers;


use App\Http\Livewire\Filters;
use App\Http\Livewire\Productlist;
use Livewire\Livewire;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Livewire::component('filters', Filters::class);
        Livewire::component('productlist', Productlist::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        $this->app->bind('filters', Filters::class);
        Livewire::component('filters', Filters::class);
        Livewire::component('productlist', Productlist::class);
    }
}
