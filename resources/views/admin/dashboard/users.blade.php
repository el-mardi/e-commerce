@extends('admin.dashboard')

@section('dashboard-content')
    
<h4 style="display: inline">Users management</h4>
    
    
<a href="" class="btn btn-success" style="position:absolute; right: 30px"> Add new user <i class="fas fa-plus-square"></i> </a>
<table class="table mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">description</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
     
      <tr>
        <td><input type="checkbox"></td>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton Thornton Thornton Thornton Thornton Thornton  Thornton Thornton  Thornton Thornton Thornton Thornton Thornton  Thornton Thornton Thornton </td>
        <td><a href="#"><i class="fas fa-edit"></i></a></td>
        <td><a href="#"><i class="fas fa-minus-square"></i></a></td>
      </tr>
     
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