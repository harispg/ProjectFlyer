<?php

namespace App;

use App\Flyer;
use Illuminate\Database\Eloquent\Model;


class Flyer_Photo extends Model
{
    protected $fillable = ['name', 'path', 'thumbnail_path'];

    public function baseDir()
    {
      return 'Images/flyer';
    }

    public function setNameAttribute($name)
    {
      $this->attributes['name'] = $name;
      
      $this->path = $this->baseDir().'/'.$name;
      $this->thumbnail_path = $this->baseDir().'/tn-'.$name;
    }

    public function flyer()
    {
      return $this->belongsTo(Flyer::class);
    }

}
