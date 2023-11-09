<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Beachcomber Api Documentation",
 *      description="How to use Beachcomber Api",
 *      @OA\SecurityScheme(
 *          securityScheme="bearerAuth",
 *          in="header",
 *          name="bearerAuth",
 *          type="http",
 *          scheme="bearer",
 *          bearerFormat="JWT",
 *      ),
 *      @OA\Contact(
 *          name="Beachcomber",
 *          email="mauricia@beachcomber.com",
 *      ),
 *      @OA\License(
 *          name="Terms and Condition",
 *          url="https://www.beachcomber-hotels.com/fr/terms-conditions",
 *      )
 * )
 *
 * @OA\Server(
 *      url=SWAGGER_LUME_CONST_HOST,
 *      description="Local API Server"
 * ),
 *
 * @OA\Tag(
 *     name="Authentification",
 *     description="API Endpoints of Authentification"
 * )
 * @OA\Tag(
 *     name="Users",
 *     description="API Endpoints of User"
 * )
 * @OA\Tag(
 *     name="Hotels",
 *     description="API Endpoints of Hotels"
 * )
 * @OA\Tag(
 *     name="Rooms",
 *     description="API Endpoints of Rooms"
 * )
 * @OA\Tag(
 *     name="Tariffs",
 *     description="API Endpoints of Tariffs"
 * )
 */
class Controller extends BaseController
{
    //
}
