@extends('admin.dashboard')

@section('dashboard-content')

<div class="px-3 py-3 border border-2 shadow mx-4 m-4 ">

    <div>
        <h4 class="mt-4"><u>Maark Down detail</u></h4>
    </div>

    <table class="table table-primary mb-4">
        <head>
            <th>Pourcentage</th>
            <th>status</th>
            <th>Start at</th>
            <th>End at</th>
        </head>
        <tbody class="table table-secondary">
            <tr>
                <th>{{$markdowns[0]->pourcentage}} %</th>
                @if ($markdowns[0]->statut === 1)
                <th>Active</th>
                @else
                <th>Not active</th>
                @endif
                <th>{{$markdowns[0]->date_debut}}</th>
                <th>{{$markdowns[0]->date_fin}}</th>
            </tr>
        </tbody>
        
    </table>

    <h4 class="mt-4"><u>List of products </u></h4>
        <table class="table table-info table-striped mb-4">
            <head>
                <tr>
                    <th>product name</th>
                    <th>categpry name</th>
                    <th>price</th>
                    <th>quantite</th>
                </tr>
            </head>
           
            <tbody class="table table-secondary">
                @foreach ($markdowns as $markdown)
                <tr>
                    <th>{{$markdown->nom}}</th>
                    <th>{{$markdown->nom_ctg}}</th>                   
                    <th>{{$markdown->prix}}</th>                   
                    <th>{{$markdown->quantite}}</th>
                    
                </tr>
                @endforeach
               
            </tbody>
        </table>

</div>
     
   
@endsection