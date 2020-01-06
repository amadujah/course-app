@extends('main_layout')
@section('title')
    Contact
@endsection
@section('content')
    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contactez-nous</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Avez-vous des questions? N'hésitez pas à nous contacter
        directement. Notre équipe reviendra vers vous en quelques heures pour vous aider.</p>
    <div class="row">
        <form onsubmit="return validateEmail()">
            <div class="form-group col-sm-6">
                <label for="name" class="h4">Nom</label>
                <input type="text" class="form-control" id="name" placeholder="Entrer votre nom" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="email" class="h4">Email</label>
                <input type="email" name="sender_mail" class="form-control" id="email"
                       placeholder="Entrer votre email" required/>
            </div>

            <div class="form-group">
                <label for="message" class="h4 ">Message</label>
                <textarea id="message" class="form-control" rows="5" placeholder="Entrer votre message"
                          required></textarea>
            </div>
            <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right">Envoyer
            </button>
            <div id="msgSubmit" class="h3 text-center hidden">Message Envoyé!</div>
        </form>
    </div>
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