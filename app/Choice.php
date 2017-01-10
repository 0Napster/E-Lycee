<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id', 'content', 'status',
    ];

    /**
     * question relationship
     *
     * @return relation
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}