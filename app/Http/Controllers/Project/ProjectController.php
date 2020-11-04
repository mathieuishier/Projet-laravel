<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Board;
use App\Todo;
use Illuminate\Support\Facades\Auth;        // Need for get user login

class ProjectController extends Controller
{
    // COS VERSION
    public function index($connect, $boardId)
    {
        return view ('project.project', [$boardId]);
        //CED VERSION
        // return view ('project.project', ["todos"=>Todo::all()->where(Board::where('boarId',$boardId))] );

    }


    public function store(Request $request, $boardId)
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
