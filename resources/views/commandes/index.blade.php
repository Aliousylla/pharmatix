@php
    use Carbon\Carbon;
    
@endphp
@extends('layoute/layout')
@section('titre')
Liste des commades
@endsection

    
   @section('tableau')
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">#</th>
      
        <th scope="col">Medicaments</th>
        <th scope="col">Quantite</th>
        <th scope="col">Date d'expiration</th>
        <th scope="col">Date d'entre</th>
          <th scope="col">Fournisseurs</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th scope="col">#</th>
      
        <th scope="col">Medicaments</th>
        <th scope="col">Quantite</th>
        <th scope="col">Date d'expiration</th>
        <th scope="col">Date d'entre</th>
          <th scope="col">Fournisseurs</th>
        <th scope="col">Action</th>
        </tr>
    </tfoot>
    <tbody>
      @foreach($medicaments as $medicament)
      <tr>
        <th scope="row">{{ $medicament->id }}</th>
        
        <td>{{ $medicament->nom }}</td>
        
        <td>{{ $medicament->quantite_en_stock }}</td>
      
        <td>{{ Carbon::parse($medicament->date_expiration)->locale('fr')->format('d - F - Y') }}</td>
        
        <td>{{ Carbon::parse($medicament->created_at)->locale('fr')->format('d - F - Y - H:i') }}</td>
        <td>{{ $medicament->fournisseur->nom_societe }}</td>
        <td>
          {{-- <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="btn btn-primary">Modifier</a> --}}


            <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Editer</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#destroytModal"><i class="fa fa-trash" aria-hidden="true"></i></button>
        
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
   @endsection


   @section('bouton')
       <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajout d'un fournisseur</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
  </head>
  <body>
    
    <div class="container">
        <a ></a>
      <a  href="{{ asset('medicaments') }}"type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Ajouter un commende <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
    </div>

  
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

   @endsection
   <!doctype html>
   <html lang="en">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Editer</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   </head>
   <body>
       
   <div class="container">
       <!-- Button trigger modal -->
       
   
       <!-- Modal -->
    
   </div>
   

   <div class="container">
    <!-- Button trigger modal -->
    

    <!-- Modal -->
    <div class="modal fade" id="destroytModal" tabindex="-1" aria-labelledby="destroytModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroytModalLabel">Supprimer le fournisseur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <div class="#destroytModal modal-sm"><form action="" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger p-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce médicament ?')">Supprimer</button>
          </form>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
    </body>
   </html>

 

 