<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails du médicament</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
      <h1>Détails du médicament {{ $medicament->nom }}</h1>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Nom : {{ $medicament->nom }}</h5>
          <p class="card-text">Description : {{ $medicament->description }}</p>
          <p class="card-text">Dosage : {{ $medicament->dosage }}</p>
          <p class="card-text">Fabricant : {{ $medicament->fabricant }}</p>
          <p class="card-text">Prix unitaire : {{ $medicament->prix_unitaire }}</p>
          <p class="card-text">Quantité en stock : {{ $medicament->quantite_en_stock }}</p>
          <p class="card-text">Date d'expiration : {{ $medicament->date_expiration }}</p>
          <p class="card-text">Catégorie : {{ $medicament->categorie->nom }}</p>
          <p class="card-text">zone : {{ $medicament->emplacement->zone }}</p>
          <p class="card-text">Étagère  : {{ $medicament->emplacement->etage }}</p>
          <p class="card-text">Tiroir : {{ $medicament->emplacement->tiroir }}</p>
          <p class="card-text">lieu : {{ $medicament->lieuStockage->nom}}</p>
          <p class="card-text">Adresse : {{ $medicament->lieuStockage->adresse}}</p>
        </div>
      </div>
      <a href="{{ route('medicaments.edit', $medicament->id) }}" class="btn btn-primary">Modifier</a>

      <form action="{{ route('medicaments.destroy', $medicament->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce médicament ?')">Supprimer</button>
      </form>
      <a href="{{ route('medicaments.index') }}" class="btn btn-primary mt-3">Retour à la liste des médicaments</a>
    </div>
   
  </td>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
