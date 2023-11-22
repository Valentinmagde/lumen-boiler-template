<?php

namespace App\Services;

use ExternalApi\ConsumeExternalService;
use Remote\FileLoader as RemoteFileLoader;
use Exception;

/**
 * Class ExampleService
 *
 * This service is a concrete example of how to call an external API
 * and a remote service from the depot engine.
 *
 * @author Valentin magde <valentinmagde@gmail.com>
 * @since 2023-11-21
 */
class ExampleService
{
    use ConsumeExternalService, RemoteFileLoader;
    
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

    /**
     * Create a new CountryService instance.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-14
     *
     * @return void
     */
    public function __construct()
    {
        $this->baseUri = env('API_BASE_URL');
        $this->secret = env('API_SECRET');
    }

    /**
     * Example of a function for getting data from an external API
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-21
     *
     * @return array list of countries
     */
    public function getAllCountries()
    {
        try {
            return $this->performRequest('GET', '/?q=bct&a=getCountries');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Example of a function for getting data from a remote service
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-21
     *
     * @return array list of hotels
     */
    public function getAllHotels()
    {
        try {
            $remoteHotelService = $this->loadRemoteService('Hotel');

            return $remoteHotelService->getHotels();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
