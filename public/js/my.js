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
})
