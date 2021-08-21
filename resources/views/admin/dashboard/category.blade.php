@extends('admin.dashboard')

@section('dashboard-content')
    
<h4 style="display: inline">Category management</h4>
 

<div class="row mt-3">
    <input class="form-control " type="search" placeholder="Search" aria-label="Search" style="position: relative; left:2cm; font-family:serif; width: 15cm; height:1cm;">
    <a href="" class="col-sm-3 btn btn-success " style="position:absolute; right: 30px;"> Add new category <i class="fas fa-plus-square"></i> </a>
</div>     

<table class="table mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">description</th>
        <th scope="col">show</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>

     @foreach ($categories as $category)
     <tr>
        <td><input type="checkbox"></td>
        <th>{{$i++}}</th>
        <td>{{$category->nom}}</td>
        <td>{{$category->description}}</td>
        <td><a class="link-primary" href="{{route('category.show', $category->id_ctg)}}"><i class="fas fa-eye"></i></a></td>
        <td><a class="link-success" href="{{route('category.edit', $category->id_ctg)}}"><i class="fas fa-edit"></i></a></td>
        <td><a class="link-danger" href="{{route('category.destroy', $category->id_ctg)}}"><i class="fas fa-minus-square"></i></a></td>
        
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
                <h5 class="card-title">Consult all categories</h5>
                <p class="card-text">Consult and show all categories in the system.</p>
                <a href="#" class="btn btn-info">consult categories</a>
              </div>
        </div>
    </div>
    
    
    <div class="col ">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Create a new Category</h5>
                <p class="card-text">Add a new category to the system.</p>
                <a href="#" class="btn btn-success">Create category</a>
            </div>
        </div>
    </div>
</div>

    
<div class="row mb-5">
    <div class="col">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Edit a categories</h5>
                <p class="card-text">Edit the name or the descriptionof category.</p>
                <a href="#" class="btn btn-primary">Edit category</a>
              </div>
        </div>
    </div>
    
    
    <div class="col ">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Delete a Category</h5>
                <p class="card-text">Delete category from the system.</p>
                <a href="#" class="btn btn-danger">Delete category</a>
            </div>
        </div>
    </div>
</div>
 --}}
