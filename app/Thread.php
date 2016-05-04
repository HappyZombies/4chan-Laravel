<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['title', 'author', 'comment', 'image'];
    public function board(){
        return $this->belongsTo(Board::class);
    }
}
