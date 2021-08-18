@extends('admin.dashboard')

@section('dashboard-content')
    
<h4>Admins management</h4>
  
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
</div>


@endsection