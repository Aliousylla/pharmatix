<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
    
        <div class="form-group">
            <label for="nom">Nom de la catégorie</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
    
        <!-- Autres champs pertinents -->
    
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
    
</body>
</html>