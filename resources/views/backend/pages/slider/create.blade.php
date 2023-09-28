@extends('backend.layout.template')

@section('container')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Slider</h4>
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
                                Create New Slider
                            </h6>
                        </div>
                    </div>
                    <div class="pd-l-25 pd-r-15 pd-b-25">
                        <!-- Slider Form are here -->
                        <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label for="title">Slider Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="subtitle">Slider Sub Title</label>
                                <input type="text" name="subtitle" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="description">Slider Description</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                           
                            <div class="form-group">
                                <label for="button_text">Button Text</label>
                                <input type="text" name="button_text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="button_url">Button URL</label>
                                <input type="url" name="button_url" class="form-control">
                            </div>

                            
                            <div class="form-group">
                                <label for="image">Slider Image</label>
                                <input type="file" name="image" class="form-control-file" accept="image/png, image/jpeg">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="addSlider" class="btn btn-primary" value="add new slider">
                            </div>

                        </form>

                    </div>
                </div>
                <!-- Body Content End -->
            </div>  
        </div>
    </div>
@endsection