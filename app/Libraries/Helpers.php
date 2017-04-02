<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Request;

class Helpers
{
    public static function setActiveForRoute(String $route) {
        $path_length = sizeof(explode("/", $route));

        if ($path_length > 1) {
            if (Request::is($route) || Request::is($route . "/*")) {
                return "active";
            }
        } else {
            if (Request::is($route)) {
                return "active";
            }
        }

        return "";
    }
}
