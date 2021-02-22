<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPost extends Model
{
     protected $fillable = [
         'post_id',
        'commenti'
    ];

    public function Post() {
        return $this->belongsTo('App\Post');
    }
}
