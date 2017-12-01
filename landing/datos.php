<?php
//Recibir datos del formulario
$apellidos 	= $_POST['apellidos'];
$correo 		= $_POST['correo'];
$telefono 		= $_POST['telefono'];
$comentario 	= $_POST['comentario'];

//Prepara el envio
$emailDestino 	= "hectorbernal1@hotmail.com";
$cabecera		= "Contacto desde la web";

$mensaje .= "Datos del contacto\n";
$mensaje .= "--------------------\n";
$mensaje .= "Apellidos y Nombres	:".$apellidos."\n";
$mensaje .= "Email				:".$correo."\n";
$mensaje .= "Teléfono			:".$telefono."\n";
$mensaje .= "Comentarios		:".$comentario."\n";

//Enviar datos a un correo electronico
$emailcabeceras = "Desde: " . $email . " <" . $nombres . "> \n";
$emailcabeceras .= "Responder a: " . $email . "\n\n";
mail($emailDestino, $cabecera, $mensaje, $emailcabeceras);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Refresh" content="5;url=http://www.bodylinegold.com/RunKeeperClass/contacto.html">
<meta charset="UTF-8">
<title>Runkeeper</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
	<section class="contenedor">
    	<header class="cabecera">
        	<a href="index.html"><img src="images/logo.png" alt="" class="logo"/></a>
          <nav class="menu">
             	<ul>
                	<li><a href="index.html">Inicio</a></li>
                  <li><a href="catalogo.html">Catálogo</a></li>
                  <li><a href="nosotros.html">Nosotros</a></li>
                  <li><a href="contacto.html">Contácto</a></li>
            </ul>                  
          </nav>
             <article class="redes">
             	<img src="images/facebook.png" width="27" height="27" alt="facebook">
               <img src="images/twitter.png" width="27" height="27" alt="twitter" class="twitter">
             </article>
      </header>
        <section class="contenido">
        	<article class="banner">
            	<img src="images/banner.jpg" alt=""/>
            </article>
            <h1>Runkeeper contacto</h1>
            <p>Tu mensaje ha sido enviado con éxito. En breve nos comunicaremos con ud.</p>
            <article class="cajaContacto1">
            
            </article>
            <article class="cajaContacto2">
            
            </article>
            <article class="cajaContacto3">
            	<form name="contacto" action="datos.php" method="post">
                	<input type="text" name="apellidos" id="apellidos" placeholder="Ingrese apellidos y nombres" required class="cajaTexto">
                    <input type="email" name="correo" id="correo" placeholder="Ingrese email" required class="cajaTexto">
                    <input type="tel" name="telefono" id="telefono" placeholder="Ingrese telefono" required class="cajaTexto">
                    <textarea name="comentario" id="comentario" placeholder="Ing comentario" class="cajaTexto2"></textarea>
                    <input type="submit" value="Enviar" class="boton">                    <input type="reset" value="Reestablecer" class="boton">
               </form>
            </article>
            
        </section>
        <footer class="pie">
        	<p>Todos los derechos reservados a RunKeeper, 2015<br>
Desarrollado por: Héctor Bernal Marcos - hectorbernal1@hotmail.com</p>
        </footer>
    
    </section>
    	
    
</body>
</html>




