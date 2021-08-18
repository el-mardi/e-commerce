@extends('master.admin_main')

@section('admin-body-content')

<br>
    <div class="offset-md-3 mt-5">
        @if (session('new-user'))
        <div class="alert alert-success border border-dark col-md-8 mb-3">
            {{ session('new-user') }}
        </div>
        @endif
        @if (session('danger'))
        <div class="alert alert-danger border border-danger col-md-8 mb-3">
            {{ session('danger') }}
        </div>
        @endif
        <h3><b><u>Log in</u></b></h3>
        <form action="{{ route('addminLoginValidation') }}" method="post">
            @csrf
            <div class="col-md-8 mt-5">
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{old('email')}}" placeholder="Email">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif

                <input class="form-control mt-3 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button class="col-md-8 mt-4 btn btn-outline-primary" type="submit"> Log in</button>
        </form>
        <p class="col-md-8 mt-4" style="font-size: small; text-align:center">If you do not have an account  you can <a href="{{route('user.create')}}" style="color: blue"><u>Register here </u></a> </p>
    </div>

@endsection