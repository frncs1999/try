<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Contracts\Auth\Authenticatable;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        $username = $request->username;
        $password = $request->password;

        $user = Users::where('username', $username)->first();

        $header = [
            'x-alert-type' => 'error',
            'x-alert-message' => 'Username and password does not match'
        ];

        if (is_null($user)) {
            return response('Invalid username', 400)->withHeaders($header);
        }
        if (!Hash::check($password, $user->password)) {
            return response('Username and password does not match', 400)->withHeaders($header);
        }

        // $logged = (['id' => $user->id]);
        // Auth::loginUsingId($logged);

        Auth::attempt(['username' => $username, 'password' => $password]);

        // return response('success', 200);
        // return response(['Logged in' => Auth::check(), 'Credentials' => Auth::user()]);
        
        return response()->json(['auth' => Auth::check()]);
        // return response(['auth' => Auth::check()]);
    }

    public function index()
    {
        if (Auth::check() == true) return view('home');
        else return response(['Logged in' => Auth::check()]);
    }
}
