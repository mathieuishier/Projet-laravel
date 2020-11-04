<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Todo;

use Illuminate\Support\Facades\Auth;        // Need for get user login

class ProjectController extends Controller
{
    public function index($connect, $boardId)
    {
        return view ('project.project', [$boardId]);
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
