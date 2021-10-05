@extends('admin.dashboard')

@section('dashboard-content')


<div class="row border border-5 mx-5 my-5 shadow">
    <div class="col mt-5" style="position:relative; left:6%; top:1.5cm">
    <img  class="rounded-circle border border-2"  src="/img/{{ $product->url}}" style="height: 7cm; width:7cm; ">
   </div>
   
   <div class="col mt-4 pb-5" style="position: relative; ">

      <div class="mt-3 ">
          <h6>Product's name: <b><u>{{ $product->nom}}</u></b> </h6> 
       </div>

       <div class="mt-4">
        <h6>Product's category:    <b>{{ $product->cat_nom}} </b></h6>
     </div>

       <div class="mt-4">
          <h6>Product's description:    <b>{{ $product->description}} </b></h6>
       </div>

        <div class="mt-4">
            <h6>Product's Price:  <b>{{ $product->prix}} $</b></h6>
        </div>

        <div class="mt-4">
            <h6>Product's Quantite:  <b>{{ $product->quantite}} </b></h6>
        </div>    

     <div class="mt-4">
        <h6>Product's Mark Down:  <b>{{ $product->pourcentage}} % </b></h6>
      </div>

      <div class="mt-4">
          <h6> Mark Down :  
        @if($product->statut == 0)
          <b>Status is not active </b></h6>
        @else
          <b> Status is active </b></h6>
        @endif

      </div>

      <div class="mt-4">
        <h6>Mark down start:  <b>{{ $product->date_debut}} </b></h6>
      </div>
      <div class="mt-4">
        <h6>Mark down End:  <b>{{ $product->date_fin}} </b></h6>
      </div>


      
      
       {{-- <div class="mt-3">
            Email: <u>{{ $category->email}} </u> 
       </div>
       <div class="mt-3">
           Gsm: <u> {{ $category->gsm}}</u> 
       </div>
       <div class="mt-3">
           Created at: <u>{{ $category->created_at}} </u> 
       </div>
       <div class="mt-3">
           Last update: <u>{{ $category->updated_at}} </u> 
       </div>
       <div class="mt-3 mb-5">
       </div> --}}
   </div>

</div>
    
    

@endsection