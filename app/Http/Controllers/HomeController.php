<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $FileConnector = new FileController();
        $avatar = $FileConnector ->viewAvatar();
        $title = "Informacje o zalogowanym użytkowniku";

        return view('showUser', compact ('avatar', 'title'));
    }
}
