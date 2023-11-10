<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Facture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  </head>
  <body>
    @php
    use App\Models\Ordonnance;
   $ordonnances= Ordonnance::find($ordonnances->id)
   
@endphp
    <div class="container p-5 mx-5 shodow ">
      <div class="d-flex justify-content-between">
        <div class="item text-center">
          <h2 class="text-primary">
            <i class="fa fa-plus text-success fs-1 text-center border border-success rounded-5 p-3" aria-hidden="true"></i>
            Pharmatix</h2>
        </div>
        <div class="item text-center text-success">
          <h3>Numero Facture</h3>
      
          <h4>#000</h4>
         
          
        </div>
      </div>
      <br>
      <div class="col-4">
        <hr class="border border-success border-3 opacity-75">
      </div>
      <div class="col-4 p-2">
        <h5>Aliou Sylla</h5>
        <h5>
           151 rue Sour jdid
        </h5>
        <h5>06 900 36 669</h5>
      </div>
      <table class="table">
        <thead class="text-primary ">
          <tr >
            <th>#</th>
            <th scope="col">Medicaments</th>
            <th scope="col">Prix</th>
            <th scope="col">Quantite</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($ligneProduits as $ligneProduit)
  <tr>
    <th scope="row">{{ $ligneProduit->id }}</th>
    <td>{{ $ligneProduit->ordonnance->date }}</td>
    <td>{{ $ligneProduit->ordonnance->medecin_id }}</td>
    <td>{{ $ligneProduit->quantite }}</td>
  </tr>
@endforeach

          
          
        </tbody>
      </table>
      <div class="">
        <hr class="border border-success border-3 opacity-75">
      </div>
      <div class="container text-center">
        <div class="row">
          
          <div class="col">
          
          </div>
          <div class="col">
          <h2 class="bg-success text-light p-2">Total :  DHS</h2>
          </div>
        </div>
      </div>
      <div class="col-8">
        <hr class="border border-success border-3 opacity-75">
      </div>
      <div class="col-8">
        <h5>Pharmatx</h5>
        <p>
          L'icône traditionnelle utilisée pour représenter une pharmacie en France est une croix verte.
           Cette croix verte est souvent affichée  
          
        </p>
       </div>
    </div>
   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>