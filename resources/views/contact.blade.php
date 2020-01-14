@extends('main_layout')
@section('title')
    Contact
@endsection
@section('content')
    <section class="mb-4">
        <div class="card">
            <div class="card-header">
                <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>

                <p class="text-center w-responsive mx-auto mb-5">Avez-vous des questions? N'hésitez pas à nous contacter
                    directement. Notre équipe reviendra vers vous en quelques heures pour vous aider.</p>
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
            </div>
            <div class="card-block " style="padding: 2%; background: lightgray">
                <div class="card-body" >
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-9 mb-md-0 mb-5">
                            <form id="contact-form" name="contact-form" action="{{route('messages.store')}}"
                                  method="POST">
                                {{csrf_field()}}


                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <input type="text" id="name" name="name" class="form-control" required
                                                   value="">
                                            <label for="name" class="">Entrez votre nom</label>
                                        </div>
                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <input type="text" id="email" name="email" class="form-control"
                                                   value="" required>
                                            <label for="email" class="">Votre email</label>
                                        </div>
                                        <p class="text-danger">{{$errors->first('email')}}</p>
                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-label-group">
                                            <input type="text" id="subject" name="subject" class="form-control"
                                                   required>
                                            <label for="subject" class="">Sujet</label>

                                        </div>
                                    </div>
                                </div>
                                <p class="text-danger">{{$errors->first('subject')}}</p>

                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">
                                        <div class="form-label-group">
                                            <textarea type="text" id="message" name="message" rows="2"
                                                      class="form-control md-textarea"
                                                      placeholder="Votre message"></textarea>
                                            <p class="text-danger">{{$errors->first('message')}}</p>

                                        </div>
                                    </div>
                                </div>

                            </form>

                            <div class="text-center text-md-left">
                                <a class="btn btn-primary"
                                   onclick="document.getElementById('contact-form').submit();">Envoyer</a>
                            </div>
                            <div class="status"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection