<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
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


    public function boot()
    {
        Blade::directive('route',function ($expression){
        return "<?php echo route($expression);?>";
        });

        Blade::directive('debug',function ($expression){
            return "<?php echo dd($expression);?>";
                    });

        Blade::directive('asset',function ($expression){
            return "<?php echo asset($expression);?>";
                });

    }
}
