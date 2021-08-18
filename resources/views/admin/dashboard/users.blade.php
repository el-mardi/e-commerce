@extends('admin.dashboard')

@section('dashboard-content')
    
<h4>Users management</h4>
      
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



@endsection