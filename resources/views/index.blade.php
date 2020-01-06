@extends('main_layout')
@section('title')
    Accueil
@endsection

@section('content')
    <div class="carousel slide">
        <div class="row">
            <div class="carousel-inner">
                @foreach( $products as $product )
                    <div class="item @if($product->id === 1) {{ 'active' }} @endif">
                        <div class="">
                            <img src="{{ url('public/images/'.$product->image) }}" class="img-responsive img-fluid rounded mx-auto d-block">
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="left carousel-control" href="#" data-slide="prev">
                <i class="glyphicon glyphicon-chevron-left"></i>
            </a>
            <a class="right carousel-control" href="#" data-slide="next">
                <i class="glyphicon glyphicon-chevron-right"></i>
            </a>
        </div>
    </div>
@endsection
