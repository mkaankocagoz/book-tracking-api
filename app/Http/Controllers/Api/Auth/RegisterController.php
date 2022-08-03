<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(RegisterRequest $request){

        if (! Gate::allows('access-admin')) {
            abort(403, 'Unauthorized action.');
        }

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    
        return response(['message' => 'Yeni kullanıcı başarıyla kaydedildi.'], 200);
    }
}
