<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'titolo',
        'autore',
        'testo',
        'categoria'
    ];
    public function infoPost() {
        return $this->hasOne('App\InfoPost');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
