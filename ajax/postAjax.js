function sendAjaxPost(apiRoute, formId, buttonName, toast = false, redirect = null) {
    $(document).ready(function () {
        $(document).on('click', buttonName, function (e) {
            e.preventDefault();
            const data = $(formId).serialize();
            $.ajax({
                url: apiRoute,
                method: 'POST',
                data: data,
                success: function (response) {
                    if (toast) {
                        toastr.clear();
                        toastr.success(response);
                    } else {
                        message('success', response);
                    }
                    if(redirect){
                        document.location.href = redirect
                    }
                },
                error: function (error) {
                    if (toast) {
                        toastr.clear();
                        toastr.error(error.responseText);
                    } else {
                        message('error', 'Error', error.responseText);
                    }
                }
            })
        })

    });
}

function message(type, title = '', text = '') {
    swal({
        type,
        title,
        text
    })
}