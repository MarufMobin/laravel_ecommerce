<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Product;
use App\Models\Backend\Order;
use Auth;

class Cart extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'ip_address',
        'order_id',
        'product_id',
        'product_quantity',
    ];

    public function user(){
        return $this->belongsTo( User::class );
    }
    
    public function order(){
        return $this->belongsTo( Order ::class );
    }
    
    public function product(){
        return $this->belongsTo( Product ::class );
    }

}
