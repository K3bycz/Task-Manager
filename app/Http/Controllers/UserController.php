<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\TaskModel;
use App\Models\NotesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Http\Controllers\AchievementsController;
use App\Http\Controllers\CommentsController;

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
        $achievementsConnector = new AchievementsController();
        $achievements = $achievementsConnector->showAchievements();

        $commentsConnector = new CommentsController();
        $comments = $commentsConnector->showComments();
        
        $data = User::find(Auth::id());
        $avatar = $data->avatar;
        $profileBackground = $data->profileBackground;

        $countAll = TaskModel::all()
        ->where('user_id',  Auth::id())
        ->count();

        $countDone = TaskModel::all()
        ->where('user_id',  Auth::id())
        ->where('status','Zakończone')
        ->count();

        $countInProgress = TaskModel::all()
        ->where('user_id',  Auth::id())
        ->where('status','W trakcie')
        ->count();

        $countNotes = NotesModel::all()
        ->where('user_id',  Auth::id())
        ->count();

        $countProjects = NotesModel::all()
        ->where('user_id',  Auth::id())
        ->where('category', 'Projekty')
        ->count();

        $title = "Informacje o zalogowanym użytkowniku";

        return view('showUser', compact ('avatar', 'profileBackground', 'title', 'countAll', 'countDone', 'countInProgress', 'achievements', 'comments', 'countNotes', 'countProjects'));
    }

    public function updateUserAdress(Request $request)
    {
        $user = Auth::id();
        
        $validator = Validator::make(request()->all(), [
            'region' => 'nullable|regex:/^[a-zA-Z\ąćęłńóśźż\s\.]*$/ui|max:50',
            'city' => 'nullable|regex:/^[a-zA-Z\ąćęłńóśźż\s\.]*$/iu|max:50',
            'postcode' => 'nullable|regex:/^[0-9\-]*$/',
            'street' => 'nullable|regex:/^[a-zA-Z\ąćęłńóśźż\s\.]*$/ui|max:50',
            'housenumber' => 'nullable|regex:/^[a-zA-Z0-9\ąćęłńóśźż\s\/\\\\]*$/iu|max:50',
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
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'profileBackground' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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

        if ($request->hasFile('profileBackground')) {
            $file = $request->file('profileBackground');

            $profileBackground = file_get_contents($file);
            User::find($user)
            ->update(['profileBackground' => $profileBackground,
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

    public function ranking()
    {
        $users = User::select('id', 'firstName', 'lastName', 'email')
        ->get();
        
        $tasksRank = User::select('id', 'firstName', 'lastName', 'email', 'avatar')
            ->selectSub(function ($query) {
                $query->selectRaw('count(*)')
                    ->from('tasks_list')
                    ->whereColumn('users.id', 'tasks_list.user_id')
                    ->where('status', 'Zakończone');
            },  'tasks')
            ->orderByDesc('tasks')
            ->limit(13)
            ->get();
            
        $notesRank = User::select('id', 'firstName', 'lastName', 'email', 'avatar')
            ->withCount('notes')
            ->orderByDesc('notes_count')
            ->limit(13)
            ->get();
    
        return view('users.ranking', compact ('tasksRank', 'notesRank', 'users'));
    }
}