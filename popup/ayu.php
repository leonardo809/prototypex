<?php
//Conexion con la base
mysql_connect("localhost","root","root"); 
//Selección de la base de datos con la que vamos a trabajar 
mysql_select_db("patentes"); 
//Ejecucion de la sentencia SQL
$sql =  "SELECT *
FROM AYUDANTE
ORDER BY CLAVE_AYU ASC";

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
	width: 700px;
	height: 500px;
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
	   <div id="main-header" align=center>	<a href="menu.php"><img src="/Prototypex/images/blanco/logo.png"></a> </div>
       	<div id="central" align="center">
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <table align="center" border="1">
    <tr>
    <td align=center>CLAVE</td>
    <td align=center>NOMBRE </td>
    <td align=center>RFC</td>
	<td align=center>FECHA DE INGRESO</td>
	<td align=center>CALLE</td>
	<td align=center>COLONIA</td>
	<td align=center>DELEGACIÓN</td>
	<td align=center>EMPRESA</td>
	<td align=center>ASESOR</td>
    </tr>
 <?
while ($row=mysql_fetch_array ($resultado1))
{
echo "<tr><td align=center>". $row["CLAVE_AYU"]. "</td>";
echo "<td align=center>". $row["NOM_AYU"]. "</td>";
echo "<td align=center>". $row["RFC"]. "</td>";
echo "<td align=center>". $row["FECHA_AYU"]. "</td>";
echo "<td align=center>". $row["CCA3"]. "</td>";
echo "<td align=center>". $row["CC3"]. "</td>";
echo "<td align=center>". $row["CD3"]. "</td>";
echo "<td align=center>". $row["CE3"]. "</td>";
echo "<td align=center>". $row["CI3"]. "</td>";
}
   echo '</table>';
    echo '<div align="center"><p></p></div>
    

	</div>
	</div>
    </body>
    </html>';

}
 mysql_close($conexion); ?>