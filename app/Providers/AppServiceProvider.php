<?php

namespace App\Providers;

use App\Contracts\GetsFiles;
use App\Contracts\StoresFiles;
use App\Services\FileServiceLocal;
use App\Services\FileServiceS3;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.env') === 'production') {
            $this->app->bind(StoresFiles::class, FileServiceS3::class);
            $this->app->bind(GetsFiles::class, FileServiceS3::class);
        } else {
            $this->app->bind(StoresFiles::class, FileServiceLocal::class);
            $this->app->bind(GetsFiles::class, FileServiceLocal::class);
        }
    }
}
