<?php

// namespace App\Http\Controllers\Todo;
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
use App\Todo;
use App\Comment;
use App\Background;
use App\Board;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
     // Need for get user login

class TodoController extends Controller
{
    public function index($boardId)
    {
        // $myTodo = DB::table('todos')->where('boardLink', $boardId)->get();
        // $myTodo = Todo::where('boardLink', $boardId)->get()->pluck('id')->toArray();
        //table all id from Todo
        // $myTask= DB::table('tasks')->get();
        // $myComment= DB::table('comments')->get();

        $myBoard= Board::all();
        $myTodo = Todo::where('boardLink', $boardId)->get();            // apres le Get >> Collection
        $myTask=  Task::all();
        $myComment= Comment::all();
        $myBackground= Background::all();

        return view ('todo', ['boardId'=>$boardId,"myBoard"=>$myBoard,"myTodo"=>$myTodo,"myTask"=>$myTask,"myComment"=>$myComment,"myBackground"=>$myBackground]);

    }

    public function store(Request $request, $boardId)
    {

        $request->validate(
            [
                'todoName' => 'required',
            ]);

        $td = new Todo();                         // Step1 > Create                                   // Step2 > Loadin data
        $td->ownerId = Auth::User()->id;         //  from user login
        $td->todoName=$request->todoName;
        $td->boardLink=$boardId;
        $td->save();                             // Step3 > Push in Table

        return back();
    }

}
