<?php

namespace App\Models\Content;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => ['source' => 'title']
        ];
    }

    protected $fillable = ['title', 'slug', 'published_at', 'tags', 'image', 'author_id','category_id' , 'status', 'commentable', 'body', 'summary'];


    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    //! Image Service

    protected $casts = ['image' => 'array'];
}
