<?php

if (!function_exists('t')) {
    /**
     * Translate the given message.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-10
     *  
     * @param string $translationWords
     * @return string of translated given string
     */
    function t($translationWords)
    {
        $seperatedWords = explode(".", $translationWords);
        $fetchedTranslation=trans($seperatedWords[0]);

        for($i= 1;$i<count($seperatedWords);$i++){
            $fetchedTranslation=$fetchedTranslation[$seperatedWords[$i]];
        }

        return ($fetchedTranslation);
    }
}

if (! function_exists('successResponse')) {
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
    function successResponse($data, $code = \Illuminate\Http\Response::HTTP_OK)
    {
        return response()->json(['status' => "OK", 'data' => $data], $code);
    }
}

if (! function_exists('errorResponse')) {
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
    function errorResponse($code, $errNo, $errMsg)
    {
        $error = new stdClass();

        $error->errNo = $errNo;
        $error->errMsg = $errMsg;

        return response()->json(['status' => "FAILED", 'data' => $error], $code);
    }
}

if (! function_exists('errorMessage')) {
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
    function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}

if (! function_exists('respondWithToken')) {
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}