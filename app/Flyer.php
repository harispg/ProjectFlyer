<?php

namespace App;

use App\User;
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
    return $this->photos()->save($photo);
  }

  public function getPriceAttribute($price)
  {
    return '$'. number_format($price);
  }
  
  public function photos()
  {
    return $this->hasMany(Flyer_Photo::class);
  }

  public function owner()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function ownedBy(User $user)
  {
    return $this->user_id == $user->id;
  }
}
