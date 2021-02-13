<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PostInformationModel;
use App\PostModel;

class PostInformationModel extends Model
{
    protected $table = 'posts_information';
    protected $fillable = ['slug', 'description', 'id'];
    
    public function post() {
        return $this->belongsTo('App\PostModel', 'post_id', 'id');
    }
}
