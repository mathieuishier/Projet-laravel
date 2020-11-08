<?php

// namespace App\Http\Controllers\Todo;
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Todo;
use App\Task;
use App\Comment;
use App\Background;
use App\Board;


class TodoController extends Controller
{
    public function show($board_id)
    {
        $myTodo = Todo::where('board_id', $board_id)->get();            // apres le Get >> Collection
        $myBoard= Board::all();
        $myTask=  Task::all();
        $myComment= Comment::all();
        $myBackground= Background::all();

        return view ('todo', ['board_id'=>$board_id,"myBoard"=>$myBoard,"myTodo"=>$myTodo,"myTask"=>$myTask,"myComment"=>$myComment,"myBackground"=>$myBackground]);

    }

    public function store(Request $request, $board_id)
    {

        $request->validate(
            [
                'todoName' => 'required',
            ]);

        $td = new Todo();
            // $td->ownerId = Auth::User()->id;
            $td->todoName=$request->todoName;
            $td->board_id=$board_id;
        $td->save();

        return back();
    }

}


        // $myTodo = DB::table('todos')->where('board_id', $board_id)->get();
        // $myTodo = Todo::where('board_id', $board_id)->get()->pluck('id')->toArray();
        //table all id from Todo
        // $myTask= DB::table('tasks')->get();
        // $myComment= DB::table('comments')->get();

