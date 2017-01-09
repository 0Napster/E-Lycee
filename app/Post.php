<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'abstract',
        'content',
        'url_thumbnail',
        'date',
        'status',
        'updated_at'
    ];

    /**
     * user relationship
     *
     * @return relation
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * score relationship
     *
     * @return relation
     */
    public function score()
    {
        return $this->hasMany('App\Score');
    }
}
