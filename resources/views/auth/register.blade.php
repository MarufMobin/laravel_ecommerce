@extends('layouts.admin-template')

@section('container')

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Enter your Name" />
            <!-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> -->
        </div>

        <!-- Email Address -->
        <div class="form-group">
           <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Enter your email" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="Enter your password"/>
        </div>

        <!-- Confirm Password -->
        <div class="form-group">

            <input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="Enter your Conform password" />
        </div>
        
        <div class="form-group">
            <button type="submit" class="mt-3 btn btn-info btn-block">Register</button>
        </div>
       
        <div class="mg-t-10 tx-center">Already registered?<a href="{{ route('login') }}" class="tx-info">Login here</a></div>
 
    </form>

@endsection