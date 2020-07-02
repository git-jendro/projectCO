<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'id_comments';

    public function thread(){
        return $this->belongsTo('App\Thread');
    }

    public function users(){
        return $this->belongsTo('App\User','id_users');
    }

    protected $fillable = [
        'id_threads', 'id_users', 'comments','status',
    ];
}
