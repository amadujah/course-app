@extends('main_layout')
@section('title')
    Informations utilisateurs
@endsection
@section('content')
    <div class="container">
        <div class="row user-infos cyruxx">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        @if(session('success'))
                            <div class="alert alert-success"> {{session('success')}} </div>
                        @endif
                        <h3 class="panel-title">Informations utilisateur</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
                                <img class="img-circle"
                                     src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100"
                                     alt="User Pic">
                            </div>
                            <div class="col-xs-2 col-sm-2 hidden-md hidden-lg">
                                <img class="img-circle"
                                     src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=50"
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
                                            <td><strong><input class="nom" id="nom" type="text" value="{{$user->name}}" name="name" required /></strong></td>
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
                                            <td>Téléphone</td>
                                            <td><input type="tel" value="{{$user->telephone}}" name="telephone"></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><input type="email" value="{{$user->email}}" name="email"></td>
                                        </tr>
                                        <tr>
                                            <td>Adresse</td>
                                            <td><input type="text" value="{{$user->adresse}}" name="adresse"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-sm btn-warning center-block" type="submit"
                                            data-toggle="tooltip"
                                            data-original-title="Edit this user"><i
                                                class="glyphicon glyphicon-edit">Modifier</i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sm btn-primary" type="button"
                                data-toggle="tooltip"
                                data-original-title="Send message to user"><i class="glyphicon glyphicon-envelope"></i>
                        </button>
                        <span class="pull-right">
                            <button class="btn btn-sm btn-danger" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Remove this user"><i
                                        class="glyphicon glyphicon-remove"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection