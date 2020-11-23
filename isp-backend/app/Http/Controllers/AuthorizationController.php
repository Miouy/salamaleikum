<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorizationController extends Controller
{

    public function managerLogin(Request $request){
        $request->validate([
            'manager_email' => ['required'],
            'manager_password' => ['required']
        ]);

        if(Auth::attempt($request->only('manager_email', 'manager_password'))){
            return response()->json(Auth::user(), 200);
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.']
        ]);
    }

    public function advisorLogin(Request $request){
        $request->validate([
            'advisor_email' => ['required'],
            'advisor_password' => ['required']
        ]);

        if(Auth::guard('advisor')->attempt($request->only('advisor_email', 'advisor_password'))){
            return response()->json(Auth::user(), 200);
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.']
        ]);
    }

    public function logout()
    {
        Auth::logout();
    }
}
