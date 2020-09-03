<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        $username = $request->username;
        $password = $request->password;

        // $userdata = array(
        //     'username' => 'test',
        //     'password' => '123456'
        // );

        $user = Users::where('username', $username)->first();
        //$pw = Users::where('password', $password)->first();

        $header = [
            'x-alert-type' => 'error',
            'x-alert-message' => 'Username and password does not match'
        ];

        if (is_null($user)) {
            return response('error', 400)->withHeaders($header);
        }
        // else if (is_null($pw)) {
        //     return response('error', 400)->withHeaders($header);
        // }
        else return response('success');


        Auth::login($user);
    }

    public function authenticate()
    {
        return Auth::user();
    }
}
