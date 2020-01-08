@extends('main_layout')
@section('title')
    Informations utilisateurs
@endsection
@section('content')
    <div class="row user-infos cyruxx">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 offset-xs-0 offset-sm-0 offset-md-1 offset-lg-1">
            <div class="card card-primary">
                <div  class="card-header">
                    @if(session('success'))
                        <div class="alert alert-success"> {{session('success')}} </div>
                    @endif
                    <h3>Informations utilisateur</h3>
                </div>
                <div class="card-block">
                    <div class="row m-2">
                        <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
                            <img class="img-circle"
                                 src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100"
                                 alt="User Pic">
                        </div>
                        <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                            <form action="{{ route('profile.update', encrypt($user->id)) }}" method="post">
                                {{csrf_field()}}
                                {{ method_field('PUT')}}
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td><label for="nom">Nom complet</label></td>
                                        <td><strong><input class="nom" id="nom" type="text" value="{{$user->name}}"
                                                           name="name" required/></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Inscrit depuis:</td>
                                        <td>{{\Carbon\Carbon::parse($user->created_at)->format('l d F Y')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nombre de courses</td>
                                        <td><strong>{{$courseNumber}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td><label for="tel">Téléphone</label></td>
                                        <td><input id="tel" type="tel" value="{{$user->telephone}}" name="telephone">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="email"> Email</label></td>
                                        <td><input type="email" id="email" value="{{$user->email}}" name="email"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="adresse">Adresse</label></td>
                                        <td><input id="adresse" type="text" value="{{$user->adresse}}" name="adresse">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-lg btn-warning mx-auto" type="submit"
                                        data-toggle="tooltip"
                                        data-original="Edit this user">Modifier
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection