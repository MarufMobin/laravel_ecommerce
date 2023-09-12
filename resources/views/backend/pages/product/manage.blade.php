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
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <!-- <th scope="col">Slug</th>
                                <th scope="col">Description</th> -->
                                <th scope="col">Category / Sub-Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach( $categories as $category )
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>
                                            @if( !is_null($category->image) )
                                                <img src="{{ asset('Backend/img/category') }}/{{$category->image}}" alt="" width="50px" height="50px"> 
                                            @else
                                                <span>No Thumbnail</span>
                                            @endif
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <!-- <td>{{ $category->slug }}</td>
                                        <td>{{ $category->description }}</td> -->
                                        <td>
                                            @if( $category->is_parent == 0 )
                                                <span class="badge badge-success"> 
                                                    Primary Category
                                                </span>
                                            @else
                                                <span class="badge badge-warning"> 
                                                    {{ $category->parent->name }}
                                                </span>
                                            @endif
                                        </td>
                                        
                                        <td>
                                            @if( $category->status == 1 )
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
                                                        <a href="{{ route('category.edit', $category->id) }}" class="fa fa-edit"></a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="fa fa-trash" data-toggle="modal" data-target="#deleteCategory{{ $category->id }}" ></a>
                                                    </li>
                                                </ul>
                                                <!-- Delete Modal Start Here -->
                                                <div class="modal fade" id="deleteCategory{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Do you want to Delete the Category ?
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('category.destroy', $category->id ) }}" method="post">
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

                                    <!-- Sub Category start are here -->
                                    @foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $category->id )->get() as $subcat )
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>
                                                @if( !is_null($subcat->image) )
                                                    <img src="{{ asset('Backend/img/category') }}/{{$subcat->image}}" alt="" width="50px" height="50px"> 
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
                                                        Primary Category
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
                                                            <a href="{{ route('category.edit', $subcat->id) }}" class="fa fa-edit"></a>
                                                        </li>
                                                        <li>
                                                            <a href="" class="fa fa-trash" data-toggle="modal" data-target="#deleteCategory{{ $subcat->id }}" ></a>
                                                        </li>
                                                    </ul>
                                                    <!-- Delete Modal Start Here -->
                                                    <div class="modal fade" id="deleteCategory{{ $subcat->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Do you want to Delete the Sub Category ?
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('category.destroy', $subcat->id ) }}" method="post">
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