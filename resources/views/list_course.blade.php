@extends('main_layout')
@section('title')
    Liste des courses
@endsection

@section('content')
    <a class="left btn btn-primary" href="{{ route("courses.create") }}">Ajouter une course</a>
    @if(session('success'))
        <div class="alert alert-success"> {{session('success')}} </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Intitulé</th>
            <th scope="col">Produits</th>
            <th scope="col">Etat</th>
            <th scope="col">date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <th scope="row">{{$course->libelle}}</th>
                <td>
                    @foreach($course->products as $product)
                        <ol class="list-group">
                            <li class="list-group-item">{{$product->libelle}} | {{$product->price}} €</li>
                        </ol>
                    @endforeach
                </td>
                <td>{{ $course->etat}}</td>
                <td class="date-course">
                    {{\Carbon\Carbon::parse($course->date)->format('l d F Y')}}
                </td>
                <td>
                    <a class="btn btn-warning" href="{{route('courses.edit', $course->id)}}">Modifier</a>
                    <a class="btn btn-info" href="{{route('courses.show', $course->id)}}">Détails</a>
                    <form action="{{route('courses.destroy', $course->id)}}" method="post" class="label">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Voulez-vous supprimer cet élément?')">Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
