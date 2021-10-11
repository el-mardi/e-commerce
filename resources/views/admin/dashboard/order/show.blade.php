@extends('admin.dashboard')

@section('dashboard-content')

<div class="px-3 py-3 border border-2 shadow mx-4 m-4 ">

    <div>
        <h4 class="mt-4"><u>Order detail</u></h4>
    </div>

    <table class="table table-striped mb-4">
        <head>
            <th>First name</th>
            <th>Last name</th>
            <th>Date</th>
        </head>
        <tbody>
            <tr>
                <th>{{$orders[0]->username}}</th>
                <th>{{$orders[0]->prenom}}</th>
                <th>{{$orders[0]->date}}</th>
            </tr>
        </tbody>
        
    </table>

    <h4 class="mt-4"><u>List of products</u></h4>
        <table class="table table-primary table-striped mb-4">
            <head>
                <tr>
                    <th>product name</th>
                    <th>categpry name</th>
                    <th>price</th>
                    <th>quantite</th>
                </tr>
            </head>
            <tbody class="table table-secondary">
                @foreach ($orders as $order)
                <tr>
                    <th>{{$order->prd_name}}</th>
                    <th>{{$order->ctg_name}}</th>
                    <th>{{$order->prix}}</th>
                    <th>{{$order->qauntite_prd}}</th>
                </tr>
                @endforeach
            </tbody>
        </table>

</div>
     
   
@endsection