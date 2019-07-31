<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     use Sluggable;
	protected $dates = ['created_at'];
    protected $fillable = ['title', 'content', 'thumbnail', 'slug', 'user_id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
    	if($this->thumbnail){
    		return $this->thumbnail;
    	} else{
    		return asset('images/no-thumbnail.jpg');
    	}
    }
}
