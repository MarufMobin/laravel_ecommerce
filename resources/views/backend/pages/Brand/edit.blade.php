@extends('backend.layout.template')

@section('container')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Brands</h4>
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
                                Update Brand Information
                            </h6>
                        </div>
                    </div>
                    <div class="pd-l-25 pd-r-15 pd-b-25">
                        <!-- Brand Form are here -->
                        <form action="{{ route('brand.update', $brand->id ) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Brand Name</label>
                                <input type="text" name="name" class="form-control" value="{{$brand->name}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Brand Description</label>
                                <textarea class="form-control" name="description" id="" rows="5">{{$brand->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="is_featured">Is Featured</label>
                                <select name="featured" id="" class="form-control">
                                    <option value="0">Please Select the Featured Status</option>
                                    <option value="1" @if ( $brand->is_featured == 1 ) selected @endif >Yes, Featured</option>
                                    <option value="0" @if ( $brand->is_featured == 0 ) selected @endif >Not, Featured</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="0">Please Select the Status</option>
                                    <option value="1" @if ( $brand->status == 1 ) selected @endif>Active</option>
                                    <option value="0" @if ( $brand->status == 0 ) selected @endif >Inactive</option>
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <label for="Image">Brand Image / Logo</label> <br>
                                @if( !is_null($brand->image) )
                                    <img src="{{ asset('Backend/img/brand') }}/{{$brand->image}}" alt="" width="50px" height="50px"> 
                                @else
                                    <span>No Thumbnail</span>
                                @endif
                                <br><br>
                                <input type="file" name="image" class="form-control-file" accept="image/png, image/jpeg">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="updateBrand" class="btn btn-primary" value="Save Changes">
                            </div>
                        </form>

                    </div>
                </div>
                <!-- Body Content End -->
            </div>  
        </div>
    </div>
@endsection