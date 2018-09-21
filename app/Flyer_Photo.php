<?php

namespace App;

use Image;
use App\Flyer;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;


class Flyer_Photo extends Model
{
    protected $fillable= ['name', 'path', 'thumbnail_path'];
    protected $baseDir = 'Images/FlyerPhotos';

    public function flyer()
    {
      return $this->belongsTo(Flyer::class);
    }

    public static function named($name)
    {
      return (new static)->saveAs($name);
    }
    public function saveAs($name)
    {
      $this->name = sprintf("%s-%s", time(), $name);
      $this->path = sprintf("%s/%s", $this->baseDir, $this->name);
      $this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->name);
      return $this;
    }

    public function move(UploadedFile $file)
    {
      $file->move($this->baseDir, $this->name);

      $this->makeThumbnail();

      return $this;

    }

    public function makeThumbnail()
    {
      Image::make($this->path)
      ->fit(200)
      ->save($this->thumbnail_path);
    }


}
