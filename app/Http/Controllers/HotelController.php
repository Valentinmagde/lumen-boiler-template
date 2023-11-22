<?php

namespace App\Http\Controllers;

use App\Services\HotelService;
use Exception;
use Illuminate\Http\Response;

class HotelController extends Controller
{
    private $hotelService;

    /**
     * Create a new controller instance.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @param HotelService $hotelService The instance of HotelService class.
     * @return void
     */
    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    /**
     * Display a listing of the resource.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return successResponse($this->hotelService->getAllHotels());
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }
}
