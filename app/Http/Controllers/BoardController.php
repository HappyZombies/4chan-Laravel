<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Thread;
use App\Comment;
use App\Http\Requests;

class BoardController extends Controller
{
    public function index(Board $board){
        $boards = $board->orderBy('board_url','asc')->paginate(50); //all boards, for menu
        return view('boards.index')->with('board', $board)->with('boards', $boards);
    }
    
    public function show(Board $board, Thread $thread){
        $boards = Board::orderBy('board_url', 'asc')->paginate(50); //all boards, for menu
        return view('boards.show')->with('boards', $boards)->with('board', $board)->with('thread', $thread);
    }
}
