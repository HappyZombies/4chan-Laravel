<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['title', 'author', 'comment', 'file', 'board_id'];
    public function boards(){
        $this->belongsTo(Board::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
