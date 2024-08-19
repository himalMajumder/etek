<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function order_details()
    {
        return $this->hasMany(OrderDetails::class,  'order_id', 'id');
    }
    public function order_payments()
    {
        return $this->hasOne(OrderPayment::class,  'order_id', 'id');
    }

    public function order_progress()
    {
        return $this->hasOne(OrderProgress::class,  'order_id', 'id');
    }

    public function shipping_infos()
    {
        return $this->hasOne(ShippingInfo::class,  'order_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function billingAddress()
    {
        return $this->hasOne(BillingAddress::class);
    }
}
