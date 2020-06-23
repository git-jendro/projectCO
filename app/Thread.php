<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'id_users', 'threads',
    ];

    public function threads(){
        return $this->belongsTo('App\User');
    }
}
