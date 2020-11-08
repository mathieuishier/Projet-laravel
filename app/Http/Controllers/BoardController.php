<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Board;
use App\Background;

// use Illuminate\Support\Facades\DB;
//      $board->user_id = DB::table('users')->select('id')->get();
// $uid = Auth::User()->id;

class BoardController extends Controller
{
    public function index()
    {
        $myBackground=  Background::all();

        return view ('board', ["boards"=>Board::all()->where('user_id', Auth::User()->id),"myBackground"=>$myBackground] );
    } // ('board', compact('boards'));

    public function store(Request $request)
    {
        $request->validate(
            [
                'boardName' => 'required',
                'background' => 'required',
            ]);

        $board=new Board();
            $board->user_id = Auth::User()->id;
            $board->boardName=$request->boardName;
            $board->background=$request->background;
        $board->save();

        return back();
    }

}
