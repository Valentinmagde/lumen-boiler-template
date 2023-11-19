<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ConsumerService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Exception;

class ConsumerController extends Controller
{
    private $consumerService;

    /**
     * Create a new ConsumerController instance.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @param ConsumerService $consumerService The instance of ConsumerService class.
     * @return void
     */
    public function __construct(ConsumerService $consumerService)
    {
        $this->middleware('jwt:api', ['except' => ['register']]);
        $this->consumerService = $consumerService;
    }

    /**
     * Create a new consumer
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @param Request $request Request.
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name'                   => 'required',
                'email'                  => 'required|email|unique:Api_Consumers',
                'password'               => 'required|confirmed|min:6',
                'password_confirmation'  => 'required',
            ]);
        
            if ($validator->fails()) {
                $error = implode(",", $validator->errors()->all());
    
                return errorResponse(
                    Response::HTTP_PRECONDITION_FAILED,
                    ERROR_CODE['VALIDATOR'],
                    $error
                );
            }
    
            return successResponse($this->consumerService->register($request->all()));
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }

    /**
     * Get the authenticated a concumer.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        try {
            return successResponse($this->consumerService->show());
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }
}
