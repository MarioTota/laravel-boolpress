<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'post_id',
        'testo',
        'autore'
    ];
     public function Post() {
        return $this->belongsTo('App\Post');
    }
}
