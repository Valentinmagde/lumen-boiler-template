<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Parsedown;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Returns a base page for the API.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-21
     * @since 2023-11-22 Add code to try catch block
     *
     * @return README.md file
     */
    public function home()
    {
        try {
            $readmePath = base_path('README.md');

            if (file_exists($readmePath)) {
                $readmeContent = File::get($readmePath);

                // Use Parsedown to render Markdown content
                $parsedown = new Parsedown();
                $renderedContent = $parsedown->text($readmeContent);

                return response($renderedContent, 200)->header('Content-Type', 'text/html');
            } else {
                return errorResponse(
                    Response::HTTP_NOT_FOUND,
                    ERROR_CODE['RESOURCE_NOT_FOUND'],
                    t("readme.notFound")
                );
            }
        } catch (\Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }
}
