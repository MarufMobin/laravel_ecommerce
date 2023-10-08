@extends('backend.layout.template')

@section('container')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Categories</h4>
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
                                Update Categories Information
                            </h6>
                        </div>
                    </div>
                    <div class="pd-l-25 pd-r-15 pd-b-25">
                        <!-- Category Form are here -->
                        <form action="{{ route('category.update', $category->id ) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" class="form-control" value="{{$category->name}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Category Description</label>
                                <textarea class="form-control" name="description" id="" rows="5">{{$category->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="is_parent">Is Parent</label>
                                <select name="is_parent" id="" class="form-control">
                                    <option value="0">Please Select the Parent Category if any</option>
                                    @foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', 0)->get() as $parentcat )
                                        <option value="0" @if( $category->id == $parentcat->id ) selected @endif >{{ $parentcat->name }}</option>

                                        @foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $parentcat ->id )->get() as $childcat )

                                            <option value="{{$childcat->id}}" @if(  $category->id == $childcat->id  ) selected @endif  > - {{ $childcat->name }}</option>

                                        @endforeach

                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="0">Please Select the Status</option>
                                    <option value="1" @if ( $category->status == 1 ) selected @endif>Active</option>
                                    <option value="0" @if ( $category->status == 0 ) selected @endif >Inactive</option>
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <label for="Image">Category Image / Logo</label> <br>
                                @if( !is_null($category->image) )
                                    <img src="{{ asset('Backend/img/category') }}/{{$category->image}}" alt="" width="50px" height="50px"> 
                                @else
                                    <span>No Thumbnail</span>
                                @endif
                                <br><br>
                                <input type="file" name="image" class="form-control-file" accept="image/png, image/jpeg">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="updateCategory" class="btn btn-primary" value="Save Changes">
                            </div>
                        </form>

                    </div>
                </div>
                <!-- Body Content End -->
            </div>  
        </div>
    </div>
@endsection