// Shorthand for jQuery( document ).ready()
jQuery(function () {
    jQuery(document).on("click", "#sign_in", function (e) {
        e.preventDefault();
        // console.log(jQuery('#myForm').attr("method"));
        jQuery(".error_class").html("");
        e.preventDefault();
        jQuery.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="_token"]').attr("content"),
            },
        });
        jQuery.ajax({
            type: jQuery("#myForm").attr("method"),
            url: jQuery("#myForm").attr("action"),
            data: jQuery("#myForm").serialize(),
            success: function (response) {
                if (response.code === 200) {
                    toasterAlert("success", "Login Successfully");
                    window.location = "http://127.0.0.1:8000/admin";
                }
                // //
                // //     jQuery.each(err.responseJSON.errors, function (field_name, value) {
                // //         var el = jQuery(document).find(`[name="jQuery{field_name}"]`);
                // //         el.after(jQuery(`<span style="color: red;" class="error_class">jQuery{value}</span>`));                    })
                // // }else if(err.status === 401){
                // //     jQuery(".error_class").html("");
                // // }      console.log(response);
                // }
            },
            error: function (err) {
                if (err.status === 500) {
                    toasterAlert("error", "Internal Server Error");
                } else if (err.status === 404) {
                    toasterAlert("error", "SomthingWrong !!");
                }else if (err.status === 400) {
                        jQuery.each(
                            err.responseJSON.errors,
                            function (field_name, value) {
                                jQuery(document).find(`[name="${field_name}"]`).after(
                                    jQuery(`<span style="color: red;" class="error_class">${value}</span>` )
                                );
                            }
                        );
                    }else if (err.status === 401) {
                        toasterAlert("error", "Please Check your email and password again");
                    }else{

                    }
            },
        });
    });
});

function toasterAlert(erroricon, errormessage) {
    Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
    }).fire({ icon: erroricon, title: errormessage });
}
