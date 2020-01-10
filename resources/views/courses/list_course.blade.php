@extends('main_layout')
@section('title')
    Liste des courses
@endsection

@section('content')
    <div class="card col-xl-12 offset-sm-0">
        <div class="card-header"><a class="left btn btn-primary" href="{{ route("courses.create")}}">Ajouter une
                course</a>
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
        </div>
        @if(count($courses)!=0)
            <section class="pricing py-5">
                <div class="container">
                    <div class="row">
                        <!-- Free Tier -->
                        @foreach($courses as $course)
                            <div class="col-lg-4">
                                <div class="card mb-5 mb-lg-0">
                                    <div class="card-body">
                                        <?php \Carbon\Carbon::setLocale('fr')?>
                                        <h4 class="card-title text-muted text-uppercase text-center">{{\Carbon\Carbon::parse($course->date)->format('l d F Y')}}</h4>
                                        <h4 class="card-title text-center">{{ $course->libelle }}</h4>
                                        <h3 class="card-title text-center btn-outline-">{{ $course->etat }}</h3>
                                        <hr>
                                        @foreach($course->products as $product)

                                            <ul class="fa-ul">
                                                <li class="list-group-item">{{$product->libelle}}
                                                    | {{$product->price}} €
                                                </li>

                                            </ul>
                                        @endforeach
                                        <a class="btn btn-warning"
                                           href="{{route('courses.edit', $course->id)}}"><i
                                                    class="fa fa-edit fa-lg"></i></a>
                                        <a
                                                class="btn btn-info"
                                                href="{{route('courses.show', $course->id)}}"><i
                                                    class="fa fa-eye fa-lg"></i></a>
                                        <form action="{{route('courses.destroy', $course->id)}}"
                                              method="post" class="btn">{{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit"
                                                    onclick="return confirm('Voulez-vous supprimer cet &#xE9;l&#xE9;ment?')">
                                                <i class="fa fa-trash fa-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <p class="text-warning justify-content-md-center">pas de courses existantes</p>
        @endif
    </div>

@endsection
