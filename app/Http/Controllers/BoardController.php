<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Thread;
use App\Comment;
use App\Http\Requests;

class BoardController extends Controller
{
    public function index($board_url){
        if(is_numeric($board_url)){
            return redirect(Board::where('id', $board_url)->first()->board_url);
        }
        $board = Board::where('board_url', $board_url)->first(); //this board
        $boards = Board::orderBy('board_url', 'asc')->paginate(50); //all boards, for menu
        $threads = Thread::ofBoard($board->id)->orderBy('id', 'desc')->paginate(5); //all threads on this board.
        $comments = new Comment();
        return view('boards.index')->with('board', $board)->with('boards', $boards)->with('threads', $threads)->with('comments', $comments);
    }
    
    public function show($board_url, $thread_id){
        $board = Board::where('board_url', $board_url)->first();
        $boards = Board::orderBy('board_url', 'asc')->paginate(50); //all boards, for menu
        $matchThese = ['board_id' => $board->id, 'id'=>$thread_id];
        $thread = Thread::where($matchThese)->first();
        $comments = new Comment();
        return view('boards.show')->with('board', $board)->with('boards', $boards)->with('thread', $thread)->with('comments', $comments);
    }
}
