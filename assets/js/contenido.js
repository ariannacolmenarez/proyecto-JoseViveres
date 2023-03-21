var Server;

$(document).ready(function() {

	Server = new FancyWebSocket('ws://'+url);
	Server.bind("open", function() { })
	Server.bind("close", function(data) { })
	Server.bind("message", function(payload) { })
	Server.connect();

	var xValues = [50,60,70,80,90,100,110,120,130,140,150];
	var yValues = [7,8,8,9,9,9,10,11,14,14,15];

	var myChart = new Chart("myChart", {
	  type: "line",
	  labels: "Line",
	  data: {
	    labels: xValues,
	    datasets: [{
	      backgroundColor: "rgba(255,255,255,0)",
	      borderColor: "rgba(255,255,0,0.1)",
	      data: yValues
	    }]
	  },
	})
})


function send(text){
	Server.send("message", text);
}

var FancyWebSocket = function(url){
	
	var callbacks = {};
	var ws_url = url;
	var conn;

	this.bind = function(event_name, callbacks){
		callbacks[event_name] = callbacks[event_name] || [];
		callbacks[event_name].push(callbacks);
		return this;
	}

	this.send = function(event_name, event_data){
		this.conn.send(event_data);
		return this;
	}

	this.connect = function(){
		if(typeof(MozWebSokect) == "function")
			this.conn = new MozWebSokect(url);
		else
			this.conn = new WebSocket(url);

		this.conn.onmessage = function(evt){
			dispatch('message', evt.data);
		}

		this.conn.onclose = function(){dispatch('close', null)};
		this.conn.onopen = function(){dispatch('open', null)};
	}

	this.disconnect = function(){
		this.conn.close();
	}

	var dispatch = function(event_name, message){
		if(message == null || message == ""){
			console.log("No se envio");
		}else{
			if(message[0] == "V"){
				$("#content").append(`<div class="row">
                    <div class="col-10">
                        <div class="alert alert-success" role="alert">
                           <label>`+message+`
                        </div>
                    </div>
                </div>`);
                var height = $("#content").prop('scrollHeight');
                $("#content").scrollTop(height);
			}else{
				var JSONdata = JSON.parse(message);
				var nameData = JSONdata[0].name;
				var messageData = JSONdata[0].message;
				var sesionData = JSONdata[0].sesion;
				var dateTime = JSONdata[0].dataTime;
				$("#content").append(`<div class="row">
                    <div class="col-10">
                        <div class="alert alert-success" role="alert">
                           <label>`+nameData+': </label> '+messageData+' <spam class="text-muted fw-light"><small>'+dateTime+`</small></spam>
                        </div>
                    </div>
                </div>`);
                var height = $("#content").prop('scrollHeight');
                $("#content").scrollTop(height);
			}

			
		}
	}
}