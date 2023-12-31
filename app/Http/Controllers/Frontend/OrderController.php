<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use App\Models\Backend\Brand;
use App\Models\Frontend\Order;
use App\Models\Frontend\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Auth;
// After done by Intervention Image Work
use Image;
use File;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = Cart::orderBy('id', 'asc')->where('order_id', NULL )->get();
        return view('frontend.pages.checkout', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'fname' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required|max:255',
         ],[
            'fname.required' => 'Please insert your Name',
            'email.required' => 'Please insert your Email',
            'address.required' => 'Please insert your Shipping Address',
         ]);

        $order = new Order();

        if( Auth::check() ){
            $cart = Cart::where( 'user_id', Auth::id() )->where('product_id', $request->product_id )->first();
        }
        else{
            $cart = Cart::where('ip_address', request()->ip() )->where('product_id', $request->product_id )->first();
        }

        if( Auth::check() ){
            $order->user_id  = Auth::id();
        }else{
            $order->ip_address  = $request->ip();
        }

        $order->first_name                 = $request->fname;
        $order->last_name                   = $request->lname;
        $order->email                           = $request->email;
        $order->phone                          = $request->phone;
        $order->shipping_address       = $request->address;
        $order->zip_code                    = $request->zipcode;
        $order->additional_massage    = $request->additional_massage;
        $order->product_finalprice     = $request->product_finalprice;
        // $order->pricewithcoupon         = $request->pricewithcoupon;
        $order->payment_id                = $request->exampleRadios;
       

        if( $order->payment_id == 1 ){
            $order->transaction_id           = $request->btransaction_id;
        }
        else if( $order->payment_id == 2 ){
            $order->transaction_id           = $request->rtransaction_id;
        }
        else if( $order->payment_id == 3 ){
            $order->transaction_id           = $request->ntransaction_id;
        }

        $order->save();

        foreach( Cart::totalCarts() as $cart ){
            $cart->order_id = $order->id;

            if( Auth::check() ){
                $cart->user_id = Auth::id();
            }else{
                $cart->ip_address = $request->ip();
            }

            $cart->save();
        }

        $notification = array(
            'massage' => 'Thank Your. your Order places Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('homepage')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('backend.pages.order.manage', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $order = Order::find($id);

        if( !is_null( $order ) ){
            return view('backend.pages.order.details', compact('order'));
        }else{
            return back();
        }
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        //
    }
}
