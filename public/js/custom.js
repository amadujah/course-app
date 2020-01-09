function login(url, erreur) {
    console.log(url);
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'email': $('#email').val()
        },
        dataType: 'json',
        success: function (data) {
            if (data['status'] === 'failure') {
                $('#email').css({'border': '1px solid red'}).focus();
                $('.invalid')
                    .html(erreur)
                    .show()
                    .css({'color': 'red'});

                $('button#login').attr('disabled', true);
            } else {
                $('#email').css({'border': '1px solid green'});
                $('.invalid').hide();
                $('button#login').attr('disabled', false);
            }
        },
        error: function (err) {
            console.log(err.responseText);
        }
    });


}