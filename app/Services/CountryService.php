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

    public function getIsoByNumericIP($ip)
    {
        $result = CountryIpv4::where([
            ['start_ip_num', '<=', $ip],
            ['end_ip_num', '>=', $ip],
        ])->with('country')->first();
    
        if ($result) {
            return Country::where('name', $result->country_name)
                ->value('iso_code_2') ?? 'unknown';
        }
    
        return 'unknown';
    }

    public function convertIPV4ToNumericFormat($ipAddress)
    {
        if (!filter_var($ipAddress, FILTER_VALIDATE_IP) === false && $ipAddress == '::1') {
			$ipAddress 	= '197.155.64.0';
		} 

		$ipArray 		= explode('.',$ipAddress);
		$integer_ip 	= (16777216 * $ipArray[0] ) + (65536 * $ipArray[1] )+ ( 256 * $ipArray[2] ) +$ipArray[3];	
		return  $integer_ip;
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
