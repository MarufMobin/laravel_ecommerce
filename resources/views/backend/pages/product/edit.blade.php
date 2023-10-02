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
                                Update Product Information
                            </h6>
                        </div>
                    </div>
                    <div class="pd-l-25 pd-r-15 pd-b-25">

                        <!-- Product Form are here -->
                        <form action="{{ route('product.update', $product->id ) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-sm-12 col-xl-4">
                                        <!-- First Column start here -->
                                            <div class="form-group">
                                                <label for="title">Product Title</label>
                                                <input type="text" name="title" class="form-control" value="{{ $product->title }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Regular Price</label>
                                                <input type="number" name="regular_price" class="form-control" value="{{ $product->regular_price }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="offer_price">Offer Price</label>
                                                <input type="number" name="offer_price" class="form-control" value="{{ $product->offer_price }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" name="quantity" class="form-control" value="{{ $product->quentity }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="sku_code">Sku Code</label>
                                                <input type="text" name="sku_code" class="form-control" value="{{ $product->sku_code }}">
                                            </div>
                                            
                                        <!-- First Column end here -->
                                    </div>
                                   
                                    <!--  Middle Column -->
                                    <div class="col-sm-12 col-xl-4">
                                        <div class="form-group">
                                            <label for="featured">Featured Product?</label>
                                            <select name="is_featured" id="" class="form-control">
                                                <option value="0">Please Select the Featured Status</option>
                                                <option value="1" @if( $product->featured_item == 1 ) selected @endif >Featured</option>
                                                <option value="0" @if( $product->featured_item == 0 ) selected @endif >Normal</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="brand">Product Brand</label>
                                            <select name="brand_id" id="" class="form-control">
                                                <option value="0">Please Select the Product Brand</option>
                                                @foreach( App\Models\Backend\Brand::orderBy('name', 'asc')->get() as $brand )
                                                    <option value="{{ $brand->id }}" @if( $product->brand_id == $brand->id ) selected @endif  >{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="category">Product Category</label>
                                            <select name="category_id" id="" class="form-control">
                                                <option value="0">Please Select the Product Category / Sub Category </option>
                                                    @foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', 0 )->get() as $parent_cat )
                                                        <option value="{{ $parent_cat->id }}" @if( $product->category_id == $parent_cat->id ) selected @endif >{{ $parent_cat->name }}</option>
                                                        
                                                        @foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $parent_cat->id )->get() as $child_cat )
                                                            <option value="{{ $child_cat->id }}" @if( $product->category_id == $child_cat->id ) selected @endif  >  -- {{ $child_cat->name }}</option>
                                                        @endforeach
                                                        
                                                    @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="0">Please Select the Status</option>
                                                <option value="1" @if( $parent_cat->status == 1 ) selected @endif >Active</option>
                                                <option value="0" @if( $parent_cat->status == 0 ) selected @endif  >Inactive</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="product_type">Product Type / Condition</label>
                                            <select name="product_type" id="" class="form-control">
                                                <option value="0">Please Select the Product Condition</option>
                                                <option value="1" @if( $parent_cat->product_type == 1 ) selected @endif  >New</option>
                                                <option value="0" @if( $parent_cat->product_type == 0 ) selected @endif  >Pre-Owned</option>
                                            </select>
                                        </div>

                                       
                                    
                                    </div>
                                   
                                    <!--  Last Column -->
                                    <div class="col-sm-12 col-xl-4">
                                    
                                        <div class="form-group">
                                            <label for="sort_desc">Product Short Description</label>
                                            <textarea class="form-control" name="sort_desc" id="" rows="5">{{ $product->sort_desc }}</textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="desc">Product Description</label>
                                            <textarea class="form-control" name="desc" id="" rows="5">{{ $product->desc }}</textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="tages">Tags</label>
                                            <input type="text" name="tages" class="form-control" value="{{ $product->tages }}">
                                        </div>
                                       
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="Image">Product Image</label> <br>
                                            
                                            @if( !is_null( $product->image ) )
                                                <img src="{{ asset('Backend/img/product') }}/{{ $product->image }}" alt="" width="80px">
                                            @else 
                                                <span>NO Thumbnail</span>
                                            @endif
                                            <input type="file" name="image" class="form-control-file" accept="image/png, image/jpeg">
                                        </div>  
                                        <div class="form-group">
                                            <input type="submit" name="updateProduct" class="btn btn-primary" value="Save Changes">
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