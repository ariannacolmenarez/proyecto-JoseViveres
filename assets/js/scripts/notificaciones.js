$(document).ready(function() {
    // INTERACCION
    var down = false;
    
    $('#bell').click(function(e) {
        var color = $(this).text();
        if (down) {
            $('#box').fadeOut();
            down = false;
        } else {
            var pantalla = $(window).height();
            var navbar = $('#navbar').height();
            pantalla = pantalla - navbar-25;
            $('#box').css('height', pantalla+'px');
            $('#box').slideDown();     
            down = true;

        }

    });

    $('#getout').click(function(e) {
        $('#box').fadeOut();
        down = false;
    });


    // PETICIONES
    const getNotifications = () => {
        $.ajax({
            type: "POST",
            url:"notificaciones/listar",
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                // console.log(response.data.length);
                if (response.data.length !== 0) {
                    $('.notifications-item').remove();
                    response.data.forEach((e) => {
                        let link = ""
                        if(e.titulo.search("Producto") > 0){
                            link = 'inventario';
                        }
                        else{
                            link = 'deudas';
                        }
                        $('#box').append(`<a class="dropdown-item w-100 notification-item-`+e.id+`">
                        <div class="item-content w-100">
                          <h6 class="font-weight-normal">`+e.titulo+`</h6>
                          <p class="font-weight-light small-text mb-0 text-muted">
                          `+e.mensaje+`
                          </p>
                        </div>
                        <div class="notifications-item-close w-100 text-end" onClick="dismissNotificacion(`+e.id+`)"><i class="ti-close"></i></div>
                      </a>`);
                    })
                    $('#cont').addClass("count");
                } else {

                }
            },
            error: (response) => {
                console.log(response);

            }
        });
    }

    getNotifications();
    var d = new Date();
    
    var runned = false;
    var d = new Date();
    if(d.getDate() == 03 && d.getHours == 8  && !runned || d.getDate() == 30 && d.getHours == 8  && !runned){
        registrar();
        runned = true;
    }
    //setInterval(getNotifications, 15000);
});

function dismissNotificacion (id) {
    $.ajax({
            type: "POST",
            url:"notificaciones/eliminar",
            data: { id },
            dataType: "json",
            success: function(response) {

                if (response) {
                    $(`.notification-item-`+id).fadeOut(200)
                    $('#cont').removeClass("count");
                    $(`.notification-item-`+id).remove()
                } else {
                    console.log('error');
                }
            },
            error: (response) => {
                console.log(response);
            }
        });
}

function registrar () {
    $.ajax({
            type: "POST",
            url:"notificaciones/registrar",
            dataType: "json",
            success: function(response) {

            },
            error: (response) => {
                console.log(response);
            }
        });
}