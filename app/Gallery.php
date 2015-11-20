<?php

namespace SnapShot;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';

    public function images()
    {
    	return $this->hasMany('SnapShot\Image');
    }
}
