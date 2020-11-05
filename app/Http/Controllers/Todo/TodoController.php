<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
use App\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
     // Need for get user login

class TodoController extends Controller
{
    public function index($user, $boardId)
    {
        $todoId=Todo::select('id')->get();

        $myTodo = DB::table('todos')->where('boardLink', $boardId)->get();
        $myTask= DB::table('tasks')->where('todoLink',$todoId)->get();


        return view ('todo.todo', ['boardId'=>$boardId,"myTodo"=>$myTodo,"myTask"=>$myTask]);

    }


    public function store(Request $request, $user, $boardId)
    {
        $td = new Todo();                         // Step1 > Create
                                                // Step2 > Loadin data
        $td->ownerId = Auth::User()->id;         //  from user login
        $td->todoName=$request->todoName;
        $td->boardLink=$boardId;

        $td->save();                             // Step3 > Push in Table

        return back();
    }

}
