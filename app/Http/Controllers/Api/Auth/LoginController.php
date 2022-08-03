<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function index(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['The provided credentials are incorrect.']
            ], 500);
        }

        $userToken = $user->createToken('api-token')->plainTextToken;
    
        return response(['token' => $userToken], 200);
    }
}
