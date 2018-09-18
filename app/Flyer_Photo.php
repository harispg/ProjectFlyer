<?php

namespace App;

use App\Flyer;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;


class Flyer_Photo extends Model
{
    protected $fillable= ['path'];
    protected $baseDir = 'flyers/photos';

    public function flyer()
    {
      return $this->belongsTo(Flyer::class);
    }

    public static function fromForm(UploadedFile $file)
    {
      $photo = new static;
      $name = time() . $file->getClientOriginalName();
      $photo->path = $photo->baseDir . "/" . $name;
      $file->move($photo->baseDir, $name);
      return $photo;
    }
}
