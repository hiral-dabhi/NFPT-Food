@extends('layouts2.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" class="register-form" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="contact"
                                class="col-md-4 col-form-label text-md-end">Contact<span
                                    class="text-sm text-red-600">*</span></label>
                                <div class="col-md-6">
                                    <input type="number"name="contact" id="contact" placeholder="contact"
                                    class="form-control"
                                    value="{{ old('contact') }}">
                                @error('contact')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="role_id" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <select name="role_id" id="role_id" class="form-control @error('role') is-invalid @enderror">
                                    <option value="">--Select Role--</option>
                                    @foreach ($roles as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="restaurant-user-div hidden">
                            <div class="row mb-3">
                                <label for="restaurant_name" class="col-md-4 col-form-label text-md-end">{{ __('Business Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="restaurant_name" type="text" placeholder="Business Name" class="form-control @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('name') }}" autocomplete="name" autofocus>
    
                                    @error('restaurant_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="restaurant_email" class="col-md-4 col-form-label text-md-end">{{ __('Business Email') }}</label>    
                                <div class="col-md-6">
                                    <input id="restaurant_email" type="text" placeholder="Business Name" class="form-control @error('restaurant_email') is-invalid @enderror" name="restaurant_email" value="{{ old('restaurant_email') }}" autocomplete="name" autofocus>
                                    @error('restaurant_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="restaurant_contact" class="col-md-4 col-form-label text-md-end">{{ __('Business Contact number') }}</label>
    
                                <div class="col-md-6">
                                    <input id="restaurant_contact" type="number" placeholder="Business Contact Number" class="form-control @error('restaurant_contact') is-invalid @enderror" name="restaurant_contact" value="{{ old('name') }}" autocomplete="name" autofocus>
    
                                    @error('restaurant_contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('address') }}</label>
    
                                <div class="col-md-6">
                                    <textarea id="address" type="text" placeholder="Address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" autofocus></textarea>    
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                         
                            <div class="row mb-3">
                                <label for="city"
                                    class="col-md-4 col-form-label text-md-end">City<span
                                        class="text-sm text-red-600">*</span></label>
                                <div class="col-md-6">        
                                    <input type="text" name="city" id="city" placeholder="city"
                                        class="form-control"
                                        value="{{ old('city') }}">
                                    @error('city')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>                            
                            </div>
                            <div class="row mb-3">
                                <label for="zip_code"
                                    class="col-md-4 col-form-label text-md-end">Zip Code<span
                                        class="text-sm text-red-600">*</span></label>
                                <div class="col-md-6">        
                                    <input type="text" name="zip_code" id="zip_code" placeholder="Zip Code"
                                        class="form-control"
                                        value="{{ old('zip_code') }}">
                                    @error('zip_code')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>                            
                            </div>
                            <div class="row mb-3">
                                <label for="country_id"
                                    class="col-md-4 col-form-label text-md-end">Country
                                    <span class="text-sm text-red-600">*</span></label>
                                    <div class="col-md-6">   
                                <select name="country_id" id="country_id"
                                    class="form-control"
                                    value="{{ old('country_id') }}">
                                    <option value="">Select Country</option>
                                    @foreach ($country as $key => $value)
                                        <option value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                                @error('country_id')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="confirmed" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <a href="{{route('login')}}" class="btn btn-secondary" >Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript" src="{{ URL::asset('js/libs/jquery-3.7.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/libs/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('js/register.js') }}"></script>

