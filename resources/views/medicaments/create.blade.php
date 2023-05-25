
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    
 <div class="container">
    <form method="POST" action="{{ route('medicaments.store') }}">
        @csrf
    
        <div class="form-group mb-3">
            <label for="nom">Nom du médicament</label>
            <input value="{{old('nom')}}" type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror " required>
            <div class="invalid-feedback">
                Veuillez entrer le nom du médicament.
            </div>
            @error('niveau')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        </div>
    
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea value="{{old('description')}}" name="description" id="description" class="form-control @error('description') is-invalid @enderror " required></textarea>
            <div class="invalid-feedback">
                Veuillez entrer la description du médicament.
            </div>
        </div>
    
        <div class="form-group mb-3">
            <label for="dosage">Dosage</label>
            <input value="{{old('dosage')}}" type="text" name="dosage" id="dosage" class="form-control @error('dosage') is-invalid 
              @enderror " required>
            <div class="invalid-feedback">
                Veuillez entrer le dosage du médicament.
            </div>
        </div>
    
        <div class="form-group mb-3">
            <label for="fabricant">Fabricant</label>
            <input value="{{old('fabricant')}}" type="text" name="fabricant" id="fabricant" class="form-control @error('fabricant') is-invalid 
              @enderror " required>
            <div class="invalid-feedback">
                Veuillez entrer le fabricant du médicament.
            </div>
        </div>
    
        <div class="form-group mb-3">
            <label for="prix_unitaire">Prix unitaire</label>
            <input value="{{old('prix_unitaire')}}" type="number" name="prix_unitaire" id="prix_unitaire" class="form-control @error('prix_unitaire') is-invalid 
              @enderror " step="0.01" required>
            <div class="invalid-feedback">
                Veuillez entrer le prix unitaire du médicament.
            </div>
        </div>
    
        <div class="form-group mb-3">
            <label for="quantite_en_stock">Quantité en stock</label>
            <input value="{{old('quantite_en_stock')}}" type="number" name="quantite_en_stock" id="quantite_en_stock" class="form-control @error('quantite_en_stock') is-invalid 
              @enderror " required>
            <div class="invalid-feedback">
                Veuillez entrer la quantité en stock du médicament.
            </div>
        </div>
    
        <div class="form-group mb-3">
            <label for="date_expiration">Date d'expiration</label>
            <input value="{{old('date_expiration')}}" type="date" name="date_expiration" id="date_expiration" class="form-control @error('date_expiration') is-invalid 
              @enderror " required>
            <div class="invalid-feedback">
                Veuillez entrer la date d'expiration du médicament.
            </div>
        </div>
    
        <div class="form-group mb-3">
            <label for="categorie_id">Catégorie</label>
            <select name="categorie_id" id="categorie_id" class="form-control @error('categorie_id') is-invalid @enderror " required>
                <option value="">Sélectionnez une catégorie</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id}}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
            {{-- <select name="categorie_id" id="categorie_id" class="form-control @error('categorie_id') is-invalid @enderror" required> --}}

            <div class="invalid-feedback">
                Veuillez sélectionner une catégorie.
            </div>
        </div>
    
        <!-- Autres champs pertinents -->
    
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
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
```

