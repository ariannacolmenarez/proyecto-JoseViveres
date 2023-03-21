$(document).ready(function() {

    $("#loginform").validate({
        rules: {
            usuario : {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            password: {
                required: true,
                minlength: 5,
                maxlength: 50
            },
        },
        errorElement : 'span'
    });
});
function validacion(tipo,titulo,texto){
    Swal.fire({
        icon: tipo,
        title: titulo,
        text: texto,
      })
}

$("#submit").on("click", function(){
    if ($('#loginform').valid()) {
        $('#loginform').submit();  
    }
   return true;
});