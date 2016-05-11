<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use App\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class ThreadController extends Controller
{
    public function store(Board $board, Request $request){
        $this->validate($request, array(
            'file' => 'required|image',
            'title'=> 'max:30',
            'author'=>'max:30',
            'comment' => 'required|max:2000',
        ));
        $author = empty($request->input('author')) ? "Anonymous" : $request->input('author'); //db ?
        $fileName = $this->addImage();
        $thread = $board->threads()->save(new Thread([
            'author'=>$author,
            'title'=>$request->input('title'),
            'comment'=>preg_replace('#[\r\n]+#', "\n", $request->input('comment')),
            'file'=>$fileName,
        ]));
        return redirect("/board/{$board->board_url}/thread/{$thread->id}");
    }

    public function comment(Thread $thread, Request $request){
        $this->validate($request, array(
            'file' => 'image',
            'title'=> 'max:30',
            'author'=>'max:30',
            'comment' => 'required|max:2000',
        ));
        $now = date('Y-m-d H:i:s', strtotime('now'));
        $author = empty($request->input('author')) ? "Anonymous" : $request->input('author');
        $fileName = $this->addImage();
        $thread->comments()->save(new Comment([
            'author'=>$author,
            'comment'=>preg_replace('#[\r\n]+#', "\n", $request->input('comment')),
            'file'=>$fileName,
        ]));
        $thread->updated_at = $now; //to bump thread.
        $thread->save();
        return back();
    }

    private function addImage(){
        $fileName = empty(Input::file('file')) ? "" : Input::file('file'); // db ?
        if(!empty($fileName)){
            $extension = Input::file('file')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            Input::file('file')->move('uploads', $fileName);
        }
        return $fileName;
    }
}
