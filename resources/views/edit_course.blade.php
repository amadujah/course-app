@extends("main_layout")
@section('title')
    Modification de course
@endsection

@section('content')
    <h2>Modification de la course</h2>
    <form class="col-md-3" method="post" action="{{route("courses.update", $id)}}">
        {{ csrf_field() }}
        {{ method_field('PUT')}}
        <div class="form-group">
            <label for="libelleCourse">Libellé de la course</label>
            <input type="text" class="form-control" id="libelleCourse" name="title"
                   value="{{$course->libelle}}" placeholder="Entrer le libellé de la course" required>
        </div>

        <label>Produits</label>
        @if(isset($course->products))
            <input type="hidden" value="{{json_encode($course->products)}}" name="products">
            <div class="row">
                @foreach($course->products as $product)
                    <div class="col-lg-4">
                        <img class="img-thumbnail" src="{{ url('public/images/'.$product->image) }}"
                             alt="image du produit">
                    </div>
                @endforeach
            </div>
        @else
            <div>
                <h3><a href="{{ route('products.index') }}">Choisir les produits</a></h3>
            </div>
        @endif
        <div class="form-group">
            <label for="libelleCourse">Montant de la course</label>
            <input type="text" class="form-control" id="libelleCourse" name="amount"
                   value="{{$course->amount}}" required>
        </div>
        <div class="form-group">
            <p>Selectionner l'état de la course</p>
            <div>
                <input type="radio" id="effectue" name="status" value="effectue"
                >
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
                   placeholder="01/01/2019" value="{{$course->date}}" required>
        </div>
        <div class="btn-toolbar btn-group-lg" role="group" aria-label="">
            <button type="submit" class="btn btn-danger" onclick="reset(this)">Annuler</button>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
@endsection