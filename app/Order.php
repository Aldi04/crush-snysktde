<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 
        'invoice', 
        'total_price', 
        'status', 
        'payment_method_id', 
    ];

    public function order_detail()
    {
        return $this->hasMany('App\Order_detail');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function payment_method()
    {
        return $this->belongsTo('App\Payment_method');
    }
}