<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Board;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class ThreadController extends Controller
{
    //We need to implement DRY
    public function store($board_id, Request $request){
        $this->validate($request, array(
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
        $thread = $board->threads()->save(new Thread([
            'author'=>$author,
            'title'=>$request->input('title'),
            'comment'=>$comment,
            'file'=>$fileName,
        ]));
        Input::file('file')->move('uploads', $fileName);
        return redirect("/board/{$board->board_url}/thread/{$thread->id}"); //redirect to thread made.
    }

    public function comment($thread_id, Request $request){
        $this->validate($request, array(
            'file' => 'image',
            'title'=> 'max:30',
            'author'=>'max:30',
            'comment' => 'required|max:2000',
        ));
        $now = date('Y-m-d H:i:s', strtotime('now'));
        $author = empty($request->input('author')) ? "Anonymous" : $request->input('author');
        $comment =  preg_replace('#[\r\n]+#', "\n", $request->input('comment'));
        $fileName = empty(Input::file('file')) ? "" : Input::file('file');
        if(!empty($fileName)){
            $extension = Input::file('file')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            Input::file('file')->move('uploads', $fileName);
        }
        $thread = Thread::findOrFail($thread_id);
        $thread->comments()->save(new Comment([
            'author'=>$author,
            'comment'=>$comment,
            'file'=>$fileName,
        ]));
        $thread->updated_at = $now; //to bump thread.
        $thread->save();
        return back();
    }
}
