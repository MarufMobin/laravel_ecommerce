@extends('backend.layout.template')

@section('container')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>District</h4>
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
                                Update District Information
                            </h6>
                        </div>
                    </div>
                    <div class="pd-l-25 pd-r-15 pd-b-25">
                        <!-- District Form are here -->
                        <form action="{{ route('district.update', $district->id ) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">District Name</label>
                                <input type="text" name="name" class="form-control" value="{{$district->name}}">
                            </div>

                           

                            <div class="form-group">
                                <label for="division">Division Name</label>
                                <select name="division_id" id="" class="form-control">
                                    <option value="0">Please Select the Division Name</option>
                                    @foreach( $divisions as $division )
                                        <option value="{{ $division->id }}" @if( $division->id == $district->division_id ) selected @endif >{{  $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            
                            <div class="form-group">
                                <input type="submit" name="updateDistrict" class="btn btn-primary" value="Save Changes">
                            </div>
                        </form>

                    </div>
                </div>
                <!-- Body Content End -->
            </div>  
        </div>
    </div>
@endsection