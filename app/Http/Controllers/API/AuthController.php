<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

class AuthController extends Controller {

    public function login(Request $request){
        $credentials = $request->only(['ic', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Incorrect IC Number/Password'], 401);
        }

        return response()->json(['token' => $token]);
    }
}
