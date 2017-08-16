<?php

use App\Exceptions;
use Illuminate\Validation;
use Symfony\Component\HttpKernel\Exception;

return [
    Validation\ValidationException::class
        => Handlers\ValidationHandler::class,

    Exception\UnauthorizedHttpException::class
        => Handlers\UnauthorizedHandler::class,

    Exception\MethodNotAllowedHttpException::class
        => Handlers\MethodNotAllowedHandler::class,

    Exception\HttpException::class
        => Handlers\HttpHandler::class,

    "*" => Handlers\WhoopsHandler::class,
];
