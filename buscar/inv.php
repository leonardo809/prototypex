<?
//Conexion con la base
mysql_connect("localhost","root","root"); 
//Selección de la base de datos con la que vamos a trabajar 
mysql_select_db("patentes"); 
//Ejecucion de la sentencia SQL
$sql =  "SELECT INVENTOR.CLAVE_INV, INVENTOR.NOM_INV, INVENTOR.RFC_INV, INVENTOR.FECHA_INV, NOM_DEL, NOM_COL, NOM_CAL, NOM_EM, 
ASESOR.NOM_INV AS ASESOR FROM INVENTOR 
JOIN INVENTOR ASESOR ON INVENTOR.CI=ASESOR.CLAVE_INV
INNER JOIN COLONIA ON INVENTOR.CC2=COLONIA.CLAVE_COL
INNER JOIN DELEGACION ON INVENTOR.CD2 = DELEGACION.CLAVE_DEL
INNER JOIN CALLE ON INVENTOR.CCA2=CALLE.CLAVE_CAL
INNER JOIN EMPRESA ON INVENTOR.CE=EMPRESA.CLAVE_EM";
$resultado1= @ mysql_query ($sql);

if (!$_POST and !$_Get) 
		{ //evalua si se enviaron los datos del formulario
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<link rel="shortcut icon" href="/Prototypex/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="/Prototypex/images/favicon.ico" type="image/x-icon">
<head>
<link rel="stylesheet" type="text/css" href="protostyle.css">
<title>Inventor - Prototypex</title>
<style type="text/css">
html, body {
	width: 100%;
	height: 100%;
	margin: 0;
	overflow: hidden;
	background-color: #FFF;
	font-family: Calibri, Arial, Calibri;
	font-size: 13px;
}
</style>
</head>
<body>
<div id="caja"> 
       <div id="izquierdo" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <p><li><a href="/Prototypex/inv.php" style="color: #ffffff;"/>Regresar</a></li></p>
	   </div>    
	   <div id="main-header" align=center> <img src="/Prototypex/images/blanco/logo.png"></div>
	   <div id="derecho" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
	   <p>Todos los derechos resevados.</p></b>
	   </div>
       	<div id="central" align="center">
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		<p style="color: #3097FF; font-weight: bold; font-size: 30px;">INVENTOR - BÚSQUEDA</p>
		<form action="inv.php" method="post" name="inventor">CLAVE: &nbsp; &nbsp; <input type="text" align="LEFT" name="clave" value="<?php echo $registro['CLAVE_INV'];?>"/> &nbsp; &nbsp; <input type="submit" value="Buscar" name="Buscar"></form>
		
 <?
}
{
echo'</FORM>';
echo'</div>';
echo'</div>';
echo'</body>';
echo'</html>';
}
if($_POST){
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<link rel="shortcut icon" href="/Prototypex/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="/Prototypex/images/favicon.ico" type="image/x-icon">
<head>
<link rel="stylesheet" type="text/css" href="protostyle.css">
<title>Resultado de la Búsqueda - Prototypex</title>
<style type="text/css">
html, body {
	width: 100%;
	height: 100%;
	margin: 0;
	overflow: hidden;
	background-color: #FFF;
	font-family: Calibri, Arial, Calibri;
	font-size: 13px;
}
</style>
</head>
<body>
 	<?php
 	$sql =  "SELECT INVENTOR.CLAVE_INV, INVENTOR.NOM_INV, INVENTOR.RFC_INV, INVENTOR.FECHA_INV, NOM_DEL, NOM_COL, NOM_CAL, NOM_EM, ASESOR.NOM_INV AS ASESOR
FROM INVENTOR
JOIN INVENTOR ASESOR ON INVENTOR.CI=ASESOR.CLAVE_INV
INNER JOIN COLONIA ON INVENTOR.CC2=COLONIA.CLAVE_COL
INNER JOIN DELEGACION ON INVENTOR.CD2 = DELEGACION.CLAVE_DEL
INNER JOIN CALLE ON INVENTOR.CCA2=CALLE.CLAVE_CAL
INNER JOIN EMPRESA ON INVENTOR.CE=EMPRESA.CLAVE_EM
 where INVENTOR.CLAVE_INV=".$clave;
	$resultado1= @ mysql_query ($sql);
	if (!$resultado1)
	{
					echo '<script>alert("Error al buscar, ingrese solamente claves.");</script>';  
			echo '<script type="text/javascript">window.location="inv.php";</script>';
    }
  ?>
    <div id="caja">
<div id="izquierdo" align="center"><p><li>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a href="inv.php" style="color: #ffffff;"/>Regresar</a></li></p>
</div>
<div id="main-header" align=center><img src="/Prototypex/images/blanco/logo.png"></div>
<div id="derecho" align="center">
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
	   <p>Todos los derechos resevados.</p></b>
</div>
<div id="central" align="center">
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <H1 align="center" font size=20 style="color: #3097FF;">RESULTADO DE LA BÚSQUEDA</H1>
  <p align="center" style="color: #3097FF; font-weight: bold; font-size: 30px;">INVENTOR</p>
  <table align="center" border="1">
  <tr><td align=center>CLAVE</td>
  <td align=center>NOMBRE </td>
  <td align=center>RFC</td>
  <td align=center>FECHA DE INGRESO</td>
  <td align=center>CALLE</td>
  <td align=center>COLONIA</td>
  <td align=center>DELEGACIÓN</td>
  <td align=center>EMPRESA</td>
  <td align=center>ASESOR</td></tr>
 <?
while ($row=mysql_fetch_array ($resultado1))
{
echo "<tr><td align=center>". $row["CLAVE_INV"]. "</td>";
echo "<td align=center>". $row["NOM_INV"]. "</td>";
echo "<td align=center>". $row["RFC_INV"]. "</td>";
echo "<td align=center>". $row["FECHA_INV"]. "</td>";
echo "<td align=center>". $row["NOM_CAL"]. "</td>";
echo "<td align=center>". $row["NOM_COL"]. "</td>";
echo "<td align=center>". $row["NOM_DEL"]. "</td>";
echo "<td align=center>". $row["NOM_EM"]. "</td>";
echo "<td align=center>". $row["ASESOR"]. "</td>";
}
   echo '</table>';
    echo '</div>
    </div>
    </body>
    </html>';
				}
?>