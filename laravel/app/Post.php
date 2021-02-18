<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function infoPost() {
        return $this->hasOne('App/InfoPost');
    }
}
