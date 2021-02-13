<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PostModel;
use App\PostInformationModel;
use App\CategorieModel;
use App\TagModel;
use App\User;


class PostModel extends Model
{
    protected $table = 'posts';

   
    
    public function categorie() {
        return $this->belongsTo('App\CategorieModel', 'id', 'category_id');
    }

    public function postInformation() {
        return $this->hasOne('App\PostInformationModel', 'post_id', 'id');
    }

    public function tag() {
        return $this->belongsToMany('App\TagModel', 'tag_id', 'post_id', 'tag_posts');
    }

    public function user() {
       return $this->hasOne('App\User', 'id', 'user_id');
    }
} 
