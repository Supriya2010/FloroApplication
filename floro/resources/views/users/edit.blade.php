@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update User Information!!') }}</div>

                <div class="card-body">
                    <form  id="resetForm" method="POST" action="/users/{{ $user->id }}">
                    @method('PATCH')
                    @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" value="{{ $user->user_name }}" required autofocus>

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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value= "{{ $user->first_name }}" required>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name"  value= "{{ $user->last_name }}"required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address"  value= "{{ $user->address }}"required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="house_number" class="col-md-4 col-form-label text-md-right">{{ __('House Number') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="house_number" type="text" class="form-control" name="house_number"  value= "{{ $user->house_number }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('Postal Code') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="postal_code" type="text" class="form-control" name="postal_code"  value= "{{ $user->postal_code }}"required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city"  value= "{{ $user->city }}"required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control" name="phone_number"  value= "{{ $user->phone_number}}"required>
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
                               
                                <input type="button" class="btn btn-primary" onclick="resetFields()" value="Reset">
                                
                            </div>
                        </div>
                    </form>
                    <script>
                            function resetFields() {
                             document.getElementById("user_name").value="";
                             document.getElementById("email").value="";
                             document.getElementById("first_name").value="";
                             document.getElementById("last_name").value="";
                             document.getElementById("address").value="";
                             document.getElementById("house_number").value="";
                             document.getElementById("city").value="";
                             document.getElementById("postal_code").value="";
                             document.getElementById("phone_number").value="";
                                }
</script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
