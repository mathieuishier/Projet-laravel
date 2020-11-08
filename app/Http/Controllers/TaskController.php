<?php

namespace App\Http\Controllers;

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


    public function store(Request $request, $todo_id)
    {
        $request->validate(
            [
                'taskContent' => 'required',
            ]);

            $tk = new Task();
                // $tk->ownerId = Auth::User()->id;
                $tk->taskContent=$request->taskContent;
                $tk->todo_id=$todo_id;
            $tk->save();

            return back();
        }

}
