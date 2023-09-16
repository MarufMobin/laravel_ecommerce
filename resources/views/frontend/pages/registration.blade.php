@extends('frontend.layout.account')

@section('container')
    <div class="breadcrumb">
        <div class="container-fluid">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class="active">Sign Up</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>
    <div class="sign-in-page">
        <div class="row">
            <!-- Sign-in -->			
            <div class="col-md-6 col-sm-6 sign-in">
                <h1>There are a Image Stay Here</h1>			
            </div>
            <!-- Sign-in -->

            <!-- create a new account -->
            <div class="col-md-6 col-sm-6 create-new-account">
                <h4 class="checkout-subtitle">Create a new account</h4>
                <p class="text title-tag-line">Create your new account.</p>
                <form class="register-form outer-top-xs" role="form">
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                    </div>
                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                </form>                
            </div>	
            <!-- create a new account -->			
        </div><!-- /.row -->
    </div>
@endsection