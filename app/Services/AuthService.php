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
            else throw new Exception('Incorrect user email or password');

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

            return ApiSendingResponse::sendingResponse([
                'successMsg'=> __('auth.logout.successfullyLoggedOut'),
                'data'=> null, 
                'statusCode'=>Response::HTTP_OK
            ]);
        }catch(\Exception $e){
            return ApiSendingErrorException::formatError($e);
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
            return HelperFunctions::respondWithToken(auth()->refresh());
        }catch(\Exception $e){
            return ApiSendingErrorException::formatError($e);
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

    /**
     * Register a user
     * 
     * @param $data
     * 
     * @return $user
     */
    public static function register($data)
    {
        try{
            $data['user_password'] = bcrypt($data['user_password']);
            $user = User::create($data);

            return ApiSendingResponse::sendingResponse([
                'successMsg'=> __('auth.register.userWasSuccessfullyCreated'),
                'data'=>$user,
                'statusCode'=>Response::HTTP_CREATED
            ]);
        }catch(\Exception $e){
            return ApiSendingErrorException::formatError($e);
        } 
    }

     /**
     * Update authenticate user
     * 
     * @param $userId
     * @param $data
     * 
     * @return $user
     */
    public static function update($data)
    {
        try{
            $user = auth()->user();

            if(!$user){
                return ApiSendingErrorException::sendingError([
                    'errNo'=>ApiErrorNumbers::$resource_not_found, 
                    'errMsg'=> __('auth.update.userNotExist'), 
                    'statusCode'=>Response::HTTP_NOT_FOUND
                ]);
            }

            // Prevent these fields from being updated
            $user->makeHidden('user_email');
            $user->makeHidden('user_type_id');
            $user->makeHidden('user_group_id');
            
            //Fill user with new data
            // Persist user record to database
            $user->fill($data);
            $user->save();
            
            return ApiSendingResponse::sendingResponse([
                'successMsg'=> __('auth.update.userUpdatedSuccessfully'),
                'data'=>$user,
                'statusCode'=>Response::HTTP_OK
            ]);
        }catch(\Exception $e){
            return ApiSendingErrorException::formatError($e);
        } 
    }
}