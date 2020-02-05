<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
        'product_id', 
        'price', 
        'quantity', 
        'order_id', 
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}