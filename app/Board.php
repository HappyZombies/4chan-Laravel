<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Board extends Model
{
    public function threads(){
        return $this->hasMany(Thread::class);
    }
}
