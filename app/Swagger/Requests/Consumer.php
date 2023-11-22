<?php

/**
 * Register Consumer
 *
 * @author Valentin magde <valentinmagde@gmail.com>
 * @since 2023-11-15
 *
 * @OA\Post(
 * path="/api/v2/consumers/register",
 * operationId="Register",
 * tags={"Consumer"},
 * summary="Consumer Register",
 * description="Consumer Register here",
 *   @OA\Parameter(
 *          name="lang",
 *          in="query",
 *          required=false,
 *          example="en",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *            mediaType="multipart/form-data",
 *            @OA\Schema(
 *               type="object",
 *               required={"email", "password", "password_confirmation"},
 *               @OA\Property(property="name", type="text", example="beachcomber"),
 *               @OA\Property(property="email", type="email", example="example@beachcomber.com"),
 *               @OA\Property(property="password", type="password", example="beachcomber"),
 *               @OA\Property(property="password_confirmation", type="password", example="beachcomber"),
 *            ),
 *        ),
 *        @OA\MediaType(
 *            mediaType="application/json",
 *            @OA\Schema(
 *               type="object",
 *               required={"email", "password", "password_confirmation", "name"},
 *               @OA\Property(property="name", type="text", example="beachcomber"),
 *               @OA\Property(property="email", type="email", example="example@beachcomber.com"),
 *               @OA\Property(property="password", type="password", example="beachcomber"),
 *               @OA\Property(property="password_confirmation", type="password", example="beachcomber")
 *            ),
 *        ),
 *    ),
 *   @OA\Response(
 *          response=201,
 *          description="Consumer created successfully",
 *          @OA\JsonContent(
 *               @OA\Property(property="successMsg", type="string", example="string"),
 *               @OA\Property(property="data", type="object",
 *                   ref="#/components/schemas/Consumer"
 *               ),
 *           )
 *       ),
 *       @OA\Response(
 *           response=400,
 *           description="Bad request",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=401,
 *           description="Unauthorized",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=404,
 *           description="Resource Not Found",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=500,
 *           description="Internal Server Error",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *    )
 */

/**
 * Get Authenticated Consumer
 *
 * @author Valentin magde <valentinmagde@gmail.com>
 * @since 2023-11-15
 *
 * @OA\Get(
 *      path="/api/v2/consumer/me",
 *      operationId="getProfile",
 *      tags={"Consumer"},
 *      summary="Get the logged in consumer",
 *      description="Returns current consumer",
 *      @OA\Parameter(
 *          name="lang",
 *          in="query",
 *          required=false,
 *          example="en",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Consumer successfully collects",
 *          @OA\JsonContent(
 *               @OA\Property(property="successMsg", type="string", example="string"),
 *               @OA\Property(property="data", type="object",
 *                   ref="#/components/schemas/Consumer"
 *               ),
 *           )
 *       ),
 *       security={
 *         {"bearer": {}}
 *       },
 *       @OA\Response(
 *           response=400,
 *           description="Bad request",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=401,
 *           description="Unauthorized",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=404,
 *           description="Resource Not Found",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=500,
 *           description="Internal Server Error",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *    )
 */

/**
 *
 * Delete Consumer
 *
 * @author Gregory Albert <gregoryalbert1209@gmail.com>
 * @since 2023-11-21
 *
 * @OA\Delete(
 *      path="/api/v2/consumer/{consumerId}/delete",
 *      operationId="deleteProfile",
 *      tags={"Consumer"},
 *      summary="Delete the consumer",
 *      description="Soft delete of the consumer by their ID",
 *      @OA\Parameter(
 *          name="lang",
 *          in="query",
 *          required=false,
 *          example="en",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *       @OA\Parameter(
 *          name="consumerId",
 *          in="path",
 *          required=true,
 *          example=1,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=204,
 *          description="Customer deleted successfully",
 *      ),
 *       security={
 *         {"bearer": {}}
 *       },
 *       @OA\Response(
 *           response=400,
 *           description="Bad request",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=401,
 *           description="Unauthorized",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=404,
 *           description="Resource Not Found",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=500,
 *           description="Internal Server Error",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *    )
 */

/**
 *
 * Restore Consumer
 *
 * @author Gregory Albert <gregoryalbert1209@gmail.com>
 * @since 2023-11-21
 *
 * @OA\Get(
 *      path="/api/v2/consumer/{consumerId}/restore",
 *      operationId="restoreProfile",
 *      tags={"Consumer"},
 *      summary="Restore the consumer",
 *      description="Restore the consumer by their ID",
 *      @OA\Parameter(
 *          name="lang",
 *          in="query",
 *          required=false,
 *          example="en",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *       @OA\Parameter(
 *          name="consumerId",
 *          in="path",
 *          required=true,
 *          example=1,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Consumer successfully collects",
 *          @OA\JsonContent(
 *               @OA\Property(property="successMsg", type="string", example="string"),
 *               @OA\Property(property="data", type="object",
 *                   ref="#/components/schemas/Consumer"
 *               ),
 *           )
 *       ),
 *       security={
 *         {"bearer": {}}
 *       },
 *       @OA\Response(
 *           response=400,
 *           description="Bad request",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=401,
 *           description="Unauthorized",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=404,
 *           description="Resource Not Found",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=500,
 *           description="Internal Server Error",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *    )
 */
