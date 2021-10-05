@extends('admin.dashboard')

@section('dashboard-content')
    
<h4 >Admins management</h4>
  
<div class="row mt-3">
    <input class="form-control" id="search_admin" type="search" placeholder="Search" aria-label="Search" style="position: relative; left:2cm; font-family:serif; width: 15cm; height:1cm;">
    <a target="_blank" href="{{ route('admin.create')}}" class="col-sm-3 btn btn-success " style="position:absolute; right: 30px;"> Add new admin <i class="fas fa-plus-square"></i> </a>
</div>     

<div id="output_search_null"></div>

<table class="table  border border-dark table-striped shadow mt-5 show_list_in_table">
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
    <tbody id="output_search_admin" style="display: none"></tbody>
    <tbody id="output_search_admin_1">

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
        <td>
            <form action="{{route('admin.destroy', $admin->id_adm)}}" method="POST">
                @csrf
                @method('DELETE')
              <input type="hidden"  name="id" value="{{$admin->id_adm}}" />
              <input type="hidden"  name="table" value="admins" />

                <button type="submit" class="btn btn-link"> <i style="color:red" class="fas fa-minus-square"></i></button>
            </form>
        </td>
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