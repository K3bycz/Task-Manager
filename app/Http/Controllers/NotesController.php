<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use App\Models\NotesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class NotesController extends Controller
{
   public function index(){

      $notes = NotesModel::select('created_at', 'title', 'category', 'description', 'attachments')
      ->where('user_id',  Auth::id())
      ->Paginate(15); 

      return view('notes.notesList', [
         'notes' => $notes]);
   }

   public function create(Request $request){
      $data = $request->all();

      $validator = Validator::make($data, [
          'title' => 'required|regex:/^[0-9\a-zA-Z\ąćęłńóśźż\s\.\-]*$/iu|max:50',
          'category' => 'required',
          'description' => 'nullable|regex:/^[0-9\a-zA-Z\ąćęłńóśźż\s\.\,\-]*$/iu|max:250',
          'attachments' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);

      if ($validator->fails()) {
          return redirect('/notes/list')
              ->withErrors($validator)
              ->withInput();
      }

      if ($request->hasFile('attachments')) {
         $file = $request->file('attachments');
         $fileName = $file->getClientOriginalName();
         $file->storeAs('attachments', Auth::user()->id . '-' . $fileName, 'public');

         NotesModel::create([
             'title' => $data['title'],
             'category' => $data['category'],
             'description' => $data['description'] ?? null, 
             'attachments' => Auth::user()->id. '-' .$fileName, // Zapisz lokalizację pliku
             'created_at' => now(),
             'updated_at' => now(),
             'user_id' => Auth::user()->id,
         ]);
     } else {
         NotesModel::create([
             'title' => $data['title'],
             'category' => $data['category'],
             'description' => $data['description'] ?? null, 
             'created_at' => now(),
             'updated_at' => now(),
             'user_id' => Auth::user()->id,
         ]);
     }
      return redirect()->route('notes.list')->with('success', 'Dodano notatke');
   }
}
