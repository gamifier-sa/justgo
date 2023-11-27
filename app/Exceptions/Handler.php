<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($exception, $request);
        }

        // Customize this part based on your needs
        $statusCode = method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : 500;
        $errorCode = $exception->getCode() ?: $statusCode;
        $errorMessage = $exception->getMessage() ?: 'Internal Server Error';

        return response()->json([
            'error' => [
                'code' => $errorCode,
                'message' => $errorMessage,
            ],
        ], $statusCode);
    }
}
