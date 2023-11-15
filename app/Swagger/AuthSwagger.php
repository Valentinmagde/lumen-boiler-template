<?php

    /**
     * Login
     * 
     * @OA\Post(
     * path="/api/v2/auth/login",
     * operationId="authLogin",
     * tags={"Authentification"},
     * summary="User Login",
     * description="Login User Here",
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
     *               required={"user_email", "user_password"},
     *               @OA\Property(property="user_email", type="email", example="example@beachcomber.com"),
     *               @OA\Property(property="user_password", type="password", example="beachcomber")
     *            ),
     *        ),
     *        @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               type="object",
     *               required={"user_email", "user_password"},
     *               @OA\Property(property="user_email", type="email", example="example@beachcomber.com"),
     *               @OA\Property(property="user_password", type="password", example="beachcomber")
     *            ),
     *        ),
     *    ),
     *    @OA\Response(
     *          response=200,
     *          description="Login Successfully",
     *          @OA\JsonContent(
     *               @OA\Property(property="access_token", type="string", example="string"),
     *               @OA\Property(property="token_type", type="string", example="string"),
     *               @OA\Property(property="expires_in", type="integer", example="360"),
     *               @OA\Property(property="user", type="object", example="{}"),
     *         ),
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
     * )
     */

     /**
     * Logout
     * 
     * @OA\Post(
     * path="/api/v2/auth/logout",
     * operationId="authLogout",
     * tags={"Authentification"},
     * summary="User Logout",
     * description="Logout User Here",
     *   @OA\Parameter(
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
     *          description="Logout Successfully",
     *          @OA\JsonContent(
     *               @OA\Property(property="successMsg", type="string", example="string"),
     *               @OA\Property(property="data", type="object", example="null"),
     *          )
     *       ),
     *       security={
     *         {"bearer": {}}
     *       },
     *      @OA\Response(
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
     * )
     */

     /**
     * Refresh Token
     * 
     * @OA\Post(
     * path="/api/v2/auth/refresh",
     * operationId="authRefresh",
     * tags={"Authentification"},
     * summary="Refresh token",
     * description="Refresh Token Here",
     *   @OA\Parameter(
     *          name="lang",
     *          in="query",
     *          required=true,
     *          example="en",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *       security={
     *         {"bearer": {}}
     *       },
     *      @OA\Response(
     *          response=200,
     *          description="Refresh Successfully",
     *          @OA\JsonContent(
     *               @OA\Property(property="access_token", type="string", example="string"),
     *               @OA\Property(property="token_type", type="string", example="string"),
     *               @OA\Property(property="expires_in", type="integer", example="360"),
     *               @OA\Property(property="user", type="object", example="{}"),
     *         ),
     *       ),
     *      @OA\Response(
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
     * )
     */        