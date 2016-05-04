<?php
//Home controller retrieves all our board information and other things.
namespace App\Http\Controllers;

use App\Board;
use App\Http\Requests;

class HomeController extends Controller
{
    public function index(){
        $boards = Board::all();
        return view('home.index')->with('boards', $boards);
    }
    public function rules(){
        return view('home.rules');
    }
}
