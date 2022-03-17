<?php
//Conexion con la base
mysql_connect("localhost","root","root"); 
//Selección de la base de datos con la que vamos a trabajar 
mysql_select_db("patentes"); 
//Ejecucion de la sentencia SQL
$sql =  "SELECT NOM_INV,TIPO_TEL,NUM
FROM TELINV
INNER JOIN INVENTOR ON INVENTOR.CLAVE_INV=TELINV.CI4
INNER JOIN TELEFONO ON TELEFONO.CLAVE_TEL=TELINV.CT1";

/* SELECT NOM_A,TELF_A,NOM_C
FROM CARRERA INNER JOIN ALUMNO ON CARRERA.CLAVE_C=ALUMNO.CLAVE_C1
*/

$resultado1= @ mysql_query ($sql);
if (!$_POST and !$_Get)
        { //evalua si se enviaron los datos del formulario
	?>
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
    <td>NOMBRE DE INVENTOR</td>
	<td>TIPO DE TELÉFONO</td>
	<td>NÚMERO</td>
	</tr>
 <?
while ($row=mysql_fetch_array ($resultado1))
{
echo "<tr><td>". $row["NOM_INV"]. "</td>";
echo "<td>". $row["TIPO_TEL"]. "</td>";
echo "<td>". $row["NUM"]. "</td>";
}
   echo '</table>';
    echo '<div align="center"><p></p></div>
    

	</div>
	</div>
    </body>
    </html>';

}
 mysql_close($conexion); ?>