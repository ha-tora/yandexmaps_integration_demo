<?php

namespace App\Option\Http\API\Controllers;

use App\Option\Application\Read\GetAllOptions\GetAllOptionsQuery;
use App\Option\Application\UseCases\UpdateOptions\UpdateOptionsCommand;
use App\Option\Http\API\Requests\UpdateOptionsRequest;
use App\Option\Http\API\Resources\OptionResourceCollection;
use App\Shared\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index(Request $request)
    {
        $options = $this->dispatcher->dispatchSync(new GetAllOptionsQuery());

        return response()->success(new OptionResourceCollection($options));
    }

    public function update(UpdateOptionsRequest $request)
    {
        $options = $this->dispatcher->dispatchSync(new UpdateOptionsCommand(
            $request->validated()
        ));

        return response()->success(new OptionResourceCollection($options));
    }
}
