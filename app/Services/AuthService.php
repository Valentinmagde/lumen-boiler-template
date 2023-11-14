<?php

namespace App\Services;

use Illuminate\Http\Response;
use App\Models\User;
use App\Http\Helpers\HelperFunctions;
use App\Http\Helpers\ApiSendingResponse;
use App\Http\Helpers\ApiSendingErrorException;
use App\Http\Helpers\ApiErrorNumbers;
use Exception;

class AuthService
{
    /**
     * Get a JWT via given credentials.
     * 
     * @param mixed $data
     * 
     * @return token
     */
    public static function login($data)
    {
        try {
            $user = User::where('user_email', $data['user_email'])
                ->where('user_password', md5($data['user_password']))
                ->first();

            if($user) $token = auth()->login($user);
            else throw new Exception(t('auth.incorrectUserEmailOrPassword'));

            return $token;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        } 
    }

    /**
     * Log the user out (Invalidate the token).
     * 
     * @return mixed
     */
    public static function logout()
    {
        try{
            auth()->logout();

            return null;
        }catch(\Exception $e){
            throw new Exception($e->getMessage());
        } 
    }

    /**
     * Refresh a token.
     * 
     * @return new token 
     */
    public static function refresh()
    {
        try{
            return auth()->refresh();
        }catch(\Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     * Get authenticate user
     * 
     * @return $user
     */
    public static function show()
    {
        try {
            return auth()->user();
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        } 
    }
}