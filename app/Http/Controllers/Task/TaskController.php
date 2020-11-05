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
    public function index()
    {
        return view ('task.task');
    }


    public function store()
    {
        return back();
    }

}
