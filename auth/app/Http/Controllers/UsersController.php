<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $users = Users::get();
        return response()->json($users, 201);
    }
}
