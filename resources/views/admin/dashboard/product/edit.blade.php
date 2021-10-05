@extends('admin.dashboard')

@section('dashboard-content')

<h3 style="text-align: center; font-family:Cambria; color:green">Update profil</h3>
<div class="row border mx-2 px-3 py-5 mx-4  shadow">
    <form action="" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-4 row">
            <select name="" id="" class="form-control">
                <option value="{{$product->id_ctg}}" selected>Category name : {{$product->ctg_nom}}</option>
                @foreach ($categories as $category)
                <option value="{{$category->id_ctg}}">{{$category->nom}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-4 row">
            <select name="" id="" class="form-control">
                <option value="{{$product->id_rem}}" selected>Mark Down : {{$product->pourcentage}} </option>
                @foreach ($markdowns as $markdown)
            <option value="{{$markdown->id_prd}}">MarkDown - {{$markdown->pourcentage}}%</option>
                @endforeach
            </select>
        </div>        

        <div class="form-group mb-4 row">
        <input name="name" type="text" value="{{old('name', $product->nom)}}" class="form-control @error('nom') is-invalid @enderror" >
        @if ($errors->has('nom'))
            <span class="text-danger">{{$errors->first('nom')}}</span>    
        @endif
        </div>

        <div class="form-group mb-4 row">
            <input name="price" type="text" value="{{old('price', $product->prix)}}" class="form-control col mx-1">
            <input name="quantite" type="text" value="{{old('quantite', $product->quantite)}}" class="form-control col mx-1" >
        </div>
       
        <div class="form-group mb-4 row" >
            <textarea name="ctg_description" id="" class="form-control @error('ctg_description') is-invalid @enderror" rows="10">
                {{old('ctg_description', $product->description)}}
            </textarea>
        @if ($errors->has('ctg_description'))
            <span class="text-danger">{{$errors->first('ctg_description')}}</span>    
        @endif
        </div>

        <div class="form-group mb-4 row" >
          <input type="file" name="" id="" >
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