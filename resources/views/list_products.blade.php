@extends('main_layout')
@section('title')
    Liste de produits
@endsection
@section('content')
    <!-- Collapsible content -->
    <div class="row">
        <div class="col-sm-3 col-md-3 pull-right">
            <form class="navbar-form" id="mForm" role="search" action="{{route('search')}}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher un produit"
                           name="search_key" id="search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i
                                    class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-3 col-md-3 pull-left">
            @if (!Auth::guest())
                @if($user->admin)
                    <div class="collapse navbar-collapse" id="basicExampleNav">
                        <h2><a class="btn btn-primary pull-right btn-lg" href="{{ route("products.create") }}">Ajouter
                                un
                                produit</a></h2>

                    </div>
                @endif
            @endif
        </div>
    </div>

    <div class="row">
        <form method="post" action="{{ route('send-products') }}">
            {{ csrf_field() }}
            @foreach($products as $product)
                <div class="col-lg-4 col-md-12 mb-4 nopad text-center card border-0 shadow" id="products">
                    <label class="image-checkbox" title="{{ $product->title }}">
                        <img class="img-responsive card-img-top" src="{{ url('public/images/'.$product->image) }}"
                             alt="..."/>
                        <input type="checkbox" name="products[]" value="{{ $product->id }}"
                               onchange="document.getElementById('checkProducts').disabled = !this.checked;"/>
                        <i class="fa fa-check hidden"></i>
                    </label>
                    <div class="card-body text-center">
                        <h5 class="card-title mb-0">{{$product->libelle}}</h5>
                        <div class="card-text text-black-50">{{$product->price}} €</div>
                    </div>
                </div>
            @endforeach
            <div style="margin-bottom: 15px">
                @if($fromCourse == 1)
                    <input type="submit" value="Ajouter les produits à la course"
                           class="btn-lg btn-success pull-right"
                           id="checkProducts"/>
                @else
                    <input type="submit" value="Créer course" class="btn-lg btn-success pull-right"
                           id="checkProducts"/>
                @endif
            </div>
        </form>
    </div>
    <script src="{{public_path('form.js')}}"></script>
@endsection