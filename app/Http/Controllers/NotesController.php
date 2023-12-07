<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\Hello;

class NotesController extends Controller
{
   public function index(){

    return view('notes.notesList');
   }
}
