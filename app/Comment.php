<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'id_comments';

    public function thread(){
        return $this->belongsTo('App\Thread','id_threads');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'id_threads', 'id_users', 'comments',
    ];
}
