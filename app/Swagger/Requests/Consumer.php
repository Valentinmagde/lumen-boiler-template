<?php

/**
 * Register Consumer
 *
 * @author Valentin magde <valentinmagde@gmail.com>
 * @since 2023-11-15
 *
 * @OA\Post(
 * path="/api/v2/consumers/register",
 * operationId="Register",
 * tags={"Consumer"},
 * summary="Consumer Register",
 * description="Consumer Register here",
 *   @OA\Parameter(
 *          name="lang",
 *          in="query",
 *          required=true,
 *          example="en",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *            mediaType="multipart/form-data",
 *            @OA\Schema(
 *               type="object",
 *               required={"email", "password", "password_confirmation"},
 *               @OA\Property(property="name", type="text", example="beachcomber"),
 *               @OA\Property(property="email", type="email", example="example@beachcomber.com"),
 *               @OA\Property(property="password", type="password", example="beachcomber"),
 *               @OA\Property(property="password_confirmation", type="password", example="beachcomber"),
 *            ),
 *        ),
 *        @OA\MediaType(
 *            mediaType="application/json",
 *            @OA\Schema(
 *               type="object",
 *               required={"email", "password", "password_confirmation", "name"},
 *               @OA\Property(property="name", type="text", example="beachcomber"),
 *               @OA\Property(property="email", type="email", example="example@beachcomber.com"),
 *               @OA\Property(property="password", type="password", example="beachcomber"),
 *               @OA\Property(property="password_confirmation", type="password", example="beachcomber")
 *            ),
 *        ),
 *    ),
 *   @OA\Response(
 *          response=201,
 *          description="Consumer created successfully",
 *          @OA\JsonContent(
 *               @OA\Property(property="successMsg", type="string", example="string"),
 *               @OA\Property(property="data", type="object",
 *                   ref="#/components/schemas/Consumer"
 *               ),
 *           )
 *       ),
 *       @OA\Response(
 *           response=400,
 *           description="Bad request",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=401,
 *           description="Unauthorized",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=404,
 *           description="Resource Not Found",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=500,
 *           description="Internal Server Error",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *    )
 */

/**
 * Get Authenticated User
 *
 * @author Valentin magde <valentinmagde@gmail.com>
 * @since 2023-11-15
 *
 * @OA\Get(
 *      path="/api/v2/consumer/me",
 *      operationId="getProfile",
 *      tags={"Consumer"},
 *      summary="Get the logged in consumer",
 *      description="Returns current consumer",
 *      @OA\Parameter(
 *          name="lang",
 *          in="query",
 *          required=true,
 *          example="en",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Consumer successfully collects",
 *          @OA\JsonContent(
 *               @OA\Property(property="successMsg", type="string", example="string"),
 *               @OA\Property(property="data", type="object",
 *                   ref="#/components/schemas/User"
 *               ),
 *           )
 *       ),
 *       security={
 *         {"bearer": {}}
 *       },
 *       @OA\Response(
 *           response=400,
 *           description="Bad request",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=401,
 *           description="Unauthorized",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=404,
 *           description="Resource Not Found",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=500,
 *           description="Internal Server Error",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *    )
 */
