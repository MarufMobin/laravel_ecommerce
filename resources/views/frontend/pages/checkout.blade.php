@extends('frontend.layout.account')

@section('container')
   <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- breadcrumb -->

    <!-- Checkout Body Content are strat here  -->
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row">
                <div class="shopping-cart checkout-page-body">
                    <div class="col-md-12">
                        <h2> Checkout</h2>
                    </div>
                    <div class="row">

                        <!-- Customer Form -->
                        <div class="col-md-7">
                            <form action="{{ route('order.store') }}" method="POST">
                                @csrf 

                                <div class="row">
                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input type="text" name="fname" class="form-control" required="required">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Email Address </label>
                                            <input type="email" name="email" class="form-control" required="required">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Shipping Address </label>
                                            <input type="text" name="address" class="form-control" required="required">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input type="text" name="lname" class="form-control" required="required">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="phone" class="form-control" required="required">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Zip Code</label>
                                            <input type="text" name="zipcode" class="form-control" required="required">
                                        </div>

                                    </div>
                                </div>
                               <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Additional Message [ Optional ] </label>
                                            <textarea name="additional_massage" class="form-control" rows="3"></textarea>
                                        </div>    
                                    </div>
                               </div>

                          
                        </div>

                        <!-- Order Summary -->
                        <div class="col-md-5">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( App\Models\Frontend\Cart::totalCarts() as $item )
                                        <tr>
                                            <td>
                                                @if( !is_null( $item->product->image ) )
                                                    <img src="{{ asset('Backend/img/product/') .'/'. $item->product->image }}" alt="" width="50px"/>
                                                @else 
                                                    No Image Found
                                                @endif
                                            </td>
                                            <td>{{ $item->product->title }}</td>
                                            <td>
                                                @if( !is_null( $item->product->offer_price ) )
                                                    BDT {{$item->product->offer_price }}
                                                @else
                                                    BDT {{$item->product->regular_price }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>
                                            Sub Total
                                        </td>
                                        <td>
                                            BDT {{ App\Models\Frontend\Cart::totalPrice() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Total Amount
                                        </td>
                                        <td>
                                            BDT {{ App\Models\Frontend\Cart::totalPrice() }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="payment-option">
                                <h4>Please Select the Payment Method</h4>

                                @foreach( App\Models\Backend\Payment::orderBy('priority', 'asc')->get() as  $getWay )
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="{{ $getWay->slug }}" value="{{$getWay->id}}" checked>
                                        <label class="form-check-label" for="{{ $getWay->slug }}">
                                            {{ $getWay->name }}
                                        </label>
                                    </div>
                                    
                                    @if( $getWay->slug == "bkash" )
                                        <div class="getway-option {{ $getWay->slug }} hidden" >
                                            <h5>Please Send Money To This <strong>
                                            {{ $getWay->number }} 
                                            </strong> and Insert The Transaction Number Below</h5>
                                            <input type="text" name="btransaction_id" class="form-control" placeholder="Transaction ID">
                                        </div>
                                    @elseif( $getWay->slug == "rocket" )
                                        <div class="getway-option {{ $getWay->slug }} hidden" >
                                            <h5>Please Send Money To This <strong>
                                            {{ $getWay->number }} 
                                            </strong> and Insert The Transaction Number Below</h5>
                                            <input type="text" name="rtransaction_id" class="form-control" placeholder="Transaction ID">
                                        </div>
                                    @elseif( $getWay->slug == "nagod" )
                                        <div class="getway-option {{ $getWay->slug }} hidden" >
                                            <h5>Please Send Money To This <strong>
                                            {{ $getWay->number }} 
                                            </strong> and Insert The Transaction Number Below</h5>
                                            <input type="text" name="ntransaction_id" class="form-control" placeholder="Transaction ID">
                                        </div>
                                    @else
                                        <div class="getway-option  {{ $getWay->slug }} hidden">
                                            <h5>Please Proceed the order, Once you recive the Product, You have to pay the amount to the delivery man.</h5> 
                                        </div>
                                    @endif

                                @endforeach

                                    <!-- Few Hidden Informations -->
                                    <input type="hidden" name="product_finalprice" value="{{ App\Models\Frontend\Cart::totalPrice() }}">

                                    <div class="form-group">
                                        <input type="submit" name="order" value="Place Your Order" class="btn btn-primary checkout-btn">
                                    </div>

                                </form>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Checkout Body Content are end here  -->

@endsection