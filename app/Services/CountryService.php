<?php

namespace App\Services;

use ExternalApi\ConsumeExternalService;
use Exception;
use App\Models\Country;
use App\Models\CountryIpv4;

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
     * Fetch all the countries.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @return array list of countries
     */
    public function getAllCountries()
    {
        try {
            return Country::all();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Get the visitor's country.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-21
     *
     * @param string $ipAddress The visitor ip address.
     * @return mixed
     */
    public function getVisitorCountry(string $ipAddress)
    {
        try {
            // Convert an IP address into numeric format.
            $numericIpAddress = $this->convertIPV4ToNumericFormat($ipAddress);

            return $this->getCountryByNumericIP($numericIpAddress);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Fetch ID of a country from its iso code.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param string $iso_code_2 Iso code of a country.
     * @return country id
     */
    public function getCountryIdByisoCode(string $iso_code_2)
    {
        try {
            return Country::where('iso_code_2', $iso_code_2)
            ->get('country_id')
            ->first();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Fetch data of a country from its iso code.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param string $iso_code_2 Iso code of a country.
     * @return country object
     */
    public function getCountryByisoCode(string $iso_code_2)
    {
        try {
            return Country::where('iso_code_2', $iso_code_2)->first();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Fetch data of a country from its ID.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param integer $id ID of a country.
     * @return country object
     */
    public function getCountryByID(int $id)
    {
        try {
            return Country::find($id)->first();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Fetch the iso code of a country from its numeric IP.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param integer $ip Numeric IP of a country.
     * @return country iso code
     */
    public function getIsoByNumericIP(int $ip)
    {
        try {
            $result = CountryIpv4::where([
                ['start_ip_num', '<=', $ip],
                ['end_ip_num', '>=', $ip],
            ])->first();
        
            return $result->country->iso_code_2;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Fetch country from its numeric IP.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-21
     *
     * @param integer $ip Numeric IP of a country.
     * @return Country country
     */
    public function getCountryByNumericIP(int $ip)
    {
        try {
            $result = CountryIpv4::where([
                ['start_ip_num', '<=', $ip],
                ['end_ip_num', '>=', $ip],
            ])->first();
        
            return $result->country;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Convert an IP address into numeric format.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param string $ipAddress IP address.
     * @return integer numeric IP address
     */
    public function convertIPV4ToNumericFormat(string $ipAddress)
    {
        try {
            if ($ipAddress == '::1') {
                $ipAddress 	= '197.155.64.0';
            }
            
            $ipArray = explode('.', $ipAddress);
            $integer_ip = (
                (16777216 * $ipArray[0] ) +
                (65536 * $ipArray[1] ) +
                ( 256 * $ipArray[2] ) +
                $ipArray[3]
            );

            return  $integer_ip;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
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
