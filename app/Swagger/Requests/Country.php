<?php

/**
 * @OA\Get(
 *      path="/api/v2/countries",
 *      operationId="countryIndexAll",
 *      tags={"Country"},
 *      summary="Get all countries",
 *      description="Get all countries here",
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
 *          description="Countries successfully collects",
 *          @OA\JsonContent(
 *                @OA\Property(property="successMsg", type="string", example="string"),
 *                @OA\Property(property="data", type="array",
 *                    @OA\Items(ref="#/components/schemas/Country"),
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
 *      path="/api/v2/country/visitor",
 *      operationId="countryVisitor",
 *      tags={"Country"},
 *      summary="Get the country of the visitor",
 *      description="Get the country of the visitor",
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
 *          description="Countries successfully collects",
 *          @OA\JsonContent(
 *              @OA\Property(property="successMsg", type="string", example="string"),
 *              @OA\Property(property="data", type="array",
 *                  @OA\Items(
 *                      @OA\Property(property="data", type="object",
 *                          @OA\Property(property="value", type="integer", example="number"),
 *                          @OA\Property(property="description", type="string", example="string"),
 *                          @OA\Property(property="code", type="string", example="string"),
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
 *      path="/api/v2/country/{iso_code_2}/countryID",
 *      operationId="countryIDIso",
 *      tags={"Country"},
 *      summary="Get the ID of a country from it's iso code",
 *      description="Iso code 2 is used to fetch ID of a country",
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
 *              name="iso_code_2",
 *              in="path",
 *              required=true,
 *              example="FR",
 *              @OA\Schema(
 *                  type="string"
 *              )
 *          ),
 *      @OA\Response(
 *          response=200,
 *          description="Countries successfully collects",
 *          @OA\JsonContent(
 *              @OA\Property(property="successMsg", type="string", example="string"),
 *              @OA\Property(property="data", type="integer", example="1"),
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
 *      path="/api/v2/country/{iso_code_2}/countryByIso",
 *      operationId="countryIso",
 *      tags={"Country"},
 *      summary="Get the data of a country from it's iso code",
 *      description="Iso code 2 is used to fetch data of a country",
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
 *              name="iso_code_2",
 *              in="path",
 *              required=true,
 *              example="FR",
 *              @OA\Schema(
 *                  type="string"
 *              )
 *          ),
 *      @OA\Response(
 *          response=200,
 *          description="Countries successfully collects",
 *          @OA\JsonContent(
 *               @OA\Property(property="successMsg", type="string", example="string"),
 *                @OA\Property(property="data", type="object",
 *                    ref="#/components/schemas/Country",
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
 *      path="/api/v2/country/{id}/id",
 *      operationId="countryID",
 *      tags={"Country"},
 *      summary="Get country by ID",
 *      description="Get the data of a country by its ID",
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
 *              name="id",
 *              in="path",
 *              required=true,
 *              example="1",
 *              @OA\Schema(
 *                  type="string"
 *              )
 *          ),
 *      @OA\Response(
 *          response=200,
 *          description="Countries successfully collects",
 *          @OA\JsonContent(
 *             @OA\Property(property="successMsg", type="string", example="string"),
 *                @OA\Property(property="data", type="object",
 *                    ref="#/components/schemas/Country",
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
 *      path="/api/v2/country/{ip}/isoFromNumericIp",
 *      operationId="countryIsoID",
 *      tags={"Country"},
 *      summary="Get iso by numeric IP",
 *      description="Using the numeric IP fetch the iso code for a country",
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
 *              name="ip",
 *              example=16909056,
 *              in="path",
 *              required=true,
 *              @OA\Schema(
 *                  type="integer"
 *              )
 *          ),
 *      @OA\Response(
 *          response=200,
 *          description="Countries successfully collects",
 *          @OA\JsonContent(
 *             @OA\Property(property="successMsg", type="string", example="string"),
 *              @OA\Property(property="data", type="string", example="string"),
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
 *      path="/api/v2/country/convertIP",
 *      operationId="countryConvertIP",
 *      tags={"Country"},
 *      summary="Convert IPV4 to numeric format",
 *      description="Take an IPV4 to convert it to a numeric value",
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
 *              name="ipAddress",
 *              in="query",
 *              example="197.155.64.0",
 *              required=true,
 *              @OA\Schema(
 *                  type="string"
 *              )
 *          ),
 *      @OA\Response(
 *          response=200,
 *          description="Countries successfully collects",
 *          @OA\JsonContent(
 *              @OA\Property(property="successMsg", type="string", example="string"),
 *              @OA\Property(property="data", type="integer", example="1"),
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
