function getAjax({loadUrl}) {
       return $.ajax({
            url: loadUrl,
            method: 'GET',
            // dataType: 'json'
            async: false,
            success:function(response){
                return response
            },
            error: function (error) {
                toastr.clear();
                toastr.error(error.responseText);
            }
        })
}