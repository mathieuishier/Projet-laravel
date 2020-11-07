<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;        // Need for get user login
use Illuminate\Http\Request;
use App\Board;
use App\background;

// use Illuminate\Support\Facades\DB;
//   $board->ownerId=DB::table('users')->select('id')->get();

// $uid = Auth::User()->id;
class BoardController extends Controller
{
    public function index()
    {

        $myBackground=  Background::all();

        return view ('board', ["boards"=>Board::all()->where('ownerId', Auth::User()->id),"myBackground"=>$myBackground] );
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'boardName' => 'required',
                'background' => 'required',
            ]);

        $board=new Board();                         // Step1 > Create
                                              // Step2 > Loadin data
        $board->ownerId = Auth::User()->id;         //  from user login
        $board->boardName=$request->boardName;
        $board->background=$request->background;

        $board->save();                             // Step3 > Push in Table

        return back();
    }

}
