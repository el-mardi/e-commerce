<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>E-commerce</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <!-- Styles -->
         <!-- Styles -->
         <link rel="stylesheet" href="/css/app.css" />
         {{-- javascript --}}
       
    </head>
    <body id="admin_main_body" class="my-2">


      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark shadow">
          <ul class="navbar-nav ">
            <li class="nav-item active" style="margin-left: 4%; margin-right: 35%">
              <a class="nav-link" href="/dashboard"><i class="fas fa-warehouse fa-lg"></i> </a>
            </li>
            <li class="nav-item">
              {{-- <i class="fas fa-search"></i>  --}}
              <input class="form-control " type="search" placeholder="Search" aria-label="Search" style="font-family:serif; width: 15cm; height:1cm;">
          </li>
          @if (session('admin'))
          
              <li class="nav-item" style="margin-left:35% ">
                <a class="nav-link" href="{{route('admin.edit', session('admin')->id_adm)}}"><i class="fas fa-user-circle  fa-lg"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/adminPanel/logout"><i class="fas fa-power-off fa-lg"></i></a>
              </li>
          @else
              
              <li class="nav-item"style="margin-left:35% ">
                <a class="nav-link" href="/adminPanel/login">LogIn</a>
              </li>
          @endif
             
      </nav><br>

       <div class='container mt-5'>
            @yield('admin-body-content') 
        </div>

    

        <script src="/js/app.js" ></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    </body>
</html>
