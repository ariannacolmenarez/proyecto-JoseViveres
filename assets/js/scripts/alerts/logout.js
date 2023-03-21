$('#logout').on("click",function() {
    href="login";
    Swal.fire({
        title: '¿Seguro que desea cerrar sessión?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:   'logout', //archivo que recibe la peticion
                type:  'POST', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    window.location = href;
                },
                error: (response) => {
                    console.log(response);
                }
            });
        }
      })
})