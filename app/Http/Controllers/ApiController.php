<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ApiController extends Controller
{
     public function UsersApi()
    {
        $data = User::all();
        return response()->json($data);
    }
}
