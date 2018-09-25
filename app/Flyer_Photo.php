<?php

namespace App;

use Image;
use App\Flyer;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;


class Flyer_Photo extends Model
{
    protected $fillable = ['name', 'path', 'thumbnail_path'];
    protected $file;

    protected static function boot()
    {
      parent::boot();
      static::creating(function ($photo) {
        return $photo->upload();
      });
    }

    public function flyer()
    {
      return $this->belongsTo(Flyer::class);
    }

    public static function fromFile(UploadedFile $file)
    {
      $photo = new static;
      $photo->file = $file;

      return $photo->fill([
        'name' => $photo->fileName(),
        'path' => $photo->filePath(),
        'thumbnail_path' => $photo->thumbnailPath()
      ]);
    }

    public function fileName()
    {
      $name = sha1(time() . $this->file->getClientOriginalName());
      $extension = $this->file->getClientOriginalExtension();
      return "{$name}.{$extension}";
    }

    public function filePath()
    {
      return $this->baseDir().'/'.$this->fileName();
    }
    public function thumbnailPath()
    {
      return $this->baseDir().'/tn-'.$this->fileName();
    }
    public function baseDir()
    {
      return 'Images/flyer';
    }


    public function upload()
    {
      $this->file->move($this->baseDir(), $this->fileName());

      $this->makeThumbnail();

      return $this;

    }

    public function makeThumbnail()
    {
      Image::make($this->filePath())
      ->fit(200)
      ->save($this->thumbnailPath());
    }

}
