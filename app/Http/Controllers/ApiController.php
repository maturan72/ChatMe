<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class ApiController extends Controller
{
     public function UsersApi()
    {
        $data = Users::all();
        return response()->json($data);;
    }
}
