<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'content', 'feature'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
