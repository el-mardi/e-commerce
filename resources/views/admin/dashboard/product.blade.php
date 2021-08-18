@extends('admin.dashboard')

@section('dashboard-content')
    
<h4>Products management</h4>
    
  
<div class="row mb-5">
    <div class="col">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Consult all products</h5>
                <p class="card-text">Consult and show all products in the system.</p>
                <a href="#" class="btn btn-info">consult products</a>
              </div>
        </div>
    </div>
    
    
    <div class="col ">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Create a new product</h5>
                <p class="card-text">Add a new product to the system.</p>
                <a href="#" class="btn btn-success">Create product</a>
            </div>
        </div>
    </div>
</div>

    
<div class="row mb-5">
    <div class="col">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Edit a products</h5>
                <p class="card-text">Edit a product's specifications.</p>
                <a href="#" class="btn btn-primary">Edit product</a>
              </div>
        </div>
    </div>
    
    
    <div class="col ">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Delete a product</h5>
                <p class="card-text">Delete product from the system.</p>
                <a href="#" class="btn btn-danger">Delete product</a>
            </div>
        </div>
    </div>
</div>


@endsection