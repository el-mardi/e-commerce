@extends('master.main')

@section('body-content')

    <div class="offset-md-3 mt-5">
        <h3><b><u>Log in</u></b></h3>
        <form action="" method="">
            @csrf
            <div class="col-md-8 mt-3">
                <input class="form-control mb-4" type="text" title="" placeholder="Email">
                <input class="form-control mb-4" type="password" title="" placeholder="Password">
            </div>

            <button class="col-md-8 mt-3 btn btn-outline-primary" type="submit"> Log in</button>
        </form>
        <p class="col-md-8 mt-4" style="font-size: small; text-align:center">If you do not have an account  you can <a href="{{route('user.create')}}" style="color: blue"><u>Register here </u></a> </p>
    </div>

@endsection