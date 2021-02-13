<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategorieModel;
use App\PostModel;

class CategorieModel extends Model
{
    protected $table = 'categories';

    

    public function post() {
        return $this->hasMany('App\PostModel');
    }
}
