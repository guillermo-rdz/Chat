<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">		
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<title>Prueba de Chat</title>
	</head>
	<body>
	<?php 
	echo "No tienes permiso de entrar";
	 ?>
		<div  class="container-fluid">
			<section  style="padding: 5%;">			
				<div class="row">				
					<h1 class="text-center">Chat: <small>Guillermo</small></h1>	
					<hr>
				</div>	
				<div class="row">
					<form id="formChat" role="form">
						<div class="form-group">
							<label for="user">Usuario</label>
							<!--input type="text" class="form-control" id="user" name="user"-->
							<div id="select">
								
							</div>
							
						</div>
						<div class="form-group">							
							<div class="row">
								<div class="col-md-12" >
									<div id="conversation" style="height:200px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">
										
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">				
							<label for="message">Mensaje</label>
							<textarea id="message" name="message" placeholder="Escribir mensaje"  class="form-control" rows="3"></textarea>
						</div>
						<button id="send" class="btn btn-primary" >Enviar</button>						
					</form>
				</div>
			</section>	
		</div>	
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>		
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script>
		
			$(document).on("ready", function(){	

				usuariosBD();
				registerMessages();

				$.ajaxSetup({"cache": false });
				setInterval("loadMessages()", 500);

				//$("#send").attr('disabled', 'disabled');

			});

			var usuariosBD = function(){
				var usu = {"tipo" : "usu"};
				$.ajax({
					type: "POST",
					url: "modelo/registro.php",
					data: usu
				}).done(function ( info ){
					$("#select").html( info );
					//$("#conversation p:last-child").css({"background-color" : "lightblue", "padding-bottom" : "20px"});
				});
			}

			var registerMessages = function(){
				$("#send").on("click", function(e){
					if ($("#user").val().length < 1 || $("#message").val().length < 1) {
						//$("#send").attr('disabled', 'disabled');
						return false;

					}

					e.preventDefault();

					var frm = {
						"tipo" : "rm",
						"user" : $("#user").val(),
						"message" : $("#message").val()
					};

					$.ajax({
						type: "POST",
						url: "modelo/registro.php",
						data: frm
					}).done(function(info){
						var altura = $("#conversation").prop("scrollHeight");
						$("#conversation").scrollTop(altura);
						$("#message").val("");
						console.log( info );
					})

				});
			}
			
			var loadMessages = function(){
				var con = {"tipo" : "con"};
				$.ajax({
					type: "POST",
					url: "modelo/registro.php",
					data: con
				}).done(function ( info ){
					$("#conversation").html( info );
					$("#conversation p:last-child").css({"background-color" : "lightblue", "padding-bottom" : "20px"});

					/*var altura = $("#conversation").prop("scrollHeight");
					$("#conversation").scrollTop(altura);*/
					var altura = $("#conversation").prop("scrollHeight");
					if (altura>0) {
						$("#conversation").scrollTop(altura);
					}
				});
			}
		</script>
	</body>
</html>