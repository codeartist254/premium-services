$(document).ready(function () {
    // Signup user
    $('#registration-form').ajaxForm({
        'beforeSubmit': function () {
        },
        'resetForm': false,
        'success': function (resp) {
            // Show message and/or redirect to url!
            if (resp.error) {
                $('#admin-login-form #status').Pesalert('danger', resp.error);
            }else {
                window.location = '/'
            }
        }
    })

    // Login user
    $('#admin-login-form').ajaxForm({
        dataType: 'json',
        'beforeSubmit': function () {
        },
        'resetForm': true,
        'success': function (resp) {
            if (resp.error) {
                $('#admin-login-form #status').Pesalert('danger', resp.error);
            }else {
                window.location = '/';
            }
        }
    });
});