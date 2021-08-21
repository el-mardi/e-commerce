@extends('admin.dashboard')

@section('dashboard-content')
    
<h4 >Admins management</h4>
  
<div class="row mt-3">
    <input class="form-control " type="search" placeholder="Search" aria-label="Search" style="position: relative; left:2cm; font-family:serif; width: 15cm; height:1cm;">
    <a href="" class="col-sm-3 btn btn-success " style="position:absolute; right: 30px;"> Add new admin <i class="fas fa-plus-square"></i> </a>
</div>     

<table class="table table-light table-striped shadow mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">FirstName</th>
        <th scope="col">LastName</th>
        <th scope="col">Email</th>
        <th scope="col">GSM</th>
        <th scope="col">Show</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($admins as $admin)
      <tr>
        <th><input type="checkbox"></th>
        <th>{{$i++}}</th>
        <td>{{$admin->nom}}</td>
        <td>{{$admin->prenom}}</td>
        <td>{{$admin->email}}</td>
        <td>{{$admin->gsm}}</td>
        <td><a class="link-primary" href="{{route('admin.show', $admin->id_adm)}}"><i class="fas fa-eye"></i></a></td>
        <td><a class="link-success" href="{{route('admin.edit', $admin->id_adm)}}"><i class="fas fa-edit"></i></a></td>
        <td><a class="link-danger" href="{{route('admin.destroy', $admin->id_adm)}}"><i class="fas fa-minus-square"></i></a></td>
      </tr>
        @endforeach
        
    </tbody>
  </table>

  
  
  @endsection
  {{-- 
<div class="row mb-5">
    <div class="col">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Consult all Admins</h5>
                <p class="card-text">Consult and show all administrators in the system.</p>
                <a href="#" class="btn btn-info">consult admins</a>
              </div>
        </div>
    </div>
    
    
    <div class="col ">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Create a new admin</h5>
                <p class="card-text">Add a new admin to the system.</p>
                <a href="#" class="btn btn-success">Create admin</a>
            </div>
        </div>
    </div>
</div>

    
<div class="row mb-5">
    <div class="col">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Edit a admin profil</h5>
                <p class="card-text">Edit admin's profil .</p>
                <a href="#" class="btn btn-primary">Edit profil</a>
              </div>
        </div>
    </div>
    
    
    <div class="col ">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Delete admin</h5>
                <p class="card-text">Delete admin from the system.</p>
                <a href="#" class="btn btn-danger">Delete admin</a>
            </div>
        </div>
    </div>
</div> --}}