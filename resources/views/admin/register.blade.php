@extends('master.admin_main')

@section('admin-body-content')

<br>
<div class="offset-md-3 mt-5">
    <h3><b><u>Register</u></b></h3>
    <form action="{{ route('admin.store') }}" method="POST">
        @csrf

        <div class="row mb-4 mt-5">
            <div class="col-sm-4">
                <input class="form-control  @error('firstname') is-invalid @enderror" name="firstname" value="{{old('firstname')}}" type="text" placeholder="First Name">
                @if ($errors->has('firstname'))
                <span class="text-danger">{{ $errors->first('firstname') }}</span>
                @endif
            </div>
            <div class="col-sm-4">
                <input class="form-control  @error('lastname') is-invalid @enderror" name="lastname" value="{{old('lastname')}}" type="text" placeholder="Last Name">
                @if ($errors->has('lastname'))
                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                @endif
            </div>
        </div>
        
        <div class="col-md-8 mb-4">
            <input class="form-control  @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" type="text" placeholder="Email">
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="col-md-8 mb-4">
            <input class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" type="text" placeholder="Phone number">
            @if ($errors->has('phone'))
            <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
        </div>
        <div class="col-md-8 mb-4">
            <input class="form-control  @error('password') is-invalid @enderror" name="password" type="password" placeholder="Password">
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="col-md-8 mb-4">
            <input class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation"  type="password" placeholder="Password confirmation ">
            @if ($errors->has('password_confirmation'))
            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>  

            <button class="col-md-8 mb-4 btn btn-outline-primary" type="submit">Register</button>
    </form>
    <p class="col-md-8" style="font-size: small; text-align:center"> You can <a href="/login" style="color: blue"><u>Log in</u></a> if you are already registred </p>
</div>
   
@endsection