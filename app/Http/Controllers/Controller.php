<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Parsedown;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Returns a base page for the API.
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
            $readmeContent = File::get($readmePath);

            // Use Parsedown to render Markdown content
            $parsedown = new Parsedown();
            $renderedContent = $parsedown->text($readmeContent);

            return response($renderedContent, 200)->header('Content-Type', 'text/html');
        } else {
            return app()->version();
        }
    }
}
