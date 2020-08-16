$(document).ready(function () {
    $('#submit-house').click(function () {
        let data = $(":input").serializeArray();

        let fd = new FormData();
        fd.append('demo', '13213')

        $.each(data, function (i, item) {
            fd.append(item.name, item.value)
        })

        let origin = location.origin;
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
                if (response.status == 'success') {
                    $('input[name="title"]').html('');
                    $('input[name="price"]').html('');
                    $('input[name="address"]').html('');
                    $('input[name="city"]').html('');
                    $('input[name="state"]').html('');
                    $('input[name="zip_code"]').html('');
                    $('input[name="description"]').html('');
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
})
