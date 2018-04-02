<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        //sqlite foreign key
        if (\DB::getDriverName() == 'sqlite') {
            \Debugbar::info(__LINE__);
            \Schema::enableForeignKeyConstraints();
        }
        config(['admin_id' => 1]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
