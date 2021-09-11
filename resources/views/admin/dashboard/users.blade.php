@extends('admin.dashboard')

@section('dashboard-content')
    
<h4 style="display: inline">Users management</h4>
    
    

<div class="row mt-3">

    <input class="form-control" id="search_user" type="search" placeholder="Search" aria-label="Search" style="position: relative; left:2cm; font-family:serif; width: 15cm; height:1cm;">
    <a target="_blank" href="{{route('user.create')}}" class="col-sm-3 btn btn-success " style="position:absolute; right: 30px;"> Add new user <i class="fas fa-plus-square"></i> </a>
</div>     

<div id="output_search_user_null"></div>
<table class="table table-light table-striped mt-5">
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
    <tbody  id="output_search_user">

      @foreach ($users as $user)
      
      <tr>
        <th><input type="checkbox"></th>
        <th>{{$i++}}</th>
        <td>{{$user->nom}}</td>
        <td>{{$user->prenom}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->gsm}}</td>
        <td><a class="link-primary" href="{{route('user.show', $user->id_user)}}"><i class="fas fa-eye"></i></a></td>
        <td><a class="link-success" href="{{route('user.edit', $user->id_user)}}"><i class="fas fa-edit"></i></a></td>
        <td>
            <form action="{{route('user.destroy', $user->id_user)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"> <i style="color:red" class="fas fa-minus-square"></i></button>
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
                <h5 class="card-title">Consult all users</h5>
                <p class="card-text">Consult and show all users in the system.</p>
                <a href="#" class="btn btn-info">consult users</a>
              </div>
        </div>
    </div>
    
    
    <div class="col ">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Create a new users</h5>
                <p class="card-text">Add a new user to the system.</p>
                <a href="#" class="btn btn-success">Create user</a>
            </div>
        </div>
    </div>
</div>

    
<div class="row mb-5">
    <div class="col">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Edit a user's profile</h5>
                <p class="card-text">Edit user's profile.</p>
                <a href="#" class="btn btn-primary">Edit profile</a>
              </div>
        </div>
    </div>
    
    
    <div class="col ">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Delete a users</h5>
                <p class="card-text">Delete user from the system.</p>
                <a href="#" class="btn btn-danger">Delete user</a>
            </div>
        </div>
    </div>
</div>
 --}}