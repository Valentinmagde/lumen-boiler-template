<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     *
     * Returns a base page for the api
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @return README.md file or version of the application
     */
    public function home()
    {
        $readmePath = base_path('README.md');
        if (file_exists($readmePath)) {
            $readmeContent = file_get_contents($readmePath);
            return response($readmeContent, 200)->header('Content-Type', 'text/plain');
        } else {
            return $router->app->version();
        }
    }
}
