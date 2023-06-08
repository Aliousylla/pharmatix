<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pharmatix</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center text-light bg-primary my-5 p-3">
        <h1>Page de vente</h1>
    </div>
    <div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Médicaments</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <form action="{{ route('ventes.store') }}" method="post">
                @csrf
                <tbody id="tbody">
                    <!-- Boucle pour générer les lignes de médicaments -->
                    @for ($i = 0; $i < count(old('medicament_id', [''])); $i++)
                    <tr>
                        <td><input type="hidden" name="medicament_id[]" class="form-control medicament_id" value="{{ old('medicament_id.' . $i) }}"></td>
                        <td><input type="text" name="nom[]" class="form-control search-input autocomplete" value="{{ old('nom.' . $i) }}"></td>
                        <td><input type="text" name="prix_unitaire[]" class="form-control prix_unitaire" value="{{ old('prix_unitaire.' . $i) }}"></td>
                        <td>
                            <input type="text" name="quantite_vendue[]" class="form-control quantite-vendue" value="{{ old('quantite_vendue.' . $i) }}">
                            <input type="hidden" name="quantite_en_stock[]" class="quantite-en-stock" data-quantite="">
                            <span class="text-danger quantite-error" style="display: none;">La quantité demandée n'est pas disponible en stock.</span>
                        </td>
                        <td><input type="text" name="total[]" class="form-control total"></td>
                        <td><button type="button" id="add" class="btn btn-success">+</button></td>
                    </tr>
                    @endfor
                </tbody>
                <button type="button" id="submitBtn" class="btn btn-primary valider">Valider</button>
            </form>
            
            
            
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var i = 1;
            var medicamentsSelectionnes = []
            $('#add').click(function() {
                i++;
                var newRow = '<tr id="row' + i + '">' +
                    '<td><input type="hidden" name="medicament_id[]" class="form-control medicament_id"></td>'+
                    '<td><input type="text" name="nom[]" class="form-control search-input autocomplete nom"></td>' +
                    '<td><input type="text" name="prix_unitaire[]" class="form-control prix_unitaire"></td>' +
                    '<td><input type="text" name="quantite_vendue[]" class="form-control quantite-vendue"></td>' +
                    '<td><input type="text" name="total[]" class="form-control total"></td>' +
                    '<td><button type="button" id="' + i + '" class="btn btn-danger remove_row">-</button></td>' +
                    '</tr>';
                $('#tbody').append(newRow);
                initAutocomplete();
            });

            $(document).on('click', '.remove_row', function() {
                var row_id = $(this).attr("id");
                $('#row' + row_id).remove();
            });

            function initAutocomplete() {
                $('.autocomplete').autocomplete({
                    source: function(request, response) {
                        var term = request.term;
                        fetch("{{ route('searchMedicamentAutocomplete') }}?term=" + term)
                            .then(response => response.json())
                            .then(function(data) {
                            response(data.map(item => ({ value: item, label: item.nom, prix_unitaire: item.prix_unitaire,medicament_id: item.id})));
                                
                            });
                    },
                    minLength: 2,
                    select: function(event, ui) {
                        $(this).val(ui.item.label);
                        $(this).data('prix', ui.item.prix_unitaire);
                        $(this).closest('tr').find('.prix_unitaire').val(ui.item.prix_unitaire);
                        $(this).closest('tr').find('.medicament_id').val(ui.item.medicament_id);

                        return false;
                    }
                });
            }

            // Initialiser l'autocomplétion pour le premier formulaire existant
            initAutocomplete();

    $(document).on('input', '.quantite-vendue', function() {
    var quantite = $(this).val();
    var prixUnitaire = parseFloat($(this).closest('tr').find('.prix_unitaire').val().replace(',', '.'));
    var prixTotal = quantite * prixUnitaire;
    $(this).closest('tr').find('.total').val(prixTotal.toFixed(2));
    var quantiteVendue = parseFloat($(this).val().replace(',', '.'));
    var quantiteEnStock = parseFloat($(this).closest('tr').find('.quantite-en-stock').data('quantite'));
    var quantiteError = $(this).closest('tr').find('.quantite-error');
    if (quantiteVendue > quantiteEnStock) {
        quantiteError.show();
    } else {
        quantiteError.hide();
    }
});
@foreach ($medicaments as $index => $medicament)
    @php
        $quantiteEnStock = $medicament->quantite_en_stock;
    @endphp
    $('#row{{ $index + 1 }} .quantite-en-stock').val('{{ $quantiteEnStock }}');
@endforeach


$('#submitBtn').click(function() {
    var form = $('<form></form>').attr('action', "{{ route('ventes.store') }}").attr('method', 'post');
    form.append($('<input>').attr('type', 'hidden').attr('name', '_token').val('{{ csrf_token() }}'));

    $('#tbody tr').each(function() {
        var medicamentId = $(this).find('.medicament_id').val();
        var nom = $(this).find('.search-input').val();
        var prixUnitaire = $(this).find('.prix_unitaire').val();
        var quantiteVendue = $(this).find('.quantite-vendue').val();

        form.append($('<input>').attr('type', 'hidden').attr('name', 'medicament_id[]').val(medicamentId));
        form.append($('<input>').attr('type', 'hidden').attr('name', 'nom[]').val(nom));
        form.append($('<input>').attr('type', 'hidden').attr('name', 'prix_unitaire[]').val(prixUnitaire));
        form.append($('<input>').attr('type', 'hidden').attr('name', 'quantite_vendue[]').val(quantiteVendue));
    });

    $('body').append(form);
    form.submit();
});
});    
    </script>











</body>
</html>
