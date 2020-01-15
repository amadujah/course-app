@extends('admin.main')



@section('content')

    <div class="row">
        <div class="card col-xl-12 offset-sm-0 shadow">
            <div class="row card-header">

                <div class="col-lg-12 ">

                    <h1 class="page-header">Liste des utilisateurs</h1>

                </div>

            </div>

            <!-- /.row -->


            <table class="card-body table table-striped table-bordered table-hover">

                <thead>

                <tr>

                    <th>#</th>

                    <th>Nom</th>

                    <th>Email</th>

                    <th>Action</th>

                </tr>

                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr class="text-center">

                        <td>{{$user->id}}</td>

                        <td>{{$user->name}}</td>

                        <td>{{$user->email}}</td>

                        <td>
                            <a class="btn btn-primary"
                               href="{{route('profile.show', $user->id)}}">
                                <i class="fa fa-eye fa-lg"></i>
                            </a>
                            <form method="POST" action="{{route('profile.destroy', $user->id)}}" class="btn">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Voulez-vous supprimer cet &#xE9;l&#xE9;ment?')">
                                    <i class="fa fa-trash fa-lg"></i>
                                </button>
                            </form>
                            <a class="btn btn-warning"
                               href="{{route('profile.show', $user->id)}}">
                                <i class="fa fa-edit fa-lg"></i>
                            </a>
                        </td>

                    </tr>
                @endforeach


                </tbody>

            </table>

        </div>
    </div>
@endsection