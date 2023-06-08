@extends('layoute/layout')
@section('titre')
Les transactions
@endsection

    
   @section('tableau')
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">categorie</th>
        <th scope="col">Medicaments</th>
        <th scope="col">prix unitaire</th>
        <th scope="col">quantite vendue</th>
        <th scope="col">quantite en stock</th>
        <th scope="col">Total</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th scope="col">#</th>
        <th scope="col">categorie</th>
        <th scope="col">Medicaments</th>
        <th scope="col">prix unitaire</th>
        <th scope="col">quantite vendue</th>
        <th scope="col">date vente</th>
        <th scope="col">Total</th>      
        <th scope="col">Action</th>
        </tr>
    </tfoot>
    <tbody>
      @foreach($medicaments as $medicament)
      <tr>
        <th scope="row">{{ $medicament->id }}</th>
        <td>{{ $medicament->categorie->nom }}</td>
        <td>{{ $medicament->nom }}</td>
        <td>{{ $medicament->prix_unitaire }}</td>
        <td>{{ $medicament->ventes->sum('quantite_vendue') }}</td>
        <td>{{ $medicament->quantite_en_stock }}</td>
        <td>{{ $medicament->ventes->sum(function ($vente) {
          return $vente->quantite_vendue * $vente->prix_unitaire_vente;
      }) }}</td>
        
        <td>
          {{-- <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="btn btn-primary">Modifier</a> --}}


          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Details</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#destroytModal"><i class="fa fa-trash" aria-hidden="true"></i></button>
        
          </div>

          {{-- <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#editModal">
            Editer 
        </button> --}}
        
          {{-- <a href="{{ route('fournisseurs.show', $fournisseur->id) }}" class="btn btn-primary">Afficher </a> --}}
          {{-- <div class="#destroytModal modal-sm"><form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger p-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce médicament ?')">Supprimer</button>
          </form>
        </div> --}}
        
          {{-- <form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce médicament ?')">Supprimer</button>
          </form> --}}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
   @endsection


   @section('bouton')
    <div class="container">
      <a  href="ventes/create"type="button" class="btn btn-primary"  >Ajouter des ventes <i class="fa fa-plus-circle" aria-hidden="true"></i>
      </a>
    </div>
   @endsection

 
   <script>
       
   </script>
   
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   </body>
   </html>

 

 