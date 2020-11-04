<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Formcontroller extends Controller
{
    public function form()
    {
        return view('form.form');
    }

    public function store(Request $request)
    {

     echo $request->name;
     return back();

    }



}
