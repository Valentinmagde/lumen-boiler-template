<?php

namespace App\Services;

use App\Models\Consumer;
use Exception;
use Illuminate\Support\Facades\Hash;

class ConsumerService
{
    
    /**
     * Get authenticate consumer
     * 
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     * 
     * @return mixed $consumer
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
     * Create a new concumer
     * 
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-15
     * 
     * @param mixed $data the consumer data
     * 
     * @return mixed $consumer
     */
    public static function register($data)
    {
        try{
            $data['password'] = Hash::make($data['password']);
            return Consumer::create($data);
        }catch(\Exception $e){
            throw new Exception($e->getMessage());
        } 
    }
}