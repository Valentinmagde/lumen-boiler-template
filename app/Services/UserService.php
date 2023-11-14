<?php

namespace App\Services;

use Illuminate\Http\Response;
use App\Models\User;
use Exception;

class UserService
{
    
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
            $data['user_password'] = md5($data['user_password']);
            return User::create($data);
        }catch(\Exception $e){
            throw new Exception($e->getMessage());
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
        // try{
        //     $user = auth()->user();

        //     if(!$user){
        //         return ApiSendingErrorException::sendingError([
        //             'errNo'=>ApiErrorNumbers::$resource_not_found, 
        //             'errMsg'=> __('auth.update.userNotExist'), 
        //             'statusCode'=>Response::HTTP_NOT_FOUND
        //         ]);
        //     }

        //     // Prevent these fields from being updated
        //     $user->makeHidden('user_email');
        //     $user->makeHidden('user_type_id');
        //     $user->makeHidden('user_group_id');
            
        //     //Fill user with new data
        //     // Persist user record to database
        //     $user->fill($data);
        //     $user->save();
            
        //     return ApiSendingResponse::sendingResponse([
        //         'successMsg'=> __('auth.update.userUpdatedSuccessfully'),
        //         'data'=>$user,
        //         'statusCode'=>Response::HTTP_OK
        //     ]);
        // }catch(\Exception $e){
        //     return ApiSendingErrorException::formatError($e);
        // } 
    }
}