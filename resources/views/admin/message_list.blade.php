@extends(!Auth::guest() ? \Illuminate\Support\Facades\Auth::user()->admin? 'admin.main' : 'main_layout' : 'main_layout');@section('title')
@section('title')
    Liste des messages
@endsection
@section('content')

    <div class="row">
        <div class="card col-xl-12 offset-sm-0 shadow">
            <div class="row card-header">

                <div class="col-lg-12 ">

                    <h1 class="page-header">Liste des messages reçus</h1>

                </div>

            </div>
            <table class="card-body table table-striped table-bordered table-hover">

                <thead>

                <tr>

                    <th>Nom</th>
                    <th>Email</th>
                    <th>Contenu</th>
                    <th>Date</th>
                    <th>Action</th>

                </tr>

                </thead>

                <tbody>
                @foreach($messages as $message)
                    <tr class="text-center">

                        <td><strong>{{$message->name}}</strong></td>

                        <td>{{$message->email}}</td>
                        <td>
                            {{--   Afficher les 150 premiers caractères du message                        --}}
                            {{ str_limit($message->message, $limit = 20, $end = '...') }}
                        </td>

                        <td>{{\Carbon\Carbon::parse($message->created_at)->format('d M. Y à H:m:s')}}</td>

                        <td>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#theModal"
                               href="#">
                                <i class="fa fa-eye fa-lg"></i>
                            </a>

                            <form method="POST" action="{{route('messages.destroy', $message->id)}}" class="btn">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Voulez-vous supprimer cet &#xE9;l&#xE9;ment?')">
                                    <i class="fa fa-trash fa-lg"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                    <div class="modal fade" id="theModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$message->subject}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{$message->message}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                </tbody>

            </table>


        </div>
    </div>
    <script>
        $('#theModal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
        });

    </script>
@endsection
