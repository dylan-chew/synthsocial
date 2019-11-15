<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
