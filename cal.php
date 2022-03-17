<?php
//Conexion con la base
mysql_connect("localhost","root","root"); 
//Selección de la base de datos con la que vamos a trabajar 
mysql_select_db("patentes"); 
//Ejecucion de la sentencia SQL
$sql =  "SELECT * FROM CALLE
ORDER BY CLAVE_CAL ASC";
$resultado1= @ mysql_query ($sql);
if (!$_POST and !$_GET)
        { //evalua si se enviaron los datos del formulario
	?>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<link rel="shortcut icon" href="/Prototypex/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="/Prototypex/images/favicon.ico" type="image/x-icon">
<head>
<script>
function abrir(url) { 
open(url,'','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=750,height=500,left=600,top=100')
}
</script> 
<link rel="stylesheet" type="text/css" href="protostyle.css">
<title>Calle - Prototypex</title>
<style type="text/css">
html, body {
	width: 100%;
	height: 100%;
	margin: 0;
	overflow: hidden;
	background-color: #000;
	font-family: Calibri, Arial, Calibri;
	font-size: 13px;
} 
</style>
</head>
<body>
<div id="caja"> 
       <div id="izquierdo" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <p><li><a href="menu.php" style="color: #ffffff;"/>Menú Principal</a></li></p>
	   <p><li>Descargas</li></p>
	   <p><li>Acerca de</li></p>
	   <p><li><a href="iniciosesion.php" style="color: #ffffff;"/>Salir de la sesión</a></li></p>
	   </div>    
	   <div id="main-header" align=center>	<a href="menu.php"><img src="/Prototypex/images/blanco/logo.png"></a> </div>
	   <div id="derecho" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <p><li><a href="inv.php" style="color: #ffffff;"/>Inventor</a></li></p>
	   <p><li><a href="ayu.php" style="color: #ffffff;"/>Ayudante</a></li></p>
	   <p><li><a href="emp.php" style="color: #ffffff;"/>Empresa</a></li></p>	  
	   <p><li><a href="pat.php" style="color: #ffffff;"/>Patente</a></li></p>
	   <p><li><a href="telinv.php" style="color: #ffffff;"/>Teléfono de Inventor</a></li></p>
	   <p><li><a href="telayu.php" style="color: #ffffff;"/>Teléfono de Ayudante</a></li></p>	  
	   <p><li><a href="telemp.php" style="color: #ffffff;"/>Teléfono de Empresa</a></li></p>
	   <p><li><a href="tel.php" style="color: #ffffff;"/>Teléfono</a></li></p>
	   <p><li><a href="cal.php" style="color: #ffffff;"/>Calle</a></li></p>	  
	   <p><li><a href="col.php" style="color: #ffffff;"/>Colonia</a></li></p>
	   <p><li><a href="del.php" style="color: #ffffff;"/>Delegación</a></li></p>  
	   <br><br>
	   <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
	   <p>Todos los derechos resevados.</p></b>
	   </div>
       	<div id="central" align="center">
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<p style="color: #ffffff;"/><a href="/Prototypex/buscar/cal.php"><img src="/Prototypex/images/opciones/buscar.png" height="50"></a>___<a href="/Prototypex/ingresar/cal.php"><img src="/Prototypex/images/opciones/ingresar.png" height="50"></a></a>___<a href="/Prototypex/actualizar/cal.php"><img src="/Prototypex/images/opciones/actualizar.png" height="50"></a>___<a href="/Prototypex/eliminar/cal.php"><img src="/Prototypex/images/opciones/delete.png" height="50"></a></p>
		<p style="color: #3097FF; font-weight: bold; font-size: 30px;">CALLE</p>
    <table align="center" border="1">
    <tr>
    <td align=center>CLAVE</td>
	<td align=center>CALLE</td>
	</tr>
 <?
while ($row=mysql_fetch_array ($resultado1))
{
echo "<tr><td align=center>". $row["CLAVE_CAL"]. "</td>";
echo "<td align=center>". $row["NOM_CAL"]. "</td>"; "</tr>";
}
echo'</table><br>';
echo'</FORM>
</div>
</div>
</body>
</html>';
}
?>