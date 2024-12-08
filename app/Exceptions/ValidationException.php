<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ValidationException extends Exception
{
    protected array $errors;
    protected $code = 400;

    public function __construct(string $message = "", int $code = 0, array $errors = [], ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }


    public function getErrors() : array{
        return $this->errors;
    }
}
