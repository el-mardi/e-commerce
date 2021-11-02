@extends('admin.dashboard')

@section('dashboard-content')
    
<h4 style="display: inline">MarkDown management</h4>

<div id="test_id"></div>

<div class="row mt-3 mb-2">
    <select class="col form-control mx-2" id="search_by">
        <option value="" selected>Search by</option>
        <option value="percentage">Percentage</option>
        <option value="status">Status</option>
        <option value="start_at">Start at</option>
        <option value="end_at">End at</option>
    </select>
    <input id="search_markdown" class="col form-control mr-2" type="number" placeholder="Search by percentage" aria-label="Search" >
    <select class="col form-control mr-2" name="select" id="select_status" style="display: none">
        <option value="" selected>Select Status</option>
        <option value="1">Active</option>
        <option value="0">Not active</option>
    </select>
    <input type="date" id="search_date" class="col form-control mr-2" style="display: none">
    <a href="{{route('markdown.create')}}" class="col-sm-3 btn btn-success mr-2" > Add new mark down <i class="fas fa-plus-square"></i> </a>
</div>     
<span id="markNotification" class="text-danger ml-5 mx-5" style="display: none">Press "Enter" to search when you select the date </span>

<div id="output_search_markdown_null"></div>

<table class="table table-striped border border-dark show_list_in_table  shadow mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">Pourcentage</th>
        <th scope="col">Status</th>
        <th scope="col">Start at</th>
        <th scope="col">End at</th>
        <th scope="col">show</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody id="output_search_markdown"></tbody>
    <tbody id="output_search_markdown1">
     @foreach ($markDowns as $markdown)
     <tr>
        <td><input type="checkbox"></td>
        <th scope="row">{{$i++}}</th>
        <td>{{$markdown['pourcentage']}} %</td>
        @if ($markdown['statut'] === 1)
        <td>active</td>
        @else
        <td>Not active</td>
        @endif
        <td>{{$markdown['date_debut']}}</td>
        <td>{{$markdown['date_fin']}}</td>
        <td><a class="link-primary" href="{{route('markdown.show', $markdown['id_rem'])}}"><i class="fas fa-eye"></i></a></td>
        <td><a class="link-success" href="{{route('markdown.edit', $markdown['id_rem'])}}"><i class="fas fa-edit"></i></a></td>
        <td>
        <form action="{{route('markdown.destroy', $markdown['id_rem'])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link"> <i class="fas fa-minus-square" style="color: red"></i></button>
            </form>
            </td>
      </tr>
     @endforeach
     
    </tbody>
  </table>


@endsection
{{-- 
<div class="row mb-5">
    <div class="col">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Consult all categories</h5>
                <p class="card-text">Consult and show all categories in the system.</p>
                <a href="#" class="btn btn-info">consult categories</a>
              </div>
        </div>
    </div>
    
    
    <div class="col ">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Create a new Category</h5>
                <p class="card-text">Add a new category to the system.</p>
                <a href="#" class="btn btn-success">Create category</a>
            </div>
        </div>
    </div>
</div>

    
<div class="row mb-5">
    <div class="col">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Edit a categories</h5>
                <p class="card-text">Edit the name or the descriptionof category.</p>
                <a href="#" class="btn btn-primary">Edit category</a>
              </div>
        </div>
    </div>
    
    
    <div class="col ">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Delete a Category</h5>
                <p class="card-text">Delete category from the system.</p>
                <a href="#" class="btn btn-danger">Delete category</a>
            </div>
        </div>
    </div>
</div> --}}
