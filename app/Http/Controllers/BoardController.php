<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Thread;
use App\Http\Requests;

class BoardController extends Controller
{
    public function show($board_url){
        if(is_numeric($board_url)){
            return redirect(Board::where('id', $board_url)->first()->board_url);
        }
        $board = Board::where('board_url', $board_url)->first(); //this board
        $boards = Board::all(); //all boards
        $threads = Thread::where('board_id', $board->id)->paginate(5); //all threads
        return view('boards.show')->with('board', $board)->with('boards', $boards)->with('threads', $threads);
    }
}
