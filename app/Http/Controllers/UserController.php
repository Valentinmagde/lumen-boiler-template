<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Exception;

class UserController extends Controller
{
    private $userService;
    /**
     * Create a new UserController instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('jwt:api', ['except' => ['register']]);
        $this->userService = $userService;
    }

    /**
     * 
     */
    public function register(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'user_email'                  => 'required|email|unique:user',
                'user_password'               => 'required|confirmed|min:6',
                'user_password_confirmation'  => 'required',
                'user_surname'                => 'required',
            ]);
        
            if ($validator->fails()) {
                $error = implode(",", $validator->errors()->all());
    
                return errorResponse(
                    Response::HTTP_PRECONDITION_FAILED,
                    ERROR_CODE['VALIDATOR'],
                    $error
                );
            }
    
            return successResponse($this->userService->register($request->all()));
        }
        catch(Exception $e){
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        try{
            return successResponse($this->userService->show());
        }
        catch(Exception $e){
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }
}