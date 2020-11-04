<?php

namespace App\Http\Controllers\Board;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Board;
use App\User;
use Illuminate\Support\Facades\DB;


class BoardController extends Controller
{
    public function index()
    {

        return view ('board.board',["boards"=>Board::all(),"users"=>User::all()] );

    }



    public function store(Request $request)
    {

      $board=new Board();
    //   $board->ownerId=DB::table('users')->select('id');
      $board->boardName=$request->boardName;
      $board->save();
      return back();
    }

}
