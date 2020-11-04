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
    public function index($userId,$boardId)
    {
        return view ('project.project', ["todos"=>Todo::all()->where(Board::where('boarId',$boardId))] );
    }

    public function store()
    {
        return back();
    }

}
