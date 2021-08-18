@extends('master.main')

@section('body-content')

  <div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel" >
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/img/17.jpg" class="d-block w-100" alt="..." style="height:15cm; ">
      <div class="carousel-caption  d-md-block">
        <h3> WELCOME TO OUR SHOP</h3>
        <p> Feel free to contact us </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/img/2.jpg" class="d-block w-100" alt="..." style="height:15cm;">
      <div class="carousel-caption  d-md-block">
        <h3> Our Categories </h3>
        <p>Make up, Shoses, clothes ...</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/img/4.jpg" class="d-block w-100" alt="..." style="height:15cm;">
      <div class="carousel-caption  d-md-block">
        <h3> WELCOME TO OUR SHOP</h3>
        <p> Feel free to contact us  </p>
      </div>
    </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="row mb-3">
    <div class="col d-block w-100 rounded-3 mr-4" style="background-image:url(/img/5.jpg);background-size: 100% ; height:15cm; text-align: center; line-height: 10cm; ">
      <button class="btn btn-lg btn-outline-light"> Shop Now </button>
    </div>

    <div class="col d-block w-100 rounded-3 ml-4"  style="background-image:url(/img/6.jpg);background-size: 100% ; height:15cm; text-align: center; line-height: 10cm;">
      <button class="btn btn-lg btn-outline-light"> Shop Now </button>
    </div>

  </div>
  <div class="row mt-5" >

    <div class="col shadow"  style="height: 10cm">
      <div class="carousel-item active mt-2">
        <img src="/img/9.jpg" class="card-img-top" alt="..." style="height: 7cm">
        <div class="carousel-caption" style="top: 3cm; max-height:1cm">
          <p style="color: rgb(247, 247, 247); font-size: large;"> Markdown upto 50%</p>
        </div>  
        <div class="d-grid gap-2 mt-2">
          <a class="btn btn-warning" href="#">Add to pannier</a>
          <a href="/" class="btn btn-info">Shop now</a>
        </div>
      </div>
    </div>

    <div class="col shadow"  style="height: 10cm">
      <div class="carousel-item active mt-2">
        <img src="/img/5.jpg" class="card-img-top" alt="..." style="height: 7cm">
        <div class="carousel-caption" style="top: 3cm; max-height:1cm">
          <p style="color: rgb(247, 247, 247); font-size: large;"> Markdown upto 50%</p>
        </div>  
        <div class="d-grid gap-2 mt-2">
          <a class="btn btn-info" href="#">Shop now</a>
          <a class="btn btn-warning" href="#">Add to pannier</a>
        </div>
      </div>
    </div>

    <div class="col shadow"  style="height: 10cm">
      <div class="carousel-item active mt-2">
        <img src="/img/8.jpg" class="card-img-top" alt="..." style="height: 7cm">
        <div class="carousel-caption" style="top: 3cm; max-height:1cm">
          <p style="color: rgb(247, 247, 247); font-size: large;"> Markdown upto 50%</p>
        </div>  
        <div class="d-grid gap-2 mt-2">
          <a class="btn btn-info" href="#">Shop now</a>
          <a class="btn btn-warning" href="#">Add to pannier</a>
        </div>
      </div>
    </div>

    <div class="col shadow"  style="height: 10cm">
      <div class="carousel-item active mt-2">
        <img src="/img/11.jpg" class="card-img-top" alt="..." style="height: 7cm">
        <div class="carousel-caption" style="top: 3cm; max-height:1cm">
          <p style="color: rgb(247, 247, 247); font-size: large;"> Markdown upto 50%</p>
        </div>  
        <div class="d-grid gap-2 mt-2">
          <a class="btn btn-info" href="#">Shop now</a>
          <a class="btn btn-warning" href="#">Add to pannier</a>
        </div>
      </div>
    </div>

  </div>
  <footer class="border shadow mt-5 mb-3" style="height: 5cm; background-color:rgb(158, 160, 162)">
    <div> <h4>Footer</h4></div>
  </footer>

@endsection