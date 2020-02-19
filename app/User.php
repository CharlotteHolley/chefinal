<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
    'name', 'email', 'password'
    ];
    
    //protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function deadlines() {
        return $this->hasMany(deadline::class, 'owner_id');
    }
    
    public function profile() {
       return $this->hasOne(Profile::class);
    }
    
    public function experience() {
       return $this->hasOne(Experience::class);
    }
    
    public function post() {
       return $this->hasMany(Post::class);
    }
}