@extends('admin.dashboard')

@section('dashboard-content')

<div class="row border border-5 mx-5 mt-5 shadow">
    <div class="col mt-5" style="position:relative; left:10%; top:30%">
        <img  class="rounded-circle border border-2"  src="/img/admin.jpg" style="height: 5cm; width:5cm; ">
   </div>
   
   <div class="col mt-4" style="position: relative; ">
      <div class="mt-3 ">
          <h6>First name: <u>{{ $admin->nom}} </u> </h6> 
       </div>
       <div class="mt-3">
          <h6>Last name:  <u>{{ $admin->prenom}} </u></h6> 
       </div>
       <div class="mt-3">
           Email: <u>{{ $admin->email}} </u> 
       </div>
       <div class="mt-3">
           Gsm: <u> {{ $admin->gsm}}</u> 
       </div>
       <div class="mt-3">
           Created at: <u>{{ $admin->created_at}} </u> 
       </div>
       <div class="mt-3">
           Last update: <u>{{ $admin->updated_at}} </u> 
       </div>
       <div class="mt-3 mb-5">
       </div>
   </div>

</div>
    
    

@endsection