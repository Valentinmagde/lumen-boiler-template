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
    /**
     * The instance of AuthService class.
     *
     * @var AuthService
     */
    private $authService;

    /**
     * Create a new AuthController instance.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @param AuthService $authService The instance of AuthService class.
     * @return void
     */
    public function __construct(AuthService $authService)
    {
        $this->middleware('jwt:api', ['except' => ['login', 'refresh']]);
        $this->authService = $authService;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @param Request $request Request.
     * @return Response
     */
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'     => 'required|email',
                'password'  => 'required|min:6'
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
        } catch (Exception $e) {
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
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try {
            return successResponse($this->authService->logout());
        } catch (Exception $e) {
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
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        try {
            return respondWithToken($this->authService->refresh());
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }
}
