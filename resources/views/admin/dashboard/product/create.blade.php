@extends('admin.dashboard')

@section('dashboard-content')
   <div class="mx-5 px-4 pt-4 border shadow">
    <h3 class="mb-5"><u>Create a new Product </u></h3>

   <form action="{{route('product.store')}}" method="POST">
        @csrf

        <div class="form-group mb-4 row">
            <select name="category" id="" class="form-control @error('category') is-invalid @enderror">
                <option value="" selected>Select Category</option>
                @foreach ($categories as $category)
                <option value="{{$category->id_ctg}}">{{$category->nom}}</option>
                @endforeach
            </select>
            @if ($errors->has('category'))
            <span class="text-danger">{{$errors->first('category')}}</span>    
            @endif
        </div>

        <div class="form-group mb-4 row">
            <select name="mark-Down" id="" class="form-control">
                <option class="border" value="" selected>Select MarkDown </option>
                @foreach ($markdowns as $markdown)
            <option value="{{$markdown->id_prd}}">MarkDown - {{$markdown->pourcentage}}%</option>
                @endforeach
            </select>
            @if ($errors->has('marak-Down'))
            <span class="text-danger">{{$errors->first('marak-Down')}}</span>    
            @endif
        </div>
        <div class="form-group mb-4 mx-1 ">
            <button type="button" class="form-control btn btn-secondary " data-bs-toggle="collapse"
             data-bs-target="#addMarkdown" aria-expanded="false" aria-controls="addMarkdown">
               Add New MarkDown
            </button>
            <div class="collapse shadow py-3 px-3 mt-4 border" id="addMarkdown">
                <div class="row">
                    <div class="col">
                        <select name="new-mark-down" id="" class="form-control">
                            <option value="md_status" selected>Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Desactive</option>
                        </select>
                    </div>

                    <input type="text" class="col form-control" placeholder="%" name="porcentage" id="" style="height: 1cm">

                    <div class="col row  ml-1">
                        Start at :
                        <input type="date" name="start_at" class="col form-control">
                    </div>

                    <div class="col row ml-1">
                        End at :
                        <input type="date" name="end_at" class="col form-control">
                    </div>
                </div>
                
            </div>
        </div>  
        

        <div class="form-group mb-4 row">
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="product name">
        @if ($errors->has('name'))
            <span class="text-danger">{{$errors->first('name')}}</span>    
        @endif
        </div>

        <div class="form-group mb-4 row">
            <div class="col">
                <input name="price" type="text" class="form-control row mx-1 @error('price') is-invalid @enderror" placeholder="Price">
                @if ($errors->has('price'))
                <span class="text-danger">{{$errors->first('price')}}</span>    
            @endif
            </div>
            <div class="col">
                <input name="quantite" type="text" class="form-control row mx-1 @error('quantite') is-invalid @enderror" placeholder="Quantite">
                @if ($errors->has('quantite'))
                <span class="text-danger">{{$errors->first('quantite')}}</span>    
            @endif
            </div>
        </div>
       
        <div class="form-group mb-4 row" >
            <textarea name="description" id="" class="form-control @error('description') is-invalid @enderror" rows="10" placeholder="product's Description ..."></textarea>
        @if ($errors->has('description'))
            <span class="text-danger">{{$errors->first('description')}}</span>    
        @endif
        </div>
       
        <div class="row mb-4 pb-4">
            <button type="submit" class="btn btn-outline-success">Register</button>
        </div>
    </form>
    
    </div> 

@endsection