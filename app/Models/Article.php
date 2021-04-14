<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    //protected $fillable = ['title','excerpt','body'];
    protected $guarded = [];

    public function path()
    {
    	return route('articles.show',$this);
    }

    //EASH ARTICLE BELONGS TO A USER
    public function author()
    {
    	 return $this->belongsTo(User::class,'user_id'); 
    }


    //AN ARTICLE HAS THIS TAGS
     public function tags()
    {
    	 return $this->belongsToMany(Tag::class)->withTimestamps(); 
    }
}
