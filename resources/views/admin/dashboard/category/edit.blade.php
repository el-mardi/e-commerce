@extends('admin.dashboard')

@section('dashboard-content')

<h3 style="text-align: center; font-family:Cambria; color:green">Update profil</h3>
<div class="row border mx-5 my-4  shadow">
    <form action="{{route('category.update',$category->id_ctg)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mx-4 my-4">

            <div class="bg-light shadow px-4 py-3 border mt-4 ">
                <label class="mt-2" for="nom"> Name </label>
                <input type="text" id="nom" name="nom" value="{{old('nom',$category->nom)}}" class="form-control @error('nom') is-invalid @enderror">
                @if ($errors->has('nom'))
                <span class="text-danger">
                    {{$errors->first('nom')}}
                  </span>
                @endif
                
            </div>
            
            <div class="bg-light shadow px-4 py-3 border mt-4 ">
                <label class="mt-2 " for="description">Last Name </label>
                <textarea  id="description" name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">
                {{old('description',$category->description)}}
                </textarea>
                @if ($errors->has('description'))
                <span class="text-danger">
                    {{$errors->first('description')}}
                  </span>
                @endif
            </div>
                
            <div class="row">
                <button type="submit" class="mt-4 btn btn-success">Update</button>
            </div>
        </div>
       
    </form>
   

</div>
    
    

@endsection