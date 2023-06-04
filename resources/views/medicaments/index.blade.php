@extends('layoute/layout')
@section('titre')
Liste des médicaments
@endsection

    
   @section('tableau')
   
   <table class="table table-bordered  " id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prix unitaire</th>
        <th scope="col">Quantité en stock</th>
        <th scope="col">Date d'expiration</th>
        <th scope="col">Catégorie</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
          <th scope="col">#</th>
          <th scope="col">Nom</th>
          <th scope="col">Prix unitaire</th>
          <th scope="col">Quantité en stock</th>
          <th scope="col">Date d'expiration</th>
          <th scope="col">Catégorie</th>
          <th scope="col">Action</th>
        </tr>
    </tfoot>
    <tbody>
      @foreach($medicaments as $medicament)
      <tr>
        <th scope="row">{{ $medicament->id }}</th>
        <td>{{ $medicament->nom }}</td>
        <td>{{ $medicament->prix_unitaire }}</td>
        <td>{{ $medicament->quantite_en_stock }}</td>
        <td>{{ $medicament->date_expiration }}</td>
        <td>{{ $medicament->categorie->nom }}</td>
        <td>
          <a href="{{ route('medicaments.show', $medicament->id) }}" class="btn btn-primary">Afficher</a>
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
    <title>Création d'un médicament</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
  </head>
  <body>
    
    <div class="container">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Créer un médicament <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Création d'un médicament</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('medicaments.store') }}">
              @csrf

              <div class="form-group mb-3">
                <label for="nom">Nom du médicament</label>
                <input value="{{ old('nom') }}" type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" required>
                <div class="invalid-feedback">
                  Veuillez entrer le nom du médicament.
                </div>
                @error('nom')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                <div class="invalid-feedback">
                  Veuillez entrer la description du médicament.
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group mb-3">
                <label for="dosage">Dosage</label>
                <input value="{{ old('dosage') }}" type="text" name="dosage" id="dosage" class="form-control @error('dosage') is-invalid @enderror" required>
                <div class="invalid-feedback">
                  Veuillez entrer le dosage du médicament.
                </div>
                @error('dosage')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group mb-3">
                <label for="fabricant">Fabricant</label>
                <input value="{{ old('fabricant') }}" type="text" name="fabricant" id="fabricant" class="form-control @error('fabricant') is-invalid @enderror" required>
                <div class="invalid-feedback">
                  Veuillez entrer le fabricant du médicament.
                </div>
                @error('fabricant')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group mb-3">
                <label for="prix_unitaire">Prix unitaire</label>
                <input value="{{ old('prix_unitaire') }}" type="number" name="prix_unitaire" id="prix_unitaire" class="form-control @error('prix_unitaire') is-invalid @enderror" step="0.01" required>
                <div class="invalid-feedback">
                  Veuillez entrer le prix unitaire du médicament.
                </div>
                @error('prix_unitaire')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group mb-3">
                <label for="quantite_en_stock">Quantité en stock</label>
                <input value="{{ old('quantite_en_stock') }}" type="number" name="quantite_en_stock" id="quantite_en_stock" class="form-control @error('quantite_en_stock') is-invalid @enderror" required>
                <div class="invalid-feedback">
                  Veuillez entrer la quantité en stock du médicament.
                </div>
                @error('quantite_en_stock')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group mb-3">
                <label for="date_expiration">Date d'expiration</label>
                <input value="{{ old('date_expiration') }}" type="date" name="date_expiration" id="date_expiration" class="form-control @error('date_expiration') is-invalid @enderror" required>
                <div class="invalid-feedback">
                  Veuillez entrer la date d'expiration du médicament.
                </div>
                @error('date_expiration')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              

              <div class="form-group mb-3">
                <label for="categorie_id">Catégorie</label>
                <select name="categorie_id" id="categorie_id" class="form-control @error('categorie_id') is-invalid @enderror" required>
                  <option value="">Sélectionnez une catégorie</option>
                  @foreach($categories as $categorie)
                  <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                  Veuillez sélectionner une catégorie.
                </div>
                @error('categorie_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="lieu_stockage_id">lieu de stockages</label>
                <select name="lieu_stockage_id" id="lieu_stockage_id" class="form-control @error('lieu_stockage_id') is-invalid @enderror" required>
                  <option value="">Sélectionnez une catégorie</option>
                  @foreach($lieuStockages as $lieuStockage)
                  <option value="{{ $lieuStockage->id }}">{{ $lieuStockage->nom }}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                  Veuillez sélectionner le lieu de stockage
                </div>
                @error('lieu_stockage_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="emplacement_id">Emplacement</label>
                <select name="emplacement_id" id="emplacement_id" class="form-control @error('emplacement_id') is-invalid @enderror" required>
                  <option value="">Sélectionnez une Emplacement</option>
                  @foreach($emplacements as $emplacement)
                  <option value="{{ $emplacement->id }}">{{ $emplacement->nom }} </option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                  Veuillez sélectionner une Emplacement.
                </div>
                @error('emplacement_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group mb-3">
                <label for="fournisseur_id">Fournisseur</label>
                <select name="fournisseur_id" id="fournisseur_id" class="form-control @error('fournisseur_id') is-invalid @enderror" required>
                  <option value="">Sélectionnez le Fournisseur</option>
                  @foreach($fournisseurs as $fournisseur)
                  <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom_societe }}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                  Veuillez sélectionner le Fournisseur.
                </div>
                @error('fournisseur_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Créer</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>





    document.getElementById('categorie_id').addEventListener('change', function() {
    var categorieId = this.value; 
    fetch('/lieux-stockage/' + categorieId)
        .then(response => response.json())
        .then(data => {
            var lieuStockageOptions = data.map(function(lieuStockage) {
                return '<option value="' + lieuStockage.id + '">' + lieuStockage.nom + '</option>';
            });
            lieuStockageOptions.unshift('<option value="">Sélectionnez un lieu de stockage</option>');
            document.getElementById('lieu_stockage_id').innerHTML = lieuStockageOptions.join('');
        })
        .catch(error => {
            console.error('Une erreur s\'est produite:', error);
        });
});

document.getElementById('lieu_stockage_id').addEventListener('change', function() {
    var lieuStockageId = this.value; 
    var emplacementSelect = document.getElementById('emplacement_id');
    emplacementSelect.innerHTML = '<option value="">Chargement des emplacements...</option>';

    fetch('/emplacements/' + lieuStockageId)
        .then(response => response.json())
        .then(data => {
          console.log(data)
            var emplacementOptions = data.map(function(emplacement) {
                return '<option value="' + emplacement.id + '">' + emplacement.nom + '</option>';
            });

            emplacementSelect.innerHTML = '<option value="">Sélectionnez un emplacement</option>' + emplacementOptions.join('');
        })
        .catch(error => {
            console.error('Une erreur s\'est produite:', error);
            emplacementSelect.innerHTML = '<option value="">Erreur lors du chargement des emplacements</option>';
        });
});


 

</script>

  </body>
</html>


   @endsection
    

 

 