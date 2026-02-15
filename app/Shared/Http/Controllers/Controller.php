<?php

namespace App\Shared\Http\Controllers;

use Illuminate\Contracts\Bus\Dispatcher;

abstract class Controller
{
    public function __construct(
        protected Dispatcher $dispatcher,
    ) {}
}
