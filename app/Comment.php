<?php

namespace App;

use App\Traits\FormatComment;
use App\Traits\SaveUploadedFileImage;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use SaveUploadedFileImage,FormatComment;
    
    protected $fillable = ['author', 'comment', 'file', 'thread_id'];
    public function threads(){
        return $this->belongsTo(Thread::class);
    }
}
