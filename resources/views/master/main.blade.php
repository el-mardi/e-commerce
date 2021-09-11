<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E-commerce</title>

        {{-- bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css" />
        {{-- javascript --}}
       
    </head>
    <body class="my-2">


      <nav class="navbar fixed-top navbar-expand-lg  navbar-dark shadow mb-3 " style="background-color: #0a9789; height:1.6cm">
          <ul class="navbar-nav ">
            <li class="nav-item active" style="margin-left: 4%; margin-right: 35%">
              <a class="nav-link" href="/"><i class="fas fa-warehouse fa-lg"></i> </a>
            </li>
            <li class="nav-item">
              {{-- <i class="fas fa-search"></i>  --}}
              <input class="form-control " type="search" placeholder="Search" aria-label="Search" style="font-family:serif; width: 15cm; height:1cm;">
          </li>
          @if (session('user'))
          <li class="nav-item" style="margin-left: 10%">
                <a class="nav-link" href="{{route('editAccount', session('user')->id_user)}}">
                  {{-- <i class="fas fa-user fa-lg"></i> --}}
                  {{session('user')->nom}}
                </i></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('notifications')}}"><i class="fas fa-bell fa-lg"></i></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-shopping-cart fa-lg"></i></a>
              </li>

              <li class="nav-item " >
                <a class="nav-link" href="/logout"><i class="fas fa-power-off fa-lg"></i></a>
              </li>
          @else
              <li class="nav-item" style="margin-left: 30%">
                <a class="nav-link" href="{{route('user.create')}}"><i class="fas fa-user-plus fa-lg"></i></a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt fa-lg"></i></i></a>
              </li>
          @endif
      </nav>
      <br>

       <nav class="navbar navbar-expand-lg navbar-light bg-light border border-1 mt-5 mb-2 " >
    
          <ul class="navbar-nav" style="margin-left:35%">
            <li class="nav-item active">
              <a class="nav-link" href="/"> <b>Home</b> </i> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('categories')}}">categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('shop')}}">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('about')}}">About us</a>
            </li>
            
      </nav>

       <div class='container'>
            @yield('body-content') 
        </div>

    

        <script src="/js/app.js" ></script>

    </body>
</html>
