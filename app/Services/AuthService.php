<?php

namespace App\Services;

use App\Models\Consumer;
use Exception;
use Illuminate\Support\Facades\Hash;
use stdClass;

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
            $consumer = Consumer::where('email', $data['email'])
                ->get(['id', 'name', 'password'])
                ->first();

            if (
                $consumer &&
                $consumer->makeVisible(['password']) &&
                Hash::check($data['password'], $consumer->password)
            ) {
                $token = auth()
                    ->claims([
                        'consumer' => $consumer->makeHidden(['password']),
                        'roles' => array()
                    ])
                    ->login($consumer);
            } else {
                throw new Exception(t('auth.incorrectUserEmailOrPassword'));
            }

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
        try {
            auth()->logout();

            return null;
        } catch (\Exception $e) {
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
        try {
            return auth()->refresh();
        } catch (\Exception $e) {
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
