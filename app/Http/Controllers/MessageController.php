<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Users;
use DB;

class MessageController extends Controller
{
  
  
    public function store(Request $request)
    {
      
       
        $Message = new Messages;
        $Message->SenderId = $request->input('sender');
        $Message->RecieverId = $request->input('reciever');
        $Message->Message = $request->input('message');
        $Message->save();


      
       
        return redirect('/home');
        
    }

  
    public function destroy($id)
    {
        //
    }
}
