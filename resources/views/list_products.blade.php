@extends('main_layout')
@section('title')
    Liste de produits
@endsection
@section('content')

    <div class="container">

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">
            <h2><a class="btn btn-primary pull-right btn-lg" href="{{ route("products.create") }}">Ajouter un
                    produit</a></h2>

        </div>
        <form method="post" action="{{ route('send-products') }}">
            <div class="row">

                {{ csrf_field() }}
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-12 mb-4 nopad text-center">
                        <label for="check" class="image-checkbox" title="{{ $product->title }}">
                            <img class="img-responsive" src="{{ url('public/images/'.$product->image) }}" alt=""/>
                            <input type="checkbox" name="products[]" value="{{ $product->id }}" id="check"
                                   onchange="document.getElementById('checkProducts').disabled = !this.checked;"/>
                            <i class="fa fa-check hidden"></i>
                        </label>


                    </div>
                @endforeach
            </div>
            <div style="margin-bottom: 15px">
                @if($fromCourse == 1)
                    <input type="submit" value="Ajouter les produits à la course" class="btn-lg btn-success pull-right"
                           id="checkProducts"/>
                @else
                    <input type="submit" value="Créer course" class="btn-lg btn-success pull-right" id="checkProducts"/>
                @endif
            </div>

        </form>
    </div>
    <script src="{{public_path('form.js')}}"></script>
@endsection