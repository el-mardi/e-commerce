@extends('admin.dashboard')

@section('dashboard-content')
   <div class="mx-5 px-4 pt-4 border shadow">
    <h3 class="mb-3"><u>Create a new Category </u></h3>

   <form action="{{route('category.store')}}" method="POST">
        @csrf

        <div class="form-group mb-4 row">
            <input name="nom" type="text" class="form-control @error('nom') is-invalid @enderror" placeholder="Category's name">
        @if ($errors->has('nom'))
            <span class="text-danger">{{$errors->first('nom')}}</span>    
        @endif
        </div>
       
        <div class="form-group mb-4 row" >
            <textarea name="ctg_description" id="" class="form-control @error('ctg_description') is-invalid @enderror" rows="10" placeholder="Category's Description ..."></textarea>
        @if ($errors->has('ctg_description'))
            <span class="text-danger">{{$errors->first('ctg_description')}}</span>    
        @endif
        </div>
       
        <div class="row mb-4 pb-4">
            <button type="submit" class="btn btn-outline-success">Register</button>
        </div>
    </form>
    
    </div> 

@endsection