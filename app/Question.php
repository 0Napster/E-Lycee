<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'status', 'class_level',
    ];

    /**
     * choice relationship
     *
     * @return relation
     */
    public function choices()
    {
        return $this->hasMany('App\Choice');
    }
}
