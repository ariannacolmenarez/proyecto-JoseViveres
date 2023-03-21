var toastMixin = Swal.mixin({
    toast: true,
    icon: 'success',
    title: 'General Title',
    animation: false,
    position: 'top-right',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

function validacion(tipo,titulo,texto){
    Swal.fire({
        icon: tipo,
        title: titulo,
        text: texto,
      })
}

$("#respaldo").on("click",function(e){
    e.preventDefault();
    Swal.fire({
    title: '¿Estas seguro que deseas Crear un respaldo?',
    icon: "warning",
    showDenyButton: true,
    confirmButtonText: 'Guardar',
    denyButtonText: `No Guardar`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:   'mantenimiento/respaldo', //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { 
                    toastMixin.fire({
                        animation: true,
                        title: 'Base de Datos Respaldada'
                    });
                },
                error: (response) => {
                    console.log(response);
                }
            })
        } else if (result.isDenied) {
            Swal.fire('Los cambios no fueron guardados', '', 'info')
        }
    })
})

$("#restaurar").on("click",function(e){
    e.preventDefault();
    if ($("#sql").val() != "" && $("#sql").val()!= null) {
        Swal.fire({
        title: '¿Estas seguro que deseas Restaurar la base de datos?',
        icon: "warning",
        showDenyButton: true,
        confirmButtonText: 'Respaldar',
        denyButtonText: `No Respaldar`,
        }).then((result) => {
            if (result.isConfirmed) {
                $("#form_res").submit();
            } else if (result.isDenied) {
                Swal.fire('Los cambios no fueron guardados', '', 'info')
            }
        })
    }else{
        validacion("error","Error","Elige una opcion para la restauración");
    }
    
})



