<?php

namespace App\Shared\Infrastructure\Exceptions;

use App\Shared\Application\Exceptions\UnauthorizedException;
use App\Shared\Domain\Exceptions\BaseException;
use App\Shared\Domain\Exceptions\InvalidValueException;
use App\Shared\Domain\Exceptions\NotFoundException;
use App\Shared\Http\Exceptions\BadRequestException;
use Illuminate\Contracts\Debug\ExceptionHandler as ExceptionHandlerContract;

class ExceptionHandler extends \Illuminate\Foundation\Exceptions\Handler implements ExceptionHandlerContract
{
    public function render($request, \Throwable $e)
    {
        if ($e instanceof BaseException && $request->is('api/*')) {
            return response()->error(
                $e->getData(),
                match (true) {
                    $e instanceof BadRequestException => 400,
                    $e instanceof UnauthorizedException => 401,
                    $e instanceof NotFoundException => 404,
                    $e instanceof InvalidValueException => 422,
                },
                $e->getMessage()
            );
        }

        return parent::render($request, $e);
    }
}
