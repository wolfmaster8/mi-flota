function sendAjaxPost(apiRoute, formId, buttonClass, toast = false, redirect = null,action = () => {}) {
    $(document).ready(function () {
        $(document).on('click', buttonClass, function (e) {
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
                        Swal.fire({icon: 'success', title: response});
                    }
                    if(action){
                        action()
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
                        Swal.fire({icon: 'error', title: error.responseText});
                    }
                }
            })
        })

    });
}