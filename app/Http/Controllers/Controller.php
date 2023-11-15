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
 *     name="Token",
 *     description="API Endpoints of Tokens"
 * )
 * @OA\Tag(
 *     name="User",
 *     description="API Endpoints of Users"
 * )
 * @OA\Tag(
 *     name="Country",
 *     description="API Endpoints of Countries"
 * )
 * @OA\Tag(
 *     name="Hotel",
 *     description="API Endpoints of Hotels"
 * )
 */
class Controller extends BaseController
{
    //
}
