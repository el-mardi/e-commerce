@extends('admin.dashboard')

@section('dashboard-content')
    
<h4>Orders management</h4>
    
  
<div class="row mb-5">
    <div class="col">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Consult all orders</h5>
                <p class="card-text">Consult and show all orders in the system.</p>
                <a href="#" class="btn btn-info">consult orders</a>
              </div>
        </div>
    </div>
    
    
    <div class="col ">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Create a new order</h5>
                <p class="card-text">Add a new order to the system.</p>
                <a href="#" class="btn btn-success">Create order</a>
            </div>
        </div>
    </div>
</div>

    
<div class="row mb-5">
    <div class="col">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Edit a orders</h5>
                <p class="card-text">Edit an order.</p>
                <a href="#" class="btn btn-primary">Edit order</a>
              </div>
        </div>
    </div>
    
    
    <div class="col ">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Delete a order</h5>
                <p class="card-text">Delete order from the system.</p>
                <a href="#" class="btn btn-danger">Delete order</a>
            </div>
        </div>
    </div>
</div>



@endsection