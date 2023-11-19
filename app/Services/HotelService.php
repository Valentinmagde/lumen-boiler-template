<?php

namespace App\Services;

use Remote\FileLoader as RemoteFileLoader;
use Exception;

class HotelService
{
    use RemoteFileLoader;
    
    /**
     * Get all hotels
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-08
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
