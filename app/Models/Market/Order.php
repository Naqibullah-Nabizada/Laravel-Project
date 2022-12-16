<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }


    public function getPaymentStatusValueAttribute()
    {
        switch ($this->payment_status) {
            case 0:
                $result = "پرداخت نشده";
                break;
            case 1:
                $result = "پرداخت شده";
                break;
            case 2:
                $result = "باطل شده";
                break;
            case 3:
                $result = "برگشت داده شده";
                break;
        }
        return $result;
    }


    public function getPaymentTypeValueAttribute()
    {
        switch ($this->payment_type) {
            case 0:
                $result = "آنلاین";
                break;
            case 1:
                $result = "آفلاین";
                break;
            case 2:
                $result = "در محل";
                break;
        }

        return $result;
    }



    public function getDeliveryStatusValueAttribute()
    {
        switch ($this->delivery_status) {
            case 0:
                $result = "ارسال نشده";
                break;
            case 1:
                $result = "در حال ارسال";
                break;
            case 2:
                $result = "ارسال شده";
                break;
            case 3:
                $result = "تحویل داده شده";
                break;
        }

        return $result;
    }


    public function getOrderStatusValueAttribute()
    {
        switch ($this->order_status) {
            case 0:
                $result = "برسی نشده";
                break;
            case 1:
                $result = "در انتظار تائید ";
                break;
            case 2:
                $result = "تائید نشده";
                break;
            case 3:
                $result = "تائید شده";
                break;
            case 4:
                $result = "باطل شده";
                break;
            case 5:
                $result = "مرجوع شده";
                break;
        }

        return $result;
    }
}
