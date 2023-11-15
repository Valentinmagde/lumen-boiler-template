<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Exception;

class AuthController extends Controller
{
    private $authService;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(AuthService $authService)
    {
        $this->middleware('jwt:api', ['except' => ['login']]);
        $this->authService = $authService;
    }
    /*
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'user_email'     => 'required|email',
                'user_password'  => 'required|min:6'
            ]);
        
            if ($validator->fails()) {
                $error = implode(",", $validator->errors()->all());
                
                return errorResponse(
                    Response::HTTP_BAD_REQUEST,
                    ERROR_CODE['VALIDATOR'], 
                    $error
                );
            }
            
            return respondWithToken(
                $this->authService->login($request->all())
            );
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
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try{
            return successResponse($this->authService->logout());
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
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        try{
            return respondWithToken($this->authService->refresh());
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