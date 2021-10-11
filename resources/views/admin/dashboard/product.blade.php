@extends('admin.dashboard')

@section('dashboard-content')
    
<h4 style="display: inline">Products management</h4>

<div class="row mt-3">
    <select class=" col-sm-2 ml-1" name="select" id="search_select" >
        <option value="default" selected>Default</option>
        <option value="category">Search By Category</option>
        <option value="markDown">Search By Mark Down</option>
        <option value="quantite">Search By Quantite</option>
    </select>
    {{-- style="position: relative; left:2cm; font-family:serif; width: 15cm; height:1cm;" --}}
    <input class="col form-control mx-2" id="search_product" type="search" placeholder="Search" aria-label="Search" >
    <a href="{{route('product.create')}}" class="col-sm-3 btn btn-success mr-2" > Add new product <i class="fas fa-plus-square"></i> </a>
</div>     

<div id="search_output_null_product"></div>

<table class="table table-striped border border-dark show_list_in_table  mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">price</th>
        <th scope="col">quantity</th>
        <th scope="col">category</th>
        <th scope="col">markDown</th>
        <th scope="col">description</th>
        <th scope="col">show</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody id="output_product" style="display: none"> </tbody>
    <tbody id="output_product_1">

      @foreach ($products as $product)
      <tr>
        <th><input type="checkbox"></th>
        <th>{{$i++}}</th>
        <td>{{$product->nom}}</td>
        <td>{{$product->prix}}</td>
        <td>{{$product->quantite}}</td>
        <td>{{$product->categ_nom}}</td>
        <td>{{$product->pourcentage}}%</td>
        <td>{{$product->description}}</td>
        <td><a class="link-primary" href="{{route('product.show', $product->id_prd)}}"><i class="fas fa-eye"></i></a></td>
        <td><a class="link-success" href="{{route('product.edit', $product->id_prd)}}"><i class="fas fa-edit"></i></a></td>
        <td>
            <form action="{{route('product.destroy', $product->id_prd)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link" style="color: red"><i class="fas fa-minus-square"></i></button>
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
</div> --}}