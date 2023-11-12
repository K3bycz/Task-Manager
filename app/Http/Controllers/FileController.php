<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;

class FileController extends Controller
{
    
    public function upload(Request $request)
    {
        $user = Auth::id();

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            $avatar = file_get_contents($file);
                User::find($user)
                ->update(['avatar' => $avatar,
                'updated_at' => Carbon::now(),]);
                
        return redirect('user');

        } else {
            return redirect('user')->with('error', 'Błąd!');
        }
    }

    public function viewAvatar()
    {
        $user = Auth::id();
        $UserData = User::find($user);
        
        $avatarData= $UserData->avatar;
        $avatar=['avatar', $avatarData];
        view()->share($avatar);

        return $avatarData;
    }
}