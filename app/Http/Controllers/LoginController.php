<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
      
        session_start(); 
        $_SESSION["username"] = '';
        $_SESSION["id"] = '';
        return view('login');
    }

    public function login (Request $request) 
    {
        session_start(); 
        $users = Users::all();
        
        foreach ($users as $user) {
            if  
            (
            $user->username ==  $request->input('username') and 
            password_verify($request->input('password'), $user->password_hash)
            ) 
            {

            $_SESSION["username"] = $user->username;
            $_SESSION["id"] = $user->id;

            return redirect('/home');
            //return redirect()->action([AppController::class, 'index']);
            } else {
              return  view('login', ['error' => 'User & Password incorrect']);
            }
            
        }
    }

   
}
