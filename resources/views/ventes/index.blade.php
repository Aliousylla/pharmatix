@extends('layoute/layout')

@section('tableau')
    <h1>Page de Vente</h1>

    <h2>Médicaments en stock</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Prix unitaire</th>
                <th>Quantité disponible</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($medicaments as $medicament)
                <tr>
                    <td>{{ $medicament->nom }}</td>
                    <td>{{ $medicament->categorie->nom }}</td>
                    <td>{{ $medicament->prix_unitaire }}</td>
                    <td>{{ $medicament->quantite_en_stock }}</td>
                    <td>
                        <form action="{{ route('ventes.ajouterAuPanier') }}" method="post">
                            @csrf
                            <input type="hidden" name="medicament_id" value="{{ $medicament->id }}">
                            <input type="number" name="quantite" min="1" max="{{ $medicament->quantite_en_stock }}" required>
                            @error('quantite')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                                                        
                            <button type="submit">Ajouter au panier</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
    <!-- Button -->
    
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#panierModal">Voir le panier</button>

<!-- Modal -->
<div class="modal fade" id="panierModal" tabindex="-1" aria-labelledby="panierModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="panierModalLabel">Panier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th>Médicament</th>
              <th>Quantité</th>
              <th>Prix unitaire</th>
              <th>Prix total</th>
            </tr>
          </thead>
          <tbody>
            @if (!empty($panier))
              @php
              $total = 0;
              @endphp

              @foreach ($panier as $item)
                <tr>
                  <td>{{ $item['medicament']->nom }}</td>
                  <td>{{ $item['quantite_vendue'] }}</td>
                  <td>{{ $item['medicament']->prix_unitaire }}</td>
                  <td>{{ $item['prix_total'] }}</td>
                </tr>
                @php
                $total += $item['prix_total'];
                @endphp
              @endforeach

              <tfoot>
                <tr>
                  <th colspan="3">Total</th>
                  <th>{{ $total }}</th>
                </tr>
              </tfoot>
            @endif
          </tbody>
        </table>

        <form action="{{ route('vente.valider-vente') }}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary">Valider la vente</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
<head>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


