@extends("main_layout")
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
                               value="{{session('user')['title']}}">
                    </div>

                    <label>Produits</label>
                    @if(isset($productsArray))
                        <input type="hidden" value="{{json_encode($productsArray)}}" name="products">
                        <div class="row">
                            @foreach($productsArray as $product)
                                <div class="col-lg-4">
                                    <img class="img-thumbnail" src="{{ url('public/images/'.$product->image) }}"
                                         alt="image du produit">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div>
                            <h3><a href="{{ route('products.index', ['fromCourse' => 1]) }}">Choisir les produits</a>
                            </h3>
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

                    <a type="submit" class="btn btn-danger btn-lg" href="{{url()->previous()}}" style="color: white">Annuler</a>

                    <button type="submit" class="btn btn-success btn-lg">Enregistrer</button>
                </form>
                <script type="text/javascript">
                    document.getElementsByClassName('form_datetime').datetimepicker({
                        format: "dd MM yyyy - hh:ii",
                        autoclose: true,
                        todayBtn: true,
                        pickerPosition: "bottom-left"
                    });
                </script>
            </div>
        </div>
    </div>
@endsection