@extends('admin.dashboard')

@section('dashboard-content')


<div class="row border border-5 mx-5 mt-5 shadow">
    <div class="col mt-5" style="position:relative; left:10%;">
        <img  class="rounded-circle border border-2"  src="/img/admin.jpg" style="height: 5cm; width:5cm; ">
   </div>
   
   <div class="col mt-4 pb-5" style="position: relative; ">
      <div class="mt-3 ">
          <h6>Category's name: <b><u>{{ $category->nom}}</u></b> </h6> 
       </div>
       <div class="mt-4">
          <h6>Category's description: </h6>
          <p>
              <b>{{ $category->description}} </b>
          </p> 
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