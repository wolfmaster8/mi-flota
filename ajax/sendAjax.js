function enviarAjax(apiRoute, formId, buttonName) {
    $(document).ready(function () {
        $(document).on('click', buttonName, function (e) {
            e.preventDefault();
            const data = $(formId).serialize();
            $.ajax({
                url: apiRoute,
                method: 'POST',
                data: data,
                // dataType:'json',
                success: function (response) {
                    message('success', response);
                },
                error: function (error) {
                    message('error', 'Error', error.responseText);
                }
            })
        })

    });
}

function message(type, title, text = '') {
    swal({
        type,
        title,
        text
    })
}