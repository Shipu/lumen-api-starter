<?php

return [
    Illuminate\Validation\ValidationException::class
        => App\Exceptions\Handlers\ValidationHandler::class,

    "*" => App\Exceptions\Handlers\WhoopsHandler::class,
];
