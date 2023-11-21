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
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @param UserService $userService The instance of UserService class.
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('jwt:api', ['except' => ['register']]);
        $this->userService = $userService;
    }

    /**
     * Create a new user
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
                'user_email'                  => 'required|email|unique:User',
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
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }
    /**
     * Send user data using their ID
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param integer $id ID of user to fetch.
     * @return \Illuminate\Http\Response
     */
    public function indexByID(int $id)
    {
        try {
            return successResponse($this->userService->getByID($id));
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }
}
