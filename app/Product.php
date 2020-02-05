<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'slug', 
        'name', 
        'price', 
        'stock', 
        'size', 
        'desc', 
        'category_id'
    ];

    public function product_image()
    {
        return $this->hasMany('App\Product_image');
    }

    public function order_detail()
    {
        return $this->hasMany('App\Order_detail');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}