<?php
if (isset($_POST['correo']) && isset($_POST['respuesta'])){
$correo = $_POST['correo'];
$respuesta = $_POST['respuesta'];
$to = 'alessandra.serruto@gmail.com';
$subject = "Rockit feedback";
$body = '<html>
			<body>
				<h2>Feedback - example.com</h2>
				<hr>
				<p>Correo<br>'.$correo.'</p>
				<p>Respuesta<br>'.$respuesta.'</p>
			</body>
		</html>';
$headers = "From: ".$correo."";


$send = mail($to, $subject, $body,$headers);
if($send){
	echo '<br>';
	echo '¡Gracias por contactarnos!, ......';
} else{
	echo 'error';
}
}
?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Rockit!</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<section class="contenedor">
    <img src="images/1.png" alt="" class="imagen"/>
	<a href="https://marvelapp.com/1081h15g" target="_blank"><img src="images/prototipo.png" alt="" class="boton"/>
	</a>
    <img src="images/2.png" alt="" class="imagen"/>
    <img src="images/3.png" alt="" class="imagen"/>

</section>
<section class="contenedor">
    <img src="images/contacto.png" alt="" class="imagen"/>
	<a href="https://marvelapp.com/1081h15g" target="_blank"><img src="images/enviar.png" alt="" class="boton"/>
	</a>

	<form action="" method="post">
		<input type="text" name="correo" placeholder="Tu e-mail"<br>
		<input type="text" name="respuesta" placeholder="Tus comentario"<br>
		<button class="enviar" type="submit">Subscribe</button>
	</form>

</section>
</body>
</html>