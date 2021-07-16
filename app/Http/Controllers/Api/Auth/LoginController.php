<?php

namespace App\Http\Controllers\Api\Auth;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            if (Auth::attempt($credentials)) {
                // Authentication was successful...
            }
        }catch (Exception $exception){

        }
    }
}
