@extends('master.main')

@section('body-content')


    <div class="offset-md-3 mt-5">
        @if (session('new-user'))
        <div class="alert alert-success border border-dark col-md-8 mb-3">
            {{ session('new-user') }}
        </div>
        @endif
        <h3><b><u>Log in</u></b></h3>
        <form action="{{route('loginVal')}}" method="POST">
            @csrf
            <div class="col-md-8 mt-4">
                <input name="email" class="form-control @error('email') is-invalid" @enderror type="text"  value="{{old('email')}}"  placeholder="Email">
                @if ($errors->has('email'))
                <span class="text-danger mb-2">{{ $errors->first('email') }}</span>
                @endif
            </div>
        
            <div class="col-md-8 mt-4 mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid" @enderror   placeholder="Password">
                @if ($errors->has('password'))
                <span class="text-danger mb-2">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button class="col-md-8 mt-3 btn btn-outline-primary" type="submit"> Log in</button>
        </form>
        <p class="col-md-8 mt-4" style="font-size: small; text-align:center">If you do not have an account  you can <a href="{{route('user.create')}}" style="color: blue"><u>Register here </u></a> </p>
    </div>

@endsection