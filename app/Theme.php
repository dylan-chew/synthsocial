<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'cdn', 'last_modified_by', 'deleted_by', 'is_default', 'created_by'
    ];


    function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
