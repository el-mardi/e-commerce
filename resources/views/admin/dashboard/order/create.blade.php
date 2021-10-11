@extends('admin.dashboard')

@section('dashboard-content')

<div id="id_for_check"></div>
<div class="row mt-5" id="full_page">

    <div class="col">
        <div id="errors" style="display: none"></div>

        <h2 class="row ml-2">Create new Order</h2>
        <div class="row border shadow mr-1 px-1 py-1">
            <input type="text" class="form-control mt-3 mb-2" id="search_for_prd" placeholder="Search for product">
            <span id="notification_for_input" style="color:saddlebrown; display: none; text-align:center"></span>
            <span id="return_to_category" class="border border-dark" type="button" style="display: none; text-align:center">return to select category</span>
            <select class="form-control my-3" name="select_category" id="category_for_new_order">
                <option value="" selected>Select category</option>
                @foreach ($orders as $item)
                    <option value="{{$item->id_ctg}}">{{$item->nom}}</option>
                @endforeach
            </select>
    
            <select class='form-control my-3' name='select_product' id='product_for_new_order'>
                <option value="" selected>Select product</option>
            </select>
            <table class="table table-warning table-striped border my-3" id="table_show_detail" style="display: none">
                <head>
                    <th>price</th>
                    <th>markDown</th>
                    <th>status</th>
                    <th>Q stock</th>
                </head>
                <tbody id="table_show_detail_tbody">
        
                </tbody>
            </table>
            <input  type="number" min="1" step ="1"  pattern="\d+" value="1" class='form-control my-3' id="quantite_for_new_order" placeholder="Enter the quantite" style="display: none">
               
            <button type="button" id="add_to_facture" class="form-control my-3 btn btn-info border border-dark" style="display: none">Add product to facture</button>
        </div>
    </div>

    <div class="col mx-1">
        <h2 class="row ml-2">Facture </h2>
        <div class="row border shadow px-1 py-1" >
            <table class="table table-striped" style="">
                <head>
                    <th>product</th>
                    <th>price</th>
                    <th>%</th>
                    <th>quantite</th>
                    <th>total</th>
                    <th>delete</th>
                </head>
                <tbody id="facture_body">
                   
                </tbody>
            </table>
            <button type="button" id="Create_order" class="btn btn-secondary" >Add Order</button>
        </div>
    </div>
   
</div>
<div class="px-4 py-4" id="user_div" style="display: none">
    <div class="px-4 py-4 mx-5 my-5 shadow border">
        <select name="" class="form-control my-1" id="select_user" >
         <option value="">Select user</option>
                @foreach ($users as $user)
            <option value="{{$user->id_user}}">{{$user->nom}}{{$user->prenom}}</option>
                @endforeach
            </select>
            <button type="button" id="submit_order" class="btn btn-outline-primary mt-3 mx-3">Submit the order</button>
    </div>
</div>
   
@endsection