/**
 *
 * Patch Consumer
 *
 * @author Gregory Albert <gregoryalbert1209@gmail.com>
 * @since 2023-11-21
 *
 * @OA\Patch(
 *      path="/api/v2/consumer/{consumerId}/patch",
 *      operationId="patchProfile",
 *      tags={"Consumer"},
 *      summary="Patch the consumer",
 *      description="Patch the consumer by their ID",
 *      @OA\Parameter(
 *          name="lang",
 *          in="query",
 *          required=false,
 *          example="en",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *       @OA\Parameter(
 *          name="consumerId",
 *          in="path",
 *          required=true,
 *          example=1,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *            mediaType="multipart/form-data",
 *            @OA\Schema(
 *                @OA\Property(property="id", type="integer", example="number"),
 *                @OA\Property(property="name", type="string", example="string"),
 *                @OA\Property(property="email", type="string", example="string"),
 *                @OA\Property(property="phone", type="string", example="string"),
 *                @OA\Property(property="password", type="string", example="string"),
 *                @OA\Property(property="active", type="integer", example="number")
 *         ),
 *      ),
 *      @OA\MediaType(
 *         mediaType="application/json",
 *            @OA\Schema(
 *                @OA\Property(property="id", type="integer", example="number"),
 *                @OA\Property(property="name", type="string", example="string"),
 *                @OA\Property(property="email", type="string", example="string"),
 *                @OA\Property(property="phone", type="string", example="string"),
 *                @OA\Property(property="password", type="string", example="string"),
 *                @OA\Property(property="active", type="integer", example="number")
 *            ),
 *         ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Consumer successfully collects",
 *          @OA\JsonContent(
 *               @OA\Property(property="successMsg", type="string", example="string"),
 *               @OA\Property(property="data", type="object",
 *                   ref="#/components/schemas/Consumer"
 *               ),
 *           )
 *       ),
 *       security={
 *         {"bearer": {}}
 *       },
 *       @OA\Response(
 *           response=400,
 *           description="Bad request",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=401,
 *           description="Unauthorized",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=404,
 *           description="Resource Not Found",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=500,
 *           description="Internal Server Error",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *    )
 */

/**
 * @OA\Put(
 *      path="/api/v2/consumer/{consumerId}/update",
 *      operationId="updateProfile",
 *      tags={"Consumer"},
 *      summary="Update the consumer",
 *      description="Update the consumer by their ID",
 *      @OA\Parameter(
 *          name="lang",
 *          in="query",
 *          required=false,
 *          example="en",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="consumerId",
 *          in="path",
 *          required=true,
 *          example=1,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *            mediaType="multipart/form-data",
 *            @OA\Schema(
 *               type="object",
 *               required={"id", "email", "password", "name"},
 *               @OA\Property(property="name", type="text"),
 *               @OA\Property(property="email", type="email"),
 *               @OA\Property(property="phone", type="text"),
 *               @OA\Property(property="password", type="password"),
 *               @OA\Property(property="active", type="number"),
 *            ),
 *        ),
 *        @OA\MediaType(
 *            mediaType="application/json",
 *            @OA\Schema(
 *               type="object",
 *               required={"id", "email", "password", "name"},
 *               @OA\Property(property="name", type="text"),
 *               @OA\Property(property="email", type="email"),
 *               @OA\Property(property="phone", type="text"),
 *               @OA\Property(property="password", type="password"),
 *               @OA\Property(property="active", type="number"),
 *            ),
 *        ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Consumer successfully updated",
 *          @OA\JsonContent(
 *               @OA\Property(property="successMsg", type="string", example="string"),
 *               @OA\Property(property="data", type="object",
 *                   ref="#/components/schemas/Consumer"
 *               ),
 *           )
 *       ),
 *       @OA\Response(
 *           response=400,
 *           description="Bad request",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=401,
 *           description="Unauthorized",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=404,
 *           description="Resource Not Found",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *       @OA\Response(
 *           response=500,
 *           description="Internal Server Error",
 *           @OA\JsonContent(
 *               @OA\Property(property="errNo", type="integer", example="number"),
 *               @OA\Property(property="errMsg", type="string", example="string"),
 *          )
 *       ),
 *      security={
 *         {"bearer": {}}
 *      }
 * )
 */
