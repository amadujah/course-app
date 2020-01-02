@extends('main_layout')
@section('title')
    Ajout d'un produit
@endsection
@section('content')
    <div>
        <h2 class="well well-lg">Ajouter un produit</h2>

        <form method="post" class="col-md-3" action="{{ route('products.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Libellé du produit</label>
                <input type="text" class="form-control" id="title" name="title"
                       placeholder="Entrer le libellé du produit" required>
            </div>
            <div class="form-group">
                <label for="price">Prix</label>
                <input type="text" class="form-control" id="price" name="price"
                       placeholder="Entrer le prix du produit" required>
            </div>
            <div class="form-group">
                <label for="type">Catégorie du produit</label>
                <select name="categorie" id="title">
                    <option>Alimentation</option>
                    <option>Loisirs</option>
                    <option>Sport</option>
                    <option>etc.</option>
                </select>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="available" name="availability" value="disponible"
                       checked>
                <label class="custom-control-label" for="available">Disponible</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="unavailable" name="availability"
                       value="indisponible">
                <label class="custom-control-label" for="unavailable">Indisponible</label>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="price" name="image" required>
            </div>
            <div class="btn-toolbar btn-group-lg" role="group">
                <button type="submit" class="btn btn-danger">Annuler</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>

        </form>
    </div>
@endsection