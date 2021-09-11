@extends('master.main')

@section('body-content')

@if (isset($products))

    <h3 class="mt-5" style="text-align:center"><u>Check all <b>{{$category->nom}}</b> products</u></h3>
        <div class="row offset-md-1" style="">
    @foreach ($products as $product) 
                {{-- <div class="col-4 my-4 shadow pb-3" >
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
                  </div> --}}


                  <div class="col-4 my-4 shadow ">
                  <div class=" rounded-3 pt-3" style="background-image:url(/img/{{$product->url}}); background-size:100%; text-align: center; height:10cm;line-height: 3cm;">
                    <a href="#" class="btn btn-lg btn-outline-primary border border-2"> Shop Now</a>
                    <a href="#" class="btn btn-lg btn-outline-warning border border-2"> Add to pannier</a>
                 </div>
                  </div>
                
                  @endforeach 
                </div>

@else

  <h3 class="mt-5" style="text-align:center"><u>Check all Categories</u></h3>
      @foreach ($categories as $category)
      
      <div class="col d-block w-100 rounded-3 mx-5 mt-5 pt-3" style="background-image:url(/img/4.jpg); background-size:100%; text-align: center; height:10cm;line-height: 3cm;">
          <p style="height:2.5cm; color:rgb(255, 255, 255); -webkit-text-stroke: 0.2px rgb(95, 95, 95);">{{$category['description']}}</p>
          <a href="{{route('categories', ['c'=>$category['id_ctg']])}}" class="btn btn-lg btn-outline-light border border-3"> Check: {{  $category['nom'] }}</a>
      </div>

      @endforeach

@endif
 
   

@endsection