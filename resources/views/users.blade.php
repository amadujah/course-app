@extends('admin.main')



@section('content')

    <div class="row">
        <div class="card col-xl-12 offset-sm-0 shadow">
            <div class="row card-header">

                <div class="col-lg-12 ">

                    <h1 class="page-header">My Users</h1>

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
                    <tr>

                        <td>{{$user->id}}</td>

                        <td>{{$user->name}}</td>

                        <td>{{$user->email}}</td>

                        <td>
                            <a class="btn btn-primary"
                               href="{{url('/products/delete/'.$user->id)}}">
                                <i class="fa fa-eye fa-lg"></i>
                            </a>
                            <a class="btn btn-danger"
                               href="{{url('/products/delete/'.$user->id)}}"
                               onclick="return confirm('Voulez-vous supprimer cet &#xE9;l&#xE9;ment?')">
                                <i class="fa fa-trash fa-lg"></i>
                            </a>
                            <a class="btn btn-warning"
                               href="{{url('/products/delete/'.$user->id)}}">
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