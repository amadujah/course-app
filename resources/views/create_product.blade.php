@extends('main_layout')
@section('title')
    Ajout d'un produit
@endsection
@section('content')
    <div class="col-lg-10 offset-sm-0 offset-md-1 offset-lg-1">
        <div class="card card-primary add-product" style="margin-right: 10%; margin-left: 10%">
            <div class="card-header">
                <h2>Ajout d'un produit</h2>
            </div>
            <div class="card-block"  style="padding: 2%">
                <form method="post" class="" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Libellé du produit</label>
                        <input type="text" class="form-control register" id="title" name="title"
                               placeholder="Entrer le libellé du produit" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Prix (en €)</label>
                        <input type="number" class="form-control register" id="price" name="price"
                               placeholder="Entrer le prix du produit" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantité</label>
                        <input type="number" class="form-control register" id="quantity" name="quantity"
                               placeholder="Entrer la quantité de produits" required>
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
                    <div class="">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input register" id="available"
                                   name="availability"
                                   value="disponible"
                                   checked>
                            <label class="custom-control-label" for="available">Disponible</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input register" id="unavailable"
                                   name="availability"
                                   value="indisponible">
                            <label class="custom-control-label" for="unavailable">Indisponible</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control register" id="file" name="image" required>
                    </div>
                    <div class="btn-toolbar btn-group-lg float-xs-right" role="group">
                        <button type="reset" class="btn btn-danger" onclick="window.history.back()">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection