@extends('admin.dashboard')

@section('dashboard-content')

<h3 style="text-align: center; font-family:Cambria; color:green">Update profil</h3>
<div class="row border mx-5 my-4 bg-light shadow">
    <form action="{{route('admin.update',$admin->id_adm)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mx-4 my-5">
            <label class="mt-3 " for="firstname">First Name </label>
            <input type="text" id="firstname" name="fistname" value="{{old('fistname',$admin->nom)}}" class="form-control">
    
            <label class="mt-3 " for="lastname">Last Name </label>
            <input type="text" id="lastname" name="lastname" value="{{old('lastname',$admin->prenom)}}" class="form-control">
    
            <label class="mt-3 "for="email"> Email</label>
            <input type="text" id="email" name="email"  value="{{old('email',$admin->email)}}" class="form-control">
    
            <label  class="mt-3 "for="gsm"> Gsm</label>
            <input type="text" id="gsm" name="gsm" value="{{old('gsm',$admin->gsm)}}" class="form-control">
    
            <label class="mt-3 " for="old-passwword">Old Password </label>
            <input type="password" id="old-passwword" name="old-passwword" class="form-control">
    
            <label  class="mt-3 "for="new-passwword">New Password </label>
            <input type="password" id="new-passwword" name="old-passwword" class="form-control">
    
            <label  class="mt-3 "for="passwword_confirmation">Password Confirmation </label>
            <input type="password" id="passwword_confirmation" name="old-passwword" class="form-control">
            <div class="row">
                <button type="submit" class="mt-4 btn btn-success">Update</button>
            </div>
        </div>
       
    </form>
   

</div>
    
    

@endsection