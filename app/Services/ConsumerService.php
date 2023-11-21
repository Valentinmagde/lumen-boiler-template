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
     * @param array $data The consumer data to store.
     *
     * @return mixed $consumer
     */
    public static function register(array $data)
    {
        try {
            $data['password'] = Hash::make($data['password']);
            return Consumer::create($data);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Soft deletes a consumer
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param integer $consumerId The ID of the consumer to be deleted.
     *
     * @return Consumer deleted consumer data
     */
    public function softDelete(int $consumerId)
    {
        try {
            $consumer = Consumer::find($consumerId);
            if ($consumer) {
                return $consumer->delete();
            } else {
                throw new Exception(t("consumer.notFound"));
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Restores a deleted consumer
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param integer $consumerId The ID of the consumer to be restored.
     * @return Consumer restored consumer data
     */
    public function restore(int $consumerId)
    {
        try {
            $consumer = Consumer::withTrashed()->find($consumerId);
            if ($consumer->trashed()) {
                $consumer->restore();
                return $consumer;
            }
            return null;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Updates consumer data.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param integer $consumerId The ID of the consumer to be updated.
     * @param array $data The consumer data to store.
     * @return Consumer updated consumer data
     */
    public function update(int $consumerId, array $data)
    {
        try {
            $data['password'] = Hash::make($data['password']);
            $consumer = Consumer::where('id', $consumerId);
            $consumer->update(['name'=>$data['name']]);
            return $consumer;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
