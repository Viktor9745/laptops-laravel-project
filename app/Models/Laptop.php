<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Comment;

class Laptop extends Model
{
    use HasFactory;
    protected $fillable=['name', 'price', 'ram', 'memory', 'cpu', 'image', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function usersCart(){
        return $this->belongsToMany(User::class)
        ->withPivot('quantity', 'ram', 'memory', 'in_cart')->withTimestamps();
    }
}
