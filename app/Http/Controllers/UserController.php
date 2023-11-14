<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiSendingErrorException;
use App\Services\AuthService;
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
    public function __construct(AuthService $userService)
    {
        $this->middleware('jwt:api', ['except' => ['register']]);
        $this->userService = $userService;
    }

    /**
     * @OA\Post(
     * path="/api/v2/users/register",
     * operationId="Register",
     * tags={"Users"},
     * summary="User Register",
     * description="User Register here",
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

            return errorResponse(
                Response::HTTP_PRECONDITION_FAILED,
                ERROR_CODE['VALIDATOR'],
                $error
            );
        }

        return $this->userService->register($request->all());
    }

    /**
     * @OA\Get(
     *      path="/api/v2/user/me",
     *      operationId="getProfile",
     *      tags={"Users"},
     *      summary="Get the logged in user",
     *      description="Returns current user",
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