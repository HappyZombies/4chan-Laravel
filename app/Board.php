<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Board extends Model
{
    protected $fillable = ['board_url', 'board_name'];
    public function threads(){
        return $this->hasMany(Thread::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }
    public function getRouteKeyName()
    {
        return "board_url";
    }
}
