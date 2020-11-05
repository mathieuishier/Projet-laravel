<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Project;

use Illuminate\Support\Facades\Auth;        // Need for get user login

class TodoController extends Controller
{
    public function index()
    {
        return view ('todo.todo');
    }


    public function store()
    {
        return back();
    }

}
