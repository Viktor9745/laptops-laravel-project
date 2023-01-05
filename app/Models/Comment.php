<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\User;
use \App\Models\Laptop;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['content', 'laptop_id', 'user_id'];
    public function laptop(){
        return $this->belongsTo(Laptop::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
