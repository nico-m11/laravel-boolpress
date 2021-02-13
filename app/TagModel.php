<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PostModel;
use App\TagModel;

class TagModel extends Model
{
    protected $table = 'tags';
    
    public function post() {
        return $this->belongsToMany('App\PostModel', 'post_id', 'tag_id', 'tag_posts');
    }
}
