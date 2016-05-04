<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Http\Requests;

class BoardController extends Controller
{
    public function show($board_url){
        if(is_numeric($board_url)){
            return redirect(Board::where('id', $board_url)->first()->board_url);
        }
        $board = Board::where('board_url', $board_url)->first();
        $boards = Board::all();
        return view('boards.show')->with('board', $board)->with('boards', $boards);
    }
}
