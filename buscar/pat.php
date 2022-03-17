<?php
//Conexion con la base
mysql_connect("localhost","root","root"); 
//Selección de la base de datos con la que vamos a trabajar 
mysql_select_db("patentes"); 
//Ejecucion de la sentencia SQL
$sql =  "SELECT CLAVE_PAN,NOM_PAN,FECHA_P,NOM_INV,NOM_EM
FROM PATENTE
INNER JOIN INVENTOR ON PATENTE.CI2=INVENTOR.CLAVE_INV
INNER JOIN EMPRESA ON PATENTE.CE2=EMPRESA.CLAVE_EM";

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
<script>
function abrir(url) { 
open(url,'','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=750,height=500,left=600,top=100')
}
</script> 
<link rel="stylesheet" type="text/css" href="protostyle.css">
<title>Patente - Prototypex</title>
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
	   <p><li><a href="/Prototypex/pat.php" style="color: #ffffff;"/>Regresar</a></li></p>
	   </div>    
	   <div id="main-header" align=center> <img src="/Prototypex/images/blanco/logo.png"></div>
	   <div id="derecho" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
	   <p>Todos los derechos resevados.</p></b>
	   </div>
       	<div id="central" align="center">
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		<p style="color: #3097FF; font-weight: bold; font-size: 30px;">PATENTE - BÚSQUEDA</p>
		<form action="pat.php" method="post" name="patente">CLAVE: &nbsp; &nbsp; <input type="text" align="LEFT" name="clave" value="<?php echo $registro['CLAVE_PAN'];?>"/> &nbsp; &nbsp; <input type="submit" value="Buscar" name="Buscar"></form>
		
    
 <?
}
{
echo'</FORM>';
echo'</div>';
echo'</div>';
echo'</body>';
echo'</html>';
}

 /* 		<a href="javascript:location.reload()">Recargar página</a> */

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
 	$sql =  "SELECT CLAVE_PAN,NOM_PAN,FECHA_P,NOM_INV,NOM_EM
FROM PATENTE
INNER JOIN INVENTOR ON PATENTE.CI2=INVENTOR.CLAVE_INV
INNER JOIN EMPRESA ON PATENTE.CE2=EMPRESA.CLAVE_EM where CLAVE_PAN=".$clave;
	$resultado1= @ mysql_query ($sql);
	if (!$resultado1)
	{
							echo '<script>alert("Error al buscar, ingrese solamente claves.");</script>';  
			echo '<script type="text/javascript">window.location="pat.php";</script>';
    }
  ?>
    <div id="caja">
<div id="izquierdo" align="center"><p><li>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a href="pat.php" style="color: #ffffff;"/>Regresar</a></li></p>
</div>
<div id="main-header" align=center>	<a href="menu.php"><img src="/Prototypex/images/blanco/logo.png"></a> </div>
	   <div id="derecho" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
	   <p>Todos los derechos resevados.</p></b>
	   </div>
<div id="central" align="center">
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <H1 align="center" font size=20 style="color: #3097FF;">RESULTADO DE LA BÚSQUEDA</H1>
  <p align="center" style="color: #3097FF; font-weight: bold; font-size: 30px;">PATENTE</p>
  <table align="center" border="1">
  <tr><td align=center>CLAVE</td>
  <td align=center>NOMBRE </td>
  <td align=center>FECHA</td>
  <td align=center>INVENTOR</td>
  <td align=center>EMPRESA</td>
 <?
while ($row=mysql_fetch_array ($resultado1))
{
echo "<tr><td align=center>". $row["CLAVE_PAN"]. "</td>";
echo "<td align=center>". $row["NOM_PAN"]. "</td>";
echo "<td align=center>". $row["FECHA_P"]. "</td>";
echo "<td align=center>". $row["NOM_INV"]. "</td>";
echo "<td align=center>". $row["NOM_EM"]. "</td>";
}
   echo '</table>';
    echo '</div>
    </div>
    </body>
    </html>';
				}
?>
