@extends('master.admin_main')

@section('admin-body-content')

<div class="row">
        
    <nav id="nav_admin" class="col-sm-3 mt-5" style=" position:fixed; left:1px">
        <h5 class="mt-3" style="text-align: center;"><u>Welcome {{session('admin')->nom}}</u></h5>
 
         <ul class="navbar-nav mb-4 side_bar">
             <li class="nav-item active  d-grid grap-2">
                 <a  class="btn border border-secondary mx-2 mt-2 btn-link" href="{{ route('category.index') }}"> Category management </a>
             </li>
             <li class="nav-item active d-grid grap-2">
                <a class="btn  border border-secondary mx-2 mt-2 btn-link "   href="{{ route('product.index') }}">Product management</a>
             </li>
             <li class="nav-item active d-grid grap-2">
                 <a class="btn  border border-secondary mx-2 mt-2 btn-link" href="{{ route('order.index') }}">Order management</a>
             </li>
             <li class="nav-item active d-grid grap-2">
                 <a class="btn border border-secondary mx-2 mt-2 btn-link" href="{{ route('markdown.index') }}">Markdown management </a>
            </li>
            <li class="nav-item active d-grid grap-2">
                <a  class="btn border border-secondary mx-2 mt-2 btn-link" href="{{ route('picture.index') }}">Picture management</a>
            </li>
            <li class="nav-item active d-grid grap-2">
                <a class="btn border border-secondary mx-2 mt-2 btn-link" href="">Send Notification</a>
            </li>
            <li class="nav-item active d-grid grap-2">
                <a class="btn border border-secondary mx-2 mt-2 btn-link" href="">Users's report</a>
            </li>
             <li class="nav-item active mt-4 d-grid grap-2">
                 <a  class="btn border border-secondary mx-2 mt-2 btn-link" href="{{route('admin.index')}}">Admins management</a>
             </li>
             <li class="nav-item active d-grid grap-2">
                 <a class="btn border border-secondary mx-2 mt-2 btn-link" href="{{route('user.index')}}">Users management </a>
             </li> 
            
         </ul>
     </nav>
 
    <div class="col-sm-9 ml-2 mt-4" style="position:absolute; right:0">
        
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif 


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

