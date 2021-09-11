@extends('master.admin_main')

@section('admin-body-content')

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif 

<div class="row">
        
    <nav id="nav_admin" class="col-sm-3 rounded-3 border border-secondary border-2 mt-4" style=" position: absolute; left:2px; background-color:rgb(196, 196, 196)">
        <h5 class="mt-3" style="text-align: center;"><u>Welcome {{session('admin')->nom}}</u></h5>
 
         <ul class="navbar-nav mb-4" style="font-size: large;">
            
             <li class="nav-item active">
                 <a class="btn  btn-outline-secondary border border-dark mx-2 mt-2  nav-link" href="{{ route('category.index') }}">Category management </a>
             </li>
             <li class="nav-item">
                 <a class="btn  btn-outline-secondary border border-dark mx-2 mt-2 nav-link" href="{{ route('product.index') }}">Product management </a>
             </li>
             <li class="nav-item active">
                 <a class="btn  btn-outline-secondary border border-dark mx-2 mt-2 nav-link" href="{{ route('order.index') }}">Order management </a>
             </li>
             <li class="nav-item active">
                <a class="btn btn-outline-secondary border border-dark mx-2 mt-2 nav-link" href="{{ route('markdown.index') }}">Markdown management </a>
            </li>
            <li class="nav-item active">
                <a class="btn btn-outline-secondary border border-dark mx-2 mt-2 nav-link" href="{{ route('picture.index') }}">Picture management </a>
            </li>
            <li class="nav-item active">
                <a class="btn btn-outline-secondary border border-dark mx-2 mt-2 nav-link" href="">Send Notification</a>
            </li>
            <li class="nav-item active">
                <a class="btn btn-outline-secondary border border-dark mx-2 mt-2 nav-link" href="">Users's report</a>
            </li>
             <li class="nav-item active mt-4">
                 <a class="btn btn-outline-secondary border border-dark mx-2 mt-2 nav-link" href="{{route('admin.index')}}">Admins management </a>
             </li>
             <li class="nav-item active">
                 <a class="btn  btn-outline-secondary border border-dark mx-2 mt-2 nav-link" href="{{route('user.index')}}">Users management </a>
             </li>
            
         </ul>
     </nav>
 
    <div class="col-sm-9 ml-2 mt-4" style="position:absolute; right:0">

    @if ( session('admin')->email == 'admin@admin.com')
        <div class="alert alert-danger border border-dark">
            <h6  style="text-align: center;">
                You are connected from the default admin, Please add new admin and delete this one for more secuity. 
                <a class="link-primary" href="{{route('admin.create')}}"><u>New account</u></a>
            </h6>   
        </div>
    @endif
        
        
    @if(View::hasSection('dashboard-content'))
        @yield('dashboard-content')
    @else
        <h5 class="mt-5" style="text-align: center; font-size:x-large"><u>Welcome {{session('admin')->nom}}</u></h5>
        <p style="text-align: center">you can log out <a href="{{route('addminLogout')}}" style="color: red"><u>Here</u></a>.</p>
    @endif
    </div>
     
 
</div>

@endsection

