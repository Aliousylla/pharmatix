<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container p-5   ">
        <div class="card col-6 m-auto shadow-lg rounded " >
            <div class="success text-center p-2 ">
                <i class="fa-solid fa-circle-check fa-6x text-gray-800 text-success"></i>
                <h5 class="card-title text-center text-success p-3">Success</h5>
            </div>
            <div class="card-body bg-success text-center p-2 text-light">
                <h3 class="fs-1">Total  : {{ $total }} DHS</h3>
                <div class="form col-6 m-auto">
                    <label  class="p-3" for="somme_donnee">Montant donné par le client :</label>
                    <input class="form-control " type="text" name="somme_donnee" id="somme_donnee" autofocus  required>
                </div>
                <div class="resultat p-3">
                    <h3 id="resultat"></h3>
                </div>
                <a id="btn" class="btn text-success p-2 fs-4 bg-light" href="{{ route('ventes.create') }}"></a>
            </div>
            
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        // Récupérer les éléments du DOM
        const sommeDonneeInput = document.getElementById('somme_donnee');
        const resultatElement = document.getElementById('resultat');
        const btntatElement = document.getElementById('btn');
        

        // Ajouter un écouteur d'événement pour la saisie de la somme donnée
        sommeDonneeInput.addEventListener('input', function() {
            // Récupérer la somme donnée par le client
            const sommeDonnee = parseFloat(sommeDonneeInput.value);
    
            // Effectuer le calcul pour le montant à rendre
            const montantRendu = sommeDonnee - {{ $total }};
            
            // Afficher le résultat
            resultatElement.textContent = 'Montant à rendre : ' + montantRendu.toFixed(2) + ' DHS';
            btntatElement.textContent = 'ok  ';

            
        });
        
    </script>
</body>
</html>
