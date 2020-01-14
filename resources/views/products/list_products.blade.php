{{--Si l'utlisateur connecté est l'administrateur on hérite la page admin sinon la page main-layout--}}
@extends(!Auth::guest() ? $user->admin? 'admin.main' : 'main_layout' : 'main_layout');
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
                <form class="form-inline ml-auto" id="form-category" role="search" action="{{route('search')}}"
                      method="post">
                    {{csrf_field()}}
                    <div class="form-control">
                        <label for="categorie"></label>
                        <select id="categorie" name="categorie">
                            <option value="all">Tous les produits</option>
                            <option value="ago">Agromalimentaire</option>
                            <option value="multimedia">Multimédia</option>
                            <option value="mode">Mode et beauté</option>
                            <option value="animaux">Animaux</option>
                            <option value="divers">Divers</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm float-xs-right">
            <div class="input-group md-form form-sm form-2 pl-0">
                <form id="form-" class="form-inline ml-auto form-category" role="search" action="{{route('search')}}"
                      method="post">
                    {{csrf_field()}}
                    <div class="md-form my-0">
                        <input class="form-control" type="text" placeholder="Rechercher un produit" aria-label="Search"
                               name="search_key">
                    </div>
                    <input type="submit" class="btn btn-outline-white btn-md my-0 ml-sm-2" value="Rechercher">
                </form>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="card col-xl-12 offset-sm-0 shadow">
            <div class="card-header">
                <h5 class="card-title text-center">Liste de Produits</h5>
            </div>
            <div class="card-body " style="padding: 2%">
                @if(count($products)!=0)

                    <form id="another" method="post" action="{{ route('send-products') }}">

                        <div class="row">

                            {{ csrf_field() }}
                            @foreach($products as $product)
                                <div class="card col-lg-4" style="border: #00BBCC">
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
                                                                @for($i=1; $i <=$product->quantity; $i++)
                                                                    <option>{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </label>

                                                    @else
                                                        <h6 class="hidden-sm alert-warning">Produit non
                                                            disponible</h6>

                                                    @endif
                                                </div>
                                                <div>
                                                    @if (!Auth::guest())
                                                        @if($user->admin)
                                                            <a class="btn btn-danger" id="delete-product"
                                                               href="{{url('/products/delete/'.$product->id)}}"
                                                               onclick="return confirm('Voulez-vous supprimer cet &#xE9;l&#xE9;ment?')">
                                                                <i class="fa fa-trash fa-lg"></i>
                                                            </a>
                                                        @endif
                                                    @endif
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
                                       class="btn-lg btn-success float-xs-right"/>
                            @else
                                <input type="submit" value="Créer course"
                                       class="btn-lg btn-success float-xs-right"
                                       id="checkProducts" disabled/>
                            @endif
                        </div>
                    </form>
                @else
                    <div class="text-warning">Aucun produit existant</div>
                @endif
            </div>


        </div>
    </div>
    <script type="text/javascript">
        $('select#categorie').change(function (e) {
            $('#form-category').submit();
        });
        $('#add-to-course').click(function () {
            console.log('add course');
            const course = $('#list-course');
            if (course.is(':hidden'))
                $('#add-to-course').show();
        })
    </script>
    =@endsection