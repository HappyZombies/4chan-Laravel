<?php

namespace App\Http\Controllers;

use App\Board;
use App\Thread;
use App\Http\Requests\ThreadRequest;
use App\Http\Requests\CommentRequest;

class ThreadController extends Controller
{
    public function store(ThreadRequest $request, Board $board){

        $thread = $board->threads()->create(array_filter($request->all()));

        return redirect("/board/{$board->board_url}/thread/{$thread->id}");
    }

    public function comment(CommentRequest $request, Thread $thread){
        
        $thread->comments()->create(array_filter($request->all()));

        $thread->touch();
        
        return back();
    }
}
