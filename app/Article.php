<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /* use Notifiable; */
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'user_id', 'author',
    ];
    
    public function user(){
        $this->belongsTo(homePage\User);
     }
}
