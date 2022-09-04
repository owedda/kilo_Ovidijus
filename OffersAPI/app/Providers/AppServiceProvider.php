<?php

namespace App\Providers;

use Ovidijus\OffersPackage\ReaderInterface;
use App\Readers\FileJsonReader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ReaderInterface::class, FileJsonReader::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
