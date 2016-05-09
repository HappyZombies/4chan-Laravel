<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Board;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class ThreadController extends Controller
{
    public function store($board_id, Request $request){
        $this->validate(request(), array(
            'file' => 'required|image',
            'title'=> 'max:30',
            'author'=>'max:30',
            'comment' => 'required|max:2000',
        ));

        $author = empty($request->input('author')) ? "Anonymous" : $request->input('author');
        $extension = Input::file('file')->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
        $board = Board::findOrFail($board_id);
        $comment =  preg_replace('#[\r\n]+#', "\n", $request->input('comment'));
        $board->threads()->save(new Thread([
            'author'=>$author,
            'title'=>$request->input('title'),
            'comment'=>$comment,
            'file'=>$fileName,
        ]));
        Input::file('file')->move('uploads', $fileName);
        return back(); //redirect to thread made.
    }
}
