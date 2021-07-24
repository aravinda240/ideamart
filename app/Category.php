<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'status'
    ];

    public function apps(){
        return $this->belongsToMany(App::class);
    }

    public function contents(){
        return $this->belongsToMany(Content::class);
    }
}
