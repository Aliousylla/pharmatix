<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails du médicament</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container ">
      <h1 class=" text-center text-success text-decoration-underline p-3">Détails du médicament {{ $medicament->nom }}</h1>

      <div class="card table-responsive shadow-lg  bg-body-tertiary rounded col-md-6 m-auto">
        <div class="card-body p-5 table table-bordered">
          
          
            <div class=" border p-3">
              <h3 class=" text-success text-decoration-underline">medicament  </h3>
              <h5 class="card-title">Nom : {{ $medicament->nom }}</h5>
              <h5 class="card-text">Dosage : {{ $medicament->dosage }}</h5>
              <h5 class="card-text">Fabricant : {{ $medicament->fabricant }}</h5>
              <h5 class="card-text">Prix unitaire : {{ $medicament->prix_unitaire }}</h5>
              <h5 class="card-text">Quantité en stock : {{ $medicament->quantite_en_stock }}</h5>
              <h5 class="card-text">Date d'expiration : {{ $medicament->date_expiration }}</h5>
              <h5 class="card-text">Catégorie : {{ $medicament->categorie->nom }}</h5>
                       </div>
            <div class=" border p-3">
              <h2 class=" text-success text-decoration-underline">Description</h2>
              <p class="card-text text-lowercase lh-1 fs-4" > {{ $medicament->description }}</p>
            </div>
            <div class=" border p-3">
              <h2 class=" text-success text-decoration-underline">Emplacement</h2>
              <h5 class="card-text">zone : {{ $medicament->lieuStockage->nom}}</h5>
              <h5 class="card-text">Adresse : {{ $medicament->lieuStockage->adresse}}</h5> 
              <h5 class="card-text">Étagère  : {{ $medicament->emplacement->etage }}</h5>
              <h5 class="card-text">Classe : {{ $medicament->emplacement->nom }}</h5>
         
            </div>
            {{-- <div class=" border p-3">
              <h2 class=" text-success text-decoration-underline">Fournisseur</h2>
          
              <h5 class="card-text">Societe : {{ $medicament->fournisseur->nom_societe}}</h5>
              <h5 class="card-text">contact : {{ $medicament->fournisseur->nom_contact}}</h5> 
              <h5 class="card-text">Adresse : {{ $medicament->fournisseur->adresse}}</h5> 
              <h5 class="card-text">numero de telephone : {{ $medicament->fournisseur->numero_telephone}}</h5> 
              <h5 class="card-text">Adresse_email : {{ $medicament->fournisseur->adresse_email}}</h5>   
            </div> --}}
            
            {{-- <a href="{{ route('medicaments.edit', $medicament->id) }}" class="btn btn-warning p-2">Modifier</a> --}}
            <button type="button" class="btn btn-warning p-2" data-bs-toggle="modal" data-bs-target="#editModal">
              Editer
          </button>

      <form action="{{ route('medicaments.destroy', $medicament->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger p-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce médicament ?')">Supprimer</button>
      </form>
      <a href="{{ route('medicaments.index') }}" class="btn btn-primary p-2">Retour</a>
          </div>
          
      
        </div>
      </div>
      
      
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
          <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="editModalLabel">Modifier le médicament</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" action="{{ route('medicaments.update', $medicament->id) }}" class="needs-validation" novalidate>
                              @csrf
                              @method('PUT')
      
                              <div class="form-group mb-3">
                                  <label for="nom">Nom du médicament</label>
                                  <input value="{{ old('nom', $medicament->nom) }}" type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" required>
                                  <div class="invalid-feedback">
                                      Veuillez entrer le nom du médicament.
                                  </div>
                                  @error('nom')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <input value="{{ old('description', $medicament->description) }}" type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    Veuillez entrer le description du médicament.
                                </div>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
      
                            <div class="form-group mb-3">
                              <label for="dosage">Dosage</label>
                              <input value="{{ old('dosage', $medicament->dosage) }}" type="text" name="dosage" id="dosage" class="form-control @error('dosage') is-invalid @enderror" required>
                              <div class="invalid-feedback">
                                  Veuillez entrer le Dosage.
                              </div>
                              @error('dosage')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="form-group mb-3">
                            <label for="fabricant">Fabricant </label>
                            <input value="{{ old('fabricant', $medicament->fabricant) }}" type="text" name="fabricant" id="fabricant" class="form-control @error('fabricant') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                Veuillez entrer le fabricant du médicament.
                            </div>
                            @error('fabricant')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                          <label for="prix_unitaire">Prix unitaire</label>
                          <input value="{{ old('prix_unitaire', $medicament->prix_unitaire) }}" type="text" name="prix_unitaire" id="prix_unitaire" class="form-control @error('prix_unitaire') is-invalid @enderror" required>
                          <div class="invalid-feedback">
                              Veuillez entrer le prix_unitaire.
                          </div>
                          @error('prix_unitaire')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group mb-3">
                        <label for="quantite_en_stock">Quantité en stock</label>
                        <input value="{{ old('quantite_en_stock',$medicament->quantite_en_stock) }}" type="number" name="quantite_en_stock" id="quantite_en_stock" class="form-control @error('quantite_en_stock') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                          Veuillez entrer la quantité en stock du médicament.
                        </div>
                        @error('quantite_en_stock')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                
                      <div class="form-group mb-3">
                        <label for="date_expiration">Date d'expiration</label>
                        <input value="{{ old('date_expiration',$medicament->date_expiration) }}" type="date" name="date_expiration" id="date_expiration" class="form-control @error('date_expiration') is-invalid @enderror" required>
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
                                <option value="{{ $categorie->id }}" {{ $medicament->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom }}</option>
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
                      <label for="lieu_stockage_id">lieu de stockage</label>
                      <select name="lieu_stockage_id" id="lieu_stockage_id" class="form-control @error('lieu_stockage_id') is-invalid @enderror" required>
                          <option value="">Sélectionnez le lieu de stockage</option>
                          @foreach($lieuStockages as $lieuStockage)
                              <option value="{{ $lieuStockage->id }}" {{ $medicament->lieu_stockage_id == $lieuStockage->id ? 'selected' : '' }}>{{ $lieuStockage->nom}}</option>
                          @endforeach
                      </select>
                      <div class="invalid-feedback">
                          Veuillez sélectionner le lieu de stockage.
                      </div>
                      @error('lieus_de_tockage_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
        

                  
                  <div class="form-group mb-3">
                    <label for="emplacement_id">Emplacement</label>
                    <select name="emplacement_id" id="emplacement_id" class="form-control @error('emplacement_id') is-invalid @enderror" required>
                        <option value="">Sélectionnez une Emplacement</option>
                        @foreach($emplacements as $emplacement)
                            <option value="{{ $emplacement->id }}" {{ $medicament->emplacement_id == $emplacement->id ? 'selected' : '' }}>{{ $emplacement->nom }}</option>
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
                            <option value="">Sélectionnez un Fournisseur</option>
                            @foreach($fournisseurs as $fournisseur)
                                <option value="{{ $fournisseur->id }}" {{ $medicament->fournisseur_id == $fournisseur->id ? 'selected' : '' }}>{{ $fournisseur->nom_societe }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Veuillez sélectionner un Fournisseur.
                        </div>
                        @error('fournisseur_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
      
                              <button type="submit" class="btn btn-primary">Modifier</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
      <script>
          // Ajouter les classes Bootstrap pour la validation des formulaires
          (function() {
              'use strict';
              window.addEventListener('load', function() {
                  // Récupérer tous les formulaires auxquels nous voulons appliquer des styles Bootstrap de validation personnalisés
                  var forms = document.getElementsByClassName('needs-validation');
                  // Boucle pour empêcher la soumission du formulaire et appliquer les styles Bootstrap de validation personnalisés
                  var validation = Array.prototype.filter.call(forms, function(form) {
                      form.addEventListener('submit', function(event) {
                          if (form.checkValidity() === false) {
                              event.preventDefault();
                              event.stopPropagation();
                          }
                          form.classList.add('was-validated');
                      }, false);
                  });
              }, false);
          })();
      </script>
      
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      </body>
      </html>
      

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
