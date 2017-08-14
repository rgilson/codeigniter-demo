$(document).ready(function () {
    function init() {
        if (localStorage["first_name"]) {
            $('#first_name').val(localStorage["first_name"]);
        }
        if (localStorage["last_name"]) {
            $('#last_name').val(localStorage["last_name"]);
        }
        if (localStorage["email"]) {
            $('#email').val(localStorage["email"]);
        }
		if (localStorage["username"]) {
            $('#username').val(localStorage["username"]);
        }
    }
    init();
});

$('.form-control').keyup(function () {
    localStorage[$(this).attr('name')] = $(this).val();
});

$('#register').submit(function() {
    localStorage.clear();
});




