<?php

namespace App;

use App\Flyer_Photo;
use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
  protected $fillable = ['street','city','zip','country','state','price','description'];

  public static function locatedAt($zip, $street){
    $street = str_replace('-', ' ', $street);
    return static::where(compact('zip', 'street'))->firstOrFail();
  }

  public function addPhoto($photo)
  {
    $this->photos()->save($photo);
  }

  public function getPriceAttribute($price)
  {
    return '$'. number_format($price);
  }
  public function photos()
  {
    return $this->hasMany(Flyer_Photo::class);
  }
}
