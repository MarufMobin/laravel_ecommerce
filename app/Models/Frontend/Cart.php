<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\Frontend\CartController;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Product;
use App\Models\Backend\Category;
use App\Models\Backend\Order;
use App\Models\Backend\Brand;
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

    // if the order id Null, that means this cart item is not complited the chekout process yet
    public static function totalCarts(){
        if( Auth::check() ){
            $carts = Cart::where( 'user_id', Auth::id() )->where('order_id', NULL )->get();
        }
        else{
            $carts = Cart::where('ip_address', request()->ip() )->where('order_id', NULL )->get();
        }

        return $carts;
    }
    
    // return the total Item or Quantity in cart 
    public static function totalItems(){
        if( Auth::check() ){
            $carts = Cart::where( 'user_id', Auth::id() )->where('order_id', NULL )->get();
        }
        else{
            $carts = Cart::where('ip_address', request()->ip() )->where('order_id', NULL )->get();
        }

        $total_item = 0;

        foreach( $carts as $cart  ){
            $total_item += $cart->product_quantity;
        }
        return $total_item;
    }
    
    // Return Total Price 
    public static function totalPrice(){
        if( Auth::check() ){
            $carts = Cart::where( 'user_id', Auth::id() )->where('order_id', NULL )->get();
        }
        else{
            $carts = Cart::where('ip_address', request()->ip() )->where('order_id', NULL )->get();
        }

        $total_price = 0;

        foreach( $carts as $cart  ){
            
            if( !is_null( $cart->product->offer_price ) ){
                $total_price += $cart->product_quantity * $cart->product->offer_price;
            }else{
                $total_price += $cart->product_quantity * $cart->product->regular_price;
            }
        }
        return $total_price;
    }

}
