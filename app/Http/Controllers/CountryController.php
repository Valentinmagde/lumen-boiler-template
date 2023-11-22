<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    private $countryService;

    /**
     * Create a new controller instance.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @param CountryService $countryService The instance of CountryService class.
     * @return void
     */
    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

     /**
     * Display a listing of all the countries.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll()
    {
        try {
            return successResponse($this->countryService->getAllCountries());
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }

    // /**
    //  * Get the country of the visitor".
    //  *
    //  * @author Valentin magde <valentinmagde@gmail.com>
    //  * @since 2023-11-15
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     try {
    //         return successResponse($this->countryService->getAllCountries());
    //     } catch (Exception $e) {
    //         return errorResponse(
    //             Response::HTTP_INTERNAL_SERVER_ERROR,
    //             ERROR_CODE['GENERIC_ERROR'],
    //             $e->getMessage()
    //         );
    //     }
    // }

    /**
     * Get the visitor's country.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-21
     *
     * @param Request $request Request.
     * @return \Illuminate\Http\Response
     */
    public function getVisitorCountry(Request $request)
    {
        try {
            return successResponse($this->countryService->getVisitorCountry($request->ip()));
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }

    /**
     * Iso code 2 is used to fetch ID of a country.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param string $iso_code_2 Iso code of a region.
     * @return \Illuminate\Http\Response
     */
    public function getIdByIso(string $iso_code_2)
    {
        try {
            return successResponse($this->countryService->getCountryIdByisoCode($iso_code_2));
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }

    /**
     *Iso code 2 is used to fetch data of a country.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param string $iso_code_2 Iso code of a region.
     * @return \Illuminate\Http\Response
     */
    public function indexByIso(string $iso_code_2)
    {
        try {
            return successResponse($this->countryService->getCountryByisoCode($iso_code_2));
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }

    /**
     *Get the data of a country by its ID.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param integer $id The ID of a country.
     * @return \Illuminate\Http\Response
     */
    public function indexById(int $id)
    {
        try {
            return successResponse($this->countryService->getCountryByID($id));
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }

    /**
     * Using the numeric IP fetch the iso code for a country.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param integer $ip The numeric ip of a region.
     * @return \Illuminate\Http\Response
     */
    public function isoByNumericIp(int $ip)
    {
        try {
            return successResponse($this->countryService->getIsoByNumericIP($ip));
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }

    /**
     * Take an IPV4 to convert it to a numeric value
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param Request $request Request used to fetch ip address (string).
     * @return \Illuminate\Http\Response
     */
    public function convertIPV4(Request $request)
    {
        $ipAddress =$request->input('ipAddress');
        try {
            return successResponse($this->countryService->convertIPV4ToNumericFormat($ipAddress));
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }
}
