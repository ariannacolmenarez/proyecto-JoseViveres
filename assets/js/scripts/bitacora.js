$(document).ready(function () {
    listarbitacora();
});

function listarbitacora(){
    
    $.get("bitacora/listar", {}, function (data, status) {
        $("#tableb").html(data);
        $('#exampleb').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
          });
    });
}