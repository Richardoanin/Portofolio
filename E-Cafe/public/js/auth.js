function auth(button,form,uri,title,callback)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(button).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    $(button).prop("disabled", true);
    $(button).html("Mohon tunggu");
    $.ajax({
        type: "POST",
        url: uri,
        data: data,
        dataType: 'json',
        success: function (response) {
            if (response.alert=="success") {
                Swal.fire({ text: response.message, icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, Mengerti!", customClass: { confirmButton: "btn btn-primary" } });
                $(form)[0].reset();
                setTimeout(function () {
                    $(button).prop("disabled", false);
                    $(button).html(title);
                    if(title == "Login"){
                        location.reload();
                    }
                    window.location.href = callback;
                    if(!callback){
                        location.reload();
                    }
                }, 2000);
            } else if (response.alert=="error"){
                Swal.fire({ text: response.message, icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, Mengerti!", customClass: { confirmButton: "btn btn-primary" } });
                setTimeout(function () {
                    $(button).prop("disabled", false);
                    $(button).html(title);
                }, 2000);
            }
        },
    });
}
