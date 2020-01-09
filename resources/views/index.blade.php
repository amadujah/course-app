@extends('main_layout')
@section('title')
    Accueil
@endsection

@section('content')
    <div class="row">
        <div class="row">
            <div class="float-right">
                <!-- Controls -->
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-primary" href="#carousel-example-generic"
                       data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-primary"
                                                href="#carousel-example-generic"
                                                data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item {{ $items <= 4 ? 'active' : '' }}">
                    <div class="row">
                        @foreach( $products as $product )

                            <div class="col-sm-4">
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{ url('public/images/'.$product->image) }}" class="img-responsive"
                                             alt="" width="350" height="260"/>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-6">
                                                <h5>{{$product->libelle}}</h5>
                                                <h5 class="price-text-color">
                                                    {{$product->price}} €</h5>
                                            </div>
                                            <div class="rating hidden-sm col-md-6">
                                                <i class="price-text-color fa fa-star"></i><i
                                                        class="price-text-color fa fa-star">
                                                </i><i class="price-text-color fa fa-star"></i><i
                                                        class="price-text-color fa fa-star">
                                                </i><i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="fa fa-shopping-cart"></i><a
                                                        href="#"
                                                        class="hidden-sm">Ajouter à une
                                                    course</a></p>
                                            <p class="btn-details">
                                                <i class="fa fa-list"></i><a href="#"
                                                                             class="hidden-sm">plus de details</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
