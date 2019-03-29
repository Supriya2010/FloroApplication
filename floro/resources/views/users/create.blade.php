@extends('layouts.app')

@section('content')

             
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add User Account') }}</div>

                <div class="card-body">
                    <form id="resetForm" method="POST" action="{{ url('users') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('user_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="first_name" type="text"  class="form-control{{ $errors->has('first_name') ? 'is-danger' : '' }}"  name="first_name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? 'is-danger' : '' }}" name="last_name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? 'is-danger' : '' }}"  name="address" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="house_number" class="col-md-4 col-form-label text-md-right">{{ __('House Number') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="house_number" type="text" class="form-control{{ $errors->has('house_number') ? 'is-danger' : '' }}"  name="house_number" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('Postal Code') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="postal_code" type="text" class="form-control{{ $errors->has('postal_code') ? 'is-danger' : '' }}"  name="postal_code" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? 'is-danger' : '' }}"  name="city" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? 'is-danger' : '' }}"  name="phone_number" required>
                            </div>
                        </div>

                        <div class="form-group row">
                  <label for="active_user" class="col-md-4 col-form-label text-md-right">Active User<span class="text-danger">*</span></label>
                  <div class="col-md-6">
                  <input type="checkbox" name="active_user" checked>
                  </div>
                  </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                               
                                <input type="button" class="btn btn-primary" onclick="editFields()" value="Reset">
                                
                            </div>
                        </div>
                    </form>
                    @if ($errors->any())
                      <div class="notification is-danger">
                       <ul>
                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                           @endforeach
                         </ul>
                             </div> 
                            @endif
                    <script>
                            function editFields() {
                             document.getElementById("resetForm").reset();
                                }
</script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
