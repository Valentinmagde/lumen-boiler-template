<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiSendingErrorException;
use App\Services\Local\AuthService;
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
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->authService = $authService;
    }

    /**
     * @OA\Post(
     * path="/api/v2/auth/login",
     * operationId="authLogin",
     * tags={"Authentification"},
     * summary="User Login",
     * description="Login User Here",
     *   @OA\Parameter(
     *          name="lang",
     *          in="query",
     *          required=true,
     *          example="en",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"user_email", "user_password"},
     *               @OA\Property(property="user_email", type="email", example="example@beachcomber.com"),
     *               @OA\Property(property="user_password", type="password", example="beachcomber")
     *            ),
     *        ),
     *        @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               type="object",
     *               required={"user_email", "user_password"},
     *               @OA\Property(property="user_email", type="email", example="example@beachcomber.com"),
     *               @OA\Property(property="user_password", type="password", example="beachcomber")
     *            ),
     *        ),
     *    ),
     *    @OA\Response(
     *          response=200,
     *          description="Login Successfully",
     *          @OA\JsonContent(
     *               @OA\Property(property="access_token", type="string", example="string"),
     *               @OA\Property(property="token_type", type="string", example="string"),
     *               @OA\Property(property="expires_in", type="integer", example="360"),
     *               @OA\Property(property="user", type="object", example="{}"),
     *         ),
     *       ),
     *       @OA\Response(
     *           response=400, 
     *           description="Bad request",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *       @OA\Response(
     *           response=401, 
     *           description="Unauthorized",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *       @OA\Response(
     *           response=404, 
     *           description="Resource Not Found",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     * )
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
     * @OA\Post(
     * path="/api/v2/auth/register",
     * operationId="Register",
     * tags={"Authentification"},
     * summary="User Register",
     * description="User Register here",
     *   @OA\Parameter(
     *          name="lang",
     *          in="path",
     *          required=true,
     *          example="en",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"user_email", "user_password", "user_password_confirmation", "user_surname"},
     *               @OA\Property(property="user_surname", type="text", example="beachcomber"),
     *               @OA\Property(property="user_email", type="email", example="example@beachcomber.com"),
     *               @OA\Property(property="user_password", type="password", example="beachcomber"),
     *               @OA\Property(property="user_password_confirmation", type="password", example="beachcomber"),
     *            ),
     *        ),
     *        @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               type="object",
     *               required={"user_email", "user_password", "user_password_confirmation", "user_surname"},
     *               @OA\Property(property="user_surname", type="text", example="beachcomber"),
     *               @OA\Property(property="user_email", type="email", example="example@beachcomber.com"),
     *               @OA\Property(property="user_password", type="password", example="beachcomber"),
     *               @OA\Property(property="user_password_confirmation", type="password", example="beachcomber")
     *            ),
     *        ),
     *    ),
     *   @OA\Response(
     *          response=201,
     *          description="User created successfully",
     *          @OA\JsonContent(
     *               @OA\Property(property="successMsg", type="string", example="string"),
     *               @OA\Property(property="data", type="object",
     *                   ref="#/components/schemas/User"
     *               ),
     *               
     *           )
     *       ),
     *       @OA\Response(
     *           response=400, 
     *           description="Bad request",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *       @OA\Response(
     *           response=401, 
     *           description="Unauthorized",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *       @OA\Response(
     *           response=404, 
     *           description="Resource Not Found",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *    )
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_email'                  => 'required|email|unique:users',
            'user_password'               => 'required|confirmed|min:6',
            'user_password_confirmation'  => 'required',
            'user_surname'                => 'required',
        ]);
    
        if ($validator->fails()) {
            $error = implode(",", $validator->errors()->all());
            return ApiSendingErrorException::sendingError([
                'errNo'=>ApiErrorNumbers::$validator, 
                'errMsg'=>$error, 
                'statusCode'=>Response::HTTP_BAD_REQUEST
            ]);
        }

        return $this->authService->register($request->all());
    }

    /**
     * @OA\Get(
     *      path="/api/v2/auth/me",
     *      operationId="getProfile",
     *      tags={"Authentification"},
     *      summary="Get the logged in user",
     *      description="Returns current user",
     *   @OA\Parameter(
     *          name="lang",
     *          in="path",
     *          required=true,
     *          example="en",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="User successfully collects",
     *          @OA\JsonContent(
     *               @OA\Property(property="successMsg", type="string", example="string"),
     *               @OA\Property(property="data", type="object",
     *                   ref="#/components/schemas/User"
     *               ),
     *           )
     *       ),
     *       security={
     *         {"bearer": {}}
     *       },
     *       @OA\Response(
     *           response=400, 
     *           description="Bad request",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *       @OA\Response(
     *           response=401, 
     *           description="Unauthorized",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *       @OA\Response(
     *           response=404, 
     *           description="Resource Not Found",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *    ),
     *      
     * 
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        try{
            return $this->successResponse($this->authService->show());
        }
        catch(Exception $e){
            return $this->errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                $this->generic_error,
                $e->getMessage()
            );
        }
    }

    /**
     * @OA\Put(
     * path="/api/v2/auth/update",
     * operationId="authenticatedUpdate",
     * tags={"Authentification"},
     * summary="Update of the authenticated user",
     * description="User update here",
     *   @OA\Parameter(
     *          name="lang",
     *          in="path",
     *          required=true,
     *          example="en",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"user_surname"},
     *               @OA\Property(property="user_surname", type="string", example="string"),
     *               @OA\Property(property="user_othername", type="string", example="string"),
     *               @OA\Property(property="user_jobtitle", type="string", example="string"),
     *               @OA\Property(property="user_phone", type="string", example="string"),
     *               @OA\Property(property="user_name", type="string", example="string"),
     *            ),
     *        ),
     *       @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               type="object",
     *               required={"user_surname"},
     *                   @OA\Property(property="user_surname", type="string", example="string"),
     *                   @OA\Property(property="user_othername", type="string", example="string"),
     *                   @OA\Property(property="user_jobtitle", type="string", example="string"),
     *                   @OA\Property(property="user_phone", type="string", example="string"),
     *                   @OA\Property(property="user_name", type="string", example="string")
     *            ),
     *        ),
     *    ),
     *   @OA\Response(
     *          response=200,
     *          description="User updated successfully",
     *          @OA\JsonContent(
     *               @OA\Property(property="successMsg", type="string", example="string"),
     *               @OA\Property(property="data", type="object",
     *                   ref="#/components/schemas/User"
     *               ),
     *           ),
     *       ),
     *       security={
     *         {"bearer": {}}
     *       },
     *       @OA\Response(
     *           response=400, 
     *           description="Bad request",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *       @OA\Response(
     *           response=401, 
     *           description="Unauthorized",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *       @OA\Response(
     *           response=404, 
     *           description="Resource Not Found",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *    )
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_surname' => 'required',
        ]);
    
        if ($validator->fails()) {
            $error = implode(",", $validator->errors()->all());
            return ApiSendingErrorException::sendingError([
                'errNo'=>ApiErrorNumbers::$validator, 
                'errMsg'=>$error, 
                'statusCode'=>Response::HTTP_BAD_REQUEST
            ]);
        }

        return $this->authService->update($request->all());
    }

    /**
     * @OA\Post(
     * path="/api/v2/auth/logout",
     * operationId="authLogout",
     * tags={"Authentification"},
     * summary="User Logout",
     * description="Logout User Here",
     *   @OA\Parameter(
     *          name="lang",
     *          in="path",
     *          required=true,
     *          example="en",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Logout Successfully",
     *          @OA\JsonContent(
     *               @OA\Property(property="successMsg", type="string", example="string"),
     *               @OA\Property(property="data", type="object", example="null"),
     *          )
     *       ),
     *       security={
     *         {"bearer": {}}
     *       },
     *      @OA\Response(
     *           response=400, 
     *           description="Bad request",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *       @OA\Response(
     *           response=401, 
     *           description="Unauthorized",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *       @OA\Response(
     *           response=404, 
     *           description="Resource Not Found",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     * )
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        return $this->authService->logout();
    }

    /**
     * @OA\Post(
     * path="/api/v2/auth/refresh",
     * operationId="authRefresh",
     * tags={"Authentification"},
     * summary="Refresh token",
     * description="Refresh Token Here",
     *   @OA\Parameter(
     *          name="lang",
     *          in="path",
     *          required=true,
     *          example="en",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *       security={
     *         {"bearer": {}}
     *       },
     *      @OA\Response(
     *          response=200,
     *          description="Refresh Successfully",
     *          @OA\JsonContent(
     *               @OA\Property(property="access_token", type="string", example="string"),
     *               @OA\Property(property="token_type", type="string", example="string"),
     *               @OA\Property(property="expires_in", type="integer", example="360"),
     *               @OA\Property(property="user", type="object", example="{}"),
     *         ),
     *       ),
     *      @OA\Response(
     *           response=400, 
     *           description="Bad request",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *       @OA\Response(
     *           response=401, 
     *           description="Unauthorized",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     *       @OA\Response(
     *           response=404, 
     *           description="Resource Not Found",
     *           @OA\JsonContent(
     *               @OA\Property(property="errNo", type="integer", example="number"),
     *               @OA\Property(property="errMsg", type="string", example="string"),
     *          )
     *       ),
     * )
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->authService->refresh();
    }
}