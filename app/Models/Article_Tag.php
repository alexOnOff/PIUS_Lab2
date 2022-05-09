<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article_Tag extends Model
{
    use HasFactory;
    
    protected $table = 'article_tags'; 

    public function tags()
    {
        return $this->hasMany(Tag::class, 'id', 'tag_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class,'id', 'article_id');
    }
}
