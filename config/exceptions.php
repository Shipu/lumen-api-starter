<?php

return [
    Illuminate\Validation\ValidationException::class
        => App\Exceptions\Handlers\ValidationHandler::class,

    Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException::class
        => App\Exceptions\Handlers\UnauthorizedHandler::class,

    "*" => App\Exceptions\Handlers\WhoopsHandler::class,
];
