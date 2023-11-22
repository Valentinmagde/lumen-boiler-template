<?php

if (!function_exists('t')) {
    /**
     * Translate the given message.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-10
     *
     * @param string $translationWords The word to translate.
     * @return string of translated given string
     */
    function t(string $translationWords)
    {
        $seperatedWords = explode(".", $translationWords);
        $fetchedTranslation = trans($seperatedWords[0]);


        for ($i = 1; $i < count($seperatedWords); $i++) {
            if (is_array($fetchedTranslation)
                && array_key_exists($seperatedWords[$i], $fetchedTranslation)
            ) {
                $fetchedTranslation = $fetchedTranslation[$seperatedWords[$i]];
            } else {
                return $translationWords;
            }
        }

        return ($fetchedTranslation);
    }
}

if (!function_exists('successResponse')) {
    /**
     * Success Response
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-07
     *
     * @param mixed $data The response body.
     * @param integer $code The http response status code.
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    function successResponse(mixed $data, int $code = \Illuminate\Http\Response::HTTP_OK)
    {
        return response()->json(['status' => "OK", 'data' => $data], $code);
    }
}

if (!function_exists('errorResponse')) {
    /**
     * Error Response
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-07
     *
     * @param integer $code The http response status code.
     * @param integer $errNo The custom error code.
     * @param mixed $errMsg The error message.
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    function errorResponse(int $code, int $errNo, mixed $errMsg)
    {
        $error = new stdClass();

        $error->errNo = $errNo;
        $error->errMsg = $errMsg;

        return response()->json(['status' => "FAILED", 'data' => $error], $code);
    }
}

if (!function_exists('errorMessage')) {
    /**
     * Error Message
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-07
     *
     * @param string $message The error message.
     * @param integer $code The response http status code.
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    function errorMessage(string $message, int $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}

if (!function_exists('respondWithToken')) {
    /**
     * Get the token array structure.
     *
     * @param mixed $token The token string.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function respondWithToken(mixed $token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            // 'user' => auth()->user()
        ]);
    }
}
