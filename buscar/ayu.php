<?php
//Conexion con la base
mysql_connect("localhost","root","root"); 
//Selección de la base de datos con la que vamos a trabajar 
mysql_select_db("patentes"); 
//Ejecucion de la sentencia SQL
$sql =  "SELECT CLAVE_AYU, NOM_AYU, RFC, FECHA_AYU, NOM_DEL, NOM_COL, NOM_CAL, NOM_EM, NOM_INV 
FROM AYUDANTE 
INNER JOIN INVENTOR ON AYUDANTE.CI3=INVENTOR.CLAVE_INV
INNER JOIN COLONIA ON AYUDANTE.CC3=COLONIA.clave_col
INNER JOIN DELEGACION ON AYUDANTE.CD3 = DELEGACION.clave_del
INNER JOIN CALLE ON AYUDANTE.CCA3=CALLE.clave_cal
inner join empresa ON AYUDANTE.CE3=EMPRESA.CLAVE_EM";

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
<title>Ayudante - Prototypex</title>
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
	   <p><li><a href="/Prototypex/ayu.php" style="color: #ffffff;"/>Regresar</a></li></p>
	   </div>    
	   <div id="main-header" align=center> <img src="/Prototypex/images/blanco/logo.png"></div>
	   <div id="derecho" align=center>
	   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	   <b><p>2018 - PrototypeX © by Isolated Systems ©</p>
	   <p>Todos los derechos resevados.</p></b>
	   </div>
       	<div id="central" align="center">
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		<p style="color: #3097FF; font-weight: bold; font-size: 30px;">AYUDANTE - BÚSQUEDA</p>
		<form action="ayu.php" method="post" name="ayudante">CLAVE: &nbsp; &nbsp; <input type="text" align="LEFT" name="clave" value="<?php echo $registro['CLAVE_AYU'];?>"/> &nbsp; &nbsp; <input type="submit" value="Buscar" name="Buscar"></form>
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
 	$sql =  "SELECT CLAVE_AYU, NOM_AYU, RFC, FECHA_AYU, NOM_DEL, NOM_COL, NOM_CAL, NOM_EM, NOM_INV 
FROM AYUDANTE 
INNER JOIN INVENTOR ON AYUDANTE.CI3=INVENTOR.CLAVE_INV
INNER JOIN COLONIA ON AYUDANTE.CC3=COLONIA.clave_col
INNER JOIN DELEGACION ON AYUDANTE.CD3 = DELEGACION.clave_del
INNER JOIN CALLE ON AYUDANTE.CCA3=CALLE.clave_cal
inner join empresa ON AYUDANTE.CE3=EMPRESA.CLAVE_EM where clave_ayu=".$clave;
	$resultado1= @ mysql_query ($sql);
	if (!$resultado1)
	{
							echo '<script>alert("Error al buscar, ingrese solamente claves.");</script>';  
			echo '<script type="text/javascript">window.location="ayu.php";</script>';
    }
  ?>
    <div id="caja">
<div id="izquierdo" align="center"><p><li>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a href="ayu.php" style="color: #ffffff;"/>Regresar</a></li></p>
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
  <p align="center" style="color: #3097FF; font-weight: bold; font-size: 30px;">AYUDANTE</p>
  <table align="center" border="1">
  <tr><td align=center>CLAVE</td>
    <td align=center>NOMBRE</td>
    <td align=center>RFC</td>
	<td align=center>FECHA DE INGRESO</td>
	<td align=center>CALLE</td>
	<td align=center>COLONIA</td>
	<td align=center>DELEGACIÓN</td>
	<td align=center>EMPRESA</td>
	<td align=center>INVENTOR</td>
    </tr>
 <?
while ($row=mysql_fetch_array ($resultado1))
{
echo "<tr><td align=center>". $row["CLAVE_AYU"]. "</td>";
echo "<td align=center>". $row["NOM_AYU"]. "</td>";
echo "<td align=center>". $row["RFC"]. "</td>";
echo "<td align=center>". $row["FECHA_AYU"]. "</td>";
echo "<td align=center>". $row["NOM_CAL"]. "</td>";
echo "<td align=center>". $row["NOM_COL"]. "</td>";
echo "<td align=center>". $row["NOM_DEL"]. "</td>";
echo "<td align=center>". $row["NOM_EM"]. "</td>";
echo "<td align=center>". $row["NOM_INV"]. "</td>";
}
   echo '</table>';
    echo '</div>
    </div>
    </body>
    </html>';
				}
?>
