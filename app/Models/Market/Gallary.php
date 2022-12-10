<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallary extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_images';

    protected $fillable = ['product_id', 'image'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //! Image Service
    protected $casts = ['image' => 'array'];
}
