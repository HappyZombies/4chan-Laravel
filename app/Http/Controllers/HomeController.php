<?php
//Home controller retrieves all our board information and other things.
namespace App\Http\Controllers;

use App\Board;
use App\Http\Requests;

class HomeController extends Controller
{
    public function index(){
        $boards = Board::all();
        return view('welcome')->with('boards', $boards);
    }
    public function show($board_url){
        if(is_numeric($board_url)){
            return redirect(Board::where('id', $board_url)->first()->board_url);
        }
        $board = Board::where('board_url', $board_url)->first();
        return view('show')->with('board', $board);
    }
}
