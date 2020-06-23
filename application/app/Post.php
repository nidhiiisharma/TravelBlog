<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Post as Authenticatable;
use App\User;

use Illuminate\Database\Eloquent\Model;



class Post extends Model
{
    public $primaryKey = 'id';

    protected $table = 'posts';
    public $timestamps =false;
    protected $fillable = [
        'id',
        'title',
        'author',
        'body',
        'moreBody',
        'created_at',
        'updated_at',
        'user_id',
        'cover_image'
    ];
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
}
