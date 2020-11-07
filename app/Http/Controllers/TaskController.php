<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
// VERIF SI TASK OU TODO
use App\Task;

use Illuminate\Support\Facades\Auth;        // Need for get user login

class TaskController extends Controller
{
    // public function index()
    // {
    //     return view ('task.task');
    // }


    public function store(Request $request, $boardId, $todoLink)
    {
        $request->validate(
            [
                'taskContent' => 'required',
            ]);

            $tk = new Task();                         // Step1 > Create
                                                    // Step2 > Loadin data
            $tk->ownerId = Auth::User()->id;         //  from user login
            $tk->taskContent=$request->taskContent;
            $tk->todoLink=$todoLink;

            $tk->save();                             // Step3 > Push in Table
            return back();
        }

}
