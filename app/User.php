<?php

namespace App;

use App\Flyer;
use App\Http\Requests\FlyerRequest;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function flyers()
    {
      return $this->hasMany(Flyer::class);
    }

    public function owns($model)
    {
      return $model->user_id == $this->id;
    }


    public function createFlyer(FlyerRequest $request)
    {
      return $this->flyers()->create($request->all());
    }
}
