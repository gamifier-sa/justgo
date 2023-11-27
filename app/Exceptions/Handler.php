<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
        if ($request->is('api/*')) {
            // Check if the request is for an API route

            if ($exception instanceof ValidationException) {
                return $this->convertValidationExceptionToResponse($exception, $request);
            }

            // Customize this part based on your needs
            $statusCode = $this->getStatusCode($exception);
            $errorCode = $exception->getCode() ?: $statusCode;
            $errorMessage = $exception->getMessage() ?: 'Internal Server Error';

            return response()->json([
                'error' => [
                    'code' => $errorCode,
                    'message' => $errorMessage,
                ],
            ], $statusCode);
        }
        
        return parent::render($request, $exception);
    }

    protected function getStatusCode(Throwable $exception)
    {
        if ($exception instanceof HttpException) {
            return $exception->getStatusCode();
        }

        return method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : 500;
    }
}
