@extends('backend.layout.template')

@section('container')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>All Orders</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div>
    
    <div class="br-pagebody">
        <div class="row row-sm">
            <div class="col-sm-12 col-xl-12">
                <!-- Body Content Start -->
                <div class="card bd-0 shadow-base">
                    <div class="d-md-flex justify-content-between pd-25">
                        <div>
                            <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">
                                Manage All Orders
                            </h6>
                        </div>
                    </div>
                    <div class="pd-l-25 pd-r-15 pd-b-25">
                        <!-- Table Start Are here -->
                        <table class="table border table-bordered table-striped rounded">
                            <thead>
                                <tr>
                                    <th scope="col">#Sl.</th>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Phone No</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach( $orders as $order)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <th scope="row">#{{ $order->id }}</th>
                                        <td>{{ $order->first_name }}</td>
                                        <td>{{ $order->last_name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->email }}</td>

                                        <td>
                                            <div class="action-icons"> 
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('order.view', $order->id) }}" class="btn btn-secondary">Order Details</a>
                                                    <a href="{{ route('order.edit', $order->id) }}" class="btn btn-secondary">Update</a>
                                                    <a href="" data-toggle="modal" data-target="#deleteOrder{{ $order->id }}" class="btn btn-secondary">Delete</a>
                                                    <button type="button" class="btn btn-secondary">Right</button>
                                                </div>

                                                <!-- Delete Modal Start Here -->
                                                <div class="modal fade" id="deleteOrder{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Do you want to Delete the Order ?
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('order.cancel', $order->id ) }}" method="post">
                                                                @csrf 
                                                                <div class="action-icons">
                                                                    <ul>
                                                                        <li>
                                                                            <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                                                                        </li>
                                                                        <li>
                                                                            <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                <!-- Delete Modal End Here -->
                                            </div>
                                        </td>
                                    </tr>
                                @php $i++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Table End here -->
                    </div>
                </div>
                <!-- Body Content End -->
            </div>  
        </div>
    </div>
@endsection