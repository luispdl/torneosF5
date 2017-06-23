<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Zona;

class ZonaProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("*",function($view){

            $zonas = Zona::all();

            $view->with("zonas",$zonas);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
