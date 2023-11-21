<?php

namespace App\Services;

use Illuminate\Http\Response;
use App\Models\User;
use Exception;

class UserService
{
    /**
     * Create a new user
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @param array $data The user data to store.
     *
     * @return $user
     */
    public static function register(array $data)
    {
        try {
            $data['user_password'] = md5($data['user_password']);
            return User::create($data);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Fetch user data using their ID
      *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param integer $id ID of user to fetch.
     * @return User data
     */
    public static function getByID(int $id)
    {
        try {
            return User::find($id)->first();
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

     /**
     * Update authenticate user
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     *
     * @param integer $userId The user id.
     * @param array $data The user data.
     *
     * @return void
     */
    public static function update(int $userId, array $data)
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
