@extends('main_layout')
@section('content')

    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Se connecter</h5>
                    <form class="form-signin" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <input id="end-point" type="hidden" value="{{route('checkEmail')}}">
                        <div class="form-label-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" name="email"
                                   value="{{ old('email') }}" required autofocus>
                            <label for="email">Adresse E-Mail</label>
                            <strong class="invalid"></strong>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong class="invalid">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-label-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" name="password"
                                   placeholder="Password" required>
                            <label for="password">Mot de passe</label>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1"
                                   name="remember" {{ old('remember') ? 'checked' : '' }} />
                            <label class="custom-control-label" for="customCheck1">Se souvenir
                                de moi</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Se connecter
                        </button>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Mot de passe oublié?
                        </a>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {
            //setup before functions
            var typingTimer;                //timer identifier
            var doneTypingInterval = 5000;  //time in ms (5 seconds)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#email").blur(function (e) {
                doneTyping();
            });
        });

        function doneTyping() {
            const url = $('#end-point').val();
            console.log(url);
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    'email': $('#email').val()
                },
                dataType: 'json',
                success: function (data) {
                    console.log('data ' + data['status']);
                    if (data['status'] === 'failure') {
                        $('#email').css({'border': '1px solid red'});
                        $('.invalid').html('Email inexsitant').show().css({'color': 'red'});
                    }

                    else {
                        $('#email').css({'border': '1px solid green'});
                        $('.invalid').hide();
                    }
                },
                error: function (err) {
                    console.log(err.responseText);
                }
            });
        }
    </script>
@endsection
