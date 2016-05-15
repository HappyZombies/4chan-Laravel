<?php
namespace App\Traits;

trait FormatComment
{

    public function setCommentAttribute($value)
    {
        $this->attributes['comment'] = preg_replace('#[\r\n]+#', "\n", $value);
    }
}

