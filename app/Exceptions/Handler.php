<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
        $this->renderable(function (Throwable $e) {

            $data = [
                'status' => 500,
                'message' => $e->getMessage(),
            ];


            if($e instanceof ValidationException) {
                $data['errors'] = $e->getErrors();
                $data['status'] = $e->getCode() ?? 400;
            }

            if($e->getCode() === 1045){
                $data['message'] = 'Não foi possível estabelecer a conexão com o banco!';
            }

            return response()->json($data, $data['status']);
        });

    }
}
