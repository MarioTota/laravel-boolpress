<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $with = ['infoPost', 'comments', 'tags'];
    protected $fillable = [
        'titolo',
        'slug',
        'sottotitolo',
        'testo',
        'autore',
        'immagine',
        'data_pubblicazione'
    ];
    
    public function infoPost() {
        return $this->hasOne('App\InfoPost');
    }
    public function comments() {
        return $this->hasMany('App\Comment');
    }
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
