<?php

/**
 * @OA\Get(
 *      path="/api/v2/languages",
 *      operationId="languageIndexAll",
 *      tags={"Language"},
 *      summary="Get languages",
 *      description="Get all supported languages",
 *      @OA\Parameter(
 *          name="lang",
 *          in="query",
 *          required=false,
 *          example="en",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Languages successfully collects",
 *          @OA\JsonContent(
 *                @OA\Property(property="successMsg", type="string", example="string"),
 *                @OA\Property(property="data", type="array",
 *                    @OA\Items(ref="#/components/schemas/Language"),
 *                ),
 *           ),
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
 *    ),
 */

/**
 * @OA\Get(
 *      path="/api/v2/language/languageId",
 *      operationId="languageId",
 *      tags={"Language"},
 *      summary="Get language ID",
 *      description="Get the ID of a language from its iso code",
 *      @OA\Parameter(
 *          name="lang",
 *          in="query",
 *          required=false,
 *          example="en",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Languages successfully collects",
 *          @OA\JsonContent(
 *              @OA\Property(property="successMsg", type="string", example="string"),
 *              @OA\Property(property="data", type="array",
 *                  @OA\Items(
 *                      @OA\Property(property="data", type="object",
 *                         @OA\Property(property="successMsg", type="string", example="string"),
 *                          @OA\Property(property="data", type="integer", example="1"),
 *                      )
 *                  )
 *              ),
 *           ),
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
 *    ),
 */

/**
 * @OA\Get(
 *      path="/api/v2/language/{languageId}/index",
 *      operationId="languageIndex",
 *      tags={"Language"},
 *      summary="Get the data of a language",
 *      description="ID of a language is used to fetch all its data",
 *      @OA\Parameter(
 *          name="lang",
 *          in="query",
 *          required=false,
 *          example="en",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *              name="languageId",
 *              in="path",
 *              required=true,
 *              example=1,
 *              @OA\Schema(
 *                  type="integer"
 *              )
 *          ),
 *      @OA\Response(
 *          response=200,
 *          description="Countries successfully collects",
 *          @OA\JsonContent(
 *               @OA\Property(property="successMsg", type="string", example="string"),
 *                @OA\Property(property="data", type="object",
 *                    ref="#/components/schemas/Language",
 *                ),
 *           ),
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
 *    ),
 */
