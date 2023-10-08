@extends('layouts.admin-template')

@section('container')

    <!-- Session Status -->
    <!-- <x-auth-session-status class="mb-4" :status="session('status')" /> -->

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            
            <input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" required autofocus autocomplete="username" placeholder="Enter your Email" />
        </div>
        
         <!-- Password -->
        <div class="form-group">
            
            <input id="password" class="form-control" type="password" name="password" value="{{old('email')}}" required  autocomplete="current-password" placeholder="Enter your Password" />
        </div>

        <div class="flex items-center justify-end mt-4">
            
            <button type="submit" class="mt-3 btn btn-info btn-block">Login</button>
            
            <x-auth-session-status class="mb-4 mt-5" :status="session('status')" />
            

            @if (Route::has('password.request'))
            <div class="tx-12 d-block mg-t-20 tx-center">Forgot your password? <a href="{{ route('password.request') }}" class="tx-info">Click Here</a></div>
            @endif

        <div class="mg-t-10 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>
    
          
            
        </div>
    </form>

@endsection