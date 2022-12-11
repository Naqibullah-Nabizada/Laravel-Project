<?php

namespace App\Models\Market;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => ['source' => 'name']
        ];
    }

    protected $fillable = ['name', 'description', 'image', 'slug', 'tags', 'status', 'parent_id', 'show_in_menu'];

    //! Image Service
    protected $casts = ['image' => 'array'];

    public function parent()
    {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }

    public function children()
    {
        return $this->hasMany($this, 'parent_id')->with('children');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function category_attributes()
    {
        return $this->hasMany(CategoryAttribute::class);
    }
}
