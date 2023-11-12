<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

class UserController extends Controller{

    public function userList(Request $request) //http://localhost:8000/users
    {
        $users = User::select('id', 'firstName', 'lastName', 'email', 'created_at')   //Model
        ->get();
        $title = "Lista użytkowników";
        
        return view('users.usersList', [
            'users' => $users, 'title' => $title]);
    }

}