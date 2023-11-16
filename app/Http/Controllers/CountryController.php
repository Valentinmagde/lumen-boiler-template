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
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     * 
     * @return void
     */
    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * Display a listing of the countries.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
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