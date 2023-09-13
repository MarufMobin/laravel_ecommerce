@extends('backend.layout.template')

@section('container')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Products</h4>
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
                                Manage All Products
                            </h6>
                        </div>
                    </div>
                    <div class="pd-l-25 pd-r-15 pd-b-25">
                        <!-- Table Start Are here -->
                        <table class="table border table-bordered table-striped rounded">
                            <thead>
                                <tr>
                                    <th scope="col">#Sl.</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Quentity</th>
                                    <th scope="col">Regular Price</th>
                                    <th scope="col">Offer Price</th>
                                    <th scope="col">Featured</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach( $products as $product ) 
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $product->title }}</td>
                                        <td>
                                            @if( !is_null($product->image) )
                                                <img src="{{ asset('Backend/img/product') }}/{{$product->image}}" alt="" width="50px" height="50px"> 
                                            @else
                                                <span>No Thumbnail</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->category_id }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->reqular_price }}</td>
                                        <td>{{ $product->offer_price }}</td>
                                        <td>
                                            @if( $product->featured_item == 1 )
                                                <span class="badge badge-success"> 
                                                    Yes
                                                </span>
                                            @else
                                                <span class="badge badge-warning"> 
                                                    No
                                                </span>
                                            @endif
                                        </td>
                                        
                                        <td>
                                            @if( $product->status == 1 )
                                                <span class="badge badge-success"> 
                                                    Active
                                                </span>
                                            @else
                                                <span class="badge badge-danger"> 
                                                    Inactive
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action-icons"> 
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('product.edit', $product->id) }}" class="fa fa-edit"></a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="fa fa-trash" data-toggle="modal" data-target="#deleteProduct{{ $product->id }}" ></a>
                                                    </li>
                                                </ul>
                                                <!-- Delete Modal Start Here -->
                                                <div class="modal fade" id="deleteProduct{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Do you want to Delete the Product ?
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('product.destroy', $product->id ) }}" method="post">
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

                                    <!-- Sub product start are here -->
                                    @foreach( App\Models\Backend\product::orderBy('name', 'asc')->where('is_parent', $product->id )->get() as $subcat )
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>
                                                @if( !is_null($subcat->image) )
                                                    <img src="{{ asset('Backend/img/product') }}/{{$subcat->image}}" alt="" width="50px" height="50px"> 
                                                @else
                                                    <span>No Thumbnail</span>
                                                @endif
                                            </td>
                                            <td> - {{ $subcat->name }}</td>
                                            <!-- <td>{{ $subcat->slug }}</td>
                                            <td>{{ $subcat->description }}</td> -->
                                            <td>
                                                @if( $subcat->is_parent == 0 )
                                                    <span class="badge badge-success"> 
                                                        Primary Product
                                                    </span>
                                                @else
                                                    <span class="badge badge-warning"> 
                                                        {{ $subcat->parent->name }}
                                                    </span>
                                                @endif
                                            </td>
                                            
                                            <td>
                                                @if( $subcat->status == 1 )
                                                    <span class="badge badge-success"> 
                                                        Active
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger"> 
                                                        Inactive
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="action-icons"> 
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('product.edit', $subcat->id) }}" class="fa fa-edit"></a>
                                                        </li>
                                                        <li>
                                                            <a href="" class="fa fa-trash" data-toggle="modal" data-target="#deleteProduct{{ $subcat->id }}" ></a>
                                                        </li>
                                                    </ul>
                                                    <!-- Delete Modal Start Here -->
                                                    <div class="modal fade" id="deleteProduct{{ $subcat->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Do you want to Delete the Sub Product ?
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('product.destroy', $subcat->id ) }}" method="post">
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
                                    @endforeach
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