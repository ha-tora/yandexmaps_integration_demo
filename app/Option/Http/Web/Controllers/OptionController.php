<?php

namespace App\Option\Http\Web\Controllers;

use App\Option\Application\Read\GetAllOptions\GetAllOptionsQuery;
use App\Shared\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OptionController extends Controller
{
    public function index(Request $request)
    {
        $options = $this->dispatcher->dispatchSync(new GetAllOptionsQuery());

        return Inertia::render('Options/Index', [
            'options' => $options
        ]);
    }
}