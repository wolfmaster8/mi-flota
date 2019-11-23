function sendAjaxDelete(apiRoute, data, action = () => {
}) {
    Swal.fire({
        icon: 'info',
        title: '¿Estás seguro de eliminarlo?',
        showCancelButton: true,
        confirmButtonText: 'Sí, elimínalo',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#ccc',
    }).then((result) => {
        if (result.value) {
            deleteAjax(apiRoute, data, action)
        } else {
            Swal.fire({icon: 'info', timer: 1500, showConfirmButton: false, title: 'Cancelado'})
        }
    })

}

function deleteAjax(apiRoute, data, action) {
    $.ajax({
        url: apiRoute,
        method: 'POST',
        data,
        success: function (response) {
            Swal.fire({icon: 'success', title: response});
            if (action) {
                action()
            }
        },
        error: function (error) {
            Swal.fire({icon: 'error', title: error.responseText});
        }
    })
}