<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Project;

use Illuminate\Support\Facades\Auth;        // Need for get user login

class ProjectController extends Controller
{
    public function index()
    {
        return view ('project.project', );
    }


    public function store()
    {
        return back();
    }

}
