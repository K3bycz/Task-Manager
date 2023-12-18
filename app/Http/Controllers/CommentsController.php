<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\Hello;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\CommentsModel;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function saveComment(Request $request){

        $validator = Validator::make(request()->all(), [
            'comment' => 'required|regex:/^[0-9\a-zA-Z\ąćęłńóśźż\s\.\,\-\/\\\\]*$/ui|max:300',
        ]);

        if ($validator->fails()) {
            return redirect('user')
                ->withErrors($validator)
                ->withInput();
        }

        CommentsModel::create([
            'content' => request()->input('comment'),
            'user_id' => Auth::id(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('user');
    }

    public function showComments(){
        $comments = CommentsModel::where(
            'user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->Paginate(3);
          
        return $comments;
    }

    public function deleteComment($comment_id){
        CommentsModel::find($comment_id)
            ->delete();

        return redirect('user')->with('success', 'Komentarz został usunięty.');
    }
    
}
