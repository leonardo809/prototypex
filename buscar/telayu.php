<?php
//Conexion con la base
mysql_connect("localhost","root","root"); 
//Selección de la base de datos con la que vamos a trabajar 
mysql_select_db("patentes"); 
//Ejecucion de la sentencia SQL
$sql =  "SELECT NOM_AYU,TIPO_TEL,NUM
FROM TELAYU
INNER JOIN AYUDANTE ON AYUDANTE.CLAVE_AYU=TELAYU.CA4
INNER JOIN TELEFONO ON TELEFONO.CLAVE_TEL=TELAYU.CT1";

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
<title>Teléfono del Ayudante - Prototypex</title>
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
	   <p><li><a href="/Prototypex/telayu.php" style="color: #ffffff;"/>Regresar</a></li></p>
	   </div>    
	   <div id="main-header" align=center> <img src="/Prototypex/images/blanco/logo.png"></div>
	   <div id="derecho" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
	   <p>Todos los derechos resevados.</p></b>
	   </div>
       	<div id="central" align="center">
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		<p style="color: #3097FF; font-weight: bold; font-size: 30px;">TELÉFONO DE AYUDANTE - BÚSQUEDA</p>
		<form action="telayu.php" method="post" name="telayu">CLAVE: &nbsp; &nbsp; <input type="text" align="LEFT" name="clave" value="<?php echo $registro['CA4'];?>"/> &nbsp; &nbsp; <input type="submit" value="Buscar" name="Buscar"></form><br>
		
 <?

echo'</FORM>';
echo'</div>';
echo'</div>';
echo'</body>';
echo'</html>';
}


if($_POST){
	?>

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
	echo "";
 	$sql =  "SELECT NOM_AYU,TIPO_TEL,NUM
FROM TELAYU
INNER JOIN AYUDANTE ON AYUDANTE.CLAVE_AYU=TELAYU.CA4
INNER JOIN TELEFONO ON TELEFONO.CLAVE_TEL=TELAYU.CT1 where CA4=".$clave;
	$resultado1= @ mysql_query ($sql);
	if (!$resultado1)
	{
		echo '<script>alert("Error al buscar, ingrese solamente claves.");</script>';
			echo '<script type="text/javascript">window.location="telayu.php";</script>';
    }
  ?>
    <div id="caja">
<div id="izquierdo" align="center"><p><li>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a href="telayu.php" style="color: #ffffff;"/>Regresar</a></li></p>
</div>
<div id="main-header" align=center><img src="/Prototypex/images/blanco/logo.png"></div>
	   <div id="derecho" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
	   <p>Todos los derechos resevados.</p></b>
	   </div>
<div id="central" align="center">
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <H1 align="center" font size=20 style="color: #3097FF;">RESULTADO DE LA BÚSQUEDA</H1>
  <p align="center" style="color: #3097FF; font-weight: bold; font-size: 30px;">TELÉFONO DE AYUDANTE</p>
  <table align="center" border="1">
  <tr><td align=center>CLAVE DE AYUDANTE</td>
  <td align=center>CLAVE DE TIPO DE TELÉFONO</td>
  <td align=center>NUM</td>
 <?
while ($row=mysql_fetch_array ($resultado1))
{
echo "<tr><td align=center>". $row["NOM_AYU"]. "</td>";
echo "<td align=center>". $row["TIPO_TEL"]. "</td>";
echo "<td align=center>". $row["NUM"]. "</td>";
}
   echo '</table>';
    echo '</div>
    </div>
    </body>
    </html>';
				}
?>