<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

class UserController extends Controller{

    public function userList(Request $request) //http://localhost:8000/users
    {   
        $sortBy = request('sort_by', 'id'); 
        $sortOrder = request('sort_order', 'asc');

        $users = User::select('id', 'firstName', 'lastName', 'email', 'created_at')
        ->orderBy($sortBy, $sortOrder)
        ->Paginate(16);

        $title = "Lista użytkowników";
        
        return view('users.usersList', [
            'users' => $users, 'title' => $title]);
    }

}