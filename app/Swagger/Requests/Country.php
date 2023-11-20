<?php

/**
 * @OA\Get(
 *      path="/api/v2/country",
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
 *      path="/api/v2/country/getVisitorCountry",
 *      operationId="countryVisitor",
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
 *      path="/api/v2/country/getCountryIdByisoCode/{iso_code_2}",
 *      operationId="countryIDIso",
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
 *      path="/api/v2/country/getCountryByisoCode/{iso_code_2}",
 *      operationId="countryIso",
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
 *      path="/api/v2/country/getCountryByID/{id}",
 *      operationId="countryID",
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
 *      path="/api/v2/country/getCountryByNumericIP",
 *      operationId="countryIndex",
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
 *      path="/api/v2/country/getCountry",
 *      operationId="countryIndex",
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
 *      path="/api/v2/country/convertIPV4ToNumericFormat",
 *      operationId="countryIndex",
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
 *      path="/api/v2/country/getAllCountryList",
 *      operationId="countryIndex",
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
 *      path="/api/v2/get_client_ip",
 *      operationId="countryIndex",
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