<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        Validator::extend('passwordlama', function ($attribute, $value, $parameters, $validator) {
            if(\Hash::check($value, auth()->user()->password)){
                return true;    
            }
            return false;
        });

        Validator::extend('guruKosong', function ($attribute, $value, $parameters, $validator) {
            if($parameters[0]!=""){
                return true;    
            }
            return false;
        });
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
