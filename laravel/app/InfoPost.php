<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPost extends Model
{
    protected $fillable = [
        'post_id',
        'post_status',
        'comment_status'
    ];

    public function Post() {
        return $this->belongsTo('App\Post');
    }
    

    
    public $timestamps = false;
}
