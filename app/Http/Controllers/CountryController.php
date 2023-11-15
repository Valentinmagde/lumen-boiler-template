<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use Exception;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    private $countryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * @OA\Get(
     *      path="/api/v2/countries",
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
     *                      @OA\Schema(
     *                          @OA\Xml(name="Countries"),
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
     *    ),
     * 
     * Display a listing of the countries.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return successResponse($this->countryService->getAllCountries());
        }
        catch(Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }
}