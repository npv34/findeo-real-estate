$(document).ready(function () {
    let origin = location.origin;

    $('#submit-house').click(function () {
        let data = $(":input").serializeArray();

        let fd = new FormData();
        fd.append('demo', '13213')

        $.each(data, function (i, item) {
            fd.append(item.name, item.value)
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: origin + '/houses/store',
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status === 'success') {

                    $('input[name="title"]').val('');
                    $('input[name="price"]').val('');
                    $('input[name="address"]').val('');
                    $('input[name="city"]').val('');
                    $('input[name="area"]').val('');
                    $('input[name="state"]').val('');
                    $('input[name="zip_code"]').val('');
                    $('input[name="description"]').val('');
                    window.location.href = origin + '/houses/' + response.house_id + '/file-upload'
                }else {
                    console.log("no")
                }
            },
            error: function (xhr, status, error) {
                $.each(xhr.responseJSON.errors, function (key, item) {
                    $("#error-"+ key).html(item)
                    $('input[name="' + key + '"]').addClass('border-color');
                });
            }
        })
    })

    $('#register').click(function () {
        let username = $('#username2').val();
        let email = $('#email2').val();
        let password = $('#password1').val();
        let password1_confirmation = $('#password2').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let fd = new FormData();
        fd.append('username', username);
        fd.append('email', email);
        fd.append('password1', password);
        fd.append('password1_confirmation', password1_confirmation);

        $.ajax({
            url: origin + '/register',
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function (res) {
                let html = '<div class="notification success large margin-bottom-55">\n' +
                    '                    <h4>Register success!</h4>\n' +
                    '                </div>'
                $('#message-register').html(html);
                $('#username2').val('');
                $('#email2').val('');
                $('#password1').val('');
                $('#password2').val('');
            },
            error: function (xhr, status, error) {
                $.each(xhr.responseJSON.errors, function (key, item) {
                    $("#error-"+ key).html(item)
                   $('input[name="' + key + '"]').addClass('border-color');
                });
            }
        })
    })
})
