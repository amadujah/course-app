@extends('main_layout')
@section('title')
    Liste de produits
@endsection
@section('content')
    <!-- Collapsible content -->
    <div class="row">
        <div class="col-sm-3 col-md-3 float-xs-left">
            @if (!Auth::guest())
                @if($user->admin)
                    <h2><a class="btn btn-primary float-xs-right btn-lg" href="{{ route("products.create") }}">Ajouter
                            un
                            produit</a></h2>

                @endif
            @endif
        </div>
        <!-- Search form -->

        <div class="col-sm float-xs-right">
            <div class="input-group md-form form-sm form-2 pl-0">
                <form class="form-inline ml-auto" role="search" action="{{route('search')}}">
                    <div class="md-form my-0">
                        <input class="form-control" type="text" placeholder="Rechercher un produit" aria-label="Search" name="search_key">
                    </div>
                    <button href="#!" class="btn btn-outline-white btn-md my-0 ml-sm-2" type="submit">Search</button>
                </form>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="card-group">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="card-title text-center">Produits disponibles</h5>
                </div>
                <div class="card-block " style="padding: 2%">
                    <form method="post" action="{{ route('send-products') }}">

                        <div class="row">

                            {{ csrf_field() }}
                            @foreach($products as $product)
                                <div class="col-sm-4" style="border: #00BBCC">
                                    <div class="card shadow" style="width: 20rem;">
                                        <div class="text-xs-center products card-img-top">
                                            <label class="" title="{{ $product->title }}">

                                                <img class="img-fluid card-img-top"
                                                     src="{{ url('public/images/'.$product->image) }}"
                                                     alt="..." width="350px" height="260px"
                                                     style="max-width: 100%; max-height: 100%"/>

                                                <input type="checkbox" class="custom-checkbox center_div"
                                                       name="products[]"
                                                       value="{{ $product->id }}"
                                                       {{$product->quantity <=0 ? 'disabled': ''}}
                                                       onchange="document.getElementById('checkProducts').disabled = !this.checked;"/>
                                            </label>
                                        </div>
                                        <div class="card-body align-content-center">
                                            <div class="info">
                                                <div class="row" style="background: transparent">
                                                    <div class="col">
                                                        <h5 class="card-title ">{{$product->libelle}}</h5>
                                                    </div>
                                                    <div class="col">
                                                        <h5 class="price-text-color">
                                                            {{$product->price}} €</h5>
                                                    </div>
                                                    <div class="w-100"></div>
                                                    <div class="col">
                                                        @if($product->quantity)
                                                            <label>
                                                                <select class="custom-select">
                                                                    @for($i=1; $i <$product->quantity; $i++)
                                                                        <option>{{$i}}</option>
                                                                    @endfor
                                                                </select>
                                                            </label>
                                                        @else
                                                            <h6 class="hidden-sm alert-warning">Produit non
                                                                disponible</h6>

                                                        @endif
                                                    </div>
                                                    <div class="col">
                                                            <input type="submit"
                                                                   href="http://www.jquery2dotnet.com"
                                                                   class=" btn btn-primary"
                                                                   value="Ajouter à une course" {{$product->quantity <=0 ? 'disabled': ''}}/>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <div style="margin-bottom: 15px" class="float-left">
                            @if($fromCourse == 1)
                                <input type="submit" value="Ajouter les produits à la course"
                                       class="btn-lg btn-success float-xs-right"
                                       id="checkProducts" disabled/>
                            @else
                                <input type="submit" value="Créer course"
                                       class="btn-lg btn-success float-xs-right"
                                       id="checkProducts" disabled/>
                            @endif
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </div>
    <script src="{{public_path('form.js')}}"></script>
@endsection