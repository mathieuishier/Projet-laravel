<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;        // Need for get user login
use Illuminate\Http\Request;
use App\Board;

// use Illuminate\Support\Facades\DB;
//      $board->user_id = DB::table('users')->select('id')->get();
// $uid = Auth::User()->id;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::where('user_id', Auth::User()->id)->get();

        return view ('board', compact('boards'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'boardName' => 'required',
            ]);

        $board=new Board();
            $board->user_id = Auth::User()->id;
            $board->boardName=$request->boardName;
            $board->background=$request->background;
        $board->save();

        return back();
    }

}
