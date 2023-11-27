<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class UserController extends Controller{

    public function userList(Request $request)
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

    public function index()
    {  
        $data = User::find(Auth::id());
        $avatar = $data->avatar;
        $title = "Informacje o zalogowanym użytkowniku";

        return view('showUser', compact ('avatar', 'title'));
    }

    public function updateUserAdress(Request $request)
    {
        $user = Auth::id();
        $validator = Validator::make(request()->all(), [
            'region' => 'nullable|regex:/^[a-zA-Z\ąćęłńóśźż\s\.]*$/ui|max:50',
            'city' => 'nullable|regex:/^[a-zA-Z\ąćęłńóśźż\s\.]*$/iu|max:50',
            'postcode' => 'nullable|regex:/^[0-9\-]*$/',
            'street' => 'nullable|regex:/^[a-zA-Z\ąćęłńóśźż\s\.]*$/ui|max:50',
            'housenumber' => 'nullable|regex:/^[a-zA-Z0-9\ąćęłńóśźż\s]*$/iu|max:50',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect('user')
                ->withErrors($validator)
                ->withInput();
        }

        User::find($user)->update([
            'country' => request()->input('country'),
            'region' => request()->input('region'),
            'city' => request()->input('city'),
            'postcode' => request()->input('postcode'),
            'street' => request()->input('street'),
            'housenumber' => request()->input('housenumber'),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('user');
    }
    public function updateUserBio(Request $request)
    {
        $user = Auth::id();
        $validator = Validator::make(request()->all(), [
            'bio'=> 'required|regex:/^[0-9\a-zA-Z\ąćęłńóśźż\s\.]*$/ui|max:50'
        ]);

        if ($validator->fails()) {
            return redirect('user')
                ->withErrors($validator)
                ->withInput();
        }

        User::find($user)->update([
            'bio' => request()->input('bio'),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('user');
    }

    public function uploadAvatar(Request $request)
    {
        $user = Auth::id();
        $validator = Validator::make($request->all(), [
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect('user')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            $avatar = file_get_contents($file);
            User::find($user)
            ->update(['avatar' => $avatar,
            'updated_at' => Carbon::now()]);
        }

        return redirect('user');
    }
    
    public function showAddress()
    {   
        $address = User::select('city', 'postcode', 'street', 'housenumber')
        ->where('id', Auth::id())
        ->first();

        return response()->json($address);
    }
}