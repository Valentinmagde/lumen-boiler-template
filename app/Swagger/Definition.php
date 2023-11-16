<?php

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
 * )
 */