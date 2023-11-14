<?php

namespace App\Services;

use ExternalApi\ConsumeExternalService;
use Exception;

class CountryService
{
    use ConsumeExternalService;
    
    /**
     * The base uri to consume users service
     * @var string
     */
    public $baseUri;

    /**
     * userization secret to pass to user api
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = "http://localhost/api.beachcomber-hotels.com/";
        $this->secret = '';
    }

    /**
     * Get all hotels
     * 
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-14
     * 
     * @return array list of countries
     */
    public function getAllCountries()
    {
        try{
            return $this->performRequest('GET', '?q=bct&a=getCountries');
        }
        catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}