<?php

namespace App\Auth\Http\API\Controllers;

use App\Auth\Application\Read\GetAuthorizedUser\GetAuthorizedUserQuery;
use App\Auth\Application\UseCases\LoginUser\LoginUserCommand;
use App\Auth\Application\UseCases\RegisterUser\RegisterUserCommand;
use App\Auth\Http\API\Requests\LoginUserRequest;
use App\Auth\Http\API\Requests\RegisterUserRequest;
use App\Auth\Http\API\Resource\TokenResource;
use App\Auth\Http\API\Resource\UserAccountResource;
use App\Shared\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $token = $this->dispatcher->dispatchSync(new LoginUserCommand(
            ...$request->validated()
        ));
        
        Cookie::queue('token', $token->token, 60);

        return response()->created(new TokenResource($token));
    }

    public function register(RegisterUserRequest $request)
    {
        $token = $this->dispatcher->dispatchSync(new RegisterUserCommand(
            ...$request->validated()
        ));

        Cookie::queue('token', $token->token, 60);

        return response()->created(new TokenResource($token));
    }

    public function account(Request $request)
    {
        $user = $this->dispatcher->dispatchSync(new GetAuthorizedUserQuery());

        return response()->success(new UserAccountResource($user));
    }
}