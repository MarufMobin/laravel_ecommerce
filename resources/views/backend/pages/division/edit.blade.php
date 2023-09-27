@extends('backend.layout.template')

@section('container')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Division</h4>
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
                                Create New Division
                            </h6>
                        </div>
                    </div>
                    <div class="pd-l-25 pd-r-15 pd-b-25">
                        <!-- Division Form are here -->
                        <form action="{{ route('division.update', $division->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Division Name</label>
                                <input type="text" name="name" class="form-control" autocomplete="off" required="required" value="{{ $division->name }}"> 
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Division Priority No</label>
                                <input type="text" name="priority" class="form-control" value="{{ $division->priority }}">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="updateDivision" class="btn btn-primary" value="Save Changes">
                            </div>
                        </form>

                    </div>
                </div>
                <!-- Body Content End -->
            </div>  
        </div>
    </div>
@endsection