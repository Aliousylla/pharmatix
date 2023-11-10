@extends('layoute/layout')
@section('titre')
Liste des fournisseurs
@endsection

    
   @section('tableau')
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom de l'entreprise</th>
        <th scope="col">nom de l'agent</th>
        <th scope="col">Adresse</th>
        <th scope="col">Numero Telephone</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom de l'entreprise</th> 
        <th scope="col">nom de l'agent</th>
        <th scope="col">Adresse</th>
        <th scope="col">Numero Telephone</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
        </tr>
    </tfoot>
    <tbody>
      @foreach($fournisseurs as $fournisseur)
      <tr>
        <th scope="row">{{ $fournisseur->id }}</th>
        <td>{{ $fournisseur->nom_societe }}</td>
        <td>{{ $fournisseur->nom_contact }}</td>
        <td>{{ $fournisseur->adresse }}</td>
        <td>{{ $fournisseur->numero_telephone }}</td>
        <td>{{ $fournisseur->adresse_email }}</td>
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
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Ajouter un fournisseur <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Ajout d'un fournisseur</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('fournisseurs.store') }}">
              @csrf

              <div class="form-group mb-3">
                <label for="nom_societe">Nom du societet</label>
                <input value="{{ old('nom_societe') }}" type="text" name="nom_societe" id="nom_societe" class="form-control @error('nom_societe') is-invalid @enderror" required>
                <div class="invalid-feedback">
                  Veuillez entrer le nom du societe.
                </div>
                @error('nom_societe')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group mb-3">
                <label for="nom_contact">nom_contact</label>
                <input value="{{ old('nom_contact') }}" type="text" name="nom_contact" id="nom_contact" class="form-control @error('nom_contact') is-invalid @enderror" required>
                
                <div class="invalid-feedback">
                  Veuillez entrer la nom de L'agent.
                </div>
                @error('nom_contact')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group mb-3">
                <label for="adresse">Adresse</label>
                <input value="{{ old('adresse') }}" type="text" name="adresse" id="adresse" class="form-control @error('adresse') is-invalid @enderror" required>
                <div class="invalid-feedback">
                  Veuillez entrer l'adresse 
                </div>
                @error('adresse')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group mb-3">
                <label for="numero_telephone">Numero de telephone</label>
                <input value="{{ old('numero_telephone') }}" type="text" name="numero_telephone" id="numero_telephone" class="form-control @error('numero_telephone') is-invalid @enderror" required>
                <div class="invalid-feedback">
                  Veuillez entrer le numero de telephone.
                </div>
                @error('numero_telephone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group mb-3">
                <label for="adresse_email">Email</label>
                <input value="{{ old('adresse_email') }}" type="email" name="adresse_email" id="adresse_email" class="form-control @error('adresse_email') is-invalid @enderror"  required>
                <div class="invalid-feedback">
                  Veuillez entrer l'adresse emai.
                </div>
                @error('adresse_email')
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
       <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="editModalLabel">Edition du fournisseur</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <form method="POST" action="{{ route('fournisseurs.update', $fournisseur->id) }}" class="needs-validation" novalidate>
                           @csrf
                           @method('PUT')
   
                           <div class="form-group mb-3">
                               <label for="nom_societe">Nom de l'entreprise</label>
                               <input value="{{ old('nom_societe', $fournisseur->nom_societe) }}" type="text" name="nom_societe" id="nom_societe" class="form-control @error('nom_societe') is-invalid @enderror" required>
                               <div class="invalid-feedback">
                                   Veuillez entrer le nom_societe de l'entreprise.
                               </div>
                               @error('nom_societe')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>
                           <div class="form-group mb-3">
                             <label for="nom_contact">nom_contact</label>
                             <input value="{{ old('nom_contact', $fournisseur->nom_contact) }}" type="text" name="nom_contact" id="nom_contact" class="form-control @error('nom_contact') is-invalid @enderror" required>
                             <div class="invalid-feedback">
                                 Veuillez entrer le nom de l'agent
                             </div>
                             @error('nom_contact')
                             <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                         </div>
   
                         <div class="form-group mb-3">
                           <label for="adresse">Adresse</label>
                           <input value="{{ old('adresse', $fournisseur->adresse) }}" type="text" name="adresse" id="adresse" class="form-control @error('adresse') is-invalid @enderror" required>
                           <div class="invalid-feedback">
                               Veuillez entrer le adresse.
                           </div>
                           @error('adresse')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                       <div class="form-group mb-3">
                         <label for="numero_telephone">Numero telephone </label>
                         <input value="{{ old('numero_telephone', $fournisseur->numero_telephone) }}" type="text" name="numero_telephone" id="numero_telephone" class="form-control @error('numero_telephone') is-invalid @enderror" required>
                         <div class="invalid-feedback">
                             Veuillez entrer le numero de telephone .
                         </div>
                         @error('numero_telephone')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     <div class="form-group mb-3">
                       <label for="adresse_email">Email</label>
                       <input value="{{ old('adresse_email', $fournisseur->adresse_email) }}" type="email" name="adresse_email" id="adresse_email" class="form-control @error('adresse_email') is-invalid @enderror" required>
                       <div class="invalid-feedback">
                           Veuillez entrer l'e 'adresse email.
                       </div>
                       @error('adresse_email')
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
                   <div class="#destroytModal modal-sm"><form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST" style="display: inline-block;">
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

 

 