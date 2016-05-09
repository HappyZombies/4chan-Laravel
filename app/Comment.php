<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function threads(){
        $this->belongsTo(Thread::class);
    }
    public function scopeOfThread($query, $thread_id){
        return $query->where('thread_id', $thread_id);
    }
}
