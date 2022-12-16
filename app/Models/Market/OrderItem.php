<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public function singleProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function amazingSale(){
        return $this->belongsTo(AmazingSale::class, 'amazing_sale_id');
    }

    public function color(){
        return $this->belongsTo(ProductColor::class);
    }

    public function guarantee(){
        return $this->belongsTo(Guarantee::class, 'guarantiy_id');
    }
}
