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
        // $this->middleware('jwt:api', ['except' => ['register']]);
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
     * Get the authenticated a consumer.
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

    /**
     * Return soft deleted consumer.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param integer $consumerId ID of consumer to be deleted.
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(int $consumerId)
    {
        try {
            return successResponse(
                $this->consumerService->softDelete($consumerId),
                Response::HTTP_NO_CONTENT
            );
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }

    /**
     * Return a restored consumer.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param integer $consumerId ID of consumer to be restored.
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore(int $consumerId)
    {
        try {
            return successResponse($this->consumerService->restore($consumerId));
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }
    /**
     * Return the patched consumer.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param Request $request Request.
     * @param integer $consumerId ID of consumer to be updated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function patch(Request $request, int $consumerId)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'                  => 'email|unique:Api_Consumers',
                'password'               => 'min:6'
            ]);
        
            if ($validator->fails()) {
                $error = implode(",", $validator->errors()->all());
    
                return errorResponse(
                    Response::HTTP_PRECONDITION_FAILED,
                    ERROR_CODE['VALIDATOR'],
                    $error
                );
            }
            return successResponse($this->consumerService->patch($consumerId, $request->all()));
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }
     /**
     * Return the upated consumer.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param Request $request Request.
     * @param integer $consumerId ID of consumer to be updated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $consumerId)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'                  => 'required|email|unique:Api_Consumers',
                'password'               => 'required|min:6'
            ]);
            
            if ($validator->fails()) {
                $error = implode(",", $validator->errors()->all());
    
                return errorResponse(
                    Response::HTTP_PRECONDITION_FAILED,
                    ERROR_CODE['VALIDATOR'],
                    $error
                );
            }
            return successResponse($this->consumerService->update($consumerId, $request->all()));
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }
}
