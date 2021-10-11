@extends('admin.dashboard')

@section('dashboard-content')
   <div class="mx-5 px-4 pt-4 border shadow">
    <h3 class="mb-5"><u>Create a new Product </u></h3>

   <form action="" method="">
        @csrf

        <div class="form-group mb-4 row">
            <select name="" id="" class="form-control">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                <option value="{{$category->id_ctg}}">{{$category->nom}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-4 row">
            <select name="" id="" class="form-control">
                <option class="border" value="">Select MarkDown </option>
                @foreach ($markdowns as $markdown)
            <option value="{{$markdown->id_prd}}">MarkDown - {{$markdown->pourcentage}}%</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-4 mx-1 ">
            <button type="button" class="form-control btn btn-secondary " data-bs-toggle="collapse"
             data-bs-target="#addMarkdown" aria-expanded="false" aria-controls="addMarkdown">
               Add New MarkDown
            </button>
            <div class="collapse shadow py-3 px-3 mt-4 border" id="addMarkdown">
                <div class="row">
                    <div class="col">
                        <select name="" id="" class="form-control">
                            <option value="" selected>Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Desactive</option>
                        </select>
                    </div>

                    <input type="text" class="col form-control" placeholder="%" name="" id="" style="height: 1cm">

                    <div class="col row  ml-1">
                        Start at :
                        <input type="date" class="col form-control">
                    </div>

                    <div class="col row ml-1">
                        End at :
                        <input type="date" class="col form-control">
                    </div>
                </div>
                
            </div>
        </div>  
        

        <div class="form-group mb-4 row">
            <input name="name" type="text" class="form-control @error('nom') is-invalid @enderror" placeholder="Description name">
        @if ($errors->has('nom'))
            <span class="text-danger">{{$errors->first('nom')}}</span>    
        @endif
        </div>

        <div class="form-group mb-4 row">
            <input name="price" type="text" class="form-control col mx-1" placeholder="Price">
            <input name="quantite" type="text" class="form-control col mx-1" placeholder="Quantite">
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