<?php

/**
 * @OA\Get(
 *      path="/api/v2/hotels",
 *      operationId="hotelIndex",
 *      tags={"Hotel"},
 *      summary="Get all hotels",
 *      description="Returns all hotels",
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
 *          description="Hotels successfully collects",
 *          @OA\JsonContent(
 *               @OA\Property(property="successMsg", type="string", example="string"),
 *                @OA\Property(property="data", type="array",
 *                    @OA\Items(ref="#/components/schemas/Hotel"),
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
 * 
 */