@extends('main_layout')
@section('title')
    Détails de la course

@endsection

@section('content')
    <div class="container">
        <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <h2>{{$course->libelle }} du {{\Carbon\Carbon::parse($course->date)->format('l d F Y')}}</h2>
                <div class="clearfix"></div>
                <hr>

            </div>
            <div class="card-body">
                @foreach($course->products as $product)
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                            <img class="img-responsive" src="{{ url('public/images/'.$product->image) }}" alt="prewiew"
                                 width="120"
                                 height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong>{{ $product->libelle }}</strong></h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong>{{$product->price}} €</strong></h6>
                            </div>
                        </div>
                    </div>
                    <hr>

                @endforeach
                <hr>
            </div>
            <div class="center-block">
                <form action="">
                    <input type="submit" href="" class="btn btn-outline-secondary pull-right"
                           value="Ajouter un ticket">
                </form>

                <a href="" class="btn btn-outline-secondary pull-right">
                    Partager la course
                </a>
                <a href="{{\Illuminate\Support\Facades\URL::previous()}}" class="btn btn-primary pull-left">
                    Retour à mes courses
                </a>
            </div>
        </div>
    </div>
@endsection