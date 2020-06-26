<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $primaryKey = "id_threads";

    public function user(){
    
        return $this->belongsTo('App\User','id_users');
    }

    protected $fillable = [
        'id_users', 'threads',
    ];
}
