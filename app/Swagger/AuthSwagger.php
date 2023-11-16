<?php

/**
 * Access token (Login)
 * 
 * @OA\Post(
 * path="/api/v2/token/access",
 * operationId="accessToken",
 * tags={"Token"},
 * summary="Get access token",
 * description="Get access token here",
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
 *               required={"email", "password"},
 *               @OA\Property(property="email", type="email", example="example@beachcomber.com"),
 *               @OA\Property(property="password", type="password", example="beachcomber")
 *            ),
 *        ),
 *        @OA\MediaType(
 *            mediaType="application/json",
 *            @OA\Schema(
 *               type="object",
 *               required={"email", "password"},
 *               @OA\Property(property="email", type="email", example="example@beachcomber.com"),
 *               @OA\Property(property="password", type="password", example="beachcomber")
 *            ),
 *        ),
 *    ),
 *    @OA\Response(
 *          response=200,
 *          description="Access token successfully collects",
 *          @OA\JsonContent(
 *               @OA\Property(property="access_token", type="string", example="string"),
 *               @OA\Property(property="token_type", type="string", example="string"),
 *               @OA\Property(property="expires_in", type="integer", example="360")
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
 *       @OA\Response(
 *           response=500, 
 *           description="Internal Server Error",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 * )
 */

/**
 * Revoke token (Logout)
 *
 * @OA\Post(
 * path="/api/v2/token/revoke",
 * operationId="revokeToken",
 * tags={"Token"},
 * summary="Revoke token",
 * description="Revoke token here",
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
 *          description="Token successfully revoked",
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
 *       @OA\Response(
 *           response=500, 
 *           description="Internal Server Error",
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
 * path="/api/v2/token/refresh",
 * operationId="refreshToken",
 * tags={"Token"},
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
 *               @OA\Property(property="expires_in", type="integer", example="360")
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
 *       @OA\Response(
 *           response=500, 
 *           description="Internal Server Error",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 * )
 */