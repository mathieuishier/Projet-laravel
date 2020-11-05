<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\User;
// use App\Board;
use App\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
     // Need for get user login

class ProjectController extends Controller
{
    // COS VERSION
    public function index($connect, $boardId)
    {

        $myTodo = DB::table('todos')->where('boardLink', $boardId)->get();

    //  dd($myTodo);

        return view ('project.project', ['boardId'=>$boardId,"myTodo"=>$myTodo]);

        //CED VERSION
        // return view ('project.project', ["todos"=>Todo::all()->where(Board::'boarId',$boardId))] );

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
