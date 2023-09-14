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
                                Create New Product
                            </h6>
                        </div>
                    </div>
                    <div class="pd-l-25 pd-r-15 pd-b-25">

                        <!-- Product Form are here -->
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-sm-12 col-xl-4">
                                        <!-- First Column start here -->
                                            <div class="form-group">
                                                <label for="title">Product Title</label>
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Regular Price</label>
                                                <input type="number" name="regular_price" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="offer_price">Offer Price</label>
                                                <input type="number" name="offer_price" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" name="quantity" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="sku_code">Sku Code</label>
                                                <input type="text" name="sku_code" class="form-control">
                                            </div>
                                            
                                        <!-- First Column end here -->
                                    </div>
                                   
                                    <!--  Middle Column -->
                                    <div class="col-sm-12 col-xl-4">
                                        <div class="form-group">
                                            <label for="featured">Featured Product?</label>
                                            <select name="is_featured" id="" class="form-control">
                                                <option value="0">Please Select the Featured Status</option>
                                                <option value="1">Yes, Featured</option>
                                                <option value="0">Not, Featured</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="brand">Product Brand</label>
                                            <select name="brand_id" id="" class="form-control">
                                                <option value="0">Please Select the Product Brand</option>
                                                @foreach( App\Models\Backend\Brand::orderBy('name', 'asc')->get() as $brand )
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="category">Product Category</label>
                                            <select name="category_id" id="" class="form-control">
                                                <option value="0">Please Select the Product Category / Sub Category </option>
                                                    @foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', 0 )->get() as $parent_cat )
                                                        <option value="{{ $parent_cat->id }}">{{ $parent_cat->name }}</option>
                                                        
                                                        @foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $parent_cat->id )->get() as $child_cat )
                                                            <option value="{{ $child_cat->id }}">  -- {{ $child_cat->name }}</option>
                                                        @endforeach
                                                        
                                                    @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="0">Please Select the Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="product_type">Product Type / Condition</label>
                                            <select name="product_type" id="" class="form-control">
                                                <option value="0">Please Select the Product Condition</option>
                                                <option value="1">New</option>
                                                <option value="0">Pre-Owned</option>
                                            </select>
                                        </div>

                                       
                                    
                                    </div>
                                   
                                    <!--  Last Column -->
                                    <div class="col-sm-12 col-xl-4">
                                    
                                        <div class="form-group">
                                            <label for="sort_desc">Product Short Description</label>
                                            <textarea class="form-control" name="sort_desc" id="" rows="5"></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="desc">Product Description</label>
                                            <textarea class="form-control" name="desc" id="" rows="5"></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="tages">Tags</label>
                                            <input type="text" name="tages" class="form-control">
                                        </div>
                                       
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="Image">Product Image / Logo</label>
                                            <input type="file" name="image" class="form-control-file" accept="image/png, image/jpeg">
                                        </div>  
                                        <div class="form-group">
                                            <input type="submit" name="addProduct" class="btn btn-primary" value="add new product">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- Body Content End -->
            </div>  
        </div>
    </div>
@endsection