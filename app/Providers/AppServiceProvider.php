<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use DateTime;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Add 'datetime_interval' as a customized validation rule
        Validator::extend('datetime_interval', function($attribute, $value, $parameters, $validator) {
            if (!empty($value)) {
                $datetimes_arr = explode(" / ", $value);
                foreach($datetimes_arr as $datetime) {
                    $d = DateTime::createFromFormat('d-m-Y H:i', $datetime);
                    if (!($d && $d->format('d-m-Y H:i') === $datetime)) {
                        return false;
                    }
                }
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
