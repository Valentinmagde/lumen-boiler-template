<?php

namespace App\Services;

use ExternalApi\ConsumeExternalService;
use Exception;
use App\Models\Country;

class CountryService
{
    // use ConsumeExternalService;
    
    // /**
    //  * The base uri to consume users service
    //  * @var string
    //  */
    // public $baseUri;

    // /**
    //  * userization secret to pass to user api
    //  * @var string
    //  */
    // public $secret;

    // /**
    //  * Create a new CountryService instance.
    //  *
    //  * @author Valentin magde <valentinmagde@gmail.com>
    //  * @since 2023-11-14
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->baseUri = env('API_BASE_URL');
    //     $this->secret = env('API_SECRET');
    // }

    /**
     * Get all countries
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-14
     *
     * @return array list of countries
     */
    public function getAllCountries()
    {
        return  json_decode(Country::all());
    }

    public function getCountryIdByisoCode($iso_code_2)
    {
        return  json_decode(Country::where('iso_code_2',$iso_code_2)
        ->get('country_id'));
    }

    public function getCountryByisoCode($iso_code_2)
    {
        return  json_decode(Country::where('iso_code_2',$iso_code_2)
        ->get());
    }

    public function getCountryByID($id)
    {
        return  json_decode(Country::where('country_id',$id)
        ->get());
    }
    // /**
    //  * Get all hotels
    //  *
    //  * @author Valentin magde <valentinmagde@gmail.com>
    //  * @since 2023-11-14
    //  *
    //  * @return array list of countries
    //  */
    // public function getAllCountries()
    // {
    //     try {
    //         return $this->performRequest('GET', '/?q=bct&a=getCountries');
    //     } catch (Exception $e) {
    //         throw new Exception($e->getMessage());
    //     }
    // }
}
