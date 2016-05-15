<?php

namespace App;

use App\Traits\FormatComment;
use App\Traits\SaveUploadedFileImage;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use SaveUploadedFileImage,FormatComment;
    
    protected $fillable = ['title', 'author', 'comment', 'file', 'board_id'];
    public function boards(){
        $this->belongsTo(Board::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
