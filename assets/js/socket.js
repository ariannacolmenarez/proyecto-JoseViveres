$(function(){

   var valu=$("#userName").text();
            var name = valu;
            if(name.length > 0){

                        $("#submit").attr("userName", name);
                    
    
            }

    $("#formChat").on("submit", function(e){
        e.preventDefault();
        var type = $("#formChat").attr("type");
        if(type == "chat"){

            var message = $("#message").val();

            var name = $("#submit").attr("userName");

            if(message.length > 0){
                 
                $.ajax({
                    type:"POST",
                    url: "chats",
                    data: "name="+name+"&message="+message,
                    dataType: 'html',
                    success: function(data){

                        send(data);
                        var JSONdata = JSON.parse(data);
                        var nameData = JSONdata[0].name;
                        var messageData = JSONdata[0].message;
                        var sesionData = JSONdata[0].sesion;
                        var dateTime = JSONdata[0].dataTime;
                        
                         $("#content").append(`<div class="row justify-content-end">
                    <div class="col-10 ">
                        <div class="alert alert-secondary text-end role="alert" id="containerMessages">
                        `+nameData+`: `+messageData+'<spam class="text-muted fw-light"><small>'+dateTime+`</small></spam></spam></div></div></div>`);
                        $("#message").val('').focus();
                        var height = $("#content").prop('scrollHeight');
                        $("#content").scrollTop(height);
                    }
                
                })

            }else{
                alert("Ingrese un msj!")
                $("#message").focus();
            }
        }
    })
})



