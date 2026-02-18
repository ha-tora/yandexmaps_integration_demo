<?php

namespace App\Auth\Http\Web\Controllers;

use App\Shared\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return Inertia::render('Auth/Login');
    }

    
    public function register(Request $request)
    {
        return Inertia::render('Auth/Register');
    }
}