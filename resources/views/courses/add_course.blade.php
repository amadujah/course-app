{{--Si l'utlisateur connecté est l'administrateur on hérite la page admin sinon la page main-layout--}}
@extends(!Auth::guest() ? \Illuminate\Support\Facades\Auth::user()->admin? 'admin.main' : 'main_layout' : 'main_layout');@section('title')
@section('title')
    Ajout de courses
@endsection

@section('content')
    <div class="col-md-8 offset-md-2">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title text-center">Ajout d'une course</h5>
            </div>
            <div class="card-block " style="padding: 2%">
                <form method="post" action="{{route("courses.store")}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="libelleCourse">Libellé de la course</label>
                        <input type="text" class="form-control" id="libelleCourse" name="title"
                               placeholder="Entrer le libellé de la course" required
                               value="{{old('title')}}">
                    </div>

                    <label>Produits</label>
                    @if(isset($productsArray))
                        <input type="hidden" value="{{json_encode($productsArray)}}" name="products">
                        <div class="row image">
                            @foreach($productsArray as $productKey => $product)
                                <div class="col-lg-4 actions">
                                    <a href="#" class="fa fa-trash fa-lg"
                                       style="z-index :1;">{{$product->unset}}</a>


                                    <img class="img-thumbnail" src="{{ url('public/images/'.$product->image) }}"
                                         alt="image du produit">

                                </div>
                            @endforeach
                            <h3><a id="loadProducts" href="{{ route('products.index', ['fromCourse' => 1]) }}"
                                   class="fa fa-plus fa-lg" aria-required="true" onclick="saveItemsLocally()"></a>
                            </h3>
                        </div>
                    @else
                        <div>
                            <h3><a id="loadProducts" href="{{ route('products.index', ['fromCourse' => 1]) }}"
                                   aria-required="true" onclick="saveItemsLocally()">Choisir
                                    les produits</a>
                            </h3>
                            <p class="text-danger">{{$errors->first('products')}}</p>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="libelleCourse">Montant de la course</label>
                        <input type="text" class="form-control" id="libelleCourse" name="amount" required
                               value="{{$montant}}"
                               disabled>
                    </div>
                    <div class="form-group">
                        <p>Selectionner l'état de la course</p>
                        <div>
                            <input type="radio" id="effectue" name="status" value="effectue"
                                   disabled>
                            <label for="effectue">Effectué</label>
                        </div>
                        <div>
                            <input type="radio" id="attente" name="status" value="en attente" checked>
                            <label for="attente">En attente</label>
                        </div>
                    </div>
                    <div class="form-group input-append date form_datetime">
                        <label for="date">Date de la course</label>
                        <input type="date" class="form-control" id="date" name="date"
                               placeholder="01/01/2019" required>
                    </div>

                    <a type="submit" class="btn btn-danger btn-lg" href="{{ route('courses.index') }}"
                       style="color: white">Annuler</a>

                    <button type="submit" class="btn btn-success btn-lg" {{ !isset($productsArray) ?'disabled' : ''}}>
                        Enregistrer
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#libelleCourse').val(sessionStorage.getItem('libelle'));
            sessionStorage.setItem('libelle', '');
        })
    </script>
@endsection