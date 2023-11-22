<?php

namespace ExternalApi;

use Exception;
use GuzzleHttp\Client;

trait ConsumeExternalService
{
    /**
     * Send request to any service
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-14
     *
     * @param string $method The http method.
     * @param string $requestUrl The request url.
     * @param array $formParams The request body.
     * @param array $headers The request header.
     * @return string
     */
    public function performRequest(
        string $method,
        string $requestUrl,
        array $formParams = [],
        array $headers = []
    ) {
        try {
            $client = new Client([
                'base_uri'  =>  $this->baseUri,
            ]);

            if (isset($this->secret)) {
                $headers['Authorization'] = $this->secret;
            }

            $response = $client->request($method, $requestUrl, [
                'debug' => fopen('php://stderr', 'w'),
                'json' => $formParams,
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json',
                    'Authorization' => $headers['Authorization'],
                ]
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
