<?php

namespace App;
use Auth;
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
        'username', 'password', 'role', 'url_thumbnail'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * posts relationship
     *
     * @return relation
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * isAdmin check if a user has the role administrator
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return ($this->role === 'teacher') ? true : false;
    }

    public function isStudent()
    {
        return in_array($this->role, ['final_class', 'first_class']) ;
    }
}
