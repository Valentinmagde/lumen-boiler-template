<?php
// phpcs:disable Squiz.Commenting.FunctionComment.TypeHintMissing
namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param \Throwable $exception The object that describes the error to report or log.
     * @return void
     *
     * @throws \Exception The type of exception to throw.
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request The http request submitted.
     * @param \Throwable $exception The object that describes the error to render.
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable The type of exception to throw.
     */
    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {
            if ($exception instanceof PostTooLargeException) {
                return errorResponse(
                    Response::HTTP_BAD_REQUEST,
                    ERROR_CODE['GENERIC_ERROR'],
                    "Size of attached file should be less " . ini_get("upload_max_filesize") . "B"
                );
            }

            if ($exception instanceof ThrottleRequestsException) {
                return errorResponse(
                    Response::HTTP_TOO_MANY_REQUESTS,
                    ERROR_CODE['GENERIC_ERROR'],
                    "Too Many Requests,Please Slow Down"
                );
            }

            if ($exception instanceof ModelNotFoundException) {
                return errorResponse(
                    Response::HTTP_NOT_FOUND,
                    ERROR_CODE['RESOURCE_NOT_FOUND'],
                    'Entry for ' . str_replace('App\\', '', $exception->getModel()) . ' not found'
                );
            }

            // if ($exception instanceof NotFoundHttpException) {
            //     return errorResponse(
            //         Response::HTTP_NOT_FOUND,
            //         ERROR_CODE['RESOURCE_NOT_FOUND'],
            //         $exception->getMessage()
            //     );
            // }

            if ($exception instanceof ValidationException) {
                return errorResponse(
                    Response::HTTP_PRECONDITION_FAILED,
                    ERROR_CODE['GENERIC_ERROR'],
                    $exception->errors()
                );
            }

            if ($exception instanceof QueryException) {
                return errorResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR,
                    ERROR_CODE['GENERIC_ERROR'],
                    $exception->getMessage()
                );
            }

            if ($exception instanceof HttpResponseException) {
                // $exception = $exception->getResponse();
                return errorResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR,
                    ERROR_CODE['GENERIC_ERROR'],
                    $exception->getResponse()
                );
            }
            
            if ($exception instanceof \Error) {
                return errorResponse(
                    Response::HTTP_INTERNAL_SERVER_ERROR,
                    ERROR_CODE['GENERIC_ERROR'],
                    $exception->getMessage()
                );
            }
        }

        return parent::render($request, $exception);
    }
}
