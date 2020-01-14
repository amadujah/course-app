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
            console.log(data['status']);
            if (data['status'] === 'failure') {
                $('#email').css({'border': '1px solid red'}).focus();
                $('#password').val('');
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

jQuery(function ($) {

    $(".sidebar-dropdown > a").click(function () {
        $(".sidebar-submenu").slideUp(200);
        if (
            $(this)
                .parent()
                .hasClass("active")
        ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .parent()
                .removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .next(".sidebar-submenu")
                .slideDown(200);
            $(this)
                .parent()
                .addClass("active");
        }
    });

    $("#close-sidebar").click(function () {
        $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function () {
        $(".page-wrapper").addClass("toggled");
    });


});

function saveItemsLocally() {
    const libelle = $('#libelleCourse').val();
    sessionStorage.setItem('libelle', libelle);
}

function getData() {
    alert('test ' + sessionStorage.getItem('libelle'));
}