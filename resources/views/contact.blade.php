@extends('main_layout')
@section('title')
    Contact
@endsection
@section('content')
    <!--Section: Contact v.2-->
    <section class="mb-4">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Avez-vous des questions? N'hésitez pas à nous contacter
            directement. Notre équipe reviendra vers vous en quelques heures pour vous aider.</p>
        <!--Grid row-->
        <div class="card">
            <div class="card-block " style="padding: 2%">
                <div class="card-body">
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-9 mb-md-0 mb-5">
                            <form id="contact-form" name="contact-form" action="mail.php" method="POST">


                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <input type="text" id="name" name="name" class="form-control" required>
                                            <label for="name" class="">Entrez votre nom</label>
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <input type="text" id="email" name="email" class="form-control" required>
                                            <label for="email" class="">Votre email</label>
                                        </div>
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
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">
                                        <div class="form-label-group">
                                <textarea type="text" id="message" name="message" rows="2"
                                          class="form-control md-textarea" placeholder="Votre message"></textarea>
                                        </div>

                                    </div>
                                </div>
                                <!--Grid row-->


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
    <script>
        function validateEmail() {
            console.log('test');
            const email = document.getElementById('email');
            var re = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
            var isMailValid = re.test(String(email.value).toLowerCase());
            if (!isMailValid) {
                email.style.borderColor = "red";
                email.alt = 'Saisir un bon email';
            }
            console.log(re.test(String(email.value).toLowerCase()));
            return re.test(String(email.value).toLowerCase());
        }
    </script>
@endsection