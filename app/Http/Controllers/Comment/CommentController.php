<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Comment;

use Illuminate\Support\Facades\Auth;        // Need for get user login

class CommentController extends Controller
{
    // public function index()
    // {
    //     return view ('task.task');
    // }


    public function store(Request $request, $user, $boardId, $taskLink)
    {
        $request->validate(
            [
                'comment' => 'required',
            ]);
            
            $com = new Comment();                         // Step1 > Create
                                                    // Step2 > Loadin data
            $com->ownerId = Auth::User()->id;         //  from user login
            $com->comment=$request->comment;
            $com->taskLink=$taskLink;

            $com->save();                             // Step3 > Push in Table
            return back();
        }

}
