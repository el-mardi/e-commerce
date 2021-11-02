@extends('admin.dashboard')

@section('dashboard-content')


<form action="" method="" class="mx-4 my-5 px-3 py-2 border shadow">
    
    <h3>Create new mark down</h3>
    <div class="">
        <div class="mt-4">
            <label for="">Select Status</label>
          <select name="status" id="" class="form-control">
            @if ($markdown->statut == 1)
              <option value="1" selected>Active</option>
            @else
              <option value="0" selected>Not active</option>
            @endif
              <option value="1" >Active</option>
              <option value="0">Not active</option>
          </select>
        </div>
        <div class="mt-4">
            <label for="">Percentage</label>
            <input type="number" min="0" class="form-control" value="{{$markdown->pourcentage}}">
        </div>

        <div class="mt-4 row">
            <div class="col">
                <label for="" class="row mx-2">Start at</label>
                <input type="date" class="row form-control mx-2" value="{{$markdown->date_debut}}">
            </div>
            <div class="col">
                <label for="" class="row mx-2">ُEnd at</label>
                <input type="date" class="col form-control mx-2" value="{{$markdown->date_fin}}">
            </div>
        </div>

        <div class="mt-5 row">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>

    </div>
</form>

   
@endsection
