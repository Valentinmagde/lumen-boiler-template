<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use Exception;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    private $country;
	private $country_id;
	private $country_iso_id;
	private $country_iso_id_3;
	private $country_name;
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
     * Display a listing of the countries.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
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
    //  * Display a listing of the countries.
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
     * Display a listing of the countries.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @return \Illuminate\Http\Response
     */
    public function indexByVisitor()
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

    /**
     * Display a listing of the countries.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @return \Illuminate\Http\Response
     */
    public function getIdByIso($iso_code_2)
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
     * Display a listing of the countries.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @return \Illuminate\Http\Response
     */
    public function indexByIso($iso_code_2)
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
     * Display a listing of the countries.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @return \Illuminate\Http\Response
     */
    public function indexById($id)
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
     * Display a listing of the countries.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @return \Illuminate\Http\Response
     */
    public function indexByNumericIp()
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

    /**
     * Display a listing of the countries.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @return \Illuminate\Http\Response
     */
    public function getCountry()
	{
		return array(
			'country'   			=> $this->country,
        	'country_id'        	=> $this->country_id,
        	'country_iso_code_2'  	=> $this->country_iso_id,
        	'country_iso_code_3'  	=> $this->country_iso_id_3,
        	'country_name' 			=> $this->country_name
        );
	}
    /**
     * Display a listing of the countries.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @return \Illuminate\Http\Response
     */
    public function convertIPV4()
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

    /**
     * Display a listing of the countries.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @return \Illuminate\Http\Response
     */
    public function getIP()
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
}
