@extends('admin.dashboard')

@section('dashboard-content')

<h3 style="text-align: center; font-family:Cambria; color:green">Update profil</h3>
<div class="row border mx-5 my-4  shadow">
    <form action="{{route('user.update', $user->id_user)}}" method="POST">
        @csrf 
        @method('PUT')
        <div class="mx-4 my-4">
            <h4>Edit User</h4>
        </div>
       
    </form>
   

</div>
    
    

@endsection
{{-- 

<div class="bg-light shadow px-4 py-3 border mt-4 ">
    <label class="mt-2" for="firstname">First Name </label>
    <input type="text" id="firstname" name="firstname" value="{{old('firstname',$admin->nom)}}" class="form-control @error('firstname') is-invalid @enderror">
    @if ($errors->has('firstname'))
    <span class="text-danger">
        {{$errors->first('firstname')}}
      </span>
    @endif
    
</div>

<div class="bg-light shadow px-4 py-3 border mt-4 ">
    <label class="mt-2 " for="lastname">Last Name </label>
    <input type="text" id="lastname" name="lastname" value="{{old('lastname',$admin->prenom)}}" class="form-control @error('lastname') is-invalid @enderror">
    @if ($errors->has('lastname'))
    <span class="text-danger">
        {{$errors->first('lastname')}}
      </span>
    @endif
</div>

<div class=" bg-light shadow px-4 py-3 border mt-4 ">
    <label class="mt-2 "for="email"> Email</label>
    <input type="text" id="email" name="email"  value="{{old('email',$admin->email)}}" class="form-control @error('email') is-invalid @enderror">
    @if ($errors->has('email'))
    <span class="text-danger">
        {{$errors->first('email')}}
      </span>
    @endif
</div>

<div class="bg-light shadow px-4 py-3 border mt-4">
    <label  class="mt-2 "for="gsm"> Gsm</label>
    <input type="text" id="gsm" name="gsm" value="{{old('gsm',$admin->gsm)}}" class="form-control  @error('gsm') is-invalid @enderror">
    @if ($errors->has('gsm'))
    <span class="text-danger">
        {{$errors->first('gsm')}}
      </span>
    @endif
</div>

<div class="bg-light shadow px-4 py-3 border mt-4 ">
    <label class="mt-2 " for="ancient">Old Password </label>
    <input type="password" id="ancient" name="ancient" class="form-control @error('ancient') is-invalid @enderror">
    @if ($errors->has('ancient'))
    <span class="text-danger">
        {{$errors->first('ancient')}}
      </span>
    @endif
</div>

<div class="bg-light shadow px-4 py-3 border mt-4">
    <label  class="mt-2 "for="new">New Password </label>
    <input type="password" id="new" name="new" class="form-control  @error('new') is-invalid @enderror">
    @if ($errors->has('new'))
    <span class="text-danger">
        {{$errors->first('new')}}
      </span>
    @endif
</div>

<div class="bg-light shadow px-4 py-3 border mt-4">
    <label  class="mt-2 "for="password-confirmation">Password Confirmation </label>
    <input type="password" id="password-confirmation" name="password-confirmation" class="form-control  @error('password-confirmation') is-invalid @enderror">
    @if ($errors->has('password-confirmation'))
    <span class="text-danger">
        {{$errors->first('password-confirmation')}}
      </span>
    @endif
</div>
    
<div class="row">
    <button type="submit" class="mt-4 btn btn-success">Update</button>
</div> --}}