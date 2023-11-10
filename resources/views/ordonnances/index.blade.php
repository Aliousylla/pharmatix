@extends('layoute/layout')
@section('titre')
Liste des ordonnances 
@endsection

    
   @section('tableau')
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Hopital</th>
        <th scope="col">Service</th>
        <th scope="col">Medecin</th>
        <th scope="col">Date ordonnance</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Hopital</th>
        <th scope="col">Service</th>
        <th scope="col">Medecin</th>
        <th scope="col">Date ordonnance</th>
        <th scope="col">Action</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($ordonnances as $ordonnance)
      <tr>
        <th scope="row">{{ $ordonnance->id }}</th>
        <td>{{ $ordonnance->medecin->hopital }}</td>
        <td>{{ $ordonnance->medecin->service }}</td>
        <td>{{ $ordonnance->medecin->nom }}</td>       
        <td>{{ $ordonnance->date }}</td>
        <td>
          {{-- <a href="{{ route('ordonnances.edit', $ordonnance->id) }}" class="btn btn-primary">Modifier</a> --}}


            <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-eye" aria-hidden="true"></i> Voir</button>
        
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
   @endsection

 