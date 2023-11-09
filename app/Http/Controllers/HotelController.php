<?php

namespace App\Http\Controllers;

use App\Services\HotelService;
use App\Utils\ApiErrorNumber;
use App\Utils\ApiResponser;
use Exception;
use Illuminate\Http\Response;

class HotelController extends Controller
{
    use ApiResponser, ApiErrorNumber;

    private $hotelService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    public function index()
    {
        try{
            return $this->successResponse($this->hotelService->getAllHotels());
        }
        catch(Exception $e) {
            return $this->errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                $this->generic_error,
                $e->getMessage()
            );
        }
    }
}
