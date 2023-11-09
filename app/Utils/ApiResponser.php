<?php

namespace App\Utils;

use stdClass;
use Illuminate\Http\JsonResponse;

trait ApiResponser
{
    /**
     * Success Response
     * 
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-07
     * 
     * @param mixed $data
     * @param int $code
     * 
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function successResponse($data, $code = \Illuminate\Http\Response::HTTP_OK)
    {
        return response()->json(['status' => "OK", 'data' => $data], $code);
    }

    /**
     * Error Response
     * 
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-07
     * 
     * @param int $code
     * @param int $errNo
     * @param mixed $errMsg
     * 
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function errorResponse($code, $errNo, $errMsg)
    {
        $error = new stdClass();

        $error->errNo = $errNo;
        $error->errMsg = $errMsg;

        return response()->json(['status' => "FAILED", 'data' => $error], $code);
    }

    /**
     * Error Message
     * 
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-07
     * 
     * @param string $message
     * @param int $code
     * 
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}