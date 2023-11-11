@extends('backend.layout.template')

@section('container')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Order Details</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div>
    
    <div class="br-pagebody">
        <div class="row row-sm">
            <div class="col-sm-12 col-xl-4 col-md-4">
                <!-- Body Content Start -->
                <div class="card bd-0 shadow-base">
                    <div class="d-md-flex justify-content-between pd-25">
                        <div>
                            <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">
                                Coustomer Details
                            </h6>
                        </div>
                    </div>

                    <div class="pd-l-25 pd-r-15 pd-b-25">
                        <!-- Table Start Are here -->
                        <table class="table border table-bordered table-striped rounded">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">#{{ $order->id }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">First Name</th>
                                    <td>{{ $order->first_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Last Name</th>
                                    <td>{{ $order->last_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone Number</th>
                                    <td>{{ $order->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email Address</th>
                                    <td>{{ $order->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Shipping Address</th>
                                    <td>{{ $order->shipping_address }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Area Location</th>
                                    <td>{{ $order->division_id }}, {{ $order->district_id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Area Zip Code</th>
                                    <td>{{ $order->zip_code }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Spicial Massgae / Note </th>
                                    <td>{{ $order->additional_massage }}</td>
                                </tr>
                            </tbody>
                            </table>
                        <!-- Table End here -->
                    </div>
                </div>
                <!-- Body Content End -->
            </div>  
            
            <!-- Product Details Table Are here  -->
            <div class="col-sm-12 col-xl-8 col-md-8">
                <!-- Body Content Start -->
                <div class="card bd-0 shadow-base">
                    <div class="d-md-flex justify-content-between pd-25">
                        <div>
                            <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">
                                Product Details
                            </h6>
                        </div>
                    </div>

                    <div class="pd-l-25 pd-r-15 pd-b-25">
                        <!-- Table Start Are here -->
                        <table class="table border table-bordered table-striped rounded">
                            <thead>
                                <tr>
                                    <th scope="col"># Serial No</th>
                                    <th scope="col">Product ID</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Title</th>
                                    <th scope="col">Product Quantity</th>
                                    <th scope="col">Product Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $i = 0;
                                @endphp

                                @foreach( App\Models\Frontend\Cart::orderBy('id','asc')->where('order_id', $order->id )->get() as $item )
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <th scope="row">Product ID : {{ $item->product_id }}</th>
                                        <th scope="row">
                                            @if( !is_null( $item->product->image ) )
                                                <img src="{{ asset('Backend/img/product/') .'/'. $item->product->image }}" alt="" width="40px" />
                                            @else 
                                                No Image Found
                                            @endif
                                        </th>
                                        <th scope="row">{{ $item->product->title }}</th>
                                        <th scope="row">{{ $item->product_quantity }} PCS</th>
                                        <th scope="row">

                                            @if( !is_null( $item->product->offer_price ) )
                                                ৳ {{ $item->product->offer_price }} BDT
                                            @else
                                                ৳ {{ $item->product->price }} BDT
                                            @endif 

                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Table End here -->
                    </div>
                </div>
                <div class="pd-l-25 pd-r-15 pd-b-25">
                        <!-- Table Start Are here -->
                        <table class="table border table-bordered table-striped rounded">
                            <thead>
                                <tr>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Transaction ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $order->product_finalprice }}</th>
                                    <th scope="row">
                                        @foreach( App\Models\Backend\Payment::orderBy('id', 'asc')->where('id', $order->payment_id)->get() as $pmethod )
                                            {{ $pmethod->name }}
                                        @endforeach
                                    </th>
                                    <th scope="row">
                                        @if( $order->transaction_id == NULL && $order->payment_id == 4 )
                                            <span>Cash On Delivery</span>
                                        @else
                                            {{ $order->transaction_id }}
                                        @endif
                                    </th>
                                </tr>
                            </tbody>
                            </table>
                        <!-- Table End here -->
                    </div>
                <!-- Body Content End -->
            </div>  
           
        </div>
    </div>
@endsection 