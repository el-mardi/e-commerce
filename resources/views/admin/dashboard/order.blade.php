@extends('admin.dashboard')

@section('dashboard-content')

<h4 style="display:inline">Orders management</h4>

<span id="notification"style="display: none; color:red;">
     press <b><i>Enter</i></b> when you select date
</span>

<div class="row mt-3"> 
    <select class="col-sm-2 ml-1" name="" id="order_search_select">
        <option value="users" selected>Search By users</option>
        <option value="n_product">Search By n°product</option>
        <option value="price">Search By price</option>
        <option  value="date">Search By date</option>
    </select>
    <input type="date" class="col-sm-2 bg-light" id="select_date" style="display: none" >
    <input class="col form-control mr-2 ml-1" id="search_order" type="search" placeholder="Search" aria-label="Search" >
<a href="{{route('order.create')}}" class="col-sm-3 btn btn-success "> Add new order <i class="fas fa-plus-square"></i> </a>
</div>     


<div id="output_search_order_null"></div>
<table class="table table-striped  border border-dark show_list_in_table  shadow mt-4">
    <thead >
      <tr >
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">Costumer's name</th>
        <th scope="col">N° items</th>
        <th scope="col">N° products</th>
        <th scope="col">Total price</th>
        <th scope="col">Date</th>
        <th scope="col">show</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody id="output_search_order" style="display: none"></tbody>
    <tbody id="output_search_order_1">
     @foreach ($orders as $order)
     <tr>
        <td><input type="checkbox"></td>
        <th scope="row">{{$i++}}</th>
        <td>{{$order[0]->nom}} {{$order[0]->prenom}}</td>
        <td>{{$order->num_item}} </td>
        <td>{{$order->num_prd}} </td>
        <td>{{$order->total_prd}} </td>
        <td>{{$order[0]->date}}</td>
        <td><a href="{{route('order.show', $order[0]->id_cmd)}}" class="link-primary"><i class="fas fa-eye"></i></a></td>
        <td>
                <form action="" method="POST">
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
</div> --}}
