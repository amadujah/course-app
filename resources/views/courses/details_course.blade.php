@extends('main_layout')
@section('title')
    Détails de la course

@endsection

@section('content')
    <div class="card shopping-cart">
        <div class="card card-primary">
            <div class="card-header">
                {{--Mettre la premiere lette du libellé en majuscule--}}
                <h3 class="card-title text-center">{{ucfirst($course->libelle)}}
                    du {{\Carbon\Carbon::parse($course->date)->format('l d F Y')}}</h3>
            </div>
            <div class="card-block">
                <div class="card-body">
                    @foreach($course->products as $product)
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-2 text-xs-center">
                                <img class="img-fluid" src="{{ url('public/images/'.$product->image) }}"
                                     alt="prewiew"
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
                    @if($course->receipt)
                        <a href="#" class="pop">
                            <img src="{{ url('public/receipts/'.$course->receipt) }}"
                                 style="width: 40px; height: 26px;" alt="reçu">
                            Afficher le reçu de la course
                        </a>

                        <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal"><span
                                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                        </button>
                                        <img src="" class="imagepreview" style="width: 100%; height: auto"
                                             alt="product">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="row" style="margin: 2%">
            <div class="col-sm-6 float-xs-left">
                <div class="row justify-content-between" style="margin: auto">
                    <a href="{{url()->previous()}}" class="btn btn-warning btn-lg col-sm-6 float-xs-left">
                        Retour à mes courses
                    </a>
                    <a href="" class="btn btn-primary btn-lg col-sm-6 float-xs-right">
                        Partager la course
                    </a>
                </div>
            </div>
            <div class="col-sm-6 float-xs-right">
                <form action="{{route('add-receipt', ['courseId' => $course->id])}}" class="form-row form-inline"
                      method="post"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <input type="file" class="btn btn-outline-secondary"
                               name="receipt" required/>
                    </div>
                    <button type="submit" class="btn-success mx-auto">Valider</button>

                </form>
            </div>

        </div>

    </div>
    <script>
        $(function () {
            $('.pop').on('click', function () {
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                $('#imagemodal').modal('show');
            });
        });
    </script>
@endsection