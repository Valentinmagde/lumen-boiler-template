<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiSendingErrorException;
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

    /**
     * @OA\Post(
     * path="/api/v2/token/access",
     * operationId="accessToken",
     * tags={"Token"},
     * summary="Get access token",
     * description="Get access token here",
     *   @OA\Parameter(
     *          name="lang",
     *          in="query",
     *          required=false,
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
     * path="/api/v2/token/revoke",
     * operationId="revokeToken",
     * tags={"Token"},
     * summary="Revoke token",
     * description="Revoke token here",
     *   @OA\Parameter(
     *          name="lang",
     *          in="query",
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
     * @OA\Post(
     * path="/api/v2/token/refresh",
     * operationId="refreshToken",
     * tags={"Token"},
     * summary="Refresh token",
     * description="Refresh Token Here",
     *   @OA\Parameter(
     *          name="lang",
     *          in="query",
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