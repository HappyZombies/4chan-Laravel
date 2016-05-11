<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['author', 'comment', 'file', 'thread_id'];
    public function threads(){
        $this->belongsTo(Thread::class);
    }
}
