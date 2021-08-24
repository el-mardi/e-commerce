@extends('master.main')

@section('body-content')
@if (isset($products))
        <h3>Products</h3>
        <div class="row offset-md-1" style="">
    @foreach ($products as $product) 
{{-- 
            <div class="col d-block w-100 rounded-3 mx-5 my-5" style="background-image:url(/img/4.jpg); background-size:100%; text-align: center; line-height: 6cm; height:8cm;   ">
                <a href="#" class="btn btn-lg btn-warning">Get <u>"{{$product['nom']}}"</u> Detail </a>
                <a href="#" class="btn btn-lg btn-success" > Shop Now </a>
                <a href="#" class="btn btn-lg btn-info"> Add to pannier </a>
            </div>    --}}
                <div class="col-4 my-4 shadow pb-3" >
                    <div class="carousel-item active mt-2">
                      <img src="/img/{{$product->url}}" class="card-img-top" alt="..." style="height: 7cm">
                      <div class="carousel-caption" style="top: 3cm; max-height:1cm">
                        <p style="color: rgb(255, 0, 0); font-size: x-large; font-family 'Tahoma'"><b>{{$product->nom}}</b></p>
                      </div>
                      <div class="d-grid gap-2 mt-">
                        <a class="btn btn-success" href="#">Shop now</a>
                        <a class="btn btn-secondary" href="#">Add to pannier</a>
                        <a class="btn btn-info" href="#">Show detail</a>
                      </div>
                    </div>
                  </div>
                  
                  @endforeach 
                </div>

@else
<h3>categories</h3>
    @foreach ($categories as $category)
    
    <div class="col d-block w-100 rounded-3 mx-5 mt-5" style="background-image:url(/img/4.jpg); background-size:100%; text-align: center; line-height: 10cm; ">
        <a href="{{route('categories', ['c'=>$category['id_ctg']])}}" class="btn btn-lg btn-outline-light">Chech: {{  $category['nom'] }}</a>
    </div>

    @endforeach

@endif
 
   

@endsection