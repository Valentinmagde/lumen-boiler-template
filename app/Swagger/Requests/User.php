<?php

/**
 * Register User
 *
 * @OA\Post(
 * path="/api/v2/users/register",
 * operationId="Register",
 * tags={"User"},
 * summary="User Register",
 * description="User Register here",
 *   @OA\Parameter(
 *          name="lang",
 *          in="query",
 *          required=false,
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
 *               required={"user_email", "user_password", "user_password_confirmation", "user_surname"},
 *               @OA\Property(property="user_surname", type="text", example="beachcomber"),
 *               @OA\Property(property="user_email", type="email", example="example@beachcomber.com"),
 *               @OA\Property(property="user_password", type="password", example="beachcomber"),
 *               @OA\Property(property="user_password_confirmation", type="password", example="beachcomber"),
 *            ),
 *        ),
 *        @OA\MediaType(
 *            mediaType="application/json",
 *            @OA\Schema(
 *               type="object",
 *               required={"user_email", "user_password", "user_password_confirmation", "user_surname"},
 *               @OA\Property(property="user_surname", type="text", example="beachcomber"),
 *               @OA\Property(property="user_email", type="email", example="example@beachcomber.com"),
 *               @OA\Property(property="user_password", type="password", example="beachcomber"),
 *               @OA\Property(property="user_password_confirmation", type="password", example="beachcomber")
 *            ),
 *        ),
 *    ),
 *   @OA\Response(
 *          response=201,
 *          description="User created successfully",
 *          @OA\JsonContent(
 *               @OA\Property(property="successMsg", type="string", example="string"),
 *               @OA\Property(property="data", type="object",
 *                   ref="#/components/schemas/User"
 *               )
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
 * Get User data
 *
 * @OA\Get(
 *      path="/api/v2/user/{userId}",
 *      operationId="getProfile",
 *      tags={"User"},
 *      summary="Get User data",
 *      description="Fetch user data using their ID",
 *   @OA\Parameter(
 *          name="lang",
 *          in="query",
 *          required=false,
 *          example="en",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *   @OA\Parameter(
 *         name="userId",
 *         in="path",
 *         required=false,
 *         example="1",
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *      @OA\Response(
 *          response=200,
 *          description="User successfully collects",
 *          @OA\JsonContent(
 *               @OA\Property(property="successMsg", type="string", example="string"),
 *               @OA\Property(property="data", type="object",
 *                   ref="#/components/schemas/User"
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
 *       )
 *    )
 */
