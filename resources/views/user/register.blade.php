@extends('master.main')

@section('body-content')

<div class="offset-md-3 mt-5">
    <h3><b><u>Register</u></b></h3>
    <form action="" method="POST">
        @csrf

        <div class="row mb-4 mt-3">
            <div class="col-sm-4">
                <input class="form-control" title=""  type="text" placeholder="First Name">
            </div>
            <div class="col-sm-4">
                <input class="form-control" title=""  type="text" placeholder="Last Name">
            </div>
        </div>
        
        <div class="col-md-8 mb-4">
            <input class="form-control" title=""  type="text" placeholder="Email">
        </div>
        <div class="col-md-8 mb-4">
            <input class="form-control" title=""  type="text" placeholder="Phone number">
        </div>
        <div class="col-md-8 mb-4">
            <input class="form-control" title=""  type="password" placeholder="Password">
        </div>
        <div class="col-md-8 mb-4">
            <input class="form-control" title=""  type="password" placeholder="Password Validation">
        </div>  

            <button class="col-md-8 mb-4 btn btn-outline-primary" type="submit">Register</button>
    </form>
    <p class="col-md-8" style="font-size: small; text-align:center"> You can <a href="/login" style="color: blue"><u>Log in</u></a> if you are already registred </p>
</div>
   
@endsection