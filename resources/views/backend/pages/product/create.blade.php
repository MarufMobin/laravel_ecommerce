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
                            <div class="form-group">
                                <label for="title">Product Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                                <!-- 
                                $table->string('tages')->nullable();
                                $table->unSignedInteger('quentity')->default(1);
                                $table->integer('regular_price')->default(0);
                                $table->integer('offer_price')->nullable();
                                $table->string('sku_code')->nullable();
                                $table->integer('product_type')->default(0)->comment('0 for new 1 for old');
                                $table->integer('category_id');
                                $table->integer('brand_id');
                                $table->integer('featured_item')->default(0)->comment('0 for normarl 1 for Featured');
                                $table->integer('status')->default(0)->comment('0 for inactive 1 for active');
                                $table->string('image')->nullable();
                                 -->
                            <div class="form-group">
                                <label for="description">Product Description</label>
                                <textarea class="form-control" name="description" id="" rows="5"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Product Short Desc</label>
                                <textarea class="form-control" name="short_desc" id="" rows="5"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="quentity">Quentity</label>
                                <input type="number" name="quentity" class="form-control">
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
                                <label for="Image">Product Image / Logo</label>
                                <input type="file" name="image" class="form-control-file" accept="image/png, image/jpeg">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="addProduct" class="btn btn-primary" value="add new product">
                            </div>
                        </form>

                    </div>
                </div>
                <!-- Body Content End -->
            </div>  
        </div>
    </div>
@endsection