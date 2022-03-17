<?php
$NombreAdmin = "proto";
$ContraseñaAdmin = "123";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="/Prototypex/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="/Prototypex/images/favicon.ico" type="image/x-icon">
<head>
<link rel="stylesheet" type="text/css" href="protostyle.css">
<title>Inicio de Sesión - Prototypex</title>
<style type="text/css">
html, body {
	width: 100%;
	height: 100%;
	margin: 0;
	overflow: hidden;
	background-color: #000;
	font-family: Calibri, Arial, Calibri;
	font-size: 15px;
} 
</style>
</head>
<body>
<div id="caja"> 
       <div id="izquierdo" align=center><p>				</p></div>    
	   <div id="main-header" align=center>	<img src="/Prototypex/images/blanco/logo.png"> </div>
	   <div id="derecho" align=center> <p>				</p></div>
       	<div id="central" align="center">
		<br><br><br><br><br><br><br><br><br><br><br>
       	<img src="/Prototypex/images/azul/admin.png">
		<h1>CONTRASEÑA</h1>
		<form action="iniciosesion.php" method="post" name="clave">
		<p>Usuario: <input type="text" align="LEFT" name="Nombre" /></p>
		<p>Contraseña: <input type="password" align="LEFT" name="Contraseña"/><p>
		<input type="submit" value="Ingresar" name="guardar" style="background-color: #3097FF; border: 0; width: 100px; height: 30px; color: #FFF; font-weight:bold;">
		</form>
	   </div>
	</div>
<?

if ($NombreAdmin==$Nombre && $ContraseñaAdmin==$Contraseña)
{
echo '<script>alert("¡Bienvenido!");</script>';
echo '<script type="text/javascript">window.location="menu.php";</script>';
    exit;	
$Nombre="";
$Contraseña="";
}
if (!$NombreAdmin!=$Nombre || !$ContraseñaAdmin!=$Contraseña)
{
echo '<script>alert("¡Contraseña incorrecta!");</script>';  
}
?>
</body>
</html>