<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','title', 'description', 'image','user_id'
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}

